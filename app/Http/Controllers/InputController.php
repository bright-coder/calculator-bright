<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

use App\Module\Add;
use App\Module\Minus;
use App\Module\Multiply;
use App\Module\Divide;

class InputController extends Controller{

    public function add(){

    	$add = new Add();

        $answer = null;
        $num1 = Input::has('num1') ? Input::get('num1') : NULL ;
        $num2 = Input::has('num2') ? Input::get('num2') : NULL ;
        	if($num1 !== NULL && $num2 !== NULL){
        		$answer = $add->calculate($num1,$num2);
        	}

        return view('add', array('answer' => $answer));
    }

    public function minus(){

    	$minus = new Minus();

        $answer = null;
        $num1 = Input::has('num1') ? Input::get('num1') : NULL ;
        $num2 = Input::has('num2') ? Input::get('num2') : NULL ;
        	if($num1 !== NULL && $num2 !== NULL){
        		$answer = $minus->calculate($num1,$num2);
        	}

        return view('minus', array('answer' => $answer));
    }

    public function multiply(){

    	$multiply = new Multiply();

        $answer = null;
        $num1 = Input::has('num1') ? Input::get('num1') : NULL ;
        $num2 = Input::has('num2') ? Input::get('num2') : NULL ;
        	if($num1 !== NULL && $num2 !== NULL){
        		$answer = $multiply->calculate($num1,$num2);
        	}

        return view('multiply', array('answer' => $answer));
    }

    public function divide(){

    	$divide = new Divide();

        $answer = null;
        $num1 = Input::has('num1') ? Input::get('num1') : NULL ;
        $num2 = Input::has('num2') ? Input::get('num2') : NULL ;
        	if($num1 !== NULL && $num2 !== NULL && $num2 != 0){
        		$answer = $divide->calculate($num1,$num2);
        	}

        return view('divide', array('answer' => $answer));
    }

}


?>