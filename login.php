<?php
    include_once 'include/session.php';
    include_once 'include/function.php' ;
    include_once 'include/team.php';

    $result ='';
    
    if (isset($_POST['login'])) {
        $email = $_POST['email'];
        $member = Team::authenticate($email);      
        $header = 'status';
        $message2= "Oops, you can't Login check your incorrect password or email.";

        if($member){
        
            $session->login($member);

            redirect('interview.php');
        
        } else {
            
            $result = '<div class="alert alert-danger alert-dismissible" role="alert">
                      <button type="button" class="close" data-dismiss="alert"> <span aria-hidden="true"> &times; </span><span class="sr-only">Close </span> </button>
                      <strong> Oop! </strong>'."$header".'<hr/>'."$message2".'</div>';
        }
    
    }
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
     <link rel="stylesheet" type="text/css" href="css/s.css">
  <link href="css/style.css" rel="stylesheet" type="text/css">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="css/font-awesome.min.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">
        <link href="css/responsive.css" rel="stylesheet">

    <title>Login</title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=yes' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <!-- Bootstrap core CSS     -->
    <link href="css/bootstrap.min.css" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="css/animate.min.css" rel="stylesheet"/>

    <!--  Light Bootstrap Table core CSS    -->
    <link href="css/light-bootstrap-dashboard.css?v=1.4.0" rel="stylesheet"/>


    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="css/demo.css" rel="stylesheet" />


    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="css/pe-icon-7-stroke.css" rel="stylesheet" />
</head>

<body>

        <nav class="main-nav-outer" id="test">
      <!--main-nav-start-->
      <div class="container">
        <ul class="main-nav">
          <li><a href="#service">Projects</a></li>
          <li><a href="blog.php">News</a></li>
          <li><a href="#contact">About us</a></li>
          <li class="small-logo"><a href="#header"><img src="img/small-logo.png" alt=""></a></li>
          <li><a href="#">Get Involve</a></li>
          <li><a href="#team">Amazing Team</a></li>
          <li><a href="#contact">Contact us</a></li>
        </ul>
        <a class="res-nav_click" href="#"><i class="fa fa-bars"></i></a>
      </div>
    </nav>
            <!-- header bottom -->
            <div class="header-bottom">
                <div class="row">
                    <div class="col-sm-12">
                        <nav class="navbar navbar-default">
                            <div class="container">
                                <!-- Brand and toggle get grouped for better mobile display -->
                                <div class="navbar-header">
                                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#header-bottom" aria-expanded="false">
                                        <span class="sr-only">Toggle navigation</span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                    </button>
                                </div>
                            </div>
                        </nav>
                    </div>         
            </div>  
                <div class="logo-add">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="logo"><i class="fa fa-diamond"></i> LOGin</div>
                        </div>
                        
                    </div>
                </div>
            </div>
            

  <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="header">
                                <div class="row">
                                        <div class="col-lg-4 col-md-4 ">
                                           <?php echo $result?> 
                                        </div>
                                </div>
                            </div>
                            <div class="content">
                                <form action="login.php" method="POST" id="loginForm" name="loginForm">
                                    
                                    <div class="row">
                                       <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Email</label>
                                                <input type="email" class="form-control"   name="email"  required="" placeholder="your Email@example.com">
                                            </div> 
                                        </div>    
                                       
                                        <div class="col col-lg-8">
                                            <button  type="submit" class="btn btn-success btn-fill pull-right"  name="login" style="color:white">Login </button>
                                            <a href="Signup.php" type="button" class="btn btn-success btn-fill pull-left" style="color: white" >Signup</a>
                                         </div>
                                    </div>
                                
                                </form> 
                            </div>
                        </div> 
                    </div>
                </div>
            </div>
        </div>
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