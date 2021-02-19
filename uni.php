<?php
 

function login($url,$data){
    $fp = fopen("cookie.txt", "w");
    fclose($fp);
    $login = curl_init();
    curl_setopt($login, CURLOPT_COOKIEJAR, "cookie.txt");
    curl_setopt($login, CURLOPT_COOKIEFILE, "cookie.txt");
    curl_setopt($login, CURLOPT_TIMEOUT, 40000);
    curl_setopt($login, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($login, CURLOPT_URL, $url);
    curl_setopt($login, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
    curl_setopt($login, CURLOPT_FOLLOWLOCATION, TRUE);
    curl_setopt($login, CURLOPT_POST, TRUE);
    curl_setopt($login, CURLOPT_POSTFIELDS, $data);
    ob_start();
    return curl_exec ($login);
    ob_end_clean();
    curl_close ($login);
    unset($login);    
}                  
 
function grab_page($site){
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
    curl_setopt($ch, CURLOPT_TIMEOUT, 40);
    curl_setopt($ch, CURLOPT_COOKIEFILE, "cookie.txt");
    curl_setopt($ch, CURLOPT_URL, $site);
    ob_start();
    return curl_exec ($ch);
    ob_end_clean();
    curl_close ($ch);
}
 
function post_data($site,$data){
    $datapost = curl_init();
        $headers = array("Expect:");
    curl_setopt($datapost, CURLOPT_URL, $site);
        curl_setopt($datapost, CURLOPT_TIMEOUT, 40000);
    curl_setopt($datapost, CURLOPT_HEADER, TRUE);
        curl_setopt($datapost, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($datapost, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
    curl_setopt($datapost, CURLOPT_POST, TRUE);
    curl_setopt($datapost, CURLOPT_POSTFIELDS, $data);
        curl_setopt($datapost, CURLOPT_COOKIEFILE, "cookie.txt");
    ob_start();
    return curl_exec ($datapost);
    ob_end_clean();
    curl_close ($datapost);
    unset($datapost);    
}

echo login('https://exams.mlrinstitutions.ac.in/Login.aspx','__EVENTTARGET=&__EVENTARGUMENT=&__VIEWSTATE=%2FwEPDwUKLTMwMTg5NjI5NA9kFgICAw9kFgYCBQ8PFgIeB1Zpc2libGVoZGQCCw8PFgIeBFRleHRkZGQCDQ8PFgIfAGdkFgQCAQ8PFgofAQUNU3R1ZGVudCBMb2dpbh4JRm9yZUNvbG9yCiMeCUZvbnRfQm9sZGceCUZvbnRfU2l6ZSgqIlN5c3RlbS5XZWIuVUkuV2ViQ29udHJvbHMuRm9udFVuaXQEMThwdB4EXyFTQgKEGGRkAhEPDxYCHwFkZGRkgEFLHsyoKwZ%2FICm179ENxpyIwfvPiL%2FHA5l3WrGx5ps%3D&__VIEWSTATEGENERATOR=C2EE9ABB&__EVENTVALIDATION=%2FwEdAAlpLn1p0MFjhnKMOb0qMu4YELYayygIrYKbL%2FDx4x5DdMr%2FoJFE%2BeOmI%2BwQrfEPHbtpOCqQ5ELEfO%2BO75msrGKkDlm4ViRSj8IOmM%2BvzfHmfTPSlu16Yx4QbiDU%2BdddK1OinihG6d%2FXh3PZm3b5AoMQ%2BOt37oCEEXP3EjBFcbJhKCh34ya5objibTUZ9mTnN%2BR9d5irnSbb8uAAxsfgvGMpJiSwxAyVfgu%2BMP8mcH3ABw%3D%3D&txtUserId=19R21A0395&txtPwd=19R21A0395&btnLogin=Login');
?>

<?php
echo grab_page("https://exams.mlrinstitutions.ac.in/Login.aspx");
 
?>