<?php
/**
 * Created by PhpStorm.
 * User: jigar-halani
 * Date: 18/9/17
 * Time: 3:35 PM
 */
include('Queue.php');

$stack=new Stack(3);

print_r("Stack Example"."<br>");
try{
    $stack->push(1);
    $stack->push(2);
    $stack->push(3);
    echo $stack->pop()."\t";
    echo $stack->pop()."\t";
    echo $stack->pop()."\t";

}Catch(Exception $e){
    echo $e->getMessage();
}

print_r("<br>Queue Example<br>");
$queue=new Queue(3);

try{
    $queue->enqueue(10);
    $queue->enqueue(20);
    $queue->enqueue(30);

    echo $queue->dequeue()."\t";
    echo $queue->dequeue()."\t";
    echo $queue->dequeue()."\t";

}Catch(Exception $e){
    echo $e->getMessage();
}