<?php
include_once '../DefaultIcbcClient.php';
include_once '../IcbcConstants.php';
$request = array(
    "serviceUrl" => 'http://122.19.77.197:8081/api/oauthservice/gettoken/V1',// 使用api接口地址
    "method" => 'POST',// 请求方法，只能是POST或GET
    "isNeedEncrypt" => false,// 是否需要加密
    "extraParams" => null,//其他参数,用数组类型array
    "biz_content" => array(//业务数据,用数组类型array
        "auth_code"=>"",
        "grant_type"=>"authorization_code",
        "timestamp"=>"2017-12-25 09:40:00",
    )

);
$client = new DefaultIcbcClient('10000000000000003909',//APP的编号,应用在API开放平台注册时生成
    'MIIEwAIBADANBgkqhkiG9w0BAQEFAASCBKowggSmAgEAAoIBAQCdi7NGXeRzDEndTZlRaSJOOmNtQzuPR/lr2BxHVKSmxLP9N2+LHI8hLZcps+qjNaMWnJTvUJ5L6sxxt4i0fsuf5rrifdQHmKZE21Pra5QxzrvXOvzD7iS58eONDNm5HZt5OEh0sA5WfwTtTa1Id3nU0LPqSOeYhKey8pAD+YPx0umoCIQJdDapSCjScCOWGGZ9qKTZ2QZzdMYVHVA3ghoNgfZ4uRw/y7aq6b2yrLy1PaleiAVZmzgnSfqQdlT9qF8PwMi9E4qiZVhtQ3+m6mevDsnml+XtdI+XK0NGULXGBc6tXfH2aeJDIXigdxP35ay+VjKAO3xaLq6onVHX6EwXAgMBAAECggEBAIIxBg9qW/Uu/INjMwXxyaW33p5WZwu6wMV8K7JOolomR09D1muxSB503Gxb/9Sr6IAxGWrCxm2aNSTsNI5kEcWsGFg+/07fuNdCIJF1r1uRqeztFCCd1b/Lwu225t1xOB/ugQHc05xrDxlDjaVLBmT1qxg68xg415SrmpOOSJk3E6Vs790VNqHK1KWpD6EpomZ8NrlJQQHX+ov9y81tIcpuk1LIqeyL9Ch7o3eVN4hgMr32d/OJu687XONXmLtSMmdIQyEJr/YDsemEFSCEJnBJ+v5excqxBuqDObjUdEEFUe/UNGBn227NnevmcqmRU404cbDwUXNCBZTbrbNFOOECgYEA1y6sPb3lb8v6OYdKc1lhfx3IWgDsShtbE7puma7oZSKoII5N2ufregV/x6xlLQH75LJmOaCOUZ8zpvu1BAKNo3aifIYIMEPoufrmSqEsoIaOjBCuym1DzUMRlAHA14C2diTB8QpsSLPjn2tl81fMSqQpQ02Pkyo1964Ybnt6u08CgYEAu24sf5NkZ/jCyClvr9RgSjuIYpHBqaiAHhcRL1tqi5jH08XQV3M1HpJMm26n6zl+M4SGNImOTt5si3WS+5ldzxgn2BjYUQohyXcg+7Xl1EwEV9nQ7H1LMZ7+KdiF3GkrmK6MAbtjLpFJwcEwjwlW0XwNCtWZP0kLqmt1Ot7eELkCgYEAr4hGPzNqN1GItGcVp5TxAHX2Gt2H40f/es9pK3rP3rhvt+b9waXQpEBaJTMPcbCdn8ibtUSw9ApPY1cPKc8/ZWoAUF4xzdWHwjbWp2hk9CnvnHh7bWvGlGmyrC7l9aXsseF4R7296Wy9MS22A9TKNNVHR7y8c0tKrNna2j1mN+cCgYEAip1MY31KAGrFAutCIjNakwu8LcnGBAcN2TMODov5HAx9nGzrTAF0A4wHA9yuaxQ19TvJVQl2KXXtqKXnchNWgVZIAVU+hZCMtEZaKk24D224uI/qJzvyZFxFdAUh2oQdLenIuW8wRrxEY/rQQriRcJPhwWV+1ILdEcgvBr7UVGECgYEAkR5ZoZplBfiGnX3S1CuNJM2UIIoorIKlT8lj6RUYdQoMNBXt7nkv3illXU88kUrW7IiQoKEnd5LiCKkYVNLWoobgZvURyF30jB5+AcSXNGxvCSMtMGcN1VGzeIBpz8JkCw+u9YnyvHvQoYrvd8RkV3EnLtJk5j5VoyJHTNeFb+w=',
    IcbcConstants::$SIGN_TYPE_RSA2,//签名类型，’CA’-工行颁发的证书认证;’RSA’表示RSAWithSha1;’RSA2’表示RSAWithSha256;缺省为RSA
    '',//字符集，仅支持UTF-8,可填空‘’
    '',//请求参数格式，仅支持json，可填空‘’
    'MIGfMA0GCSqGSIb3DQEBAQUAA4GNADCBiQKBgQCwFgHD4kzEVPdOj03ctKM7KV+16bWZ5BMNgvEeuEQwfQYkRVwI9HFOGkwNTMn5hiJXHnlXYCX+zp5r6R52MY0O7BsTCLT7aHaxsANsvI9ABGx3OaTVlPB59M6GPbJh0uXvio0m1r/lTW3Z60RU6Q3oid/rNhP3CiNgg0W6O3AGqwIDAQAB',//网关公钥，必填
    '',//AES加密密钥，缺省为空‘’
    '',//加密类型，当前仅支持AES加密，需要按照接口类型是否需要加密来设置，缺省为空‘’
    '',//当签名类型为CA时，通过该字段上送证书公钥，缺省为空
    '');//当签名类型为CA时，通过该字段上送证书密码，缺省为空
try{
    $resp = $client->execute($request,'11',''); //执行调用
    $respObj = json_decode($resp,true);

    $return_code = $respObj["return_code"];
    $return_msg = $respObj["return_msg"];
    if($respObj["return_code"] == 0){ //成功
        $accesstoken = $respObj["access_token"];
        $expiresin = $respObj["expires_in"];
        $reftoken = $respObj["refresh_token"];
        $openid = $respObj["open_id"];
        $unionid = $respObj["union_id"];

        echo "return_code : $return_code <br> ";
        echo "return_msg : $return_msg <br> ";
        echo "access_token : $accesstoken <br> ";
        echo "expires_in : $expiresin <br> ";
        echo "refresh_token : $reftoken <br> ";
        echo "open_id : $openid <br> ";
        echo "union_id : $unionid <br> ";
    }else{//失败
        echo "return_code : $return_code <br> ";
        echo "return_msg : $return_msg <br> ";;
    }
}catch(Exception $e){//捕获异常
    echo 'Exception:'.$e->getMessage()."\n";
}

?>