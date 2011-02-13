<?php
$amount=$_POST["Amount"];
$payamount=$_POST["PayAmount"];
$orderid=$_POST["OrderNo"];
$serialno=$_POST["serialno"];//注意大小写，客服端回调首字母大写，服务端回调首字母小写
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
   $md5key="your_md5_key";
   $mac2 =md5($signString."|".$md5key);
   $ok = (strtoupper($mac)==strtoupper($mac2));
}
if ($ok == 1) {
    echo "OK";//必须输出且只能输出"OK"
} elseif ($ok == 0) {
    echo "bad";
} else {
    echo "ugly, error checking signature";
}
?>