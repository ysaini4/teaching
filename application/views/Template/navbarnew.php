<body>
  <!-- Account Dropdown -->
  <ul id="dropdownaccount" class="dropdown-content">
    <li><a href="<?php echo BASE."login" ;?>">Login</a></li>
    
  </ul>
  <!-- NavBar -->
  <div class="navbar-fixed">
    <nav class="teal" role="navigation">
      <div class="nav-wrapper container">
        <a href="#" class="brand-logo">getIITians</a>
        <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="mdi-navigation-menu"></i></a>
        <ul id="nav-mobile" class="right hide-on-med-and-down">
         
          <li><a href="<?php echo BASE."contact" ;?>">Contact us</a></li>
          <li><a class="dropdown-button" href="#" data-beloworigin="true" data-activates="dropdownaccount"><i class="mdi-action-account-circle left"></i>Account</a></li>
          
        </ul>
      </div>
    </nav>
  </div>
  <!-- SideNav -->
  <ul class="side-nav" id="mobile-demo">
    <li><a href="#">About</a></li>
    <li><a href="#">Contact</a></li>
    
    <li>
      <form>
        
      </form>
    </li>
  </ul>
