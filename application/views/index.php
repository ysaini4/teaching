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
        <h1 class="header center green-text text-accent-3">Get IITians</h1>
        <div class="row center">
         <h5 class="col s12 light white-text"><?php
if (!empty($_SESSION['msg11']))
{
echo $_SESSION['msg11'];
    session_unset(); 
session_destroy();
}
             else
             {echo "Soon, get an IITian tutor for any topic any time!";
             }?></h5>
          
        </div>

        <div class="row center">
          <form class="col s12">
            <div class="row center">
              <div class="input-field col s12">
                <input placeholder="Search by Topic, Subject, Time, Teacher" type="search" id="main-search-bar" autocomplete="off">
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
                  <li><a href="#">IIT-JEE</a>
                </ul>
              </nav>
            </div>
          </form>
        </div>
        
      </div>
    </div>
    <div class="parallax" height="100%"><img src="images/banner.png" width="85%" alt="Banner" ></div>
  </div>

  <div class="container">
    <div class="section">
      <div class="row">
        <div class="col s12">
          <h3 class="header center green-text text-darken-1" style="font-variant:small-caps">How it Works?</h3>
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
        <div class="col s12">
          <br><br>
          <h3 class="header center green-text text-darken-1" style="font-variant:small-caps">Benefits</h3>
        </div>
        <div class="col s12 m3">
          <div class="card teal darken-2 ">
                <div class="card-content white-text">
            <h2 class="header center"><i class="mdi-action-face-unlock"></i></h2>
          <p class="light center">
            Fast, easy <br> and student friendly
          </p>
        </div>
            </div>
          </div>
        <div class="col s12 m3">
          <div class="card teal darken-2 ">
                <div class="card-content white-text">
            <h2 class="header center"><i class="mdi-action-face-unlock"></i></h2>
          <p class="light center">
            Ever expanding database of qualified tutors
              </div>
            </div>
        </div>
          <div class="col s12 m3">
          <div class="card teal darken-2 ">
                <div class="card-content white-text">
            <h2 class="header center"><i class="mdi-action-face-unlock"></i></h2>
          <p class="light center">
Learn anything, anytime from anywhere.
              </div>
            </div>
        </div>
          <div class="col s12 m3">
          <div class="card teal darken-2 ">
                <div class="card-content white-text">
            <h2 class="header center"><i class="mdi-action-face-unlock"></i></h2>
          <p class="light center">
Personalized education<br> LIVE 1-To-1 teaching
              </div>
            </div>
        </div>
      </div>
    </div>
  </div>
<?php
load_view("Template/footernew.php",$inp);
load_view("Template/bottom.php",$inp);
?>
    
