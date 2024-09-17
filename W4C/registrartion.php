
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

    $sql = "INSERT INTO w4c_registration_2024(customer_name, designation, hospital_name, age, gender, contact_no, email_id, payment_reference, payment_screenshot)
            VALUES ('$name', '$designation', '$hospital_name', $age, '$gender', '$contact_no', '$email_id', '$payment_reference', '$target_file')";

    if ($con->query($sql) === TRUE) {
        echo "<script>alert('Thank you for registering in W4C.');window.open('https://event.soahospitals.com');</script>";
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
    <title>Hospital Registration</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="text-center mb-4">
            <img src="images/ultimate_logo.png" alt="Logo 1" style="height: 50px; margin-right: 10px;">
            <img src="images/W4Clogo.jpeg" alt="Logo 2" style="height: 50px; margin-right: 10px;">
            <img src="images/isccm_logo.jpeg" alt="Logo 3" style="height: 50px;">
        </div>

        

        <form action="<?php $_SERVER['PHP_SELF'];?>" method="post" enctype="multipart/form-data">
            <div align='center'>
                <img width='250' src="images/qrcode.jpg" alt="Qr Code">
            </div>
            <h1 class="text-center mb-4">W4C Registration Form</h1>
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
                    <option value="1"> Male</option>
                    <option value="2"> Female</option>
                    <option value="3"> Others</option>
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
                <input type="file" class="form-control-file" id="payment_screenshot" name="payment_screenshot" accept="image/*" required>
            </div>
            <button type="submit" class="btn btn-primary">Register</button>
        </form>

        <footer class="text-center mt-5">
            <p>Our Hospital Address: K-8 kalinga nagar Ghatikia,Bhubaneswar,Odisha</p>
        </footer>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

