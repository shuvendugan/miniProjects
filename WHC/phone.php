<?php
session_start();
include_once("includes/config.php");
include_once("includes/fun.php");
include_once("includes/SuvarnaConn.php");

// Initialize variables
$packageID = $_POST['packageID'];
$message = '';
// $success = '';

if (isset($_GET['msg'])) {
    $msg = str_dcrypt($_GET['msg']);
    list($message, $success) = explode(',', $msg);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['btnSubmit'])) {
    try {
        if ($_SESSION['captcha'] == $_POST['captcha']) {
            $phone = $_POST['txtPhone'];
            $packageID = $_POST['packageID'];

            $q = str_encrypt($phone . ',' . $packageID);
            header('Location: checkPhone.php?q=' . urlencode($q));
            exit();
        } else {
            throw new Exception('Enter valid captcha');
        }
    } catch (Exception $e) {
        $message = $e->getMessage();
        $success = 0;
        $msg = str_encrypt($message . ',' . $success);
        header('Location: phone.php?msg=' . urlencode($msg));
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>Phone</title>
    <link rel="stylesheet" href="css/phone.css">
    <script src="js/jQuery.min.js"></script>
    <script src="js/notification.js"></script>
</head>

<body>
    <div class="container">
        <div id="notification" class='notification <?php echo isset($success) && $success == 1 ? 'success' : (isset($success) && $success == 0 ? 'failure' : ''); ?>'>
            <?php echo htmlspecialchars($message); ?>
        </div>
        <main>
            <h2>Phone</h2>
            <div class='outer-form'>
                <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method='POST'>
                    <div class="cusform">
                        <label for="txtPhone">Phone</label>
                        <span>:</span>
                        <input placeholder='Enter Mobile Number' type="tel" name="txtPhone" id="txtPhone" maxlength='10' minlength='10' required>
                    </div>
                    <div class="cusform">
                        <img src="php_captcha.php" class="img-responsive">
                        <span>:</span>
                        <input type="text" placeholder="Enter Captcha" id="captcha" name="captcha" maxlength="10" required>
                    </div>
                    <input type="hidden" name="packageID" value='<?php echo htmlspecialchars($packageID); ?>'>
                    <button type="submit" name="btnSubmit">Submit</button>
                </form>
            </div>
        </main>
    </div>
</body>
</html>
