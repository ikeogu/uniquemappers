<?php
include_once 'include/team.php';
include_once 'include/function.php';
 $result = '';
 
    if(isset($_POST['create'])){
      $member = Team::instantiate($_POST);
      $header = 'Registration Status';
      $message =' Yours registration was successful.';
      $message2= 'Oops something went wrong.';
      if($member){
         $member->attach_file($_FILES['passport']);
        if ($member->save_with_file()) {
    
          $result = '<div class="alert alert-success alert-dismissible" role="alert">
                  <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                  <strong>Success!</strong>'."$header".'<hr/>'."$message".'</div>';
             echo "<div class='popup'>
                  <div class='cnt223'>
                    <h1>Do you know</h1>
                    <p>
                      LET'S GO FOR A LITTLE INTERVIEW!.
                      <br/>
                      <br/>
                      <a href='' class='close'>Close</a>
                    </p>
                  </div>
                </div>";
                  redirect('interview.php'); 
        }else {
          $result = '<div class="alert alert-danger alert-dismissible" role="alert">
          <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
          <strong>Danger!</strong>'."$header".'<hr/>'."$message2".'</div>';
        }
     }

    }
      
?>
<!DOCTYPE html>
<html>
<head>
  <title>SignUp</title>
    <link rel="stylesheet" type="text/css" href="css/s.css">
  <link href="css/style.css" rel="stylesheet" type="text/css">
  <link href="css/font-awesome.css" rel="stylesheet" type="text/css">
  <link href="css/responsive.css" rel="stylesheet" type="text/css">
  <link href="css/magnific-popup.css" rel="stylesheet" type="text/css">
  <link href="css/animate.css" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
   <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        

  <script type="text/javascript" src="js/jquery.3.2.1.min.js"></script>
  <link rel="stylehseet" href="tilted-image.css">
  <script type="text/javascript" src="js/jquery-scrolltofixed.js"></script>
  <script type="text/javascript" src="js/jquery.easing.1.3.js"></script>
  <script type="text/javascript" src="js/jquery.isotope.js"></script>
  <script type="text/javascript" src="js/wow.js"></script>
  <script type="text/javascript" src="js/classie.js"></script>
  <script type="text/javascript" src="js/magnific-popup.js"></script>
  <style>
  #overlay {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: #000;
    filter:alpha(opacity=70);
    -moz-opacity:0.7;
    -khtml-opacity: 0.7;
    opacity: 0.7;
    z-index: 100;
    display: none;
    }
    .cnt223 a{
    text-decoration: none;
    }
    .popup{
    width: 100%;
    margin: 0 auto;
    display: none;
    position: fixed;
    z-index: 101;
    }
    .cnt223{
    min-width: 600px;
    width: 600px;
    min-height: 150px;
    margin: 100px auto;
    background: #f3f3f3;
    position: relative;
    z-index: 103;
    padding: 15px 35px;
    border-radius: 5px;
    box-shadow: 0 2px 5px #000;
    }
    .cnt223 p{
    clear: both;
        color: #555555;
        /* text-align: justify; */
        font-size: 20px;
        font-family: sans-serif;
    }
    .cnt223 p a{
    color: #d91900;
    font-weight: bold;
    }
    .cnt223 .x{
    float: right;
    height: 35px;
    left: 22px;
    position: relative;
    top: -25px;
    width: 34px;
    }
    .cnt223 .x:hover{
    cursor: pointer;
    }
  </style>
  
</head>


<body style="width: auto;">


  <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #e3f2fd;">
    
    <a href="#header" class="navbar-brand"><img src="img/small-logo.png" alt=""  height="40px" >UniqueMappersTeam</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">

      <ul class="navbar-nav">
        <li class="nav-item active">
          <a class="nav-link" href="index.php">Home </a>
        </li>
        <li class="nav-item">
         <a href="blog.php" class="nav-link">Blog</a>
          
        </li>
        <li class="nav-item">
          
          <a href="contact.php" class="nav-link">Contact us</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Participate
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <a href="signup.php">Be A Member<span class="sr-only">(current)</span></a></br>
              <a href="login.php">Login</a></br>
                   
            <a role="separator" class="divider"></a></br>
            <a class="dropdown-header">Recommended For You</a></br>
            <a href="https://www.youtube.com/">Learn How To Map</a></br>
            <a href="task.teachosm.org">Learn OSM</a></br>
        <a href="https://www.openstreetmap.org">Signup for OSM</a></br>
        <a href="https://www.osmgeoweek.org">weekly osm new</a>
          </div>
        </li>
      </ul>
    </div>
  </nav>
    
</head>
<body id="bodyback">
    <div class="jumbotron row">
        <div class="col col-lg-3 col-sm-3">
          <img src="img/logo.png" style="height:150px; width: 150px;">  
        </div>
        <div class="col col-lg-6 col-sm-6">
            <strong><h2>UniqueMappersTeam (UMT) Membership</h2></strong>
            <center><h2>Registration</h2></center>
            <h3>This form is for intending members of</h3>
            <h3>UniqueMappersTeam(UMT), University of Port Harcourt</h3>
        </div>
        <div class="col col-lg-3 col-sm-3">
           <img src="img/sto.jpg" style="height:150px; width: 150px;" class="pull-right"> 
        </div>
        
        
    </div>
    <section class="container" id="signupsection" id="enroll">
        <div><?php echo $result;?></div>
        <div class="row">
            <form class="form-horizontal" action="signup.php" method="POST" enctype="multipart/form-data" width= "auto">
                <div class="col col-lg-2 col-md-4 col-sm-11">
                  <label class="control-label col-lg-4 col-sm-9">passport*</label>
                   <div class="form-group col-lg-4 col-sm-8">
                    <input class="form-control" type="file" name="passport"  required="" style="height: 170px; width: 180px;" placeholder="Insert your Image">
                   </div>
                </div>
                <div class="col col-lg-5 col-md-4 col-sm-11 ">
                   <label class="control-label col-lg-4 col-sm-11">Name*</label>
                   <div class="form-group col-lg-6 col-sm-11">
                        <div>
                            <input class="form-control just" type="text" name="first_name" placeholder="SurName" required="" id="Fname"> 
                        </div>
                        
                        <div>
                            <input class="form-control just" type="text" name="last_name" placeholder="LastName" required="" id="Lname">
                        </div>
                    </div>  
                    

                   <label class="control-label col-lg-4 col-sm-9">Email*</label>
                   <div class="form-group col-lg-6 col-sm-6">
                    <input class="form-control" type="email" name="email" placeholder="Email" required="" id="email">
                   </div>
                   
                   <label class="control-label col-lg-4 col-sm-7">DOB*</label>
                   <div class="form-group col-lg-6 col-sm-7">
                    <input class="form-control" type="DATE" name="age" required="" id="dateofbirth">
                   </div>
                    <label class="control-label col-lg-4 col-sm-8">Phone Number*</label>
                    <div class="form-group col-lg-6 col-sm-9">
                        <input class="form-control" type="tel" name="phone" placeholder="Phone Number" required="" id="phone">
                    </div>
                    <label class='col col-lg-4 col-sm-8 control-label' name="sex">Sex*</label>
                    <div class='col col-lg-6 col-sm-9 input-group form-group '>
                        <span class="input-group-addon"><i class="fa fa-transgender" aria-hidden="true" ></i></span>
                        <div >
                            <label>
                                <input checked type='radio' name='sex' value='M' >
                                    <span class='labels'>Male</span>
                           </label>
                        </div >
                        <div >
                            <label>
                                <input type='radio' name='sex' value='F'>
                                    <span class='labels'>Female</span>
                           </label>
                        </div>
                    </div>
                    <label class='col col-lg-4  col-sm-8 control-label'>Do you have a Laptop PC.? </label>
                     <div class='col col-lg-6  col-sm-9 input-group form-group '>
                        <div >
                            <label>
                                <input checked type='radio' name='PC' value='Yes' >
                                    <span class='labels'>Yes</span>
                           </label>
                        </div >
                        <div >
                            <label>
                                <input type='radio' name='PC' value='No'>
                                    <span class='labels'>NO</span>
                           </label>
                        </div>
                    </div>
                </div> 
                <div class="col col-lg-5 col-sm-5"> 
                    <label class="control-label col-lg-6 col-sm-9">Matriculation Number (if avaliable)*</label>
                    <div class="form-group col-lg-6  col-sm-8">
                        <input class="form-control" type="text" name="matno"  id="department">
                    </div>  
                  <label class="control-label col-lg-6 col-sm-9">Department*</label>
                  <div class="form-group col-lg-6 col-sm-8">
                    <input class="form-control" type="text" name="dept"  required="" id="department">
                  </div>
                  <label class="control-label col-lg-6 col-sm-9">faculty*</label>
                  <div class="form-group col-lg-6 col-sm-8">
                    <input class="form-control" type="text" name="faculty"  required="" id="faculty">
                   </div> 
                    <LABEL class="control-label col-lg-6 col-sm-9">Level</LABEL>
                    <div class="col-lg-6 form-group col-sm-8">
                        <select class="form-control" name="level">
                              <option>--SELECT--</option>
                              <OPTION value="100">100 level</OPTION>
                              <OPTION value="200">200 level</OPTION>
                              <OPTION value="300">300 level</OPTION>
                              <OPTION value="400">400 level</OPTION>
                              <OPTION value="500">500 level</OPTION>
                            
                        </select>
                    </div>
                    <label class="control-label col-lg-6 col-sm-9">OSM UserName*</label>
                    <div class="form-group col-lg-6 col-sm-9">
                        <input class="form-control" type="text" name="osm_userName"  required="">
                        <p> if you don't have an  OSM username click on this <a href="https://www.openstreetmap.org"> link</a> to get one and continue the rigistration.</p>
                    </div> 
                    <LABEL class="control-label col-lg-6 col-sm-9">Membership Category</LABEL>
                    <div class="col-lg-6  col-sm-6 form-group">
                        <select class="form-control" name="member">
                              <option>--SELECT--</option>
                              <OPTION value="UnderGraduate">UnderGraduate</OPTION>
                              <OPTION value="Post-Graduate">Post-Graduate</OPTION>
                              <OPTION value="Senoir Friend">Senoir Friend</OPTION>
                              <OPTION value="Staff Member">Staff Member</OPTION>                       
                        </select>
                    </div>                
                     
                    
                </div> 
                <div class="row">
                    <div class="col col-lg-6 col-sm-9">
                            <label>
                                <input type='checkbox' name='terms' value='Yes' required="">
                                    I certify that by submitting this form, I agree to be contacted by the program personnel of UniquemappersTeam and its administrative team regarding my application or my intrest including agreement to be contacted for scientific study or surveys.
                           </label>
                    </div>
                    <div class="col col-lg-6 col-sm-9">
                        <button class="btn  btn-info btn-fill pull-right " type="submit" name="create">SignUp</button>
                    </div>
                </div>    
                         
            </form>
        </div>    
    </section>
    <footer class="footer">
        <div class="container">
            <div class="footer-logo"><a href="#"><img src="img/footer-logo.jpg" alt=""></a></div>
            <span class="copyright">&copy; UniqueMappersTeam . All Rights Reserved</span>
            <div class="credits">
                <a href="https://youthmappers.org/">visit Youth Mappers.</a> <br> <a href="https://humanitterianmappers.org/">Let's see humaniterian mappers.</a><br>
                <a href="http://openstreetmap.org">Let's Map now!</a>
            </div>
        </div>
    </footer>
</body>
</html>           