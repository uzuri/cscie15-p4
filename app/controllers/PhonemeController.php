<?php

class PhonemeController extends BaseController {

	public function getIndex()
	{	
		$alldata = array();
		
		$alldata['placeholder'] = "This page will list all options relating to phonemes, eg. existing phonemes that can be edited, create a phoneme, delete a phoneme, etc. (GET view)";
		
		return View::make('main', $alldata);
	}
	
	public function getCreate()
	{
		$alldata = array();
		$alldata['placeholder'] = "This page will allow you to create a new phoneme (GET view)";
		return View::make('main', $alldata);
	}
	
	
	public function postCreate()
	{
		$alldata = array();
		$alldata['placeholder'] = "This page will allow you to create a new phoneme (POST view)";
		return View::make('main', $alldata);
	}
	
	public function getEdit()
	{
		$alldata = array();
		$alldata['placeholder'] = "This page will allow you to edit a phoneme's basic information (GET view)";
		return View::make('main', $alldata);
	}
	
	
	public function postEdit()
	{
		$alldata = array();
		$alldata['placeholder'] = "This page will allow you to edit a phoneme's basic information (POST view)";
		return View::make('main', $alldata);
	}
	
	public function getDelete()
	{
		$alldata = array();
		$alldata['placeholder'] = "This page will confirm phoneme deletion (GET view)";
		return View::make('main', $alldata);
	}
	
	
	public function postDelete()
	{
		$alldata = array();
		$alldata['placeholder'] = "This page will delete a langauge";
		return View::make('main', $alldata);
	}
}
