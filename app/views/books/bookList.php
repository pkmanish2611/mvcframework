 <?php
    include  ROOT . '/views/includes/header.php';
    ?>
 <div class="container py-2 myContainer">
     <div class="my-0 py-0 d-flex justify-content-center">
         <?php if (isset($_SESSION['bookDeleted'])) { ?>
             <div class="alert alert-success text-center alert-dismissible fade show  col-md-3" id="alert" role="alert">
                 <strong>Success!</strong><?php echo $_SESSION['bookDeleted'] ?> 
             </div>
         <?php }
            unset($_SESSION['bookDeleted']);
            if (isset($_SESSION['wishlistSuccess']) or isset($_SESSION['wishlistError'])) { ?>
             <div class="alert alert-success text-center alert-dismissible fade show col-md-3" id="alert" role="alert">
                 <?php if (isset($_SESSION['wishlistSuccess'])) { ?>
                     <strong>Success!</strong> <?php echo $_SESSION['wishlistSuccess'] ?><i class="bi bi-bookmark-heart"></i>
                 <?php }
                    if (isset($_SESSION['wishlistError'])) { ?>
                     <strong>Failed!</strong><?php echo $_SESSION['wishlistError'] ?><i class="bi bi-exclamation-octagon-fill"></i>
                 <?php } ?>
             </div>
         <?php }
            unset($_SESSION['wishlistSuccess']);
            unset($_SESSION['wishlistError']);
            ?>
     </div>


     <div class="row px-3 my-3 justify-content-between">
         <div class="line"></div> <small class="or text-center">Book List</small>
         <div class="line"></div>
     </div>
     <div class="row row-cols-1 px-5">
         <?php if ($data['recordNotFound'] == false) {
                foreach ($data['books'] as $obj) { ?>
                 <div class="col-sm d-flex justify-content-center">
                     <!--bootstrap card for book listing-->
                     <div class="card text-center mb-2" style="width: 15rem;">
                         <img class="card-img-top  p-5 pb-0 img2" src="<?php echo ASSETS ?>img/uploads/<?php echo $obj->book_image ?>" alt="Book image">
                         <div class="card-body  p-0">
                             <h6 class="card-title mb-0"><?php echo $obj->book_name ?></h6>
                             <h7 class="card-subtitle text-muted">By: <?php echo $obj->book_author ?></h7>
                         </div>
                         <div class="d-flex justify-content-between px-2 mx-3">
                             <a href="<?php echo URLROOT ?>books/bookDetail/<?php echo $obj->book_id ?>" class="btn btn-success btn-sm px-4 mb-2">View details</a>
                             <a href="<?php echo URLROOT ?>actions/addWishList/<?php echo $obj->book_id ?>" class="btn btn-success btn-sm mb-2 px-4"><i class="bi bi-heart"></i></a>
                         </div>
                     </div>
                 </div>
             <?php }
            } else { ?>
             No record fount
         <?php } ?>
     </div>

     <div class="d-flex justify-content-end mx-2">
         <nav aria-label="Page navigation example">
             <ul class="pagination pagination-sm pg-blue">
                 <li class="page-item "><a class="page-link" tabindex="-1">&laquo;Prev</a></li>
                 <?php
                    for ($i = 1; $i <= $data['totalPage']; $i++) {
                        $class = '';
                        if ($data['currentPage'] == $i) { ?>
                         <li class="page-item active"><a class="page-link" href="javascript:void(0)"><?php echo $i ?></a></li>
                     <?php } else { ?>
                         <li class="page-item"><a class="page-link" href="<?php echo URLROOT ?>books/bookList/<?php echo $i ?>"><?php echo $i ?></a></li>
                 <?php }
                    } ?>
                 <li class="page-item "><a class="page-link">Next&raquo;</a></li>
             </ul>
         </nav>
     </div>
 </div>

 <?php
    include  ROOT . '/views/includes/footer.php';
    ?>