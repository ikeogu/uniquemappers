<?php
    include_once 'header.php';
    include_once '../include/blog.php';
       $result = '';
    if (isset($_POST['click'])){
        $blog = Blog::instantiate($_POST);
       

        if($blog){ $blog->attach_file($_FILES['image']);
            if ($blog->save_with_file()){
                    $result = "<div class='alert alert-success alert-dismissable'>
                                    <a href='#' class = 'close' data-dismiss='alert' aria-label='close'>&times;</a>
                                    <h4 class='text-center'><strong>FAQs Submitted Successfully</strong></h4>
                                    <p class='text-center'>Thank you for Sharing your FAQs with Us.</p>
                                    </div>";
                }else {
                  $result = "<div class='alert alert-danger alert-dismissable'>
                    <a href='#' class = 'close' data-dismiss='alert' aria-label='close'>&times;</a>
                    <h4 class='text-center'><strong>Oops.. Something went Wrong.</strong></h4>
                    <p class='text-center'>Please check your Inputs and try again.</p>
                    </div>";
                }
        }

            
    }

?>


   <div class="section section-header  col-md-offset-2 col-md-8 col-sm-8 col-sm-offset-6   col-lg-offset-3 done">
            <div class="parallax filter filter-color-black">
                <div class="container">
                    <div class="content">

                        <?php 
                            echo "$result";
                        ?>                   
                    </div>

                </div>
            </div>
        </div>


        
        <div class="section section-our-team-freebie">
            <div class="parallax filter">
                <div class="container">
                    <div class="title-area">
                        <h2 class="text-white">Blog Form.</h2>
                    </div>
                    <div class="col-md-offset-2 col-md-6 col-sm-4 col-md-offset-2" style="text-align: center;">
                        <div class="separator line-separator">♦</div>
                            <form action="makeblog.php" method="post" enctype="multipart/form-data">              
                                <div class="col-md-offset-2 col-md-8 col-sm-4 col-md-offset-2" style="text-align: center;">
                                    <h3>Write Your Blog:</h3>
                                    <div class="separator line-separator">♦</div>
                                    <div class="form-group">
                                        <h4>Image</h4>
                                        <input type="file" name="image" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <h4>Posted By</h4>
                                        <input type="text" name="name" class="form-control">
                                    </div> 
                                    <div class="form-group">
                                        <h4>title</h4>
                                        <input type="text" name="title" class="form-control">
                                    </div>  
                                    <div class="form-group">
                                        <h4>Tags</h4>
                                        <input type="text" name="tags" class="form-control">
                                    </div> 
                                    <div class="form-group">
                                        <h4>Tell story.</h4> 
                                        <textarea class="form-control" rows="50" name="text" required="" style="height:150px" maxlength="300">                        
                                       </textarea>
                                    </div>
                                </div>
                            

                            <div class="button-get-started">
                                 <input class="btn btn-default btn-fill btn-lg " role="button" name="click" type="submit" aria-pressed="true">
                            </div>
                      </form>  
                    </div>

              </div>
         </div>   
        
</div>
</body>
</html>
   