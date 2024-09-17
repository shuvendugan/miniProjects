<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,user-scalable=no">
    <title>Document</title>
    <link rel="stylesheet" href="assets/bootstrap.css">
    <link rel="stylesheet" href="assets/swipper.css">
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>
    <div class='container' id='registration' >
        <div class='row h-100'>
            <div class='col-sm-6 d-flex align-items-center justify-content-center '>
                <div class='registration'>
                    <h1>Registration <br/> Closing Soon</h1>
                </div>
            </div>
            <div class='col-sm-6 d-flex align-items-center justify-content-center'>
                <div class='registration'>
                    <h2 style='text-align: center;'>4th World Conference on COMPREHENSIVE CRITICAL CARE</h2>
                </div>
            </div>
        </div>
        
    </div>
    <div class="container" id='association'>
        <div class='row h-100'>
            <div class='col-sm-2 d-flex align-items-center justify-content-center'>
                <img class='logo-img' src="./images/SUm_Logo.png" alt="Ultimate">
            </div>
            <div class='col-sm-6 d-flex align-items-center justify-content-center'>
                 <h2  style='text-align: center;'>in association with</h2>
            </div>
            <div class='col-sm-2 d-flex align-items-center justify-content-center'>
                <img class='logo-img w4c' src="./images/W4Clogo.jpeg" alt="W4C">
            </div>
            <div class='col-sm-2 d-flex align-items-center justify-content-center'>
                <img class='logo-img isccm' src="./images/isccm_logo.jpeg" alt="ISCCM">
            </div>
        </div>
    </div>
    <div class='container' id='venue'>
        <div class='row h-100'>
            <div class='col-sm-4 d-flex align-items-center justify-content-center '>
                <div class='text-center'>
                    <h3>First Time In<br/>Eastern India</h3>
                </div>
            </div>
            <div class='col-sm-3 d-flex align-items-center justify-content-center'>
                <div class='text-center'>
                    <h3 style="animation-delay: .5s;">in the<br/> City's</h3>
                </div>
            </div>
            <div class='col-sm-5 d-flex align-items-center justify-content-center'>
                <div class='text-center'>
                    <h3 style="animation-delay: .75s;">Biggest Auditorium &<br/>Convention Center</h3>
                </div>
            </div>
        </div>
    </div>
    <div class='container' id='welcome'>
        <div class='row'>
            <div  class='col-sm-6'>
                <img src="./images/sum-ultimate.avif" alt="SUM Ultimate">
            </div>
            <div class='col-sm-6' style='height: 46vh;'>
                <div class='heading' id='about-heading'>
                    <h2 style='font-size:32px;text-align:center'>Welcome to<br/> SUM Ultimate Medicare</h2>
                    <hr>
                </div>
                <div class="div-text" >
                    <p>
                    At SUM Ultimate Medicare, our vision is to become the ultimate destination for healthcare and healing. We are on a mission to provide next-generation treatments and care in patient-centric, technology-enhanced settings, aimed at improving the health of people. Our dedication lies in delivering the safest, most accessible, effective, and compassionate care with integrity and accountability, all within an ecosystem of healing that integrates excellence in medical research and education. 
                    </p>
                    <h5>Comprehensive Care for Your Family</h5>
                    <p>
                    SUM Ultimate Medicare stands as a multispecialty quaternary care hospital, committed to medical excellence across a broad spectrum of medical and surgical interventions. We offer a complete range of follow-up services, ensuring that our patients receive continuous and comprehensive care.
                    </p>
                    <h5>State-of-the-Art Facilities and Innovative Research</h5>
                    <p>
                    We provide an atmosphere of healing with state-of-the-art healthcare facilities. Our hospital integrates a wide spectrum of clinical education and research opportunities, enabling us to offer advanced medical treatments and care. Our commitment to innovation ensures that we stay at the forefront of medical technology and practices.
                    </p>
                    <h5>A Hub for Medical Tourism and Organ Transplants</h5>
                    <p>
                    As a leading medical tourism hub in eastern India, SUM Ultimate Medicare attracts patients from across the region and beyond, offering world-class healthcare services. We are also renowned for our successful organ transplant programs, which have given many patients a new lease on life. Our expertise and comprehensive care make us a trusted destination for critical medical interventions.
                    </p>
                    <h5>Our Guiding Values</h5>
                    <p>
                    Our values are encapsulated in the Seven Pillars that guide us with integrity:
                    </p>
                    <ol>
                        <li>Sincere Service</li>
                        <li>Dedicated People</li>
                        <li>Affordable Pricing</li>
                        <li>Innovation & Distinctive Care</li>
                        <li>Unmatched Quality</li>
                        <li>Accountability</li>
                        <li>Clinical Finesse</li>
                    </ol>
                    <h5>Pioneering Healthcare in Odisha </h5>
                    <p>As a first-of-its-kind institution in Odisha, SUM Ultimate Hospital has pioneered groundbreaking healthcare technologies in the state. We are committed to serving beyond business imperatives, fostering patient healing and building a “Bridge of Trust” with the community. Our focus on transparency, patient-friendly healthcare, empathy, compassion, coordination, and competency has consistently delivered best-in-class clinical outcomes. </p>
                    <p>Join us at SUM Ultimate Medicare, where we are dedicated to improving the health and well-being of our community with excellence, compassion, and innovation.</p>
                </div>
            </div>
        </div>
    </div>
    <div class='container-fluid' id='brochure'>
        <div class="marquee-swiper">
            <div class="swiper-wrapper">
                <?php
                    $brochureDirectory = 'brochure';
                    $brochureImageExtensions = ['jpg', 'jpeg', 'png'];
                    $brochureFiles = [];

                    if (is_dir($brochureDirectory)) 
                    {
                        $files = scandir($brochureDirectory);
                        
                        // Initialize the array to hold image files
                        $brochureFiles = [];

                        foreach ($files as $file) 
                        {
                            $pathinfo = pathinfo($file);
                            $extension = strtolower($pathinfo['extension']);
                            
                            if (in_array($extension, $brochureImageExtensions)) {
                                $brochureFiles[] = $file;
                            }
                        }

                        // Sort the image files alphabetically
                        sort($brochureFiles);
                        foreach ($brochureFiles as $index => $imageFile) 
                        {
                            $imagePath = "$brochureDirectory/$imageFile";
                            echo '<div class="swiper-slide"><img src="'.$imagePath.'" alt="'.$index.'"></div>';
                        }
                    }
                
                ?>
            </div>
        </div>
    </div>
    <div class='container' id='gallery'>
        <div class='row'>
            <div class='col-sm-6'>
                <video src="images/w4c.mp4" controls muted autoplay></video>

            </div>
            <div class='col-sm-6'>
                <div class="swiper-container">
                    <div class="swiper-wrapper">
                        <?php
                           $directory = 'gallery';
                            $imageExtensions = ['jpg', 'jpeg', 'png'];
                            $imageFiles = [];

                            if (is_dir($directory)) 
                            {
                                $files = scandir($directory);
                                // Initialize the array to hold image files
                                $imageFiles = [];

                                foreach ($files as $file) 
                                {
                                    $pathinfo = pathinfo($file);
                                    $extension = strtolower($pathinfo['extension']);
                                    
                                    if (in_array($extension, $imageExtensions)) {
                                        $imageFiles[] = $file;
                                    }
                                }

                                // Sort the image files alphabetically
                                sort($imageFiles);
                            } 
                            foreach ($imageFiles as $index => $imageFile) 
                            {
                                $imagePath = "$directory/$imageFile";
                                echo "<div class='swiper-slide'><img src='$imagePath' alt='$index'></div>" ;  
                       
                            } 
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class='container' id='footer'>
        <div class='row'>
            <div class='col-sm-6 text-center'>
                <h2>FOLLOW US HERE</h2>
                <div  class='d-flex align-items-center justify-content-evenly social'>
                    <a href="https://www.facebook.com/soa.sumum" target='_blank'><img class='icon' src="images/facebook.png" alt="Facebook"></a>
                    <a href="https://x.com/SUM_Ultimate" target='_blank'><img class='icon' src="images/twitter.png" alt="Twitter"></a>
                    <a href="https://www.youtube.com/channel/UCUMaVisWVERS8CUD1AxYcag/videos?view=0&sort=dd&shelf_id=0" target='_blank'><img class='icon' src="images/youtube.png" alt="Youtube"></a>
                    <a href="https://www.instagram.com/sum_ultimate_medicare/" target='_blank'><img class='icon' src="images/social.png" alt="Instagram"></a>
                    <a href="https://www.linkedin.com/company/sum-ultimate-medicare/?originalSubdomain=in" target='_blank'><img class='icon' src="images/linkedin.png" alt="LinkedIn"></a>
                </div>
            </div>
            <div class='col-sm-6 text-center'>
                <h2><a href="registration.php">REGISTER HERE</a></h2>
                <img id='qr' src="images/regQrCode.png" alt="">
            </div>
        </div>
    </div>
    <script src="assets/bootstrap.js"></script>
    <script src="assets/swipper.js"></script>
    <script src="assets/script.js"></script>
</body>
</html>