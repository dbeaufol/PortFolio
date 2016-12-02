<?php
//decalage de 3
$input ="toto";
$newInput ="";

$len = strlen($input);
for($i=0;$i<$len;$i++) {
  $ASCII = ord($input[$i]);
  $newASCII = $ASCII + 3;
  if($newASCII > 122){
    $newASCII = $newASCII - 26;
  }
  $res = chr($newASCII);
  $newInput = $newInut.$res;
}

$output = "wrwr";
echo $input . "--" . $newInput . '<br>';
if($newInput == $output){
  echo "Test OK";
}else{
  echo "Test Echec";
}
