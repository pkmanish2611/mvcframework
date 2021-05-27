 <?php
    include  ROOT . '/views/includes/header.php';
    ?>

 <div class="container py-2 myContainer">

     <?php if (isset($_SESSION['bookDeleted'])) { ?>
         <div class="alert alert-success text-center alert-dismissible fade show px-5" role="alert">
             <li><?php echo $_SESSION['bookDeleted'] ?></li>
             <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
         </div>
     <?php }
        unset($_SESSION['bookDeleted']); ?>


     <div class="d-flex justify-content-end">
         <form action="index.php" method="GET" class="d-flex justify-content-end mx-md-3">
             <select name="Sort" class=" form-select-sm mt-3 w-100 w-md-15  " id="sort" onchange="javascript:this.form.submit()">
                 <option>Sort</option>
                 <option value="A-Z">A-Z</option>
                 <option value="Z-A">Z-A</option>
             </select>
         </form>
     </div>
     <div class="row px-3 mb-4 justify-content-between">
         <div class="line"></div> <small class="or text-center">Book List</small>
         <div class="line"></div>
     </div>
     <div class="row row-cols-1 px-5">
         <?php foreach ($data as $obj) { ?>
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
                         <a class="btn btn-success btn-sm mb-2 px-4"><i class="bi bi-bookmarks"></i></a>
                     </div>
                 </div>
             </div>
         <?php } ?>
     </div>

     <div class="d-flex justify-content-end mx-2">
         <nav aria-label="Page navigation example">
             <ul class="pagination pagination-sm pg-blue">
                 <li class="page-item "><a class="page-link" tabindex="-1">&laquo;Prev</a></li>
                 <li class="page-item"><a class="page-link">1</a></li>
                 <li class="page-item"><a class="page-link">2</a></li>
                 <li class="page-item"><a class="page-link">3</a></li>
                 <li class="page-item "><a class="page-link">Next&raquo;</a></li>
             </ul>
         </nav>
     </div>
 </div>

 <?php
    include  ROOT . '/views/includes/footer.php';
    ?>