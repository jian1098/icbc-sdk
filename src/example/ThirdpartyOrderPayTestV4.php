<?php
include_once '../DefaultIcbcClient.php';
include_once '../IcbcConstants.php';
include_once '../IcbcEncrypt.php';
include_once '../UiIcbcClient.php';

						$priKey = 'TKhSiK9Blwr6+aCq+O0MFg==';// AES��Կ
          	
          	$request = array(
          		"serviceUrl" => 'http://ip:port/ui/thirdparty/order/pay/V4',
          		"method" => 'POST',
          		"isNeedEncrypt" => true,
          		"biz_content" => array(
          							"mer_id"=>"020002040095",
												"store_code"=>"02000015087",
												"cust_id"=>"1076dAbpBsrJXpI4J+/HXthaHj+mORib",
												"out_trade_no"=>"ZHL777O15002039",
												"order_amt"=>"7370",
												"trade_date"=>"20170112",
												"trade_time"=>"160346",
												"attach"=>"abcdefg",// ���ֶηǱ�����
												"pay_expire"=>"1200",
												"notify_url"=>"127.0.0.1",// ���ֶηǱ�����
												"notify_flag"=>"1",
												"auto_submit_flag"=>"1",
												"goods_name"=>"��Ʒ001",// ���ֶηǱ�����
												"all_points_flag"=>"0",// ���ֶηǱ�����
												"good_points"=>"",// ���ֶηǱ�����
												"installment_flag"=>"1",// ���ֶηǱ�����
												"installment_times"=>"3",// ���ֶηǱ�����
												"card_type"=>"111"// ���ֶηǱ�����
          						 )
          						 
          	);
          	
						//���¹��캯����1������Ϊappid����2������ΪRSA��Կ����˽Կ
          	$client = new UiIcbcClient('10000000000000002156',
            	                         'MIICdgIBADANBgkqhkiG9w0BAQEFAASCAmAwggJcAgEAAoGBAIJBzZNaiobplRUgtJ4OzmUvZRK99ih/fUyDBOoFLtpJJCCRzp8T6V11YNlE7Xg5dt+EG7byQs2NImqg0eWEj/mBdZ7UmlAct7BNw2hyF2h4R5OEfXyjoH3wqGjKJayhaHTvLM1DYy/mDFBb0ShJYI1QMScQJZhsOhMMFhrrZwIZAgMBAAECgYAA2kdrOIOBoJPOQJmOE1C8jtPdjIrI9xSt5Imqsn/9A8+NuwacOfgkGXmZ0n6vc8jYa7f2uZ1AVTUtd4IIO5bpq8s0Tw2BfWALYwr/JdUuNKSjHVQsh/Do+wl8BgOgB4RqsNXWNGtoMC8lHKHmrVcpyJMfDc3cP07NZ1wG2zB0lQJBAM+dNZv2L/Z4RzvQcoVZEthYavZ4pkFoWGYC4jwc5G8um76zoQyrtxWYrtTP0GS+xFFX2dEuiGXxwzmSQJrPdrMCQQCgnUXcQe/if2c6TFt4x9v+6L0pmFClYyiOi9RuBSz1sHmPouuc/YYvuxAOdOzu3yzOkeo7b5KcCKITTWvKI+oDAkA5dl6vIw2VXycAJCp+Q/AWVyqLu0rw0Yud+HBbiPek2jabKqaJlkFfRdol5rrcF3zIstMDtahk5uxM0/DzqDZHAkBGnZ8vfdYIUVeDbDrzWXvCEXXJqewbKwOT2KqnTKM9yj9IBatttJGgvrAKiyH4zCqZD9JaG23sKGeJ8QopL60dAkEAtc4tlKoj3XZzRUXboqz0EhkgkjzDj50zpCD1sJKZ2EZH+A/7tXwPug+RnuSmKpM2uv3msqw3prdS3K4En8+rog==',
            	                         IcbcConstants::$SIGN_TYPE_RSA2,
            	                         '',
            	                         '',
            	                         '',
    			                             $priKey,
    			                             IcbcConstants::$ENCRYPT_TYPE_AES,
    			                             '',
    			                             '');
       
        try{
              $resp = $client->buildPostForm($request,'msgid',''); //ִ�е���;msgId��ϢͨѶΨһ��ţ�Ҫ��ÿ�ε��ö������ɣ�APP��Ψһ
              echo $resp;
            }catch(Exception $e){//�����쳣
              echo 'Exception:'.$e->getMessage()."\n";
            }

?>