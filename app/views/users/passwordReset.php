 <?php
    include  ROOT . '/views/includes/header.php';
    ?>

 <div class="container  px-1 px-md-5 px-lg-1 px-xl-5 py-5 mx-auto">
     <?php if ($data["confirmPasswordError"] or $data["passwordChangedError"] or $data["passwordError"]) { ?>
         <div class="alert alert-danger alert-dismissible fade show mx-5 px-5" role="alert">
             <?php if ($data['passwordChangedError']) { ?>
                 <li><?php echo $data['passwordChangedError']; ?><i class="bi bi-emoji-frown-fill"></i></li>
             <?php }
                if ($data["passwordError"]) { ?>
                 <li><?php echo $data["passwordError"]; ?><i class="bi bi-emoji-frown-fill"></i></li>
             <?php }
                if ($data["confirmPasswordError"]) { ?>
                 <li><?php echo $data["confirmPasswordError"]; ?><i class="bi bi-emoji-frown-fill"></i></li>
             <?php } ?>
             <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
         </div>
     <?php }
        if ($data['passwordChanged']) { ?>
         <div class="alert alert-success text-center alert-dismissible fade show mx-5 px-5" role="alert">
             <h6 class="text-success"><?php echo $data["passwordChanged"]; ?><i class="bi bi-emoji-smile-fill"></i></h6>
             <a href="<?php echo URLROOT ?>users/login" data-toggle="tooltip" data-placement="top" title="Go to login page" type="button" class="btn-close" aria-label="Close"></a>
         </div>
     <?php } ?>
     <div class="card card0 border-0">
         <div class="row px-3 mb-8 justify-content-between">
             <div class="line"></div> <small class="or text-center px-0">Password Reset</small>
             <div class="line"></div>
         </div>
         <div class="row d-flex">
             <div class="col-lg-6">
                 <div class="card1 pb-4">
                     <div class="row px-3 justify-content-center mt-4 mb-5 border-line"> <img src="<?php echo ASSETS ?>img/logo/library.png" class="image"> </div>
                 </div>
             </div>
             <div class="col-lg-6">
                 <form method="POST">
                     <div class="card2 card border-0 px-4 py-5">
                         <div class="row px-3">
                             <label class="mb-1">
                                 <h6 class="mb-0 text-sm">Password<span class="note text-danger">*</span></h6>
                             </label>
                             <input class="mb-3" type="password" name="password" placeholder="Enter password">
                         </div>
                         <div class="row px-3">
                             <label class="mb-1">
                                 <h6 class="mb-0 text-sm">Re-Enter Password<span class="note text-danger">*</span></h6>
                             </label>
                             <input class="mb-4" type="password" name="confirmPassword" placeholder="Re-Enter password">
                         </div>
                         <div class="col mb-4 px-3">
                             <button type="submit" class="btn btn-blue text-center">Confirm</button>
                             <small class="font-weight-bold">After clicking on confirm you will be re-directed to login page</small>
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