<?php

class LanguageController extends BaseController {

	private $alldata = array();
	
	public function __construct() 
	{
		$this->alldata['title'] = ": Manage Languages";
		$this->alldata['placeholder'] = "";
		$this->alldata['alert'] = "";
		$this->alldata['languages'] = "";
		$this->alldata['lcount'] = 0;
	}
	
	public function getIndex()
	{	
		$languages = Language::all();
		
		$this->alldata['languages'] = $languages;
		$this->alldata['lcount'] = count($languages);
		
		return View::make('languageindex', $this->alldata);
	}
	
	public function getCreate()
	{
		
		// Deal with proxied domain
		$uri = new UriManager();
		$this->alldata['uri'] = $uri->getUri() . "language/create";
		
		return View::make('languagecreate', $this->alldata);
	}
	
	
	public function postCreate()
	{
		// Deal with proxied domain
		$uri = new UriManager();
		$this->alldata['uri'] = $uri->getUri() . "language/create";
		
		$language = new Language();
		
		$data = Input::all();
		
		$language->name = $data['name'];
		$language->description = $data['description'];
		$language->save();
		
		$this->alldata['alert'] = '<p class="alert">Language made!</p>';
		return View::make('languagecreate', $this->alldata);
	}
	
	public function getEdit()
	{
		
		$this->alldata['placeholder'] = "This page will allow you to edit a language's basic information (GET view)";
		return View::make('main', $this->alldata);
	}
	
	
	public function postEdit()
	{
		
		$this->alldata['placeholder'] = "This page will allow you to edit a language's basic information (POST view)";
		return View::make('main', $this->alldata);
	}
	
	public function getDelete()
	{
		
		$this->alldata['placeholder'] = "This page will confirm language deletion (GET view)";
		return View::make('main', $this->alldata);
	}
	
	
	public function postDelete()
	{
		
		$this->alldata['placeholder'] = "This page will delete a langauge";
		return View::make('main', $this->alldata);
	}
}
