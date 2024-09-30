<?php
$loginid=$_SESSION["sess_loginid"];
$adminAccess = showname_fromid("paraMeter","common_settings","paravalue='$loginid'");
$basePageName=basename($_SERVER['PHP_SELF']);
$pageName=substr(strrchr($_SERVER['PHP_SELF'], "/"), 1);
//echo $pageName;
?>
<div id="sidebar-wrapper">
	<div id='sidemenu'>
		<div class="clearfix" style="margin-bottom: 10px;"></div>
		<ul>
			<!-- <li><a href='dashboard.php'><i class="fa fa-area-chart"></i>Dashboard </a></li> -->
			<li><a href='it_support.php'><i class="fa fa-support"></i>SUPPORT</a></li>
			<!-- <li><a href='transport.php'><i class="fa fa-support"></i>Call Transport</a></li>
			<li><a href='transport_desk.php'><i class="fa fa-support"></i>Transport Desk</a></li> -->



			<!--People's Prowess Program MODULE-->


			<?php   $PPPAccess = showname_fromid("access","access_master","userId='$login_id' and pageName='sidebar.php' and areaName='Peoples_Prowess_Program'");  ?>
			<li  <?php if ($PPPAccess == 0) echo "style='display:none';";?> >
				<a href='PPP\index.php'><i class="fa fa-support"></i>PPP</a>
			</li>
			
			<!-- if ($basePageName == 'ppp_dashboard.php' || $basePageName == 'ppp_activity_master.php' || $basePageName == 'ppp_prowess_workspace.php' || $basePageName == 'ppp_assessment.php' || $basePageName == 'ppp_delegate.php' || $basePageName == 'ppp_mgmt_dashboard.php' || $basePageName == 'ppp_intro.php' || $basePageName== 'ppp_add_activity.php' )
				$active = "active";
			else
				$active = ""; //echo $active;
			 -->

			


			<!--End of People's Prowess Program MODULE-->




			<!--SUPPORT DEPT MODULE-->

			<?php   $SupAccess = showname_fromid("access","access_master","userId='$login_id' and pageName='sidebar.php' and areaName='SUPPORT_DEPT'"); 
			$DeptName=showname_fromid("deptName","dept_master","deptid IN (SELECT deptid FROM user_master WHERE loginid='$login_id')");
				//echo $pageName;

			if ($basePageName == 'take_ticket.php' || $basePageName == 'ticket_status.php' || $basePageName == 'my_points.php')
				$active = "active";
			else
				$active = ""; //echo $active;
			

			?>

			<li class='has-sub <?php echo $active; ?>' <?php if ($SupAccess == 0) echo "style='display:none';";?>  >
				<a href='#'><i class="glyphicon glyphicon-star"></i><?php echo $DeptName;?></a>
				<ul>
					<li><a href='take_ticket.php'><i class="fa fa-star" style="font-size:15px;color:red;"></i>Take Ticket</a></li>
					<li><a href='ticket_status.php'><i class="fa fa-clipboard" style="font-size:15px;color:blue;"></i>Tickets Status</a></li>
					<li><a href='my_points.php'><i class="fa fa-circle" style="font-size:15px;color:green;"></i>My Points</a></li> 

<!-- 					<li><a href='incident/index.php' target="_blank"><i class="fa fa-list"></i>Incident</a></li> 
					<li><a href='incident/list_of_reporting.php'><i class="fa fa-list"></i>Incident</a></li> 
 -->				</ul>
			</li>


<!--SUPPORT DEPT MODULE ENDS HERE-->



<!-- MESSAGE -->
<?php $accessVal =1;// showname_fromid("access","access_master","userId='$login_id' and pageName='sidebar.php' and areaName='message'"); ?>
			
			 <?php
			if ($basePageName == 'mailinbox.php' || $basePageName == 'sent.php'  || $basePageName == 'compose_mail.php')
				$active = "active";
			else
				$active = ""; //echo $active;
			?>
			<li class=' <?php echo $active; ?>' <?php if ($accessVal == 0) echo "style='display:none';";?> >
				<a href='mailinbox.php'><i class='fa fa-mail'></i>Message</a>
				<!-- <ul>
					<li><a href='mailbox.php'><i class="fa fa-email-o"></i>Messages</a></li>
					
				</ul> -->
			</li>
			<?php ?>


			
<!-- REGISTRATION -->
			
			 <?php
			if ($basePageName == 'prereg.php' || $basePageName == 'sms.php'  || $basePageName == 'RTRegistration/index.php')
				$active = "active";
			else
				$active = ""; //echo $active;
			?>
			<li class='has-sub <?php echo $active; ?>' >
				<a href='prereg.php'><i class='fa fa-fax'></i>Front Office</a>
				<ul>
					<li><a href='healthcheckup.php'><i class="fa fa-heart-o"></i>Healthcheck Schedule</a></li>
					<li><a href='sms.php'><i class="fa fa-mobile"></i>Admission SMS</a></li>
					<li><a href='prereg.php'><i class="fa fa-mobile"></i>Pre-Registration</a></li>
					<li><a href='RTRegistration/index.php'><i class="fa fa-mobile"></i>RT Registration</a></li>
					<li><a href='newPatientView.php'><i class="fa fa-registered"></i>New Registration</a></li>
				</ul>
			</li>
			<?php ?>

<!--IT DEPT MODULE-->
			<?php   $accessVal = showname_fromid("access","access_master","userId='$login_id' and pageName='sidebar.php' and areaName='it_dept'"); 
				//echo $pageName;
				?>
            
            <?php
			if ($basePageName == 'ticket_response.php' || $basePageName == 'task_master.php' || $basePageName == 'asset_transfer.php' || $basePageName == 'assigned_tasks.php' || $basePageName == 'onhold_tickets.php' || $basePageName == 'closeAwaitTickets.php' || $basePageName == 'asset_details.php' || $basePageName == 'ipaddress_master.php#' || $basePageName == 'my_points.php' || $basePageName == 'pm.php' || $basePageName == 'ticket_status1.php' || $basePageName == 'pm_verification.php' || $basePageName == 'id_card.php')
				$active = "active";
			else
				$active = ""; //echo $active;
			?>
			<li class='has-sub <?php echo $active; ?>' <?php if ($accessVal == 0) echo "style='display:none';";?>  >
				<a href='#'><i class="glyphicon glyphicon-star"></i>IT Dept</a>
				<ul>
					<!-- <li><a href='ticket_response.php'><i class="fa fa-star" style="font-size:15px;color:red;"></i>Take Ticket</a></li>
					<li style="display:none;"><a href='ticket_status.php'><i class="fa fa-list"></i>Tickets Status</a></li>
					<li><a href='onhold_tickets.php?tstsid=<?php echo str_encrypt("6,7,8,9")?>'><i class="fa fa-pause"></i>On-Hold Tickets</a></li>
					<li><a href='onhold_tickets.php?tstsid=<?php echo str_encrypt("10")?>'><i class="fa fa-close"></i>CloseAwaiting Tickets</a></li>
					 --><li><a href='task_master.php'><i class="fa fa-tasks"></i>Assigned Tasks</a></li> 
					<!-- <li><a href='ticket_status.php'><i class="fa fa-clipboard" style="font-size:15px;color:blue;"></i>Ticket Status</a></li>  -->
					<li><a href='pm.php'><i class="fa fa-cubes"></i>Preventive Maintenance</a></li> 
					<li><a href='pm_verification.php'><i class="fa fa-cube"></i>PM Verification</a></li> 
					<li><a href='asset_details.php'><i class="fa fa-database"></i>IT Asset Details</a></li> 
					<li><a href='asset_transfer.php'><i class="fa fa-list"></i>Asset Transfer</a></li> 
					<li><a href='ipaddress_master.php#'><i class="fa fa-hashtag"></i>IP Address</a></li>
					<li><a href='id_card.php?id=0'><i class="fa fa-user"></i>ID Card</a></li> 
					<li><a href='ipaddress_master.php#'><i class="fa fa-leanpub"></i>Downtime Register</a></li>
					<li><a href='ipaddress_master.php#'><i class="fa fa-database"></i>DataBackup Register</a></li>
					<!-- <li><a href='my_points.php'><i class="fa fa-circle" style="font-size:15px;color:green;"></i>My Points</a></li>  -->

<!-- 					<li><a href='incident/index.php' target="_blank"><i class="fa fa-list"></i>Incident</a></li> 
					<li><a href='incident/list_of_reporting.php'><i class="fa fa-list"></i>Incident</a></li> 
 -->				</ul>
			</li>
			<!--IT DEPT MODULE ENDS HERE-->


			<!-- QUALITY QI -->
			<?php   $accessVal = showname_fromid("access","access_master","userId='$login_id' and pageName='sidebar.php' and areaName='quality'"); 
				if ($accessVal==1)
				{ 				?>

			 <?php
			if (($basePageName == 'qi_entry.php') || ($basePageName == 'qiyearly.php') || ($basePageName == 'qiyearly.php') || ($basePageName == 'qimonthly.php')  )
				$active = "active";
			else
				$active = ""; //echo $active;
			?>
			<li class='has-sub <?php echo $active; ?>'><a href='#'><i class='fa fa-volume-up	'></i>Quality</a>
				<ul>
					<li><a href='qi_entry.php'><i class="fa fa-weixin"></i>QI-Entry</a></li>
					<li><a href='qi_yearly.php'><i class="fa fa-weixin"></i>QI-Yearly</a></li>
					<li><a href='qi_visuals.php'><i class="fa fa-weixin"></i>QI-Visuals</a></li>
				</ul>
			</li>
			<?php }?>


			<!-- QUALITY QI ENDS -->

			<li><a href='inpatient_list.php'><i class='fa fa-hotel'></i>In-Patient List</a></li>
			<li><a href='nurse_station.php'><i class='fa fa-hotel'></i>Nurse Station</a></li>
			<li><a href='nurse_docs.php'><i class='fa fa-hotel'></i>Nursing Doc Formats</a></li>

			<!--YOUR VOICE MODULE-->

			<?php   $accessVal = showname_fromid("access","access_master","userId='$login_id' and pageName='sidebar.php' and areaName='your_voice'"); 
				if ($accessVal==1)
				{ 				?>

			 <?php
			if (($basePageName == 'yourvoice.php') || ($basePageName == 'feedback_logs.php') || ($basePageName == 'download_upload_feedbacks.php')  )
				$active = "active";
			else
				$active = ""; //echo $active;
			?>
			<li class='has-sub <?php echo $active; ?>'><a href='#'><i class='fa fa-volume-up	'></i>Your Voice</a>
				<ul>
					<li><a href='yourvoice.php'><i class="fa fa-weixin"></i>Feedbacks</a></li>
					<?php
						$yvtAccess = showname_fromid("access","access_master","userId='$login_id' and pageName='yourvoice.php' and areaName='yvt_access'"); 
					if ($yvtAccess==1)
					{
					?>
					<li><a href='yourvoice2.php?scope=MQ=='><i class="fa fa-weixin"></i>Feedbacks(new)</a></li>
					<li><a href='feedback_logs.php'><i class="fa fa-weixin"></i>Feedback-Logs</a></li>
					<?php } ?>
				</ul>
			</li>
			<?php }?>




			

			<!--BILLING MODULE-->

			<?php   $accessVal = showname_fromid("access","access_master","userId='$login_id' and pageName='sidebar.php' and areaName='BILLING'"); 
					$online_payments_access = showname_fromid("access","access_master","userId='$login_id' and pageName='sidebar.php' and areaName='online_payments'"); 
				if ($accessVal==1)
				{ 				?>

			 <?php
			if ($basePageName == 'multi_sitting_procedures.php' || $basePageName == 'multi_sitting_procedures_slip.php' ) 
				$active = "active";
			else
				$active = ""; //echo $active;
			?>
			<li class='has-sub <?php echo $active; ?>'><a href='multi_sitting_procedures.php'><i class='fa fa-list-alt'></i>Billing</a>
				<ul>
					<li><a href='multi_sitting_procedures.php'><i class="fa fa-clipboard	"></i>Services</a></li>
					<li><a href='multi_sitting_procedures_slip.php'><i class="fa fa-bed"></i>Slip</a></li>
					<?= ($online_payments_access == 1) ? "<li><a href='online_payments.php'><i class='fa fa-cc-visa'></i>Online Receives</a></li>" : "..." ?>


				</ul>
			</li>
			<?php }?>




			
			

			<!--DIET MODULE-->

			<?php   $accessVal = showname_fromid("access","access_master","userId='$login_id' and pageName='sidebar.php' and areaName='diet'"); 
				if ($accessVal==1)
				{ 				?>

			 <?php
			if ($basePageName == 'diet_dashboard.php' || $basePageName == 'diet_master.php' || $basePageName == 'diet_handover.php' || $basePageName == 'diet_checklist.php' || $basePageName == 'diet_checklist_export.php#' || $basePageName == 'plan_diet.php' || $basePageName == 'add_fooditem.php' || $basePageName == 'diet_KOT.php'  || $basePageName == 'beds.php' || $basePageName == 'diet_update_sl.php' || $basePageName == 'diet_liquid_sticker.php' || $basePageName == 'diet_nutri_print.php') 
				$active = "active";
			else
				$active = ""; //echo $active;
			?>
			<li class='has-sub <?php echo $active; ?>'><a href='diet_dashboard.php'><i class='fa fa-cutlery'></i>Diet Module</a>
				<ul>
					<li><a href='diet_dashboard.php'><i class="fa fa-bullhorn"></i>Dashboard</a></li>
					<li><a href='beds.php'><i class="fa fa-coffee"></i>Beds</a></li>
					<li><a href='diet_update_sl.php'><i class="fa fa-coffee"></i>SL-Order#Beds</a></li>
					<li><a href='diet_checklist.php'><i class="fa fa-calendar-check-o"></i>Check List</a></li>
					<li><a href='diet_master.php'><i class="fa fa-cutlery"></i>Diet Master</a></li>
					<li><a href='add_fooditem.php'><i class="fa fa-coffee"></i>Add/Edit Food Item</a></li>
					<li><a href='diet_handover.php'><i class="fa fa-edit"></i>Diet Slips (Solid)</a></li>
					<li><a href='diet_nutri_print.php'><i class="fa fa-edit"></i>Diet Slips (EN)</a></li>
					<li><a href='liq_diet_print.php'><i class="fa fa-edit"></i>Diet Slips (Liquid)</a></li>
					<li><a href='update_diet_request.php'><i class="fa fa-cutlery"></i>update_diet_table</a></li>
					<li><a href='diet_KOT.php'><i class="fa fa-coffee"></i>Diet KOT</a></li>
				</ul>
			</li>
			<?php }?>

			<!--fNb MODULE-->

			<?php   $accessVal = showname_fromid("access","access_master","userId='$login_id' and pageName='sidebar.php' and areaName='F&B'"); 
				if ($accessVal==1)
				{ 				?>

			 <?php
			if ($basePageName == 'diet_checklist_export_fnb.php') 
				$active = "active";
			else
				$active = ""; //echo $active;
			?>
			<li class='has-sub <?php echo $active; ?>'><a href='#'><i class='fa fa-cutlery'></i>Food & Breverages</a>
				<ul>
					<li><a href='canteen_feedback.php'><i class="fa fa-calendar-check-o"></i>Shreehan Feedbacks</a></li>
					<li><a href='diet_checklist_export_fnb.php#'><i class="fa fa-calendar-check-o"></i>Diet Check List</a></li>
					
				</ul>
			</li>
			<?php }?>



			
			<!-- RADIOLOGY -->
			<?php   $accessVal = showname_fromid("access","access_master","userId='$login_id' and pageName='sidebar.php' and areaName='radiology'"); 
				if ($accessVal==1)
				{ 				?>

			 <?php
			if ($basePageName == 'pacs_sms.php')
				$active = "active";
			else
				$active = ""; //echo $active;
			?>
			<li class='has-sub <?php echo $active; ?>'><a href='pacs_sms.php'><i class='fa fa-fax'></i>Radiology</a>
				<ul>
					<li><a href='pacs_sms.php'><i class="fa fa-mobile"></i>PACS-SMS</a></li>
				</ul>
			</li>
			<?php }?>


<!-- PHARMACY -->
			<?php   $accessVal = showname_fromid("access","access_master","userId='$login_id' and pageName='sidebar.php' and areaName='pharmacy'"); 
				if ($accessVal==1)
				{ 				?>

			 <?php
			if ($basePageName == 'drug_orders.php')
				$active = "active";
			else
				$active = ""; //echo $active;
			?>
			<li class='has-sub <?php echo $active; ?>'><a href='drug_orders.php'><i class='fa fa-fax'></i>Pharmacy</a>
				<ul>
					<li><a href='drug_orders.php'><i class="fa fa-mobile"></i>IP Drug Orders</a></li>
				</ul>
			</li>
			<?php }?>


<!-- MRD -->
			<?php   $MRDAccessVal = showname_fromid("access","access_master","userId='$login_id' and pageName='sidebar.php' and areaName='MRD'"); 
				
			if ($basePageName == 'ICD.php' || $basePageName=='mrdreqfiles.php' || $basePageName=='mrdapprovefiles.php' || $basePageName=='mrdreturnfiles.php' || $basePageName=='mrdreceivereturnfiles.php')
				$active = "active";
			else
				$active = ""; //echo $active;
			?>
			<li class='has-sub <?php echo $active; ?>'><a href='ICD.php'><i class='fa fa-fax'></i>MRD</a>
				<ul>
					
					<li><a href='mrdreqfiles.php'><i class="fa fa-commenting"></i>Request Files</a></li>
					<?php 
					if ($MRDAccessVal==1)
						{ 		
					?>
					<li><a href='mrdapprovefiles.php'><i class="fa fa-commenting"></i>File Approval</a></li>
					<li><a href='ICD.php'><i class="fa fa-commenting"></i>Files Status</a></li>
					<li><a href='mrdreceivereturnfiles.php'><i class="fa fa-commenting"></i>ReceiveReturnFiles</a></li>
					<li><a href='ICD.php'><i class="fa fa-commenting"></i>ICD</a></li>
					<?php }?>
				</ul>
			</li>
				






			<!-- <?php
			if ($basePageName == 'inbox.php' || $basePageName == 'sent_mail.php')
				$active = "active";
			else
				$active = ""; //echo $active;
			?>
			<li class='has-sub <?php echo $active; ?>'><a href='#'><i class="glyphicon glyphicon-envelope"></i>Intra-Mail</a>
				<ul>
					<li><a href='inbox.php'><i class="fa fa-envelope-o"></i>Inbox</a></li>
					<li><a href='sent_mail.php'><i class="glyphicon glyphicon-send"></i>Sent Mail</a></li>
					<li><a href='draft.php'><i class="glyphicon glyphicon-edit"></i>Draft</a></li>
					<li><a href='deleted_items.php'><i class="glyphicon glyphicon-trash"></i>Deleted Items</a></li>
					<li><a href='calender.php'><i class="glyphicon glyphicon-calendar"></i>Calender</a></li>
				</ul>
			</li> -->
			<?php  	if ($adminAccess=="adminuser") 
			{ //echo $adminAccess;	
			if ($basePageName == 'common_settings.php' || $basePageName == 'asset_type_master.php' || $basePageName=='asset_master.php' || $basePageName=='dataport_master.php' || $basePageName=='task_master1.php' || $basePageName=='user_master.php' || $basePageName=='dept_master.php'  || $basePageName=='floor_master.php'  || $basePageName=='workarea_master.php' || $basePageName=='question_master.php' || $basePageName=='vendor_master.php' || $basePageName=='training_master.php#' || $basePageName=='access_master.php')
				$active = "active";
			else
				$active = ""; //echo $active;
			?>
			<li class='has-sub <?php echo $active; ?>'><a href='#'><i class="glyphicon glyphicon-th-large"></i>Master Modules</a>
				<ul>
					<li><a href='common_settings.php'><i class="fa fa-cogs"></i>Common Settings</a></li>
					<li><a href='access_master.php'><i class="fa fa-cog"></i>Access Master</a></li>
					<li><a href='asset_type_master.php'><i class="fa fa-cog"></i>Asset Type Master</a></li>
					<li><a href='asset_master.php'><i class="fa fa-cogs"></i>Asset Master</a></li>
					<li><a href='dataport_master.php'><i class="fa fa-cogs"></i>Data Port Master</a></li>
					<li><a href='task_master.php'><i class="fa fa-cogs"></i>Task Master</a></li>
					<li><a href='user_master.php'><i class="fa fa-cogs"></i>User Master</a></li>
					<li><a href='dept_master.php'><i class="fa fa-cogs"></i>Dept Master</a></li>
					<li><a href='lab_service_master.php'><i class="fa fa-cogs"></i>Service Master</a></li>
					<li><a href='subject_master.php'><i class="fa fa-cogs"></i>Subject Master</a></li>
					<li><a href='chapter_master.php'><i class="fa fa-cogs"></i>Chapter Master</a></li>
					<li><a href='question_master.php'><i class="fa fa-cogs"></i>Question Master</a></li>
					<li><a href='floor_master.php'><i class="fa fa-cogs"></i>Floor Master</a></li>
					<li><a href='workarea_master.php'><i class="fa fa-cogs"></i>Workarea Master</a></li>
					<li><a href='policies_master.php'><i class="fa fa-cogs"></i>Policy Master</a></li>
					<li><a href='licenses_master.php'><i class="fa fa-cogs"></i>Licenses Master</a></li>
					<!-- <li><a href='#'><i class="fa fa-cogs"></i>Event Master</a></li>
					<li><a href='#'><i class="fa fa-cogs"></i>Incident Master</a></li>
					<li><a href=#><i class="fa fa-cogs"></i>Service Request Master</a></li>
					<li><a href=#><i class="fa fa-cogs"></i>Problem Master</a></li>
					<li><a href=#><i class="fa fa-cogs"></i>Access Request Master</a></li>
					<li><a href=#><i class="fa fa-cogs"></i>Planned Outage Master</a></li>
					<li><a href=#><i class="fa fa-cogs"></i>Change Master</a></li>
					<li><a href=#><i class="fa fa-cogs"></i>SLA Master</a></li>
					<li><a href=#><i class="fa fa-cogs"></i>Release Master</a></li>
					<li><a href=#><i class="fa fa-cogs"></i>Project Master</a></li> 
					<li><a href=#><i class="fa fa-cogs"></i>Mgmt KPI Master</a></li> -->
					<li><a href='training_master.php#'><i class="fa fa-cogs"></i>Training Master</a></li>
					
					<li><a href="vendor_master.php"><i class="fa fa-cogs"></i>Vendor Master</a></li>
					
					<li><a href='ipaddress_master.php'><i class="fa fa-cogs"></i>IP Address Master</a></li>
				</ul>
			</li>
			<?php  	} 	

			  $accessVal = showname_fromid("access","access_master","userId='$login_id' and pageName='sidebar.php' and areaName='training'"); 
				//echo $pageName;
			if ($basePageName =='training_master.php' || 
				$basePageName=='assessment.php' || 
				$basePageName=='training_reports.php' || 
				$basePageName=='training_report.php' || 
				$basePageName=='training_calendar.php' || 
				$basePageName=='get_training_details.php' || 
				$basePageName=='training_report_emp_wise.php' || 
				$basePageName=='total_traininghr_dept_wise.php' || 
				$basePageName=='total_traininghr_emp_wise.php' || 
				$basePageName=='feedback.pdf' || 
				$basePageName=='1.pdf')
				$active = "active";
			else
				$active = ""; //echo $active;
			?>

			<!-- <li class='has-sub'  <?php echo $active; ?> <?php  if ($accessVal == 0) echo "style='display:none';" ;?>  ><a href='#'><i class="glyphicon glyphicon-envelope"></i>Training</a> -->

			<li class='has-sub <?php echo $active; ?>' <?php if ($accessVal == 0) echo "style='display:none';";?>  >
				<a href='#'><i class="glyphicon glyphicon-envelope"></i>Training</a>				
				<ul>
					<li><a href='training_master.php'><i class="fa fa-cogs"></i>Training Master</a></li>
					<li><a href='training_calendar.php'><i class="fa fa-calendar-check-o"></i>Training Calendar</a></li>
					<li><a href='assessment.php'><i class="fa fa-envelope-o"></i>Assessment</a></li>
					<li><a href='training_reports.php'><i class="fa fa-envelope-o"></i>Report</a></li>
				</ul>
			</li>

			<!-- <li class='has-sub' <?php if ($accessVal == 0) echo "style='display:none';";?>  ><a href='#'>
			<i class="glyphicon glyphicon-envelope"></i>Policies</a>
				<ul>
					<li><a href='SOPs.php'><i class="fa fa-envelope-o"></i>SOPs</a></li>
					<li><a href='policies.php'><i class="fa fa-envelope-o"></i>Policies</a></li>
				</ul>
			</li>

			<li class='has-sub' <?php if ($accessVal == 0) echo "style='display:none';";?>  ><a href='#'><i class="glyphicon glyphicon-envelope"></i>Reports</a>
				<ul>
					<li><a href='#'><i class="fa fa-envelope-o"></i>Asset Details</a></li>
					<li><a href='#'><i class="fa fa-list"></i>User-Assets Mapping</a></li> 
					<li><a href='#'><i class="fa fa-list"></i>IP Address Table</a></li> 
				</ul>
			</li> -->


			<!--
			<li><a href='manage_news.php'><i class="fa fa-newspaper-o"></i>News Details</a></li>

			<li><a href='manage_events.php'><i class="fa fa-calendar"></i>Event Details</a></li>
			
			
			
			<li><a href='manage_patient_speak_videos.php'><i class="fa fa-video-camera"></i>Patients Speak - Videos</a></li>
			
			<li><a href='manage_patient_speak_messages.php'><i class="fa fa-comments-o"></i>Patients Speak - Messages</a></li>

			<li><a href='manage_content.php'><i class="fa fa-newspaper-o"></i>Manage Content</a></li>
            
            <li><a href='manage_legaldocs.php'><i class="fa fa-file"></i>Legal Documents</a></li>
            
            <li><a href='manage_bmw.php'><i class="fa fa-medkit"></i>Bio Medical Waste</a></li>
        -->
        <li><a href='printer_meter.php'><i class="fa fa-print"></i>Printer Meter</a></li>
        <!-- <li><a href='hisFaqs.php'><i class="fa fa-question-circle"></i>HIS FAQs</a></li> -->
		<li><a href='profile.php'><i class="fa fa-odnoklassniki"></i>My Profile</a></li>
		<li><a href='insurance_report.php'><i class="fa fa-umbrella"></i>Dependent Details</a></li>
		<li><a href='discount_form.php'><i class="fa fa-umbrella"></i>Employee Discount Form</a></li>
		<li><a href='his_test.php' target="_blank"><i class="fa fa-copy"></i>Test MyModule</a></li>
		<li><a href='change_password.php'><i class="fa fa-key"></i>Change Password</a></li>
		<li><a href='logout.php'><i class="glyphicon glyphicon-log-out"></i> Logout</a></li>
		</ul>
	</div>
</div>
