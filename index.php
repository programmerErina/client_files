<?php

// get access token....
extract($_POST);
extract($_GET);
if(isset($token)) {
$curl = curl_init();    
    $headers = [
        'Content-Type: application/x-www-form-urlencoded',
    ];
    $url = 'https://api.prokerala.com/token';
    $request = 'grant_type=client_credentials&client_id=89de0260-00ee-4d17-8fb1-e607c139b462&client_secret=VRaTBVJPPrQTg36DS7ZkJTOQMurLy3tlVs3wXoBJ';
    $options = [
        CURLOPT_URL => $url,
        CURLOPT_POSTFIELDS => $request,
        CURLOPT_HTTPHEADER => $headers,
    ];
    curl_setopt_array($curl, $options);
    curl_exec($curl);
    curl_close($curl);
}elseif(isset($access_token)) {
$curl = curl_init();     
    $headers = [
        "Content-Type: $ctype",
        "Authorization: Bearer ". base64_decode($access_token)
    ];
    $options = [
        CURLOPT_URL=>base64_decode($url),
        CURLOPT_HTTPHEADER=>$headers,
    ];
    curl_setopt_array($curl, $options);
    curl_exec($curl);
    curl_close($curl);
}else{
    echo json_encode(['error'=>'ERROR::.....no-param-found.....']);
}
?>
