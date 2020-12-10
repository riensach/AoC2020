<?php

$puzzleInput = "67
118
90
41
105
24
137
129
124
15
59
91
94
60
108
63
112
48
62
125
68
126
131
4
1
44
77
115
75
89
7
3
82
28
97
130
104
54
40
80
76
19
136
31
98
110
133
84
2
51
18
70
12
120
47
66
27
39
109
61
34
121
38
96
30
83
69
13
81
37
119
55
20
87
95
29
88
111
45
46
14
11
8
74
101
73
56
132
23";

$puzzleInput = "28
33
18
42
31
14
46
20
48
47
24
23
49
45
19
38
39
11
1
32
25
35
8
17
7
9
4
2
34
10
3";

//$puzzleInput = "16
//10
//15
//5
//1
//11
//7
//19
//6
//12
//4";

// 1, 2, or 3 lower
// Adaptor = 3 jolts higher

$time_pre = microtime(true);

$inputArray = explode("\n",$puzzleInput);

foreach($inputArray as $key => $value) {
    $inputArray[$key] = (int)$value;
}
$ratedJolts = max($inputArray)+3;
sort($inputArray);

//echo "$ratedJolts<br>";



$oneJoltDifferences = 0;
$twoJoltDifferences = 0;
$threeJoltDifferences = 0;
array_unshift($inputArray,0);
foreach($inputArray as $key => $value) {
    if(!isset($inputArray[$key+1])) {
        $joltComparisonValue = $ratedJolts;
    } else {
        $joltComparisonValue = $inputArray[$key+1];
    }
    if($joltComparisonValue-$inputArray[$key]==1) {
        $oneJoltDifferences++;
    } elseif($joltComparisonValue-$inputArray[$key]==2) {
        $twoJoltDifferences++;
    } elseif($joltComparisonValue-$inputArray[$key]==3) {
        $threeJoltDifferences++;
    }
}
$totalDistinctPaths = 1;
$previousDistinctPaths = array();
//var_dump($inputArray);
$treeArray = array();
foreach($inputArray as $key => $value) {
    $distinctPaths = 0;
    foreach($inputArray as $key2 => $value2) {
        $comparisonValue = $value2-$value;
        if($comparisonValue > 0 && $comparisonValue < 4) {
            $distinctPaths++;
            $treeArray[] = array('id' =>$key2, 'parent_id' =>$key, 'my_value' => $value2, 'parent_value' => $value);
        }
    }
    $previousDistinctPaths[$key] = $distinctPaths;
    $distinctPathsTree = 0;
}

//var_dump($treeArray);
krsort($previousDistinctPaths);
var_dump($previousDistinctPaths);

$totalValue = 1;
$iteration = 1;
foreach($previousDistinctPaths as $key => $value) {

    $newTotal = ($key * $value) * ($key * $value) / 2;

    $totalValue += $newTotal;
    $iteration++;
}

echo "Maybe the answer is $totalValue<br><br>";

$arraySize = count($inputArray);




$tree = buildTree($treeArray);
echo "<code>";
//var_dump($tree);
echo "</code>";
function buildTree($items) {

    $childs = [];

    foreach ($items as &$item) $childs[$item['parent_id']][] = &$item;
    unset($item);

    foreach ($items as &$item) if (isset($childs[$item['id']]))
        $item['childs'] = $childs[$item['id']];

    return $childs[0];
}






$countUnique = 0;

function test_print($item, $key)
{
    global $countUnique;
    //echo "$key holds $item\n";
    $countUnique++;
}



array_walk_recursive($tree, 'test_print');
$test = ($countUnique/12);
echo "hello: $test<br>";





//$dispaths = distinctPaths($inputArray,0,$arraySize);

function distinctPaths($adaptorArray,$currentPosition,$arraySize):int {
    global $time_pre;
    $distinctPathsTree = 0;
        while (key($adaptorArray) !== $currentPosition) next($adaptorArray);
        $iterator = $currentPosition;
        while($iterator < $arraySize) {
            $distinctPaths = 0;
            $distinctPathIDs = array();
            $value = $adaptorArray[$iterator];

            foreach ($adaptorArray as $key2 => $value2) {
                $comparisonValue = $value2 - $value;
                if ($comparisonValue >= 1 && $comparisonValue <= 3) {
                    $distinctPaths++;
                    $distinctPathIDs[$key2] = $value2;
                }
            }

            if ($distinctPaths > 1) {
                foreach ($distinctPathIDs as $key2 => $value2) {
                    $distinctPathsTree += distinctPaths($adaptorArray, $key2, $arraySize);
                }
                $time_post = microtime(true);
                $exec_time = $time_post - $time_pre;
//                if($exec_time % 10 == 0 && $exec_time > 1) {
//                    echo "Total distinct paths so far: $distinctPathsTree after $exec_time seconds<br>";
//                }
                return $distinctPathsTree;
            } else {
                $iterator++;
                continue;
            }
        }
    return 1;

}


echo "Total distinct paths:$dispaths<br>";


$joltCalculation = $oneJoltDifferences * $threeJoltDifferences;

//echo "There are $oneJoltDifferences one-jolt differences and $threeJoltDifferences three-jolt differences.<br>The calculation then leads to $joltCalculation<br>";


// Time stuff
$time_post = microtime(true);
$exec_time = $time_post - $time_pre;
echo "<br>Spent $exec_time seconds so far<br>";
