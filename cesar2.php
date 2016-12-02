<?php
$alphabet = "abcdefghijklmnopqrstuvwxyz";
$alpCesar = str_split($alphabet . $alphabet);
$input = "bonne chance";
echo $input . '<br>';
$arrInput = str_split($input);

foreach($arrInput as $key => $value){
    $pos = strpos($alphabet, $value);
    if($pos === false) {
        echo " ";
    } else {
        echo $alpCesar[$pos + 3];
    }
}
