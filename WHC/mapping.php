<?php
session_start();
include_once("../config.php");
include_once("../fun.php");

// Check if user is logged in
if (empty($_SESSION["sess_userid"]) || ($_SESSION["sess_id"] != session_id())) {
    header("Location: ../index.php");
    exit();
}

$login_id = $_SESSION["sess_loginid"];
$sess_userid = $_SESSION["sess_userid"];
$date = date("Y-m-d H:i:s");
$msg = '';

if (isset($_REQUEST['msg'])) {
    $msg = str_dcrypt($_REQUEST['msg']);
    list($message, $success) = explode(',', $msg);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $txtPackage = $_POST['txtPackage'];
    $txtService = $_POST['txtService'];

    // Validate input
    if (empty($txtPackage) || empty($txtService)) {
        $message = 'All fields are required.';
        $success = 0;
    } else {
        try {
            // Enable exception mode for mysqli
            mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

            // Check if record already exists
            $stmt = $con->prepare("SELECT mapID FROM healthcheckup_packages_service_map WHERE packageID = ? AND serviceID = ? AND status = 1");
            $stmt->bind_param("ii", $txtPackage, $txtService);
            $stmt->execute();
            $stmt->store_result();

            if ($stmt->num_rows > 0) {
                throw new Exception('Record already exists.');
            } else {
                // Insert new record
                $stmt = $con->prepare("INSERT INTO healthcheckup_packages_service_map (packageID, serviceID) VALUES (?, ?)");
                $stmt->bind_param("ii", $txtPackage, $txtService);

                if (!$stmt->execute()) {
                    throw new Exception('Error inserting record.');
                }

                $message = 'Record inserted successfully.';
                $success = 1;
            }
            $stmt->close();
        } catch (Exception $e) {
            $message = $e->getMessage();
            $success = 0;
        }
    }

    $msg = str_encrypt($message . ',' . $success);
    header("Location: mapping.php?msg=" . urlencode($msg));
    exit();
}

try {
    // Enable exception mode for mysqli
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

    // Fetch packages
    $stmt = $con->prepare('SELECT packageID, packageName FROM healthCheckUp_packages WHERE status = 1');
    $stmt->execute();
    $packagesResult = $stmt->get_result();

    // Fetch services
    $stmt = $con->prepare('SELECT serviceID, serviceName FROM healthCheckUp_service WHERE status = 1');
    $stmt->execute();
    $servicesResult = $stmt->get_result();

    $stmt->close();
} catch (Exception $e) {
    die('Database error: ' . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>Package Service Mapping</title>
    <link rel="stylesheet" href="css/mapping.css">
    <script src="js/jQuery.min.js"></script>
    <script src="js/mapping.js"></script>
    <script src="js/notification.js"></script>
</head>

<body>
    <div class="container">
        <div id="notification" class="notification <?php echo isset($success) ? ($success == 1 ? 'success' : 'failure') : ''; ?>">
            <?php if (isset($message)) echo htmlspecialchars($message); ?>
        </div>
        <main>
            <h2>Package Service Mapping</h2>
            <div class="outer-form">
                <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
                    <div class="cusform">
                        <label for="txtPackage">Package Name</label>
                        <span>:</span>
                        <select name="txtPackage" id="txtPackage" required>
                            <option value="">Select</option>
                            <?php while ($row = $packagesResult->fetch_assoc()): ?>
                                <option value="<?php echo $row['packageID']; ?>"><?php echo htmlspecialchars($row['packageName']); ?></option>
                            <?php endwhile; ?>
                        </select>
                    </div>
                    <div class="cusform">
                        <label for="txtService">Service Name</label>
                        <span>:</span>
                        <select name="txtService" id="txtService" required>
                            <option value="">Select</option>
                            <?php while ($row = $servicesResult->fetch_assoc()): ?>
                                <option value="<?php echo $row['serviceID']; ?>"><?php echo htmlspecialchars($row['serviceName']); ?></option>
                            <?php endwhile; ?>
                        </select>
                    </div>
                    <button type="submit" name="btnSubmit">Submit</button>
                </form>
            </div>
        </main>
        <main style="height: 55vh;">
            <h2>Package Service Details</h2>
            <div id="serviceList">
                <!-- Service list will be loaded here via JavaScript -->
            </div>
        </main>
    </div>
</body>

</html>
