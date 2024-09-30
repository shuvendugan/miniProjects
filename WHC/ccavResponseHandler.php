<?php include('Crypto.php');
include_once("../config.php");
include_once("../fun.php");
?>
<?php

	error_reporting(0);
	
	$workingKey='79A75A368CF72220FB0C64B0CE94B1BD';		//Working Key should be provided here.
	$encResponse=$_POST["encResp"];			//This is the response sent by the CCAvenue Server
	$rcvdString=decrypt($encResponse,$workingKey);		//Crypto Decryption used as per the specified working key.
	$order_status="";
	$decryptValues=explode('&', $rcvdString);
	$dataSize=sizeof($decryptValues);


	if (!$con) 	{    	die("Connection failed: " . mysqli_connect_error());	}

// Prepare SQL statement
$sql = "UPDATE payment_receive SET ";
for ($i = 0; $i < $dataSize; $i++) 
{
    $information = explode('=', $decryptValues[$i]);
    if($i==0)	$order_number=$information[1];
    $column = $information[0];
    $value = mysqli_real_escape_string($con, $information[1]);
    $sql .= "$column = '$value', ";
}

// Trim the last comma and space
$sql = rtrim($sql, ", ");

// Add WHERE clause
$sql .= " WHERE pymtslno = $order_number"; 
//echo "<br> SQL=".$sql."<br>"; 

// Execute the update query
if (mysqli_query($con, $sql)) 
	{    //echo "Record updated successfully.";
	} 
	else 
	{
    	echo "Error updating record: " . mysqli_error($con);
    }
// Close database connection
// mysqli_close($con);

?>



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Payment Page</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <style>
    body {
      /* padding-top: 50px; */
    }
    .center-box {
      margin: 0 auto;
      max-width: 400px;
      padding: 20px;
      border: 1px solid #432686;
      border-radius: 10px;
      background-color: #e7e0f7;
    }

    table {
      border-collapse: collapse;
      width: 100%;
    }
    th, td {
      border: 1px solid #432686;
      padding: 8px;
      text-align: left;
    }

  .vertical-line {
  border-left: 1px solid #000;
  height: 100%;
  }

  .btn-custom {
  border: 1px solid #000;
  border-radius: 0;
  width: 130px;
}
.btn-primary{
	background-color: #432686;
	border: 1px solid #432686;

}
  
  </style>
</head>
<body>
  <!-- <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
    <div class="container">
      <a class="navbar-brand" href="#">
        <img src="sq.jpg" alt="Logo" height="60">
      </a>
      <span class="navbar-text ml-auto">Payment</span>
    </div>
  </nav> -->
<?php include_once('header.php');?>
  <div class="container mt-5">
    <div class="center-box">
      <!-- <ceter><img src="ultimatelogo.png" height="100" class="img-fluid mx-auto d-block"></ceter>  -->

<?php 
  
	echo "<center>";

	for($i = 0; $i < $dataSize; $i++) 
	{
		$information=explode('=',$decryptValues[$i]);
		if($i==3)	$order_status=$information[1];
	}

	if($order_status==="Success")
	{
		echo "<br>Thank you for choosing SUM Ultimate Medicare.Your transaction is successful.Please show this information at the Registration Desk";
		
	}
	else if($order_status==="Aborted")
	{
		echo "<br>Thank you for choosing SUM Ultimate Medicare.We will keep you posted regarding the status of your order through e-mail";
	
	}
	else if($order_status==="Failure")
	{
		echo "<br>Thank you for choosing SUM Ultimate Medicare.However,the transaction has been declined.";
	}
	else
	{
		echo "<br>Security Error. Illegal access detected";
	
	}

	echo "<br><br>";

	echo '<table cellspacing="4" cellpadding="4" style="border: 1px solid grey;">';
$displayInfo = array(
    "order_id" => "Order ID",
    "tracking_id" => "Tracking ID",
    "bank_ref_no" => "Reference Number (Bank)",
    "order_status" => "Order Status",
    "payment_mode" => "Payment Mode",
    "card_name" => "Card Name",
    "status_message" => "Message",
    "currency" => "Currency",
    "amount" => "Amount",
    "delivery_tel" => "Mobile Phone Number",
    "merchant_param1" => "Unique Medical Record (UMR)",
    "trans_date" => "Transaction Date"
);

foreach ($displayInfo as $infoKey => $infoLabel) {
    $infoValue = "";
    foreach ($decryptValues as $decryptValue) {
        $pair = explode("=", $decryptValue);
        if ($pair[0] == $infoKey) {
            $infoValue = $pair[1];
            break;
        }
    }
    if (!empty($infoValue)) {
        echo '<tr><th>' . $infoLabel . '</th><td>' . $infoValue . '</td></tr>';
    }
}

echo "</table><br>";
echo "</center>";

?>
	<div class="text-center">
	     <a href="https://appt.soahospitals.com/itsnow/whc" class="btn btn-primary">Want new checkup? Click Here</a>
	</div>
</div>
</div>


  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>