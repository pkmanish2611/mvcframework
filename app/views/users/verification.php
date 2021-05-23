  <?php
    include  ROOT . '/views/includes/header.php';
    ?>

  <div class="container  px-1 px-md-5 px-lg-1 px-xl-5 py-5 mx-auto">
      <div class="card card0 border-0  text-center my-5">
          <div class="row px-3 my-4 justify-content-between">
              <div class="line"></div> <small class="or text-center px-0">Account verification</small>
              <div class="line"></div>
          </div>

          <div class="col  mb-5 ">
              <?php if ($data['verifySuccess']) { ?>
                  <div class="alert alert-success text-center alert-dismissible fade show mx-5 mb-4 px-5 py-5" role="alert">
                      <h4 class="text-success text-center"><b>Account verification</b></h4>
                      <h6 class="text-success">hola ! Verification successful<i class="bi bi-emoji-smile-fill"></i></h6>
                      <p>Please go to Login page to continue</p>
                      <a class="text-success" href="<?php echo URLROOT ?>users/login"><b>Click here</b></a>

                  </div>
              <?php }
                if ($data['verifyError']) { ?>
                  <div class=" alert alert-danger text-center alert-dismissible fade show mx-5 px-5" role="alert">
                          <h6 class="text-danger">hola ! verification unsuccessful<i class="bi bi-emoji-frown-fill"></i></h6>
                          <p>Something went wrong</p>
                          <a class="btn btn-danger-rounded" data-bs-dismiss="modal">Try again</a>
                  </div>
              <?php } ?>

          </div>

      </div>
  </div>


  <?php
    include  ROOT . '/views/includes/footer.php';
    ?>