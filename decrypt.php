<?php

$array_input = $_POST;
$key = $array_input['key'];
$str = base64_decode($array_input['decrypt_text'].$key);
$str = explode($key, $str);
$str = $str[0];
$result = str_rot($str, $array_input['k']);
echo json_encode($result);

function str_rot($s, $n = 13) {
    static $letters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $n = (int)$n % 26;
    if (!$n) return $s;
    if ($n == 13) return str_rot13($s);
    for ($i = 0, $l = strlen($s); $i < $l; $i++) {
        $c = $s[$i];
        if ($c >= 'a' && $c <= 'z') {
            $s[$i] = $letters[(ord($c) - 71 + $n) % 26];
        } else if ($c >= 'A' && $c <= 'Z') {
            $s[$i] = $letters[(ord($c) - 39 + $n) % 26 + 26];
        }
    }
    return $s;
}