<?php
// 工行e企付支付申请查询
include_once '../DefaultIcbcClient.php';
include_once '../IcbcConstants.php';
$request = array(
    "serviceUrl" => 'https://apipcs3.dccnet.com.cn/api/mybank/pay/cpay/cporderquery/V2',
    "method" => 'POST',
    "isNeedEncrypt" => false,
    "biz_content" => array(
        "agreeCode" => "0160200238060410006041000000001490", // 合作方协议编号
        "partnerSeq" => "20121222121523835502", // 交易流水号
        "orderCode" => "204503399501" // 订单号
    )
);

$appId = "10000000000000225069";
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
$icbcPublicKey = "MIGfMA0GCSqGSIb3DQEBAQUAA4GNADCBiQKBgQCwFgHD4kzEVPdOj03ctKM7KV+16bWZ5BMNgvEeuEQwfQYkRVwI9HFOGkwNTMn5hiJXHnlXYCX+zp5r6R52MY0O7BsTCLT7aHaxsANsvI9ABGx3OaTVlPB59M6GPbJh0uXvio0m1r/lTW3Z60RU6Q3oid/rNhP3CiNgg0W6O3AGqwIDAQAB";
// 以下构造函数第1个参数为appid，第2个参数为RSA密钥对中私钥，第6个参数为API平台网关公钥
$client = new DefaultIcbcClient($appId, $privateKey, IcbcConstants::$SIGN_TYPE_RSA2, '', '', $icbcPublicKey, '', '', '', '');
$resp = $client->execute($request, '2022020715103425112', ''); // 执行调用;msgId消息通讯唯一编号，要求每次调用独立生成，APP级唯一
echo $resp;
$respObj = json_decode($resp, true);
if ($respObj["return_code"] == 0) { // sucess
    echo $respObj["return_msg"];
} else { // fail
    echo $respObj["return_msg"];
}

// 正常返回结果：{"orderCurr":"1","goodsList":[{"goodsNumber":"1","payeeCompanyName":"饮豆另增古技号午娇缝乓忘嘴易","payeeAccName":"饮豆另增古技号午娇缝乓忘嘴易","goodsName":"测试商品2","goodsAmt":"10"},{"goodsNumber":"1","payeeCompanyName":"饮豆另增古技号午娇缝乓忘嘴易","payeeAccName":"饮豆另增古技号午娇缝乓忘嘴易","goodsName":"测试商品","goodsAmt":"10"}],"sumPayamt":"20","payRemark":"","feeList":[],"czCardInfoList":[],"payerAccname":"","payerWalletName":"","payType":"101","applBrno":"","payeeList":[{"payeeSysflag":1,"mallName":"test","agentbic":"","rbankname":"","payeeAccCurr":1,"payeeCountry":"","payAmount":"20","payeeAcckind":"009","payeeBrno":"","payeeWalletName":"","payeeCompanyName":"饮豆另增古技号午娇缝乓忘嘴易","racpostcode":"","racaddress4":"","racaddress2":"","racaddress3":"","payeeBrnoZoneno":"","racaddress1":"","payeeAddress":"","payeeOrgcode":"","payeeAccno":"1602001009005410261","payeeWalletId":"","payeeBankCountry":"","payeeBankSign":""}],"isShowPayeeInfo":"1","expense":"0","reservDirect":0,"serialNo":"2022022508485531200000000002109002","agreeCode":"0160200010060410006041000000000881","payerAccno":"","payerWalletId":"","partnerSeqOrigin":"","payerSysFlag":"3","tppmBankCode":"102","bakchar8":"","transOk":0,"return_msg":"","agreeName":"测试1121","orderAmount":"20","partnerSeq":"201212221215202102","feeFlag":0,"applBrnoZoneno":"","enterpriseName":"","payPlanList":[{"errno":0,"instrSerialno":"","reservNumCNY":"","uniqueSeq":"","errmsg":"","payAmount":"20","payCurr":"1","appendFlag":0,"holdDateCNY":"9999-12-31","payeeAccno":"1602001009005410261","payPlanSubcode":1,"payEntity":"0","billno":"","status":0}],"payMode":"1","payerBankName":"","payChannel":"1","return_code":"0","payStatus":"0"}
?>