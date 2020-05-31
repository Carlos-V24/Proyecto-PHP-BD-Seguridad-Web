<?php
//funciones para cifrar
define("PASSWORD","L0r3m_1psum-d0l0r#s1t$4m3t");
define("HASH","sha256");
define("METHOD","aes-128-cbc");
function Cifrar($text){
  $key= openssl_digest(PASSWORD, HASH);
  $iv_len= openssl_cipher_iv_length(METHOD);
  $iv=openssl_random_pseudo_bytes($iv_len);
  $rawCif=openssl_encrypt($text,METHOD,$key,OPENSSL_RAW_DATA,$iv);
  $textoCifrado= base64_encode($iv.$rawCif);
  return $textoCifrado;
}

//funciones para descifrar
function Descifrar($textoCifrado){
  $key= openssl_digest(PASSWORD, HASH);
  $iv_len= openssl_cipher_iv_length(METHOD);
  $cifrado= base64_decode($textoCifrado);
  $iv= substr($cifrado, 0, $iv_len);
  $rawCif= substr($cifrado, $iv_len);
  $text=openssl_decrypt($rawCif,METHOD,$key,OPENSSL_RAW_DATA,$iv);
  return $text;
}
?>
