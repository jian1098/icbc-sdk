<?php
include_once '../IcbcConstants.php';
include_once '../UiIcbcClient.php';
          	
          	$request = array(
          		"serviceUrl" => 'http://ip:port/ui/cardbusiness/epayh5/ui/consumption/V1',
          		"method" => 'POST',
          		"isNeedEncrypt" => false,
          		"biz_content" => array(
          							"icbc_appid"=>"10000000000004095503",
												"order_date"=>"20201020104513",
												"order_id"=>"h520201020104513",
												"amount"=>"1",
												"installment_times"=>"1",
												"cur_type"=>"001",
												"mer_id"=>"020053010625",
												"mer_prtcl_no"=>"0200530106250201",
												"mer_acct"=>"0200000209024213154",
												"merchant_info"=>"",
												"language"=>"zh_CN",
												"goods_id"=>"",
												"goods_name"=>"娃哈哈",
												"goods_num"=>"",
												"carriage_amt"=>"",
												"mer_hint"=>"",
												"remark1"=>"20201020154513",
												"remark2"=>"",
												"mer_reference"=>"",
												"mer_custom_ip"=>"",
												"mer_var"=>"hello",
												"merURL"=>"http://5.1fendb.com/recall/recall.php",
												"return_url"=>"http://acq2020kfacq.dccnet.com/apiTest.html",
												"auto_refer_sec"=>"",
												"backup1"=>"",
												"wallet_flag"=>"0",
												"external_app_id"=>"",
												"cust_id"=>"",
												"mobile"=>"",
												"credit_type"=>"2",
												"notify_type"=>"HS",
												"result_type"=>"0",
												"h5_flag"=>"1",
												"order_interval"=>"300"
          						 )
          						 
          	);
          	
          	$client = new UiIcbcClient('10000000000004095503',
            	                         'MIIEvQIBADANBgkqhkiG9w0BAQEFAASCBKcwggSjAgEAAoIBAQDfV8piJL/5Pc/ZdCMBcX1mVrLQo6rRBdqLOnYkU9xnVp1EdhMkx1wcP1BDWTo0SqupMFwZlsTH5t6ywdlD4sXvkyfCkuSSShg+ZGGLRKmDPoLOEP1KZ/SFwnIGb6hj30OXyhsmArVYfYr7qAlo0GqfQrDUAC2ZbasESLHlVvqMy48ssp2QcOPtZoWW/diQY1HJR+RMS9Kjg9oZr/dU5UloZQsDQVXmYBuAqU4RcBfEqV56dFu/suJkGrw0LenDPxI2QLJ5c51rkhx9lC7xBZigfWOnDLH6xoT1ChdcY9bP5xt/GjP5NYuI8xI2sGGTUPoUKxdrH6aiI9jp728+K1y5AgMBAAECggEAbJQsktwU7GHti2UXo5r+AOPDWQVIhQfYgHlyeCTA8Qg9usvAcM/u6tio96UIU+W9YKpfDB2tGxYVTEhLjOJRojAjU0fAkZIuCR8aAO/njSO1yeKekS7KxMCMWK6t6afgH4ok+qy0ZwnZqJC/ylIQk86DUv2nLYEQdCu3OKy5b/qZ1qA7yaCiG/D4HBThgiOifV2Yq1TCtvC2iv5mcuhH4iTXexeOQcbZepZlQnyXiVAlTYRAeo+ng8ub01NJZ4njPe9boKeqrpmMAOLN/gRTjh6yZ+90+hniXLgznOVPg+GxUbff8pVDd01POGVsid0f5Gr/TvEnixJV9nM70SCp0QKBgQD1C/oCC0mC9T8yZrrzkKZ5gsWpxElGYFvU/S1LdDsfGioRLLBJ8k4PvQcJN+pB1Ea2b8s01HQKWarXGYKQmu+dGsULbv9UpaVwH3Of+gt35Wo2+Fuh0bhcS58Ct41IGQh5leI5ckNq9iB9/x6zWQFeAEpUnXqIwFYkNCZIPbgmRQKBgQDpU3YAvKXDCesL9W4JhoWhyGBJ94frOq8hiH3vbr1xUpqDkJ9aovMDWy5f77E5Vuva/mEDxIpQrFTSA4clKj6T8E6CBiEMStP2DWLQsyC3AxDKv3g5lXab3IH4KtxjNCwadp+TRmRHWG09FLdt14AeS4El14xdhlGx6FsYncst5QKBgFBGHR9gTTOeXZaIOsQhZbe2lEQZ7hsk49BxI85tBBUbQB6iMhn3S4UyWkS10YLBJG0NUFc9JcpiN2oBjFkMuGQR6ezl7rTvErQZSYploi4jtFjPoUzwY+GwUCXWtWyh7rnN1O8WtGksudYspgUAqkb991uivwpfX5i6kLPnrBS1AoGALe8WXhLFd14ufc41eX6YND9kZWtrwK1u6OUcFdTxSqv+a0Q/evJ1cQW0XYKsmyM3j4dgxgMdT8B9elLjejeU1j8K1aIrQ2Y/0ELWX0vEdwMNfTywiHWaQhjpJVgaxxTwUc1koPPMrhcEem/npKI2QMCQjkifA5J75tBdjr0R0NkCgYEA1eUVZW1zEXB79xf2GREbPi1UeQVfIvTqOQK8fa3O0Xdrdd//BFHy44eqSrg5eG0t78wbFtkwYHUIbQZOd0L9qp6yPIk2bqldKoqUxiXPjGX4QR1XgenbWjc+cLr//EN2zRqTLrd3K2e0V/Hx+6cL14/0DB73Ma7oyZ6rMKR2JYU=',
            	                         IcbcConstants::$SIGN_TYPE_RSA,
            	                         '',
            	                         '',
            	                         '',
    			                             '',
    			                             '',
    			                             '',
    			                             '');
       
        try{
              $resp = $client->buildPostForm($request,'msgid','h5test20201020104513'); //执行调用
              echo $resp;
            }catch(Exception $e){//捕获异常
              echo 'Exception:'.$e->getMessage()."\n";
            }

?>

