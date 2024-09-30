<?php
include_once("includes/config.php");
include_once("includes/fun.php");

try {
    // Decrypt and parse the query string
    $q = filter_input(INPUT_GET, 'q', FILTER_SANITIZE_STRING);
    if (!$q) {
        throw new Exception('Some error occoured! Please try after sometime.');
    }
    $qstring = str_dcrypt($q);
    list($regID, $packageID) = explode(',', $qstring);

    // Fetch package details if packageID is not empty
    if (!empty($packageID)) {
        $packageQry = "SELECT * FROM healthCheckUp_packages WHERE packageID = ?";
        $stmt = $con->prepare($packageQry);
        if (!$stmt) {
            throw new Exception("Package not found! Contact to Administration");
        }
        $stmt->bind_param("i", $packageID);
        $stmt->execute();
        $packageQry_obj = $stmt->get_result();
        $packageQry_Res = $packageQry_obj->fetch_assoc();
        $stmt->close();

        if (!$packageQry_Res) {
            throw new Exception("Package not found! Contact to Administration");
        }

        $amount = $packageQry_Res['price'];
        $packageName = $packageQry_Res['packageName'];
    } else {
        throw new Exception("Package not found! Contact to Administration");
    }

    if (!empty($regID)) {
    // Fetch registration details
        $selectQry = "SELECT * FROM healthCheckup_reg WHERE regId = ?";
        $stmt = $con->prepare($selectQry);
        if (!$stmt) {
            throw new Exception("User not found! Please try again.");
        }
        $stmt->bind_param("s", $regID);
        $stmt->execute();
        $qryObj = $stmt->get_result();
        $qryRes = $qryObj->fetch_assoc();
        $stmt->close();

        if (!$qryRes) {
            throw new Exception("User not found! Please try again.");
        }

        // Extract registration details
        $regId = $qryRes['regId'];
        $tempId = $qryRes['tempId'];
        $payFor = $qryRes['payFor'];
        $entryDate = $qryRes['entryDate'];
        $status = $qryRes['status'];
        $patientName = $qryRes['patientName'];
        $dob = $qryRes['dob'];
        $phone = $qryRes['phone'];
        $umr = $qryRes['umr'];
        $alt_phone_no = $qryRes['alt_phone_no'];
        $email = $qryRes['email'];
        $gender = $qryRes['gender'];
        $maritalStatus = $qryRes['maritalStatus'];
        $blood = $qryRes['blood'];
        $nok = $qryRes['nok'];
        $at = $qryRes['at'];
        $po = $qryRes['po'];
        $ps = $qryRes['ps'];
        $city = $qryRes['city'];
        $district = $qryRes['district'];
        $state = $qryRes['state'];
        $country = $qryRes['country'];
        $pincode = $qryRes['pincode'];
        $billing_address = $at . ' ' . $po . ' ' . $ps . ' ' . $city;
        $address = $at . ' ' . $po . ' ' . $ps . ' ' . $city . ' ' . $district . ' ' . $state . ' ' . $country . ' ' . $pincode;

        // Insert into payment_receive table
        $insertQry = "INSERT INTO payment_receive (trandate, name, phone, amount, billing_address, billing_city, billing_state, billing_zip, billing_country, billing_email) 
                    VALUES (CURRENT_TIMESTAMP(), ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $con->prepare($insertQry);
        if (!$stmt) {
            throw new Exception("Payment done but not showing, Please contact to administration with transaction number. ");
        }
        $stmt->bind_param("sssssssss", $patientName, $phone, $amount, $billing_address, $city, $state, $pincode, $country, $email);
        $stmt->execute();
        $order_no = $stmt->insert_id;
        $stmt->close();

        if ($order_no) {
            // Update healthCheckup_reg table with the new order ID
            $updateQry = "UPDATE healthCheckup_reg SET order_id = ? WHERE regId = ?";
            $stmt = $con->prepare($updateQry);
            if (!$stmt) {
                throw new Exception("Order number updation failed! Please contact to Administration.");
            }
            $stmt->bind_param("ii", $order_no, $regId);
            $stmt->execute();
            $stmt->close();
        } else {
            throw new Exception("Order number not found! Please contact to Administration. .");
        }
    }else {
        throw new Exception("User not found! Please try again.");
    }
} catch (Exception $e) {
    $message = $e->getMessage();
    $success = 0;
    $msg = str_encrypt($message . ',' . $success);
    header('Location: phone.php?msg=' . urlencode($msg));
    exit();
}
$con->close();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>Details</title>
    <link rel="stylesheet" href="css/details.css">
</head>
<body>
    <div class="container">
        <main style="padding: 20px;">
            <h2>Details</h2>
            <table>
                <tbody>
                    <tr>
                        <td class="title">Package</td>
                        <td class="content"><?php echo htmlspecialchars($packageName); ?></td>
                    </tr>
                    <tr>
                        <td class="title">Name</td>
                        <td class="content"><?php echo htmlspecialchars($patientName); ?></td>
                    </tr>
                    <tr>
                        <td class="title">UMR</td>
                        <td class="content"><?php echo htmlspecialchars($umr); ?></td>
                    </tr>
                    <tr>
                        <td class="title">Phone</td>
                        <td class="content"><?php echo htmlspecialchars($phone); ?></td>
                    </tr>
                    <tr>
                        <td class="title">Alt Phone</td>
                        <td class="content"><?php echo htmlspecialchars($alt_phone_no); ?></td>
                    </tr>
                    <tr>
                        <td class="title">DOB</td>
                        <td class="content"><?php echo htmlspecialchars($dob); ?></td>
                    </tr>
                    <tr>
                        <td class="title">NOK</td>
                        <td class="content"><?php echo htmlspecialchars($nok); ?></td>
                    </tr>
                    <tr>
                        <td class="title">Blood Group</td>
                        <td class="content"><?php echo htmlspecialchars($blood != null ? $blood . 've' : ''); ?></td>
                    </tr>
                    <tr>
                        <td class="title">Gender</td>
                        <td class="content"><?php echo htmlspecialchars(ucfirst($gender)); ?></td>
                    </tr>
                    <tr>
                        <td class="title">Marital Status</td>
                        <td class="content"><?php echo htmlspecialchars(ucfirst($maritalStatus)); ?></td>
                    </tr>
                    <tr>
                        <td class="title">Address</td>
                        <td class="content"><?php echo htmlspecialchars($address); ?></td>
                    </tr>
                </tbody>
            </table>
            <form action="ccavRequestHandler.php" name="redirect" accept-charset="UTF-8" method="POST" style="height: 10%;">
                <input type="hidden" name="currency" value="INR"/>
                <input type="hidden" name="tid" id="tid" value="<?php echo time(); ?>" readonly />
                <input type="hidden" name="merchant_id" value="3511787"/>
                <input type="hidden" name="amount" value="<?php echo htmlspecialchars($amount); ?>" />
                <input type="hidden" name="order_id" value="<?php echo htmlspecialchars($order_no); ?>" />
                <input type="hidden" name="redirect_url" value="https://appt.soahospitals.com/itsnow/whc/ccavResponseHandler.php" />
                <input type="hidden" name="cancel_url" value="https://appt.soahospitals.com/itsnow/whc/ccavResponseHandler.php" />
                <input type="hidden" name="language" value="EN"/>
                <input type="hidden" name="billing_name" value="<?php echo htmlspecialchars($patientName); ?>"/>
                <input type="hidden" name="billing_tel" value="<?php echo htmlspecialchars($phone); ?>"/>
                <input type="hidden" name="merchant_param1" value="<?php echo htmlspecialchars($umr); ?>"/>
                <input type="hidden" name="billing_address" value="<?php echo htmlspecialchars($billing_address ?? 'SUM Ultimate Medicare'); ?>"/>
                <input type="hidden" name="billing_city" value="<?php echo htmlspecialchars($city ?? 'Bhubaneswar'); ?>"/>
                <input type="hidden" name="billing_state" value="<?php echo htmlspecialchars($state ?? 'Odisha'); ?>"/>
                <input type="hidden" name="billing_zip" value="<?php echo htmlspecialchars($pincode ?? '751003'); ?>"/>
                <input type="hidden" name="billing_country" value="<?php echo htmlspecialchars($country ?? 'India'); ?>"/>
                <input type="hidden" name="billing_email" value="<?php echo htmlspecialchars($email ?? 'sumum_bbsr@soahospitals.com'); ?>"/>
                <?php
                echo "<input type='hidden' name='encRequest' value='$encrypted_data'>";
                echo "<input type='hidden' name='access_code' value='$access_code'>";
                ?>
                <button style="width: 100%;" type="submit">Pay Rs. <?php echo htmlspecialchars($amount); ?>/-</button>
            </form>
        </main>
    </div>
</body>
</html>
