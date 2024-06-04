<?php
// 保留支付 工银e企付取消支付
include_once '../DefaultIcbcClient.php';
include_once '../IcbcConstants.php';

$request = array(
    "serviceUrl" => 'https://apipcs3.dccnet.com.cn/api/mybank/pay/cpay/cppreservationcancel/V2',
    "method" => 'POST',
    "isNeedEncrypt" => false,
    "biz_content" => array(
        "agreeCode" => "0160200238060410006041000000001490", // 合作方协议编号
        "orderCode" => "204802090501", // 订单编号
        "partnerSeq" => "203012223215202215", // 合作方交易流水号
        "partnerSeqOrigin" => "20121892121523625506", // 原合作方支付流水号
        "payAmount" => "2", // 本次取消金额（单位：分）
        "orderCurr" => "1", // 交易币种
                             // "payeeAccno" => "1202020409900065243", // 收款人账号
                             // "payeeCompanyName" => "氮油货（饮豆）车巫褪辛乓忘嘴易", // 收款人户名
                             // "payerAccno" => "", // 付款人是他行的情况必须上送，且上送账号必须和付款时账号一致
                             // "payerAccname" => "", // 选输。付款人是他行的情况上送，上送则校验，不送不校验
                             // "payerBankCode" => "", // 付款人是他行的情况必须上送，且上送账号必须和付款时账号一致
        "submitTime" => "20220321163925", // 交易平台提交时间
        "orderRemark" => "测试取消支付" // 订单备注
                                  // "receiptRemark" => "", // 回单补充信息备注
                                  // "purpose" => "", // 用途
                                  // "summary" => "", // 摘要
                                  // "operType" => "303", // 业务种类 担保/保证支付必输,303-取消支付 805-保证取消支付 809-缴存金释放
                                  // "payerMemberNo" => "160290000612012", // 付款方会员编号,业务种类为取消支付时必须上送，operType为809时也要必输
                                  // "payerMemberName" => "取消支付", // 付款方会员名称,业务种类为取消支付时必须上送
                                  // "crmemberNo" => "", // 收款方会员编号,业务种类为取消支付/805时必须上送
                                  // "crmemberName" => "", // 收款方会员名称,业务种类为取消支付/805时必须上送
                                  // "enSummry" => "" // 英文备注
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
$resp = $client->execute($request, '2022020712345425111', ''); // 执行调用;msgId消息通讯唯一编号，要求每次调用独立生成，APP级唯一
echo $resp;
$respObj = json_decode($resp, true);
if ($respObj["return_code"] == 0) { // sucess
    echo $respObj["return_msg"];
} else { // fail
    echo $respObj["return_msg"];
}

// 正常返回示例：{"orderCurr":"1","transOk":0,"return_msg":"调用CPAS解保留支付服务完成","serialNo":"20121892121523615501","agreeCode":"0160200238060410006041000000001490","errorNo":"","errorName":"","payAmount":"3","partnerSeq":"203012223215202211","return_code":"0","status":"1"}
?>