<?php
include_once '../DefaultIcbcClient.php';
include_once '../IcbcConstants.php';
	          $request = array(
          		"serviceUrl" => 'http://122.19.77.226:8081/api/preciousmetal/gold/V1/exchange',// 使用api接口地址
          		"method" => 'POST',// 请求方法，只能是POST或GET
          		"isNeedEncrypt" => false,// 是否需要加密
          		"extraParams" => null,//其他参数,用数组类型array
          		"biz_content" => array(//业务数据,用数组类型array
								"acc_amount"=>10000,
								"acc_fee"=>0,
								"acc_fee_rate"=>0,
								"acc_lock_price_ts"=>"2016-10-28 17:15:10.762126",
								"acc_price"=>10000,
								"acc_quantity"=>1000000,
								"amount"=>10000,
								"buyer_cert_no"=>"445287119960909120",
								"buyer_cert_type"=>0,
								"buyer_mobile_no"=>"18818888888",
								"buyer_name"=>"张三",
								"cust_no"=>"ABC123",
								"invoice_address"=>"广州某街",
								"invoice_mobile_no"=>"18815554444",
								"invoice_name"=>"王五",
								"invoice_title"=>"I523",
								"phy_amount"=>10000,
								"phy_amount_gap"=>0,
								"phy_num"=>100,
								"phy_pptxnno"=>10020,
								"prod_sell_price"=>1,
								"prod_single_price"=>10000,
								"recipient_address"=>"广州天河",
								"recipient_cert_no"=>"445287132320909120",
								"recipient_cert_type"=>0,
								"recipient_mobile_no"=>"177712177727",
								"recipient_name"=>"李四",
								"recipient_postcode"=>"512939",
								"trx_seq_no"=>"123456789",
								"trx_service_code"=>"100000005",
								"trx_ts"=>"2016-10-28 17:15:12.762126"
								)

          	);
            $client = new DefaultIcbcClient('10000000000000002166',//APP的编号,应用在API开放平台注册时生成
            	                             'MIICdgIBADANBgkqhkiG9w0BAQEFAASCAmAwggJcAgEAAoGBAJ42tqQomxbLvuZTVKO4bBLwGp8SzRMiJ7jX9JNlS4sqmZzs9Z4lw/SSxf4dF9JJUErpNReUjzLp0As2FiuV8BALh6GYmiHGTWx7+v3HuWH9LiZNI00Ia+1HfpkJ8Sao8Ny5h1Pu49LayVleeLy496+phRE81dqlqaSHH8cKWnK1AgMBAAECgYBxod5f3QI2xzNe/e7GgAivOWAFbF16JofdDM4Opyww0fHucYqfgYRSPrCRqJeZYyqWAxUs0HhhGulfhAM8Xr5BxY5//x4HDqE2rOF7mrc/xkWNL+S9X5U0T8cdA3fnF/rYAUnJjKmeliuD2gcf5xYJENcnb8p/GQbiwIjoHDqe6QJBANzcevl9ke4cx1fa3ZcxVS3A1eHVtp573M/lo+8pRJlrf96ghFB54CzumsC0F7YfojDgCAN2egTqCGqNOuPJWWcCQQC3YqT5xlMlGk6Agav5Y6E5blx/AKJB8DeZSbjXLvytpXOASzoNR/A40uQXanXVqNU68l96FSq415AmTHi9OdWDAkA0el7t8Rw/i68B/Qsx5ZLrsCoh4vnlZmDtNQ9iwFeAbL6RU2qdBJhzlK5Io4IO0C1ll5XP3NLZYBJn3u7jOPB5AkEAiM/qHoHsM8j9effD0kmW1V7VWNajNqg9AnoykS73yaCem78DrzbVK7+B9UoyYNUVR2Xc/xpdhgsj+r6gcSN9ewJANSmxYF34601mteAnZwhyGKCJomiuSMNTr52i2uTspdZi0zqaerI1EGD3dAENxRebyPmPFxhwCcCbzF2gNUr1fw==',//APP应用私钥
            	                             IcbcConstants::$SIGN_TYPE_RSA,//签名类型，’CA’-工行颁发的证书认证;’RSA’表示RSAWithSha1;’RSA2’表示RSAWithSha256;缺省为RSA
                                           '',//字符集，仅支持UTF-8,可填空‘’
                                           '',//请求参数格式，仅支持json，可填空‘’
            	                             'MIGfMA0GCSqGSIb3DQEBAQUAA4GNADCBiQKBgQCwFgHD4kzEVPdOj03ctKM7KV+16bWZ5BMNgvEeuEQwfQYkRVwI9HFOGkwNTMn5hiJXHnlXYCX+zp5r6R52MY0O7BsTCLT7aHaxsANsvI9ABGx3OaTVlPB59M6GPbJh0uXvio0m1r/lTW3Z60RU6Q3oid/rNhP3CiNgg0W6O3AGqwIDAQAB',//网关公钥，必填
			                                     '',//AES加密密钥，缺省为空‘’
			                                     '',//加密类型，当前仅支持AES加密，需要按照接口类型是否需要加密来设置，缺省为空‘’
			                                 '',//当签名类型为CA时，通过该字段上送证书公钥，缺省为空
			                                 '');//当签名类型为CA时，通过该字段上送证书密码，缺省为空
            try{
              $resp = $client->execute($request,'msgId',''); //执行调用
              $respObj = json_decode($resp,true);
              if($respObj["return_code"] == 0){ //成功
                 echo $respObj["return_msg"];
              }else{//失败
                 echo $respObj["return_msg"];
              }
            }catch(Exception $e){//捕获异常
              echo 'Exception:'.$e->getMessage()."\n";
            }

?>