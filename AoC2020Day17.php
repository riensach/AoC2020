<?php

$puzzleInput = "..#..#..
.###..#.
#..##.#.
#.#.#.#.
.#..###.
.....#..
#...####
##....#.";

$puzzleInput = ".#.
..#
###";

$inputArray = explode("\n",$puzzleInput);
$seatArray = array();

foreach($inputArray as $key => $value) {
    $rowArrayInfo = str_split($value,1);
    $rowArray = array();
    foreach($rowArrayInfo as $key2 => $value2) {
        $rowArray[] = $value2;
    }

    $seatArray[] = $rowArray;
}

























printGrid($seatArray);



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