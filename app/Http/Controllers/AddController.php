<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class AddController extends Controller{

	public function calculate($ans = null){
		if (strpos($ans, '_') !== false) {
    		$new = (float)str_replace('_','.',$ans);
		}
		else 
			$new = $ans;


		if(Input::has('num1') && Input::has('num2'))
			$new = Input::get('num1') + Input::get('num2');
		elseif(Input::has('num1'))
			$new = Input::get('num1');

		$route = str_replace(".","_",strval($new));

		return view('add', array('ans' => $new, 'route' => $route));
	}

}
