<?php
include_once '../DefaultIcbcClient.php';
include_once '../IcbcConstants.php';
	          $request = array(
          		"serviceUrl" => 'https://ip:port/api/qrcode/V2/reject/query',
          		"method" => 'POST',
          		"isNeedEncrypt" => false,
          		"biz_content" => array(
								"mer_id"=>"020001515151",
								"cust_id"=>"Ey0LsS39FwdE35TsSW1A2eeoIRMZrjSa",
								"out_trade_no"=>"X000000001",
								"order_id"=>"020001515151201701030000001",
								"reject_no"=>"X000000001"
								)

          	);
          	//���¹��캯����1������Ϊappid����2������ΪRSA��Կ����˽Կ����6������ΪAPIƽ̨���ع�Կ
            $client = new DefaultIcbcClient('10000000000000002156',
            	                             'MIICdgIBADANBgkqhkiG9w0BAQEFAASCAmAwggJcAgEAAoGBAIJBzZNaiobplRUgtJ4OzmUvZRK99ih/fUyDBOoFLtpJJCCRzp8T6V11YNlE7Xg5dt+EG7byQs2NImqg0eWEj/mBdZ7UmlAct7BNw2hyF2h4R5OEfXyjoH3wqGjKJayhaHTvLM1DYy/mDFBb0ShJYI1QMScQJZhsOhMMFhrrZwIZAgMBAAECgYAA2kdrOIOBoJPOQJmOE1C8jtPdjIrI9xSt5Imqsn/9A8+NuwacOfgkGXmZ0n6vc8jYa7f2uZ1AVTUtd4IIO5bpq8s0Tw2BfWALYwr/JdUuNKSjHVQsh/Do+wl8BgOgB4RqsNXWNGtoMC8lHKHmrVcpyJMfDc3cP07NZ1wG2zB0lQJBAM+dNZv2L/Z4RzvQcoVZEthYavZ4pkFoWGYC4jwc5G8um76zoQyrtxWYrtTP0GS+xFFX2dEuiGXxwzmSQJrPdrMCQQCgnUXcQe/if2c6TFt4x9v+6L0pmFClYyiOi9RuBSz1sHmPouuc/YYvuxAOdOzu3yzOkeo7b5KcCKITTWvKI+oDAkA5dl6vIw2VXycAJCp+Q/AWVyqLu0rw0Yud+HBbiPek2jabKqaJlkFfRdol5rrcF3zIstMDtahk5uxM0/DzqDZHAkBGnZ8vfdYIUVeDbDrzWXvCEXXJqewbKwOT2KqnTKM9yj9IBatttJGgvrAKiyH4zCqZD9JaG23sKGeJ8QopL60dAkEAtc4tlKoj3XZzRUXboqz0EhkgkjzDj50zpCD1sJKZ2EZH+A/7tXwPug+RnuSmKpM2uv3msqw3prdS3K4En8+rog==',
            	                             IcbcConstants::$SIGN_TYPE_RSA2,
            	                             '',
            	                             '',
            	                             'MIGfMA0GCSqGSIb3DQEBAQUAA4GNADCBiQKBgQCwFgHD4kzEVPdOj03ctKM7KV+16bWZ5BMNgvEeuEQwfQYkRVwI9HFOGkwNTMn5hiJXHnlXYCX+zp5r6R52MY0O7BsTCLT7aHaxsANsvI9ABGx3OaTVlPB59M6GPbJh0uXvio0m1r/lTW3Z60RU6Q3oid/rNhP3CiNgg0W6O3AGqwIDAQAB',
			                                 '',
			                                 '',
			                                 '',
			                                 '');
            $resp = $client->execute($request,'msgId','');//ִ�е���;msgId��ϢͨѶΨһ��ţ�Ҫ��ÿ�ε��ö������ɣ�APP��Ψһ
            echo $resp;
            $respObj = json_decode($resp,true);
            if($respObj["return_code"] == 0){ //sucess
            	echo $respObj["return_msg"];
            }else{//fail
				      echo $respObj["return_msg"];
            }

?>