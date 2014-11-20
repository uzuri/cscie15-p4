<?php

class LanguageController extends BaseController {

	private $alldata = array();
	
	public function __construct() 
	{
		$this->alldata['title'] = ": Manage Languages";
		$this->alldata['placeholder'] = "";
	}
	
	public function getIndex()
	{	
		return View::make('languageindex', $this->alldata);
	}
	
	public function getCreate()
	{
		
		$this->alldata['placeholder'] = "This page will allow you to create a new language (GET view)";
		return View::make('languagecreate', $this->alldata);
	}
	
	
	public function postCreate()
	{
		
		$this->alldata['placeholder'] = "This page will allow you to create a new language (POST view)";
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
