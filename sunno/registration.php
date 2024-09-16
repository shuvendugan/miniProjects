<?php
include_once("../ITSNOW/config.php");
include_once("../ITSNOW/fun.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $designation = $_POST['designation'];
    $hospital_name = $_POST['hospital_name'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $contact_no = $_POST['contact_no'];
    $email_id = $_POST['email_id'];
    $payment_reference = $_POST['payment_reference'];

    // File upload handling
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["payment_screenshot"]["name"]);
    move_uploaded_file($_FILES["payment_screenshot"]["tmp_name"], $target_file);

    $sql = "INSERT INTO event_registration(eventName,customer_name, designation, hospital_name, age, gender, contact_no, email_id, payment_reference, payment_screenshot,dttime)
            VALUES ('sunno2.0','$name', '$designation', '$hospital_name', $age, '$gender', '$contact_no', '$email_id', '$payment_reference', '$target_file',now())";

    if ($con->query($sql) === TRUE) {
        echo "<script>alert('Thank you for registering in SUNNO 2.0.');window.open('https://event.soahospitals.com');</script>";
        // header('Location : view.php');
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $con->error;
    }
    $con->close();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SUNNO 2.0 : Registration</title>
    <link rel="stylesheet" href="assets/css/style.css">
    
    
</head>
<body>
    <header class="header">
        <nav>
            <a href="index.html"><img src="assets/images/ultimate_logo.png" alt="ultimate_logo"></a>
            <div class="menu-toggle" id="mobile-menu">
                <span class="bar"></span>
                <span class="bar"></span>
                <span class="bar"></span>
            </div>
            <ul class="nav-list">
                <li><a href="index.html">Home</a></li>
                <li><a href="index.html#about">About</a></li>
                <li><a href="index.html#fees">Fees</a></li>
                <li><a class="btn" href="registration.php">Register Now</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <h1 class="text-center mb-4" style='color:#455b61;font-weight:600;'>SUNNO 2.0 Registration Form</h1>
        <div class='main-container'>
            <section>
                <form action="<?php $_SERVER['PHP_SELF'];?>" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="designation">Designation:</label>
                        <input type="text" class="form-control" id="designation" name="designation" required>
                    </div>
                    <div class="form-group">
                        <label for="hospital_name">Name of the Hospital:</label>
                        <input type="text" class="form-control" id="hospital_name" name="hospital_name" required>
                    </div>
                    <div class="form-group">
                        <label for="age">Age:</label>
                        <input type="number" class="form-control" id="age" name="age" required>
                    </div>
                    <div class="form-group">
                        <label for="gender">Gender:</label>
                        <select class='form-control' name="gender" id="gender" required>
                            <option value=""> select</option>
                            <option value="Male"> Male</option>
                            <option value="Female"> Female</option>
                            <option value="Others"> Others</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="contact_no">Contact No:</label>
                        <input type="text" class="form-control" id="contact_no" name="contact_no" required>
                    </div>
                    <div class="form-group">
                        <label for="email_id">Email ID:</label>
                        <input type="email" class="form-control" id="email_id" name="email_id" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="payment_reference">Payment Reference:</label>
                        <input type="text" class="form-control" id="payment_reference" name="payment_reference" required>
                    </div>
                    <div class="form-group">
                        <label for="payment_screenshot">Payment Reference Screenshot:</label>
                        <input type="file" class="form-control" id="payment_screenshot" name="payment_screenshot" accept="image/*" required>
                    </div>
                    <div class="form-group" >
                        <button type="submit" class="btn">Register</button>
                    </div>
                </form>
            </section>
            <aside>
                <img class="rounded" width='250' src="assets/images/qrcode.jpg" alt="Qr Code">
            </aside>
        </div>
    </div>
    <footer>
        <img src="assets/images/ultimate_logo.png" alt="ultimate_logo">
        <div class="social">
            <a href="https://www.facebook.com/soa.sumum" target='_blank'><img class='icon' src="assets/images/facebook.png"
                    alt="Facebook"></a>
            <a href="https://x.com/SUM_Ultimate" target='_blank'><img class='icon' src="assets/images/twitter.png" alt="Twitter"></a>
            <a href="https://www.youtube.com/channel/UCUMaVisWVERS8CUD1AxYcag/videos?view=0&sort=dd&shelf_id=0" target='_blank'><img
                    class='icon' src="assets/images/youtube.png" alt="Youtube"></a>
            <a href="https://www.instagram.com/sum_ultimate_medicare/" target='_blank'><img class='icon' src="assets/images/social.png"
                    alt="Instagram"></a>
            <a href="https://www.linkedin.com/company/sum-ultimate-medicare/?originalSubdomain=in" target='_blank'><img class='icon'
                    src="assets/images/linkedin.png" alt="LinkedIn"></a>
        </div>
        <div>&copy; SUM Ultimate Medicare, Bhubaneswar</div>
    </footer>
    <script src="assets/js/script.js"></script>
</body>
</html>

