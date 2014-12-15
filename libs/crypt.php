<?php
/** 複合化 */
function decryptedData($input,$key)
{
    $td = mcrypt_module_open(MCRYPT_TRIPLEDES,'','cbc','');
    
    // key（最大キー長に）
    $ks = mcrypt_enc_get_key_size($td);
    $key = substr(md5($key), 0, $ks);

    // iv
    $ivsize = mcrypt_enc_get_iv_size($td);
    $iv = substr(md5($key), 0, $ivsize);
  
    mcrypt_generic_init($td, $key, $iv);
    $decrypted_data = mdecrypt_generic($td, base64_decode($input));

    mcrypt_generic_deinit($td);
    mcrypt_module_close($td);

    //return $decrypted_data;
    return rtrim($decrypted_data,"\0");
}

/** 暗号化 */
function encryptedData($input,$key)
{
    $td = mcrypt_module_open(MCRYPT_TRIPLEDES,'','cbc','');

    // key（最大キー長に）
    $ks = mcrypt_enc_get_key_size($td);
    $key = substr(md5($key), 0, $ks);

    // iv
    $ivsize = mcrypt_enc_get_iv_size($td);
    $iv = substr(md5($key), 0, $ivsize);
    
    //暗号と複合が同じKeyじゃないとダメみたい。
    //srand();
    //$iv = mcrypt_create_iv(mcrypt_enc_get_iv_size($td), MCRYPT_RAND);

    mcrypt_generic_init($td, $key, $iv);
    $encrypted_data = mcrypt_generic($td, $input);

    mcrypt_generic_deinit($td);
    mcrypt_module_close($td);
    return base64_encode($encrypted_data);
}

?>
