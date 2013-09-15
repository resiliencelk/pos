<?php

	require_once("../includes/_handledatabase.inc");
	require_once("../includes/pathfiles.inc");
	if($_SESSION['permgrant']==false)
	{
		header("location:../index.php");
	}
	
	$dabasehandle=new _handledatabase();
	$dabasehandle->_connectHost();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="description" content="Web Designing, software development, and computer & accessories selling Company, Sri Lanka, Resilience Information Solutions (pvt) Limited is a software development, Web Designing, and computer selling Company company which is operating offices in Sri Lanka, France and Australia . It was founded in 2012 with the aim of supplying high quality software products and services, hardware and network services and accessories sales to its clients. Today, Resilience Information Solutions is an Application and Service provider for Financial, Logistics Management and Enterprise markets.">

<meta name="keywords" content="Web Designing , software development, and computer & accessories selling Company, Sri Lanka, Rapid Solutions (pvt) Limited, rapdsol.com, Resilience Information Solutions pvt ltd, Info, Software, Software Development, Hardware, Network, Hardware &amp; Network, Hardware &amp; network accessories sales, Web, Web Designing.">
<link rel="icon" href="../account/images/logo-gmail.jpg" title="RESILIENCE INFORMATION SOLUTIONS" />
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
        	<div class="main-text-container">
                <div class="row-container" style="width:96%; margin:0% auto; background:#e7ecf0;">
                <table width="100%" border="0" cellspacing="5" cellpadding="5">
                <tr>
                	<th>
                    	SELECT MONTH
                    </th>
                    <th>
                    	<form name="filterbymonths" method="post" action="../account/transaction-report.php">
                        	<select name="month" onchange="document.filterbymonths.submit();">
                            	<option value="0" selected="selected">-ALL-</option>
                                <option value="01"<?php if(isset($_POST['month'])and($_POST['month']=="1")){ ?> selected="selected"<?php } ?>>January</option>
                                <option value="02"<?php if(isset($_POST['month'])and($_POST['month']=="2")){ ?> selected="selected"<?php } ?>>Februarry</option>
                                <option value="03"<?php if(isset($_POST['month'])and($_POST['month']=="3")){ ?> selected="selected"<?php } ?>>March</option>
                                <option value="04"<?php if(isset($_POST['month'])and($_POST['month']=="4")){ ?> selected="selected"<?php } ?>>April</option>
                                <option value="05"<?php if(isset($_POST['month'])and($_POST['month']=="5")){ ?> selected="selected"<?php } ?>>May</option>
                                <option value="06"<?php if(isset($_POST['month'])and($_POST['month']=="6")){ ?> selected="selected"<?php } ?>>June</option>
                                <option value="07"<?php if(isset($_POST['month'])and($_POST['month']=="7")){ ?> selected="selected"<?php } ?>>July</option>
                                <option value="08"<?php if(isset($_POST['month'])and($_POST['month']=="8")){ ?> selected="selected"<?php } ?>>August</option>
                                <option value="09"<?php if(isset($_POST['month'])and($_POST['month']=="9")){ ?> selected="selected"<?php } ?>>September</option>
                                <option value="10"<?php if(isset($_POST['month'])and($_POST['month']=="10")){ ?> selected="selected"<?php } ?>>October</option>
                                <option value="11"<?php if(isset($_POST['month'])and($_POST['month']=="11")){ ?> selected="selected"<?php } ?>>November</option>
                                <option value="12"<?php if(isset($_POST['month'])and($_POST['month']=="12")){ ?> selected="selected"<?php } ?>>December</option>
                            </select>
                        </form>
                    </th>
                </tr>
                  <tr>
                    <th width="15%" align="center">Date</th>
                    <th width="20%" align="center">Description</th>
                    <th width="20%" align="right">DEBBIT (Rs.)</th>
                    <th width="15%" align="right">CREDIT (Rs.)</th>
                  </tr>
                </table>
                </div>
                
                <!-- row for the entry retrieve !-->
                 <div class="row-container" style="width:96%; margin:0.5% auto; background:#e7ecf0;">
                <table width="100%" border="0" cellspacing="5" cellpadding="5">
                  <?php
				  	if(isset($_POST['month']) and ($_POST['month']!="0"))
					{
						$startdate=date('Y')."-".$_POST['month']."-".'01';
						$enddate=date('Y')."-".$_POST['month']."-".'31';
						$retrieveAllTransaction="SELECT * FROM _transactions WHERE transactiondate BETWEEN '$startdate' AND '$enddate' ORDER BY id DESC";
					}
					elseif(isset($_POST['month']) and ($_POST['month']=="0"))
					{
						$startdate=date('Y')."-".$_POST['month'].'01';
						$enddate=date('Y')."-".$_POST['month'].'31';
						$retrieveAllTransaction="SELECT * FROM _transactions ORDER BY id DESC";
					}
					elseif(!isset($_POST['month']))
					{
						$retrieveAllTransaction="SELECT * FROM _transactions ORDER BY id DESC";
					
					}
				  	$totalincome=0;
					$totalexpence=0;
				  	$allTransactionRecord=mysql_query($retrieveAllTransaction);
					$countAllTranction=mysql_num_rows($allTransactionRecord);
					if($countAllTranction>0)
					{
						while($allTransactionData=mysql_fetch_array($allTransactionRecord))
						{
							if($allTransactionData['catagory']==1)
							{
								$totalincome+=$allTransactionData['amount'];
							}
							elseif($allTransactionData['catagory']==2)
							{
								$totalexpence+=$allTransactionData['amount'];
							}
				?>
                		<tr style="color:#<?php if($allTransactionData['catagory']==1){?>060<?php }elseif($allTransactionData['catagory']==2){ ?>900<? } ?>">
                            <td><?php echo $allTransactionData['transactiondate']; ?></td>
                            <td><?php echo $allTransactionData['description']; ?></td>
                            <td style="text-align:right;"><?php if($allTransactionData['catagory']==2){echo number_format($allTransactionData['amount'],2,".",",");} ?></td>
                            
                            <td style="text-align:right;"><?php if($allTransactionData['catagory']==1){echo number_format($allTransactionData['amount'],2,".",",");} ?></td>
                            
                            
                      </tr>
                <?php
						}
					}
				  ?>
                  <tr>
                  	<th colspan="2" style="color:#060;text-align:right;">
                    	CARRIED FORWARD(Rs.)
                    </th>
                    <th align="left" style="color:#060; text-align:right;">
                    	<?php echo number_format(($totalincome-$totalexpence),2,".",","); ?>
                    </th>
                  </tr>
                  <tr>
                  	<th colspan="2" style="color:#060; border-top:solid 1px #000;border-bottom:solid 1px #000; text-align:right;">
                    	TOTAL(Rs.)
                    </th>
                    <th align="left" style="color:#060; border-top:solid 1px #000;border-bottom:solid 1px #000; text-align:right;">
                    	<?php echo number_format($totalincome,2,".",","); ?>
                    </th>
                    <th align="left" style="color:#060; border-top:solid 1px #000;border-bottom:solid 1px #000; text-align:right;">
                    	<?php echo number_format($totalincome,2,".",","); ?>
                    </th>
                  </tr>
                  <tr>
                  	<th colspan="2" style="color:#060;text-align:right; text-align:right;">
                    	BROUGHT FORWARD(Rs.)
                    </th>
                    <th></th>
                    <th align="left" style="color:#060; text-align:right;">
                    	<?php echo number_format(($totalincome-$totalexpence),2,".",","); ?>
                    </th>
                  </tr>
                  
                </table>
                </div>
                <!-- end row of the entry retrieve !-->
                </div>
			</div>
        </div>
    </div>  
<!-- end of main container!-->    
</div>
</body>
</html>
<?php
$dabasehandle->_closeHost();
?>