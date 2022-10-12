<?php

/**
 * @throws Exception
 */
function sumTime(string $firstTime, string $secondTime): string
{
    $dictionaryOperators = [':'];
    $dictionaryNumbers = ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9'];

    $expressionArray = str_split($firstTime . $secondTime);

    foreach ($expressionArray as $char) {
        if (!in_array($char, $dictionaryOperators) && !in_array($char, $dictionaryNumbers)) {
            throw new Exception('Invalid expression');
        }

    }

    sscanf($firstTime, '%d:%d:%d', $firstTimeHours, $firstTimeMinutes, $firstTimeSeconds);
    sscanf($secondTime, '%d:%d:%d', $secondTimeHours, $secondTimeMinutes, $secondTimeSeconds);

    $firstTimeMinutes += $firstTimeHours * 60;
    $secondTimeMinutes += $secondTimeHours * 60;

    $firstTimeSeconds += $firstTimeMinutes * 60;
    $secondTimeSeconds += $secondTimeMinutes * 60;

    $totalSeconds = $firstTimeSeconds + $secondTimeSeconds;

    return gmdate('H:i:s', $totalSeconds);
}

try {
    echo sumTime('11:22:00', '01:03:00');
} catch (Exception $e) {
    echo $e->getMessage();
}
