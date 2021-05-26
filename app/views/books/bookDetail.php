 <?php
    include  ROOT . '/views/includes/header.php';
    ?>

 <div class="container  px-1 px-md-5 px-lg-1 px-xl-5 py-5 mx-auto">

     <div class="card card0 border-0 ">
         <div class="row px-3 mb-8 justify-content-between">
             <div class="line"></div> <small class="or text-center px-0">Book detail</small>
             <div class="line"></div>
         </div>
         <div class="row d-flex justify-content-center">
             <div class="col-lg-3 ">
                 <div class="card1 pb-0 ">
                     <div class="row px-3 justify-content-center mt-4 mb-5 ">
                         <img class="img" style=" height: 380px;" src="<?php echo ASSETS  ?>img/uploads/<?php echo $data['bookImage'] ?>">
                         <div class="d-flex px-0 py-1 justify-content-between">
                             <a class="btn text-success">Mark as read<i class="bi bi-patch-check"></i></a>
                             <a class="btn text-success"> Add to wishlist<i class="bi bi-bookmarks"></i></a>
                         </div>
                         <div class="d-flex  justify-content-between">
                             <button class="btn btn-outline-success btn-sm px-4">Borrow</button>
                             <button class="btn btn-outline-primary btn-sm px-4">Return</button>
                         </div>
                     </div>
                 </div>
             </div>
             <div class="col-lg-7">
                 <div class="card2 card border-0 px-4 py-5">
                     <h3 class="card-title"><?php echo $data['bookName'] ?></h3>
                     <h5 class="card-sub-title">By:<?php echo $data['bookAuthor'] ?> </h5>
                     <p class="card-text d-flex justify-content-end"><small class="text-muted">Available count:<?php echo $data['bookCount'] ?></small></p>
                     <p class="card-text">description:<?php echo $data['bookDescription'] ?></p>
                     <p class="card-text d-flex justify-content-end"><small class="text-muted">Modified on:<?php echo $data['modifiedDate'] ?></small></p>
                 </div>
                 <?php if (isset($_SESSION['user_id']) && $_SESSION['role'] == 1) { ?>
                     <div class="d-flex  justify-content-end">
                         <a href="<?php echo URLROOT ?>books/editBook" class="btn btn-outline-primary btn-sm px-3 m-1">Edit details<i class="bi bi-pencil-square"></i></a>
                         <button class="btn btn-outline-danger btn-sm px-4 m-1 " name="deleteBook" data-bs-toggle="modal" data-bs-target="#deleteModel">Delete<i class="bi bi-trash"></i></button>
                     </div>
                 <?php } ?>
             </div>
         </div>
     </div>
 </div>
 <div class="modal fade" id="deleteModel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog modal-dialog-centered ">
         <div class="modal-content">
             <div class="modal-header" style="background: rgba(77, 244, 174, 100);">
                 <h5 class="modal-title" id="exampleModalLabel">Verify Your Email Address</h5>
             </div>
             <div class="modal-body">
                 <div class="modal-body">
                     <p>This data will not be retrieved back after deleted once.</p>
                 </div>
                 <div class="modal-footer">
                     <a href="db/delete.php?id=<?php echo $b_id; ?>" class="modal-close btn btn-sm btn-outline-danger">Sure</a>
                     <a href="#" class="modal-close btn btn-sm btn-outline-primary" data-bs-dismiss="modal" aria-label="Close">Cancel</a>
                 </div>
             </div>
         </div>
     </div>
 </div>


 <?php
    include  ROOT . '/views/includes/footer.php';
    ?>