<html>
  <HEAD>
  <TITLE>���Ͷ���</TITLE>
  <meta http-equiv="Content-Type" content="text/html,charset=GBK">
  </HEAD>
  <BODY>
<?php
$action ="http://pre.netpay.sdo.com/PayGate/ibankpay.aspx";

$version="3.0";//ʢ�����ذ汾��
$amount="0.01";
$orderid="021011111123212312312";//��֤Ψһ��
$merid="875524";//�̻��ţ�ʢ���ṩ
$meruesr="";//�̻��û����Ǳ���
$paychannel="04";//��֧����������:04 12 13,��λ����
$postbackurl="http://your_domain/PostBack.php";//���Ե�ַ
$notifyurl="http://your_domain/Notify.php";//����֪ͨ��ַ
$backurl="http://your_domain/SendOrder.php";//���·��𶩵���ַ
$ordertime="20110211114912";//��������,14λ����,��ʽyyyyMMddHHmmss
$curtype="RMB";//�������ͣ�Ŀǰ��֧��"RMB"
$notifytype="http";//����֪ͨ��ʽ��http,https,tcp�ȵ�
$signtype="2";//ǩ����ʽ��
$prono="NO.1";//�̻���Ʒ���
$prodesc="desc";//��Ʒ����
$remark1="remark1";//��ע1
$remark2="remark2";//��ע2
$bank="SDTBNK";//���б���
$dfchannel="04";//��paychannelһ�£�Ҳ���Բ���
$producturl="http:www.sdo.com";//��Ʒչʾ��ַ

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
      echo "<input type=\"submit\" name=\"Submit\" value=\"�ύ\" id=\"Submit1\"/>";
  echo "</form>";
  ?>
  </BODY>
</html>

