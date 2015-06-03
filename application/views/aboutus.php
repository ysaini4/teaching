<?php
load_view("Template/top.php");
load_view("Template/navbarnew.php");
?>

<body> 
  <main>
    <div class="container">
      
      <div class="card-panel">
        <div class="row">
          <div class="col s12 m12">
            <h4 class="teal-text text-darken-1 center" style="font-weight:bold; font-variant: small-caps;">About us</h4>
              <div class="row center">
    <div class="teal-text text-lighten-2" class="col s12 m12 offset-m0">
      <ul class="tabs"  class="teal-text text-lighten-2">
        <li class="tab col s12 "><a class="active" href="#test1">Mission </a></li>
        <li class="tab col s12 "><a  href="#test2">  Who we Are </a></li>
        <li class="tab col s12 "><a href="#test3">  How We Work </a></li>
        <li class="tab col s12 "><a href="#test4">  Why Us </a></li>
        <li class="tab col s12 "><a href="#test4">  Core Team</a></li>
      </ul>
    </div>
    <div id="test1" class="col s12">Our mission is to be the most respectable confluence of the college aspirants and IITians educationist to every student.</div>
    <div id="test2" class="col s12">Test 2</div>
    <div id="test3" class="col s12">Test 3</div>
    <div id="test4" class="col s12">Problems we are trying to solve are student being not able to clear competitive exams even after putting required hard work because of improper or no guidance and the non-availability of platform where students/coaching/schools can search for optimum quality teachers. Main reason for this problem is schools focusing only on board examinations and good teachers & students/coaching/schools having trouble finding each other.</div>
  </div>
          </div>
        </div>
        
      </div>
    
    </div>
  </main>
<?php
load_view("Template/footernew.php");
load_view("Template/bottom.php");

?>