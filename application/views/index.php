<?php
load_view("Template/top.php",$inp);
load_view("Template/navbar.php",$inp);
?>
  <div id="index-banner" class="parallax-container">
    <div class="section no-pad-bot">
      <div class="container">
        <br>
        <h2 class="header center green-text text-accent-3">Get IITians</h2>
        <div class="row center">
          <h5 class="col s12 light white-text">Get an IITian Tutor Anytime, Anywhere</h5>
        </div>
        <div class="row center">
          <form class="col s12">
            <div class="row center">
              <div class="input-field col s12">
                <input placeholder="Search by Topic, Subject, Time, Teacher" type="text" class="validate" id="main-search-bar" autocomplete="off" autofocus >
              </div>              
            </div>
            <div class="row center">
              <div class="col s6 l2">
                <input type="radio" name="search-classes" class="with-gap" id="classes-all" checked/>
                <label for="classes-all" class="white-text">All classes</label>
              </div>
              <div class="col s6 l2">
                <input type="radio" name="search-classes" class="with-gap" id="classes-topic"/>
                <label for="classes-topic" class="white-text">By Topic</label>
              </div>
              <div class="col s6 l2">
                <input type="radio" name="search-classes" class="with-gap" id="classes-subject"/>
                <label for="classes-subject" class="white-text">By Subject</label>
              </div>
              <div class="col s6 l2">
                <input type="radio" name="search-classes" class="with-gap" id="classes-time"/>
                <label for="classes-time" class="white-text">By Time</label>
              </div>
              <div class="col s6 l2">
                <input type="radio" name="search-classes" class="with-gap" id="classes-teacher"/>
                <label for="classes-teacher"  class="white-text">By Teacher</label>
              </div>
              <div class="col s6 l2">
                <a href="https://instaedu.com/tutors/" target="_blank" class="">See&nbsp;Tutors<i class="mdi-navigation-chevron-right"></i></a>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
    <div class="parallax"><img src="images/banner.png" alt="Banner"></div>
  </div>
  
  <div class="container">
    <div class="section">
      <div class="row">
        <div class="col s12">
          <h3 class="header center green-text text-darken-1">How it works?</h3>
        </div>
        <div class="col s12 m4">
          <h2 class="header center"><i class="mdi-image-remove-red-eye"></i></h2>
          <h5 class="header center grey-text">Look for topics</h5>
          <p class="light">
          </p>
        </div>
        <div class="col s12 m4">
          <h2 class="header center"><i class="mdi-device-access-time"></i></h2>
          <h5 class="header center grey-text">Schedule a class</h5>
          <p class="light">
          </p>
        </div>
        <div class="col s12 m4">
          <h2 class="header center"><i class="mdi-hardware-desktop-windows"></i></h2>
          <h5 class="header center grey-text">Start tutorial online</h5>
          <p class="light">
          </p>
        </div>
        <div class="col s12">
          <br><br>
          <h3 class="header center green-text text-darken-1">Reviews</h3>
        </div>
        <div class="col s12 m6">
          <h2 class="header center"><i class="mdi-action-face-unlock"></i></h2>
          <p class="light center">
            A great helpful tutor. Keep it up.
          </p>
        </div>
        <div class="col s12 m6">
          <h2 class="header center"><i class="mdi-action-face-unlock"></i></h2>
          <p class="light center">
            Awesome online resource.<br>Better than my professor at college.
          </p>
        </div>
      </div>
    </div>
  </div>

  <!-- Slider -->
  <div class="container">
    <div class="section">
      <div class="row">
        <div class="col s12">
          <div class="slider-container">
            <ul class="bxslider">
              <li><img src="logos/IITGandhinagar.png" title="IIT Gandhinagar"></li>
              <li><img src="logos/roorkee.png"></li>
              <li><img src="logos/mandi-iit.png"></li>
              <li><img src="logos/indore.png"></li>
              <li><img src="logos/indianinstitutetercgnologygujrat.png"></li>
              <li><img src="logos/IIT-JODHPUR-LOGO.png"></li>
              <li><img src="logos/IIT-Guwahati-Logo.png"></li>
              <li><img src="logos/iit-delhi.png"></li>
              <li><img src="logos/iit-bombay.png"></li>
              <li><img src="logos/IIT_Kanpur_Logo.png"></li>
              <li><img src="logos/iit_hydrabad_logo.png"></li> 
              <li><img src="logos/iiit-varanasi.png"></li>  
              <li><img src="logos/bhuvneshwar.png"></li>
              <li><img src="logos/IITKharagpurLogo.png"></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
<?php
load_view("Template/footer.php",$inp);
load_view("Template/bottom.php",$inp);
?>