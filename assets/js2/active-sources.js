gapi.analytics.ready(function() {
    gapi.analytics.createComponent("ActiveSources", {
        initialize: function() {
            this.activeSources = []
        },
        execute: function() {
            this.polling_ && this.stop(), this.render_(), gapi.analytics.auth.isAuthorized() ? this.getActiveSources_() : gapi.analytics.auth.once("success", this.getActiveSources_.bind(this))
        },
        stop: function() {
            clearTimeout(this.timeout_), this.polling_ = !1, this.emit("stop", {
                activeSources: this.activeSources
            })
        },
        render_: function() {
            var e = this.get();
            this.container = "string" == typeof e.container ? document.getElementById(e.container) : e.container, this.container.innerHTML = e.template || this.template, this.container.querySelector("b").innerHTML = this.activeSources
        },
        getActiveSources_: function() {
            var e = this.get(),
                t = 1e3 * (e.pollingInterval || 5);
            if (isNaN(t) || 5e3 > t) throw new Error("Frequency must be 5 seconds or more.");
            this.polling_ = !0, gapi.client.analytics.data.realtime.get({
                ids: e.ids,
                dimensions: "rt:source",
                metrics: "rt:activeUsers",
                "max-results": 5,
                sort: "-rt:activeUsers"
            }).execute(function(e) {
                if(e.totalResults > 0){
                    var i = e.rows;
                    this.emit("success", {
                        activeSources: i
                    })
                    ,(this.activeSources = i, this.onChange_(i)), (this.polling_ = !0) && 
                    (this.timeout_ = setTimeout(this.getActiveSources_.bind(this), t))
                } else{
                    this.onChange_(e);
                }
            }.bind(this))
        },
        onChange_: function(e) {
            var t = this.container.querySelector("b");
            t && (t.innerHTML = this.activeSources), this.emit("change", {
                activeSources: e
            })
           
        },
        template: '<div class="ActiveSources">Active Sources: <b class="ActiveSources-value"></b></div>'
    })
});
