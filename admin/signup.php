<?php
    include_once '../include/admin.php';

    $result = '';
  
    if(isset($_POST['create'])){
      $admin = Admin::instantiate($_POST);
      $header = 'Registration Status ';
      $message ='Your registration was successsfully.';
      $message2= 'Oops! seems somthing was missing .';
      if($admin){ $admin->attach_file($_FILES['passport']);

            if ($admin->save_with_file()) {
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
  <title>admin login</title>
         <link href="css/style.css" rel="stylesheet">
            <link href="css/style2.css" rel="stylesheet">
            <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
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
<body>

  <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Signup</h4>
                                <div class="" >
                                        <?php echo $result;?>
                                </div>
                            </div>
                            <div class="content">
                                <form action="signup.php" method="post" enctype="multipart/form-data">
                                    
                                    <div class="row" style="padding-left: 20px">
                                       <div class="col-md-5 col-lg-3">
                                            <div class="form-group">
                                                <label>passport</label>
                                                <input type="file" class="form-control"   name="passport"  required="" style="height: 150px; width: 150px;">
                                            </div> 
                                        </div>
                                        <div class="row">    
                                           
                                            <div class="col-md-4 col-lg-4">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Email address</label>
                                                    <input type="email" class="form-control" placeholder="Email" name="email">
                                                </div>
                                            </div>
                                        </div>

                                    <div class="row" style="padding-left: 25px">
                                        <div class="col-md-4 col-lg-4">
                                            <div class="form-group">
                                                <label>First Name</label>
                                                <input type="text" class="form-control" placeholder="First Name"  name="fname">
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-lg-4">
                                            <div class="form-group">
                                                <label>Last Name</label>
                                                <input type="text" class="form-control" placeholder="Last Name" name="lname">
                                            </div>
                                        </div>
                                       
                                    </div>

                                    
                                    
                                    <div class="row" style="padding-left: 25px">
                                        <div class="col-md-12 col-lg-4">
                                            <div class="form-group">
                                                <label>password</label>
                                                <input type="password" class="form-control" placeholder="password" name="hash" >
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row" style="padding-left: 25px">
                                        <div class="col-md-12 col-lg-4">
                                            <div class="form-group">
                                                <label>confirm password</label>
                                                <input type="password" class="form-control" placeholder="confirm password" name="" >
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row" style="padding-left: 25px">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>City</label>
                                                <input type="text" class="form-control" placeholder="City" name="city" >
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Phone</label>
                                                <input type="number" class="form-control" placeholder="phone" name="phone" >
                                            </div>
                                        </div>
                                    </div>

                                   

                                    <button type="submit" class="btn btn-info btn-fill pull-right" name="create" >Sign up</button>
                                    <div class="clearfix"></div>
                                    <a href="login.php">Login</a>
                                </form>
                            </div>
                        </div>
                    </div>
                </div> 
            </div>
        </div>               
</body>
</html>              