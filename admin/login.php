<?php
    include_once '../include/admin.php';
    include_once '../include/session.php';
     include_once '../include/function.php';

    $result ='';
    if(isset($_POST['login'])){
      $email = $_POST['email'];

      $admin = Admin::authenticate($email);

      $header = 'Registration Status';
      $message ='Admin  Loggin successsfully.';
      $message2= "Admin  Loggin Failed.";

      if($admin){
        $session->login($admin);

        redirect('user.php');
      } else {
          $result = '<div class="alert alert-danger alert-dismissible" role="alert">
          <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>

        <strong> Oops!</strong>'."$header".'<hr/>'."$message2".'</div>';
      }
    }


?>
<!DOCTYPE html>
<html>
<head>
  <title>admin login</title>
         <link href="css/style.css" rel="stylesheet">
            <link href="css/style2.css" rel="stylesheet">
            <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
        <script src="js/jquery-2.1.1.min.js" type="text/javascript"></script>
        <script src="js/jquery-ui.js" type="text/javascript"></script> 
        <link href="css/jquery-ui.css" rel="stylesheet" media="screen" />
        <link href="css/oclayerednavigation.css" rel="stylesheet">         
        <script src="js/oclayerednavigation.js" type="text/javascript"></script>
        <link href="css/bootstrap.min.css" rel="stylesheet" media="screen" />
        <script src="js/bootstrap.min.js" type="text/javascript"></script>
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
            
       
        <link href="assets/css/pe-icon-7-stroke.css" rel="stylesheet" />
</head>
<body>
    <div class="content" style="padding-top: 150px; margin: 50px;">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-8  col-sm-8">
                                <div class="card">
                                    <div class="header">
                                        <div class="row">
                                                <div class="col-lg-4 col-md-4 col-sm-4">
                                                   <?php echo $result?> 
                                                </div>
                                        </div>
                                    </div>
                                    <div class="content">
                                        <form action="login.php" method="POST" id="loginForm" name="loginForm">
                                            
                                            <div >
                                               <div class="col-md-6 col-sm-6">
                                                    <div class="form-group">
                                                        <label>Email</label>
                                                        <input type="email" class="form-control"   name="email"  required="" placeholder="your Email@example.com">
                                                    </div> 
                                                </div> 
                                            </div>
                                            
                                            <div class="row">   
                                                <div class="col col-lg-8 col-sm-6 col-md-6">
                                                    <button  type="submit" class="btn btn btn-default" role='button'"  name="login" style="color: white">Login </button>
                                                    
                                                    <a href="signup.php" class="btn btn btn-default" role='button' " style="color: white" >Signup</a>
                                                 </div>
                                            </div>
                                        
                                        </form> 
                                    </div>
                                </div> 
                            </div>
                        </div>
                    </div>
                </div>
            <div>
</body>
</html>