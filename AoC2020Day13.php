<?php

$puzzleInput = "1015292
19,x,x,x,x,x,x,x,x,41,x,x,x,x,x,x,x,x,x,743,x,x,x,x,x,x,x,x,x,x,x,x,13,17,x,x,x,x,x,x,x,x,x,x,x,x,x,x,29,x,643,x,x,x,x,x,37,x,x,x,x,x,x,x,x,x,x,x,x,x,x,x,x,23";

//$puzzleInput = "939
//7,13,x,x,59,x,31,19";

$inputArray = explode("\n",$puzzleInput);

$earliestDepart = trim($inputArray[0]);

$busInputArray = explode(",",$inputArray[1]);
$busArray = array();
foreach($busInputArray as $key => $value) {
    if($value<>'x') {
        $busArray[$value] = $value;
    }
}

$departTimes = array();

foreach($busArray as $key => $value) {

    $multiplyAbove = ceil($earliestDepart / $value);
    $multiplyBelow = floor($earliestDepart / $value);
    $actualTime = $value * $multiplyAbove;
    $actualTime2 = $value * $multiplyBelow;
    $difAbove = abs($earliestDepart - $actualTime);
    $difBelow = abs($earliestDepart - $actualTime2);
    echo "Option of  for $key :: $earliestDepart - $value :: $actualTime - $actualTime2 - $multiplyAbove - $multiplyBelow - $difAbove - $difBelow<Br>";
    $departTimes[$key] = $actualTime;
}

var_dump($departTimes);
asort($departTimes);
reset($departTimes);
var_dump($departTimes);
$busID = array_key_first($departTimes);
$busTime = current($departTimes);

echo "Earliest depart time of $busTime for bus ID $busID - $earliestDepart<br><br>";

// calc
$minutesTaken = floor($earliestDepart / $busID);
$totalBusMinutes = ($busID * $minutesTaken);
$remainingMinutes = $earliestDepart % $totalBusMinutes;
$waitMinutes = ($totalBusMinutes + $busID) - $earliestDepart;
$finalCalc = $busID * $waitMinutes;


echo "Wait minutes of $remainingMinutes for Bus $busID = final count of $finalCalc<br><br>";

echo "$earliestDepart - $busID - $minutesTaken - $busTime - $totalBusMinutes - $waitMinutes<br><br>";

// too high 289027

// 3215