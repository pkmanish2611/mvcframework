 <?php
    include  ROOT . '/views/includes/header.php';
    ?>

 <div class="container  px-1 px-md-5 px-lg-1 px-xl-5 py-5 mx-auto">
     <?php if ($data["bookNameError"] or $data["bookAuthorError"] or $data["bookDescriptionError"] or $data['bookImageError'] or $data['bookCountError']) { ?>
         <div class="alert alert-danger alert-dismissible fade show mx-5 px-5" role="alert">
             <?php if ($data['bookNameError']) { ?>
                 <li><?php echo $data['bookNameError']; ?></li>
             <?php }
                if ($data["bookAuthorError"]) { ?>
                 <li><?php echo $data["bookAuthorError"]; ?></li>
             <?php }
                if ($data["bookDescriptionError"]) { ?>
                 <li><?php echo $data["bookDescriptionError"]; ?></li>
             <?php }
                if ($data['bookImageError']) { ?>
                 <li><?php echo $data['bookImageError']; ?></li>
             <?php }
                if ($data['bookCountError']) { ?>
                 <li><?php echo $data['bookCountError']; ?></li>
                 <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
             <?php } ?>
         </div>
     <?php }
        if ($data['bookAdded']) { ?>
         <div class="alert alert-success text-center alert-dismissible fade show mx-5 px-5" role="alert">
             <h6 class="text-success">hola ! Book added successfully<i class="bi bi-emoji-smile-fill"></i></h6>
             <a class="btn btn-outline-success btn-sm m-2" href="<?php echo URLROOT ?>books/bookDetail/<?php echo $data['bookId'] ?>"><b>Click to view details</b></a>
             <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
         </div>
     <?php }
        if ($data['bookAddedError']) { ?>
         <div class="alert alert-danger text-center alert-dismissible fade show mx-5 px-5" role="alert">
             <h6 class="text-danger">oppss ! Book not added successfully<i class="bi bi-emoji-frown-fill"></i></h6>
             <p>Something went wrong</p>
             <a class="btn btn-sm btn-danger-rounded btn-close" data-bs-dismiss="alert">Try again</a>
             <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
         </div>
     <?php } ?>

     <div class="card card0 border-0">
         <div class="row px-3 mb-8 justify-content-between">
             <div class="line"></div> <small class="or text-center px-0">Add Book</small>
             <div class="line"></div>
         </div>
         <div class="row d-flex justify-content-center">
             <div class="col-lg-4 ">
                 <div class="card1 pb-0 ">
                     <div class="row px-3 justify-content-center mt-4 mb-5 ">
                         <img class="img" src="<?php echo ASSETS  ?>img/logo/placeholder.png" style="width: 300px; height: 400px;" alt='image preview' id="preview">
                     </div>
                 </div>
             </div>
             <div class="col-lg-5">
                 <form id="addBook-form" method="POST" enctype="multipart/form-data">
                     <div class="card2 card border-0 px-4 py-5">
                         <div class="row px-3">
                             <label class="mb-1">
                                 <h6 class="mb-0 text-sm">Book Name<span class="note text-danger">*</span></h6>
                             </label>
                             <input class="mb-3" type=" text" name="bookName" placeholder="Enter Book name">
                             <!--<span class="invalidFeedback mb-3 text-danger">
                                 <?php echo $data['usernameError']; ?>
                             </span> -->
                         </div>
                         <div class="row px-3">
                             <label class="mb-1">
                                 <h6 class="mb-0 text-sm">Author Name<span class="note text-danger">*</span></h6>
                             </label>
                             <input class="mb-3" type="text" name="bookAuthor" placeholder="Enter Author name">
                         </div>
                         <div class="row px-3">
                             <label class="mb-1">
                                 <h6 class="mb-0 text-sm">Description</span></h6>
                             </label>
                             <textarea class="mb-3" maxlength="500" name="bookDescription" placeholder="Book description"></textarea>
                         </div>
                         <div class="row px-3">
                             <div class="col-8 px-0">
                                 <label class="mb-1">
                                     <h6 class="mb-0 text-sm">Book image</h6>
                                 </label>
                                 <input class="mb-4" type="file" name="bookImage" id="file-input" value="">
                             </div>
                             <div class="col-4 mb-0">
                                 <label class="mb-1">
                                     <h6 class="mb-0 text-sm">Count</h6>
                                 </label>
                                 <input type="number" name="bookCount" id="typeNumber">
                             </div>
                         </div>
                         <div class="col mb-4 px-3">
                             <button type="submit" id="submit" value="submit" class="btn btn-blue text-center ">Add</button>
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