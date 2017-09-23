<?php
/**
 * Created by PhpStorm.
 * User: jigar-halani
 * Date: 20/9/17
 * Time: 9:45 AM
 */
include("Stack.php");

Class Queue extends Stack{


    public function __construct($limit = 5){
            parent::__construct($limit);
    }

    public function enqueue($item){
        try{
            parent::push($item);
        }catch (Exception $e){
            throw new RunTimeException('Queue is full!');
        }

    }

    public function dequeue(){
        try{
            return parent::pop(true);
        }catch (Exception $e){
            throw new RunTimeException('Queue is empty!');
        }

    }

}