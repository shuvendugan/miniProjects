<?php
session_start();
include_once("includes/config.php");
include_once("includes/fun.php");
// Initialize variables to prevent errors if not set
$packageID = $fullname = $phone = "";

// Check if values are passed from previous page
// pr($_POST);
if (isset($_POST['packageID'])) {
    $packageID = $_POST['packageID'];
}
if (isset($_POST['txtFullname'])) {
    $fullname = $_POST['txtFullname'];
}
if (isset($_POST['txtNumber'])) {
    $phone = $_POST['txtNumber'];
}

if (isset($_REQUEST['msg'])) {
    $msg = str_dcrypt($_REQUEST['msg']);
    list($message, $success) = explode(',', $msg);
}

try {
    if (isset($_POST['btnSubmit'])) {
        if ($_SESSION['captcha'] == $_POST['captcha']) {
            // pr($_POST);exit();
            // Sanitize and validate input data
            $packageID = filter_input(INPUT_POST, 'packageID', FILTER_SANITIZE_NUMBER_INT);
            // echo($packageID);exit();
            // pr($_POST);exit();
            // $fullname = filter_input(INPUT_POST, 'txtFullname', FILTER_SANITIZE_STRING);
            $phone = filter_input(INPUT_POST, 'txtPhone', FILTER_SANITIZE_STRING);
            $name = filter_input(INPUT_POST, 'txtName', FILTER_SANITIZE_STRING);
            $email = filter_input(INPUT_POST, 'txtEmail', FILTER_VALIDATE_EMAIL);
            $dob = filter_input(INPUT_POST, 'txtDOB', FILTER_SANITIZE_STRING);
            $gender = filter_input(INPUT_POST, 'txtGender', FILTER_SANITIZE_STRING);
            $maritalStatus = filter_input(INPUT_POST, 'txtMarital', FILTER_SANITIZE_STRING);
            $at = filter_input(INPUT_POST, 'txtAT', FILTER_SANITIZE_STRING);
            $po = filter_input(INPUT_POST, 'txtPO', FILTER_SANITIZE_STRING);
            $ps = filter_input(INPUT_POST, 'txtPS', FILTER_SANITIZE_STRING);
            $city = filter_input(INPUT_POST, 'txtCity', FILTER_SANITIZE_STRING);
            $district = filter_input(INPUT_POST, 'txtDistrict', FILTER_SANITIZE_STRING);
            $state = filter_input(INPUT_POST, 'txtState', FILTER_SANITIZE_STRING);
            $country = filter_input(INPUT_POST, 'txtCountry', FILTER_SANITIZE_STRING);
            $pincode = filter_input(INPUT_POST, 'txtPincode', FILTER_SANITIZE_STRING);
            $altPhone = filter_input(INPUT_POST, 'txtAltPhone', FILTER_SANITIZE_STRING);
            $blood = filter_input(INPUT_POST, 'txtBlood', FILTER_SANITIZE_STRING);
            $nok = filter_input(INPUT_POST, 'txtNOK', FILTER_SANITIZE_STRING);

            // Fetch package details
            $stmt = $con->prepare("SELECT * FROM healthCheckUp_packages WHERE packageID = ?");
            $stmt->bind_param("i", $packageID);
            $stmt->execute();
            $packageResult = $stmt->get_result();
            $packageData = $packageResult->fetch_assoc();
            $stmt->close();

            if (!$packageData) {
                throw new Exception("Package not found.");
            }

            $payFor = $packageData['packageName'];
            $entryDate = date("Y-m-d H:i:s");
            $tempId = date("ymdHis");
            $umr = '---';

            // Insert into healthcheckup_reg table
            $insertQry = "INSERT INTO healthcheckup_reg (tempId, payFor, entryDate, status, patientName, dob, umr, phone, alt_phone_no, email, gender, maritalStatus, blood, nok, at, po, ps, city, district, state, country, pincode) 
                          VALUES (?, ?, CURRENT_TIMESTAMP(), 1, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

            $stmt = $con->prepare($insertQry);
            if (!$stmt) {
                throw new Exception("Preparation failed: " . $con->error);
            }

            $stmt->bind_param("ssssssssssssssssssss", $tempId, $payFor, $name, $dob, $umr, $phone, $altPhone, $email, $gender, $maritalStatus, $blood, $nok, $at, $po, $ps, $city, $district, $state, $country, $pincode);
            $stmt->execute();

            if ($stmt->affected_rows > 0) {
                $insertId = $stmt->insert_id;
                $stmt->close();
                $q = str_encrypt($insertId . ',' . $packageID);
                header('Location: details.php?q=' . $q);
                exit();
            } else {
                throw new Exception("Error inserting registration record.");
            }
        } else {
            throw new Exception("Invalid captcha.");
        }
    }
} catch (Exception $e) {
    $message = $e->getMessage();
    $success = 0;
    $msg = str_encrypt($message . ',' . $success);
    header('Location: registration.php?msg=' . $msg);
    exit();
}

// Close database connection
$con->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <link rel="stylesheet" href="css/registration.css">
    <script src="js/jQuery.min.js"></script>
    <script src="js/notification.js"></script>
</head>
<body>
    <div class="container">
        <div id="notification" class='notification <?php if(isset($success) && $success == 1) { echo 'success'; } elseif(isset($success) && $success == 0) { echo 'failure'; } ?>'>
            <?php echo htmlspecialchars($message ?? ''); ?>
        </div>
        <main>
            <h2>Registration</h2>
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method='POST'>
                <div class='form-container'>
                    <div class='container-child'>
                        <div class="cusform">
                            <label for="txtName">Name</label>
                            <span>:</span>
                            <input type="text" name="txtName" id="txtName" value='<?php echo htmlspecialchars($fullname); ?>' required>
                        </div>
                        <div class="cusform">
                            <label for="txtDOB">DOB</label>
                            <span>:</span>
                            <input type="date" name="txtDOB" id="txtDOB" required>
                        </div>
                        <div class="cusform">
                            <label for="txtPhone">Phone No.</label>
                            <span>:</span>
                            <input type="tel" name="txtPhone" id="txtPhone" value='<?php echo htmlspecialchars($phone); ?>' maxlength='10' minlength='10' required>
                        </div>
                        <div class="cusform">
                            <label for="txtAltPhone">Alt. Phone No.</label>
                            <span>:</span>
                            <input type="tel" name="txtAltPhone" id="txtAltPhone" maxlength='10' minlength='10'>
                        </div>
                        <div class="cusform">
                            <label for="txtEmail">Email</label>
                            <span>:</span>
                            <input type="email" name="txtEmail" id="txtEmail" required>
                        </div>
                        <div class="cusform">
                            <label for="txtGender">Gender</label>
                            <span>:</span>
                            <select name="txtGender" id="txtGender" required>
                                <option value="">Select</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                                <option value="unspecified">Unspecified</option>
                                <option value="both">Both</option>
                            </select>
                        </div>
                        <div class="cusform">
                            <label for="txtMarital">Marital Status</label>
                            <span>:</span>
                            <select name="txtMarital" id="txtMarital" required>
                                <option value="">Select</option>
                                <option value="divorcee">Divorcee</option>
                                <option value="married">Married</option>
                                <option value="single">Single</option>
                                <option value="unspecified">Unspecified</option>
                                <option value="widowed">Widowed</option>
                            </select>
                        </div>
                        <div class="cusform">
                            <label for="txtBlood">Blood Group</label>
                            <span>:</span>
                            <select name="txtBlood" id="txtBlood" required>
                                <option value="">Select</option>
                                <option value="O+">O+ve</option>
                                <option value="O-">O-ve</option>
                                <option value="A+">A+ve</option>
                                <option value="A-">A-ve</option>
                                <option value="B+">B+ve</option>
                                <option value="B-">B-ve</option>
                                <option value="AB+">AB+ve</option>
                                <option value="AB-">AB-ve</option>
                            </select>
                        </div>
                        <div class="cusform">
                            <label for="txtNOK">NOK</label>
                            <span>:</span>
                            <input type="text" name="txtNOK" id="txtNOK">
                        </div>
                    </div>
                    <div class='container-child'>
                        <div class="cusform">
                            <label for="txtAT">AT</label>
                            <span>:</span>
                            <input type="text" name="txtAT" id="txtAT" required>
                        </div>
                        <div class="cusform">
                            <label for="txtPO">PO</label>
                            <span>:</span>
                            <input type="text" name="txtPO" id="txtPO" required>
                        </div>
                        <div class="cusform">
                            <label for="txtPS">PS</label>
                            <span>:</span>
                            <input type="text" name="txtPS" id="txtPS" required>
                        </div>
                        <div class="cusform">
                            <label for="txtCity">City</label>
                            <span>:</span>
                            <input type="text" name="txtCity" id="txtCity" required>
                        </div>
                        <div class="cusform">
                            <label for="txtDistrict">District</label>
                            <span>:</span>
                            <input type="text" name="txtDistrict" id="txtDistrict" required>
                        </div>
                        <div class="cusform">
                            <label for="txtState">State</label>
                            <span>:</span>
                            <input type="text" name="txtState" id="txtState" required>
                        </div>
                        <div class="cusform">
                            <label for="txtCountry">Country</label>
                            <span>:</span>
                            <input type="text" name="txtCountry" id="txtCountry" required>
                        </div>
                        <div class="cusform">
                            <label for="txtPincode">Pincode</label>
                            <span>:</span>
                            <input type="number" name="txtPincode" id="txtPincode" required maxlength='6' minlength='6'>
                        </div>
                        <div class="cusform" style='justify-content:end'>
                            <img src="php_captcha.php" class="img-responsive">
                            <span>:</span>
                            <input type="text" placeholder="Enter Captcha" id="captcha" name="captcha" maxlength="10">
                        </div>
                    </div>
                </div>
                <input type="hidden" name="packageID" id="packageID" value='<?php echo htmlspecialchars($packageID); ?>'>
                <button type="submit" name="btnSubmit">Submit</button>
            </form>
        </main>
    </div>
</body>
</html>
