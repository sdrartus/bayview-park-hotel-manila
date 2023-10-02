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


<body style="background-color: rgb(238,174,202);
background: radial-gradient(circle, rgba(238,174,202,1) 0%, rgba(121,30,30,1) 100%);;">
    
<div class="text-center" style="margin-top:1rem;">
<div class="card m-5">
    <div class="card-body">
        <img src="https://i.gifer.com/origin/11/1184b4c0aa977f925dde58d2075772dd.gif"  style="width: 15%; height: 5vw; object-fit: cover;" alt="">
        <br>
        <br>
        <h5  style="font-family: Verdana"><b>Thank you for filling up the form</b></h5>
        <h5  style="font-family: Verdana"><b>kindly wait for the response, your booking request is on process</b></h5>
       
        <br>
        <img src="assets/img/img/icon.png"  style="width: 25%; height: 10%; object-fit: cover;" alt="">
        <br>
        <br>
        <a href="index.php?page=home#rooms"><button class="btn btn-primary">Back To Home</button></a>
        
        <br>

    </div>
</div>
</div>

</body>