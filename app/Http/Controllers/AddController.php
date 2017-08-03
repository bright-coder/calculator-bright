<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class AddController extends Controller{

	public function calculate($ans = null){
		$new = $ans;
		if(Input::has('num1') && Input::has('num2'))
			$new = Input::get('num1') + Input::get('num2');
		elseif(Input::has('num1'))
			$new = Input::get('num1');
		return view('add', array('ans' => $new));
	}

}
