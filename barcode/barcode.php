<!-- <!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>add product</title>
	<script type="text/javascript" src="barcodescanner.js"></script>
	<script type="text/javascript" src="http://ajax.microsoft.com/ajax/jquery/jquery-1.3.2.min.js"></script>
<script type="text/javascript">
if (typeof jQuery == 'undefined')
{
    document.write(unescape("%3Cscript src='/scripts/jquery-1.3.2.min.js' type='text/javascript'%3E%3C/script%3E")); //local
}
</script>

	<script type="text/javascript">
		function generateBarcode(value){
			JsBarcode('#barcode',value,{
				format:'code128',
				displayValue:true,
			});
		}
	</script>
</head>
<body onload="document.pos.barcode.focus();">


	<input type='text' required name='code' class='form-control autocomplete_txt' data-field-name='code'  id="code" autofocus ></td>
                  <td><input type='text' required name='pname[]' class='form-control ' id="name" >







	<input type="text" onchange="generateBarcode(this.value)" name="">
	<svg id="barcode"></svg>
	<h1>read:
	<p id="last-barcode"></p>
	<p id="#product_list"></p>
</h1>


-->
<!---
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jsbarcode/3.11.5/JsBarcode.all.min.js"></script>
</html> -->

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>barcode generator</title>
</head>
<body>

       <?php 
              
			  $TSCObj  = new COM ("TSCActiveX.TSCLIB") or die("Unable to open COM object");
			  $TSCObj->ActiveXopenport("TSC TTP-244 Plus");			  
			  //$TSCObj->ActiveXdownloadpcx("C:/xampp/htdocs/pradit/tsc/logo.pcx","logo.pcx");
			  $TSCObj->ActiveXsetup("104", "52", "3", "10", "0", "2", "0");
			  //$TSCObj->ActiveXformfeed();
			  //$TSCObj->ActiveXsendcommand("HOME");
			  //$TSCObj->ActiveXsendcommand("SET TEAR OFF");
			  $TSCObj->ActiveXclearbuffer();
			  //$TSCObj->ActiveXsendcommand("PUTPCX 300,250,\"logo.pcx\"");
			  
			  // print product name
			  $name1 = iconv("UTF-8", "TIS-620", $_GET['name']);
			  $TSCObj->ActiveXwindowsfont(60, 50, 54, 0, 2, 0, "Angsana New", $name1);
			  $TSCObj->ActiveXwindowsfont(450, 50, 54, 0, 2, 0, "Angsana New", $name1);
			  
			  // print product price + vat
			  $price1 = "ÃÒ¤Ò ".number_format($_GET['price'], 2, '.', ',')." ºÒ·";
			  $TSCObj->ActiveXwindowsfont(60, 330, 54, 0, 2, 0, "Angsana New", $price1);
			  $TSCObj->ActiveXwindowsfont(450, 330, 54, 0, 2, 0, "Angsana New", $price1);
			  
			  // print barcode
			  $TSCObj->ActiveXbarcode("60", "110", "128", "200", "1", "0", "2", "2", $_GET['bc']);	
			  $TSCObj->ActiveXbarcode("450", "110", "128", "200", "1", "0", "2", "2", $_GET['bc']);	
			 
			  // print number of copies
			  $copy = ceil($_GET["copy"]/2);
			  if ($copy > 0) {
				for ($i=0; $i<$copy; $i++) {
					$TSCObj->ActiveXprintlabel("1","1");
				}
				echo "Printing....";
			  }else{
				echo "Error!!!";
			  }
			  //$TSCObj->ActiveXformfeed();
		      $TSCObj->ActiveXcloseport();
			  
       ?>
</body>
</html>