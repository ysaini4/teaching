<?php
$msg="";
if(Fun::isSetP("name","email","password")){
  $signup_data=Fun::getflds(array("name","email","password"),$_POST);
  $signup_data["type"]="s";
  $temp=User::signUp($signup_data);
  if($temp>0){
    Fun::redirect(BASE."account");
  }
  else
    $msg="Error in signup";
}

?>

<body> 
  <main>
    <div class="container">
      <div class="container">
      <div class="card-panel">
        <div class="row">
          <div class="col s12">
            <h4 class="teal-text text-darken-1 center" style="font-weight:bold; font-variant: small-caps;">Sign Up</h4>
          </div>
        </div>
        <div class="row center">
          <form class="col s12 m10 offset-m1" method="post">
            <div class="row">
              <div class="input-field col s12 m12">
                <input id="fullname" name="name" type="text" class="validate">
                <label for="fullname">Full Name</label>
              </div>
            </div>
          		<div class="row">
                        <div class="input-field col s12 m12">
                                    <a class="collapsible-header">Subjects<a>
                 <div >
                         </div>
                                        </div>
                                        </a>
           							
<p>
      <input name="group1" type="radio" id="test1" />
      <label for="test1">Red</label>
    </p>
    <p>
      <input name="group1" type="radio" id="test2" />
      <label for="test2">Yellow</label>
    </p>
    <p>
      <input class="with-gap" name="group1" type="radio" id="test3"  />
      <label for="test3">Green</label>
    </p>
      <p>
        
    </p>
							        </div>
						  
            <div class="row">
              <div class="input-field col s12 m12">
                <input id="password" name="password" type="password" class="validate">
                <label for="password">Password</label>
              </div>
            </div>
            <div class="row">
              <div class="input-field col s12 m12">
                <input id="confirm_password" name="cpassword" type="password" class="validate">
                <label for="confirm_password">Confirm Password</label>
              </div>
            </div>
            <div class="row">
              <div class="input-field col s12 m12">
                <button class="btn waves-effect waves-light" name="signup" type="submit">Submit
                  <i class="mdi-content-send right"></i>
                </button>
                <button class="btn waves-effect waves-light" type="reset">Reset</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
    </div>
  </main>

