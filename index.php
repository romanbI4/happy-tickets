<?php 

function happyTickets($start, $end)
{
    if (!empty($start) && !empty($end)) {
        $sumHappyTickets = [];
        for ($i = $start; $i <= $end; $i++) {
            $arrayOfRange = str_split($i);
            if (count($arrayOfRange) == 6) {
                $firstPartArrayOfRange = $arrayOfRange[0] + $arrayOfRange[1] + $arrayOfRange[2];
                $secondPartArrayOfRange = $arrayOfRange[3] + $arrayOfRange[4] + $arrayOfRange[5];
                if ($firstPartArrayOfRange == $secondPartArrayOfRange && strlen($secondPartArrayOfRange) != 2) {
                    $sumHappyTickets[$i]++;
                } elseif ($firstPartArrayOfRange != $secondPartArrayOfRange && strlen($secondPartArrayOfRange) == 2) {
                    $secondSplit = str_split($secondPartArrayOfRange);
                    $resultSplit = $secondSplit[0] + $secondSplit[1];
                    if ($firstPartArrayOfRange == $resultSplit) {
                        $sumHappyTickets[$i]++;
                    } 
                }
            } 
        }
        echo "Счастливых билетов в диапозоне с " . $start . " до " . $end . " - " . "<b>" . count($sumHappyTickets) . "</b>";
    } else {
        echo 'Ошибка, не задан один из параметров';
    }
}
happyTickets($_GET["start"], $_GET["end"]);
?>