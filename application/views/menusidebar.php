<!-- **********************************************************************************************************************************************************
      MAIN SIDEBAR MENU
      *********************************************************************************************************************************************************** -->
      <!--sidebar start-->
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu" id="nav-accordion">
              
                  <!-- PROFILE IMAGE ?? 
                  <p class="centered"><a href="profile.html"><img src="<?php echo base_url().'assets/img/lip6.jpg';?>" class="img-circle" width="60"></a></p>
                  <h5 class="centered">Liputan 6</h5>
                  -->
                    
                  <li class="sub-menu">
                      <a <?php if(isset($menuactive) && !empty($menuactive) && strpos($menuactive, 'historical') === 0) echo 'class="active" ';?> href='<?php echo base_url();?>' >
                          <i class="fa fa-tasks"></i>
                          <span>Historical</span>
                      </a>
                      
                  </li>

                  <li class="sub-menu">
                      <a <?php if(isset($menuactive) && !empty($menuactive) &&strpos($menuactive, 'realtime') === 0) echo 'class="active" ';?> href='<?php echo base_url().'realtime';?>'  >
                          <i class="fa fa-desktop"></i>
                          <span>Realtime</span>
                      </a>
                  </li>
                  
                  <li class="sub-menu">
                      <a <?php if(isset($menuactive) && !empty($menuactive) &&strpos($menuactive, 'extra') === 0) echo 'class="active" ';?> href='<?php echo base_url().'extra';?>'  >
                          <i class="fa fa-qrcode"></i>
                          <span>Extra</span>
                      </a>
                  </li>
                  <!--
                  <li class="sub-menu">
                      <a <?php if(strpos($menuactive, 'social') === 0) echo 'class="active" ';?> href="javascript:;" >
                          <i class="fa fa-th"></i>
                          <span>Social</span>
                      </a>
                      <ul class="sub">
                          <li<?php if($menuactive=='social_facebook') echo ' class="active"';?>><a  href='<?php echo base_url().'social/facebook';?>'>Facebook</a></li>
                          <li><a  href="#">Twitter</a></li>
                      </ul>
                  </li>
                  -->
                  

              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>
      <!--sidebar end-->

      