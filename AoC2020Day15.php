<?php


$puzzleInput = "1,20,8,12,0,14";

//$puzzleInput = "0,3,6";

$time_pre = microtime(true);
$inputArray = explode(",",$puzzleInput);
$spokenWords = array();
foreach($inputArray as $key => $value) {
    $valueInfo = $key+1;
    $spokenNumbersLastTime[$value] = $valueInfo.",1,".$valueInfo;
    $lastNumbersSpoken = (int)$value;

}
$iterator = count($spokenNumbersLastTime);
$lastNumberSpoken = $lastNumbersSpoken;

while($iterator < 30000001) {
    $timesSpokenLastNumber = explode(",",$spokenNumbersLastTime[$lastNumberSpoken]);
    $timesSpokenLastNumber =$timesSpokenLastNumber[1];
    //echo "Last number spoken is $lastNumberSpoken and it has been spoken $timesSpokenLastNumber times<br>";
    if($timesSpokenLastNumber<2) {
        // First time it was spoken, so say 0
        $valueToSpeak = 0;
    } else {
        // Need to find when it was previously spoken
        //$tempArray = $lastNumbersSpoken;
       // array_pop($tempArray);
        //$tempArray = array_reverse($tempArray,true);
        $lastTimeSpokenArray = explode(",",$spokenNumbersLastTime[$lastNumberSpoken]);
        $lastTimeSpoken = $lastTimeSpokenArray[2];
        if($lastTimeSpokenArray[2]==$iterator) {
            $lastTimeSpoken = $lastTimeSpokenArray[0];
        }
        //var_dump($lastNumbersSpoken);
        //var_dump($tempArray);
        //echo "Last time spoken for $lastNumberSpoken is $lastTimeSpoken, and we're currently on play $iterator<br>";
        $valueToSpeak = ($iterator) - ($lastTimeSpoken);
    }

    if(isset($spokenNumbersLastTime[$valueToSpeak])) {
        $valueInfo = $iterator+1;
        $timesSpokenArray = explode(",",$spokenNumbersLastTime[$valueToSpeak]);
        $timesSpoken = $timesSpokenArray[1]+1;
        $spokenNumbersLastTime[$valueToSpeak] = $timesSpokenArray[2].",$timesSpoken,$valueInfo";
      //  echo "Updating values for $valueToSpeak - $valueInfo,$timesSpoken<br>";
    } else {
        $valueInfo = $iterator+1;
        $spokenNumbersLastTime[$valueToSpeak] = $valueInfo.",1,".$valueInfo;
    }
    $lastNumberSpoken = $valueToSpeak;
    //echo "Speaking number $valueToSpeak<Br>";
    $iterator++;

    // Time stuff
    if($iterator % 100000 == 0) {
        $time_post = microtime(true);
        $exec_time = $time_post - $time_pre;
        echo "<br>Spent $exec_time seconds so far for iteration $iterator<br>";
    }
    if($iterator == 2020) {
        $lastNumbersSpoken2020 = $lastNumberSpoken;
    }
    if($iterator == 30000000) {
        $lastNumbersSpoken30000000 = $lastNumberSpoken;
    }

}
//var_dump($spokenNumbersLastTime);
$numSpoken = $lastNumbersSpoken2020;
echo "The 2020th number spoken is $numSpoken<br>";
$numSpoken = $lastNumbersSpoken30000000;
echo "The 30000000th number spoken is $numSpoken<br>";

// 10000000
// 30000000


// Time stuff
$time_post = microtime(true);
$exec_time = $time_post - $time_pre;
echo "<br>Spent $exec_time seconds so far<br>";

// too high 1356