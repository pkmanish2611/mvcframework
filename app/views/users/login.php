 <?php
    include  ROOT . '/views/includes/header.php';
    ?>



 <div class="container  px-1 px-md-5 px-lg-1 px-xl-5 py-5 mb-2 mx-auto">
      
     <?php
        if ($data["emailError"] or $data["passwordError"]) { ?>
         <div class="alert alert-danger alert-dismissible fade show mx-5 px-5" role="alert">
             <?php if ($data["emailError"]) { ?>
                 <li><?php echo $data["emailError"]; ?></li>
             <?php }
                if ($data["passwordError"]) { ?>
                 <li><?php echo $data["passwordError"]; ?></li>
                 <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
             <?php } ?>
         </div>
     <?php } ?>
     <form id="register-form" method="POST">
         <div class="card card0 border-0 ">
             <div class="row px-3 mb-6 justify-content-between">
                 <div class="line"></div> <small class="or text-center">Login</small>
                 <div class="line"></div>
             </div>
             <div class="row d-flex">
                 <div class="col-lg-6">
                     <div class="card1 pb-3">
                         <div class="row px-3 justify-content-center mt-4 mb-5 border-line"> <img src="<?php echo ASSETS ?>img/logo/library.png" class="image"> </div>
                     </div>
                 </div>
                 <div class="col-lg-6">
                     <div class="card2 card border-0 px-4 py-5">
                         <div class="row px-3">
                             <label class="mb-1">
                                 <h6 class="mb-0 text-sm">Email Address<span class="note text-danger">*</span></h6>
                             </label>
                             <input class="mb-3" type=" email" name="email" placeholder="Enter a valid email address">
                         </div>
                         <div class="row px-3">
                             <label class="mb-1">
                                 <h6 class="mb-0 text-sm">Password<span class="note text-danger">*</span></h6>
                             </label> <input type="password" name="password" placeholder="Enter password">
                         </div>
                         <!--style-->
                         <div class="row col-sm-14 px-3 mb-4 " style="text-align:right;">
                             <a href="#" class="ml-auto mb-0 text-sm  " data-bs-toggle="modal" data-bs-target="#loginModel">Forgot Password?</a>
                         </div>
                         <div class=" col mb-4 px-3">
                             <button type="submit" class="btn btn-blue text-center">Sign in</button>
                             <small class="font-weight-bold">Don't have an account? <a class="text-danger" href="<?php echo URLROOT ?>users/register">Register</a></small>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </form>
 </div>

 <div class="modal fade" id="loginModel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog modal-dialog-centered modal-xl">
         <div class="modal-content">
             <div class="modal-header" style="background: rgba(77, 244, 174, 100);">
                 <h5 class="modal-title text-white" id="exampleModalLabel">Verify Your Email Address</h5>
                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
             </div>
             <div class="modal-body">
                 <div class="row px-3 text-center">
                     <label class="mb-1">
                         <h6 class="mb-4 text-sm">Please enter your email for password reset link</h6>
                     </label>
                 </div>
                 <div class="row d-flex mb-4">
                     <div class="col-lg-5 text-center align-item-center">
                         <h6 class="mb-0 text-sm">Email Address<span class="note text-danger">*</span></h6>
                     </div>
                     <div class="col-lg-5">
                         <input class="mb-4" type=" text" name="email" placeholder="Enter a valid email address">
                         <a type="submit" class="mb-4 text-primary font-weight-bold">Click here to request link</a>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </div>



 <?php
    include  ROOT . '/views/includes/footer.php';
    ?>