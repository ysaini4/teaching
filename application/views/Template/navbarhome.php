<body>
  <ul id="dropdownaccount" class="dropdown-content">
      <?php 
      if (User::islogin()){ ?>
      <li><a href="<?php echo BASE."profile" ;?>">Profile</a></li>
      <li><a href="<?php echo BASE."account" ;?>">Account</a></li>
      <li><a href="<?php echo BASE."?logout" ;?>">Logout</a></li>
       <?php 
     }
     else{
      ?>
      <li><a href="<?php echo BASE."login" ;?>">Login</a></li>
      <li><a href="<?php echo BASE."signup" ;?>">Signup</a></li>
      <li><a href="<?php echo BASE."joinus" ;?>">Join Us</a></li>
      <?php
     }

      ?>
  </ul>
  <!-- NavBar -->
  <div class="navbar-fixed">
    <nav class="transparent" id="navbar" role="navigation">
      <div class="nav-wrapper">
        <a href="#" class="brand-logo"><img src="images/logo.png" width="190" height="81" style="padding-top:10px;"/></a>
        <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="mdi-navigation-menu"></i></a>
        <ul id="nav-mobile" class="right hide-on-med-and-down">
          <li><a href="<?php echo BASE."aboutus" ;?>">About</a></li>
          <li><a href="<?php echo BASE."contactus" ;?>">Contact us</a></li>
          <li><a class="dropdown-button" href="#" data-beloworigin="true" data-activates="dropdownaccount"><i class="mdi-action-account-circle left"></i>Account</a></li>
          <form class="right">
            <div class="input-field transparent lighten-1">
              <input id="search" type="search" placeholder="Search" required>
              <label for="search"><i class="mdi-action-search"></i></label>
              <i class="mdi-navigation-close"></i>
            </div>
          </form>
        </ul>
      </div>
    </nav>
  </div>
  <!-- SideNav -->
  <ul class="side-nav" id="mobile-demo">
    <li><a href="<?php echo BASE."aboutus" ;?>" >About</a></li>
    <li><a href="<?php echo BASE."contactus" ;?>" >Contact</a></li>
    <form>
      <div class="input-field">
        <input id="search" type="search" required>
        <label for="search"><i class="mdi-action-search"></i></label>
        <i class="mdi-navigation-close"></i>
      </div>
    </form>
  </ul>
