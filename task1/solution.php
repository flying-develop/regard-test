<?php

class test {
    public $next; 
}

$a = new test();
$b = new test();
$c = new test();
$a->next = $b;
$b->next = $c;
$c->next = null;

function reverse(test $object, ?test $newNext = null) {
    $returnNext = null;
    if ($object->next !== null) {
        $returnNext = reverse($object->next, $object);
    }
    if ($newNext) {
        $object->next = $newNext;
        return $returnNext;
    }

    $object->next = $returnNext;
    return $object;
}

$ob1 = reverse($c);
var_dump($ob1);