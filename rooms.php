<?php
$date_in = isset($_POST['date_in']) ? $_POST['date_in'] : date('Y-m-d');
$date_out = isset($_POST['date_out']) ? $_POST['date_out'] : date('Y-m-d', strtotime(date('Y-m-d') . ' + 3 days'));
?>

<!-- Masthead-->
<!-- <header class="masthead">
    <div class="container h-50">
        <div class="row h-50 align-items-center justify-content-center text-center">
            <div class="col-lg-10 align-self-end mb-4" style="background: #0000002e;">
                <h1 class="text-uppercase text-white font-weight-bold">Rooms</h1>
                <hr class="divider my-4" />
            </div>

        </div>
    </div>
</header> -->


<section class="page-section" style="background: rgb(179,116,116);
background: linear-gradient(158deg, rgba(179,116,116,1) 0%, rgba(136,62,59,1) 22%, rgba(82,12,12,1) 80%);">

    <div class="container">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
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

            <hr>
            <div class="row">
                <?php

                $cat = $conn->query("SELECT * FROM room_categories");
                $cat_arr = array();
                while ($row = $cat->fetch_assoc()) {
                    $cat_arr[$row['id']] = $row;
                }
                $qry = $conn->query("SELECT distinct(category_id),category_id from rooms where id not in (SELECT room_id from checked where '$date_in' BETWEEN date(date_in) and date(date_out) and '$date_out' BETWEEN date(date_in) and date(date_out)  )");
                while ($row = $qry->fetch_assoc()) :

                ?>
                <div class="col-md-4">
                    <div class="card rounded mb-3">
                        <div class="card-body text-center">
                                <img src="admin/room_img/<?php echo $cat_arr[$row['category_id']]['cover_img'] ?>" style="width: 100%; height: 30vh;" class="rounded"alt="">
                                <br>
                                <br>
                                <h3><b><?php echo $cat_arr[$row['category_id']]['name'] ?></b></h3>
                                <h5><b><?php echo '₱ ' . number_format($cat_arr[$row['category_id']]['price'], 2) ?></b><span>/ per day</span></h5>
                                <br>
                                <a href="booking_request.php?room_id=<?php echo $row['category_id'] ?>&in=<?php echo $date_in ?>&out=<?php echo $date_out ?>"><button class="btn btn-primary form-control">Book</button></a>
                        </div>
                    </div>
                </div>
                <?php endwhile; ?>
            </div>
        </div>
    </div>
</section>





<script>
    $('.book_now').click(function() {
        uni_modal('Book', 'admin/book.php?in=<?php echo $date_in ?>&out=<?php echo $date_out ?>&cid=' + $(this)
            .attr('data-id'))
    })
</script>