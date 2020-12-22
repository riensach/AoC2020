<?php
$puzzleInput1 = "31
24
5
33
7
12
30
22
48
14
16
26
18
45
4
42
25
20
46
21
40
38
34
17
50";

$puzzleInput2 = "1
3
41
8
37
35
28
39
43
29
10
27
11
36
49
32
2
23
19
9
13
15
47
6
44";


//$puzzleInput1 = "9
//2
//6
//3
//1";
//
//$puzzleInput2 = "5
//8
//4
//7
//10";


$player1Deck = explode("\n",$puzzleInput1);
$player2Deck = explode("\n",$puzzleInput2);

foreach($player1Deck as $key => $value) {
    $player1Deck[$key] = (int)$value;
}
foreach($player2Deck as $key => $value) {
    $player2Deck[$key] = (int)$value;
}
$isGameOver = 0;
$iteration = 0;
while($isGameOver == 0) {

    $player1Card = $player1Deck[0];
    $player2Card = $player2Deck[0];

    if($player1Card > $player2Card) {
        $player1Deck[] = $player1Card;
        $player1Deck[] = $player2Card;
    } elseif($player1Card < $player2Card) {
        $player2Deck[] = $player2Card;
        $player2Deck[] = $player1Card;
    }
    array_shift($player1Deck);
    array_shift($player2Deck);
//    echo "<br>Round $iteration<br>";
//    var_dump($player1Deck);
//    var_dump($player2Deck);


    if(count($player1Deck) == 0 || count($player2Deck) == 0) {
        $isGameOver = 1;
    }
    $iteration++;
}
$player1CardCount = count($player1Deck);
$player2CardCount = count($player2Deck);
if($player1CardCount > 0) {
    $winningScore = calculateScore($player1Deck);
} else {
    $winningScore = calculateScore($player2Deck);
}

function calculateScore($cardDeck) {
    $totalScore = 0;
    $cardDeck = array_reverse($cardDeck);
    foreach($cardDeck as $key => $value) {
        $totalScore += (($key+1) * $value);
    }
    return $totalScore;
}

echo "The game ended after $iteration rounds with Player 1 holding $player1CardCount cards and Player 2 holding $player2CardCount cards. The winning score is $winningScore.<br>";
