<?php
// 支付回调
include_once 'WebUtils.php';
include_once 'IcbcSignature.php';
include_once 'IcbcEncrypt.php';
$AES_KEY = "";//AES报文解密秘钥，如无特殊约定，e企付异步推送报文不使用加密，本字段可为空；若贵司要求异步通知加密，需提前将秘钥提供给工行
//$icbcPublicKey = "MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAt53rMPsEVSsfaHoUwJcraDyz9HaYbSTqOp/dV4QmKhMqmq9Kr0WFqSSTCKbbAMy/t3rEAkeLdu6JNyJOEjIkLA8uESP2aUne4vAeMCVx2/0kTvmAi7lgopKGTC+92CJdyNJQa0tIPMMYTkgcOsXYEgpnygR0AHmLGUH6TE6UTNmxHwKcY+MsMpLO9Yh5hDph9dgXACnNCHyhvhJff+oWXWPwSv40vr/9ExG+Q09F5uoKDJiNctEoS/EcG/nYN1dCymyK2mV8URQ/LMXra2yBZIg0ez4XyImniYWo0pMxdv1d0dHmKNemLJE7neW/oOUu55YgU1rpj1+3bXvqA2LIwQIDAQAB";
error_log("--------------------------**************************-------------------");
	

$params = array();
$from = $_POST['from'];
$api = $_POST['api'];
$appId = $_POST['app_id'];
$charset = $_POST['charset'];
$format = $_POST['format'];
$timestamp = $_POST['timestamp'];
$sign_type = $_POST['sign_type'];
$biz_content = htmlspecialchars_decode($_POST['biz_content']);
$sign = $_POST['sign'];
$params['from'] = $from;
$params['api'] = $api;
$params['app_id'] = $appId;
$params['charset'] = $charset;
$params['format'] = $format;
$params['timestamp'] = $timestamp;
$params['sign_type'] = $sign_type;
$params['biz_content'] = $biz_content;
error_log("from:".$from."--api:".$api."--appId:".$appId."--charset:".$charset."--format:".$format."--timestamp:".$timestamp."--sign_type:".$sign_type."--biz_content:".$biz_content."--sign:".$sign);

$path = "/epay/NotifyUrlServlet.php";
$signStr = WebUtils::buildOrderedSignStr($path,$params);
error_log("signStr:".$signStr);
$icbcPublicKey="MIGfMA0GCSqGSIb3DQEBAQUAA4GNADCBiQKBgQCwFgHD4kzEVPdOj03ctKM7KV+16bWZ5BMNgvEeuEQwfQYkRVwI9HFOGkwNTMn5hiJXHnlXYCX+zp5r6R52MY0O7BsTCLT7aHaxsANsvI9ABGx3OaTVlPB59M6GPbJh0uXvio0m1r/lTW3Z60RU6Q3oid/rNhP3CiNgg0W6O3AGqwIDAQAB";//网关公钥
$passed = IcbcSignature::verify($signStr, $sign_type, $icbcPublicKey, $charset, $sign,'');
error_log("passed:".$passed);
$responseBizContent = "";
if(!$passed){
		$responseBizContent = "{\"return_code\":-12345,\"return_msg\":\"icbc sign not pass.\"}";
}else{
	/**********合作方/分行 业务逻辑处理**********/
	$respMap = json_decode($biz_content,true);
	$msg_id = $respMap["msg_id"];
	//$msg_id = time();
	$return_code = 0;
	$eturn_msg = "success.";
	$responseBizContent = "{\"return_code\":".$return_code.",\"return_msg\":\"".$eturn_msg."\",\"msg_id\":\"".$msg_id."\"}";
	
	error_log("responseBizContent======:".$responseBizContent."=====!");
}

/**********商户对消息返回响应进行签名，签名方式需与在API平台登记APP的sign_type保持一致,e企付一般为RSA签名**********/
/*1、商户以CA证书签名为例，如下：
 signStr = "\"response_biz_content\":"+responseBizContent+","+"\"sign_type\":"+"\"CA\","+"\"ca\":\""+cert+"\"";
 sign = IcbcSignature.sign(signStr, "CA", CertPriKey,
 charset,"12345678");
 results = "{"+signStr+",\"sign\":\""+sign+"\"}";
 */
//2、商户以RSA签名为例，如下：其中，MY_PRIVATE_KEY为商户私钥；
//$privateKey="MIIEvQIBADANBgkqhkiG9w0BAQEFAASCBKcwggSjAgEAAoIBAQC3nesw+wRVKx9oehTAlytoPLP0dphtJOo6n91XhCYqEyqar0qvRYWpJJMIptsAzL+3esQCR4t27ok3Ik4SMiQsDy4RI/ZpSd7i8B4wJXHb/SRO+YCLuWCikoZML73YIl3I0lBrS0g8wxhOSBw6xdgSCmfKBHQAeYsZQfpMTpRM2bEfApxj4ywyks71iHmEOmH12BcAKc0IfKG+El9/6hZdY/BK/jS+v/0TEb5DT0Xm6goMmI1y0ShL8Rwb+dg3V0LKbIraZXxRFD8sxetrbIFkiDR7PhfIiaeJhajSkzF2/V3R0eYo16YskTud5b+g5S7nliBTWumPX7dte+oDYsjBAgMBAAECggEAa3ra4u7sWFZHqkZbw2g5lmiCBgUtsCW9nddaHxJRrKtPcwBMvU/6r0mjb5sL8unnByWrepIahuGWHFnOTURgfBHeq1XbtUHyX/CiGxiwD0+cY0YVArTeZgtS5WHExLFJKHZDcKq+fCLPJXN8YsLQea7xlgUJSgXbcEt4khYlJN4BPsh/aZ1OmVEUlsa4jEPDsK2T3D4xl4gNd8giuSSvBs6HwBq/ICiQ2muCpk3Kn5JrkwwTYJWant4NFcBpFzLNxjwPsipZ0AngikvpcASqvA8X/rWPXZ0pXAT5Spzd93d7TqL0FUKoLjtRamUQ6/liugjZsb7EsS1+GK8QEAa2aQKBgQDx/4WwwNmapDd5hgr9/j49VJm7yOSKcQXS8BFMNiC3xx4RZFqzKTnmuvzH+NFexL2Ay87A8EOnVv8xajbmC+1FSVilt5HEzezJ3GjQX6li0EJNOQcLGbIVCB/3h9oU/tw9uf1/JmF1sbKkW6IL+r5gs8jGKczc8ABOnQm89Ov93wKBgQDCPaciXsqtog7zvWKbaj+tSDofMpy8BTOkMLfF1GhhCGbz+/aRHQiEKoqC4nqxibx1JLWhIRplJx+dmyfkwki1+SGFuFkWxv8l2PL9NBurMYlX0x8UIseriSLRUCCcGZl6s7PD6diA9CO3BokU5fkCQfqgHvRjPfEUE2yvgvzNXwKBgBxgj0fDxYCZwxuP+VgBaUD9260miI4nZLxwhEbAjiOeyMrXTr91lSGWSbAVYE/RmDszKwJ66iQEUpZz0w401dTrHecI2KIQV7TwEKZmoVFCBJRTnJzTnYtT0ZPQLWWK4T6nwa8YTBNmDAGz8ROgipSCYIfEPQ6nYhHV3l93BPlXAoGBALttTkbF/QBKbe8XgXzBqywDk8HizoZG5qu6Lrn/2bA3sVAggq1HvJ37hqgA7a8+XtESWQhfrt6IP+OOgZIlPpAJEyW62ow1/KGClAVrMH+iTwqlt0lwvgZxT1112eGGeiiCGiYjETxtV8EV11SJDBv3mmTDOcJBVMywaaF53YI1AoGAX7W6OM5zyNhTuDFxTbaZsrVwuHJCytcg35sVsYVhyHRD5xZhiwwbh6gxX1hOVUzUZAwlLaJ2ehx2YKsjDIsG4lSBfVTHzo8Z+RC6QR0auPC30iUwRkD0rgO9RT2QVqqYtedtaTQsY8NiHiAuzC9MEaK5vjPE88Q50pwtR63DY7Y=";
$privateKey = "MIIEvQIBADANBgkqhkiG9w0BAQEFAASCBKcwggSjAgEAAoIBAQDPUsAxVOs46x7u
			mfJDcw98UfPhD+/ZoFcJs4WqhoqWeLbSNHDOTFc+7r5qsWoTPiuaJdcxQbIF0bOT
			lvIXXFNivTZy35aAQUpzILsPIVd0+Z+pCR2mosZkl8qhRk+5mGtc3OlzGvkGGnxx
			O2fKxtwIRdEUaAnqg/k+8kSN3k8p9sXbJD9+r3imIvkswuGTEoEk0ARg3YSmlSTT
			P0UqksT5/MQN3rZYDlE0baPCB2pKcTDncsNhvgwjGmI7fMyBB1tV0jGfaGq1IcGy
			fY5WUcIaiveYUq5Gta6+9J/B333hztCCWdtbM+YoI4UpMcV5B1056P3X1hPRbCri
			Id5uI4sXAgMBAAECggEAdluBiSg3mSjxYbnVSphXUNvgZK4aeZ1F0y3/sxhX6gtE
			I8D4XW3LqQvW/UYHjrDBZ6EOtvoQTa4n3KwhzSBSIl5uxSnL27BqdktLPxoDua4A
			bhncKZNnu2nErklbnlLbiAo95A6T994LCQGnAWaBmt9wuzuh3ZY2Jq9cX7l4bDWD
			3OaKLER56n8KgMM0hyUffm2+ediCVy0CfL/50gscWLQKrDx52uohtgORw4OiAzx/
			YwgnnvSAgXQK21ChDcN5GQA5hZOeFMRY0vshSiA6/Zz8GvHfa4u/fEWVpZhsJrow
			97Fk3he8NHc9M6mLIxKeGFLknpkNHgDZXqCD5vvVwQKBgQDauoRR8EAjU+jjZDUi
			5qyPXSUELthqMbn4oHT33pgjSvQgoLfMtn95FHgFZJjEZfAnKgNSjFddPqB6vy0d
			PLXRSyqG0b+ap+f2e2kuNnbngijCO9WWDdpU1k7e/Lvo5Ohgz0ODAxRqrst+QqmW
			5C6nt+g0Il4ctdoUQ3oBeWTc8QKBgQDyprRvGqThXSsJ64wpiPUKieZ+562FFwZE
			pBU1Sy3PS9EfroQa2/NlL5eiLPOOpmY5tUhIyNZzL7YE4n+iI/pZFpC23+gz4Qjt
			sQnBGXQn+D7H181B119jUt/mYZwM3zAy9DJal4+q52LvmluT95/eTyhYD46vEGr3
			0axSGcOIhwKBgDRx+Hw1IQvXeMXdJyiBKusNKG0CVn3QAols3973Dn+X30Vbg/af
			45zCnaydXEvrLVQWrMlEQUZoV85WvJiAEBBo939wF4Mbs3DUUnn0MTp9aQx5kFL0
			a19gK3UoIF5NVLKxv7xQJrsVwlE55rP5bn5kiFbHzs0PhYTKURy9YMPhAoGAVkeO
			at8Xd4bQUeOuX+px7wBftAoe+e7Y7LlHTT7hGA+GWXSNRpuk7PrCOQkwxS1HtgdO
			n4rCLgzt9Miwx29xihHq/Quani/LI/FKXZ32Xmv3rsl+E4ZIRaHnORzGBxGpKsUH
			zoyLqiJCXJ4PKArpjnupBb7qZjc5QcsNMdg1XasCgYEAv6SkwgcRCVliGtphJVxg
			xODkI+YOufnDGpD5OGECY0/O5FQ8u4PzvQ5FuOBElJzpbKmDqKqMX2UsgpvPzyT2
			2JtW0Xpo/UiApIyuUuF5CxIvxfsD3VSjC7MrmqBCEU/iRdQv11alFRg4KOXZXst6
			oclGtrgSiI3n3kJ2Xy3oO38=";
$signStr = "\"response_biz_content\":".$responseBizContent.","."\"sign_type\":"."\"RSA2\"";
$sign = IcbcSignature::sign($signStr, IcbcConstants::$SIGN_TYPE_RSA2, $privateKey,$charset,"");
$results = "{".$signStr.",\"sign\":\"".$sign."\"}";
error_log("results======:".$results."=====!");
echo $results

?>