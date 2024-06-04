<?php
// 保留支付 工银e企付确认支付
include_once '../DefaultIcbcClient.php';
include_once '../IcbcConstants.php';

$request = array(
    "serviceUrl" => 'https://apipcs3.dccnet.com.cn/api/mybank/pay/cpay/cppreservationpay/V2',
    "method" => 'POST',
    "isNeedEncrypt" => false,
    "biz_content" => array(
        "agreeCode" => "0160200238060410006041000000001490", // 合作方协议编号
        "orderCode" => "204802090501", // 订单编号
        "partnerSeq" => "201912223215202211", // 合作方交易流水号
        "partnerSeqOrigin" => "20121892121523625506", // 原合作方支付流水号
        "payAmount" => "1", // 本次解保留划拨金额（单位：分）
        "orderCurr" => "1", // 交易币种
        "payeeSysflag" => "1", // 收款方系统内外标志（1-境内工行，2-境内他行，3-境外）
        "payeeAccno" => "6222081202000000859", // 收款人账号
        "payeeCompanyName" => "总阵醉", // 收款人户名
                                                  // "payeeBankCode" => "", // 收方行联行号（收款方系统内外标志为2时必输）
        "submitTime" => "20220321163925", // 交易平台提交时间
        "orderRemark" => "测试确认支付" // 订单备注
                                  // "receiptRemark" => "", // 回单补充信息备注,当需要打印在回单信息中时上送
                                  // "purpose" => "", // 用途,打印到回单的用途栏
                                  // "summary" => "", // 摘要,打印到回单的摘要栏
                                  // "operType" => "302", // 担保/保证业务种类（担保支付/保证支付必输 ，302-担保支付，803-保证支付(农夫专用模式)，804-保证支付确认收货，810-保证支付缴存金支付）
                                  // "payerMemberNo" => "aliiiii", // 付款方会员编号（担保支付必输/保证支付必输，会员必须开立保证支付会员）
                                  // "payerMemberName" => "阿里ay", // 付款方会员名称（担保支付必输/保证支付必输）
                                  // "realpayerAccno" => "", // 真实付方账号（仅限分行使用）
                                  // "realpayerAccnoName" => "", // 真实付方户名（仅限分行使用）
                                  // "realpayerBankName" => "", // 真实付方行名，非必输（保证支付新增，仅限分行使用）
                                  // "realpayerBankNo" => "", // 真实付方行号，非必输（保证支付新增，仅限分行使用）
                                  // "note" => "", // 附言
                                  // "crmemberNo" => "T2O3", // 收款方会员编号（担保/保证支付必输）
                                  // "crmemberName" => "三氧化二疼", // 收款方会员名称（担保/保证支付必输）
                                  // "tradeName" => "王者币", // 商品名称（担保支付必输）
                                  // "tradeNum" => "10", // 商品数量（担保支付必输）
                                  // "tradeUnit" => "10", // 商品单位（担保支付必输）
                                  // "fundDealDirect" => "" // 资金到账方向（1-自有资金 3-结算账号 803-保证支付(农夫专用模式)，804-保证支付确认收货输入。不输入默认资金入到收方3-结算账号）
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

// 正常返回示例：{"orderCurr":"1","transOk":0,"return_msg":"调用CPAS解保留支付服务完成","serialNo":"20121892121523625503","agreeCode":"0160200238060410006041000000001490","errorNo":"","errorName":"","payAmount":"1","partnerSeq":"201912223215202209","return_code":"0","status":"1"}
?>