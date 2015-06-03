<?php
load_view("Template/top.php",$inp);
load_view("Template/navbarnew.php",$inp);
?>
<html>
<head>
    <title>
    
    </title>
    </head>
<body>
  <div id="index-banner" class="parallax-container">
    <div class="section no-pad-bot">
      <div class="container">
        <br>
        <h1 class="header center white-text text-darken-2">Get IITians</h1>
        <div class="row center">
         <h5 class="col s12 light white-text"><?php
if (isset($_SESSION['msg11']) && $_SESSION['msg11']!=null ){
  echo $_SESSION['msg11'];
  $_SESSION['msg11']=null;
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
            Fast,easy <br> and User friendly
          </p>
        </div>
            </div>
          </div>
        <div class="col s12 m3">
          <div class="card teal darken-2 ">
                <div class="card-content white-text">
            <h2 class="header center"><i class="mdi-action-face-unlock"></i></h2>
          <p class="light center">
            Ever Expanding database of qualified tutors
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
    </body>
</html>
<?php
load_view("Template/footernew.php",$inp);
load_view("Template/bottom.php",$inp);
?>
    
