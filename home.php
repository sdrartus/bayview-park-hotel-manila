 <!-- Masthead-->
 <!-- Masthead-->
 <header class="masthead">
     <div class="container h-100" id="home">
         <div class="row h-100 align-items-center  text-center">
             <img src="assets/img/img/icon.png" style="width: 25rem;" alt="">

         </div>
     </div>

     <style>
         #ads {
             margin: 30px 0 30px 0;

         }

         #ads .card-notify-badge {
             position: absolute;
             left: -10px;
             top: -50px;
             background: #DF9F15;
             text-align: center;
             border-radius: 30px 30px 30px 30px;
             color: #000;
             padding: 5px 10px;
             font-size: 14px;

         }

         #ads .card-notify-year {
             position: absolute;
             right: -20px;
             top: -30px;
             background: #ff4444;
             border-radius: 50%;
             text-align: center;
             color: #fff;
             font-size: 14px;
             width: 70px;
             height: 50px;
             padding: 15px 0 0 0;
         }


         #ads .card-detail-badge {
             background: #DF9F15;
             text-align: center;
             border-radius: 30px 30px 30px 30px;
             color: #000;
             padding: 5px 10px;
             margin: 10;
             font-size: 14px;
         }



         #ads .card:hover {
             background: #fff;
             box-shadow: 12px 15px 20px 0px rgba(46, 61, 73, 0.15);
             border-radius: 4px;
             transition: all 0.3s ease;
         }

         #ads .card-image-overlay {
             font-size: 20px;

         }


         #ads .card-image-overlay span {
             display: inline-block;
         }


         #ads .ad-btn {
             text-transform: uppercase;
             width: 150px;
             height: 40px;
             border-radius: 80px;
             font-size: 16px;
             line-height: 35px;
             text-align: center;
             border: 3px solid #DF9F15;
             display: block;
             text-decoration: none;
             margin: 10px auto 1px auto;
             color: #000;
             overflow: hidden;
             position: relative;
             background-color: #DF9F15;
         }

         #ads .ad-btn:hover {
             background-color: #DF9F15;
             color: #1e1717;
             border: 2px solid #DF9F15;
             background: transparent;
             transition: all 0.3s ease;
             box-shadow: 12px 15px 20px 0px rgba(46, 61, 73, 0.15);
         }

         #ads .ad-title h5 {
             text-transform: uppercase;
             font-size: 20px;
             font-style: italic;
         }
     </style>
 </header>



 <br>
 <div class="m-5	">
     <div class="card-body">
         <div class="card shadow bg-body rounded" id="filter-book" style="background: #0000002e;">
             <div class="card-body">
                 <div class="container-fluid">
                     <form action="index.php?page=rooms" id="filter" method="POST">
                         <div class="row">
                             <div class="col-md-2 text-center mt-4">
                                 <label for="" style="font-family: Verdana">Check-in Date</label>
                                 <input type="date" class="form-control " name="date_in" autocomplete="off">
                             </div>
                             <div class="col-md-2 text-center mt-4">
                                 <label for="" style="font-family: Verdana">Check-out Date</label>
                                 <input type="date" class="form-control " name="date_out" autocomplete="off">
                             </div>
                             <div class="col text-center mt-5">
                                 <button class="btn btn-primary">Check Availability</button>
                             </div>

                             <div class="col-md-5" style="font-family: Verdana">
                                 <p>WHY BOOK DIRECT?</p>
                                 <ul>
                                     <li>Instant confirmation of bookings</li>
                                     <li>Direct service for amendments or requests</li>
                                     <li>Free late check-out</li>
                                     <li>Free sanitation kit</li>
                                 </ul>
                             </div>

                         </div>
                     </form>
                 </div>
             </div>
         </div>


         <br>
         <h4 class="text-center">WHY BOOK DIRECT? • 10% discount at Bayview Coffee Shop • Free Wi-Fi Internet Access
         </h4>
         <hr style=" position: relative; height: 1px; background: black;">
         <br>
         <div id="about"></div>
         <div style="margin-top:2rem;"></div>


         <h1 class="text-center" style="font-family: Verdana"><b>BAYVIEW PARK HOTEL MANILA</b></h1>
         <hr style=" position: relative;
		width: 53rem;
        height: 1px;
        background: black;">
         <br>
         <h6 class="text-center" style="font-family: Verdana">Bayview Park Hotel Manila is one of the most iconic hotels
             in the Philippines. For 75 years and counting, our hotel has been the most sought-after</h6>
         <h6 class="text-center" style="font-family: Verdana">destination for business and leisure in the historic heart
             of Manila. We provide unparalleled service, exclusive privileges, and affordable rates.</h6>
         <br>
         <h6 class="text-center" style="font-family: Verdana">Bayview Park Hotel Manila is a short walk away from
             Intramuros, the U.S. Embassy, and Roxas Boulevard. Guests can also enjoy spectacular views of Manila</h6>
         <h6 class="text-center" style="font-family: Verdana">Bay sunsets and nightlife. We guarantee a comfortable and
             convenient ambiance in one of the classiest and most elegant hotels in Manila.</h6>


         <div id="rooms"></div>
         <div style="margin-top:4rem;"></div>
         <br>
         <h1 class="text-center" style="font-family: Verdana"><b>ROOMS</b></h1>

         <hr style=" position: relative;
		  width: 20rem;
		  height: 1px;
		  background: black;">

         <div class="row md-4">
             <?php
                $query = "SELECT * FROM room_categories WHERE status = 'active'";
                $query_run = mysqli_query($conn, $query);
                while ($row = mysqli_fetch_assoc($query_run)) {
                ?>
                 <div class="col-md-3">
                     <div class="card1">
                         <div class="card-body text-center">
                             <table>
                                 <tr>
                                     <td hidden><?php echo $row['id']; ?></td>
                                     <td>
                                         <img src="<?php echo isset($row['cover_img']) ? 'admin/room_img/' . $row['cover_img'] : '' ?>" style="width: 100%; height: 15vw; object-fit: cover;" class="shadow bg-body rounded" alt="">
                                     </td>
                                 </tr>
                                 <tr>
                                     <td style="font-family: Verdana"><b>
                                             <p class=" mt-3"><?php echo $row['name']; ?>
                                         </b></p>
                                     </td>
                                 </tr>
                                 <tr>
                                     <td hidden><?php echo $row['id']; ?></td>
                                     <td hidden><?php echo $row['name']; ?></td>
                                     <td hidden><?php echo $row['cover_img']; ?></td>
                                     <td hidden><?php echo $row['price']; ?></td>
                                     <td><a href="room_profile.php?room_id=<?php echo $row['id']; ?>"><button type="button" class="btn btn-outline-success mt-1">More Details</button< /a>
                                     </td>
                                 </tr>

                             </table>
                         </div>

                     </div>

                 </div>

             <?php
                }
                ?>

         </div>
         <div id="facilities"></div>
         <div style="margin-top:4rem;"></div>

         <br>
         <h1 class="text-center" style="font-family: Verdana"><b>FACILITIES</b></h1>

         <hr style=" position: relative;
		  width: 20rem;
		  height: 1px;
		  background: black;">

         <div class="row md-4">
             <?php
                $query = "SELECT
                facilities.status,
                facilities.id,
                facilities.faci_id,
                faci_categories.id,
                faci_categories.venue,
                faci_categories.faci_desc,
                faci_categories.pax,
                faci_categories.price,
                faci_categories.cover_img
            FROM
                facilities
            JOIN
                faci_categories
            ON
                facilities.faci_id = faci_categories.id;
            ";
                $query_run = mysqli_query($conn, $query);
                while ($row = mysqli_fetch_assoc($query_run)) {
                ?>
                 <div class="col-md-3">
                     <div class="card1">
                         <div class="card-body text-center">
                             <table>
                                 <tr>
                                     <td hidden><?php echo $row['id']; ?></td>
                                     <td>
                                         <img src="assets/img/<?php echo $row['cover_img'] ?>" style="width: 100%; height: 15vw; object-fit: cover;" class="shadow bg-body rounded" alt="">
                                     </td>
                                 </tr>
                                 <tr>
                                     <td style="font-family: Verdana"><b>
                                             <p class=" mt-3"><?php echo $row['venue']; ?>
                                         </b></p>
                                     </td>
                                 </tr>
                                 <tr>
                                     <td hidden><?php echo $row['id']; ?></td>
                                     <td hidden><?php echo $row['faci_desc']; ?></td>
                                     <td hidden><?php echo $row['cover_img']; ?></td>
                                     <td hidden><?php echo $row['price']; ?></td>
                                     <td><a href="events.php?event_id=<?php echo $row['id']; ?>"><button type=" button" class="btn btn-outline-success mt-1"> Book a Facility</button></a>
                                     </td>
                                 </tr>
                             </table>
                         </div>
                     </div>
                 </div>
             <?php
                }
                ?>
         </div>
         <br>


         <div id="ameneties"></div>
         <div style="margin-top:4rem;"></div>

         <br>
         <h1 class="text-center" style="font-family: Verdana"><b>AMENETIES</b></h1>

         <hr style=" position: relative;
		  width: 20rem;
		  height: 1px;
		  background: black;">
         <div id="carouselAmeneties" class="carousel slide" data-ride="carousel">
             <ol class="carousel-indicators">
                 <li data-target="#carouselAmeneties" data-slide-to="0" class="active"></li>
                 <li data-target="#carouselAmeneties" data-slide-to="1"></li>
                 <li data-target="#carouselAmeneties" data-slide-to="2"></li>
                 <li data-target="#carouselAmeneties" data-slide-to="3"></li>
                 <li data-target="#carouselAmeneties" data-slide-to="4"></li>
                 <li data-target="#carouselAmeneties" data-slide-to="5"></li>
                 <li data-target="#carouselAmeneties" data-slide-to="6"></li>
             </ol>
             <div id="carouselAmeneties" class="carousel slide" data-ride="carousel">
                 <ol class="carousel-indicators">
                     <li data-target="#carouselAmeneties" data-slide-to="0" class="active"></li>
                     <li data-target="#carouselAmeneties" data-slide-to="1"></li>
                     <li data-target="#carouselAmeneties" data-slide-to="2"></li>
                     <li data-target="#carouselAmeneties" data-slide-to="3"></li>
                     <li data-target="#carouselAmeneties" data-slide-to="4"></li>
                     <li data-target="#carouselAmeneties" data-slide-to="5"></li>
                     <li data-target="#carouselAmeneties" data-slide-to="6"></li>
                 </ol>
                 <div class="carousel-inner">
                     <div class="carousel-item active">
                         <img class="d-block w-100" src="assets/img/1690857360_car5.webp" alt="Swimming Pool">

                         <div class="carousel-caption d-none d-md-block" style=" background: rgba(0, 0, 0, 0.5);">
                             <h4><b>Swimming Pool<b></h4>
                             <p>
                                 <i>A dip at our roof deck pool is one activity that guests, kids and adults alike, can
                                     all enjoy. Swimming is comforting and revitalizing to the senses especially after a
                                     long day.
                                 </i>
                             </p>
                         </div>

                     </div>
                     <div class="carousel-item">
                         <img class="d-block w-100" src="assets/img/coffeeshop.webp" alt="Coffee Shop">
                         <div class="carousel-caption d-none d-md-block" style=" background: rgba(0, 0, 0, 0.5);">
                             <h4><b>The Bayview Coffee Shop<b></h4>
                             <p>
                                 <i>The Bayview Coffee Shop at the hotel lobby serves sumptuous feasts from 6:00 AM to
                                     10:00 PM. From international cuisine to local favorites, the selections promise to
                                     delight the palate. Plus, the relaxing ambience of a lobby bar and lounge makes it
                                     an ideal place for a rendezvous.
                                 </i>
                             </p>
                         </div>
                     </div>
                     <div class="carousel-item">
                         <img class="d-block w-100" src="assets/img/gym.jpg" alt="Gym">

                         <div class="carousel-caption d-none d-md-block" style=" background: rgba(0, 0, 0, 0.5);">
                             <h4><b>Fitness Gym<b></h4>
                             <p>
                                 <i>The hotel places great importance on health and wellness. Guests can work out while
                                     staying at Bayview Park Hotel Manila. The hotel gym has a treadmill, stationary
                                     bikes, a stair climber, and multi-station strength training equipment.
                                 </i>
                             </p>
                         </div>



                     </div>
                     <div class="carousel-item">
                         <img class="d-block w-100" src="assets/img/internet.webp" alt="Internet Kiosk">


                         <div class="carousel-caption d-none d-md-block" style=" background: rgba(0, 0, 0, 0.5);">
                             <h4><b>Internet Kiosk<b></h4>
                             <p>
                                 <i>Communication is important wherever you go in the world. Stay connected with your
                                     business associates, friends, and loved ones through our Internet kiosk located at
                                     the lobby.
                                 </i>
                             </p>
                         </div>

                     </div>
                     <div class="carousel-item">
                         <img class="d-block w-100" src="assets/img/children.webp" alt="Children’s Activity Center">


                         <div class="carousel-caption d-none d-md-block" style=" background: rgba(0, 0, 0, 0.5);">
                             <h4><b>Children’s Activity Center<b></h4>
                             <p>
                                 <i>In-house guests can take their kids to the Children’s Activity Center located on the
                                     2nd floor. Open from 9:00 AM to 7:00 PM during Saturdays and Sundays, this indoor
                                     play area provides a venue for children to watch TV shows and movies, read books,
                                     or engage in various forms of fun and recreation.
                                 </i>
                             </p>
                         </div>
                     </div>
                     <div class="carousel-item">
                         <img class="d-block w-100" src="assets/img/massage.jpg" alt="Massage and Reflexology">

                         <div class="carousel-caption d-none d-md-block" style=" background: rgba(0, 0, 0, 0.5);">
                             <h4><b>Massage and Reflexology<b></h4>
                             <p>
                                 <i>Enjoy professional massage services courtesy of Bayview Park Hotel Manila’s
                                     experienced in-house masseuses.
                                 </i>
                             </p>
                         </div>


                     </div>
                 </div>
                 <!-- Next Prev Buttons -->
                 <a class="carousel-control-prev" href="#carouselAmeneties" role="button" data-slide="prev">
                     <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                     <span class="sr-only">Previous</span>
                 </a>
                 <a class="carousel-control-next" href="#carouselAmeneties" role="button" data-slide="next">
                     <span class="carousel-control-next-icon" aria-hidden="true"></span>
                     <span class="sr-only">Next</span>
                 </a>
             </div>

             <div id="offers"></div>
             <div style="margin-top:4rem;"></div>

             <br>
             <h1 class="text-center" style="font-family: Verdana"><b>OFFERS</b></h1>

             <hr style=" position: relative;
		  width: 20rem;
		  height: 1px;
		  background: black;">
             <center>
                 <div class="row" id="ads">
                     <!-- Category Card -->
                     <div class="col-md-4">
                         <div class="card rounded">
                             <div class="card-image">

                                 <span class="card-notify-year">10% OFF</span>
                                 <img class="img-fluid" src="assets/img/img/Bayview-Park-Hotel-Promos-Treat-for-Early-Bookings-Web.webp" alt="Early Bookings Promo" />
                             </div>
                             <div class="card-image-overlay m-auto">
                                 <br>
                                 <span class="card-detail-badge">10% OFF for Dine In</span>
                                 <span class="card-detail-badge">10% OFF for Room Service</span>
                                 <span class="card-detail-badge">FREE in-room WiFi Connection</span>
                                 <span class="card-detail-badge">FREE local calls</span>
                                 <span class="card-detail-badge">FREE coffee and tea</span>
                                 <span class="card-detail-badge"> FREE bottled water
                                 </span>
                                 <span class="card-detail-badge"> FREE use of facilities</span>
                             </div>
                             <div class="card-body text-center">
                                 <div class="ad-title m-auto">
                                     <h5>Treat for Early Bookings</h5>
                                 </div>
                                 <a class="ad-btn" href="index.php?page=rooms">Check Availability</a>
                             </div>
                         </div>
                     </div>
                     <div class="col-md-4">
                         <div class="card rounded">
                             <div class="card-image">
                                 <span class="card-notify-year">BEST</span>
                                 <img class="img-fluid" src="assets/img/img/Bayview-Park-Hotel-Promos-Best-Available-Rate-Web.webp" alt="Best Available Rate" />
                             </div>
                             <div class="card-image-overlay m-auto">
                                 <br>
                                 <span class="card-detail-badge">Superior Room</span>
                                 <span class="card-detail-badge">3, 555/night</span>
                                 <span class="card-detail-badge">FREE Buffet Breakfast</span>
                                 <span class="card-detail-badge">FREE in-room WiFi Connection</span>
                                 <span class="card-detail-badge">FREE local calls</span>
                                 <span class="card-detail-badge">FREE coffee and tea</span>
                                 <span class="card-detail-badge"> FREE bottled water
                                 </span>
                             </div>
                             <div class="card-body text-center">
                                 <div class="ad-title m-auto">
                                     <h5>Best Available Rate</h5>
                                 </div>
                                 <a class="ad-btn" href="index.php?page=rooms">Check Availabilit</a>
                             </div>
                         </div>



                     </div>
                 </div>

             </center>

             <br>








             <div id="contact"></div>
             <div style="margin-top:4rem;"></div>

             <br>

             <h3 class="text-center" style="font-family: Verdana"><b>Contact Us</b></h3>
             <hr style=" position: relative;
		width: 13rem;
        height: 1px;
        background: black;">
             <br>


             <center>
                 <div class="col-lg-6 col-md-6 px-4">
                     <div class="bg-white rounded shadow p-4">
                         <form action="admin/crud_function.php" method="POST">
                             <div>
                                 <label class="form-label float-left" style="font-weight: 500;">Name</label>
                                 <input name="name" required type="text" class="form-control shadow-none">
                             </div>
                             <div class="mt-3">
                                 <label class="form-label float-left" style="font-weight: 500;">Email</label>
                                 <input name="email" required type="email" class="form-control shadow-none">
                             </div>
                             <div class="mt-3">
                                 <label class="form-label float-left" style="font-weight: 500;">Contact no.</label>
                                 <input name="contact" required type="number" class="form-control shadow-none">
                             </div>
                             <div class="mt-3">
                                 <label class="form-label float-left" style="font-weight: 500;">Message</label>
                                 <textarea name="message" required class="form-control shadow-none" rows="5" style="resize: none;"></textarea>
                             </div>
                             <button type="submit" name="contact_us" class="btn btn-primary mt-3">Submit</button>
                         </form>
                     </div>
                 </div>
             </center>

             <div id="location"></div>
             <div style="margin-top:4rem;"></div>
             <br>
             <h3 class="text-center" style="font-family: Verdana"><b>Locate Us</b></h3>
             <hr style=" position: relative;
		width: 13rem;
        height: 1px;
        background: black;">
             <br>
             <h5 class="text-center" style="font-family: Verdana">ADDRESS</h5>
             <h6 class="text-center" style="font-family: Verdana">1118 Roxas Boulevard</h6>
             <h6 class="text-center" style="font-family: Verdana">corner United Nations Avenue</h6>
             <h6 class="text-center" style="font-family: Verdana">Manila, 1000, Philippines</h6>

             <br>
             <br>
             <h5 class="text-center" style="font-family: Verdana">AREA INFORMATION</h5>
             <h6 class="text-center" style="font-family: Verdana">Bayview Park Hotel in Manila, Philippines is about 20
                 minutes from Ninoy Aquino International Airport (NAIA).</h6>
             <h6 class="text-center" style="font-family: Verdana"> It is a 10-minute walk from the UN Avenue Station of
                 LRT
                 1 and some 12 minutes off Manila North Harbor Port. This hotel near US Embassy boasts a</h6>
             <h6 class="text-center" style="font-family: Verdana">location right at the heart of the city’s historical
                 landmarks.</h6>
             <br>
             <h6 class="text-center" style="font-family: Verdana">A short stroll down Roxas Boulevard will take you to
                 the
                 bursting view of Manila Bay. Here, you can find yourself at the hub of action as you survey the rows
             </h6>
             <h6 class="text-center" style="font-family: Verdana">of restaurants and scenic locations catering to every
                 taste. Significant sites and places of interest are also a few minutes away from the hotel, such as:
             </h6>
             <br>
             <br>
             <div class="row">
                 <div class="col">
                     <h4 class="text-center" style="font-family: Verdana">HISTORICAL SITES</h4>
                     <h6 class="text-center" style="font-family: Verdana">Rizal Park</h6>
                     <h6 class="text-center" style="font-family: Verdana">Intramuros</h6>
                     <h6 class="text-center" style="font-family: Verdana">Fort Santiago</h6>
                     <br>
                     <h4 class="text-center" style="font-family: Verdana">SHOPPING AND ENTERTAINMENT</h4>
                     <h6 class="text-center" style="font-family: Verdana">Manila Ocean Park</h6>
                     <h6 class="text-center" style="font-family: Verdana">Star City</h6>
                     <h6 class="text-center" style="font-family: Verdana">SM Mall of Asia (MOA)</h6>
                     <h6 class="text-center" style="font-family: Verdana">Robinsons Place Ermita</h6>
                     <h6 class="text-center" style="font-family: Verdana">SM Manilak</h6>
                     <br>
                     <h4 class="text-center" style="font-family: Verdana">EDUCATIONAL</h4>
                     <h6 class="text-center" style="font-family: Verdana">National Planetarium</h6>
                     <h6 class="text-center" style="font-family: Verdana">National Museum of the Philippines</h6>
                     <h6 class="text-center" style="font-family: Verdana">Metropolitan Museum of Manila</h6>
                     <h6 class="text-center" style="font-family: Verdana">National Museum of Anthropology</h6>
                     <br>

                 </div>
                 <div class="col">
                     <h4 class="text-center" style="font-family: Verdana">ARTS AND CULTURE</h4>
                     <h6 class="text-center" style="font-family: Verdana">Cultural Center of the Philippines (CCP)</h6>
                     <h6 class="text-center" style="font-family: Verdana">Philippine International Convention Center
                         (PICC)
                     </h6>
                     <h6 class="text-center" style="font-family: Verdana">World Trade Center Manila</h6>
                     <h6 class="text-center" style="font-family: Verdana">SMX Convention Center</h6>
                     <br>
                     <h4 class="text-center" style="font-family: Verdana">MEDICAL INSTITUTIONS</h4>
                     <h6 class="text-center" style="font-family: Verdana">Manila Doctor’s Hospital</h6>
                     <h6 class="text-center" style="font-family: Verdana">Medical Center Manila</h6>
                     <h6 class="text-center" style="font-family: Verdana">Philippine General Hospital</h6>

                 </div>
             </div>



             <center>
                 <div class="card shadow bg-body rounded" style="width:70rem; height:30rem;">
                     <div class="card-body align-items-center justify-content-center text-center">
                         <div class="mapouter">
                             <div class="gmap_canvas"><iframe width="100%" height="100%" id="gmap_canvas" src="https://maps.google.com/maps?q=1118 Roxas Boulevard corner United Nations Avenue, Manila, 1000, Philippines&t=&z=18&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><a href="https://2yu.co">2yu</a><br>
                                 <style>
                                     .mapouter {
                                         position: relative;
                                         text-align: right;
                                         height: 100%;
                                         width: 100%;
                                     }
                                 </style><a href="https://embedgooglemap.2yu.co/">html embed google map</a>
                                 <style>
                                     .gmap_canvas {
                                         overflow: hidden;
                                         background: none !important;
                                         height: 100%;
                                         width: 100%;
                                     }
                                 </style>
                             </div>
                         </div>
                     </div>
                 </div>
             </center>





         </div>
     </div>



     <br>

 </div>