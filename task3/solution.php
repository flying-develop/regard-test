
<?php

class Calculate
{

    public function getResult(array $boxes, int $weight): int
    {

        // т.к. массив не отсортирован, бинарный поиск не будет работать
        // время обхода примерно O(log n)

        $count = 0;
        $indexes = [];
        $length = count($boxes);

        for ($i = 0; $i < $length; $i++) {
            if (in_array($i, $indexes)) {
                continue;
            }
            for ($j = $length - 1; $j > $i; $j--) {
                if (in_array($j, $indexes)) {
                    continue;
                }
                if ($boxes[$i] + $boxes[$j] == $weight) {
                    $indexes[] = $i;
                    $indexes[] = $j;
                    $count++;
                    break;
                }
            }
        }

        return $count;

    }
}

$calculator = new Calculate();

$firstResult = $calculator->getResult(
    [1, 2, 1, 5, 1, 3, 5, 2, 5, 5],
    6
);
var_dump($firstResult);

$secondResult = $calculator->getResult(
    [2, 4, 3, 6, 1],
    5
);
var_dump($secondResult);