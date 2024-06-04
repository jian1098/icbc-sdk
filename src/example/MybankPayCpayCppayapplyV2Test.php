<?php
// 保留支付 工行e企付支付申请
include_once '../DefaultIcbcClient.php';
include_once '../IcbcConstants.php';
$request = array(
    "serviceUrl" => 'https://apipcs3.dccnet.com.cn/api/mybank/pay/cpay/cppayapply/V2',
    "method" => 'POST',
    "isNeedEncrypt" => false,
    "biz_content" => array(
        "agreeCode" => "0160200238060410006041000000001490", // 合作方协议编号
        "partnerSeq" => "20121892121523625506", // 交易流水号
        "payChannel" => "1", // 渠道类型；1-PC端 2-移动端
        "internationalFlag" => "1", // 境内外标志 1-境内 2-境外
        "payMode" => "2", // 支付方式：保留支付
        "reservDirect" => "1", // 保留支付时上送，1-付方保留，2-收方保留，境内外币只支持付方保留
                                // "operType" => "", // 操作类型
        "payEntitys" => "1001", // 1000第一位1代表现金第二位1代表票据
        "asynFlag" => "0", // 0代表同步支付 1:代表异步支付
                            // "logonId"=>"001",//企网登录ID 当异步支付需要指定提交人时才上送(预留字段，本期暂不支持)
                            // "payerAccno" => "1202027209100017281", // 付款人账号 异步支付、安心账户退款时必须送账号；保证支付， 如果是采用平台方验证，必须上送付方保证金主账号；其他场景如果送，则为指定账号支付。
                            // "payerAccname" => "埋赏冒了神饥祺铜搭洪坏检苹职悟", // 付款人户名 付款人账号输入，付款人户名必须同时输入。付款人户名可单独输入，单独输入时，开启户名校验。
                            // "payerFeeAccno"=>"",//付方付费账号 境外支付时上送。上送时，则取该账号付手续费;若不上送，则取付方账号付手续费。付方付费账号、付方付费账号户名、付方付费账号币种同时上送或者都不上送.
                            // "payerFeeAccName"=>"",//付方付费账号户名
                            // "payerFeeCurr"=>"",//付方付费账号币种
        "payMemno" => "160290000612012", // 付款人会员号
                                          // "orgcode" =>"",//付款人组织机构代码 境内外币、境外必须上送。统一社会信用证的第九-十七位。
        "orderCode" => "207802999502", // 订单编号
        "orderAmount" => "20", // 订单金额 单位分 仅用于展现，本次应支持金额以sumPayamt为准
        "orderCurr" => "001", // 币种 001人民币
        "sumPayamt" => "20", // 订单汇总金额 单位分
                              // "orderRemark" => "测试", // 订单备注 当需要打印在回单信息中时上送
                              // "rceiptRemark" => "测试", // 回单补充信息备注 当需要打印在回单信息中时上送
                              // "purpose" => "", // 用途 当需要打印在回单信息中时上送
                              // "summary" => "", // 摘要 当需要打印在回单信息中时上送
        "submitTime" => "20220325085915", // 交易平台提交时间
        "returnUrl" => "", // 支付成功后跳转连接
        "callbackUrl" => "https://gyj1.dccnet.com.cn/epay/NotifyUrlServlet.php", // 回调通知地址
                                                                                  // "agreementId"=>"",//合同号 境内外币必须上送，境外支付时上送，三单号不能都上送为空, Ascii字符集，不能有中文和全角字符
                                                                                  // "invoiceId"=>"",//发票号 境外支付时上送，境内外币必须上送,Ascii字符集，不能有中文和全角字符
                                                                                  // "manifestId"=>"",//报关单号 境外支付时上送
                                                                                  // "agreementImageId"=>"",//影像批次号 境内外币必须上送，境外支付时上送
                                                                                  // "enterpriseName"=>"",//付款方企业名称 境内外币支付时上送，保证支付、担保支付时上送付款人会员名称
                                                                                  // "payRemark"=>"",//支付信息备注
                                                                                  // "bakReserve1"=>"",//境外交易特殊标志 网金部e链通专用，境外交易特殊标志。
                                                                                  // "bakReserve2"=>"",//备用字段2
                                                                                  // "bakReserve3"=>"",//备用字段3
                                                                                  // "partnerSeqOrigin"=>"201212221215202104",//原合作方支付流水号（待启用，退款时使用）
                                                                                  // "sumPayamtOrigin"=>"",//原汇总支付金额（备用字段） 待启用
                                                                                  // "reporterName"=>"",//填报人
                                                                                  // "reporterContact"=>"",//填报人电话
                                                                                  // "identityMode"=>"",//认证模式 1-免认证，0或空-其他；仅退款时使用，安心账户退款时必须上送1。使用免认证退款前需与工行签订相关协议，具体咨询客户经理。
                                                                                  // "payerPhone" => "", // 付款人手机号 11位手机号，线下异步支付时上送、线下异步支付：将收方信息推送给付款人手机号，付款人通过网银、柜面等渠道支付后自动关联订单为成功。使用线下异步支付前需与工行签订相关协议，具体咨询客户经理。
                                                                                  // "payerWalletId"=>"",//付款人钱包ID 待启用 数字人名币专用
                                                                                  // "payerWalletName"=>"",//付款人钱包名称 待启用 数字人名币专用
                                                                                  // "batchNo"=>"",//批次号 批量支付必送。
                                                                                  // "repetCard"=>"",//财智卡重用标志 财智卡重用模式下使用，重用模式1，其他模式0

        "goodsList" => array(
            array(
                "goodsSubId" => "0968", // 商品信息子序号
                "goodsName" => "测试商品", // 商品名称
                "payeeCompanyName" => "饮豆另增古技号午娇缝乓忘嘴易", // 收款人户名
                "goodsNumber" => "1", // 商品数量
                "goodsUnit" => "个", // 商品单位
                "goodsAmt" => "10" // 商品金额 单位分
            ),
            array(
                "goodsSubId" => "0967", // 商品信息子序号
                "goodsName" => "测试商品2", // 商品名称
                "payeeCompanyName" => "饮豆另增古技号午娇缝乓忘嘴易", // 收款人户名
                "goodsNumber" => "1", // 商品数量
                "goodsUnit" => "个", // 商品单位
                "goodsAmt" => "10" // 商品金额 单位分
            )
        ),

        "payeeList" => array(
            array(
                "mallCode" => "gyjtest001", // 收方商户号 支付时必输，退款时非必输
                                             // "mccCode" => "", // 商户类别（MCC码）
                                             // "mccName" => "", // MCC码名称
                                             // "businessLicense" => "", // 商户证件编号
                                             // "businessLicenseType" => "", // 商户证件类型
                "mallName" => "工银聚测试001", // 担保支付、保证支付上送收方会员名称
                "payeeCompanyName" => "总阵醉", // 收款人户名
                "payeeSysflag" => "1", // 境内外标志 1:境内工行，2:境内他行，3:境外
                                        // "payeeBankCode" => "", // 收方行联行号 当收方为境内他行（payeeSysflag = 2）时上送，退款时不用上送。联行行号请合作方自行查询或联系客户经理。
                                        // "payeeHeadBankCode" => "", // 收方行总行行号 暂未启用
                "payeeAccno" => "6222081202000000859", // 收款人账号 担保支付、保证支付时上送会员号绑定的结算账号
                "payAmount" => "20" // 收款金额（单位：分）
                                    // "rbankname" => "", // 收款行全称 当收方为境外时必须上送
                                    // "payeeBankCountry" => "", // 收款行所在国家地区代码 当收方为境外时必须上送
                                    // "payeeBankSign" => "", // 收款行标识 当收方为境外时必须上送
                                    // "payeeCountry" => "", // 收款人常驻国家/地区 当收方为境外时必须上送
                                    // "payeeAddress" => "", // 收款人地址 境外非加拿大时必须上送
                                    // "racaddress1" => "", // 收款人地址（国家） 境外加拿大时必须上送
                                    // "racaddress2" => "", // 收款人地址（省/州） 加拿大地区必输
                                    // "racaddress3" => "", // 收款人地址（城市/城镇） 加拿大地区必输
                                    // "racaddress4" => "", // 收款人地址（街/路） 加拿大地区必输
                                    // "racpostcode" => "", // 收款人地址（邮编） 加拿大地区必输
                                    // "agentbic" => "", // 收款行之代理行BIC码（境外支付才上送）
                                    // "payeePhone" => "", // 收款人手机号
                                    // "payeeOrgcode" => "", // 收款人组织机构代码 境内外币必须上送
                                    // "receivableAmount" => "", // 应收金额（单位：分） 担保支付专用，指本订单orderCode收方应收金额。
                                    // "payeeWalletId" => "", // 收款人钱包ID 支持数字人民币支付时上送
                                    // "payeeWalletName" => "" // 收款人钱包名称 支持数字人民币支付时上送
            )
        )
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
$resp = $client->execute($request, '202202281278103429955', ''); // 执行调用;msgId消息通讯唯一编号，要求每次调用独立生成，APP级唯一
echo $resp;
$respObj = json_decode($resp, true);
if ($respObj["return_code"] == 0) { // sucess
    $url = 'location:' . $respObj["redirectParam"];
    header($url); // 跳转支付页面
} else { // fail
    echo $respObj["return_msg"];
}

// 正常返回示例：{"transOk":0,"orderCurr":"001","payMode":1,"return_msg":"","sumPayamt":"20","agreeName":"测试1121","serialNo":"","agreeCode":"0160200010060410006041000000000881","orderAmount":"20","redirectParam":"https://cpay3.dccnet.com.cn/corporpay/servlet/ICBCCPayBusinessServlet?unique_serialno=2022022508485493300000000001723002&signstr=8792F12FE32CCB3312A40477854BD4DC25ED8C51D8405A7FF784B98A9ABA7B1FD5CEBBF7FCE625D2","partnerSeq":"201212221215202102","return_code":0,"status":1}
?>