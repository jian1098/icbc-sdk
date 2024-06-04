<?php
include_once '../DefaultIcbcClient.php';
include_once '../IcbcConstants.php';
	          $request = array(
          		"serviceUrl" => 'http://122.19.61.196:8081/api/settlement/account/balance/V1/query', // 使用api接口地址
          		"method" => 'POST', // 请求方法，只能是POST或GET
          		"isNeedEncrypt" => false, // 是否需要加密
              "extraParams" => null, //其他参数
          		"biz_content" => array( //业务数据
									      "corp_no" => "corpInst1234",
          							"trx_acc_date" => "2017-03-23",
          							"trx_acc_time" => "12:30:21",
          							"corp_serno" => "52fbf42f-d499-4a50-ab39-2acd86321141",
          							"corp_date" => "2017-03-23",
          							"out_service_code" => "querybalance",
          							"medium_id" => "6232290200000000065",
          							"ccy" => 1)

          	);
            $client = new DefaultIcbcClient('10000000000000001531', //APP的编号,应用在API开放平台注册时生成
            	                             'MIICdgIBADANBgkqhkiG9w0BAQEFAASCAmAwggJcAgEAAoGBALAWAcPiTMRU906PTdy0ozspX7XptZnkEw2C8R64RDB9BiRFXAj0cU4aTA1MyfmGIlceeVdgJf7OnmvpHnYxjQ7sGxMItPtodrGwA2y8j0AEbHc5pNWU8Hn0zoY9smHS5e+KjSbWv+VNbdnrRFTpDeiJ3+s2E/cKI2CDRbo7cAarAgMBAAECgYABiA933q4APyTvf/uTYdbRmuiEMoYr0nn/8hWayMt/CHdXNWs5gLbDkSL8MqDHFM2TqGYxxlpOPwnNsndbW874QIEKmtH/SSHuVUJSPyDW4B6MazA+/e6Hy0TZg2VAYwkB1IwGJox+OyfWzmbqpQGgs3FvuH9q25cDxkWntWbDcQJBAP2RDXlqx7UKsLfM17uu+ol9UvpdGoNEed+5cpScjFcsB0XzdVdCpp7JLlxR+UZNwr9Wf1V6FbD2kDflqZRBuV8CQQCxxpq7CJUaLHfm2kjmVtaQwDDw1ZKRb/Dm+5MZ67bQbvbXFHCRKkGI4qqNRlKwGhqIAUN8Ynp+9WhrEe0lnxo1AkEA0flSDR9tbPADUtDgPN0zPrN3CTgcAmOsAKXSylmwpWciRrzKiI366DZ0m6KOJ7ew8z0viJrmZ3pmBsO537llRQJAZLrRxZRRV6lGrwmUMN+XaCFeGbgJ+lphN5/oc9F5npShTLEKL1awF23HkZD9HUdNLS76HCp4miNXbQOVSbHi2QJAUw7KSaWENXbCl5c7M43ESo9paHHXHT+/5bmzebq2eoBofn+IFsyJB8Lz5L7WciDK7WvrGC2JEbqwpFhWwCOl/w==', //APP应用私钥
            	                             IcbcConstants::$SIGN_TYPE_RSA,//签名类型，’CA’-工行颁发的证书认证;’RSA’表示RSAWithSha1;’RSA2’表示RSAWithSha256;缺省为RSA
            	                             '',//字符集，仅支持UTF-8,可填空‘’
            	                             '',//请求参数格式，仅支持json，可填空‘’
            	                             'MIGfMA0GCSqGSIb3DQEBAQUAA4GNADCBiQKBgQCwFgHD4kzEVPdOj03ctKM7KV+16bWZ5BMNgvEeuEQwfQYkRVwI9HFOGkwNTMn5hiJXHnlXYCX+zp5r6R52MY0O7BsTCLT7aHaxsANsvI9ABGx3OaTVlPB59M6GPbJh0uXvio0m1r/lTW3Z60RU6Q3oid/rNhP3CiNgg0W6O3AGqwIDAQAB', //网关公钥，必填
			                                 '',//AES加密密钥，缺省为空‘’
			                                 '',//加密类型，当前仅支持AES加密，需要按照接口类型是否需要加密来设置，缺省为空‘’
			                                 '', //当签名类型为CA时，通过该字段上送证书公钥，缺省为空
			                                 ''); //当签名类型为CA时，通过该字段上送证书密码，缺省为空
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