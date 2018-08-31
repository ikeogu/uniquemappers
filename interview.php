<?php
include_once 'include/interview.php';
include_once 'include/function.php';
 $result = '';
 
    if(isset($_POST['create'])){
      $member = Interview::instantiate($_POST);
      $header = 'Registration Status';
      $message =' Yours registration was successful.';
      $message2= 'Oops something went wrong.';
      if($member){
         $member->attach_file($_FILES['passport']);
        if ($member->save_with_file()) {
    
          $result = '<div class="alert alert-success alert-dismissible" role="alert">
                  <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                  <strong>Success!</strong>'."$header".'<hr/>'."$message".'</div>';

                  redirect('index.php');
        }else {
          $result = '<div class="alert alert-danger alert-dismissible" role="alert">
          <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
          <strong>Danger!</strong>'."$header".'<hr/>'."$message2".'</div>';
        }
     }

    } 
    //redirect to interview
         //redirect('login.php');
?>
<!DOCTYPE html>
<html>
<head>
  <title>interview</title>
     <link rel="icon" href="small-logo.png" type="image/png">
  <link rel="shortcut icon" href="favicon/favicon.ico" type="img/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
    <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,800italic,700italic,600italic,400italic,300italic,800,700,600' rel='stylesheet' type='text/css'>

    <link href="css/bootstrap.css" rel="stylesheet" type="text/css">
    <link href="css/style.css" rel="stylesheet" type="text/css">
    <link href="css/font-awesome.css" rel="stylesheet" type="text/css">
    <link href="css/responsive.css" rel="stylesheet" type="text/css">
    <link href="css/magnific-popup.css" rel="stylesheet" type="text/css">
    <link href="css/animate.css" rel="stylesheet" type="text/css">

    <script type="text/javascript" src="js/jquery.1.8.3.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.js"></script>
    <script type="text/javascript" src="js/jquery-scrolltofixed.js"></script>
    <script type="text/javascript" src="js/jquery.easing.1.3.js"></script>
    <script type="text/javascript" src="js/jquery.isotope.js"></script>
    <script type="text/javascript" src="js/wow.js"></script>
    <script type="text/javascript" src="js/classie.js"></script>
</head>
<body id="bodyback">
    <div class="jumbotron row">
        <div class="col col-lg-3">
          <img src="img/logo.png" style="height:150px; width: 150px;">  
        </div>
        <div class="col col-lg-6">
            <strong><h2>UniqueMappersTeam (UMT) Membership</h2></strong>
            <center><h2>Registration</h2></center>
            <h3>This form is for intending members of</h3>
            <h3>UniqueMappersTeam(UMT), University of Port Harcourt</h3>
        </div>
        <div class="col col-lg-3">
           <img src="img/sto.jpg" style="height:150px; width: 150px;" class="pull-right"> 
        </div>
        
        
    </div>
    <section class="container" id="signupsection" id="enroll">
        
        <div class="row">
            <form class="form-horizontal" action="interview.php" method="POST" enctype="multipart/form-data">
               <div class="col-lg-4">
                <?php echo $result;?>
              </div> 
              <div class="col col-lg-4 ">
                <label class="control-label col-lg-6">Name*</label>
                <div class="form-group col-lg-6">
                        <div>
                            <input class="form-control just" type="text" name="name" placeholder="Full Name" required="" id="Fname"> 
                        </div>
                </div>                
                <label class="control-label col-lg-6">Dept*</label>
                <div class="form-group col-lg-6">
                    <input class="form-control" type="text" name="dept" placeholder="Department" required="" id="email">
                </div>
                <label class="control-label col-lg-6">What mapping software do you have on your mobile phone or PC.? *</label>
                <div class="form-group col-lg-6">
                    <input class="form-control" type="text" name="software"  id="email">
                </div>
                <div class="row">
                  <div class="col-lg-12">
                    <label class="control-label">Highest Grade Course (DEPARTMENTAL)*</label>
                  <div class="form-group ">
                    <input class="form-control just" type="text" name="hcourse" id="Fname"> 
                          
                  </div>   
                  <label class="control-label">Lowest Grade Course (DEPARTMENTAL) *</label>
                  <div class="form-group">
                      <input class="form-control" type="text" name="lcourse"  id="email">
                  </div>
                  <label class="control-label ">Current C.G.P.A *</label>
                  <div class="form-group">
                      <input class="form-control" type="text" name="cgpa"  id="email">
                  </div>
                  </div>
                  
                </div>
              </div>
                 
                
              <div class='col col-lg-4'>   
                   <label class="control-label col-lg-6">Have you had any contact with the UniqueMappersTeam  before now ?*</label>
                    <div class='col col-lg-6 input-group form-group '>
                      <label>
                        <input checked type='radio' name='join' value='yes' >
                          <span class='labels'>Yes</span>
                        </label>
                    </div >
                      <div>
                      <label>
                        <input type='radio' name='join' value='no'>
                          <span class='labels'>No</span>
                        </label>
                      </div>  
                    <label class="control-label ">Do you have an OSM username*</label>
                    <div class='col col-lg-4 input-group form-group '>
                      <label>
                        <input checked type='radio' name='username' value='yes' >
                          <span class='labels'>Yes</span>
                        </label>
                      </div >
                      <div class="col col-lg-4">
                      <label>
                        <input type='radio' name='username' value='no'>
                          <span class='labels'>No</span>
                        </label>
                    </div> 
                    <label class="control-label ">Have you ever mapped any task on HOT or OSM?*</label>
                    <div class='col col-lg-6 input-group form-group '>
                      <label>
                        <input checked type='radio' name='mapped' value='yes' >
                          <span class='labels'>Yes</span>
                        </label>
                    </div >
                    <div >
                      <label>
                        <input type='radio' name='mapped' value='no'>
                          <span class='labels'>No</span>
                        </label>
                    </div>
                    <label class="control-label ">If your answer to the previous question is YES, WHAT task did you map and WHEN?*</label>
                    <div class="form-group col-lg-6">
                    <input class="form-control" type="text" name="task"  id="email">
                   </div> 
                   <div class="form-group col-lg-6">
                    <input class="form-control" type="date" name="date"  id="email">
                   </div> 
                    
                    
                    <label class='col control-label'>Do you have a Laptop PC.? </label>
                     <div class='col col-lg-6 input-group form-group '>
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
                        <div >
                            <label>
                                <input type='radio' name='PC' value='will get on soon'>
                                    <span class='labels'>I'll get one soon </span>
                           </label>
                        </div>
                    </div>
                    <label class='col control-label'>Do you enjoy mpping? </label>
                     <div class='col col-lg-6 input-group form-group '>
                        <div >
                            <label>
                                <input checked type='radio' name='mapping' value='Yes' >
                                    <span class='labels'>Yes</span>
                           </label>
                        </div >
                        <div >
                            <label>
                                <input type='radio' name='mapping' value='No'>
                                    <span class='labels'>NO</span>
                           </label>
                        </div>
                        <div >
                            <label>
                                <input type='radio' name='mapping' value='just a little'>
                                    <span class='labels'>just little </span>
                           </label>
                        </div>
                    </div>
                    <label class='col control-label'>What level of commitment do you intend to give UniqueMappersTeam? </label>
                     <div class='col col-lg-6 input-group form-group '>
                        <div >
                            <label>
                                <input checked type='radio' name='commitment' value='Full' >
                                    <span class='labels'>Full</span>
                           </label>
                        </div >
                        <div >
                            <label>
                                <input type='radio' name='commitment' value='Partial'>
                                    <span class='labels'>Partial</span>
                           </label>
                        </div>
                        <div >
                            <label>
                                <input type='radio' name='commitment' value='Observing'>
                                    <span class='labels'>Observing</span>
                           </label>
                        </div>
                    </div>
                </div>  
                    
                  </div>
                    <div class="col ">
                        <button class="btn  btn-info btn-fill pull-right " type="submit" name="create">Submit</button>
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