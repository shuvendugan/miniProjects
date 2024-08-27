<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0 ,user-scalable=no">
    <title>MADRECON</title>
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link rel="stylesheet" href="assets/css/swiper.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
    <div class='container' id='registration'>
        <div class='row h-100'>
            <div class='col-sm-3'></div>
            <div class='col-sm-6 d-flex align-items-center justify-content-center '>
                <div class='registration'>
                    <h1 >Registration <br /> Closing Soon</h1>
                </div>
            </div>
        </div>
    </div>
    <div class='col-sm-6 col-md-12 d-flex align-items-center justify-content-center'>
        <h2 id='medrecon' style='text-align: center;'>MEDRECON-2025</h2>
    </div>
    <div class='container-fluid' id='conf'>
        <div class='row h-100'>
            <div class='col-sm-12 d-flex align-items-center justify-content-center'>
                <div class='registration'>
                    <h2 class="wave-text" style='text-align: center;'>24th Annual National Conference on Medical Records <br/>and<br/> Health Information Management</h2>
                </div>
            </div>
        </div>
    </div>
    
    <div class="container" id='association'>
        <div class='row h-100'>
            <div class='col-sm-4 d-flex align-items-center justify-content-center flex-column'>
                <img class='logo-img ' src="./images/sumum_logo.jpg" alt="Ultimate">
                <p class='fw-bold logo-name'>SUM ULTIMATE MEDICARE</p>
            </div>
            <div class='col-sm-4 d-flex align-items-center justify-content-center'>
                <h2 style='text-align: center;'>in association with</h2>
            </div>
            <div class='col-sm-4 d-flex align-items-center justify-content-center flex-column'>
                <img  class='logo-img' src="./images/hera.png" alt="HERA">
                <p class='fw-bold logo-name'>HEALTH RECORD ASSOCIATION OF INDIA</p>
            </div>
        </div>
    </div>
    <div class='container' id='venue'>
        <div id='date'>on 21 <sup>st</sup>  &  22 <sup>nd</sup>  February 2025</div>
        <div id='vanue-details'>
            <p>Venue - </p>
            <p> SOA Auditorium, Campus -II, K8, Kalinga Nagar,Bhubaneswar Pin Code – 751003, Odisha</p>           
        </div>
    </div>
    <div class='container-fluid' id='brochure'>
        <div class="swiper">
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
    <div class='container' id='footer'>
        <div class='row'>
            <div class='col-sm-6 text-center h-100'>
                <h2>FOLLOW US HERE</h2>
                <div class='d-flex align-items-center justify-content-evenly social'>
                    <a href="https://www.facebook.com/soa.sumum" target='_blank'><img class='icon'
                            src="images/facebook.png" alt="Facebook"></a>
                    <a href="https://x.com/SUM_Ultimate" target='_blank'><img class='icon' src="images/twitter.png"
                            alt="Twitter"></a>
                    <a href="https://www.youtube.com/channel/UCUMaVisWVERS8CUD1AxYcag/videos?view=0&sort=dd&shelf_id=0"
                        target='_blank'><img class='icon' src="images/youtube.png" alt="Youtube"></a>
                    <a href="https://www.instagram.com/sum_ultimate_medicare/" target='_blank'><img class='icon'
                            src="images/instagram.png" alt="Instagram"></a>
                    <a href="https://www.linkedin.com/company/sum-ultimate-medicare/?originalSubdomain=in"
                        target='_blank'><img class='icon' src="images/linkedin.png" alt="LinkedIn"></a>
                </div>
            </div>
            <div class='col-sm-6 text-center'>
                <h2><a style='text-decoration:none' href="registration.php">CLICK HERE TO REGISTER</a></h2>
                <img id='qr'  src="images/RegQR.png" alt="">
            </div>
        </div>
    </div>
    <script src='assets/js/jquery.js'></script>
    <script src="assets/js/bootstrap.js"></script>
    <script src="assets/js/swiper.js"></script>
    <script src="assets/js/script.js"></script>
</body>

</html>