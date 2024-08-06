<?php
//this page fetch faculty details request from script.js $('.fellow-details')
include_once('./includes/config.php');
include_once('./includes/fun.php');

if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $sql = "SELECT * FROM faculty WHERE facultyID = $id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $data = [
            'image' => $row['image'],
            'name' => $row['facultyName'],
            'email' => $row['email'],
            'phone' => $row['phone']
        ];
        echo json_encode($data);
    } else {
        echo json_encode(['error' => 'No details found']);
    }
}

$conn->close();


?>