<?php
/**
 * @throws Exception
 */
function solveCalc(string $expressionStr): float
{
    $dictionaryOperators = ['+', '-', '*', '/'];
    $dictionaryNumbers = ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9'];

    $expressionArray = str_split($expressionStr);

    foreach ($expressionArray as $char) {
        if ((!in_array($char, $dictionaryOperators) && !in_array($char, $dictionaryNumbers)) || str_contains($expressionStr, '/0')) {
            throw new Exception('Invalid expression');
        }

    }

    return eval('return ' . $expressionStr . ';');
}

try {
    echo solveCalc('1+1*5/2/0');
} catch (Exception $e) {
    echo $e->getMessage();
}
