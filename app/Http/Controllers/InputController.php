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
        if(Input::has('num1') && Input::has('num2')){
            if(is_numeric(Input::get('num1')) && is_numeric(Input::get('num2'))){
                $answer = $add->calculate(Input::get('num1'),Input::get('num2'));
            }
            else{
                $answer = "Numbers are required";
            }
        }

        return view('add', array('answer' => $answer));
    }

    public function minus(){

    	$minus = new Minus();

        $answer = null;
        if(Input::has('num1') && Input::has('num2')){
            if(is_numeric(Input::get('num1')) && is_numeric(Input::get('num2'))){
                $answer = $minus->calculate(Input::get('num1'),Input::get('num2'));
            }
            else{
                $answer = "Numbers are required";
            }
        }

        return view('minus', array('answer' => $answer));
    }

    public function multiply(){

    	$multiply = new Multiply();

        $answer = null;
        if(Input::has('num1') && Input::has('num2')){
            if(is_numeric(Input::get('num1')) && is_numeric(Input::get('num2'))){
                $answer = $multiply->calculate(Input::get('num1'),Input::get('num2'));
            }
            else{
                $answer = "Numbers are required";
            }
        }

        return view('multiply', array('answer' => $answer));
    }

    public function divide(){

    	$divide = new Divide();

        $answer = null;
        if(Input::has('num1') && Input::has('num2')){
            if(is_numeric(Input::get('num1')) && is_numeric(Input::get('num2'))){
                if(Input::get('num2') != 0)
                    $answer = $divide->calculate(Input::get('num1'),Input::get('num2'));
                else
                    $answer = "Cannot divided by zero";
            }
            else{
                $answer = "Numbers are required";
            }
        }

        return view('divide', array('answer' => $answer));
    }

}


?>