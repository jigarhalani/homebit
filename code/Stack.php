<?php
/**
 * Created by PhpStorm.
 * User: jigar-halani
 * Date: 18/9/17
 * Time: 2:33 PM
 */

class Stack
{
    protected $stack;
    protected $limit;

    public function __construct($limit = 5) {
        $this->stack = array();
        $this->limit = $limit;
    }

    public function push($item) {
        if (count($this->stack) < $this->limit) {
            $this->stack[]=$item;
            //add item to the start of the array
        } else {
            throw new RunTimeException('Stack is full!');
        }
    }

    public function pop($is_queue=false) {
        if ($this->isEmpty()) {
            // trap for stack underflow
            throw new RunTimeException('Stack is empty!');
        } else {
            // pop item from the start of the array
            return $this->reArrangeStack($is_queue);
        }
    }


    public function isEmpty() {
        return empty($this->stack);
    }

    public function reArrangeStack($is_queue){
        $rearrangedStack=array();
        if($is_queue){
            $return_value=$this->stack[0];
            for($i=1;$i<count($this->stack);$i++){
                $rearrangedStack[]=$this->stack[$i];
            }

        }else{
            $return_value=$this->stack[count($this->stack)-1];
            for($i=0;$i<count($this->stack)-1;$i++){
                $rearrangedStack[]=$this->stack[$i];
            }
        }
        $this->stack=[];
        $this->stack=$rearrangedStack;
        return $return_value;
    }
}