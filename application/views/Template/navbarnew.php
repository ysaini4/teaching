<body>
  <!-- Dropdown for Create Account -->
  <ul id="dropdownaccount" class="dropdown-content">
    <li><a href="<?php echo BASE."signup" ;?>">Signup&nbsp;&nbsp;&nbsp;&nbsp;<span style="font-size:13px;" class="grey-text">for Students</span></a></li>
    <li><a href="<?php echo BASE."joinus" ;?>">Joinus&nbsp;&nbsp;&nbsp;&nbsp;<span style="font-size:13px;" class="grey-text">for Tutors</span></a></li>
  </ul>

  <!-- NavBar -->
  <div class="navbar-fixed">
    <nav class="teal" role="navigation">
      <div class="nav-wrapper">
        <a href="#" class="brand-logo" style="padding-left:20px;">getIITians</a>
        <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="mdi-navigation-menu"></i></a>
        <ul id="nav-mobile" class="right hide-on-med-and-down">
          <li><a href="<?php echo BASE."aboutus"; ?>">About Us</a></li>
          <li><a href="<?php echo BASE."contactus"; ?>">Contact Us</a></li>

          <?php
          if (User::islogin()) {
          ?>
          <li><a href="<?php echo BASE."profile" ;?>">Profile</a></li>
          <li><a href="<?php echo BASE."?logout"; ?>">Logout</a></li>
          <?php
          }
          else {
          ?>
          <li><a href="<?php echo BASE."login"; ?>">Login</a></li>
          <li>
            <a class="dropdown-button" href="#" data-beloworigin="true" data-activates="dropdownaccount">
              Create Account <i class="mdi-navigation-arrow-drop-down right"></i>
            </a>
          </li>
          <?php
          }
          ?>

          <form class="right">
            <div class="input-field">
              <input id="search" type="search" placeholder="Search Tutors" autocomplete="off">
              <label for="search"><i class="mdi-action-search"></i></label>
            </div>
          </form>
        </ul>
      </div>
    </nav>
  </div>

  <!-- SideNav -->
  <ul class="side-nav" id="mobile-demo">
    <li><a href="<?php echo BASE."aboutus"; ?>">About Us</a></li>
    <li><a href="<?php echo BASE."contactus"; ?>">Contact Us</a></li>

    <?php
    if (User::islogin()) {
    ?>
    <li><a href="<?php echo BASE."profile" ;?>">Profile</a></li>
    <li><a href="<?php echo BASE."?logout"; ?>">Logout</a></li>
    <?php
    }
    else {
    ?>
    <li><a href="<?php echo BASE."login"; ?>">Login</a></li>
    <li>
      <a href="<?php echo BASE."signup" ;?>">Signup&nbsp;&nbsp;&nbsp;&nbsp;
      <span style="font-size:13px;" class="grey-text">for Students</span></a>
    </li>
    <li>
      <a href="<?php echo BASE."joinus" ;?>">Joinus&nbsp;&nbsp;&nbsp;&nbsp;
      <span style="font-size:13px;" class="grey-text">for Tutors</span></a>
    </li>
    <?php
    }
    ?>

    <div class="row">
      <form class="col s12">
        <div class="row">
          <div class="input-field col s12">
            <i class="mdi-action-search prefix"></i>
            <input id="sidenav_search" type="text">
            <label for="sidenav_search">Search Tutors</label>
          </div>
        </div>
      </form>
    </div>
  </ul>
