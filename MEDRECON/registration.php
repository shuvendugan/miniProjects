<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/phpmailer/phpmailer/src/Exception.php';
require 'vendor/phpmailer/phpmailer/src/PHPMailer.php';
require 'vendor/phpmailer/phpmailer/src/SMTP.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['name']);
    $designation = htmlspecialchars($_POST['designation']);
    $qualification = htmlspecialchars($_POST['qualification']);
    $age = htmlspecialchars($_POST['age']);
    $gender = htmlspecialchars($_POST['gender']);
    $address = htmlspecialchars($_POST['address']);
    $city = htmlspecialchars($_POST['city']);
    $state = htmlspecialchars($_POST['state']);
    $pincode = htmlspecialchars($_POST['pincode']);
    $contact_no = htmlspecialchars($_POST['contact_no']);
    $payment_reference = htmlspecialchars($_POST['payment_reference']);
    $dd_no = htmlspecialchars($_POST['dd_no']);
    $dd_date = htmlspecialchars($_POST['dd_date']);
    $drawn_on = htmlspecialchars($_POST['drawn_on']);
    $amount = htmlspecialchars($_POST['amount']);
    $email_id = htmlspecialchars($_POST['email_id']);
    $fileName = $_FILES['payment_screenshot']['name'];
    $uploadedFile = $_FILES['payment_screenshot']['tmp_name'];

    $mail = new PHPMailer(true);
    
    try {
        // Server settings
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';  // Specify your SMTP server
        $mail->SMTPAuth = true;
        $mail->Username = 'sumum_bbsr@soahospitals.com';  // SMTP username
        $mail->Password = 'Admin$$54321';  // SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        // Recipients
        $mail->setFrom('sumum_bbsr@soahospitals.com', 'MEDRECON 2025');
        $mail->addAddress($email_id);  // Add a recipient
        $mail->addAddress('medrecon2025@soahospitals.com');  // Add a second recipient
        $mail->addBCC('it_sumum@soahospitals.com');
        $mail->addBCC('shuvendugan@gmail.com');

        // Attachments
        $mail->addAttachment($uploadedFile, $fileName);  // Attach uploaded file

        // Content
        $mail->isHTML(true);
        $mail->Subject = 'MEDRECON 2025 Registration Form Submission';
        $mail->Body = "
    <html>
        <body>
        <table  cellpadding='10' style='width:80%;text-align: left;padding: 5px;border: 2px solid black;border-collapse: collapse;margin:auto;'>
        <tr>
            <th style='width: 40%;border:2px solid black;background-color: rgb(130, 231, 130);color: black;'>Name</th>
            <td style='border: 2px solid black;background-color: rgb(239, 243, 202);font-size: 18px;'>$name</td>
        </tr>
        <tr>
            <th style='width: 40%;border:2px solid black;background-color: rgb(130, 231, 130);color: black;'>Designation</th>
            <td style='border: 2px solid black;background-color: rgb(239, 243, 202);font-size: 18px;'>$designation</td>
        </tr>
        <tr>
            <th style='width: 40%;border:2px solid black;background-color: rgb(130, 231, 130);color: black;'>Qualification</th>
            <td style='border: 2px solid black;background-color: rgb(239, 243, 202);font-size: 18px;'>$qualification</td>
        </tr>
        <tr>
            <th style='width: 40%;border:2px solid black;background-color: rgb(130, 231, 130);color: black;'>Age</th>
            <td style='border: 2px solid black;background-color: rgb(239, 243, 202);font-size: 18px;'>$age</td>
        </tr>
        <tr>
            <th style='width: 40%;border:2px solid black;background-color: rgb(130, 231, 130);color: black;'>Gender</th>
            <td style='border: 2px solid black;background-color: rgb(239, 243, 202);font-size: 18px;'>$gender</td>
        </tr>
        <tr>
            <th style='width: 40%;border:2px solid black;background-color: rgb(130, 231, 130);color: black;'>Address</th>
            <td style='border: 2px solid black;background-color: rgb(239, 243, 202);font-size: 18px;'>$address</td>
        </tr>
        <tr>
            <th style='width: 40%;border:2px solid black;background-color: rgb(130, 231, 130);color: black;'>City</th>
            <td style='border: 2px solid black;background-color: rgb(239, 243, 202);font-size: 18px;'>$city</td>
        </tr>
        <tr>
            <th style='width: 40%;border:2px solid black;background-color: rgb(130, 231, 130);color: black;'>State</th>
            <td style='border: 2px solid black;background-color: rgb(239, 243, 202);font-size: 18px;'>$state</td>
        </tr>
        <tr>
            <th style='width: 40%;border:2px solid black;background-color: rgb(130, 231, 130);color: black;'>Pincode</th>
            <td style='border: 2px solid black;background-color: rgb(239, 243, 202);font-size: 18px;'>$pincode</td>
        </tr>
        <tr>
            <th style='width: 40%;border:2px solid black;background-color: rgb(130, 231, 130);color: black;'>Contact No</th>
            <td style='border: 2px solid black;background-color: rgb(239, 243, 202);font-size: 18px;'>$contact_no</td>
        </tr>
        <tr>
            <th style='width: 40%;border:2px solid black;background-color: rgb(130, 231, 130);color: black;'>Email ID</th>
            <td style='border: 2px solid black;background-color: rgb(239, 243, 202);font-size: 18px;'>$email_id</td>
        </tr>
        <tr>
            <th style='width: 40%;border:2px solid black;background-color: rgb(130, 231, 130);color: black;'>Payment Reference</th>
            <td style='border: 2px solid black;background-color: rgb(239, 243, 202);font-size: 18px;'>$payment_reference</td>
        </tr>
        <tr>
            <th style='width: 40%;border:2px solid black;background-color: rgb(130, 231, 130);color: black;'>DD No</th>
            <td style='border: 2px solid black;background-color: rgb(239, 243, 202);font-size: 18px;'>$dd_no</td>
        </tr>
        <tr>
            <th style='width: 40%;border:2px solid black;background-color: rgb(130, 231, 130);color: black;'>Dated</th>
            <td style='border: 2px solid black;background-color: rgb(239, 243, 202);font-size: 18px;'>$dd_date</td>
        </tr>
        <tr>
            <th style='width: 40%;border:2px solid black;background-color: rgb(130, 231, 130);color: black;'>Drawn on</th>
            <td style='border: 2px solid black;background-color: rgb(239, 243, 202);font-size: 18px;'>$drawn_on</td>
        </tr>
        <tr>
            <th style='width: 40%;border:2px solid black;background-color: rgb(130, 231, 130);color: black;'>Amount Rs.</th>
            <td style='border: 2px solid black;background-color: rgb(239, 243, 202);font-size: 18px;'>$amount</td>
        </tr>
        </table>
        </body>
    </html>";
        
        $mail->send();
        echo "<p style='padding:10px;text-align:center;color:green'>Thank you for your registration! We have sent a confirmation email to you.</p>";
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MEDRECON-Registration</title>
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link rel="stylesheet" href="assets/css/swiper.css">
    <link rel="stylesheet" href="assets/css/registration.css">
</head>
<body> 
    <div class="container mt-5">
        <div class="text-center mb-4">
            <h1>MEDRECON 2025</h1>
            <h2>REGISTRATION FORM</h2>
            <P id='description' style='font-weight:700'>(24<sup>th</sup> Annual National Medical Records Conference)</P>
        </div>
        <form action="<?php $_SERVER['PHP_SELF'];?>" method="post" enctype="multipart/form-data">
            <div class='form-row'>
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
                <div class="form-group">
                    <label for="designation">Designation:</label>
                    <input type="text" class="form-control" id="designation" name="designation" required>
                </div>
            </div>
            <div class='form-row'>
                <div class="form-group">
                    <label for="qualification">Qualification:</label>
                    <input type="text" class="form-control" id="qualification" name="qualification" required>
                </div>
                <div class="form-group">
                    <label for="age">Age:</label>
                    <input type="number" class="form-control" id="age" name="age" required>
                </div>
            </div>
            <div class='form-row'>
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
                    <label for="address">Address:</label>
                    <input type="text" class="form-control" id="address" name="address" required>
                </div>
            </div>
            <div class='form-row'>
                <div class="form-group">
                    <label for="city">City:</label>
                    <input type="text" class="form-control" id="city" name="city" required>
                </div>
                <div class="form-group">
                    <label for="state">State:</label>
                    <input type="text" class="form-control" id="state" name="state" required>
                </div>
            </div>
            <div class='form-row'>
                <div class="form-group">
                    <label for="pincode">Pincode:</label>
                    <input type="text" class="form-control" id="pincode" name="pincode" required>
                </div>
                <div class="form-group">
                    <label for="contact_no">Contact No:</label>
                    <input type="text" class="form-control" id="contact_no" name="contact_no" required>
                </div>
            </div>
            <div class='form-row'>
            <div class="form-group">
                <label for="email_id">Email ID:</label>
                <input type="email" class="form-control" id="email_id" name="email_id" required>
            </div>
            </div>
            <div id='payment'>
                <div class='box'>
                    <h4>Conference Registration Fee Details</h4>
                    <div class='details'>
                        <p>Professionals</p>
                        <p>Rs.2000/-</p>
                    </div>
                    <div class='details'>
                        <p>Students</p>
                        <p>Rs.1000/-</p>
                    </div>
                    <div class='details'>
                        <p>NRI</p>
                        <p>Rs.4000/-</p>
                    </div>
                    <div class='details'>
                        <p>Spot & Late</p>
                        <p>Rs.3000/-</p>
                    </div>
                </div>
                <div class='box'>
                    <h3>* NO CANCELLATION</h3>
                    <h5>Last Date of registration before 31.12.2024</h5>
                </div>
                <div class='box'>
                    <img height='300' src="images/qrcode.jpg" alt="QRCode"> 
                </div>
                <div class='box'>
                    <h4>Acount Details</h4>
                    <div class='details'>
                        <p>Account Name:</p>
                        <p>SUMUM</p>
                    </div>
                    <div class='details'>
                        <p>Account No:</p>
                        <p>856954268423</p>
                    </div>
                    <div class='details'>
                        <p>Bank Name:</p>
                        <p>ICICI BANK</p>
                    </div>
                    <div class='details'>
                        <p>IFSC Code:</p>
                        <p>ICICI000085694</p>
                    </div>
                </div>
            </div>

            <div class='form-row'>
                <div class="form-group">
                    <label for="payment_reference">Payment Reference:</label>
                    <input type="text" class="form-control" id="payment_reference" name="payment_reference" >
                </div>
                <div class="form-group">
                    <label for="payment_screenshot">Payment Reference Screenshot:</label>
                    <input type="file" class="form-control" id="payment_screenshot" name="payment_screenshot" accept="image/*" >
                </div>
            </div>
            <div class='form-row'>
                <div class="form-group">
                    <label for="dd_no">DD No:</label>
                    <input type="text" class="form-control" id="dd_no" name="dd_no" >
                </div>
                <div class="form-group">
                    <label for="dd_date">Dated:</label>
                    <input type="date" class="form-control" id="dd_date" name="dd_date"  >
                </div>
            </div>
            <div class='form-row'>
                <div class="form-group">
                    <label for="drawn_on">Drawn on:</label>
                    <input type="text" class="form-control" id="drawn_on" name="drawn_on" >
                </div>
                <div class="form-group">
                    <label for="amount">Amount Rs.:</label>
                    <input type="text" class="form-control" id="amount" name="amount"  >
                </div>
            </div>

            <div class='form-group' style='margin-top:20px;text-align:center;'>
                <button type="submit" class="btn btn-primary">Register</button>
            </div>
        </form>

        <footer class="text-center mt-5">
            <p style='font-weight:700'>Venue - Auditorium Hall, Campus -II, K8, Kalinga Nagar,Bhubaneswar Pin Code – 751003, Odisha</p>
        </footer>
    </div>

    <script src='assets/js/jquery.js'></script>
    <script src="assets/js/bootstrap.js"></script>
    <script src="assets/js/swiper.js"></script>
    <script src="assets/js/script.js"></script>
</body>
</html>

