<?php
load_view("Template/top.php",$inp);
load_view("Template/navbarnew.php",$inp);
?>
  <div id="index-banner" class="parallax-container">
    <div class="section no-pad-bot">
      <div class="container">
        <br>
        <h1 class="header center white-text text-darken-2">get IITians</h1>
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
        
      </div>
    </div>
    <div class="parallax" style="height:350px;"><img src="images/banner.png" alt="Banner" ></div>
  </div>

  <div class="container">
    <div class="section">
      <div class="row">
        <div class="col s12">
          <h3 class="header center black-text text-darken-5">How it works?</h3>
        </div>
        <div class="col s12 m4">
          <div class="card teal darken-2 ">
            <div class="card-content white-text">
              <h2 class="header center"><i class="mdi-image-remove-red-eye"></i></h2>
          <h5 class="header center white-text">Look for topics</h5>
              </div>
            </div>
        </div>
        <div class="col s12 m4">
            <div class="card teal darken-2 ">
                <div class="card-content white-text">
            <h2 class="header center"><i class="mdi-device-access-time"></i></h2>
          <h5 class="header center white-text">Schedule a class</h5>
          
        </div>
            </div>
          </div>
        <div class="col s12 m4">
          <div class="card teal darken-2 ">
                <div class="card-content white-text">
            <h2 class="header center"><i class="mdi-hardware-desktop-windows"></i></h2>
          <h5 class="header center white-text">Start tutorial online</h5>
          <p class="light">
          </p>
              </div>
            </div>
        </div>
        <div class="col s12">
          <br><br>
          <h3 class="header center black-text text-darken-1">Benefits</h3>
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
    
