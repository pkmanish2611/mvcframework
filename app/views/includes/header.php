 <!doctype html>
 <html lang="en">

 <head>
     <!-- Required meta tags -->
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <!-- Bootstrap CSS -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

     <!-- Bootstrap icon-->
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css">

     <link rel="stylesheet" href="<?php echo ASSETS ?>css/main.css">
     <link rel="preconnect" href="https://fonts.gstatic.com">
     <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,300;0,400;0,700;1,100&display=swap" rel="stylesheet">

     <title><?php echo SITENAME ?></title>


 </head>

 <body>
     <div class="main-top" id="home">
         <header class="sticky-top">

             <!-- Bootstrap Navigation bar -->
             <nav class="navbar navbar-expand-lg navbar-light navbar-main">
                 <div class="brand container">
                     <a class="navbar-brand pb-0" href="<?php echo URLROOT ?>pages/landing">
                         <img src="<?php echo ASSETS  ?>img/logo/library.png " alt="" width="45" height="45" class="d-inline-block align-text-bottom">
                         Bookshelf !
                     </a>
                     <!-- Bootstrap button toggler for responsiveness of header-->
                     <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                         <span class="navbar-toggler-icon"></span>
                     </button>
                     <div class="collapse navbar-collapse justify-content-end" id="navbarTogglerDemo02">
                         <ul class="navbar-nav ml-auto mt-2">
                             <li class="nav-item">
                                 <a class="btn btn-sm btn-outline-light" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo04" aria-controls="navbarTogglerDemo04" aria-expanded="false" aria-label="Toggle navigation">
                                     <i class="bi bi-search circle-icon p-2"></i>
                                 </a>
                             </li>
                             <li class="nav-item">
                                 <a class="nav-link" aria-current="page" href="<?php echo URLROOT ?>books/bookList">HOME</a>
                             </li>
                             <li class="nav-item">
                                 <?php if (isset($_SESSION['user_id']) && $_SESSION['role'] == 1) { ?>
                                     <a class="nav-link" aria-current="page" href="<?php echo URLROOT ?>books/addBook">ADD BOOK</a>
                                 <?php } ?>
                             </li>
                             <li class="nav-item ">
                                 <a class="nav-link" href="AddBook.php">PROFILE</a>
                             </li>

                             <li class="nav-item ">
                                 <?php if (isset($_SESSION['user_id'])) : ?>
                                     <a class="btn   btn-sm login_btn" href="<?php echo URLROOT ?>users/logout">LOGOUT </a>
                                 <?php else : ?>
                                     <a class="btn   btn-sm login_btn" href="<?php echo URLROOT ?>users/login">LOGIN </a>
                                 <?php endif; ?>
                             </li>
                         </ul>
                     </div>
                 </div>
             </nav>
             <nav class="navbar navbar-expand-lg navbar-light bg-light">
                 <div class="container px-5">
                     <div class="col d-flex justify-content-center">
                         <form action="index.php" method="GET">
                             <select name="Sort" class=" form-select" id="sort" onchange="javascript:this.form.submit()">
                                 <option>Sort</option>
                                 <option value="A-Z">A-Z</option>
                                 <option value="Z-A">Z-A</option>
                             </select>
                         </form>
                     </div>
                     <div class="col d-flex justify-content-center">
                         <a class="fb-ic ml-1 mr-3" role="button"><i class="bi bi-heart text-primary"></i></a>
                         <span class="counter counter-floating counter-lg-icon">1</span>
                     </div>
                     <div class="col d-flex justify-content-center">
                         <div class="collapse" id="navbarTogglerDemo04">
                             <form class="search-form d-flex" method="GET" action="index.php">
                                 <input class="form-control form_se" type="search" name="search" placeholder="Search" value="<?php echo isset($_GET['search']) ? $_GET['search'] : '' ?>">
                             </form>
                         </div>
                     </div>
                 </div>
             </nav>
         </header>