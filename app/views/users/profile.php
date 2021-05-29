   <?php
    include  ROOT . '/views/includes/header.php';
    ?>

   <div class="container  px-1 px-md-5 px-lg-1 px-xl-5 py-4 mx-auto">
       <div class="card card0 border-0  text-center my-2">
           <div>
               <h4>Nmae</h4>
               <h5>Email</h5>
           </div>

           <div class="accordion" id="accordionExample">
               <div class="accordion-item">
                   <h2 class="accordion-header" id="headingOne">
                       <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                           Manage admin
                       </button>
                   </h2>
                   <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                       <div class="accordion-body"> 
                           <div class="d-flex justify-content-end">
                           <button class="btn btn-outline-primary btn-sm  align-self-end">Add admin</button>
                           </div>
                           <table class="table table-bordered table-sm">
                               <thead class="table-dark">
                                   <tr>
                                       <th scope="col">#</th>
                                       <th scope="col">First</th>
                                       <th scope="col">Last</th>
                                       <th scope="col">Handle</th>
                                   </tr>
                               </thead>
                               <tbody>
                                   <tr>
                                       <th scope="row">1</th>
                                       <td>Mark</td>
                                       <td>Otto</td>
                                       <td>@mdo</td>
                                   </tr>
                               </tbody>
                           </table>
                       </div>
                   </div>
               </div>
               <div class="accordion-item">
                   <h2 class="accordion-header" id="headingTwo">
                       <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                           Wishlist
                       </button>
                   </h2>
                   <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                       <div class="accordion-body">
                           <table class="table table-bordered table-sm">
                               <thead class="table-dark">
                                   <tr>
                                       <th scope="col">#</th>
                                       <th scope="col">First</th>
                                       <th scope="col">Last</th>
                                       <th scope="col">Handle</th>
                                   </tr>
                               </thead>
                               <tbody>
                                   <tr>
                                       <th scope="row">1</th>
                                       <td>Mark</td>
                                       <td>Otto</td>
                                       <td>@mdo</td>
                                   </tr>
                               </tbody>
                           </table>
                       </div>
                   </div>
               </div>
               <div class="accordion-item">
                   <h2 class="accordion-header" id="headingThree">
                       <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                           Finished book
                       </button>
                   </h2>
                   <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                       <div class="accordion-body">
                           <table class="table table-bordered table-sm">
                               <thead class="table-dark">
                                   <tr>
                                       <th scope="col">#</th>
                                       <th scope="col">First</th>
                                       <th scope="col">Last</th>
                                       <th scope="col">Handle</th>
                                   </tr>
                               </thead>
                               <tbody>
                                   <tr>
                                       <th scope="row">1</th>
                                       <td>Mark</td>
                                       <td>Otto</td>
                                       <td>@mdo</td>
                                   </tr>
                               </tbody>
                           </table>
                       </div>
                   </div>
               </div>
               <div class="accordion-item">
                   <h2 class="accordion-header" id="headingFour">
                       <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseThree">
                           Borrowed book
                       </button>
                   </h2>
                   <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionExample">
                       <div class="accordion-body">
                           <table class="table table-bordered table-sm">
                               <thead class="table-dark">
                                   <tr>
                                       <th scope="col">#</th>
                                       <th scope="col">First</th>
                                       <th scope="col">Last</th>
                                       <th scope="col">Handle</th>
                                   </tr>
                               </thead>
                               <tbody>
                                   <tr>
                                       <th scope="row">1</th>
                                       <td>Mark</td>
                                       <td>Otto</td>
                                       <td>@mdo</td>
                                   </tr>
                               </tbody>
                           </table>
                       </div>
                   </div>
               </div>
               <div class="accordion-item">
                   <h2 class="accordion-header" id="headingFive">
                       <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseThree">
                           Book read history
                       </button>
                   </h2>
                   <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive" data-bs-parent="#accordionExample">
                       <div class="accordion-body">
                           <strong>This is the third item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                       </div>
                   </div>
               </div>
           </div>

       </div>
   </div>

   <?php
    include  ROOT . '/views/includes/footer.php';
    ?>