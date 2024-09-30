<?php
session_start();
include_once("includes/config.php");
include_once("includes/fun.php");
include_once("includes/SuvarnaConn.php");

try {
    // Initialize variables
    $q = filter_input(INPUT_GET, 'q', FILTER_SANITIZE_STRING);
    if (!$q) {
        throw new Exception('Invalid query string.');
    }

    $qstring = str_dcrypt($q);
    list($phone,$packageID) = explode(',', $qstring);

    $qry = "SELECT * FROM rvw_registration WHERE mobile_phone = ?";
    $params = array($phone);
    $options = array("Scrollable" => 'static');
    $qry_res = sqlsrv_query($conn, $qry, $params, $options);

    if ($qry_res === false) {
        throw new Exception('Query execution failed: ' . print_r(sqlsrv_errors(), true));
    }

    $no_rows = sqlsrv_num_rows($qry_res);
} catch (Exception $e) {
    echo  $e->getMessage();
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>Patient List</title>
    <link rel="stylesheet" href="css/checkPhone.css">
</head>
<body>
    <div class="container">
        <main>
            <h2>Hi!</h2>
            <div class="main-container">
                <div class='outer'>
                    <?php 
                    if ($no_rows > 0) {
                    ?>
                        <p>This phone number is registered with:</p>
                        <hr>
                    <?php
                        while ($row = sqlsrv_fetch_array($qry_res, SQLSRV_FETCH_ASSOC)) {
                    ?>
                        <form action="dataFetch.php" method="post">
                            <input type="hidden" name="umr" value='<?php echo htmlspecialchars($row['UMR_NO']); ?>'>
                            <input type="hidden" name="packageID" value='<?php echo htmlspecialchars($packageID); ?>'>
                            <button style='margin:.5rem auto;' type="submit" name="btnPay">
                                <?php echo htmlspecialchars($row['PATIENT_NAME']) . ' (' . htmlspecialchars($row['UMR_NO']) . ')'; ?>
                            </button>
                        </form>
                    <?php 
                        }
                    } else {
                    ?>
                        <div class="cusform">
                            <p style='color:red'>There is no patient registered with <?php echo htmlspecialchars($phone); ?></p>
                        </div>
                    <?php 
                    }
                    ?>
                </div>
                <div class='outer'>
                    <form action="registration.php" method='POST' style="height: 40%;">
                        <p>Do you want to register a new patient?</p>
                        <hr>
                        <div class="cusform">
                            <label for="txtFullname">Enter full name of patient:</label>
                        </div>
                        <div class="cusform">
                            <input placeholder='Enter full name' type="text" name="txtFullname" id="txtFullname" required>
                        </div>
                        <input type="hidden" name="txtNumber" value='<?php echo htmlspecialchars($phone); ?>'>
                        <input type="hidden" name="packageID" value='<?php echo htmlspecialchars($packageID); ?>'>
                        <button id='btnNext' type="submit" name="btnNext">Next</button>
                    </form>
                </div>
            </div>
        </main>
    </div>
</body>
</html>
