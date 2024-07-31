
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sum of digits</title>
</head>
<body>
    <form action='<?php echo $_SERVER['PHP_SELF']?>' method="POST">
        <label for="number">Enter number to calculate sum of Digits :</label>
        <input type="text" name="number" id="number">
        <input type="submit" name="submit" id="submit" value='Submit'>
    </form>
</body>
</html>
<?php
if(isset($_POST['submit']) && $_POST['submit'] == 'Submit' ){

    $num = $_POST['number'];
    $sum = 0;
    $rem = 0;
    $length = strlen($num);

    for($i=0;$i<=$length;$i++){
        $rem = $num%10;
        $sum += $rem;
        $num /=10;
    }
    echo "<h1 style='text-align:center'>Sum of digit is <span style='color:red'>$sum</span></h1>";
}

?>