<?php
include_once("../ITSNOW/config.php");
include_once("../ITSNOW/fun.php");

$sql = "SELECT * FROM event_registration where eventName='SUMUMIRCON2024' order by id desc";
$result = $con->query($sql);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SUMUMIRCON : View Registrations</title>
    <link rel="icon" type="image/x-icon" href="assets/images/newlogo.png">
    <link rel="stylesheet" href="assets/css/style.css">
    
</head>
<body>
    <header class="header" style="background-color: #98DED9;">
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
                <!-- <li><a href="#events">Events</a></li> -->
                <li><a class="btn" href="registration.php">Register Now</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <h1>Registered Users</h1>
        <div class='table-container'>
            
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Designation</th>
                        <th>Hospital Name</th>
                        <th>Age</th>
                        <th>Gender</th>
                        <th>Contact No</th>
                        <th>Email</th>
                        <th>Date</th>
                        <th>Payment Reference</th>
                        <th>Payment Screenshot</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($result->num_rows > 0): ?>
                    <?php while ($row = $result->fetch_assoc()): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($row['id']); ?></td>
                            <td><?php echo htmlspecialchars($row['customer_name']); ?></td>
                            <td><?php echo htmlspecialchars($row['designation']); ?></td>
                            <td><?php echo htmlspecialchars($row['hospital_name']); ?></td>
                            <td><?php echo htmlspecialchars($row['age']); ?></td>
                            <td><?php echo htmlspecialchars($row['gender']); ?></td>
                            <td><?php echo htmlspecialchars($row['contact_no']); ?></td>
                            <td><?php echo htmlspecialchars($row['email_id']); ?></td>
                            <td><?php echo htmlspecialchars($row['dttime']); ?></td>
                            <td><?php echo htmlspecialchars($row['payment_reference']); ?></td>
                            <td>
                                <img src="<?php echo htmlspecialchars($row['payment_screenshot']); ?>" alt="<?php echo htmlspecialchars($row['payment_reference']); ?>" class="img-thumbnail" style="max-height: 50px;" onclick="openModal(this)">
                            </td>
                        </tr>
                    <?php endwhile; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan='11' style='color:red;font-size:1.125rem'>No registration done.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </main>
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
    <div id="imageModal" class="modal" onclick="closeModal()">
        <span class="close">&times;</span>
        <img class="modal-content" id="modalImage">
        <div id="caption"></div>
    </div>
    <script src="assets/js/script.js"></script>
</body>
</html>

<?php
$con->close();
?>
