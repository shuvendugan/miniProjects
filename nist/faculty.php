<?php 
include_once('./includes/head.php');
include_once('./includes/header.php');
include_once('./includes/config.php');
include_once('./includes/fun.php');

echo "<main>";
if(isset($_REQUEST['q'])){
    $q = $_REQUEST['q'];
    $branchID = str_dcrypt($q);
    // echo $branchID;exit();
    $sql = "SELECT * FROM faculty f 
            JOIN branches b ON b.branchId = f.branchID
            WHERE b.branchId = $branchID";
    $result = $conn->query($sql);
    if($result->num_rows > 0) {
        $facultyArray = [];
        $hod =[];
        while ($row = $result->fetch_assoc()) {
            $branchName = $row['branchName'];
            if($row['isHOD'] == 'no'){
                array_push($facultyArray,$row);
            }else{
                $hod = $row;
            }
        }
    }else{
        echo "<h1>This branch is not working now.</h1>";
        exit();
    }
}
echo "<h1>Welcome to $branchName</h1>";
// TO Show HOD of the department
if(!empty($hod)){
    $facultyName  =  $hod['facultyName'];
    $image  =  $hod['image'];
    $email  =  $hod['email'];
    $phone  =  $hod['phone'];
    $branchName  =  $hod['branchName'];
    echo "<div class='hod cus'>
            <div class='hod-img'>
                <img src='$image' alt='$facultyName'>
            </div>
            <div class='bar'></div>
            <div class='hod-details'>
                <p><span>Name</span><span>:</span><span>$facultyName</span></p>
                <p><span>Email</span><span>:</span><span>$email</span></p>
                <p><span>Phone</span><span>:</span><span>$phone</span></p>
            </div>
        </div>
        <div id='down'>HOD, $branchName</div>";
}
echo "<h2>Other faculties</h2>
    <div id='fellow'>";
// to show other Teachers
foreach($facultyArray as $value){
    $facultyID  =  $value['facultyID'];
    $facultyName  =  $value['facultyName'];
    $image  =  $value['image'];
    echo "<div class='fellow-details cus' data-id='$facultyID' title='Click me to show details'>
        <img src='$image' alt='$facultyName'>
        <div class='bar '></div>
        <p>$facultyName</p>
    </div>";
}
echo "</div></main>";
include_once('./includes/modal.php');
include_once('./includes/footer.php');
?>