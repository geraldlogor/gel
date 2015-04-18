gapi.analytics.ready(function() {
    gapi.analytics.createComponent("ActivePages", {
        initialize: function() {
            this.activePages = []
        },
        execute: function() {
            this.polling_ && this.stop(), this.render_(), gapi.analytics.auth.isAuthorized() ? this.getActivePages_() : gapi.analytics.auth.once("success", this.getActivePages_.bind(this))
        },
        stop: function() {
            clearTimeout(this.timeout_), this.polling_ = !1, this.emit("stop", {
                activePages: this.activePages
            })
        },
        render_: function() {
            var e = this.get();
            this.container = "string" == typeof e.container ? document.getElementById(e.container) : e.container, this.container.innerHTML = e.template || this.template, this.container.querySelector("b").innerHTML = this.activePages
        },
        getActivePages_: function() {
            var e = this.get(),
                t = 1e3 * (e.pollingInterval || 5);
            if (isNaN(t) || 5e3 > t) throw new Error("Frequency must be 5 seconds or more.");
            this.polling_ = !0, gapi.client.analytics.data.realtime.get({
                ids: e.ids,
                dimensions: "rt:pagePath",
                metrics: "rt:activeUsers",
                "max-results": 5,
                sort: "-rt:activeUsers"
            }).execute(function(e) {
                if(e.totalResults > 0){
                    var i = e.rows;

                    this.emit("success", {
                        activePages: i
                    })
                    ,(this.activePages = i, this.onChange_(i)), (this.polling_ = !0) && 
                    (this.timeout_ = setTimeout(this.getActivePages_.bind(this), t))

                }
                else{
                    this.onChange_(e);
                }
                
            }.bind(this))
        },
        onChange_: function(e) {
            var t = this.container.querySelector("b");
            t && (t.innerHTML = this.activeUsers), this.emit("change", {
                activePages: e
            })
           
        },
        template: '<div class="ActivePages">Active Pages: <b class="ActivePages-value"></b></div>'
    })
});
