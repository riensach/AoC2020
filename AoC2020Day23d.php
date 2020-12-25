<?php

$input = 193467258;

$input = 389125467;
$time_pre = microtime(true);
$cards = new \Ds\Deque([]);

$inputArray = str_split($input, 1);

foreach($inputArray as $key => $value) {
    $cards->push((int)$value);
}
for ($x = 10; $x < 1000001; $x++) {
    $cards->push($x);
}

//var_dump($cards->toArray());

$moveCount = 1;
$finalCupPositions = implode('', $cards->toArray());
//echo "Start: $finalCupPositions<br>";
// Time stuff
$time_post = microtime(true);
$exec_time = $time_post - $time_pre;
echo "<br><br>Spent $exec_time seconds so far<br>\n";
while($moveCount < 10000001) {

    $currentValue = $cards->first();
    $cupPickup1Value = $cards->get(1);
    $cupPickup2Value = $cards->get(2);
    $cupPickup3Value = $cards->get(3);
    $cupPickup4Value = $cards->get(4);
    $cupPickup5Value = $cards->get(5);
    $cupPickup6Value = $cards->get(6);
    $cupPickup7Value = $cards->get(7);
    $cupPickup8Value = $cards->get(8);
    $destinationCup = $currentValue - 1;
    if($destinationCup < 1) {
        $destinationCup = 1000000;
    }
    while($destinationCup == $cupPickup1Value || $destinationCup == $cupPickup2Value || $destinationCup == $cupPickup3Value || $destinationCup == $currentValue) {
        $destinationCup--;
        if($destinationCup < 1) {
            $destinationCup = 1000000;
        }
    }
    $cards->rotate(1);
    $cards->shift();
    $cards->shift();
    $cards->shift();
    $cards->rotate(-1);

    $destinationPosition = $cards->find($destinationCup);






    $finalCupPositions = implode('', $cards->toArray());
    $cards->rotate($destinationPosition+1);
    $finalCupPositions = implode('', $cards->toArray());
    $cards->unshift($cupPickup3Value);
    $cards->unshift($cupPickup2Value);
    $cards->unshift($cupPickup1Value);
    $cards->rotate(-1);
    $finalCupPositions = implode('', $cards->toArray());
    $cards->rotate(-$destinationPosition + 1);
    $finalCupPositions = implode('', $cards->toArray());


    // Time stuff
    if($moveCount % 10000 == 0) {
        $time_post = microtime(true);
        $exec_time = $time_post - $time_pre;
        echo "<br>Spent $exec_time seconds so far for iteration $moveCount<br>\n";
        //ob_flush();
        //flush();
    }
    $moveCount++;
}

$destinationPosition = $cards->find(1);
$cards->rotate($destinationPosition);
$cards->remove(0);
$finalCupPositions = implode('', $cards->toArray());

echo "After 10000001 moves, the cups are arranged after 1 as follows: $finalCupPositions\n";



$destinationPosition = $cards->find(1);
$cards->rotate($destinationPosition+1);
$value1 = $cards->shift();
$value2 = $cards->shift();

$finalValue = $value1 * $value2;


echo "After 10000001 moves, the final value is : $finalValue ($value1 * $value2)\n";

// Time stuff
$time_post = microtime(true);
$exec_time = $time_post - $time_pre;
echo "<br><br>Spent $exec_time seconds so far<br>";
