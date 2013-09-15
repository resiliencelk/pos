<style>
/***************model window***********************/
.modalwindow {
	position: fixed;
	font-family: Arial, Helvetica, sans-serif;
	top: 0;
	right: 0;
	bottom: 0;
	left: 0;
	background: rgba(0,0,0,0.8);
	z-index: 99999;
	opacity:0;
	-webkit-transition: opacity 400ms ease-in;
	-moz-transition: opacity 400ms ease-in;
	transition: opacity 400ms ease-in;
	pointer-events: none;
}
.close {
	background: #606061;
	color: #FFFFFF;
	line-height: 25px;
	position: absolute;
	right: 8px;
	text-align: center;
	top: 2px;
	width: 24px;
	text-decoration: none;
	font-weight: bold;
	-webkit-border-radius: 12px;
	-moz-border-radius: 12px;
	border-radius: 12px;
	-moz-box-shadow: 1px 1px 3px #000;
	-webkit-box-shadow: 1px 1px 3px #000;
	box-shadow: 1px 1px 3px #000;
	z-index:100520;
}

.close:hover { background: #00d9ff; }
.modalwindow:target {
	opacity:1;
	pointer-events: auto;
}

.modalwindow > div {
	width: 500px;
	min-height:300px;
	max-height:550px;
	overflow-y:scroll;
	overflow-x:hidden;
	position: relative;
	margin: 10% auto;
	padding: 5px 20px 13px 20px;
	background: #fff;
	border-radius:3px;
	background: -moz-linear-gradient(#b6c2c9, #404350);
	background: -webkit-linear-gradient(#b6c2c9, #404350);
	background: -o-linear-gradient(#b6c2c9, #404350);
}
.window-heading
{
	width:100%;
	text-align:center;
	font-size:16px;
}
/**********************************/
</style>
<div id="openModal<?php echo $cus; ?>" class="modalwindow">
<div>
<a href="#close" title="Close" class="close">X</a>
<div style="font-size:24px; color:#333; width:100%; text-align:center;" id="style-3">INVOICE</div>
<table width="100%" border="1"  bordercolor="#CCCCCC" cellpadding="5px" cellspacing="0" style="color:#FFF;">
    <tr>
        <td width="25%"><div class="window-heading">Invoice Number</div></td>
        <td width="25%"><div class="window-heading">Date</div></td>
        <td width="25%"><div class="window-heading">Net Amount</div></td>
        <td width="25%"><div class="window-heading">Balance</div></td>
        <td width="25%"><div class="window-heading">Action</div></td>
    </tr>
    <tr>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
</table>
</div>
