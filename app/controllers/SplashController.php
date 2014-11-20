<?php

/**
  * Splash screen or main index controller
  */

class SplashController extends BaseController {

	public function getIndex()
	{	
		$alldata = array();
		$alldata['placeholder'] = "This page will just be an introduction; maybe it will throw out a randomly generated word in an invented language just to show you what it can do.";
		return View::make('main', $alldata);
	}

}
