<?php
$amount=$_POST["Amount"];
$payamount=$_POST["PayAmount"];
$orderid=$_POST["OrderNo"];
$serialno=$_POST["serialno"];//×¢Òâ´óÐ¡Ð´
$status=$_POST["Status"];
$merid=$_POST["MerchantNo"];
$paychannel=$_POST["PayChannel"];
$discount=$_POST["Discount"];
$signtype=$_POST["SignType"];
$paytime=$_POST["PayTime"];
$ctype=$_POST["CurrencyType"];
$prono=$_POST["ProductNo"];
$prodesc=$_POST["ProductDesc"];
$remark1=$_POST["Remark1"];
$remark2=$_POST["Remark2"];
$ex=$_POST["ExInfo"];
$mac=$_POST["MAC"];

$signString=$amount."|".$payamount."|".$orderid."|".$serialno."|".$status."|".$merid."|".$paychannel."|".$discount."|".$signtype."|".$paytime."|".$ctype."|".$prono."|".$prodesc."|".$remark1."|".$remark2."|".$ex;

if($signtype=="2")//md5
{
     echo "md5<br/>";
   $md5key="your_md5_key";
   $mac2 =md5($signString."|".$md5key);
   $ok = (strtoupper($mac)==strtoupper($mac2));
}
echo $ok;
echo "<br/>";
if ($ok == 1) {
    echo "good";
} elseif ($ok == 0) {
    echo "bad";
} else {
    echo "ugly, error checking signature";
}
?>