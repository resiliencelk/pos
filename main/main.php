<?php

	require_once("../includes/_handledatabase.inc");
	require_once("../includes/pathfiles.inc");
	if($_SESSION['permgrant']==false)
	{
		header("location:../index.php");
	}
	
	$dabasehandle=new _handledatabase();
	$dabasehandle->_connectHost();
	echo md5("832720860V");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="description" content="Web Designing, software development, and computer & accessories selling Company, Sri Lanka, Resilience Information Solutions (pvt) Limited is a software development, Web Designing, and computer selling Company company which is operating offices in Sri Lanka, France and Australia . It was founded in 2012 with the aim of supplying high quality software products and services, hardware and network services and accessories sales to its clients. Today, Resilience Information Solutions is an Application and Service provider for Financial, Logistics Management and Enterprise markets.">

<meta name="keywords" content="Web Designing , software development, and computer & accessories selling Company, Sri Lanka, Rapid Solutions (pvt) Limited, rapdsol.com, Resilience Information Solutions pvt ltd, Info, Software, Software Development, Hardware, Network, Hardware &amp; Network, Hardware &amp; network accessories sales, Web, Web Designing.">
<link rel="icon" href="images/logo-gmail.jpg" title="RESILIENCE INFORMATION SOLUTIONS" />
<title>Resilience POS System</title>
<link rel="stylesheet" type="text/css" href="../css/style.css"/>
</head>
<body>
<div id="main-container">
    <div class="row-container">
        <?php require("../header.php"); ?>
    </div>
    <div class="row-container">
    	<div id="left-column">
            <?php require("../menu.php"); ?>
        </div>
        <div id="right-column">
        <!-- start right-column!-->
            <div class="main-text-container">
                <div class="dash-left-column">
                	<div class="row-container">
                        <div class="system-heading" style="border-bottom:1px dashed #CCCCCC; margin-bottom:10px;">
                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                          <tr>
                            <td width="43%" align="right"><img src="../images/act.png" /></td>
                            <td width="57%">&nbsp;&nbsp;Activities</td>
                          </tr>
                        </table>
                        </div>
                    </div>
                    <div class="row-container" style="background:#e7ecf0; padding:2%; width:96%; box-shadow: 
0 10px 10px -10px #555;">
                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td width="48%" align="left">
                            <div class="drop-menu">
                                <a href="../dashboard/pricelist.php">
                                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                        <tr>
                                            <td width="15%"><img src="../images/price.png" /></td>
                                            <td width="85%">Price List</td>
                                        </tr>
                                    </table>
                                </a>	
                            </div>
                        </td>
                        <td width="48%" align="right">
                            <div class="drop-menu">
                                <a href="../dashboard/changeprice.php">
                                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                        <tr>
                                            <td width="15%"><img src="../images/chg-pr.png" /></td>
                                            <td width="85%">Change Price</td>
                                        </tr>
                                    </table>
                                </a>	
                            </div>
                        </td>
                      </tr>
                    </table>
                    </div>
                        <!-- end of row-container!-->
                    <div class="row-container">
                        <div class="reminder">
                        	<div class="system-heading" style="text-align:center; border-bottom:1px dashed #CCC; margin-bottom:3px;">
                            Cheque Reminders - <?php
								$today=date('Y'.'-'.'m'.'-'.'d');
								$day= date('d');
								$month=date('m');
								$year=date('Y');
								//echo $year;
								// But you must subtract 1 to get the correct timestamp 
								$ts = mktime(0,0,0,$month,$day+7,$year); 
								
								// So, this would then match Excel's representation: 
								$enddate=date("Y-m-d",$ts); 

								echo "Rs. ".number_format($dabasehandle->_getInfo("SELECT SUM(amount) AS amount FROM _issuecheque WHERE status='1' AND chequedate BETWEEN '$today' AND '$enddate' ORDER BY chequedate ASC","amount"),2,".",",");
        
                            ?>
                            </div>
                            <div class="reminder-text" id="style-3" style="overflow-y:scroll;">
                            	<table border="0" width="100%" cellpadding="0" cellspacing="0" align="center" style="padding:0%; margin-top:-3px;">
                                    
                            	<?php
								$today=date('Y'.'-'.'m'.'-'.'d');
								$day= date('d');
								$month=date('m');
								$year=date('Y');
								//echo $year;
								// But you must subtract 1 to get the correct timestamp 
								$ts = mktime(0,0,0,$month,$day+10,$year); 
								
								// So, this would then match Excel's representation: 
								$enddate=date("Y-m-d",$ts); 

								$sqlChequeReminders="SELECT * FROM _issuecheque WHERE status='1' AND chequedate BETWEEN '$today' AND '$enddate' ORDER BY chequedate ASC";
								//echo $sqlChequeReminders;
								$chequeReminderRecords=mysql_query($sqlChequeReminders);
								$countChequeReminders=mysql_num_rows($chequeReminderRecords);
								if($countChequeReminders>0)
								{
									while($reminderDatas=mysql_fetch_array($chequeReminderRecords))
									{
								?>
                                <div class="click">
                                		<tr>
                                        	<td align="center" style="padding:0%; margin:0%; border-bottom:solid 1px #CCCCCC; text-align:center;">
                                            	<a href="../cheque/issuecheque.php?chequeno=<?php echo $reminderDatas['chequeno'];?>&action=Edit"><?php echo $reminderDatas['chequeno'];?></a>
                                            </td>
                                            <td align="center" style="padding:0%; margin:0%; border-bottom:solid 1px #CCCCCC; text-align:center;">
                                            	<?php echo $reminderDatas['chequedate'];?>
                                            </td>
                                            <td align="center" style="padding:-5px 0% 0% 0%; margin:0%; border-bottom:solid 1px #CCCCCC; text-align:center;">
                                            	<?php echo $reminderDatas['payto'];?>
                                            </td>
                                            <td align="center" style="padding:0%; margin:0%; border-bottom:solid 1px #CCCCCC; text-align:right;">
                                            	<?php echo "Rs. ".number_format($reminderDatas['amount'],2,".",",");?>
                                            </td>
                                        </tr>
                                    
                                </div>
                               <?php
									}
								}
							   ?>
                               </table>
                            </div>
                            <!-- end of reminder!-->
                        </div>
                        <!-- end of row container!-->
                    </div>
                    <div class="row-container" style="margin-top:10px;box-shadow:0 10px 10px -10px #555;">
                    	<table width="100%" border="0" cellspacing="0" cellpadding="0">
                          <tr>
                            <td width="50%"><div class="over-due-ex">over due (Owing)<br/> <b>Rs. 50,000.00</b></div></td>
                            <td width="50%"><div class="over-due-in">over due (Payable)<br/><b> <?php
								$today=date('Y'.'-'.'m'.'-'.'d');
								$day= date('d');
								$month=date('m');
								$year=date('Y');
								//echo $year;
								// But you must subtract 1 to get the correct timestamp 
								$ts = mktime(0,0,0,$month,$day-7,$year); 
								
								// So, this would then match Excel's representation: 
								$lastdate=date("Y-m-d",$ts); 

								echo "Rs. ".number_format($dabasehandle->_getInfo("SELECT SUM(balance) AS balance FROM _invoice WHERE paymentmode=3 AND balance!=0 ORDER BY invoicedate ASC","balance"),2,".",",");
        
                            ?></b></div></td>
                          </tr>
                          <tr>
                            <td>
                            <div class="over-due-text" id="style-3" style="overflow-y:scroll;">
                                <div class="text">
                                	Display here
                                </div>
                                <div class="text">
                                	Display here
                                </div>
                                <div class="text">
                                	Display here
                                </div>
                                <div class="text">
                                	Display here
                                </div>
                            </div>
                            </td>
                            <td>
                            <div class="over-due-text" id="style-3" style="overflow-y:scroll;">
                                <table border="0" width="100%" cellpadding="0" cellspacing="0" align="center" style="padding:0%; margin-top:-1px;">
                                
<?php
								$today=date('Y'.'-'.'m'.'-'.'d');
								$day= date('d');
								$month=date('m');
								$year=date('Y');
								//echo $year;
								// But you must subtract 1 to get the correct timestamp 
								$ts = mktime(0,0,0,$month,$day-7,$year); 
								
								// So, this would then match Excel's representation: 
								$lastdate=date("Y-m-d",$ts); 

								$sqlOverdueIncome="SELECT * FROM _invoice WHERE paymentmode=3 AND balance!=0 ORDER BY invoicedate ASC";
                                //echo $sqlOverdueIncome;
								$overDueIncomeRecords=mysql_query($sqlOverdueIncome);
								$countOverdueIncome=mysql_num_rows($overDueIncomeRecords);
								if($countOverdueIncome>0)
								{
									while($overdueincomeDatas=mysql_fetch_array($overDueIncomeRecords))
									{
								?>
                                <div class="text">
                                		<tr>
                                        	<td align="center" style="padding:0%; margin:0% 2px 0% 0%; border-bottom:solid 1px #CCCCCC; text-align:center;">
                                            	<a href="../cheque/issuecheque.php?chequeno=<?php echo $overdueincomeDatas['invoiceid'];?>&action=Edit" title="<?php echo $overdueincomeDatas['customername'];?>"><?php echo $overdueincomeDatas['invoiceid'];?></a>
                                            </td>
                                                                                        <td align="center" style="padding:-5px 0% 0% 0%; margin:0%; border-bottom:solid 1px #CCCCCC; text-align:center;">
                                            	<?php echo $overdueincomeDatas['balance'];?>
                                            </td>
                                            
                                        </tr>
                                    
                                </div>
                               <?php
									}
								}
							   ?>
                               </table>
                                
                            </div>
                            </td>
                          </tr>
                        </table>
                            </div>
                            
                            </td>
                          </tr>
                        </table>
                    </div>
                    <!-- end of dash-left-colum!-->
                </div>
                <div class="dash-right-column">
                </div>
            </div>
        <!-- end of right-column!-->    
        </div>
    </div>
</div>
</body>
</html>
<?php
$dabasehandle->_closeHost();
?>