<html>
<head>
<title> Bank Payment Gateway </title>
</head>
<body>
<center>

<?php include('Crypto.php');
include_once("../config.php");


	error_reporting(0);
	
	$fetch_rec = mysqli_query($con, "SELECT * FROM payment_api WHERE env='test' and status=1");
	if(mysqli_num_rows($fetch_rec) > 0)
	{
		while($fetch_res = mysqli_fetch_array($fetch_rec))
		{
			$url = $fetch_res["url"];
			$merchant_id = $fetch_res["merchantid"];
			$access_code = $fetch_res["accesscode"];
			$working_key = $fetch_res["workingkey"];
			$pg_link = $fetch_res["pglink"];

		}
	}
	
	
	foreach ($_POST as $key => $value){
		$merchant_data.=$key.'='.$value.'&';
	}
	// echo $merchant_data;exit();
	$encrypted_data=encrypt($merchant_data,$working_key); // Method for encrypting the data.

?>
<form method="post" name="redirect" action="<?php echo $pg_link ?>">	
<form action="">
<?php
echo "<input type=hidden name=encRequest value=$encrypted_data>";
echo "<input type=hidden name=access_code value=$access_code>";
?>
</form>
</center>
<script language='javascript'>document.redirect.submit();</script>
</body>
</html>

