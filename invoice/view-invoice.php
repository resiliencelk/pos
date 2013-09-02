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
	function cal_total()
	{
		//alert("testing");
		var quantity=0;
		var salesprice=0;
		var totalprice=0;
		
		quantity=parseInt(document.invoice.quantity.value);
		salesprice=parseFloat(document.invoice.salesprice.value);
		if(salesprice!="")
		{
			totalprice=parseFloat(salesprice)*parseInt(quantity);
		}else{
			totalprice=salesprice;
		}
		document.invoice.totalprice.value=totalprice+".00";
		alert("Total price :"+totalprice+".00");		
	}
	function cal_grandtotal()
	{
		
		var discounts=0;
		var nettotal=0;
		var grandtotal=0;
		nettotal=parseInt(document.invoice.nettotal.value);
		discounts=parseInt(document.invoice.discouts.value);
		grandtotal=parseInt(nettotal)-parseInt(discounts);
		alert("Grand Total price :"+grandtotal+".00");
		document.invoice.grandtotal.value=grandtotal+".00";
				
	}
</script>
<style>
.invoice-menu:focus
{
	ba
}
</style>
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
                    if(isset($_POST['saveitems']))
                    {
                        echo "can save items";
                        if(isset($_POST['invoicenumber'])){$invoicenumber=$_POST['invoicenumber'];}
                        
                        if(isset($_POST['invoicenumber'])){$_SESSION['invoicenumber']=$_POST['invoicenumber'];}
                        
                        
                        if(isset($_POST['itemid'])){$itemid=$_POST['itemid'];}
                        if(isset($_POST['modelno'])){$modelno=$_POST['modelno'];}
                        if(isset($_POST['serialno'])){$serialno=$_POST['serialno'];}
                        if(isset($_POST['description'])){$description=$_POST['description'];}
                        if(isset($_POST['quantity'])){$quantity=$_POST['quantity'];}
                        if(isset($_POST['salesprice'])){$salesprice=$_POST['salesprice'];}
                        if(isset($_POST['totalprice'])){$totalprice=$_POST['totalprice'];}
                        
                        $dabasehandle->_invisibleRecordInsertion("INSERT INTO _invoiceitems (invoiceid,itemid,modelnumber,serialnumber,description,quantity,unitprice,total) VALUES('$invoicenumber','$itemid','$modelno','$serialno','$description','$quantity','$salesprice','$totalprice')");
						
						$availableitemquantity=$dabasehandle->_getInfo("SELECT quantity FROM _stockitems WHERE itemid='$itemid'",'quantity');
		echo "quantity is".$availableitemquantity;
		$actualitemquantity=($availableitemquantity-$quantity);
		$dabasehandle->_invisibleRecordInsertion("UPDATE _stockitems SET quantity='$actualitemquantity' WHERE itemid='$itemid'");
		
		
                        unset($_SESSION['catagory']);
                        unset($_SESSION['itemid']);
                        unset($_SESSION['modelnumber']);
                        unset($_SESSION['itemname']);
                        unset($_SESSION['warranty']);
                        unset($_SESSION['salesprice']);
                    }
                    
                    if(isset($_POST['saveandprint']))
                    {
                        if(isset($_POST['invoicenumber'])){$invoicenumber=$_POST['invoicenumber'];}
                        if(isset($_POST['invoicedate'])){$invoicedate=$_POST['invoicedate'];}
                        if(isset($_POST['pymode'])){$pymode=$_POST['pymode'];}
                        if(isset($_POST['status'])){$status=$_POST['status'];}
                        
                        if(isset($_POST['customerid'])){$customerid=$_POST['customerid'];}
                        if(isset($_POST['name'])){$name=$_POST['name'];}
                        if(isset($_POST['address'])){$address=$_POST['address'];}
                        if(isset($_POST['contactnumber'])){$contactnumber=$_POST['contactnumber'];}
                        
                        if(isset($_POST['nettotal'])){$nettotal=$_POST['nettotal'];}
                        if(isset($_POST['discouts'])){$discouts=$_POST['discouts'];}
                        if(isset($_POST['grandtotal'])){$grandtotal=$_POST['grandtotal'];}
                        if(isset($_POST['status'])){$status=$_POST['status'];}
                        
                        
                        $dabasehandle->_invisibleRecordInsertion("INSERT INTO _invoice (invoiceid,invoicedate,paymentmode,customerid,customername,customeraddress,customertelnumber,nettotal,discounts,vat,grandtotal,status) VALUES('$invoicenumber','$invoicedate','$pymode','$customerid','$name','$address','$contactnumber','$nettotal','$discouts','0','$grandtotal','$status')");
						
						echo $pymode;
						
						if($pymode=="1"||$pymode==1)
                        {
						$dabasehandle->_invisibleRecordInsertion("INSERT INTO  _transactions (transactiondate,description,amount,catagory,account) VALUES('$invoicedate','$invoicenumber','$grandtotal','1','$pymode')");
						}
						
						
                       header("location:printinvoice.php?invoiceid=$invoicenumber","_blank");
                    }
                    ?>
        		</div>
    			<!-- end of message row !-->
                    <div class="row-container">
                    <!-- 2nd row !-->
                    <table width="42%" border="0" cellspacing="0" cellpadding="0" align="left">
                      <tr>
                        <td width="32%" class="invoice-menu effect6" style="border:solid 1px #d2d2d2;"><a href="view-invoice.php?invoice=sales">Sales Invoice</a></td>
                        <td width="32%" class="invoice-menu effect6" style="border:solid 1px #d2d2d2;"><a href="view-invoice.php?invoice=service">Service Invoice</a></td>
                        <td width="32%" class="invoice-menu effect6" style="border:solid 1px #d2d2d2;"><a href="view-invoice.php?invoice=quotation">Quotation Invoice</a></td>
                      </tr>
                    </table>
                    </div>
                    <!-- end fo 2nd row!-->
                    
                    <!-- 3rd row!-->

                    <div class="row-container" style="margin-top:10px; background:#FFF;">
                    	<?php
							if(isset($_GET['invoice']) and ($_GET['invoice']=='sales'))
							{
						?>		
                        		<table border="0" width="100%" cellpadding="0" cellspacing="0" style="border:1px solid #CCC;">
                                	<tr style="background:url(../images/table-bg.jpg); background-repeat:repeat-x; height:30px;">
                                    	<th align="center"><div class="table-heading">Invoice ID</div></th>
                                        <th align="center"><div class="table-heading">Invoice Date</div></th>
                                        <th align="center"><div class="table-heading">Payment Mode</div></th>
                                        <th align="center"><div class="table-heading">Customer Name</div></th>
                                        <th align="center"><div class="table-heading">Contact Number</div></th>
                                        <th align="right"><div class="table-heading">Total Amount</div></th>
                                        <th align="right"><div class="table-heading">Discount</div></th>
                                        <th align="right"><div class="table-heading">Net Total</div></th>
                                        <th align="center"><div class="table-heading">Status</div></th>
                                        <th align="center" colspan="3"><div class="table-heading">Action</div></th>
                                    </tr>
                                    <?php
										$salesinvoice="SELECT * FROM _invoice WHERE type='1' ORDER BY id DESC";
										$salesinvoicerecord=mysql_query($salesinvoice);
										$countsalesinvoice=mysql_num_rows($salesinvoicerecord);
										if($countsalesinvoice>0)
										{
											while($salesinvoicedata=mysql_fetch_array($salesinvoicerecord))
											{
									?>
                                    	<tr class="border">
                                        	<td align="center"><?php echo $salesinvoicedata['invoiceid']; ?></td>
                                            <td align="center"><?php echo $salesinvoicedata['invoicedate']; ?></td>
                                            <td align="center"><?php if($salesinvoicedata['paymentmode']==1){ echo "cash";}elseif($salesinvoicedata['paymentmode']==2){ echo "Cheque";}elseif($salesinvoicedata['paymentmode']==3){ echo "Credit";} ?></td>
                                            <td align="center"><?php echo $salesinvoicedata['customername']; ?></td>
                                            <td align="center"><?php echo $salesinvoicedata['customertelnumber']; ?></td>
                                            <td align="right">Rs. <?php echo $salesinvoicedata['nettotal']; ?></td>
                                            <td align="right">Rs. <?php echo $salesinvoicedata['discounts']; ?></td>
                                            <td align="right">Rs. <?php echo $salesinvoicedata['grandtotal']; ?></td>
                                            <td align="center"><?php echo $salesinvoicedata['status']; ?></td>
                                            <td style="color:#06F;"><a href="printinvoice.php?invoiceid=<?php echo $salesinvoicedata['invoiceid'];?>"><img src="../images/printer.png" /> </a></td>
                                            <td style="color:#900;"><a href="deleteinvoice.php?invoiceid=<?php echo $salesinvoicedata['invoiceid'];?>"><img src="../images/delete.png" /></a></td>
                                        </tr>
                                    <?php
											}
										}
									?>
									
                                </table>
						<?php		
							}elseif(isset($_GET['invoice']) and ($_GET['invoice']=='service'))
							{
						?>
                        	<table border="0" width="100%" cellpadding="0" cellspacing="0">
                                	<tr style="background:url(../images/table-bg.jpg); background-repeat:repeat-x; height:30px;">
                                    	<th align="center"><div class="table-heading">Invoice ID</div></th>
                                        <th align="center"><div class="table-heading">Invoice Date</div></th>
                                        <th align="center"><div class="table-heading">Payment Mode</div></th>
                                        <th align="center"><div class="table-heading">Customer Name</div></th>
                                        <th align="center"><div class="table-heading">Contact Number</div></th>
                                        <th align="right"><div class="table-heading">TOTAL AMOUNT</div></th>
                                        <th align="right"><div class="table-heading">Discount</div></th>
                                        <th align="right"><div class="table-heading">Net Total</div></th>
                                        <th align="center"><div class="table-heading">Status</div></th>
                                        <th align="center" colspan="3"><div class="table-heading">Action</div></th>
                                    </tr>
                                    <?php
										$salesinvoice="SELECT * FROM _invoice WHERE type='2' ORDER BY id DESC";
										$salesinvoicerecord=mysql_query($salesinvoice);
										$countsalesinvoice=mysql_num_rows($salesinvoicerecord);
										if($countsalesinvoice>0)
										{
											while($salesinvoicedata=mysql_fetch_array($salesinvoicerecord))
											{
									?>
                                    	<tr>
                                        	<td align="center"><?php echo $salesinvoicedata['invoiceid']; ?></td>
                                            <td align="center"><?php echo $salesinvoicedata['invoicedate']; ?></td>
                                            <td align="center"><?php if($salesinvoicedata['paymentmode']==1){ echo "cash";}elseif($salesinvoicedata['paymentmode']==2){ echo "Cheque";}elseif($salesinvoicedata['paymentmode']==3){ echo "Credit";} ?></td>
                                            <td align="center"><?php echo $salesinvoicedata['customername']; ?></td>
                                            <td align="center"><?php echo $salesinvoicedata['customertelnumber']; ?></td>
                                            <td align="right">Rs. <?php echo $salesinvoicedata['nettotal']; ?></td>
                                            <td align="right">Rs. <?php echo $salesinvoicedata['discounts']; ?></td>
                                            <td align="right">Rs. <?php echo $salesinvoicedata['grandtotal']; ?></td>
                                            <td align="center"><?php echo $salesinvoicedata['status']; ?></td>
                                            <td><a href="printserviceinvoice.php?invoiceid=<?php echo $salesinvoicedata['invoiceid'];?>"><img src="../images/printer.png" /></a></td>
                                            <td><a href="deleteinvoice.php?invoiceid=<?php echo $salesinvoicedata['invoiceid'];?>"><img src="../images/delete.png" /></a></td>
                                        </tr>
                                    <?php
											}
										}
									?>
									
                                </table>
                        <?php
							}
							elseif(isset($_GET['invoice']) and ($_GET['invoice']=='quotation'))
							{
						?>
                        	<table border="0" width="100%" cellpadding="0" cellspacing="0">
                                	<tr style="background:url(../images/table-bg.jpg); background-repeat:repeat-x; height:30px;">
                                    	<th align="center"><div class="table-heading">Quotation ID</div></th>
                                        <th align="center"><div class="table-heading">Quotation Date</div></th>
                                        <th align="center"><div class="table-heading">Payment Mode</div></th>
                                        <th align="center"><div class="table-heading">Customer Name</div></th>
                                        <th align="center"><div class="table-heading">Contact Number</div></th>
                                        <th align="right"><div class="table-heading">Total Amount</div></th>
                                        <th align="center"><div class="table-heading">Status</div></th>
                                        <th align="center" colspan="3"><div class="table-heading">Action</div></th>
                                    </tr>
                                    <?php
										$salesinvoice="SELECT * FROM _quotation ORDER BY id DESC";
										$salesinvoicerecord=mysql_query($salesinvoice);
										$countsalesinvoice=mysql_num_rows($salesinvoicerecord);
										if($countsalesinvoice>0)
										{
											while($salesinvoicedata=mysql_fetch_array($salesinvoicerecord))
											{
									?>
                                    	<tr>
                                        	<td align="center"><?php echo $salesinvoicedata['quotationid']; ?></td>
                                            <td align="center"><?php echo $salesinvoicedata['quotationdate']; ?></td>
                                            <td align="center"><?php if($salesinvoicedata['paymentmode']==1){ echo "cash";}elseif($salesinvoicedata['paymentmode']==2){ echo "Cheque";}elseif($salesinvoicedata['paymentmode']==3){ echo "Credit";} ?></td>
                                            <td align="center"><?php echo $salesinvoicedata['customername']; ?></td>
                                            <td align="center"><?php echo $salesinvoicedata['customertelnumber']; ?></td>
                                            <td align="right">Rs. <?php echo $salesinvoicedata['nettotal']; ?></td>
                                            <td align="center"><?php echo $salesinvoicedata['status']; ?></td>
                                            <td><a href="printquotationinvoice.php?invoiceid=<?php echo $salesinvoicedata['quotationid'];?>"><img src="../images/printer.png" /></a></td>
                                            <td><a href="deletequotationinvoice.php?invoiceid=<?php echo $salesinvoicedata['quotationid'];?>"><img src="../images/delete.png" /></a></td>
                                        </tr>
                                    <?php
											}
										}
									?>
									
                                </table>
                        <?php
							}
						?>
                        
                    </div>
                
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