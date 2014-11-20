<?php

class GenerateController extends BaseController {

	public function getIndex()
	{	
		$alldata = array();
		$alldata['placeholder'] = "This page will allow you to generate a word in a language of your chosing (GET view).";
		return View::make('main', $alldata);
	}

	public function postIndex()
	{	
		$alldata = array();
		$alldata['placeholder'] = "This page will allow you to generate a word in a language of your chosing (POST view).";
		return View::make('main', $alldata);
	}

}
