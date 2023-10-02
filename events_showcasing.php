<?php
$date_in = isset($_POST['date_in']) ? $_POST['date_in'] : date('Y-m-d');
$date_out = isset($_POST['date_out']) ? $_POST['date_out'] : date('Y-m-d',strtotime(date('Y-m-d').' + 3 days'));
?>

	 <!-- Masthead-->
        <header class="masthead">
            <div class="container h-100">
                <div class="row h-100 align-items-center justify-content-center text-center">
                    <div class="col-lg-10 align-self-end mb-4" style="background: #0000002e;">
                    	 <h1 class="text-uppercase text-white font-weight-bold">Events & Meetings</h1>
                        <hr class="divider my-4" />
                    </div>
                    
                </div>
            </div>
        </header>







<div class="card m-5">
    <div class="card-body">	
    <div class="card" id="filter-book">
                    		<div class="card-body">
                    			<div class="container-fluid">
                    				<form action="index.php?page=list" id="filter" method="POST">
                    					<div class="row">
                    						<div class="col-md-3">
                    							<label for="">Check-in Date</label>
                    							<input type="date" class="form-control " name="date_in" autocomplete="off">
                    						</div>
                    						<div class="col-md-3">
                    							<label for="">Check-out Date</label>
                    							<input type="date" class="form-control " name="date_out" autocomplete="off">
                    						</div>
                    						
                    						<div class="col-md-3">
                    							<br>
                    							<button class="btn-btn-block btn-primary mt-3">Check Availability</button>
                    						</div>

                    					</div>
                    				</form>
                    			</div>
                    		</div>
                    	</div>
    <hr>



    <div class="row md-4">
    <?php       
                 $query = "SELECT * FROM event_categories ";
                 $query_run = mysqli_query($conn, $query);
                        while($row = mysqli_fetch_assoc($query_run)){
    ?>
        <div class="col-md-3">
            <div class="card1">
  
                <div class="card-body text-center"  >
               
                        <table>
                            <tr>
                                <td>
                                    <img src="assets/img/<?php echo $row['cover_img']?>" style="width: 100%; height: 15vw; object-fit: cover;" class="rounded"alt="">
                                </td>
                            </tr>
                            <tr>
                                <td><b><?php echo $row['name']; ?></b></td>
                            </tr>
                            <tr>
                                <td><button type="button" class="btn btn-outline-success"> View </button></td>
                            </tr>
                        </table>
       
                    </form>
                </div> 
            </div>
        </div>

            <?php       
                        }
            ?>

</div>





    </div>
</div>

    



</div>


	



<script>
	$('.book_now').click(function(){
		uni_modal('Book','admin/book.php?in=<?php echo $date_in ?>&out=<?php echo $date_out ?>&cid='+$(this).attr('data-id'))
	})
</script>