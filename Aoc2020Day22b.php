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

//$puzzleInput1 = "43
//19";
//
//$puzzleInput2 = "2
//29
//14";
$time_pre = microtime(true);
$player1Deck = explode("\n",$puzzleInput1);
$player2Deck = explode("\n",$puzzleInput2);
//$player1Deck = array_map(‘intval’, $player1Deck);
//$player2Deck = array_map(‘intval’, $player2Deck);
foreach($player1Deck as $key => $value) {
    $player1Deck[$key] = (int)$value;
}
foreach($player2Deck as $key => $value) {
    $player2Deck[$key] = (int)$value;
}
$player1OriginalDeck = $player1Deck;
$player2OriginalDeck = $player2Deck;
$currentWinningDeck = array();
function combatWinner($player1Deck,$player2Deck) {
    global $currentWinningDeck;
    $x = 1;
    $previousDecks = array();
    while($x > 0) {

        $player1Card = $player1Deck[0];
        $player2Card = $player2Deck[0];
        $player1CardCount = count($player1Deck);
        $player2CardCount = count($player2Deck);
        $combinedArray = array_merge($player1Deck, array('break'), $player2Deck);
        $currentDecks = serialize($combinedArray);

        if (in_array($currentDecks, $previousDecks)) {
            // Player 1 wins!
            //echo "made it here";
            return 1;
        }
        $previousDecks[] = $currentDecks;

        if ($player1CardCount <= $player1Card || $player2CardCount <= $player2Card) {
            //echo "Normal combat<br>";
            //$list = implode(', ', $player1Deck);
            //echo "$list <br>";
            //$list = implode(', ', $player2Deck);
            //echo "$list <br>";
            // Normal round
            if ($player1Card > $player2Card) {
                $player1Deck[] = $player1Card;
                $player1Deck[] = $player2Card;
            } elseif ($player1Card < $player2Card) {
                $player2Deck[] = $player2Card;
                $player2Deck[] = $player1Card;
            }
        } else {
            //echo "Recursive combat<br>";
            //$list = implode(', ', $player1Deck);
            //echo "$list <br>";
            //$list = implode(', ', $player2Deck);
            //echo "$list <br>";
            // Recursive combat
            // We're here because both players have at least the number of cards as the value of their card
            // Everytime this rule is trigger, we go into a new sub-game to decide the winner then we impact the game above
            $player1SubDeck = array_slice ($player1Deck,1,$player1Deck[0]);
            $player2SubDeck = array_slice ($player2Deck,1,$player2Deck[0]);


            $subGameWinner = combatWinner($player1SubDeck, $player2SubDeck);
            if ($subGameWinner == 1) {
                $player1Deck[] = $player1Card;
                $player1Deck[] = $player2Card;
            } else {
                $player2Deck[] = $player2Card;
                $player2Deck[] = $player1Card;
            }
        }
        array_shift($player1Deck);
        array_shift($player2Deck);
//    echo "<br>Round $iteration<br>";
//    var_dump($player1Deck);
//    var_dump($player2Deck);

        if (count($player1Deck) == 0) {
            $currentWinningDeck = $player2Deck;
            return 2;
        } elseif (count($player2Deck) == 0) {
            $currentWinningDeck = $player1Deck;
            return 1;

        }
    }
}

$winnerID = combatWinner($player1Deck,$player2Deck);

if($winnerID == 1) {
    $winningScore = calculateScore($currentWinningDeck);
} else {
    $winningScore = calculateScore($currentWinningDeck);
}

function calculateScore($cardDeck) {
    $totalScore = 0;
    $cardDeck = array_reverse($cardDeck);
    foreach($cardDeck as $key => $value) {
        $totalScore += (($key+1) * $value);
    }
    return $totalScore;
}

echo "The game ended. The winning score is $winningScore.<br>";

// Time stuff
$time_post = microtime(true);
$exec_time = $time_post - $time_pre;
echo "<br><br>Spent $exec_time seconds so far<br>";
