 <?php
    include  ROOT . '/views/includes/header.php';
    ?>

 <div class="container  px-1 px-md-5 px-lg-1 px-xl-5 py-5 mx-auto">
     <?php if ($data["emailError"] or $data["passwordError"] or $data["passwordError"] or $data['confirmPasswordError']) { ?>
         <div class="alert alert-danger alert-dismissible fade show mx-5 px-5" role="alert">
             <?php if ($data['usernameError']) { ?>
                 <li><?php echo $data['usernameError']; ?></li>
             <?php }
                if ($data["emailError"]) { ?>
                 <li><?php echo $data["emailError"]; ?></li>
             <?php }
                if ($data["passwordError"]) { ?>
                 <li><?php echo $data["passwordError"]; ?></li>
             <?php }
                if ($data['confirmPasswordError']) { ?>
                 <li><?php echo $data['confirmPasswordError']; ?></li>
                 <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
             <?php } ?>
         </div>
     <?php }
        if ($data['message']) { ?>
         <div class="alert alert-success text-center alert-dismissible fade show mx-5 px-5" role="alert">
             <h6 class="text-success">hola ! registration successful<i class="bi bi-emoji-smile-fill"></i></h6>
             <p>Before proceeding, please check your email <strong> <?php echo $data["email"]; ?> </strong>for a verification link. if you did not receive the email,</p>
             <a class="text-primary py-4">Click here to request another .</a>
             <a href="<?php echo URLROOT ?>users/login" data-toggle="tooltip" data-placement="top" title="Go to login page" type="button" class="btn-close" aria-label="Close"></a>
         </div>
     <?php }
        if ($data['errorMessage']) { ?>
         <div class="alert alert-danger text-center alert-dismissible fade show mx-5 px-5" role="alert">
             <h6 class="text-danger">hola ! registration unsuccessful<i class="bi bi-emoji-frown-fill"></i></h6>
             <p>Something went wrong</p>
             <a class="btn btn-danger-rounded" data-bs-dismiss="modal">Try again</a>
         </div>
     <?php } ?>
     <div class="card card0 border-0">
         <div class="row px-3 mb-8 justify-content-between">
             <div class="line"></div> <small class="or text-center px-0">Register</small>
             <div class="line"></div>
         </div>
         <div class="row d-flex">
             <div class="col-lg-6">
                 <div class="card1 pb-3">
                     <div class="row px-3 justify-content-center mt-4 mb-5 border-line"> <img src="<?php echo ASSETS ?>img/logo/library.png" class="image"> </div>
                 </div>
             </div>
             <div class="col-lg-6">
                 <form id="register-form" method="POST">
                     <div class="card2 card border-0 px-4 py-5">
                         <div class="row px-3">
                             <label class="mb-1">
                                 <h6 class="mb-0 text-sm">Name<span class="note text-danger">*</span></h6>
                             </label>
                             <input class="mb-3" type=" text" name="username" placeholder="Enter a Name">
                             <!--<span class="invalidFeedback mb-3 text-danger">
                                 <?php echo $data['usernameError']; ?>
                             </span> -->
                         </div>
                         <div class="row px-3">
                             <label class="mb-1">
                                 <h6 class="mb-0 text-sm">Email Address<span class="note text-danger">*</span></h6>
                             </label>
                             <input class="mb-3" type="email" name="email" placeholder="Enter a valid email address">
                         </div>
                         <div class="row px-3">
                             <label class="mb-1">
                                 <h6 class="mb-0 text-sm">Password<span class="note text-danger">*</span></h6>
                             </label>
                             <input class="mb-3" type="password" name="password" placeholder="Enter password">
                         </div>
                         <div class="row px-3">
                             <label class="mb-1">
                                 <h6 class="mb-0 text-sm">Confirm Password<span class="note text-danger">*</span></h6>
                             </label>
                             <input class="mb-5" type="password" name="confirmPassword" placeholder="Re-Enter password">
                         </div>
                         <div class="col mb-4 px-3">
                             <button type="submit" id="submit" value="submit" class="btn btn-blue text-center ">Register</button>
                             <small class="font-weight-bold">Already have an account? <a class="text-primary " href="<?php echo URLROOT ?>users/login">Login</a></small>
                         </div>
                     </div>
                 </form>
             </div>
         </div>
     </div>
 </div>


 <?php
    include  ROOT . '/views/includes/footer.php';
    ?>