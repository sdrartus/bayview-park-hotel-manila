<!DOCTYPE html>
<html lang="en">

<?php
session_start();
include('header.php');
include('admin/db_connect.php');

$query = $conn->query("SELECT * FROM system_settings limit 1")->fetch_array();
foreach ($query as $key => $value) {
  if (!is_numeric($key))
    $_SESSION['setting_' . $key] = $value;
}
?>

<style>
  header.masthead {
    background: url("assets/img/img/car1.webp");
    background-repeat: no-repeat;
    background-size: 100%;
  }
</style>

<body id="page-top">
  <!-- Navigation-->
  <div class="toast" id="alert_toast" role="alert" aria-live="assertive" aria-atomic="true">
    <div class="toast-body text-white">
    </div>
  </div>
  <nav class="navbar navbar-expand-lg fixed-top py-3" id="mainNav" style="background:danger;">
    <div class="container">

      <a class="navbar-brand js-scroll-trigger" href="./"><img src="assets/img/img/bayviewlogo.webp" alt=""></a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto my-2 my-lg-0">
          <li class="nav-item"><a class="nav-link js-scroll-trigger" href="index.php?page=home#home">Home</a>
          </li>
          <li class="nav-item"><a class="nav-link js-scroll-trigger" href="index.php?page=home#rooms">Rooms</a></li>
          <li class="nav-item"><a class="nav-link js-scroll-trigger" href="index.php?page=home#facilities">Facilities</a></li>
          <li class="nav-item"><a class="nav-link js-scroll-trigger" href="index.php?page=home#ameneties">Ameneties</a></li>
          <li class="nav-item"><a class="nav-link js-scroll-trigger" href="index.php?page=home#offers">Offers</a></li>
          <li class="nav-item"><a class="nav-link js-scroll-trigger" href="index.php?page=home#about">About</a></li>
          <li class="nav-item"><a class="nav-link js-scroll-trigger" href="index.php?page=home#contact">Contact Us</a></li>
          <li class="nav-item"><a class="nav-link js-scroll-trigger" href="index.php?page=home#location">Location</a></li>
        </ul>
      </div>
    </div>
  </nav>

  <?php
  $page = isset($_GET['page']) ? $_GET['page'] : "home";
  include $page . '.php';
  ?>


  <div class="modal fade" id="confirm_modal" role='dialog'>
    <div class="modal-dialog modal-md" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Confirmation</h5>
        </div>
        <div class="modal-body">
          <div id="delete_content"></div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" id='confirm' onclick="">Continue</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="uni_modal" role='dialog'>
    <div class="modal-dialog modal-md" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title"></h5>
        </div>
        <div class="modal-body">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" id='submit' onclick="$('#uni_modal form').submit()">Save</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        </div>
      </div>
    </div>
  </div>
  <footer style="background-color: #f0f0f0; padding: 20px;">
    <div style="max-width: 1200px; margin: 0 auto; text-align: center;">
      <div style="display: inline-block; margin-bottom: 10px;">
        <img src="https://b2734670.smushcdn.com/2734670/wp-content/uploads/2022/05/SScopy-145w.jpg?lossy=1&strip=1&webp=1" alt="Your Logo" style="height: 200px; width: auto;">
        <img src="https://b2734670.smushcdn.com/2734670/wp-content/uploads/2022/05/TAcopy-148w.jpg?lossy=1&strip=1&webp=1" alt="Your Logo" style="height: 200px; width: auto;">
      </div>
      <div style="display: margin-bottom: 10px;">


      </div>
      <div class="mt-3 " style="font-family: Verdana">
        Bayview Park Hotel Manila | 1118 Roxas Boulevard corner United Nations Avenue, Manila, 1000, Philippines
        | Phone Number: +63-2-85261555
      </div>
      <br>
      <div style="font-size: 14px; font-family: Verdana;">
        &copy; 2023 BAYVIEW PARK HOTEL MANILA. All rights reserved.
      </div>

    </div>
  </footer>

  <?php include('footer.php') ?>
</body>

<?php $conn->close() ?>

</html>