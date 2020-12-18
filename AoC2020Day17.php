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

$inputArray = explode("\n",$puzzleInput);
$cubeArray = array();
$cubeArrayInactive = array();
$cubeArrayFull = array();
$cubeArrayInactiveFull = array();
$cubeArrayFullTemp = array();

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

for ($x = -15; $x < 15; $x++) {

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



for ($x = -15; $x < 0; $x++) {
    $cubeArrayFull[$x] = $cubeArrayInactiveFull;
}
$cubeArrayFull[0] = $cubeArrayFullTemp;
for ($x = 1; $x < 15; $x++) {
    $cubeArrayFull[$x] = $cubeArrayInactiveFull;
}



printGrid($cubeArrayFull[0]);

for ($x = 0; $x < 6; $x++) {
    $tempCubeArray = $cubeArrayFull;
    foreach($tempCubeArray as $key => $zLayer) {
        foreach($zLayer as $key2 => $yLayer) {
            foreach($yLayer as $key3 => $xLayer) {

                $myCube = $cubeArrayFull[$key][$key2][$key3];
                
                $cubeLeft = $cubeArrayFull[$key][$key2][$key3-1] ?? -1;
                $cubeRight = $cubeArrayFull[$key][$key2][$key3+1] ?? -1;
                $cubeAbove = $cubeArrayFull[$key][$key2-1][$key3] ?? -1;
                $cubeBelow = $cubeArrayFull[$key][$key2+1][$key3] ?? -1;
                $cubeLeftUp = $cubeArrayFull[$key][$key2-1][$key3-1] ?? -1;
                $cubeRightUp = $cubeArrayFull[$key][$key2-1][$key3+1] ?? -1;
                $cubeLeftDown = $cubeArrayFull[$key][$key2+1][$key3-1] ?? -1;
                $cubeRightDown = $cubeArrayFull[$key][$key2+1][$key3+1] ?? -1;

                $cubeLeftZ1 = $cubeArrayFull[$key+1][$key2][$key3-1] ?? -1;
                $cubeRightZ1 = $cubeArrayFull[$key+1][$key2][$key3+1] ?? -1;
                $cubeAboveZ1 = $cubeArrayFull[$key+1][$key2-1][$key3] ?? -1;
                $cubeBelowZ1 = $cubeArrayFull[$key+1][$key2+1][$key3] ?? -1;
                $cubeLeftUpZ1 = $cubeArrayFull[$key+1][$key2-1][$key3-1] ?? -1;
                $cubeRightUpZ1 = $cubeArrayFull[$key+1][$key2-1][$key3+1] ?? -1;
                $cubeLeftDownZ1 = $cubeArrayFull[$key+1][$key2+1][$key3-1] ?? -1;
                $cubeRightDownZ1 = $cubeArrayFull[$key+1][$key2+1][$key3+1] ?? -1;

                $cubeLeftZ2 = $cubeArrayFull[$key-1][$key2][$key3-1] ?? -1;
                $cubeRightZ2 = $cubeArrayFull[$key-1][$key2][$key3+1] ?? -1;
                $cubeAboveZ2 = $cubeArrayFull[$key-1][$key2-1][$key3] ?? -1;
                $cubeBelowZ2 = $cubeArrayFull[$key-1][$key2+1][$key3] ?? -1;
                $cubeLeftUpZ2 = $cubeArrayFull[$key-1][$key2-1][$key3-1] ?? -1;
                $cubeRightUpZ2 = $cubeArrayFull[$key-1][$key2-1][$key3+1] ?? -1;
                $cubeLeftDownZ2 = $cubeArrayFull[$key-1][$key2+1][$key3-1] ?? -1;
                $cubeRightDownZ2 = $cubeArrayFull[$key-1][$key2+1][$key3+1] ?? -1;


                $cubeDownBelow = $cubeArrayFull[$key-1][$key2][$key3] ?? -1;
                $cubeUpAbove = $cubeArrayFull[$key+1][$key2][$key3] ?? -1;

                $activeCubeCount = 0;
                if($cubeLeft=='#') $activeCubeCount++;
                if($cubeRight=='#') $activeCubeCount++;
                if($cubeAbove=='#') $activeCubeCount++;
                if($cubeBelow=='#') $activeCubeCount++;
                if($cubeLeftUp=='#') $activeCubeCount++;
                if($cubeRightUp=='#') $activeCubeCount++;
                if($cubeLeftDown=='#') $activeCubeCount++;
                if($cubeRightDown=='#') $activeCubeCount++;
                
                if($cubeLeftZ1=='#') $activeCubeCount++;
                if($cubeRightZ1=='#') $activeCubeCount++;
                if($cubeAboveZ1=='#') $activeCubeCount++;
                if($cubeBelowZ1=='#') $activeCubeCount++;
                if($cubeLeftUpZ1=='#') $activeCubeCount++;
                if($cubeRightUpZ1=='#') $activeCubeCount++;
                if($cubeLeftDownZ1=='#') $activeCubeCount++;
                if($cubeRightDownZ1=='#') $activeCubeCount++;

                if($cubeLeftZ2=='#') $activeCubeCount++;
                if($cubeRightZ2=='#') $activeCubeCount++;
                if($cubeAboveZ2=='#') $activeCubeCount++;
                if($cubeBelowZ2=='#') $activeCubeCount++;
                if($cubeLeftUpZ2=='#') $activeCubeCount++;
                if($cubeRightUpZ2=='#') $activeCubeCount++;
                if($cubeLeftDownZ2=='#') $activeCubeCount++;
                if($cubeRightDownZ2=='#') $activeCubeCount++;


                if($cubeDownBelow=='#') $activeCubeCount++;
                if($cubeUpAbove=='#') $activeCubeCount++;
                
                
                if($myCube == '#' && ($activeCubeCount == 2 || $activeCubeCount == 3)) {
                    // No change
                } elseif($myCube == '#') {
                    $tempCubeArray[$key][$key2][$key3] = '.';
                } elseif($myCube == '.' && $activeCubeCount == 3) {
                    // Become active
                    $tempCubeArray[$key][$key2][$key3] = '#';
                }
                // If a cube is active and exactly 2 or 3 of its neighbors are also active, the cube remains active. Otherwise, the cube becomes inactive.
                //If a cube is inactive but exactly 3 of its neighbors are active, the cube becomes active. Otherwise, the cube remains inactive.
                // . = inactive, # = active



            }

        }


    }

    $cubeArrayFull = $tempCubeArray;
    echo "Cycle $x<br>";
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



$cubeArrayFull = $tempCubeArray;







//var_dump($cubeArrayFull);




$activeCubesCountFinal = 0;
foreach($cubeArrayFull as $key => $zLayer) {
    foreach ($zLayer as $key2 => $yLayer) {
        foreach ($yLayer as $key3 => $xLayer) {
            $myCube = $cubeArrayFull[$key][$key2][$key3];
            if($myCube == '#') {
                $activeCubesCountFinal++;
            }
        }
    }
}


echo "Total active final cubes: $activeCubesCountFinal<br>";


printGrid($cubeArrayFull[0]);



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