<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sum of digits</title>
</head>
<body>
    <form action='<?php echo $_SERVER['PHP_SELF']?>' method="POST">
        <label for="number">Enter number to check Odd Even :</label>
        <input type="text" name="number" id="number">
        <input type="submit" name="submit" id="submit" value='Submit'>
    </form>
</body>
</html>
<?php
if(isset($_POST['submit']) && $_POST['submit'] == 'Submit' ){

    $num = $_POST['number'];
    if($num%2 == 0){
        echo "<h1 style='text-align:center'><span style='color:red'>$num</span> is an Even number</h1>";
    }else{
        echo "<h1 style='text-align:center'><span style='color:red'>$num</span> is a Odd number</h1>";
    }
}



?>