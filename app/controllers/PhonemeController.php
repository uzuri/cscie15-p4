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
		$phonemes = Rule::where("language_id", "=", $lang)->orderBy("letters")->get();
		
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
		$this->alldata['uri'] = $uri->getUri() . "/language/" . $lang . "/phoneme/create";
		
		$this->alldata['lang'] = $lang;
		$this->alldata['phonemes'] = $phonemes = Rule::orderBy('letters')->where("language_id", "=", $lang)->get();
		
		return View::make('phonemecreate', $this->alldata);
	}
	
	
	public function postCreate($lang)
	{
		// Deal with proxied domain
		$uri = new UriManager();
		$this->alldata['uri'] = $uri->getUri() . "/language/" . $lang . "/phoneme/create";
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
		
		$this->alldata['phonemes'] = $phonemes = Rule::orderBy('letters')->where("language_id", "=", $lang)->get();
		
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
		$this->alldata['uri'] = $uri->getUri() . "/language/" . $lang . "/phoneme/" . $phone . "/edit";
		$this->alldata['lang'] = $lang;
		
		$this->alldata['phonemes'] = Rule::where('id', '=', $phone)->first();
		
		$this->alldata['followers'] = $followers = 	Rule::orderBy('letters')->where("language_id", "=", $lang)->get();
		
		
		$existingfollowers = DB::table('followers')->join('rules', 'followers.follows_id', '=', 'rules.id')->where('rule_id', '=', $phone)->get();
		$tempfollowers = array();
		
		foreach ($existingfollowers as $ef)
		{
			$tempfollowers[$ef->letters] = 1;
		}
		
		// Walk through phonemes
		$this->alldata['setfollowers'] = array();
		foreach ($followers as $set)
		{
			if (array_key_exists($set->letters, $tempfollowers))
			{
				$this->alldata['setfollowers'][$set->letters] = 1;
			}
			else
			{
				$this->alldata['setfollowers'][$set->letters] = 0;
			}
		}
		
		
		return View::make('phonemeedit', $this->alldata);
	}
	
	
	public function postEdit($lang, $phone)
	{
		// Deal with proxied domain
		$uri = new UriManager();
		$this->alldata['uri'] = $uri->getUri() . "/language/" . $lang . "/phoneme/" . $phone . "/edit";
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
		
		$this->alldata['followers'] = $followers = 	Rule::orderBy('letters')->where("language_id", "=", $lang)->get();
		
		// Remove existing phonemes so we don't get doubles
		$todelete = Follower::where('rule_id', '=', $phone)->delete();
		
		// Walk through phonemes and add if they exist
		
		$this->alldata['setfollowers'] = array();
		
		foreach ($followers as $set)
		{
			if (Input::get($set->letters) == 1)
			{
				$follower = new Follower();
				$follower->rule_id = $phoneme->id;
				$follower->follows_id = $set->id;
				$follower->save();
				$this->alldata['setfollowers'][$set->letters] = 1;
			}
			else
			{
				$this->alldata['setfollowers'][$set->letters] = 0;
			}
		}
		
		$this->alldata['alert'] = '<p class="alert">Phoneme edited!</p>';
		
		return View::make('phonemeedit', $this->alldata);
	}
	
	public function getDelete($lang, $phone)
	{
		// Deal with proxied domain
		$uri = new UriManager();
		$this->alldata['uri'] = $uri->getUri() . "/language/" . $lang . "/phoneme/" . $phone . "/delete";
		
		$this->alldata['languages'] = Language::where('id', '=', $lang)->first();
		$this->alldata['phonemes'] = Rule::where('id', '=', $phone)->first();
		$this->alldata['lang'] = $lang;
		
		return View::make('phonemedelete', $this->alldata);
	}
	
	
	public function postDelete($lang, $phone)
	{
		$phoneme = Rule::where('id', '=', $phone)->first();
		$this->alldata['alert'] = '<p class="alert">' . $phoneme->letters . ' deleted!</p>';
		
		Follower::where('rule_id', '=', $phone)->delete();
		Follower::where('follows_id', '=', $phone)->delete();
		Rule::where('id', '=', $phone)->delete();
		$this->alldata['lang'] = $lang;
	
		return View::make('phonemedeletedone', $this->alldata);
	}
}
