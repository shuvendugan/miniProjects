<?php 
// ini_set('display_errors', 1);
// error_reporting(E_ALL);
session_start();

include_once("includes/config.php");
include_once("includes/fun.php");
include_once("includes/SuvarnaConn.php");

$umr = $_POST['umr'];
$packageID = $_POST['packageID'];

try {
    if (!empty($umr)) {
        // Prepare and execute the first query
        $qry = "SELECT * FROM rvw_registration WHERE UMR_NO = ?";
        $params = array($umr);
        $qry_res = sqlsrv_query($conn, $qry, $params, array("Scrollable" => 'static'));

        if ($qry_res === false) {
            throw new Exception("Database error: " . print_r(sqlsrv_errors(), true));
        }

        $row = sqlsrv_fetch_array($qry_res, SQLSRV_FETCH_ASSOC);
        if ($row === false) {
            throw new Exception("UMR not found.");
        }

        $name = $row['PATIENT_NAME'];
        $mob = $row['MOBILE_PHONE'];
        $dob = $row['DOB']->format('Y-m-d');
        $gender = $row['GENDER'];
        $txtAT = $row['AREA_NAME'];
        $txtPO = $row['AREA_NAME'];
        $txtPS = $row['AREA_NAME'];
        $city = $row['CITY_NAME'];
        $dist = $row['DISTRICT_NAME'];
        $state = $row['STATE_NAME'];
        $country = $row['COUNTRY_NAME'];
        $nok = $row['RES_PERSON_NAME'];

        $temp = date("YmdHis");

        if (!empty($packageID)) {
            // Prepare and execute the second query
            $packageQry = "SELECT packageName FROM healthCheckUp_packages WHERE packageID = ?";
            $stmt = $con->prepare($packageQry);
            if (!$stmt) {
                throw new Exception("Preparation failed: " . $con->error);
            }

            $stmt->bind_param("i", $packageID);
            $stmt->execute();
            $stmt->bind_result($pay_for);
            $stmt->fetch();
            $stmt->close();

            if (empty($pay_for)) {
                throw new Exception("Package not found.");
            }
        } else {
            $pay_for = 'Health Check Up';
        }

        // Prepare and execute the insertion query
        $insQry = "INSERT INTO healthcheckup_reg (tempId, payFor, entryDate, status, umr, patientName, dob, phone, alt_phone_no, email, gender, maritalStatus, blood, nok, at, po, ps, city, district, state, country, pincode) 
                   VALUES (?, ?, CURRENT_TIMESTAMP(), 1, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $con->prepare($insQry);
        if (!$stmt) {
            throw new Exception("Preparation failed: " . $con->error);
        }

        // Assuming $altMob, $email, $mar_sts, $blood, and $pin are properly defined and sanitized elsewhere in your code.
        $altMob = '---'; 
        $email = '---'; 
        $mar_sts = '---'; 
        $blood = ''; 
        $pin = '';

        $stmt->bind_param("ssssssssssssssssssss", $temp, $pay_for, $umr, $name, $dob, $mob, $altMob, $email, $gender, $mar_sts, $blood, $nok, $txtAT, $txtPO, $txtPS, $city, $dist, $state, $country, $pin);

        if (!$stmt->execute()) {
            throw new Exception("Error inserting record: " . $stmt->error);
        }

        $insertid = $stmt->insert_id;
        $stmt->close();

        $q = str_encrypt($insertid . ',' . $packageID);
        header('Location: details.php?q=' . urlencode($q));
        exit();
    } else {
        throw new Exception("UMR not found. Please try after sometime.");
    }
} catch (Exception $e) {
    $message = $e->getMessage();
    $success = 0;
    $msg = str_encrypt($message . ',' . $success);
    header('Location: checkPhone.php?msg=' . urlencode($msg));
    exit();
}

$con->close();
?>
