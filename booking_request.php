<?php
session_start();
include('header.php');
include('admin/db_connect.php');

$query = $conn->query("SELECT * FROM system_settings limit 1")->fetch_array();
foreach ($query as $key => $value) {
  if (!is_numeric($key))
    $_SESSION['setting_' . $key] = $value;
}

$rid = '';
$calc_days = abs(strtotime($_GET['out']) - strtotime($_GET['in']));
$calc_days = floor($calc_days / (60 * 60 * 24));
?>



<?php
$date_in = isset($_POST['date_in']) ? $_POST['date_in'] : date('Y-m-d');
$date_out = isset($_POST['date_out']) ? $_POST['date_out'] : date('Y-m-d', strtotime(date('Y-m-d') . ' + 3 days'));
?>
<div class="m-3"><a href="index.php?page=home#rooms"><button class="btn btn-primary">Back To Home</button></a></div>


<?php
$room_id = $_GET["room_id"];
$select = "SELECT * FROM room_categories WHERE id = $room_id ";
$sel = mysqli_query($conn, $select);

foreach ($sel as $room_data) {
  $name = $room_data['name'];
  $price = $room_data['price'];
  $img = $room_data['cover_img'];
  $room_desc = $room_data['room_desc'];
  $adult = $room_data['adult'];
  $child = $room_data['child'];
}
?>

<body style="background-color: rgb(238,174,202);
background: radial-gradient(circle, rgba(238,174,202,1) 0%, rgba(121,30,30,1) 100%);;">


  <div class="card m-3">
    <div class="card-body">
      <div class="row">
        <div class="col-4">
          <img src="admin/room_img/<?php echo $img; ?>" style="width: 100%; height: 15vw; object-fit: cover;" class="shadow bg-body rounded" alt="">
          <br>
          <br>
          <h2 class="" style="font-family: Verdana"><b><?php echo $name; ?></b></h2>
          <h3 class="" style="font-family: Verdana"><b>₱ <?php echo $price; ?> / Per Day</b></h3>
          <br>
          <h6 style="font-family: Verdana"><b>Description: </b></h6>
          <h6 style="font-family: Verdana"><?php echo $room_desc; ?></h6>
          <br>
          <h6 style="font-family: Verdana; color:red"><i><b>This promo cannot be used in conjunction with any
                other discount or promotional offers (i.e. Senior Citizen).
                Strictly no refunds. </i></b></h6>

        </div>


        <div class="col-8">
          <h2 class="text-center" style="font-family: Verdana"><b>GUEST INFORMATION</b></h2>
          <h6 class="text-center" style="font-family: Verdana"><b>Kindly fill up the form for booking request</b></h6>
          <form action="admin/crud_function.php" method="POST" id="bookingForm" data-submitted="false">

            <input type="hidden" name="booked_cid" value="<?php echo $room_id; ?>">
            <div class="row" style="font-family: Verdana">
              <div class="col">
                <label for="">Fullname</label>
                <input type="text" name="fname" class="form-control" required>
              </div>
              <div class="col">
                <label for="">Email</label>
                <input type="email" name="email" class="form-control" required>
              </div>
            </div>

            <br>

            <div class="row" style="font-family: Verdana">
              <div class="col">
                <label for="">Address</label>
                <input type="text" name="address" class="form-control" required>
              </div>
              <div class="col">
                <label for="">Contact No</label>
                <input type="number" name="contact" class="form-control" required>
              </div>
            </div>

            <br>

            <div class="row" style="font-family: Verdana" required>
              <div class="col">
                <label for="">Check In Date</label>
                <input type="Date" name="check_in" class="form-control" required value="<?php echo isset($_GET['in']) ? date("Y-m-d", strtotime($_GET['in'])) : date("Y-m-d") ?>">
              </div>
              <div class="col">
                <label for="">Check In Time</label>
                <input type="Time" value="14:00" class="form-control" required readonly>
              </div>
              <div class="col">
                <label for="">Check Out Time</label>
                <input type="Time" value="12:00" class="form-control" required readonly>
              </div>
            </div>

            <br>

            <div class="row" style="font-family: Verdana">
              <div class="col-6">
                <label for="">Days of stay</label>
                <input type="number" name="no_days" min="1" id="predefinedValue" class="form-control" value="<?php echo isset($_GET['in']) ? $calc_days : 1 ?>" required>
                <input type="hidden" value="<?php echo $price; ?>" id="inputValue">
              </div>

            </div>

            <hr style=" position: relative; height: 2px; background: black;">

            <div class="row float-right" style="font-family: Verdana">
              <div class="col">
                <h5 class="" style="font-family: Verdana"><b>Booking Total</b> </h5>
                <h3 class="" style="font-family: Verdana">PHP <b><span id="result"></span></b> </h3>
                <h6 class="" style="font-family: Verdana">Downpayment (10%)<b> <span id="percentageResult"></span></b> </h6>
                <input type="hidden" name="downpayment" id="percentageResultInput">
                <hr style=" position: relative; height: 1px; background: black;">
                <label style="font-family: Verdana">
                  <h6 class="" style="font-family: Verdana; color: red; "> <b>(STRICTLY NO REFUND)</b></h6>
                  <input type="checkbox" id="termsCheckbox" onchange="updateSubmitButton()">
                  By completing this booking you
                  <br>
                  agree to the
                  <a href="#" data-toggle="modal" data-target="#bookingTermsModal" title="Booking Terms">Booking Terms</a> and
                  <a href="#" data-toggle="modal" data-target="#privacyPolicyModal" title="Privacy Policy">Privacy Policy.</a>
                </label>
                <br>
                <br>
                <button class="btn btn-success float-right" type="button" id="openModalBtn" disabled>Confirm & Book</button>
              </div>

            </div>
          </form>
        </div>

      </div>


      <body>
        <script>
          function updateSubmitButton() {
            var termsCheckbox = document.getElementById("termsCheckbox");
            var submitButton = document.getElementById("openModalBtn");
            var inputFields = document.querySelectorAll("#bookingForm input"); // Select all input fields within the form

            var isAnyInputEmpty = false;
            inputFields.forEach(function(inputField) {
              if (inputField.value.trim() === "") {
                isAnyInputEmpty = true;
              }
            });

            if (!termsCheckbox.checked || isAnyInputEmpty) {
              submitButton.disabled = true; // Disable the button if checkbox is unchecked or any input is empty
            } else {
              submitButton.disabled = false; // Enable the button
            }
          }

          // Add event listeners for input and checkbox changes
          document.getElementById("termsCheckbox").addEventListener("change", updateSubmitButton);
          document.querySelectorAll("#bookingForm input").forEach(function(inputField) {
            inputField.addEventListener("input", updateSubmitButton);
          });

          // Compute the sum when the page loads and update the submit button state
          computeSum();
          updateSubmitButton();
        </script>

        <script>
          // Function to compute the sum of the predefined value and input value
          function computeSum() {
            let predefinedValue = parseFloat(document.getElementById("predefinedValue").value);
            const inputValue = parseFloat(document.getElementById("inputValue").value);

            // Check if the predefinedValue is 0
            if (predefinedValue === 0) {
              predefinedValue = 1; // Set predefinedValue to 1 when it is 0
              document.getElementById("predefinedValue").value = 1; // Update the input field value
            }

            // Check if both input fields have valid numbers
            if (!Number.isNaN(predefinedValue) && !Number.isNaN(inputValue)) {
              const result = predefinedValue * inputValue;
              const percentageResult = (result * 0.1).toFixed(2); // Calculate 10% (0.1) of the sum result and round to 2 decimal places

              document.getElementById("result").innerText = `${result}`;
              document.getElementById("percentageResult").innerText = ` ${percentageResult}`;
              document.getElementById("percentageResultInput").value = percentageResult; // Set the value of the input box
            } else {
              document.getElementById("result").innerText = " ";
              document.getElementById("percentageResult").innerText = "";
              document.getElementById("percentageResultInput").value = ""; // Clear the input box if the input is not valid
            }
          }

          // Add an event listener to the predefinedValue input field
          document.getElementById("predefinedValue").addEventListener("input", computeSum);

          // Compute the sum when the page loads
          computeSum();
        </script>
      </body>

    </div>

  </div>


  <br>
  <br>

</body>


<script>
  document.addEventListener("DOMContentLoaded", function() {
    var modalOpenBtn = document.getElementById("openModalBtn");
    var bookingForm = document.getElementById("bookingForm");
    var confirmBookingBtn = document.getElementById("confirmBookingBtn");

    modalOpenBtn.addEventListener("click", function() {
      // Populate the hidden input fields with form data
      document.getElementById("modal_booked_cid").value = bookingForm.booked_cid.value;
      document.getElementById("modal_fname").value = bookingForm.fname.value;
      document.getElementById("modal_email").value = bookingForm.email.value;
      document.getElementById("modal_address").value = bookingForm.address.value;
      document.getElementById("modal_contact").value = bookingForm.contact.value;
      document.getElementById("modal_check_in").value = bookingForm.check_in.value;
      document.getElementById("modal_downpayment").value = bookingForm.downpayment.value;
      document.getElementById("modal_downpayment1").value = bookingForm.downpayment.value;
      document.getElementById("modal_no_days").value = bookingForm.no_days.value;
      // Open the modal
      $('#bookingModal').modal('show');
    });

    // Handle the "Book" button inside the modal
    confirmBookingBtn.addEventListener("click", function() {
      // Submit the form using JavaScript
      bookingForm.submit();
    });
  });
</script>




<!-- Add this modal code before the </body> tag -->
<div class="modal" id="bookingModal" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Do you want to continue with the booking?</h5>
      </div>
      <div class="modal-body">
        <h4>Downpayment: PHP : <b><input disabled type="text" style="border: none; outline: none; color: red;" id="modal_downpayment1"></b></h4>
        <br>
        <form action="admin/crud_function.php" method="POST">

          <input type="hidden" name="booked_cid" id="modal_booked_cid">
          <input type="hidden" name="fname" id="modal_fname">
          <input type="hidden" name="email" id="modal_email">
          <input type="hidden" name="address" id="modal_address">
          <input type="hidden" name="contact" id="modal_contact">
          <input type="hidden" name="check_in" id="modal_check_in">
          <input type="hidden" name="downpayment" id="modal_downpayment">
          <input type="hidden" name="no_days" id="modal_no_days">
          <input type="hidden" name="check_in_time" value="14:00" class="form-control" required readonly>
          <input type="hidden" name="check_out_time" value="12:00" class="form-control" required readonly>

          <h6><b>Before submitting the form make sure to enter right Transaction Number:</b></h6>
          <div class="row">
            <div class="col">
              <input type="text" required class="form-control" name="transaction_no" placeholder="Enter your Transaction number..... ">
            </div>
            <div class="col">
              <select name="type_of_payment" class="form-control" required>
                <option value="Gcash">GCASH</option>
                <option value="Paymaya">PAYMAYA</option>
              </select>
            </div>
          </div>


          <br>

          <br>
          <div class="row text-center">
            <div class="col">
              <img src="https://coursebank-static-assets.s3-ap-northeast-1.amazonaws.com/faq/pandr/pandr1.jpg" style="width: 80%; height: 100%; object-fit: cover;" alt="">
            </div>
            <div class="col">
              <img src="https://www.maya.ph/hubfs/Maya/Maya%20Business/Offline%20QR/Maya%20Standee-1.png" style="width: 80%; height: 100%; object-fit: cover;" alt="">
            </div>
          </div>




      </div>


      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-success" name="booking_request">Book</button>
      </div>
      </form>
    </div>
  </div>
</div>




<!-- Add this modal code before the </body> tag -->
<div class="modal" id="bookingTermsModal" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Booking Terms</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- Add content for Booking Terms here -->
        <!-- You can include an iframe to display a PDF file -->
        <img src="termspolicy/BookingTerms.jpg" style="width: 100%;  " alt="">
        <!-- <iframe src="BookingTerms.pdf" style="width: 100%; height: 100%; border: none;"></iframe> -->
      </div>
    </div>
  </div>
</div>


<!-- Add this modal code before the </body> tag -->
<div class="modal" id="privacyPolicyModal" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Privacy Policy</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- Add content for Privacy Policy here -->
        <!-- You can include an iframe to display a PDF file -->
        <img src="termspolicy/PrivacyPolicy-1.jpg" style="width: 100%;  " alt="">
        <img src="termspolicy/PrivacyPolicy-2.jpg" style="width: 100%;  " alt="">
        <img src="termspolicy/PrivacyPolicy-3.jpg" style="width: 100%;  " alt="">
        <img src="termspolicy/PrivacyPolicy-4.jpg" style="width: 100%;  " alt="">
        <!-- <iframe src="PrivacyPolicy.pdf" style="width: 100%; height: 100%; border: none;"></iframe> -->
      </div>
    </div>
  </div>
</div>