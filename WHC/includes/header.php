



<header>  
    <div class="col-lg-8" style="padding-left:0;">
        <span class="tog-btn"><a href="#menu-toggle" class="toogle-btn" id="menu-toggle"><i class="fa fa-bars"></i></a></span>
        <span class="logo pull-left" style="background-color:#FFF; ">
            <a href="./it_support.php" target="_blank"><img src="../images/small_ultimate.png" height="10px" class="img-responsive"></a>
        </span>
       

       <span class="logo pull-left"> 
             <a href='<?php echo (($login_id==50) || ($login_id==9)) ?  "./HRD/" : '#' ?>' target="_blank">
            <button class="dropbtn">HRD</button></a>
        </span>
        <span class="logo pull-left">
             <a href="./lms/" target="_blank">
            <button class="dropbtn">LMS</button></a>
         </span>
         <span class="logo pull-left dropdown">

        <a href="./transport.php">
        <button class="dropbtn" style="width:158px"><i class="fa fa-wheelchair"></i> Transport</button></a> 
             <div class="dropdown-content">
                     <a href="transport.php?req=TmV3VHJhbnNwb3J0UmVxdWVzdA==">Transport Request</a>
                      <?php $deptid= showname_fromid("deptid","user_master","loginID='$login_id'");
                     //echo $deptid; //$deptid=82; 
                     if ($deptid==27 || $deptid==82 || $deptid==1) //HK
                     {
                     ?>
                     <a href="transport_desk.php" target="_blank">Transport Desk</a>
                     <?php
                     }
                     ?> 
                     <!-- <a href="transport_desk.php">Transport Desk</a> -->
                     <a href="transport_report.php">Reports</a>
             </div>
       </span>
        <span class="logo pull-left dropdown">
            <a href="./incident/" target="_blank">
              <button class="dropbtn"style="width:158px" >Incident Report</button>
            </a> <!-- #ed1651 -->
                <div class="dropdown-content">
                   <a href="./incident/" target="_blank">Report An Incident</a>
                   <a href="manage_incidents.php">Previous Reports</a>
                </div>
       </span>

        <span class="logo pull-left dropdown">

        <a href="./RTRegistration" target="_blank">
        <button class="dropbtn"><i class=""></i>RT Registration</button></a> 
            
       </span>

        <div class="clearfix"></div>
    </div>
    <!-- <div class="col-md-4"></div> -->
    <div class="col-lg-4">
        <div class="row">
            <li class="user dropdown pull-right hidden-md hidden-sm hidden-xs">
                <a href="#"> <i class="fa fa-user h-user"></i> Welcome <?php echo $_SESSION["sess_userid"]." (".$_SESSION["sess_loginid"].")";?> </a>
            </li> 
        </div>
    </div>
</header>
   <?php
    if ($deptid==1 || $deptid==16 || $deptid==16 ) //it ||bio ||maintance
                     {
                     ?>
                     <div class="display-toast" id='display-toast'style="margin-top:50px;margin-right:0px;" >
                     </div>
                     <?php
                     }
    ?>
<?php
// if(time() - $_SESSION['timestamp'] > 900) { //subtract new timestamp from the old one
//     echo"<script>alert('15 Minutes over!');</script>";
//     unset($_SESSION['sess_userid'], $_SESSION['password'], $_SESSION['sess_userid']);
//     header("location:..\itsnow\index.php"); //redirect to index.php
//     exit;
// } else {
//     $_SESSION['timestamp'] = time(); //set new timestamp
//}
?>
