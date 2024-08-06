<?php 
include_once('./includes/head.php');
include_once('./includes/header.php');
echo "<main><div class='swiper-container'><div class='swiper-wrapper'>";
// to fetch all the images from slides folder to show  
$directory = 'images/slides/';
$imageExtensions = ['jpg', 'jpeg', 'png'];
$imageFiles = [];

if (is_dir($directory)) 
{
    $files = scandir($directory);
    $imageFiles = [];

    foreach ($files as $file) 
    {
        $pathinfo = pathinfo($file);
        $extension = strtolower($pathinfo['extension']);
        
        if (in_array($extension, $imageExtensions)) {
            $imageFiles[] = $file;
        }
    }

    sort($imageFiles);
} 
foreach ($imageFiles as $index => $imageFile) 
{
    $imagePath = "$directory/$imageFile";
    echo "<div class='swiper-slide'><img src='$imagePath' alt='$index'></div>" ;  

} 
echo "</div></div></main>";
include_once('./includes/footer.php')
?>
