<?php
include_once '../DefaultIcbcClient.php';
include_once '../IcbcConstants.php';
	          $request = array(
          		"serviceUrl" => 'http://122.19.77.226:8081/api/preciousmetal/gold/V1/redeem', // 使用api接口地址
          		"method" => 'POST', // 请求方法，只能是POST或GET
          		"isNeedEncrypt" => false, // 是否需要加密
              "extraParams" => null,//其他参数
          		"biz_content" => array( //业务数据
          						"cert_no" => "12315",
		                   "cert_type" => 0,
		                   "cust_name" => "ÍÞ¹þ¹þ",
		                   "cust_no" => "guorui",
		                   "fee" => 120,
		                   "fee_rate" => 5000,
		                   "lock_price_ts" => "2016-11-17 18:19:12.762126",
		                   "mobile_no" => "1313331111",
		                   "redemption_amt" => 23860,
		                   "redemption_price" => 238600000,
		                   "redemption_quantity" => 10000,
		                   "trx_req_ts" => "2016-11-17 18:15:12.762126",
		                   "trx_seq_no" => "5231545"
          						 )

          	);
            $client = new DefaultIcbcClient('10000000000000002166',//APP的编号,应用在API开放平台注册时生成
            	                             'MIIEvAIBADANBgkqhkiG9w0BAQEFAASCBKYwggSiAgEAAoIBAQCgrIlUz6J2bMAqpFCDuosPD0IFueMhj7LBPkalvSk18B/K5k47AZ/w1/4m5mngq8zCfD5/dSdPLlfK3AF7GwP7zzVNHDci8axyg3qG6Wzk7BRFIlnt6xxvb2QL8V/yfvW3+eFp4nF8b27VCJm0KXVX6AWi9XPhBi7Nem9jsF6JdWRjfD72ulOUadcIZ3N+M2S57jG0w+pbvZq/h4NWconzLy/ZASUqvtaT8lrqu64co92PBfMtO0xDW22J32LVYbtnnU6PCWxe9YAdXccwJ6ruqearNBu83a6fvQFtceXclwj/+//8ySKazkrzHopBbMZjIkW+0dYUR23qgLCqDhTBAgMBAAECggEABYapmn8hqU0INu87zawGyFfP/35rL2ZP0ZGgwGaHGlHN5h6RpjniFFh5Z0EZdx6xhibbx2pyFakUX+e9LUy6kFiKDsLfqpYBRlb7SdSRaDYuZEpQKXyil7qPCFIe6KoxLUis1gVxvcPfXfhTwPyECqfyOa6Tc7PQvERvvE/+kF+pIFM1f1vYl15LPYmTbtsl7/cDFRBhgSMe7sfQOx7yopomQW/VgjITFmMFNZemw5yv7Fm5PcaUm9a7DrPPp5C+LiWhlT111AZZ94tCrBJq1YdisCnU7VOs6ePeHYjVNTEO4Tc4mwSrdiRl9ehQCwSKzEP0OS7JwOkGZdGQSSOcmQKBgQDq3dAoqHsezZ6jljF4nt/Y23Aei1M9bWmlnbCmNNvIhXq+5ob/GV4d0cLMOPA2fUvGS8cfc2nhAhEtaBJbqn8n7qKb5e0KojbQmIfuSv1tfj7b/XMnrvfUZAJD4VadmGsPe2elqSO6nkYg3xLr1NxYFdeEGTEKvAMiZjQlI6+FwwKBgQCvIa/4B61hYzNk+//OwYDi+A2EDDLTX9Uy7bygYCYdtAhj0cHSPtsCwfJFtY8BIgTHaiDjru9b/P4NiqV2iuzTp8tA/FtonD3kOt8iy5mrKNckK8OOKKIiSi2ttu440TPquNAdMhwm7chvx3bXD5e4fSK44tgc7TCcg583ZiAfKwKBgE8r7puGD9rWXX+vhYWvqK2layogtTKjy1U0zvN4Jg52UGZBt4gOuRc8Ono1R2RW4FA8Ayeq9CoRVFEGIAoecza2zsHWxA0tmWS/xjKhvMRIJlBqI4NhC9Hg1JKlR1lgo9ZYNxw05AJokCNMj0hIPO7Ejh3NkCaaMkRKR5GtceGZAoGAAhvAt5a4EqUUGFIkWUPhHlpoJz/SWNMdiPhtveyKaO8i7ri2waY6EsVs+kPeTeAv+IqhjLwta4kXMeiKZ2vyv/WUL9sZ6p9+60F+MDgNSI88T9YrC4oXsZv9AstiANMb8eZ5svBIgHt6X0YieyJX7EOtaFZqzaZZYHkBMLSNDHMCgYB5MVgVz7hDgCugRlM7pidfqU90zZgubhuASJC+KWNu/2NNj+SVJBZ4Ffx4sFuerq+fj0zQ+smd9fwiOge2RYYibpemgVyGqVJE8zAfYMCwuqsnLaG5dr1DAS0DbXcnXPB+Nv8Xj1TAMhaboZVeKDjNy0T2eP0FHuaBENog/WuzlQ==', //APP应用私钥
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