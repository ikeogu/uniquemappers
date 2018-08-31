<?php 
include_once '../include/admin.php';
include_once '../include/session.php';
include_once '../include/function.php';

if(!($session->is_logged_in())) redirect('login.php');
  $result = '';
    $admin = Admin::find($session->user_id);
     if(isset($_POST['update'])){
                  $admin = Admin::instantiate($_POST);
                  $admin->admin_id = $admin_id;
                  $header = 'Update status';
                  $message = 'update was successful';
                  $message2 = 'OOPs! an error occured . ';
                                        
              if($admin)
                if ($admin->update()) {
                     echo  $result = '<div class="alert alert-success alert-dismissible" role="alert">
      <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
      '."$header".'<br/>'.'<hr/>'."$message".'</div>';
                 }else {
                      echo $result = '<div class="alert alert-danger alert-dismissible" role="alert">
      <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
      '."$header".'<br/>'.'<hr/>'."$message2".'</div>';
                    }
    }
?>
<!DOCTYPE html>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title> Dashboard </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
    <link href="assets/css/animate.min.css" rel="stylesheet"/>
    <!--  Light Bootstrap Table core CSS    -->
    <link href="assets/css/light-bootstrap-dashboard.css?v=1.4.0" rel="stylesheet"/>   
    
    
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,400i,300,700" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Josefin+Sans" />
    <link href='https://fonts.googleapis.com/css?family=Josefin+Sans:400,600,700' rel='stylesheet' type='text/css' />
    
            <link href="css/style.css" rel="stylesheet">
            <link href="css/style2.css" rel="stylesheet">
       
        <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
        
       
        <link href="https://kodhus.com/kodhus-ui/kodhus-0.1.0.min.css" rel="stylesheet" type="text/css">   
        
    <script src="https://kodhus.com/kodhus-ui/kodhus-0.1.0.min.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="assets/js/JQUERY.js"></script>
    
    <script type="text/javascript" src="assets/js/light-bootstrap-dashboard.js"></script>
           
        <!--     Fonts and icons     -->
    
    <link href="assets/css/pe-icon-7-stroke.css" rel="stylesheet" />
  </head>
  <body>
   
       <div class=" col-md-6 col-sm-4">
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
    
          <div class=" col-md-offset-2 col-md-8 col-sm-8 col-sm-offset-6   col-lg-offset-3 done">
          <div class="content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="card">
                                    <div class="header">
                                        <h4 class="title"> Profile</h4>
                                    </div>
                                    <div class="content">
                                        <form>
                                            <div class="row">
                                                
                                               
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Email address</label>
                                                        <input type="email" class="form-control"  value="<?php echo $admin->email;?>">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>First Name</label>
                                                        <input type="text" class="form-control"  value="<?php echo $admin->fname;?>">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Last Name</label>
                                                        <input type="text" class="form-control"  value="<?php echo $admin->lname;?>">
                                                    </div>
                                                </div>
                                            </div>

                                            

                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>City</label>
                                                        <input type="text" class="form-control" value="<?php echo $admin->city;?>">
                                                    </div>
                                                </div>
                                                
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Phone</label>
                                                        <input type="number" class="form-control" value="<?php echo $admin->phone;?>">
                                                    </div>
                                                </div>
                                            </div>

                                           

                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card card-user">
                                    <div class="image">
                                        <img src="assets/img/full-screen-image-3.jpg" alt="..."/>
                                    </div>
                                    <div class="content">
                                        <div class="author">
                                             <a href="#">
                                            <img class="avatar border-gray" src="assets/img/admin/<?php echo $admin->passport;?>" alt="..."/>

                                              <h4 class="title"  style="color: green" value="<?php $admin->fname AND  $admin->lname;?>"><br />
                                                 <small value="<?php $admin->email;?>" style="color: green"></small>
                                              </h4>
                                            </a>
                                        </div>
                                        <p class="description " > UniqueMappersTeam Techative of map the difference
                                        </p>
                                    </div>
                                    <hr>

                                   <div class="text-center">
                                        <button href="#" class="btn btn-simple"><i class="fa fa-facebook-square"></i></button>
                                        <button href="#" class="btn btn-simple"><i class="fa fa-twitter"></i></button>
                                        <button href="#" class="btn btn-simple"><i class="fa fa-google-plus-square"></i></button>

                                    </div>
                                </div>
                            </div>
                     </div>
                        
</body>
</html>