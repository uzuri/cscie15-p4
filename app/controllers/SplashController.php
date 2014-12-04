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
		$this->alldata['placeholder'] = "<p>Welcome to the Fantasy Language Builder!  Here you can create your own language by defining phonemes and the rules that they have to follow and generate words using the rules.</p>";
		
		$languages = Language::all();
		$randpick = rand(0, count($languages) - 1);
				
		if (count($languages) < 1)
		{
			View::make('index', $this->alldata);
		}
		
		
		$this->alldata['placeholder'] .= "<h3>Random Example (" . $languages[$randpick]->name . ")</h3>";
		
		$lang_id = $languages[$randpick]->id;
		
		$generator = new GeneratorController();
		$word = $generator->getWord($lang_id);
		
		$this->alldata['placeholder'] .= "<p>" . $word . "</p>";
		
		
		return View::make('index', $this->alldata);
	}

}
