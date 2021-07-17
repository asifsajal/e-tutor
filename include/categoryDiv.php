<style type="text/css">
  

.wrap{
  width: 87%;
  margin: auto;
  padding: 0 10px;
  overflow: hidden;
  box-shadow: 0 0 5px #eee;
  padding-top:15px;
}

img{
  max-width: 100%;
  height: auto;
  
}

.more:link, .more:visited {
  transition-duration: 0.2s;    
  transition-timing-function: ease-out;
}

[class*='col-']{
  float:left;   
}

.col-1-3{
  width: 33.33%;
  padding: 20px;
}
  
.col-2-3{
  width: 66.66%; 
  padding: 20px;
}

.col-1-4{
  width: 25%; 
  padding: 10px;

}
#pr{font-size: 15px;}

.showx{
  float: left;
  border: 1px solid rgba(0,0,0,0.04);
  overflow: hidden;
  position: relative;
  text-align: center;
  cursor: default;
  background: #0675C1;
  display: block;
  border-radius: 4px;
}


.aspect{
  position: relative;
  padding-bottom: 20%;
  height: 0;
  overflow: hidden;
}

.showx .mask{
  width: 100%;
  height: 100%;
  position: absolute;
  overflow: hidden;
  top: 0;
  left: 0
}

.showx-first a.more {
  display: inline-block;
  text-decoration: none;
  padding: 7px 14px; 
  background: #FFF;
  color: #222;
  text-transform: uppercase;
  box-shadow: 0 0 1px #000;
  position: relative;
  border: 1px solid #999;

}

.showx-first a.more:hover {
  box-shadow: 0 0 5px #000;
}

.showx-first p{
  letter-spacing: 0.15em;
  color: #f4f4f4;
  font-size: 28px; 
}

.showx-first img {
  transition: all 0.2s linear;
}

.showx-first .mask {
  opacity: 0;
  background-color: rgba(0,0,0, 0.6);
  transition: all 0.4s ease-in-out;
}
.showx-first h2 {
  color: #f2f2f2;
  margin-top: 5%;
  opacity: 0;
  transition: all 0.2s ease-in-out;
  background: rgba(0,0,0,0.7);
}
.showx-first p {
  opacity: 0;
  transition: all 0.2s linear;
}
.showx-first a.info{
  opacity: 0;
  transition: all 0.2s ease-in-out;
}

.showx-first:hover img {
  transform: scale(1.2);
}
.showx-first:hover .mask {
  opacity: 1;
}
.showx-first:hover h2,
.showx-first:hover p,
.showx-first:hover a.info {
  opacity: 1;
}
.showx-first:hover p {
  transition-delay: 0.1s;
}
.showx-first:hover a.info {
  transition-delay: 0.2s;
}
#cn{color:white;font-size: 25px;}

#c{  margin: auto;
  width: 20%;
  font-size: 30px;
color:black;
padding-bottom: 10px;
font-family: Arial, Helvetica, sans-serif;}

@media only screen and (max-width: 767px) { 
  
  .col-1-4{
    width: 50%; 
    padding: 10px;
    overflow: hidden;
    clear: right;
  }

  
  .wrap{
    width: 100%;
    margin: auto;
    overflow: hidden;}
  
  .mobile-clear{
    clear:both;}

}

</style>



<div class="wrap">
<div class="row">
  
  <div id="c">Popular Category</sdiv>
  
</div>


<div class="row">
  
  <div class="col-1-4">
    <div class="showx showx-first">
      <img src="<?php echo"$cat1"?>" height="300px" width="400px" />
      <span id="cn">Bangla & English Medium</span>
      <div class="mask">
        <h2>Bangla & English Medium</h2>
        <p id="pr">Get better grades with the help of qualified & experienced tutors near you.</p>
        <a href="hireTutor.php" class="more">Hire a Tutor</a>
      </div>
    </div>
  </div>

    <div class="col-1-4">
    <div class="showx showx-first">
      <img src="<?php echo"$cat2"?>" height="300px" width="400px" />
      <span id="cn">Professional Skill</span>
      <div class="mask">
        <h2>Professional Skill</h2>
        <p id="pr">Build your professional skills for a better career from an experienced professional near you.</p>
        <a href="hireTutor.php" class="more">Hire a Tutor</a>
      </div>
    </div>
  </div>
<div class="mobile-clear"></div>
  
  <div class="col-1-4">
    <div class="showx showx-first">
      <img src="<?php echo"$cat3"?>" height="300px" width="400px" />
      <span id="cn">Skill Development</span>
      <div class="mask">
        <h2>Skill Development</h2>
        <p id="pr">Develop your skill in driving, cooking, photography, Kung Fu etc from an expert near you.</p>
        <a href="hireTutor.php" class="more">Hire a Tutor</a>
      </div>
    </div>
  </div>

    <div class="col-1-4">
    <div class="showx showx-first">
      <img src="<?php echo"$cat4"?>" height="300px" width="400px" />
      <span id="cn">Language Learning</span>
      <div class="mask">
        <h2>Language Learning</h2>
        <p id="pr">Learn the language you need for your personal, exam or business purpose from the language experts near you.</p>
        <a href="hireTutor.php" class="more">Hire a Tutor</a>
      </div>
    </div>
  </div>
<div class="mobile-clear"></div>

  <div class="col-1-4">
    <div class="showx showx-first">
      <img src="<?php echo"$cat5"?>" height="300px" width="400px" />
      <span id="cn">Admission Test</span>
      <div class="mask">
        <h2>Admission Test</h2>
        <p id="pr">Get admission in your desired institution with the help of an experienced & qualified tutor near you.</p>
        <a href="hireTutor.php" class="more">Hire a Tutor</a>
      </div>
    </div>
  </div>

    <div class="col-1-4">
    <div class="showx showx-first">
      <img src="<?php echo"$cat6"?>" height="300px" width="400px" />
      <span id="cn">Arts</span>
      <div class="mask">
        <h2>Arts</h2>
        <p id="pr">Build your efficiency & skills in Singing & Dancing etc. from a skilled & professional tutor near you</p>
        <a href="hireTutor.php" class="more">Hire a Tutor</a>
      </div>
    </div>
  </div>
<div class="mobile-clear"></div>

      <div class="col-1-4">
    <div class="showx showx-first">
      <img src="<?php echo"$cat7"?>" height="300px" width="400px" />
      <span id="cn">Test Preparation</span>
      <div class="mask">
        <h2>Test Preparation</h2>
        <p id="pr">Get quality help & pass the GRE, GMAT, IELTS and TOEFL exam in one sitting from an experienced tutor.</p>
        <a href="hireTutor.php" class="more">Hire a Tutor</a>
      </div>
    </div>
  </div>

    <div class="col-1-4">
    <div class="showx showx-first">
      <img src="<?php echo"$cat8"?>" height="300px" width="400px" />
      <span id="cn">Religious Studies</span>
      <div class="mask">
        <h2>Religious Studies</h2>
        <p id="pr">Improve your understanding & achieve your goal from a qualified tutor near you.s</p>
        <a href="hireTutor.php" class="more">Hire a Tutor</a>
      </div>
    </div>
  </div>
<div class="mobile-clear"></div>


</div> 
</div></div>