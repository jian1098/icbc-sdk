<?php
include_once '../DefaultIcbcClient.php';
include_once '../IcbcConstants.php';
	          $request = array(
          		"serviceUrl" => 'http://122.19.61.196:8081/api/settlement/account/balance/V1/query', // 使用api接口地址
          		"method" => 'POST', // 请求方法，只能是POST或GET
          		"isNeedEncrypt" => false, // 是否需要加密
              "extraParams" => null,//其他参数
          		"biz_content" => array( //业务数据
									      "corp_no" => "corpInst1234",
          							"trx_acc_date" => "2017-03-23",
          							"trx_acc_time" => "12:30:21",
          							"corp_serno" => "0d950df0-26e1-4769-a7f4-63244e3e6912",
          							"corp_date" => "2017-03-23",
          							"out_service_code" => "querybalance",
          							"medium_id" => "6232290200000000065",
          							"ccy" => 1)

          	);
            $client = new DefaultIcbcClient('10000000000000001531',//APP的编号,应用在API开放平台注册时生成
            	                             'AmEvvpDym7qi4Tmw/gO9v1/Ku8R3Qt46t16I6FA/CPwLopau7fNKcUxYCL9pqjb76phR4NPBr+Fa9O3PqZ5bJm7/io3hwqnmtu9KHs57HO6HOXycjQi9ZH4fqVZJbPtXQpGGXZhX1VB5teIcoKf5PxWgahBH2p7GnBZA7VgpO/1z2ZkxbqR1yUNR+gq2MpJQvMSab07+Vgz9l9dYDsl1UX6RqsAN7IgpZoZhlSpmxvt04i/um78hrGVuf0Y/KqACxZbyS8rz2nE8m1R1xys8wziEu18hKVZtl0v3yKTjvAqDuwV2aFXjumfkcsQTHLnPk0X/BdTpNSDDgDkw1p9nQhYrPTYUe05U3WyZBBDLmeJ/Niuj3RrPkc6z96TmLRdL/gzHoedeMtcjWHFbZLh8vGi9FLzKaRQo2/AbYqT2DWAatw0nDePsQk+9Av7ZS+7vZ51h5cv16ZP8lge5z1DeAYxMjV3RB5He5u8NPgehPd26bZQv7PUmyn2Br3SS6SAZcqvrN4dcLwV+Xb6QnjHEV5eUeEKky6qy/EwUC6DPJi/PSFPkUbzDR3KlJGw35f0oQbulJ3NnYv2UQ+wf3WhBQu82uGw7MKJrQDjE4bv018ycI47tFsW1kTqVNs1LNpafRcZbizfEphEbynz0UvQiL0YORUqT5RaS1pSYvCo1qXpCNILmW4bQ0Hz3W8eEDYpjSmBWnQTOpDHVfm0rXFGMsJxJRfGiSZh5gSQTbgEsTCa/Wauzx+tgL39EYYKVQn+1wQHQEZ1NvbPbzB6KHOG9XahzUcgMGb51t6zz+hX8y712lfE=', //APP应用私钥
            	                             IcbcConstants::$SIGN_TYPE_CA,//签名类型，’CA’-工行颁发的证书认证;’RSA’表示RSAWithSha1;’RSA2’表示RSAWithSha256;缺省为RSA
            	                             '',//字符集，仅支持UTF-8,可填空‘’
            	                             '',//请求参数格式，仅支持json，可填空‘’
            	                             'MIGfMA0GCSqGSIb3DQEBAQUAA4GNADCBiQKBgQCwFgHD4kzEVPdOj03ctKM7KV+16bWZ5BMNgvEeuEQwfQYkRVwI9HFOGkwNTMn5hiJXHnlXYCX+zp5r6R52MY0O7BsTCLT7aHaxsANsvI9ABGx3OaTVlPB59M6GPbJh0uXvio0m1r/lTW3Z60RU6Q3oid/rNhP3CiNgg0W6O3AGqwIDAQAB', //网关公钥，必填
			                                 '',//AES加密密钥，缺省为空‘’
			                                 '',//加密类型，当前仅支持AES加密，需要按照接口类型是否需要加密来设置，缺省为空‘’
			                                 'MIIDCTCCAfGgAwIBAgIKbaHKEE0tAAAVmTANBgkqhkiG9w0BAQUFADA3MRowGAYDVQQDExFjb3JiYW5rMTAzIHNkYyBDTjEZMBcGA1UEChMQY29yYmFuazQzLmNvbS5jbjAeFw0xMzA2MDEwNjE5NTFaFw0xNDA2MDEwNjE5NTFaMEAxFDASBgNVBAMTC0xMTEwuZS4wMjAwMQ0wCwYDVQQLEwQwMjAwMRkwFwYDVQQKExBjb3JiYW5rNDMuY29tLmNuMIGfMA0GCSqGSIb3DQEBAQUAA4GNADCBiQKBgQDUebVQUS8jnDERJopOwNgRlKEafEQUryj9EV64TUsaR850v/3KnctPRJ09GCqeucvbbOXlHz/RlwJSVWqryCTOldOUv1F58KQ0C59sY/dhh+W57fLIQKO90Sd344o/fPiytqmGtBc2m+DE/3L6morgC8m05Ygm16MkIk89Nz184wIDAQABo4GRMIGOMB8GA1UdIwQYMBaAFKnyXV7yfyOkd7D4zZtPLyquqLWdMEwGA1UdHwRFMEMwQaA/oD2kOzA5MQ0wCwYDVQQDEwRjcmw2MQ0wCwYDVQQLEwRjY3JsMRkwFwYDVQQKExBjb3JiYW5rNDMuY29tLmNuMB0GA1UdDgQWBBTkDBRsd9NghIrtNaUe6gSxZQ9CfzANBgkqhkiG9w0BAQUFAAOCAQEAXTWymvrTDMgV9LK7Ps6o52mlZIPmp3n7hmZttgJR/6KmZ/uCChPqHd9Ixw3DBnzHvoxmgtCKNVNc+iYQ4ks8cZgQoQ3uKT9bYinRCgECOv0Hiv7Q63DHJB46QamYcPc9dmmKAAOMd5AtnKI8QBRG3kxEmD6DPAcyx7hZ9Iw0MVwu4J1RfByJ1kM/bnhFpGwTma+5kxQlP+8Zurx4Cow/TUIj+kiLa/1ZmKXok7XOUr1UTFJhIqe0v3w2ekidchVML/t6n6Yw8Q5UCAbvKP4iHWdxeEGYsn+/a38oqCqIya66d5FCUqcOXXdRTdwdaSg6IGA4X6//O9TCvle1SCn7LQ==', //当签名类型为CA时，通过该字段上送证书公钥，缺省为空
			                                 '12345678'); //当签名类型为CA时，通过该字段上送证书密码，缺省为空
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