<?php
    include_once '../include/project.php';
   
    $result = '';
  
    if(isset($_POST['create'])){
        
      $project = Project::instantiate($_POST);
      $header = ' Upload Status ';
      $message ='Project  was successfully uploaded.';
      $message2= 'Oops! seems somthing was missing .';
      $message3= 'file upload was successful.';
      if($project){ 
        $project->attach_file($_FILES['passport']) ;

            if ($project->save_with_file()) {
                 $result = '<div class="alert alert-success alert-dismissible" role="alert">
                  <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                  <strong>Success!</strong>'." $header ".'<hr/>'." $message".'</div>';
            }else {
                    $result = '<div class="alert alert-danger alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <strong>Oops! </strong>'." $header ".'<hr/>'." $message2 ".'</div>';
        }
    }  
}

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

        <title> Dashboard </title>

        <meta name="viewport" content="width=device-width" />
         <link href="assets/css/animate.min.css" rel="stylesheet"/>

        <!--  Light Bootstrap Table core CSS    -->
        <link href="assets/css/light-bootstrap-dashboard.css?v=1.4.0" rel="stylesheet"/>


        <!--  CSS for Demo Purpose, don't include it in your project     -->
        <link href="assets/css/demo.css" rel="stylesheet" />


            <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
            <link href="css/font-awesome.min.css" rel="stylesheet">
            <link href="css/style.css" rel="stylesheet">
            <link href="css/style2.css" rel="stylesheet">
        <script src="js/jquery-2.1.1.min.js" type="text/javascript"></script>
        <script src="js/jquery-ui.js" type="text/javascript"></script> 
        <link href="css/jquery-ui.css" rel="stylesheet" media="screen" />
        <link href="css/oclayerednavigation.css" rel="stylesheet">         
        <script src="js/oclayerednavigation.js" type="text/javascript"></script>
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" media="screen" />
        <script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
        <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link href="css/simple-line-icons.css" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,400i,300,700" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Josefin+Sans" />
        <link href='https://fonts.googleapis.com/css?family=Josefin+Sans:400,600,700' rel='stylesheet' type='text/css' />
        <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet"> 
        <link href="https://fonts.googleapis.com/css?family=Poppins:400,500,600,700" rel="stylesheet"> 
        <link href='https://fonts.googleapis.com/css?family=Lato:400,700,900' rel='stylesheet' type='text/css' />
        <link href='https://fonts.googleapis.com/css?family=Raleway:400,600,700,800,900,500' rel='stylesheet' type='text/css' />
        <link href="css/stylesheet2.css" rel="stylesheet">
        <link href="css/custommenu.css" rel="stylesheet">
        <script src="js/customenu.js" type="text/javascript"></script>
        <script src="js/custommenu.js" type="text/javascript"></script>
        <script src="js/mobile_menu.js" type="text/javascript"></script>
        <link href="css/owl.carousel.css" rel="stylesheet">
        <script src="js/owl.carousel.js" type="text/javascript"></script>
        <script src="js/jquery.elevatezoom.js" type="text/javascript"></script>
        <script src="js/jquery.nivo.slider.js" type="text/javascript"></script>
        <link href="css/animate.css" rel="stylesheet" type="text/css">
        <link href="css/ocslideshow.css" rel="stylesheet">
        <script src="js/main.js" type="text/javascript"></script>
        <script src="https://maps.googleapis.com/maps/api/js?v=3.exp"></script>
        <link href="css/featuredslider.css" type="text/css" rel="stylesheet" media="screen" />
        <link href="css/owl.theme.css" type="text/css" rel="stylesheet" media="screen" />
        <link href="css/ocsvegamenu.css" type="text/css" rel="stylesheet" media="screen" />
        <link href="css/ocslideshow.css" type="text/css" rel="stylesheet" media="screen" />
        <script src="js/common9.js" type="text/javascript"></script>
        <link href="https://booksellers.ng/image/catalog/favicon1.png" rel="icon" />
        <script src="js/jquery.bpopup.min.js" type="text/javascript"></script>
            
        <!--     Fonts and icons     -->
        <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
        <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
        <link href="assets/css/pe-icon-7-stroke.css" rel="stylesheet" />
    </head>
      
       <div class=" ">
          <div class="sidebar" data-color="green" data-image="assets/img/sidebar-5.jpg">

            <!--

                Tip 1: you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple"
                Tip 2: you can also add an image using data-image tag

            -->

           <div class="sidebar-wrapper">
              <div class="logo">
                <a href="#" class="simple-text">
                                    ADMIN DASHBOARD
                </a>
              </div>
              <ul class="nav">                          
                <li>
                  <a href="user.php">
                    <i class="pe-7s-user active"></i>
                    <p>User Profile</p>
                  </a>
                </li>                         
                <li>
                  <a href="addimage.php">
                    <i class="pe-7s-smile"></i>
                      <p>Upload Pictures</p>
                  </a>
                </li>               
                  <li>
                    <a href="addproject.php">
                      <i class="pe-7s-note2"></i>
                       <p>Add a new project</p>
                    </a>
                    </li>
                    <li>
                       <a href="makeblog.php">
                         <i class="pe-7s-graph"></i>
                            <p>make a blog</p>
                        </a>
                    </li>
                    <li>
                      <a href="../blog.php">
                         <i class="pe-7s-graph"></i>
                         <p>see blog</p>
                      </a>
                    </li>
                            
                    <li>
                      <a href="../index.php">
                        <i class="pe-7s-home"></i>
                        <p>HOME PAGE</p>
                      </a>
                    </li>
                    <li>
                       <a href="logout.php">
                          <i class="pe-7s-bandaid"></i>
                          <p>Log out</p>
                        </a>
                    </li>
                  </ul>
                </div>
              </div>
          </div>    
      
  
       <div class="content col-md-offset-2 col-md-8 col-sm-8 col-sm-offset-6   col-lg-offset-3">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Add Project</h4>
                            </div>
                            <div class="content">
                                <form action="addproject.php" method="POST" enctype="multipart/form-data">
                                    <div>
                                        <?php echo $result;?>
                                    </div>
                                     <div class="form-group">
                                        <label>Logo</label>
                                        <input type="file" class="form-control"   name="passport"  >
                                    </div>
                                    <div class="row">   
                                        <div class="col-md-4 col-lg-6">
                                            <div class="form-group">
                                                 <label>Project Name</label>
                                                    <input type="text" class="form-control" placeholder="Name"  name="name">
                                            </div>
                                        </div>
                                       
                                    </div>    
                                        
                                    <div class="row">
                                
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                    <label>Date </label>
                                                    <input type="date" class="form-control"   name="date">
                                                </div>
                                        </div>
                                    
                                        <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Subheading</label>
                                                    <input type="text" class="form-control"  name="subheading" >
                                                </div>
                                        </div>
                                        
                                    </div>
                                     
                                    <div class="row">
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <label>Details</label>
                                                    <textarea type="text" class="form-control" placeholder="Description" name="body" ></textarea>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-4">
                                                <div class="form-group">
                                                <button type="submit" class="btn btn-info btn-fill pull-right" name="create" >Up Load</button>
                                            </div>
                                            </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div> 
            </div>
        </div>   
 


</body>
</html>
