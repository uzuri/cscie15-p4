<?php

class GenerateController extends BaseController {

	private $alldata = array();
	
	public function __construct() 
	{
		$this->alldata['alert'] = "";
		$this->alldata['title'] = "";
		$this->alldata['placeholder'] = "";
	}
	
	public function getIndex()
	{	
		// Deal with proxied domain
		$uri = new UriManager();
		$this->alldata['uri'] = $uri->getUri() . "/generate";
		
		$languages = Language::orderBy('name')->get();
		$langarray = array();
		foreach ($languages as $language)
		{
			$langarray[$language->id] = $language->name;
		}
		$this->alldata['languages'] = $langarray;
		
		return View::make('generateget', $this->alldata);
	}

	public function postIndex()
	{	
		// Deal with proxied domain
		$uri = new UriManager();
		$this->alldata['uri'] = $uri->getUri() . "/generate";
		
		$languages = Language::orderBy('name')->get();
		$langarray = array();
		foreach ($languages as $language)
		{
			$langarray[$language->id] = $language->name;
		}
		$this->alldata['languages'] = $langarray;
		
		$data = Input::all();
		
		$generator = new GeneratorController();		
		$this->alldata['word'] = $generator->getWord($data['lang']);
		$this->alldata['lang'] = $data['lang'];
		
		return View::make('generatepost', $this->alldata);
	}

}
