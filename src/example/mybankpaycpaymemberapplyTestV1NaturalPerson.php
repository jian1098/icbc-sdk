<?php
// 合作方会员档案录入   付方自然人
include_once '../DefaultIcbcClient.php';
include_once '../IcbcConstants.php';
$request = array(
    "serviceUrl" => 'https://apipcs3.dccnet.com.cn/api/mybank/pay/cpay/memberapply/V1',
    "method" => 'POST',
    "isNeedEncrypt" => false,
    "biz_content" => array(
        "agreeCode" => "0160200238060410006041000000001490", // 合作方协议编号
        "memberNo" => "gyjtest002", // 合作方会员号
        "memberName" => "工银聚测试002", // 会员名称
        "memberRole" => "1", // 会员角色（1-付款方 2-收款方）
        "memberType" => "04", // 会员类型（ 01-法人 02-其他组织 03-个体工商户 04-自然人)
        "certificateType" => "0", // 注册登记证件类型（0-身份证 1-护照2-军官证 3-士兵证4-港澳台通行证 5-临时身份证 6-户口簿 9-警官证 12-外国人居留证 101-营业执照 100-组织机构代码证 112-税务登记证 107-统一社会信用代码证 99-其他）不必输 operType为5和6不输入，其他必输，示例：101
        "certificateId" => "388818196105112285", // 注册登记证件号码 operType为5和6不输入，其他必输，示例：101
                                                  // "corpRepreName" => "叁五", // 法人代表姓名 会员类型为01-法人 02-其他组织 03-个体工商户 时必输
                                                  // "corpRepreIdType" => "0", // 法人代表证件类型（0-身份证 1-护照2-军官证 3-士兵证4-港澳台通行证 5-临时身份证 6-户口簿 9-警官证 12-外国人居留证 101-营业执照 100-组织机构代码证 112-税务登记证 107-统一社会信用代码证 99-其他）会员类型为01-法人 02-其他组织 03-个体工商户 时必输
                                                  // "corpRepreId" => "330103198709010052 ", // 法人代表证件号码 会员类型为01-法人 02-其他组织 03-个体工商户 时必输
                                                  // "corpRepreSignDate" => "", // 法人身份证签发日期 2001-01-01 不必输
                                                  // "dealName" => "叁五", // 经办人姓名 会员类型为01-法人 02-其他组织 03-个体工商户 时必输
        "dealTelphoneNo" => "13606396048", // operType为5和6不输入，其他必输，此手机号默认做会员认证及支付使用，示例：13111111111
                                            // "mallUrl"=>"",//商户主页URL 不必输
        "icpCode" => "2323232ffg", // ICP备案编号 会员角色为收方必输，可输入合作方平台的ICP备案编号
                                    // "singNoNoteAmtd"=>"",//单笔免短信验证码额度（单位分） 默认为0 不必输
                                    // "enterAmtType"=>"",//0-逐笔，1-并笔，担保支付入账方式，默认逐笔
        "accBankFlag" => "1", // operType为5和6不输入，其他必输，示例：1-本行2-他行
        "accno" => "6222081202000002046", // operType为5和6不输入，其他必输，示例：会员绑定结算账号
        "accName" => "狱擦", // operType为5和6不输入，其他必输，示例：会员绑定结算账号户名
                            // "accBankNo"=>"",//账户开户行行号 账号本他行标志为他行必输
                            // "accBankName"=>"",//账户开户行行名 账号本他行标志为他行必输
        "merEname" => "test", // 特约商户英文名 specialsupplyer(会员类型为04-自然人 时必输)
        "merShname" => "test", // 商户简称 特约商户(会员类型为04-自然人 时必输)
        "saleDepName" => "test", // 门店名称 门店(会员类型为04-自然人 时必输)
        "shopAddr" => "test", // 商城地址 商城地址(会员类型为04-自然人 时必输)
        "postCode" => "311400", // 邮编编码 235001(会员类型为04-自然人 时必输)
        "linkCode" => "330106199011052713", // 联系人身份证号 123456123456123(会员类型为04-自然人 时必输)
        "eMail" => "605439284@qq.com", // 联系人邮箱 325614@163.com(会员类型为04-自然人 时必输)
        "regAmt" => "100000000", // 注册资金 123654123(会员类型为04-自然人 时必输)
                                  // "callbackUrl"=>"",//回调通知
        "operType" => "2" // 1-新增 2-修改 3-绑定 4-解绑（3、4只票据信息绑定时使用）;保证支付专用,5-保证支付订单开卡 6-保证支付分润维护（只支持2个收方，用于开卡设置分润比例后的后续维护） 不必输
                          // "enSurePayCardApply"=>"",//operType为5-保证支付订单开卡、operType为6-保证支付分润维护时必输。请求参数中保证支付开卡参数集合，每次最多支持开1张卡。保证支付专用。详见4.1 保证支付开卡参数
                          // "ensureInfo"=>"",//保证支付会员信息
                          // "billPlaNo"=>"",//票付通平台编号 10000001（operType=3或4时必输）
                          // "billAccInfo"=>"",//电票账户信息 10000001（operType=3或4时必输，最多不超过5笔）
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
$resp = $client->execute($request, '2022040715103425113', ''); // 执行调用;msgId消息通讯唯一编号，要求每次调用独立生成，APP级唯一
echo $resp;
$respObj = json_decode($resp, true);
if ($respObj["return_code"] == 0) { // sucess
    echo $respObj["return_msg"];
} else { // fail
    echo $respObj["return_msg"];
}
// 返回成功：{"transOk":0,"return_msg":"会员档案管理执行成功","return_code":"0"}

?>