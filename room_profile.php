
<?php 
session_start();
include('header.php');
include('admin/db_connect.php');

$query = $conn->query("SELECT * FROM system_settings limit 1")->fetch_array();
foreach ($query as $key => $value) {
    if(!is_numeric($key))
        $_SESSION['setting_'.$key] = $value;
}
?>



<?php
$date_in = isset($_POST['date_in']) ? $_POST['date_in'] : date('Y-m-d');
$date_out = isset($_POST['date_out']) ? $_POST['date_out'] : date('Y-m-d',strtotime(date('Y-m-d').' + 3 days'));
?>
<div class="m-3"><a href="index.php?page=home#rooms"><button class="btn btn-primary">Back</button></a></div>


<?php 
$room_id = $_GET["room_id"];
$select = "SELECT * FROM room_categories WHERE id = $room_id ";
$sel = mysqli_query($conn, $select);

foreach($sel as $room_data){
$name = $room_data['name'];
$price = $room_data['price'];
$img = $room_data['cover_img'];
$room_desc = $room_data['room_desc'];
$adult = $room_data['adult'];
$child = $room_data['child'];
}
?>


<div class="card m-3">
    <div class="card-body">
        <div class="row">
            <div class="col md-3">
                <img src="admin/room_img/<?php echo $img; ?>"  style="width: 100%; height: 40vw; object-fit: cover;" class="shadow bg-body rounded" alt="" >
            </div>
            <div class="col md-7">
                <h1 class="" style="font-family: Verdana"><b><?php echo $name; ?></b></h1>
                <h3 class="" style="font-family: Verdana"><b>₱ <?php echo $price;?> / Per Day</b></h3>
                <br>
                <div class="row">
                    <div class="col"><h6  style="font-family: Verdana"><b>Adult: </b><?php echo $adult; ?></h6></div>
                    <div class="col"><h6  style="font-family: Verdana"><b>Child: </b><?php echo $child; ?></h6></div>
                </div>
                <br>
                <h6  style="font-family: Verdana"><b>Description:  </b></h6>
                <br>
                <h6  style="font-family: Verdana"><?php echo $room_desc; ?></h6>
                <br>
                <br>
           
                <br>            
                <form action="index.php?page=rooms" id="filter" method="POST">
                    					<div class="row">
                    						<div class="col-md-3 text-center mt-4">
                    							<label for="" style="font-family: Verdana">Check-in Date</label>
                    							<input type="date" class="form-control " name="date_in" autocomplete="off">
                    						</div>
                    						<div class="col-md-3 text-center mt-4">
                    							<label for="" style="font-family: Verdana">Check-out Date</label>
                    							<input type="date" class="form-control " name="date_out" autocomplete="off">
                    						</div>
                    						<div class="col text-center mt-5">
                    							<button class="btn btn-primary">Check Availability</button>
                    						</div>
                    					</div>
                    				</form>
            </div>
        </div>
















    </div>
</div>

















<script>
	$('.book_now').click(function(){
		uni_modal('Book','admin/book.php?in=<?php echo $date_in ?>&out=<?php echo $date_out ?>&cid='+$(this).attr('data-id'))
	})
</script>


