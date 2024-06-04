<?php
include_once '../DefaultIcbcClient.php';
include_once '../UiIcbcClient.php';
include_once '../IcbcConstants.php';
	          $request = array(
          		"serviceUrl" => 'https://122.19.77.226:8081/ui/personal/sign/V1/verify',
          		"method" => 'POST',
          		"isNeedEncrypt" => false,
          		"biz_content" => array(
                        "authen_acct_name"=>"x9G3wg==",
                        "authen_acct_no"=>"6222020200106190966",
                        "authen_name"=>"x9G3wg==",
                        "auto_turn_flag"=>"0",
                        "cert_no"=>"428767198408147542",
                        "cert_type"=>"0",
                        "language"=>"ZH_CN",
                        "logon_id"=>"020000206164898.p.0200",
                        "notify_type"=>"HS",
                        "request_ip"=>"192.168.1.1",
                        "tran_time"=>"20161021144040",
                        "verified_corp_id"=>"2000EG0000136",
                        "verified_corp_name"=>"uaTJzL7W",
                        "verified_flag"=>"1",
                        "verified_id"=>"800136",
                        "verified_info"=>"1eLKx9K7uPbHqcP7xNrI3cW2",
                        "verified_kind"=>"0",
                        "verified_type"=>"0"
          						 ),
              "extraParams" => array(
                        "notify_url" => 'https://www.scgsj.com/notify.do',
                        "interfaceName" => 'ICBC_PEEBANK_CERTVERIFY_NEW'
              )

          	);
            $client = new UiIcbcClient('10000000000000016542',
            	                             'MIICdgIBADANBgkqhkiG9w0BAQEFAASCAmAwggJcAgEAAoGBALAWAcPiTMRU906PTdy0ozspX7XptZnkEw2C8R64RDB9BiRFXAj0cU4aTA1MyfmGIlceeVdgJf7OnmvpHnYxjQ7sGxMItPtodrGwA2y8j0AEbHc5pNWU8Hn0zoY9smHS5e+KjSbWv+VNbdnrRFTpDeiJ3+s2E/cKI2CDRbo7cAarAgMBAAECgYABiA933q4APyTvf/uTYdbRmuiEMoYr0nn/8hWayMt/CHdXNWs5gLbDkSL8MqDHFM2TqGYxxlpOPwnNsndbW874QIEKmtH/SSHuVUJSPyDW4B6MazA+/e6Hy0TZg2VAYwkB1IwGJox+OyfWzmbqpQGgs3FvuH9q25cDxkWntWbDcQJBAP2RDXlqx7UKsLfM17uu+ol9UvpdGoNEed+5cpScjFcsB0XzdVdCpp7JLlxR+UZNwr9Wf1V6FbD2kDflqZRBuV8CQQCxxpq7CJUaLHfm2kjmVtaQwDDw1ZKRb/Dm+5MZ67bQbvbXFHCRKkGI4qqNRlKwGhqIAUN8Ynp+9WhrEe0lnxo1AkEA0flSDR9tbPADUtDgPN0zPrN3CTgcAmOsAKXSylmwpWciRrzKiI366DZ0m6KOJ7ew8z0viJrmZ3pmBsO537llRQJAZLrRxZRRV6lGrwmUMN+XaCFeGbgJ+lphN5/oc9F5npShTLEKL1awF23HkZD9HUdNLS76HCp4miNXbQOVSbHi2QJAUw7KSaWENXbCl5c7M43ESo9paHHXHT+/5bmzebq2eoBofn+IFsyJB8Lz5L7WciDK7WvrGC2JEbqwpFhWwCOl/w==',
            	                             IcbcConstants::$SIGN_TYPE_RSA,
            	                             '',
            	                             '',
            	                             '',
    			                                 '',
    			                                 '',
    			                                 '',
    			                                 '');
            try{
              $resp = $client->buildPostForm($request); //执行调用
              echo $resp;
            }catch(Exception $e){//捕获异常
              echo 'Exception:'.$e->getMessage()."\n";
            }


?>