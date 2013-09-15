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
<link rel="icon" href="images/logo-gmail.jpg" title="RESILIENCE INFORMATION SOLUTIONS" />
<title>Resilience - Supplier :<?php if(isset($_GET['supplierid'])){echo $dabasehandle->_getInfo("SELECT companyname FROM _suppliers WHERE supplierid='".$_GET['supplierid']."'","companyname"); }?></title>
<link rel="stylesheet" type="text/css" href="../css/style.css"/>
<link href="SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
<link href="SpryAssets/SpryValidationTextarea.css" rel="stylesheet" type="text/css" />
<link href="SpryAssets/SpryValidationSelect.css" rel="stylesheet" type="text/css" />
<script src="SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<script src="SpryAssets/SpryValidationTextarea.js" type="text/javascript"></script>
<script src="SpryAssets/SpryValidationSelect.js" type="text/javascript"></script>
<script language="javascript" type="text/javascript">
	function cal_balance()
	{
		//alert("testing");
		var tobepaid=0;
		var thispayment=0;
		var balance=0;
		
		tobepaid=parseInt(document.invoice.tobepaid.value);
		thispayment=parseFloat(document.invoice.thispayment.value);
		if(thispayment!="")
		{
			balance=parseFloat(tobepaid)-parseInt(thispayment);
		}else{
			balance=tobepaid;
		}
		document.invoice.balance.value=balance+".00";
		alert("Next Balance is :"+balance+".00");		
	}
</script>
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
        	<!-- right-colummn row start here !-->
        	<div class="main-text-container">
            	<!-- main-text-container row start here !-->
                <div class="row-container">
                    <?php
                    
                    if(isset($_POST['saveandprint']))
                    {
                        if(isset($_POST['invoiceid'])){$invoiceid=$_POST['invoiceid'];}
						
                        if(isset($_POST['customername'])){$customername=$_POST['customername'];}
                        if(isset($_POST['address'])){$address=$_POST['address'];}
                        if(isset($_POST['contactnumber'])){$contactnumber=$_POST['contactnumber'];}
                        
                        if(isset($_POST['invoicedate'])){$invoicedate=$_POST['invoicedate'];}
                        if(isset($_POST['tobepaid'])){$tobepaid=$_POST['tobepaid'];}
                        if(isset($_POST['thispayment'])){$thispayment=$_POST['thispayment'];}
                        if(isset($_POST['balance'])){$balance=$_POST['balance'];}
                        
                        $dabasehandle->_invisibleRecordInsertion("INSERT INTO _creditinvoice (invoiceid,invoicedate,customername,customeraddress,customertelnumber,tobepaid,thispayment,balance,status) VALUES('$invoiceid','$invoicedate','$customername','$address','$contactnumber','$tobepaid','$thispayment','$balance','A')");
						
						$dabasehandle->_invisibleRecordInsertion("INSERT INTO _transactions (transactiondate,description,amount,catagory,account) VALUES('$invoicedate','Credit payment for -$invoiceid','$thispayment','1','1')");
						
						$dabasehandle->_invisibleRecordInsertion("UPDATE _invoice SET balance='$balance' WHERE invoiceid='$invoiceid'");
						
						
                       header("location:printcreditinvoice.php?invoiceid=$invoiceid","_blank");
                    }
                    ?>
        		</div>
    			<!-- end of message row !-->
                    <form name="invoice" action="credit-invoice.php" method="post">
                    <div class="row-container">
                    <!-- 2nd row !-->
                        <div class="system-left-column">
                        <!-- stsrt of system-left-column !-->
                            <div class="row-container" >
                                <div class="system-text">
                                    Invoice ID
                                    <?php
                                        if(isset($_GET['invoiceid']))
                                        {
                                            $_SESSION['invoiceid']=$_GET['invoiceid'];
                                            //$_SESSION['customername']=$_GET['customername'];
                                            
                                            $invoid=$_GET['invoiceid'];
                                            $invoicedetails="SELECT * FROM _invoice WHERE paymentmode='3' AND invoiceid='".$invoid."'";
                                            $invoicedetailsrecord=mysql_query($invoicedetails);
                                            $invoicedetaildata=@mysql_fetch_array($invoicedetailsrecord);
											$_SESSION['customername']=$invoicedetaildata['customername'];
                                            
                                            $_SESSION['customeraddress']=$invoicedetaildata['customeraddress'];
                                            $_SESSION['customertelnumber']=$invoicedetaildata['customertelnumber'];
											
											$_SESSION['balance']=$invoicedetaildata['balance'];
										}
                                    ?>
                                </div>
                                <div class="system-textbox">
                                <table width="100%" border="0">
                                <tr>
                                    <td width="80%">
                                        <input type="text" name="invoiceid" class="s-textbox" value="<?php if(isset($_SESSION['invoiceid'])){ echo $_SESSION['invoiceid'];} ?>"  />
                                    </td>
                                    <td width="20%" style="padding-left:3%">
                                    <a href="#openModal"><input type="button" class="search-btn effect6" name="search" value="Search"/></a>
                                    <!-- model window !-->
                                    <div id="openModal" class="modalDialog">
                                    <div>
                                    <a href="#close" title="Close" class="close">X</a>
                                    <table width="100%" cellpadding="5px" cellspacing="0" border="1" bordercolor="#999999">
                                        <tr>
                                            <th>invoice ID</th>
                                            <th>Customer Name</th>
                                        </tr>
                                        <?php
                                        $invoicelistsql="SELECT * FROM  _invoice WHERE status='A' AND paymentmode='3'";
                                        $invoicelistrecord=mysql_query($invoicelistsql);
                                        $countinvoice=mysql_num_rows($invoicelistrecord);
                                        if($countinvoice>0)
                                        {
                                            while($invoicedata=mysql_fetch_array($invoicelistrecord))
                                            {
                                                
                                        ?>
                                        <tr>
                                            <td><a href="credit-invoice.php?invoiceid=<?php echo $invoicedata['invoiceid']; ?>&customername=<?php echo $invoicedata['customername']; ?>"><?php echo $invoicedata['invoiceid']; ?></a></td>
                                            <td><?php echo $invoicedata['customername']; ?></td>
                                        </tr>
                                        <?php
                                            }
                                        }
                                        ?>
                                        
                                    </table>
                                    <!-- end of model window!-->
                                    </div>
                                    </div>
                                    </td>
                                </tr>
                                </table>
                                </div>
                            </div> 
                            <div class="row-container" >
                                <div class="system-text">
                                    Customer Name
                                </div>
                                <div class="system-textbox">
                                  <input type="text" name="customername" class="s-textbox" value="<?php if(isset($_SESSION['customername'])){ echo $_SESSION['customername'];} ?>"  />
                                </div>
                            </div>
                            <div class="row-container" >
                                <div class="system-text">
                                    Adddress
                                </div>
                                <div class="system-textbox">
                                  <input type="text" name="address" class="s-textbox" value="<?php if(isset($_SESSION['customeraddress'])){ echo $_SESSION['customeraddress'];} ?>"  />
                                </div>
                            </div>
                            <div class="row-container">
                                <div class="system-text">
                                    Contact Number
                                </div>
                                <div class="system-textbox">
                                  <input type="text" name="contactnumber" class="s-textbox" value="<?php if(isset($_SESSION['customertelnumber'])){ echo $_SESSION['customertelnumber'];} ?>"  />
                                </div>
                            </div>
                       </div> 
                       <!-- end of system-left-column!-->       
                        
                        <div class="system-right-column">
                        <!-- start of system-right-column!-->
                            <div class="row-container" >
                                <div class="system-text">
                                    Invoice Date
                                </div>
                                <div class="system-textbox">
                                <?php
                                    $da=date('d');
                                    $mo=date('m');
                                    $yr=date('y');
                                    $ivid='RES'.$mo.$da.$yr;
                                ?>
                                    <input type="date" name="invoicedate" value="<?php echo date('Y'.'-'.'m'.'-'.'d'); ?>" class="s-textbox"/>
                                </div>
                            </div>
                            <div class="row-container" >
                                <div class="system-text">
                                    To be Paid (Rs. )
                              </div>
                                <div class="system-textbox">
                                    <input type="text" name="tobepaid" class="s-textbox" value="<?php echo $_SESSION['balance']; ?>" />
                                </div>
                            </div>
                            <div class="row-container" >
                                <div class="system-text">
                                    This Payment
                              </div>
                                <div class="system-textbox">
                                    <input type="text" name="thispayment" class="s-textbox" value="" onblur="cal_balance();" />
                              </div>
                            </div>
                            <div class="row-container" style="margin-bottom:2px;">
                                <div class="system-text">
                                    Balance
                              </div>
                                <div class="system-textbox">
                                    <input type="text" name="balance" class="s-textbox" value="" />
                                </div>
                            </div>
                            <div class="row-container" style="width:90%; padding:0% 5% 0% 5%;">
                                <table width="100%" border="0">
                                    <tr>
                                        <td width="50%"><input type="reset" name="clear" class="system-btn-left" value="Clear" onclick="location.reload();" /></td>
                                        <td width="50%"><input type="submit" name="saveandprint" class="system-btn-right" value="FINISH AND PRINT" /></td>
                                    </tr>
                                </table>
                            </div>
                        </div>  
                        <!-- end 0f sytem-right-column!-->
                    </div>
                    <!-- end fo 2nd row!-->
                    
                    <!-- 3rd row!-->
                </form>
                <!-- end of main-text-container!-->
            </div>
            <!-- end of right-column !-->
        </div>
        <!-- end of row container !-->
	</div>
<!-- end of main container!-->    
</div>
</body>
</html>
<?php
$dabasehandle->_closeHost();
?>