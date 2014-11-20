<?php

/**
  * Splash screen or main index controller
  */

class SplashController extends BaseController {

	
	private $alldata = array();
	
	public function __construct() 
	{
		$this->alldata['title'] = "";
		$this->alldata['placeholder'] = "";
	}
		
	public function getIndex()
	{	
		$this->alldata['title'] = "";
		$this->alldata['placeholder'] = "This page will just be an introduction; maybe it will throw out a randomly generated word in an invented language just to show you what it can do.";
		return View::make('index', $this->alldata);
	}

}
