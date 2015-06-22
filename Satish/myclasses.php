<?php
?>
<main>
  <div class="container">
      <div class="row">
          <div class="col l7">
            <a class="waves-effect waves-light btn">All</a>
            <a class="waves-effect waves-light btn">Upcoming</a>
            <a class="waves-effect waves-light btn">Completed</a>
          </div>
          <div class="col l2 offset-l3" style=" margin-top: 0px; ">
                  <select name='subject' class="browser-default" id='selectsubject'  data-condition='simple'>
                    <option value="" >Sort By:</option>
                      <option value="date">Date</option>
                      <option value="student">Student</option>
                      <option value="subject">Subject</option>
                  </select>
          </div>
      </div>
    <div class="row">
      
      <div class="col s12 l12">
          
          <div class="row>">
            <div class="card-panel">
          <table class="hoverable responsive-table">
            <thead>
              <tr>
                <th data-field="class">S.No.</th>
                <th data-field="class">Date</th>
                <th data-field="class">Time</th>
                <th data-field="class">Student Id</th>
                <th data-field="class">Grade</th>
                <th data-field="class">Subject</th>
                <th data-field="class">Topic</th>
                <th data-field="class">Duration</th>
                <th data-field="class">Fees</th>
                <th data-field="class">Tests</th>
                <th data-field="subject" style="width:10%;">Test Ans.</th>
                <th data-field="topic">Link</th>
                <th data-field="duration">FeedBack</th>
               </tr>
            </thead>
            <tbody>
                <tr>
              <td data-field="class">S.No.</th>
                <td data-field="class">Date</th>
                <td data-field="class">Time</th>
                <td data-field="class">Student Id</th>
                <td data-field="class">Grade</th>
                <td data-field="class">Subject</th>
                <td data-field="class">Topic</th>
                <td data-field="class">Duration</th>
                <td data-field="class">Fees</th>
                <td data-field="class">Tests</th>
                <td data-field="subject">Test Ans. 4grfevrev tebeg</th>
                <td data-field="topic">Link</th>
                <td data-field="duration">FeedBack</th>
                </tr>
              </tbody>
          </table>
        </div>
      </div>
      </div>
    </div>
  </div>
    <div class="row">
    <div class="col s2" style="margin-top:-14rem">
        <div class="card-panel" >
            <span class="grey-text text-darken-2" style="padding-left:2rem"><b>Refine</b></span>
          <div class="row">
            <form class="col s12"   >
              <div class="row">
                <div class="input-field col s12">
                  <select name='class' id="selectclass" data-condition='simple' >
                   <option value="" > Student Id</option>
                  </select>   
                </div>
                <div class="input-field col s12">
                  <select name='subject' id='selectsubject' onchange='topicssubtopic(this);' data-condition='simple' >
                    <option value="" > Grade</option>
                  </select>
                </div>
                <div class="input-field col s12">
                  <select name='topic' id='selecttopic' data-condition='simple' >
                    <option value="" > Subject</option>
                  </select>
                </div>
                <div class="input-field col s12">
                  <select name='subject' id='selectsubject' onchange='topicssubtopic(this);' data-condition='simple' >
                    <option value="" > topic</option>
                  </select>
                </div>
                <div class="input-field col s12">
                  <select name='subject' id='selectsubject' onchange='topicssubtopic(this);' data-condition='simple' >
                    <option value="" > Fees</option>
                  </select>
                </div>
                

              </div>
            </form>
          </div>
        </div>
        </div>
    </div>
</main>

<?php
?>
