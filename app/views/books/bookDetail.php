 <?php
    include  ROOT . '/views/includes/header.php';
    ?>

 <div class="container  px-1 px-md-5 px-lg-1 px-xl-5 py-5 mx-auto">
     <?php if (isset($_SESSION['bookEdited'])) { ?>
         <div class="alert alert-success text-center alert-dismissible fade show px-5" role="alert">
             <li><?php echo $_SESSION['bookEdited'] ?><i class="bi bi-emoji-smile-fill"></i></li>
             <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
         </div>
     <?php }
        unset($_SESSION['bookEdited']); ?>

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
                             <a class="btn text-success"> Add to wishlist<i class="bi bi-heart"></i></a>
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
                         <a class="btn btn-outline-primary btn-sm px-3 m-1" name="editBook" data-bs-toggle="modal" data-bs-target="#editModel">Edit details<i class="bi bi-pencil-square"></i></a>
                         <button class="btn btn-outline-danger btn-sm px-4 m-1 " name="deleteBook" data-bs-toggle="modal" data-bs-target="#deleteModel">Delete<i class="bi bi-trash"></i></button>
                     </div>
                 <?php } ?>
             </div>
         </div>
     </div>
 </div>

 <!-- delete modal -->
 <div class="modal fade" id="deleteModel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog modal-dialog-centered ">
         <div class="modal-content">
             <div class="modal-header" style="background: rgba(77, 244, 174, 100);">
                 <h5 class="modal-title" id="exampleModalLabel">Delete book !!</h5>
             </div>
             <div class="modal-body">
                 <div class="modal-body">
                     <p class="text-danger">This data will not be retrieved back after deleted once.</p>
                 </div>
                 <div class="modal-footer">
                     <a href="<?php echo URLROOT ?>books/bookDelete/<?php echo $data['bookId'] ?>" class="btn btn-sm btn-outline-danger">Sure</a>
                     <a href="#" class="modal-close btn btn-sm btn-outline-primary" data-bs-dismiss="modal" aria-label="Close">Cancel</a>
                 </div>
             </div>
         </div>
     </div>
 </div>

 <!-- edit modal -->
 <div class="modal fade" id="editModel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog modal-lg">
         <div class="modal-content">
             <div class="modal-header" style="background: rgba(77, 244, 174, 100);">
                 <h5 class="modal-title" id="exampleModalLabel">Edit book !!</h5>
             </div>
             <div class="row d-flex justify-content-center mx-0">
                 <div class="col-lg-4 ">
                     <div class="card1 pb-0 ">
                         <div class="row px-3 justify-content-center mt-5 mb-5 ">
                             <img class="img" src="<?php echo ASSETS  ?>img/uploads/<?php echo $data['bookImage'] ?>" style="width: 300px; height: 350px;" alt='image preview' id="preview">
                         </div>
                     </div>
                 </div>
                 <div class="col-lg-6 px-0">
                     <form form id="editBook-form" method="POST" action="<?php echo URLROOT ?>books/editBook/<?php echo $data['bookId'] ?>" enctype="multipart/form-data">
                         <div class="card2 card border-0 px-4 py-5">
                             <div class="row px-3">
                                 <label class="mb-1">
                                     <h6 class="mb-0 text-sm">Book Name<span class="note text-danger">*</span></h6>
                                 </label>
                                 <input class="mb-3" type=" text" name="bookName" value="<?php echo $data['bookName'] ?>">
                             </div>
                             <div class="row px-3">
                                 <label class="mb-1">
                                     <h6 class="mb-0 text-sm">Author Name<span class="note text-danger">*</span></h6>
                                 </label>
                                 <input class="mb-3" type="text" name="bookAuthor" value="<?php echo $data['bookAuthor'] ?>">
                             </div>
                             <div class="row px-3">
                                 <label class="mb-1">
                                     <h6 class="mb-0 text-sm">Description</span></h6>
                                 </label>
                                 <textarea class="mb-3" maxlength="500" name="bookDescription"><?php echo $data['bookDescription']; ?></textarea>
                             </div>
                             <div class="row px-3">
                                 <div class="col-8 px-0">
                                     <label class="mb-1">
                                         <h6 class="mb-0 text-sm">Book image</h6>
                                     </label>
                                     <input class="mb-4" type="file" name="bookImage" id="file-input">
                                 </div>
                                 <div class="col-4 mb-0">
                                     <label class="mb-1">
                                         <h6 class="mb-0 text-sm">Count</h6>
                                     </label>
                                     <input type="number" name="bookCount" value="<?php echo $data['bookCount'] ?>" id="typeNumber">
                                 </div>
                             </div>
                             <div class="col mb-4 px-3">
                                 <button type="submit" name="editBook" id="submit" value="submit" class="btn btn-blue text-center ">Update</button>
                                 <a href="#" class="modal-close btn btn-outline-primary" data-bs-dismiss="modal" aria-label="Close">Cancel</a>
                             </div>
                         </div>
                     </form>
                 </div>
             </div>
         </div>
     </div>
 </div>


 <?php
    include  ROOT . '/views/includes/footer.php';
    ?>