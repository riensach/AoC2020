<?php

$puzzleInput = "1015292
19,x,x,x,x,x,x,x,x,41,x,x,x,x,x,x,x,x,x,743,x,x,x,x,x,x,x,x,x,x,x,x,13,17,x,x,x,x,x,x,x,x,x,x,x,x,x,x,29,x,643,x,x,x,x,x,37,x,x,x,x,x,x,x,x,x,x,x,x,x,x,x,x,23";

//$puzzleInput = "939
//7,13,x,x,59,x,31,19";
//
//$puzzleInput = "939
//17,x,13,19";
//$puzzleInput = "939
//67,x,7,59,61";
//$puzzleInput = "939
//67,7,x,59,61";
//$puzzleInput = "939
//1789,37,47,1889";

$inputArray = explode("\n",$puzzleInput);
$time_pre = microtime(true);
$earliestDepart = trim($inputArray[0]);


$busInputArray = explode(",",$inputArray[1]);
$busArray = array();
foreach($busInputArray as $key => $value) {
    if($value<>'x') {
        $busArray[$key] = $value;
    }
}

$urlString = "solve ";
foreach($busArray as $key => $value) {
    // This is saying: time (t) + offset (key) modular (remainder) for the bus timer (value) should equal 0, and adding them together for all the numbers
    // Wolframalpha then solves the actual calculation for us
    echo "remainder: $key - value:$value<br>";
    $urlString .= "(t + $key) mod $value = 0;";
}

echo "<br><Br>Visit https://www.wolframalpha.com/input/?i=" . urlencode($urlString) . "\n";

// Time stuff
$time_post = microtime(true);
$exec_time = $time_post - $time_pre;
echo "<br><br>Spent $exec_time seconds so far<br>";
//150000000000019 too low
// 190000000000019 too low
// 210000000000019 too low
// 410000000000019
// 1000000000000000
// 70657995610131930 wrong
// t = 2029817890655789 n + 1001569619313439, n element Z

// 1001569619313439