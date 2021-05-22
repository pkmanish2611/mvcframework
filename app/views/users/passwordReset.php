 <?php
    include  ROOT . '/views/includes/header.php';
    ?>

 <div class="container  px-1 px-md-5 px-lg-1 px-xl-5 py-5 mx-auto">
     <div class="card card0 border-0">
         <div class="row px-3 mb-8 justify-content-between">
             <div class="line"></div> <small class="or text-center px-0">Password Reset</small>
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
                             <h6 class="mb-0 text-sm">Password<span class="note text-danger">*</span></h6>
                         </label>
                         <input class="mb-3" type="password" name="password" placeholder="Enter password">
                     </div>
                     <div class="row px-3">
                         <label class="mb-1">
                             <h6 class="mb-0 text-sm">Re-Enter Password<span class="note text-danger">*</span></h6>
                         </label>
                         <input class="mb-4" type="password" name="password" placeholder="Re-Enter password">
                     </div>
                     <div class="col mb-4 px-3">
                         <button type="submit" href="<?php echo URLROOT ?>user/register" class="btn btn-blue text-center">Confirm</button>
                         <small class="font-weight-bold">After clicking on confirm you will be re-directed to login page</small>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </div>


 <?php
    include  ROOT . '/views/includes/footer.php';
    ?>