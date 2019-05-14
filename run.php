<?php
echo "Nomor: ";
$no = trim(fgets(STDIN));
echo "GrupID: ";
$reff = trim(fgets(STDIN));
echo "OTP: ";
$otp = trim(fgets(STDIN));

function register_mucho($reff, $no, $otp)
{
    $ch = curl_init();
    
    curl_setopt($ch, CURLOPT_URL, 'https://api.mucho.id/core/signup/mobile');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, "invitedBy=&invitedSource[type]=ramadhan&invitedSource[userId]=&invitedSource[groupId]=$reff&countryCode=62&mobile=$no&verificationCode=$otp&name=ArifMucho&password=arifmucho123");
    curl_setopt($ch, CURLOPT_POST, 1);
    
    $headers   = array();
    $headers[] = 'Host: api.mucho.id';
    $headers[] = 'Connection: keep-alive';
    $headers[] = 'Content-Length: 187';
    $headers[] = 'Accept: application/json, text/plain, */*';
    $headers[] = 'Origin: https://mucho.id';
    $headers[] = 'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.131 Safari/537.36';
    $headers[] = 'Content-Type: application/x-www-form-urlencoded';
    /**$headers[] = 'Referer: https://mucho.id/g/ramadhan/g253j062fz832/signup?campaign=ramadhan&groupId=g253j062fz832&inAppPath=mucho%3A%2F%2FWebView%2Fhttps%3A%2F%2Fwww.mucho.id%2Fgame%2Framadhan';**/
    $headers[] = 'Accept-Encoding: gzip, deflate, br';
    $headers[] = 'Accept-Language: id-ID,id;q=0.9,en-US;q=0.8,en;q=0.7';
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    
    $result = curl_exec($ch);
    $hasil  = json_encode($result);
    if (curl_errno($ch)) {
        echo 'Error:' . curl_error($ch);
    }
    curl_close($ch);
}
$arif = register_mucho("$reff", "$no", "$otp");
?>