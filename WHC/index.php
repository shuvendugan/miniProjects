<?php
include_once("includes/config.php");
include_once("includes/fun.php");
include_once("includes/SuvarnaConn.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>Wellness Health Check</title>
    <link rel="stylesheet" href="css/index.css">
</head>
<body>
    <div class="container">
        <main>
            <header>
                <img src="images/logo-sumultimate.png" alt="">
            </header>
            <div class="heading">
                <h1>Wellness</h1>
                <h1>HEALTH CHECK</h1>
            </div>
            <div class="sub-heading">
                <p>
                    Health Checkup Packages that look after
                </p>
                <p>
                    your health and yout Finances
                </p>
            </div>
            <div class="main-bottom">
                <!-- <div></div> -->
                <div>
                    <h2>SUM ULTIMATE MEDICARE</h2>
                    <p>A Unit of Siksha 'O' Anusandhan</p>
                    <p>SUMUM/QMS/QIB/WHC/004</p>
                </div>
            </div>
        </main>
        
        <section>
            <div class="heading2">
                <h2>WHY TO CHOOSE</h2>
                <h2>SUM ULTIMATE MEDICARE</h2>
            </div>
            <div class="choose">
                <!-- Repeating section for each benefit -->
                <?php
                $benefits = [
                    "CLINICAL FINESSE", "SINCERE SERVICE", "DEDICATED STAFFS",
                    "DISTINCTIVE CARE", "POCKET FRIENDLY"
                ];
                foreach ($benefits as $benefit) {
                    echo '<div class="choose-list">
                        <div class="choose-icon">
                            <img src="images/cogwheel.png" alt="list">
                        </div>
                        <div class="choose-text">
                            <div>
                                <p>' . $benefit . '</p>
                            </div>
                        </div>
                    </div>';
                }
                ?>
            </div>
        </section>
        <!-- <hr> -->
        <h2>Packages We Offer...</h2>
        <section>
            <?php
            try {
                $packagesQry = 'SELECT * FROM healthCheckUp_packages WHERE status = 1';
                $Qry_obj = $con->query($packagesQry);
                if (!$Qry_obj) {
                    throw new Exception("Database Query Failed");
                }
                $count = 1;
                while ($row = $Qry_obj->fetch_assoc()) {
                    $name = $row['packageName'];
                    $price = $row['price'];
                    $packageID = $row['packageID'];
                    $sql = "SELECT * FROM healthcheckup_packages_service_map psm
                            JOIN healthCheckUp_packages p ON psm.packageID = p.packageID
                            JOIN healthCheckup_service s ON psm.serviceID = s.serviceID
                            WHERE psm.packageID = ? AND psm.status = 1";

                    $stmt = $con->prepare($sql);
                    if (!$stmt) {
                        throw new Exception("Database Statement Preparation Failed");
                    }
                    $stmt->bind_param('i', $packageID);
                    $stmt->execute();
                    $result = $stmt->get_result();

                    echo '<div class="packages-list">
                        <div class="packages">
                            <h3>' . $count . '.' . strtoupper($name) . '</h3>
                            <div class="packages-right">
                                <form action="phone.php" method="POST">
                                    <input type="hidden" name="txtPrice" value="' . htmlspecialchars($price) . '">
                                    <input type="hidden" name="packageID" value="' . htmlspecialchars($packageID) . '">
                                    <button type="submit" class="price" name="btnBook">RS. ' . htmlspecialchars($price) . '/-</button>
                                </form>';
                    if ($result->num_rows > 0) {
                        echo '<img class="open" src="images/plus.png" alt="open">';
                    }
                    echo '</div></div><div class="details"><div class="details-list">';

                    if ($result->num_rows > 0) {
                        $serviceName = [];
                        while ($serviceRow = $result->fetch_assoc()) {
                            $serviceName[] = $serviceRow['serviceName'];
                        }
                        sort($serviceName);
                        list($part1, $part2, $part3) = divideArray($serviceName);

                        echo '<div>';
                        foreach ($part1 as $item) {
                            echo "<p>".strtoupper($item)."</p>";
                        }
                        echo '</div><div>';
                        foreach ($part2 as $item) {
                            echo "<p>".strtoupper($item)."</p>";
                        }
                        echo '</div><div>';
                        foreach ($part3 as $item) {
                            echo "<p>".strtoupper($item)."</p>";
                        }
                        echo '</div>';
                    }
                    echo '</div></div></div>';
                    $count++;
                }
            } catch (Exception $e) {
                echo '<p>Error: ' . $e->getMessage() . '</p>';
            }
            ?>
        </section>
        <!-- <hr> -->
        <section id="instruction">
            <h3>GENERAL INSTRUCTION</h3>
            <ol class="custom-list">
                <li> Walk-in between 07.00 am and 10.00 am with prior appointment</li>
                <li> Please come with an empty stomach after an overnight fasting of 10 - 12 hours </li>
                <li> Kindly carry your own medical records, in case you are taking any medication</li>
                <li> Please wear casual dress and shoes, as you may have to undergo various tests.</li>
                <li> Pregnant ladies or those suspecting pregnancy should not undergo X-ray, Mammography, Bone densitometry, or Treadmill test.</li>
                <li> Health check report review will be done by Relevant Physician / Medical Officer.</li>
                <li> Any further investigation as advised by the concerned physician, a 20% discount will be extended</li>
                <li> For any assistance or guidance, please call us at
                    <h2>9861923584, 0674 - 3522577</h2>
                </li>
            </ol>
        </section>
        <section id="equipment">
            <h3>HIGH-END EQUIPMENT</h3>
            <ol class="custom-list">
                <li> 4-D Echocardiography</li>
                <li> PET - CT (Biograph Horizon)</li>
                <li> CT - Scan (128 slice)</li>
                <li> 3 Tesla MRI</li>
                <li> Linear Accelerator (True Beam)</li>
                <li> HDR Brachytherapy (Bravos)
                    <p>(First of its kind in India with at least 30 channel lr -193 remote After Loader Brachytherapy)</p>
                </li>
                <li> Digital Mammography</li>
                <li> Digital Radiography</li>
                <li> Dual head SPECT Gamma Camera</li>
                <li> Azurion 7 Cathlab</li>
            </ol>
        </section>
        <section id="about">
            <h2>ABOUT SUM ULTIMATE</h2>
            <p>
                SUM ULTIMATE MEDICARE is a non-stop, multi super speciality quaternary care hospital committed to providing medical excellence across the spectrum of medical and surgical interventions, along with a comprehensive mix of follow-up services. We are also committed to providing the safest, most effective, and most compassionate care to our patients by merging the twin concepts of affordability and quality care.
            </p>
        </section>
        <section id="appointment">
            <p>For Appointment</p>
            <p>9861923584</p>
        </section>
        <footer>
            <h2>SUM ULTIMATE MEDICARE</h2>
            <p>K-8, Kalinga Nagar, Ghatikia</p>
            <p>Bhubaneswar, Odisha</p>
            <h3>Call: 0674 - 3500577</h3>
            <p>E-mail: sumum_bbsr@soahospitals.com</p>
            <p>Web: www.sumum.soahospitals.com</p>
            <div>
                <h3>Follow us on: </h3>
                <a href="https://www.facebook.com/soa.sumum" alt="Facebook" target="_blank" rel="noopener noreferrer"><img src="images/facebook.png" alt="facebook"></a>
                <a href="https://www.instagram.com/sum_ultimate_medicare/" alt="Instagram" target="_blank" rel="noopener noreferrer"><img src="images/instagram.png" alt="instagram"></a>
                <a href="https://twitter.com/SUM_Ultimate" alt="Twitter" target="_blank" rel="noopener noreferrer"><img src="images/twitter.png" alt="twitter"></a>
            </div>
        </footer>
    </div>
    <script src="js/index.js"></script>
</body>
</html>
