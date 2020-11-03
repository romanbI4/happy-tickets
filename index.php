<?php 
function happyTickets($start, $end)
{
    if (!empty($start) && !empty($end)) {
        $range = rand($start, $end);
        $arrayOfRange = str_split($range);
        if (count($arrayOfRange) == 6) {
            $firstPartArrayOfRange = $arrayOfRange[0] + $arrayOfRange[1] + $arrayOfRange[2];
            $secondPartArrayOfRange = $arrayOfRange[3] + $arrayOfRange[4] + $arrayOfRange[5];
            if ($firstPartArrayOfRange == $secondPartArrayOfRange && strlen($secondPartArrayOfRange) != 2) {
                echo $range . " - билет счастливый!";
            } elseif ($firstPartArrayOfRange != $secondPartArrayOfRange && strlen($secondPartArrayOfRange) == 2) {
                $secondSplit = str_split($secondPartArrayOfRange);
                $resultSplit = $secondSplit[0] + $secondSplit[1];
                if ($firstPartArrayOfRange == $resultSplit) {
                    echo $range . " - билет счастливый!";
                } else {
                    echo $range . " - билет не счастливый!";
                }
            } else {
                echo $range . " - билет не счастливый!";
            }
        } else {
            array_unshift($arrayOfRange, "0");
            happyTickets($start, $end);
        }
    } else {
        echo 'Ошибка, не задан один из параметров';
    }
}
happyTickets($_GET["start"], $_GET["end"]);
?>