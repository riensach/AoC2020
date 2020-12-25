<?php

$cardPublicKey = 8335663;
$doorPublicKey = 8614349;
//
//$cardPublicKey = 5764801;
//$doorPublicKey = 17807724;

$divideBy = 20201227;

$startingValue = 1;
$subjectNumber = 7;

$cardLoopSize = 0;
$doorLoopSize = 0;
$time_pre = microtime(true);
$currentValue = $startingValue;
for ($x = 1; $x < 1000000001; $x++) {
    $currentValue = $currentValue * $subjectNumber;
    $currentValue = $currentValue % $divideBy;
    if($currentValue == $cardPublicKey) {
        $cardLoopSize = $x;
        echo "Found the card loop size after $x iterations: $currentValue<br>";
        break;
    }
}

$currentValue = $startingValue;
for ($x = 1; $x < 1000000001; $x++) {
    $currentValue = $currentValue * $subjectNumber;
    $currentValue = $currentValue % $divideBy;
    if($currentValue == $doorPublicKey) {
        $doorLoopSize = $x;
        echo "Found the door loop size after $x iterations: $currentValue<br>";
        break;
    }
}

//$currentValue = $startingValue;
//for ($x = 1; $x <= $cardLoopSize; $x++) {
//    $currentValue = $currentValue * $doorPublicKey;
//    if($x==$cardLoopSize) {
//        $encryptionKey = $currentValue % $divideBy;
//        echo "Cur var: $currentValue :: $encryptionKey after $x loops<br>";
//    }
//}

$encryptionKey = $startingValue;
for ($x = 1; $x <= $doorLoopSize; $x++) {
    $encryptionKey = $encryptionKey * $cardPublicKey;
    $encryptionKey = $encryptionKey % $divideBy;

}

echo "Got here - encryption key: $encryptionKey<br>";

// Time stuff
$time_post = microtime(true);
$exec_time = $time_post - $time_pre;
echo "<br><br>Spent $exec_time seconds so far<br>";


