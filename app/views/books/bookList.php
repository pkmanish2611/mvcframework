 <?php
    include  ROOT . '/views/includes/header.php';
    ?>

 <div class="container myContainer">
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
     <div class="row row-cols-1">
         <div class="col-sm d-flex justify-content-center">
             <!--bootstrap card for book listing-->
             <div class="card text-center mb-2" style="width: 15rem;">
                 <img class="card-img-top  mb-2 img2" src="<?php echo ASSETS  ?>img/logo/picture.png " alt="Book image">
                 <div class="card-body  p-0">
                     <h6 class="card-title mb-0"> title</h6>
                     <h7 class="card-subtitle text-muted">By: author hello </h7>
                     <div class="d-flex justify-content-between">
                         <a class="btn text-success">Borrow</a>
                         <a class="btn text-success">Wishlist<i class="bi bi-bookmarks"></i></a>
                     </div>
                 </div>
                 <a href="<?php echo URLROOT ?>books/bookDetail" class="btn btn-success btn-sm btn-block mx-2 mb-2">View details</a>
             </div>
         </div>
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