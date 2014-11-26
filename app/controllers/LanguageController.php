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
		$languages = Language::orderBy('name')->get();
		
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
	
	public function getEdit($lang)
	{
		// Deal with proxied domain
		$uri = new UriManager();
		$this->alldata['uri'] = $uri->getUri() . "language/" . $lang . "/edit";
		
		$this->alldata['title'] = ": Edit Language";
		
		$this->alldata['languages'] = Language::where('id', '=', $lang)->first();
    
		return View::make('languageedit', $this->alldata);
	}
	
	
	public function postEdit($lang)
	{
		// Deal with proxied domain
		$uri = new UriManager();
		$this->alldata['uri'] = $uri->getUri() . "language/" . $lang . "/edit";
		
		$data = Input::all();
		
		$this->alldata['languages'] = $language = Language::where('id', '=', $lang)->first();
		
		$language->name = $data['name'];
		$language->description = $data['description'];
		$language->save();
		
		$this->alldata['alert'] = '<p class="alert">Language edited!</p>';
		
		return View::make('languageedit', $this->alldata);
	}
	
	public function getDelete($lang)
	{
		// Deal with proxied domain
		$uri = new UriManager();
		$this->alldata['uri'] = $uri->getUri() . "language/" . $lang . "/delete";
		
		$this->alldata['languages'] = Language::where('id', '=', $lang)->first();
		
		return View::make('languagedelete', $this->alldata);
	}
	
	
	public function postDelete($lang)
	{	
		$this->alldata['languages'] = $language = Language::where('id', '=', $lang)->first();
		
		$this->alldata['alert'] = '<p class="alert">' . $language->name . ' deleted!</p>';
		
		$language->delete();
	
		return View::make('languagedeletedone', $this->alldata);
	}
}
