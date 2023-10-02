<?php
session_start();
include('header.php');
include('admin/db_connect.php');

$query = $conn->query("SELECT * FROM system_settings limit 1")->fetch_array();
foreach ($query as $key => $value) {
    if (!is_numeric($key))
        $_SESSION['setting_' . $key] = $value;
}

$eid = '';
// $calc_days = abs(strtotime($_GET['out']) - strtotime($_GET['in']));
// $calc_days = floor($calc_days / (60 * 60 * 24));
//
?>



<?php
// $date_in = isset($_POST['date_in']) ? $_POST['date_in'] : date('Y-m-d');
// $date_out = isset($_POST['date_out']) ? $_POST['date_out'] : date('Y-m-d', strtotime(date('Y-m-d') . ' + 3 days'));
//
?>
<div class="m-3"><a href="index.php?page=home#facilities"><button class="btn btn-primary">Back To Home</button></a>
</div>


<?php
$event_id = $_GET["event_id"];
$select = "SELECT * FROM faci_categories WHERE id = $event_id ";
$sel = mysqli_query($conn, $select);

foreach ($sel as $event_data) {
    $name = $event_data['venue'];
    $price = $event_data['price'];
    $img = $event_data['cover_img'];
    $event_desc = $event_data['faci_desc'];
    $pax = $event_data['pax'];
    // $child = $event_data['child'];
}


?>

<body style="background-color: rgb(238,174,202);
background: radial-gradient(circle, rgba(238,174,202,1) 0%, rgba(121,30,30,1) 100%);;">


    <div class="card m-3">
        <div class="card-body">
            <div class="row">
                <div class="col-4">
                    <img src="assets/img/<?php echo $img; ?>" style="width: 100%; height: 15vw; object-fit: cover;" class="shadow bg-body rounded" alt="">
                    <br>
                    <br>
                    <h2 class="" style="font-family: Verdana"><b><?php echo $name; ?></b></h2>
                    <h3 class="" style="font-family: Verdana"><b>₱ <?php echo $price; ?> </b></h3>
                    <br>
                    <h6 style="font-family: Verdana"><b>Inclusions: </b></h6>
                    <h6 style="font-family: Verdana"><?php echo $event_desc; ?></h6>
                    <br>
                    <!-- <h6 style="font-family: Verdana"><b>Description: </b></h6>
                    <h6 style="font-family: Verdana"></h6>
                    <br> -->
                    <h6 style="font-family: Verdana"><b>Number of Guests: </b></h6>
                    <h6 style="font-family: Verdana"><?php echo $pax; ?></h6>
                    <br>
                    <h6 style="font-family: Verdana; color:red"><b><i>This promo cannot be used in
                                conjunction
                                with
                                any other discount
                                or promotional offers (i.e. Senior Citizen).
                                Strictly no refunds. </i></b></h6>
                </div>


                <div class="col-8">
                    <h2 class="text-center" style="font-family: Verdana"><b>GUEST INFORMATION</b></h2>
                    <h6 class="text-center" style="font-family: Verdana"><b>Kindly fill up the form for booking
                            request</b></h6>
                    <form action="admin/crud_function.php" method="POST">
                        <input type="hidden" name="booked_id" value="<?php echo $event_id; ?>">
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
                                <input type="number" name="contact_no" class="form-control" required>
                            </div>
                        </div>

                        <br>

                        <div class="row" style="font-family: Verdana" required>
                            <div class="col">
                                <label for="">Date and Time of Event</label>
                                <input type="datetime-local" name="event_date" class="form-control" required value="<?php echo isset($_GET['in']) ? date("Y-m-d", strtotime($_GET['in'])) : date("Y-m-d") ?>">
                            </div>
                            <!-- <div class="col">
                                <label for="">Time of Event</label>
                                <input type="Time" name="event_time" class="form-control" required>
                            </div> -->
                        </div>

                        <br>

                        <div class="row" style="font-family: Verdana">
                            <div class="col-6">
                                <!-- <label for="">Days of stay</label> -->
                                <input type="hidden" name="no_days" min="1" id="predefinedValue" class="form-control" value="<?php echo isset($_GET['in']) ? $calc_days : 1
                                                                                                                                ?>" required>
                                <input type="hidden" value="<?php echo $price;
                                                            ?>" id="inputValue">
                            </div>

                        </div>

                        <hr style=" position: relative; height: 2px; background: black;">

                        <div class="row float-right" style="font-family: Verdana">
                            <div class="col">
                                <h5 class="" style="font-family: Verdana"><b>Booking Total</b> </h5>
                                <h3 class="" style="font-family: Verdana">PHP <b><span id="result"><?php echo $price ?></span></b>
                                </h3>
                                <h6 class="" style="font-family: Verdana">Downpayment (10%)<b> <span id="percentageResult"></span></b>
                                </h6>
                                <input type="hidden" name="downpayment" id="percentageResult">
                                <hr style=" position: relative; height: 1px; background: black;">
                                <label style="font-family: Verdana">
                                    <input type="checkbox" id="termsCheckbox" onchange="updateSubmitButton()">
                                    By completing this booking you
                                    <br>
                                    agree to the
                                    <a href="BookingTerms.pdf" target="_blank" title="Booking Terms">Booking Terms</a>
                                    and
                                    <a href="PrivacyPolicy.pdf" target="_blank" title="Privacy Policy">Privacy
                                        Policy.</a>
                                </label>
                                <br>
                                <br>
                                <button class="btn btn-success float-right" type="submit" name="faci_request" id="submitButton" disabled>Confirm & Book</button>
                            </div>

                        </div>
                    </form>
                </div>

            </div>


            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            ...
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Save changes</button>
                        </div>
                    </div>
                </div>
            </div>

            <body>
                <script>
                    function updateSubmitButton() {
                        var termsCheckbox = document.getElementById("termsCheckbox");
                        var submitButton = document.getElementById("submitButton");

                        if (!termsCheckbox.checked) {
                            submitButton.disabled = true; // Disable the button
                        } else {
                            submitButton.disabled = false; // Enable the button
                        }
                    }
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
                            const percentageResult = (result * 0.1).toFixed(
                                2); // Calculate 10% (0.1) of the sum result and round to 2 decimal places

                            document.getElementById("result").innerText = `${result}`;
                            document.getElementById("percentageResult").innerText = ` ${percentageResult}`;
                            document.getElementById("percentageResultInput").value =
                                percentageResult; // Set the value of the input box
                        } else {
                            document.getElementById("result").innerText = " ";
                            document.getElementById("percentageResult").innerText = "";
                            document.getElementById("percentageResultInput").value =
                                ""; // Clear the input box if the input is not valid
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