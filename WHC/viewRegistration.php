<?php
	session_start();
	include_once("includes/config.php");
	include_once("includes/fun.php");
    if(($_SESSION["sess_userid"] =="") || ($_SESSION["sess_id"] != session_id()))
    {
        header("location:index.php");
    }

    $login_id=$_SESSION["sess_loginid"];
    $act_msg = '';
    $sess_userid = $_SESSION["sess_userid"];
    $date = date("Y-m-d H:i:s");
    $msg='';
 
 
?>
<!DOCTYPE HTML>
<html>
<head>
    <?php include_once("includes/head.php"); ?>
    <?php include_once("includes/data_table_head.php"); ?>
</head>
<body>
	<?php include_once("includes/header.php"); ?>
<div id="wrapper">
    <!-- Sidebar start -->
    
    <?php include_once("includes/sidebar.php"); ?>
        
    <!-- sidebar-end-->
    <!-- Page Start -->



    <div id="page-content-wrapper">
        <div class="container-fluid">
            
            <div class="row">
                <div class="table-responsive">
                	<div class="col-md-6 col-sm-6 col-xs-12"><h2><i class="fa fa-registered "></i>Health Check Up (Test)</h2></div>

                	

                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <a href="reg_qr_code.php" target="_blank"><button class="btn btn-primary pull-right">QR Code</button></a>
                    </div>
                    <div class="clearfix"></div><hr/>	
                	
                    <div class="col-md-12" style="padding-left:0px">
					


                        <table id="mytable" class="table table-bordred table-striped">
                        
                            <thead>                            
                                <tr>  
                                    <th>slno</th>
                                    <th>tempID</th>
                                    <th>Phone</th>
                                    <th>patient_name </th>
                                    <th>amount</th>
                                    <th>order_status</th>
                                    <th>order_id</th>
                                    <th>bank_ref_no</th>
                                    <th>alt_phone_no</th>
                                    <th>NOK</th>
                                    <th>Blood</th>
                                    <th>dob</th>
                                    <th>gender</th>
                                    <th>maritalStatus </th>
                                    <th>email</th>
                                    <th>entryDate</th>
                                    <th>AT </th>
                                    <th>PO </th>
                                    <th>PS </th>
                                    <th>city </th>
                                    <th>district </th>
                                    <th>state</th>
                                    <th>country </th>
                                    <th>pincode </th>
                                    <th>payFor  </th>
                                </tr>                                
                            </thead>
                            
                            <tbody> 
                            	<?php
                                $qry = "SELECT hr.* , pr.amount ,pr.order_status,pr.order_id,pr.bank_ref_no FROM healthCheckUp_reg hr
                                            LEFT JOIN payment_receive pr ON pr.order_id = hr.order_id
                                            ORDER BY hr.regID DESC";

                                    //echo $qry;exit();

                                    $newPatient_query = mysqli_query($con, $qry);
                                    $noof_newPatient_rec = mysqli_num_rows($newPatient_query);
									
									if($noof_newPatient_rec  > 0)
									{
										$count = 1;
										while($newPatient_res = mysqli_fetch_array($newPatient_query))
										{
                                            // pr($newPatient_res);
                                              $slno =   $newPatient_res['regId'];
                                              $temp_id =   $newPatient_res['tempId'];
                                              $phone_no =   $newPatient_res['phone'];
                                              $patient_name =   $newPatient_res['patientName'];
                                              $dob =   $newPatient_res['dob'];
                                              $gender =   $newPatient_res['gender'];
                                              $maritalStatus =   $newPatient_res['maritalStatus'];
                                              $email =   $newPatient_res['email'];
                                              $entry_date =   $newPatient_res['entryDate'];
                                              $status =   $newPatient_res['status'];
                                              $at =   $newPatient_res['at'];
                                              $po =   $newPatient_res['po'];
                                              $ps =   $newPatient_res['ps'];
                                              $city =   $newPatient_res['city'];
                                              $district =   $newPatient_res['district'];
                                              $state =   $newPatient_res['state'];
                                              $country =   $newPatient_res['country'];
                                              $pincode =   $newPatient_res['pincode'];
                                              $payFor =   $newPatient_res['payFor'];
                                              $amount =   $newPatient_res['amount'];
                                              $order_status =   $newPatient_res['order_status'];
                                              $order_id =   $newPatient_res['order_id'];
                                              $bank_ref_no =   $newPatient_res['bank_ref_no'];
                                              $alt_phone_no = $newPatient_res['alt_phone_no'];
                                              $nok = $newPatient_res['nok'];
                                              $blood = $newPatient_res['blood'];
								?>                   
                                <tr>
                                    <td><?php echo $slno;?></td>
                                    <td><a target="_blank" href="newPatientPrint.php?prn=<?php echo $temp_id;?>"><?php echo $temp_id;?></a></td>
                                    <td><?php echo $phone_no;?></td>
                                    <td><?php echo $patient_name;?></td>
                                    <td><?php echo $amount;?></td>
                                    <td <?php if($order_status == 'Success'){echo 'style="color:green;font-weight:600"';}else{echo 'style="color:red;font-weight:600"';}?>><?php echo $order_status;?></td>
                                    <td><?php echo $order_id;?></td>
                                    <td><?php echo $bank_ref_no;?></td>
                                    <td><?php echo $alt_phone_no;?></td>
                                    <td><?php echo $nok;?></td>
                                    <td><?php echo $blood;?></td>
                                    <td><?php echo $dob;?></td>
                                    <td><?php echo $gender;?></td>
                                    <td><?php echo $maritalStatus;?></td>
                                    <td><?php echo $email;?></td>
                                    <td><?php echo $entry_date;?></td>
                                    <td><?php echo $at;?></td>
                                    <td><?php echo $po;?></td>
                                    <td><?php echo $ps;?></td>
                                    <td><?php echo $city;?></td>
                                    <td><?php echo $district;?></td>
                                    <td><?php echo $state;?></td>
                                    <td><?php echo $country;?></td>
                                    <td><?php echo $pincode;?></td>
                                    <td><?php echo $payFor;?></td>
                                    
                                </tr>
                                <?php										
										$count++;
										}
									}
									else
									{
								?> 
                                <tr>  <td colspan="26" align="center">No Records Found !!</td> </tr>
                                <?php  	}  ?>                                                                          
                            </tbody>
                            
                        </table>
                        
                    </div>
                
                	<div class="clearfix" ></div>
                                
                </div>
            </div>
            
        </div>
    </div>
    <!--page-end -->
       
</div>

<?php include_once("includes/footer.php"); ?>
<?php include_once("includes/data_table_footer.php"); ?>

</body>
</html>