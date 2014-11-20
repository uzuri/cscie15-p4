<?php

class LanguageController extends BaseController {

	public function getIndex()
	{	
		$alldata = array();
		
		$alldata['placeholder'] = "This page will list all options relating to languages, eg. existing languages that can be edited, create a language, delete a language, etc. (GET view)";
		
		return View::make('main', $alldata);
	}
	
	public function getCreate()
	{
		$alldata = array();
		$alldata['placeholder'] = "This page will allow you to create a new language (GET view)";
		return View::make('main', $alldata);
	}
	
	
	public function postCreate()
	{
		$alldata = array();
		$alldata['placeholder'] = "This page will allow you to create a new language (POST view)";
		return View::make('main', $alldata);
	}
	
	public function getEdit()
	{
		$alldata = array();
		$alldata['placeholder'] = "This page will allow you to edit a language's basic information (GET view)";
		return View::make('main', $alldata);
	}
	
	
	public function postEdit()
	{
		$alldata = array();
		$alldata['placeholder'] = "This page will allow you to edit a language's basic information (POST view)";
		return View::make('main', $alldata);
	}
	
	public function getDelete()
	{
		$alldata = array();
		$alldata['placeholder'] = "This page will confirm language deletion (GET view)";
		return View::make('main', $alldata);
	}
	
	
	public function postDelete()
	{
		$alldata = array();
		$alldata['placeholder'] = "This page will delete a langauge";
		return View::make('main', $alldata);
	}
}
