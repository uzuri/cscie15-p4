<?php

class PhonemeController extends BaseController {

	
	private $alldata = array();
	
	public function __construct() 
	{
		$this->alldata['title'] = ": Manage Phonemes";
		$this->alldata['placeholder'] = "";
		$this->alldata['alert'] = "";
		$this->alldata['phonemes'] = "";
		$this->alldata['pcount'] = 0;
	}
	
	
	public function getIndex($lang)
	{	
		$phonemes = Rule::all();
		
		$this->alldata['followers'] = array();
		
		
		// This code is NOT how it should be, but it works
		foreach($phonemes as $phoneme)
		{
			$followers = Follower::where('rule_id', $phoneme->id)->get();
			$temp = "";
			foreach($followers as $follower)
			{
				if ($temp != "" && $follower->follows_id)
				{
					$temp .= ", ";
				}
				if ($follower->follows_id)
				{
					$tempf = Rule::where('id', $follower->follows_id)->get();
					$temp .= $tempf[0]->letters;
				}
			}
			$this->alldata['followers'][$phoneme->id] = $temp;
		}
		
		$this->alldata['lang'] = $lang;
		$this->alldata['phonemes'] = $phonemes;
		$this->alldata['pcount'] = count($phonemes);
		
		return View::make('phonemeindex', $this->alldata);
	}
	
	public function getCreate($lang)
	{
		// Deal with proxied domain
		$uri = new UriManager();
		$this->alldata['uri'] = $uri->getUri() . "language/" . $lang . "/phoneme/create";
		
		$this->alldata['lang'] = $lang;
		$this->alldata['phonemes'] = $phonemes = Rule::orderBy('letters')->get();
		
		return View::make('phonemecreate', $this->alldata);
	}
	
	
	public function postCreate($lang)
	{
		// Deal with proxied domain
		$uri = new UriManager();
		$this->alldata['uri'] = $uri->getUri() . "language/" . $lang . "/phoneme/create";
		$this->alldata['lang'] = $lang;
		
		$phoneme = new Rule();
		
		$data = Input::all();
		
		$phoneme->language_id = $lang;
		$phoneme->letters = $data['letters'];
		$phoneme->description = $data['description'];
		if (Input::get('canstart') == 1)
		{
			$phoneme->can_start = $data['canstart'];
		}
		if (Input::get('canend') == 1)
		{
			$phoneme->can_end = $data['canend'];
		}
		$phoneme->save();
		
		$this->alldata['phonemes'] = $phonemes = Rule::orderBy('letters')->get();
		
		// Walk through phonemes and add if they exist
		foreach ($phonemes as $set)
		{
			if (Input::get($set->letters) == 1)
			{
				$follower = new Follower();
				$follower->rule_id = $phoneme->id;
				$follower->follows_id = $set->id;
				$follower->save();
			}
		}
		
		$this->alldata['alert'] = '<p class="alert">Phoneme made!</p>';
		return View::make('phonemecreate', $this->alldata);
	}
	
	public function getEdit($lang, $phone)
	{
		// Deal with proxied domain
		$uri = new UriManager();
		$this->alldata['uri'] = $uri->getUri() . "language/" . $lang . "/phoneme/" . $phone . "/edit";
		$this->alldata['lang'] = $lang;
		
		$this->alldata['phonemes'] = Rule::where('id', '=', $phone)->first();
		
		$this->alldata['followers'] = Rule::orderBy('letters')->get();
		
		return View::make('phonemeedit', $this->alldata);
	}
	
	
	public function postEdit($lang, $phone)
	{
		// Deal with proxied domain
		$uri = new UriManager();
		$this->alldata['uri'] = $uri->getUri() . "language/" . $lang . "/phoneme/" . $phone . "/edit";
		$this->alldata['lang'] = $lang;
		
		$this->alldata['phonemes'] = $phoneme = Rule::where('id', '=', $phone)->first();
		
		$data = Input::all();
		
		$phoneme->language_id = $lang;
		$phoneme->letters = $data['letters'];
		$phoneme->description = $data['description'];
		if (Input::get('canstart') == 1)
		{
			$phoneme->can_start = $data['canstart'];
		}
		else
		{
			$phoneme->can_start = 0;
		}
		if (Input::get('canend') == 1)
		{
			$phoneme->can_end = $data['canend'];
		}
		else
		{
			$phoneme->can_end = 0;
		}
		$phoneme->save();
		
		return View::make('phonemeedit', $this->alldata);
	}
	
	public function getDelete()
	{
		$this->alldata = array();
		$this->alldata['placeholder'] = "This page will confirm phoneme deletion (GET view)";
		return View::make('main', $this->alldata);
	}
	
	
	public function postDelete()
	{
		$this->alldata = array();
		$this->alldata['placeholder'] = "This page will delete a langauge";
		return View::make('main', $this->alldata);
	}
}
