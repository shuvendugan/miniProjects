<?php
//this page fetch branch details request from script.js  $('#faculty')
include_once('./includes/config.php');
include_once('./includes/fun.php');

$sql = "SELECT * FROM branches where branchStatus ='Active'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo '<a href="faculty.php?q='.urlencode(str_encrypt($row['branchId'])).'"><div data-id='.htmlspecialchars($row['branchId']).' class="dropdown-item">' . htmlspecialchars($row['branchName']) . '</div></a>';
    }
} else {
    echo '<p class="dropdown-item">No data available</p>';
}
$conn->close();
?>