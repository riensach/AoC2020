<?php

$puzzleInput = "..#..#..
.###..#.
#..##.#.
#.#.#.#.
.#..###.
.....#..
#...####
##....#.";

//$puzzleInput = ".#.
//..#
//###";

$time_pre = microtime(true);

$inputArray = explode("\n",$puzzleInput);
$cubeArray = array();
$cubeArrayInactive = array();
$cubeArrayFull = array();
$cubeArrayFullComplete = array();
$cubeArrayInactiveFull = array();
$cubeArrayFullTemp = array();

$depthVariable = 15;

foreach($inputArray as $key => $value) {
    $rowArrayInfo = str_split(trim($value),1);
    $rowArray = array();
    $rowArrayInactive = array();
    foreach($rowArrayInfo as $key2 => $value2) {
        $rowArray[] = $value2;
        $rowArrayInactive[] = '.';
    }
    $cubeArray[] = $rowArray;
    $cubeArrayInactive[] = $rowArrayInactive;

}

for ($x = -$depthVariable; $x < $depthVariable; $x++) {

    $rowArrayFull = array();
    $rowArrayInactiveFull = array();
    for ($y = -15; $y < 15; $y++) {
        if(isset($cubeArray[$x][$y])) {
            $rowArrayFull[] = $cubeArray[$x][$y];
        } else {
            $rowArrayFull[] = '.';
        }
        $rowArrayInactiveFull[] = '.';
    }
    $cubeArrayFullTemp[] = $rowArrayFull;
    $cubeArrayInactiveFull[] = $rowArrayInactiveFull;
}



for ($x = -$depthVariable; $x < $depthVariable; $x++) {
    $cubeArrayFull[$x] = $cubeArrayInactiveFull;
}
for ($x = -$depthVariable; $x < $depthVariable; $x++) {
    $cubeArrayFullComplete[$x] = $cubeArrayFull;
}
$cubeArrayFullComplete[0][0] = $cubeArrayFullTemp;






printGrid($cubeArrayFullComplete[0][0]);

for ($x = 0; $x < 6; $x++) {
    $tempCubeArray = $cubeArrayFullComplete;
    foreach ($tempCubeArray as $keyw => $wLayer) { // New layer here
        foreach ($wLayer as $key => $zLayer) {
            foreach ($zLayer as $key2 => $yLayer) {
                foreach ($yLayer as $key3 => $xLayer) {
                    //die();

                    $myCube = $cubeArrayFullComplete[$keyw][$key][$key2][$key3];

                    $cubeLeft = $cubeArrayFullComplete[$keyw][$key][$key2][$key3 - 1] ?? -1;
                    $cubeRight = $cubeArrayFullComplete[$keyw][$key][$key2][$key3 + 1] ?? -1;
                    $cubeAbove = $cubeArrayFullComplete[$keyw][$key][$key2 - 1][$key3] ?? -1;
                    $cubeBelow = $cubeArrayFullComplete[$keyw][$key][$key2 + 1][$key3] ?? -1;
                    $cubeLeftUp = $cubeArrayFullComplete[$keyw][$key][$key2 - 1][$key3 - 1] ?? -1;
                    $cubeRightUp = $cubeArrayFullComplete[$keyw][$key][$key2 - 1][$key3 + 1] ?? -1;
                    $cubeLeftDown = $cubeArrayFullComplete[$keyw][$key][$key2 + 1][$key3 - 1] ?? -1;
                    $cubeRightDown = $cubeArrayFullComplete[$keyw][$key][$key2 + 1][$key3 + 1] ?? -1;

                    $cubeLeftZ1 = $cubeArrayFullComplete[$keyw][$key + 1][$key2][$key3 - 1] ?? -1;
                    $cubeRightZ1 = $cubeArrayFullComplete[$keyw][$key + 1][$key2][$key3 + 1] ?? -1;
                    $cubeAboveZ1 = $cubeArrayFullComplete[$keyw][$key + 1][$key2 - 1][$key3] ?? -1;
                    $cubeBelowZ1 = $cubeArrayFullComplete[$keyw][$key + 1][$key2 + 1][$key3] ?? -1;
                    $cubeLeftUpZ1 = $cubeArrayFullComplete[$keyw][$key + 1][$key2 - 1][$key3 - 1] ?? -1;
                    $cubeRightUpZ1 = $cubeArrayFullComplete[$keyw][$key + 1][$key2 - 1][$key3 + 1] ?? -1;
                    $cubeLeftDownZ1 = $cubeArrayFullComplete[$keyw][$key + 1][$key2 + 1][$key3 - 1] ?? -1;
                    $cubeRightDownZ1 = $cubeArrayFullComplete[$keyw][$key + 1][$key2 + 1][$key3 + 1] ?? -1;

                    $cubeLeftZ2 = $cubeArrayFullComplete[$keyw][$key - 1][$key2][$key3 - 1] ?? -1;
                    $cubeRightZ2 = $cubeArrayFullComplete[$keyw][$key - 1][$key2][$key3 + 1] ?? -1;
                    $cubeAboveZ2 = $cubeArrayFullComplete[$keyw][$key - 1][$key2 - 1][$key3] ?? -1;
                    $cubeBelowZ2 = $cubeArrayFullComplete[$keyw][$key - 1][$key2 + 1][$key3] ?? -1;
                    $cubeLeftUpZ2 = $cubeArrayFullComplete[$keyw][$key - 1][$key2 - 1][$key3 - 1] ?? -1;
                    $cubeRightUpZ2 = $cubeArrayFullComplete[$keyw][$key - 1][$key2 - 1][$key3 + 1] ?? -1;
                    $cubeLeftDownZ2 = $cubeArrayFullComplete[$keyw][$key - 1][$key2 + 1][$key3 - 1] ?? -1;
                    $cubeRightDownZ2 = $cubeArrayFullComplete[$keyw][$key - 1][$key2 + 1][$key3 + 1] ?? -1;

                    $cubeLeftW3 = $cubeArrayFullComplete[$keyw + 1][$key][$key2][$key3 - 1] ?? -1;
                    $cubeRightW3 = $cubeArrayFullComplete[$keyw + 1][$key][$key2][$key3 + 1] ?? -1;
                    $cubeAboveW3 = $cubeArrayFullComplete[$keyw + 1][$key][$key2 - 1][$key3] ?? -1;
                    $cubeBelowW3 = $cubeArrayFullComplete[$keyw + 1][$key][$key2 + 1][$key3] ?? -1;
                    $cubeLeftUpW3 = $cubeArrayFullComplete[$keyw + 1][$key][$key2 - 1][$key3 - 1] ?? -1;
                    $cubeRightUpW3 = $cubeArrayFullComplete[$keyw + 1][$key][$key2 - 1][$key3 + 1] ?? -1;
                    $cubeLeftDownW3 = $cubeArrayFullComplete[$keyw + 1][$key][$key2 + 1][$key3 - 1] ?? -1;
                    $cubeRightDownW3 = $cubeArrayFullComplete[$keyw + 1][$key][$key2 + 1][$key3 + 1] ?? -1;

                    $cubeLeftZ1W4 = $cubeArrayFullComplete[$keyw + 1][$key + 1][$key2][$key3 - 1] ?? -1;
                    $cubeRightZ1W4 = $cubeArrayFullComplete[$keyw + 1][$key + 1][$key2][$key3 + 1] ?? -1;
                    $cubeAboveZ1W4 = $cubeArrayFullComplete[$keyw + 1][$key + 1][$key2 - 1][$key3] ?? -1;
                    $cubeBelowZ1W4 = $cubeArrayFullComplete[$keyw + 1][$key + 1][$key2 + 1][$key3] ?? -1;
                    $cubeLeftUpZ1W4 = $cubeArrayFullComplete[$keyw + 1][$key + 1][$key2 - 1][$key3 - 1] ?? -1;
                    $cubeRightUpZ1W4 = $cubeArrayFullComplete[$keyw + 1][$key + 1][$key2 - 1][$key3 + 1] ?? -1;
                    $cubeLeftDownZ1W4 = $cubeArrayFullComplete[$keyw + 1][$key + 1][$key2 + 1][$key3 - 1] ?? -1;
                    $cubeRightDownZ1W4 = $cubeArrayFullComplete[$keyw + 1][$key + 1][$key2 + 1][$key3 + 1] ?? -1;

                    $cubeLeftZ2W5 = $cubeArrayFullComplete[$keyw + 1][$key - 1][$key2][$key3 - 1] ?? -1;
                    $cubeRightZ2W5 = $cubeArrayFullComplete[$keyw + 1][$key - 1][$key2][$key3 + 1] ?? -1;
                    $cubeAboveZ2W5 = $cubeArrayFullComplete[$keyw + 1][$key - 1][$key2 - 1][$key3] ?? -1;
                    $cubeBelowZ2W5 = $cubeArrayFullComplete[$keyw + 1][$key - 1][$key2 + 1][$key3] ?? -1;
                    $cubeLeftUpZ2W5 = $cubeArrayFullComplete[$keyw + 1][$key - 1][$key2 - 1][$key3 - 1] ?? -1;
                    $cubeRightUpZ2W5 = $cubeArrayFullComplete[$keyw + 1][$key - 1][$key2 - 1][$key3 + 1] ?? -1;
                    $cubeLeftDownZ2W5 = $cubeArrayFullComplete[$keyw + 1][$key - 1][$key2 + 1][$key3 - 1] ?? -1;
                    $cubeRightDownZ2W5 = $cubeArrayFullComplete[$keyw + 1][$key - 1][$key2 + 1][$key3 + 1] ?? -1;

                    $cubeLeftW0 = $cubeArrayFullComplete[$keyw - 1][$key][$key2][$key3 - 1] ?? -1;
                    $cubeRightW0 = $cubeArrayFullComplete[$keyw - 1][$key][$key2][$key3 + 1] ?? -1;
                    $cubeAboveW0 = $cubeArrayFullComplete[$keyw - 1][$key][$key2 - 1][$key3] ?? -1;
                    $cubeBelowW0 = $cubeArrayFullComplete[$keyw - 1][$key][$key2 + 1][$key3] ?? -1;
                    $cubeLeftUpW0 = $cubeArrayFullComplete[$keyw - 1][$key][$key2 - 1][$key3 - 1] ?? -1;
                    $cubeRightUpW0 = $cubeArrayFullComplete[$keyw - 1][$key][$key2 - 1][$key3 + 1] ?? -1;
                    $cubeLeftDownW0 = $cubeArrayFullComplete[$keyw - 1][$key][$key2 + 1][$key3 - 1] ?? -1;
                    $cubeRightDownW0 = $cubeArrayFullComplete[$keyw - 1][$key][$key2 + 1][$key3 + 1] ?? -1;

                    $cubeLeftZ1W1 = $cubeArrayFullComplete[$keyw - 1][$key + 1][$key2][$key3 - 1] ?? -1;
                    $cubeRightZ1W1 = $cubeArrayFullComplete[$keyw - 1][$key + 1][$key2][$key3 + 1] ?? -1;
                    $cubeAboveZ1W1 = $cubeArrayFullComplete[$keyw - 1][$key + 1][$key2 - 1][$key3] ?? -1;
                    $cubeBelowZ1W1 = $cubeArrayFullComplete[$keyw - 1][$key + 1][$key2 + 1][$key3] ?? -1;
                    $cubeLeftUpZ1W1 = $cubeArrayFullComplete[$keyw - 1][$key + 1][$key2 - 1][$key3 - 1] ?? -1;
                    $cubeRightUpZ1W1 = $cubeArrayFullComplete[$keyw - 1][$key + 1][$key2 - 1][$key3 + 1] ?? -1;
                    $cubeLeftDownZ1W1 = $cubeArrayFullComplete[$keyw - 1][$key + 1][$key2 + 1][$key3 - 1] ?? -1;
                    $cubeRightDownZ1W1 = $cubeArrayFullComplete[$keyw - 1][$key + 1][$key2 + 1][$key3 + 1] ?? -1;

                    $cubeLeftZ2W2 = $cubeArrayFullComplete[$keyw - 1][$key - 1][$key2][$key3 - 1] ?? -1;
                    $cubeRightZ2W2 = $cubeArrayFullComplete[$keyw - 1][$key - 1][$key2][$key3 + 1] ?? -1;
                    $cubeAboveZ2W2 = $cubeArrayFullComplete[$keyw - 1][$key - 1][$key2 - 1][$key3] ?? -1;
                    $cubeBelowZ2W2 = $cubeArrayFullComplete[$keyw - 1][$key - 1][$key2 + 1][$key3] ?? -1;
                    $cubeLeftUpZ2W2 = $cubeArrayFullComplete[$keyw - 1][$key - 1][$key2 - 1][$key3 - 1] ?? -1;
                    $cubeRightUpZ2W2 = $cubeArrayFullComplete[$keyw - 1][$key - 1][$key2 - 1][$key3 + 1] ?? -1;
                    $cubeLeftDownZ2W2 = $cubeArrayFullComplete[$keyw - 1][$key - 1][$key2 + 1][$key3 - 1] ?? -1;
                    $cubeRightDownZ2W2 = $cubeArrayFullComplete[$keyw - 1][$key - 1][$key2 + 1][$key3 + 1] ?? -1;

                    $cubeDownBelow = $cubeArrayFullComplete[$keyw][$key - 1][$key2][$key3] ?? -1;
                    $cubeUpAbove = $cubeArrayFullComplete[$keyw][$key + 1][$key2][$key3] ?? -1;

                    $cubeDownBelowW1 = $cubeArrayFullComplete[$keyw - 1][$key - 1][$key2][$key3] ?? -1;
                    $cubeUpAboveW1 = $cubeArrayFullComplete[$keyw - 1][$key + 1][$key2][$key3] ?? -1;

                    $cubeDownBelowW2 = $cubeArrayFullComplete[$keyw + 1][$key - 1][$key2][$key3] ?? -1;
                    $cubeUpAboveW2 = $cubeArrayFullComplete[$keyw + 1][$key + 1][$key2][$key3] ?? -1;

                    $cubeDownBelowW3 = $cubeArrayFullComplete[$keyw - 1][$key][$key2][$key3] ?? -1;
                    $cubeUpAboveW3 = $cubeArrayFullComplete[$keyw + 1][$key][$key2][$key3] ?? -1;

                    $activeCubeCount = 0;
                    if ($cubeLeft == '#') $activeCubeCount++;
                    if ($cubeRight == '#') $activeCubeCount++;
                    if ($cubeAbove == '#') $activeCubeCount++;
                    if ($cubeBelow == '#') $activeCubeCount++;
                    if ($cubeLeftUp == '#') $activeCubeCount++;
                    if ($cubeRightUp == '#') $activeCubeCount++;
                    if ($cubeLeftDown == '#') $activeCubeCount++;
                    if ($cubeRightDown == '#') $activeCubeCount++;

                    if ($cubeLeftZ1 == '#') $activeCubeCount++;
                    if ($cubeRightZ1 == '#') $activeCubeCount++;
                    if ($cubeAboveZ1 == '#') $activeCubeCount++;
                    if ($cubeBelowZ1 == '#') $activeCubeCount++;
                    if ($cubeLeftUpZ1 == '#') $activeCubeCount++;
                    if ($cubeRightUpZ1 == '#') $activeCubeCount++;
                    if ($cubeLeftDownZ1 == '#') $activeCubeCount++;
                    if ($cubeRightDownZ1 == '#') $activeCubeCount++;

                    if ($cubeLeftZ2 == '#') $activeCubeCount++;
                    if ($cubeRightZ2 == '#') $activeCubeCount++;
                    if ($cubeAboveZ2 == '#') $activeCubeCount++;
                    if ($cubeBelowZ2 == '#') $activeCubeCount++;
                    if ($cubeLeftUpZ2 == '#') $activeCubeCount++;
                    if ($cubeRightUpZ2 == '#') $activeCubeCount++;
                    if ($cubeLeftDownZ2 == '#') $activeCubeCount++;
                    if ($cubeRightDownZ2 == '#') $activeCubeCount++;


                    if ($cubeLeftW3 == '#') $activeCubeCount++;
                    if ($cubeRightW3 == '#') $activeCubeCount++;
                    if ($cubeAboveW3 == '#') $activeCubeCount++;
                    if ($cubeBelowW3 == '#') $activeCubeCount++;
                    if ($cubeLeftUpW3 == '#') $activeCubeCount++;
                    if ($cubeRightUpW3 == '#') $activeCubeCount++;
                    if ($cubeLeftDownW3 == '#') $activeCubeCount++;
                    if ($cubeRightDownW3 == '#') $activeCubeCount++;

                    if ($cubeLeftZ1W4 == '#') $activeCubeCount++;
                    if ($cubeRightZ1W4 == '#') $activeCubeCount++;
                    if ($cubeAboveZ1W4 == '#') $activeCubeCount++;
                    if ($cubeBelowZ1W4 == '#') $activeCubeCount++;
                    if ($cubeLeftUpZ1W4 == '#') $activeCubeCount++;
                    if ($cubeRightUpZ1W4 == '#') $activeCubeCount++;
                    if ($cubeLeftDownZ1W4 == '#') $activeCubeCount++;
                    if ($cubeRightDownZ1W4 == '#') $activeCubeCount++;

                    if ($cubeLeftZ2W5 == '#') $activeCubeCount++;
                    if ($cubeRightZ2W5 == '#') $activeCubeCount++;
                    if ($cubeAboveZ2W5 == '#') $activeCubeCount++;
                    if ($cubeBelowZ2W5 == '#') $activeCubeCount++;
                    if ($cubeLeftUpZ2W5 == '#') $activeCubeCount++;
                    if ($cubeRightUpZ2W5 == '#') $activeCubeCount++;
                    if ($cubeLeftDownZ2W5 == '#') $activeCubeCount++;
                    if ($cubeRightDownZ2W5 == '#') $activeCubeCount++;


                    if ($cubeLeftW0 == '#') $activeCubeCount++;
                    if ($cubeRightW0 == '#') $activeCubeCount++;
                    if ($cubeAboveW0 == '#') $activeCubeCount++;
                    if ($cubeBelowW0 == '#') $activeCubeCount++;
                    if ($cubeLeftUpW0 == '#') $activeCubeCount++;
                    if ($cubeRightUpW0 == '#') $activeCubeCount++;
                    if ($cubeLeftDownW0 == '#') $activeCubeCount++;
                    if ($cubeRightDownW0 == '#') $activeCubeCount++;

                    if ($cubeLeftZ1W1 == '#') $activeCubeCount++;
                    if ($cubeRightZ1W1 == '#') $activeCubeCount++;
                    if ($cubeAboveZ1W1 == '#') $activeCubeCount++;
                    if ($cubeBelowZ1W1 == '#') $activeCubeCount++;
                    if ($cubeLeftUpZ1W1 == '#') $activeCubeCount++;
                    if ($cubeRightUpZ1W1 == '#') $activeCubeCount++;
                    if ($cubeLeftDownZ1W1 == '#') $activeCubeCount++;
                    if ($cubeRightDownZ1W1 == '#') $activeCubeCount++;

                    if ($cubeLeftZ2W2 == '#') $activeCubeCount++;
                    if ($cubeRightZ2W2 == '#') $activeCubeCount++;
                    if ($cubeAboveZ2W2 == '#') $activeCubeCount++;
                    if ($cubeBelowZ2W2 == '#') $activeCubeCount++;
                    if ($cubeLeftUpZ2W2 == '#') $activeCubeCount++;
                    if ($cubeRightUpZ2W2 == '#') $activeCubeCount++;
                    if ($cubeLeftDownZ2W2 == '#') $activeCubeCount++;
                    if ($cubeRightDownZ2W2 == '#') $activeCubeCount++;


                    if ($cubeDownBelow == '#') $activeCubeCount++;
                    if ($cubeUpAbove == '#') $activeCubeCount++;

                    if ($cubeDownBelowW1 == '#') $activeCubeCount++;
                    if ($cubeUpAboveW1 == '#') $activeCubeCount++;

                    if ($cubeDownBelowW2 == '#') $activeCubeCount++;
                    if ($cubeUpAboveW2 == '#') $activeCubeCount++;

                    if ($cubeDownBelowW3 == '#') $activeCubeCount++;
                    if ($cubeUpAboveW3 == '#') $activeCubeCount++;


                    if ($myCube == '#' && ($activeCubeCount == 2 || $activeCubeCount == 3)) {
                        // No change
                    } elseif ($myCube == '#') {
                        $tempCubeArray[$keyw][$key][$key2][$key3] = '.';
                    } elseif ($myCube == '.' && $activeCubeCount == 3) {
                        // Become active
                        $tempCubeArray[$keyw][$key][$key2][$key3] = '#';
                    }
                    // If a cube is active and exactly 2 or 3 of its neighbors are also active, the cube remains active. Otherwise, the cube becomes inactive.
                    //If a cube is inactive but exactly 3 of its neighbors are active, the cube becomes active. Otherwise, the cube remains inactive.
                    // . = inactive, # = active


                }

            }


        }
    }


    $cubeArrayFullComplete = $tempCubeArray;
    echo "Cycle $x<br>";
    // Time stuff
    $time_post = microtime(true);
    $exec_time = $time_post - $time_pre;
    echo "<br>Spent $exec_time seconds so far<br>";
//    if($x==1) {
//        echo "Z -1<br>";
//        printGrid($cubeArrayFull[-1]);
//        echo "Z 0<br>";
//        printGrid($cubeArrayFull[0]);
//        echo "Z 1<br>";
//        printGrid($cubeArrayFull[1]);
//
//    } elseif($x==2) {
//        echo "Z -2<br>";
//        printGrid($cubeArrayFull[-2]);
//        echo "Z -1<br>";
//        printGrid($cubeArrayFull[-1]);
//        echo "Z 0<br>";
//        printGrid($cubeArrayFull[0]);
//        echo "Z 1<br>";
//        printGrid($cubeArrayFull[1]);
//        echo "Z 2<br>";
//        printGrid($cubeArrayFull[2]);
//
//    } elseif($x==3) {
//        echo "Z -3<br>";
//        printGrid($cubeArrayFull[-3]);
//        echo "Z -2<br>";
//        printGrid($cubeArrayFull[-2]);
//        echo "Z -1<br>";
//        printGrid($cubeArrayFull[-1]);
//        echo "Z 0<br>";
//        printGrid($cubeArrayFull[0]);
//        echo "Z 1<br>";
//        printGrid($cubeArrayFull[1]);
//        echo "Z 2<br>";
//        printGrid($cubeArrayFull[2]);
//        echo "Z 3<br>";
//        printGrid($cubeArrayFull[3]);
//
//    }


}



$cubeArrayFullComplete = $tempCubeArray;







//var_dump($cubeArrayFull);




$activeCubesCountFinal = 0;
foreach ($cubeArrayFullComplete as $keyw => $wLayer) { // New layer here
    foreach ($wLayer as $key => $zLayer) {
        foreach ($zLayer as $key2 => $yLayer) {
            foreach ($yLayer as $key3 => $xLayer) {
                $myCube = $cubeArrayFullComplete[$keyw][$key][$key2][$key3];
                if ($myCube == '#') {
                    $activeCubesCountFinal++;
                }
            }
        }
    }
}


echo "Total active final cubes: $activeCubesCountFinal<br>";


printGrid($cubeArrayFullComplete[0][0]);



function printGrid($trackGridInputArray) {
    echo "<code>";
    foreach($trackGridInputArray as $rowID => $rowColumn) {
        foreach ($rowColumn as $columnID => $gridData){
            if($gridData==" ") $gridData = "&nbsp;";
            echo "$gridData ";
        }
        echo "<br>";
    }
    echo "</code>";
}

// Time stuff
$time_post = microtime(true);
$exec_time = $time_post - $time_pre;
echo "<br>Spent $exec_time seconds so far<br>";