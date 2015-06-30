<?php
load_view("Template/top.php",$inp);
?>
<!--

mohit Saini112
-->


  <div id="index-banner" class="parallax-container">
    <?php
    load_view("Template/navbarhome.php",$inp);
    ?>
    <div class="section no-pad-bot">
      <div class="container">
        <div class="row ">
          <div class="col s12">
            <h1 class="header center green-text text-accent-3">get IITians</h1>
          </div>
          <div class="col s12">
        <?php
if (!empty($_SESSION['msg11']))
{
echo $_SESSION['msg11'];
    session_unset(); 
session_destroy();
}
             else
             {echo '
                        <div class="rw-words-1">
                          <h5 class="center">get an IITian tutor for any topic any time! </h5>
                          <h5 class="center">Be one among us better than us</h5>
                          <h5 class="center">for quality conscious people</h5>
                          <h5 class="center">we inspire you to become your potential</h5>
                        </div>
                      
                    ';
             }?>
             </div>
          
        </div></br>

        <div class="row center">
          <form class="col s12" action="<?php echo BASE."search"; ?>" >
            <div class="row center">
              <div class="col s12" style="margin-top:20px;"  id="main-search-bar" >
                <input placeholder="Search by Topic, Subject, Time, Teacher" type="search" autocomplete="off" name="q">
                <input type="submit" value="See Tutors">
              </div>              
            </div>
            <div id="dropdownnav" class="row">
              <nav class="transparent col s12">
                <ul class="nav">
                  <li><a href="#">VI</a>
                    <div>
                      <div class="nav-column">
                        <h3>Maths</h3>
                        <ul>
                          <li><a href="#">Trigonometry</a></li>
                          <li><a href="#">Algebra</a></li>
                          <li><a href="#">Calculas</a></li>
                          <li><a href="#">Trigonometry</a></li>
                          <li><a href="#">Algebra</a></li>
                          <li><a href="#">Calculas</a></li>
                          <li><a href="#">Algebra</a></li>
                          <li><a href="#">Calculas</a></li>
                        </ul>
                      </div>

                      <div class="nav-column">
                        <h3>science</h3>
                        <ul>
                          <li><a href="#">Water</a></li>
                          <li><a href="#">Circuit</a></li>
                          <li><a href="#">Motion</a></li>
                        </ul>

                        <h3>Civics</h3>
                        <ul>
                          <li><a href="#">government</a></li>
                          <li><a href="#">rural</a></li>
                          <li><a href="#">urban</a></li>
                        </ul>
                      </div>

                      <div class="nav-column">
                        <h3>History</h3>
                        <ul>
                          <li><a href="#">government</a></li>
                          <li><a href="#">rural</a></li>
                          <li><a href="#">urban</a></li>
                          <li><a href="#">government</a></li>
                          <li><a href="#">rural</a></li>
                          <li><a href="#">urban</a></li>
                        </ul>
                      </div>
                    </div>
                  </li>
                  <li><a href="#">VII</a></li>
                  <li><a href="#">VIII</a></li>
                  <li><a href="#">IX</a></li>
                  <li><a href="#">X</a></li>
                  <li><a href="#">XI</a></li>
                  <li><a href="#">XII</a></li>
                  <li><a href="#">IIT-JEE</a></li>
                </ul>
              </nav>
            </div>
          </form>
        </div>
        
      </div>
    </div>
    <div class="parallax" height="100%"><img src="images/banner.png" width="85%" alt="Banner" ></div>
  </div>

  <div class="container" id="container">
    <div class="section">
      <div class="row">
        <div class="col s12">
          <h3 class="header center teal-text text-darken-1" style="font-variant:small-caps">How it Works?</h3>
        </div>
        <div class="col s12 m4">
          <h2 class="header center"><i class="mdi-image-remove-red-eye large"></i></h2>
          <h5 class="header center grey-text text-darken-2">Look for topics</h5>
        </div>
        <div class="col s12 m4">
          <h2 class="header center"><i class="mdi-device-access-time large"></i></h2>
          <h5 class="header center grey-text text-darken-2">Schedule a class</h5>
        </div>
        <div class="col s12 m4">
          <h2 class="header center"><i class="mdi-hardware-desktop-windows large"></i></h2>
          <h5 class="header center grey-text text-darken-2">Start tutorial online</h5>
          <p class="light">
          </p>
        </div>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col s12">
        <br><br>
        <h3 class="header center teal-text text-darken-1" style="font-variant:small-caps">Why Us</h3>
    </div>
  </div>

      <div class="container">
        <div class="row border-bottom border-top" style="margin:0; padding:0;">
          <div class="col s12 m6 border-right">
            <h2 class="header center"><i class="mdi-communication-clear-all"></i></h2>
            <p class=" center">
              Study <b>TOPIC</b> of your choice 
            </p>
          </div>
          <div class="col s12 m6">
            <h2 class="header center"><i class="mdi-social-people"></i></h2>
            <p class=" center">
              Study with <b>TEACHERS</b> of your choice
            </p>
          </div>
        </div>

        <div class="row border-bottom" style="margin:0; padding:0;">
          <div class="col s12 m6 border-right">
            <h2 class="header center"><i class="mdi-maps-place"></i></h2>
            <p class=" center">
              Study at <b>PLACE</b> of your choice
            </p>
          </div>
          <div class="col s12 m6">
            <h2 class="header center"><i class="mdi-action-alarm"></i></h2>
            <p class=" center">
              Study at <b>TIME</b> of your choice
            </p>
          </div>
        </div>
      </div>

      <br><br>

  <div style="width:100%">
    <div class="section">
      <div class="row">
        <div class="col s12">
          <h3 class="header center teal-text text-darken-1" style="font-variant:small-caps">Reviews</h3>
        </div>
        <div class="col s12">
          <div class="slider">
            <ul class="slides">
              <li>
                <div class="caption center-align center row">
                  <div class="col s2 offset-s5">
                    <img src="images/1.jpg" class="circle responsive-img">
                  </div>
                  <div class="col s4 offset-s4">
                    <p class="light grey-text text-darken-4" style="margin-top:0; margin-bottom:0;"><b>student/teacher name</b></p>
                  </div>
                  <div class="col s12">
                    <h5 class="light grey-text text-darken-3">Learn anything, anytime from anywhere.Learn anything, anytime from anywhere. Learn anything, anytime from anywhere.Learn anything, anytime from anywhere.Learn anything, anytime from anywhere.</h5>
                  </div>
                </div>
              </li>
              <li>
                <div class="caption left-align center row">
                  <div class="col s2 offset-s5">
                    <img src="images/1.jpg" class="circle responsive-img">
                  </div>
                  <div class="col s4 offset-s4">
                    <p class="light grey-text text-darken-4" style="margin-top:0; margin-bottom:0;"><b>student name</b></p>
                  </div>
                  <div class="col s12">
                    <h5 class="light grey-text text-darken-3">Learn anything, anytime from anywhere.</h5>
                  </div>
                </div>
              </li>
              <li>
                <div class="caption right-align center row">
                <div class="col s2 offset-s5">
                  <img src="images/1.jpg" class="circle responsive-img">
                </div>
                <div class="col s12">
                  <h5 class="light grey-text text-darken-3">Learn anything, anytime from anywhere.</h5>
                </div>
                </div>
              </li>
              <li>
                <div class="caption center-align center row">
                <div class="col s2 offset-s5">
                  <img src="images/1.jpg" class="circle responsive-img">
                </div>
                <div class="col s12">
                  <h5 class="light grey-text text-darken-3">Learn anything, anytime from anywhere.</h5>
                </div>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="container">
    <div class="section">
      <div class="row">
        <div class="col s12">
          <h4 class="center teal-text text-darken-1">Users</h4>
        </div>
        <div class="col s12 m6 l6">
          <div class="card-panel center">
            <h6>Total Students Registered</h6>
            <h3 id="counter"><i class="mdi-social-school"></i> 1337</h5>
          </div>
        </div>
        <div class="col s12 m6 l6">
          <div class="card-panel center">
            <h6>Total Teachers Registered</h6>
            <h3 id="counter"><i class="mdi-social-person"></i> 1001</h5>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="container" style="margin-bottom:0;">
    <div class="section">
      <div class="row">
        <div class="col s12">
          <div class="slider-container">
            <ul class="bxslider">
              <li><a href="www.iitgn.ac.in" class="tooltipped" data-position="top" data-delay="0" data-tooltip="IIT Gandhinagar"><img src="logos/IITGandhinagar.png" title="IIT Gandhinagar" height="50" width="50"></a></li>
              <li><a href="www.iitr.ac.in" class="tooltipped" data-position="top" data-delay="0" data-tooltip="IIT Roorkee"><img src="logos/roorkee.png" height="50" width="50"></a></li>
              <li><a href="www.iitmandi.ac.in" class="tooltipped" data-position="top" data-delay="0" data-tooltip="IIT Mandi"><img src="logos/mandi-iit.png" height="50" width="50"></a></li>
              <li><a href="www.iiti.ac.in" class="tooltipped" data-position="top" data-delay="0" data-tooltip="IIT Indore"><img src="logos/indore.png" height="50" width="50"></a></li>
              <li><a href="www.iitj.ac.in" class="tooltipped" data-position="top" data-delay="0" data-tooltip="IIT Jodhpur"><img src="logos/IIT-JODHPUR-LOGO.png" height="50" width="50"></a></li>
              <li><a href="www.iitg.ac.in" class="tooltipped" data-position="top" data-delay="0" data-tooltip="IIT Guwahati"><img src="logos/IIT-Guwahati-Logo.png" height="50" width="50"></a></li>
              <li><a href="www.iitd.ac.in" class="tooltipped" data-position="top" data-delay="0" data-tooltip="IIT Delhi"><img src="logos/iit-delhi.png" height="50" width="50"></a></li>
              <li><a href="www.iitb.ac.in" class="tooltipped" data-position="top" data-delay="0" data-tooltip="IIT Bombay"><img src="logos/iit-bombay.png" height="50" width="50"></a></li>
              <li><a href="www.iitk.ac.in" class="tooltipped" data-position="top" data-delay="0" data-tooltip="IIT Kanpur"><img src="logos/IIT_Kanpur_Logo.png" height="50" width="50"></a></li>
              <li><a href="www.iith.ac.in" class="tooltipped" data-position="top" data-delay="0" data-tooltip="IIT Hydrabad"><img src="logos/iit_hydrabad_logo.png" height="50" width="50"></a></li> 
              <li><a href="www.iitbhu.ac.in" class="tooltipped" data-position="top" data-delay="0" data-tooltip="IIT (BHU)Varanasi"><img src="logos/iiit-varanasi.png" height="50" width="50"></a></li>  
              <li><a href="www.iitbbs.ac.in" class="tooltipped" data-position="top" data-delay="0" data-tooltip="IIT Bhuvneshwar"><img src="logos/bhuvneshwar.png" height="50" width="50"></a></li>
              <li><a href="www.iitkgp.ac.in" class="tooltipped" data-position="top" data-delay="0" data-tooltip="IIT Kharagpur"><img src="logos/IITKharagpurLogo.png" height="50" width="50"></a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>

<?php
load_view("Template/footernew.php",$inp);
load_view("Template/bottom.php",Fun::mergeifunset($inp, array("needbody"=>false  )));
?>

<link rel="stylesheet" type="text/css" href="css/custom-homestyle.css">

<script type="text/javascript">

    $(".button1").click(function(e){
      $(this).addClass("current");
      $(".button2").removeClass("current");
      $(".button3").removeClass("current");
      $(".button4").removeClass("current");
      $("li.b1").addClass("current");
      $("li.b2").removeClass("current");
      $("li.b3").removeClass("current");
      $("li.b4").removeClass("current");
    });

    $(".button2").click(function(e){
      $(this).addClass("current");
      $(".button1").removeClass("current");
      $(".button3").removeClass("current");
      $(".button4").removeClass("current");
      $("li.b2").addClass("current");
      $("li.b1").removeClass("current");
      $("li.b3").removeClass("current");
      $("li.b4").removeClass("current");
    });

    $(".button3").click(function(e){
      $(this).addClass("current");
      $(".button1").removeClass("current");
      $(".button2").removeClass("current");
      $(".button4").removeClass("current");
      $("li.b3").addClass("current");
      $("li.b1").removeClass("current");
      $("li.b2").removeClass("current");
      $("li.b4").removeClass("current");
    });

    $(".button4").click(function(e){
      $(this).addClass("current");
      $(".button1").removeClass("current");
      $(".button3").removeClass("current");
      $(".button2").removeClass("current");
      $("li.b4").addClass("current");
      $("li.b1").removeClass("current");
      $("li.b3").removeClass("current");
      $("li.b2").removeClass("current");
    });

</script>
</body></html>