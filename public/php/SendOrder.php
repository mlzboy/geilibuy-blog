<html>
  <HEAD>
  <TITLE>发送订单</TITLE>
  <meta http-equiv="Content-Type" content="text/html,charset=GBK">
  </HEAD>
  <BODY>
<?php
$action ="http://pre.netpay.sdo.com/PayGate/ibankpay.aspx";

$version="3.0";//盛大网关版本号
$amount="0.01";
$orderid="021011111123212312312";//保证唯一性
$merid="875524";//商户号，盛大提供
$meruesr="";//商户用户，非必需
$paychannel="04";//仅支持银行渠道:04 12 13,两位数字
$postbackurl="http://your_domain/PostBack.php";//回显地址
$notifyurl="http://your_domain/Notify.php";//发货通知地址
$backurl="http://your_domain/SendOrder.php";//重新发起订单地址
$ordertime="20110211114912";//订单日期,14位数字,格式yyyyMMddHHmmss
$curtype="RMB";//货币类型，目前仅支持"RMB"
$notifytype="http";//发货通知方式：http,https,tcp等等
$signtype="2";//签名方式。
$prono="NO.1";//商户产品编号
$prodesc="desc";//产品描述
$remark1="remark1";//备注1
$remark2="remark2";//备注2
$bank="SDTBNK";//银行编码
$dfchannel="04";//与paychannel一致，也可以不传
$producturl="http:www.sdo.com";//商品展示地址

$data=$version.$amount.$orderid.$merid.$meruesr.$paychannel.$postbackurl.$notifyurl.$backurl.$ordertime.$curtype.$notifytype.$signtype.$prono.$prodesc.$remark1.$remark2.$bank.$dfchannel.$producturl;
echo $data;
echo "<br/>";

$mac ="";
if($signtype=="2")//md5
{
    echo "md5<br/>";
    //keep secert
    $md5key="127a657d140c4b6dae6499bbcb09b2cb";
    $mac = md5($data.$md5key);
}

//print it
echo $mac;
echo "<br/>";

 echo "<form name=form1 action=".$action." METHOD=POST>";
 			echo "<input name=\"Version\" type=\"hidden\" id=\"Version\" value=\"".$version."\"/>";
      echo "<input name=\"OrderNo\" type=\"hidden\" id=\"OrderNo\" value=\"".$orderid."\"/>";
			echo "<input name=\"Amount\" type=\"hidden\" id=\"Amount\" value=\"".$amount."\"/>";
			echo "<input name=\"PostBackUrl\" type=\"hidden\" id=\"PostBackUrl\" value=\"".$postbackurl."\"/>";
			echo "<input name=\"NotifyUrl\" type=\"hidden\" id=\"NotifyUrl\" value=\"".$notifyurl."\"/>";
			echo "<input name=\"BackUrl\" type=\"hidden\" id=\"BackUrl\" value=\"".$backurl."\"/>";
			echo "<input name=\"MerchantNo\" type=\"hidden\" id=\"MerchantNo\" value=\"".$merid."\"/>";
			echo "<input name=\"MerchantUserId\" type=\"hidden\" id=\"MerchantUserId\" value=\"".$meruesr."\"/>";
			echo "<input name=\"PayChannel\" type=\"hidden\" id=\"PayChannel\" value=\"".$paychannel."\"/>";
			echo "<input name=\"ProductNo\" type=\"hidden\" id=\"ProductNo\" value=\"".$prono."\"/>";
			echo "<input name=\"ProductDesc\" type=\"hidden\" id=\"ProductDesc\" value=\"".$prodesc."\"/>";
			echo "<input name=\"OrderTime\" type=\"hidden\" id=\"OrderTime\" value=\"".$ordertime."\"/>";
			echo "<input name=\"CurrencyType\" type=\"hidden\" id=\"CurrencyType\" value=\"".$curtype."\"/>";
			echo "<input name=\"NotifyUrlType\" type=\"hidden\" id=\"NotifyUrlType\" value=\"".$notifytype."\"/>";
			echo "<input name=\"SignType\" type=\"hidden\" id=\"paymode\" value=\"".$signtype."\"/>";
			echo "<input name=\"Remark1\" type=\"hidden\" id=\"Remark1\" value=\"".$remark1."\"/>";
			echo "<input name=\"Remark2\" type=\"hidden\" id=\"Remark2\" value=\"".$remark2."\"/>";
			echo "<input name=\"BankCode\" type=\"hidden\" id=\"BankCode\" value=\"".$bank."\"/>";
			echo "<input name=\"DefaultChannel\" type=\"hidden\" id=\"DefaultChannel\" value=\"".$dfchannel."\"/>";
			echo "<input name=\"ProductUrl\" type=\"hidden\" id=\"ProductUrl\" value=\"".$producturl."\"/>";
			echo "<input name=\"MAC\" type=\"hidden\" id=\"MAC\" value=\"".$mac."\"/>";
      echo "<input type=\"submit\" name=\"Submit\" value=\"提交\" id=\"Submit1\"/>";
  echo "</form>";
  ?>
  </BODY>
</html>

