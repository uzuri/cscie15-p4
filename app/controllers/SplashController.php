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
		
		$maxwordlength = 8; // Make sure this doesn't spin forever if some clever person decided to make a language with no ending phonemes
		
		
		$languages = Language::all();
		$randpick = rand(0, count($languages) - 1);
		
		
		
		$this->alldata['placeholder'] .= "<h3>Random Example (" . $languages[$randpick]->name . ")</h3>";
		
		$word = "";
		
		$phonemes = Rule::where("can_start", "=", 1)->get();
		$randpick = rand(0, count($phonemes) - 1);
		$word .= $phonemes[$randpick]->letters;
		$prevletter = $phonemes[$randpick]->id;
		
		$notend = true;
		$counter = 1;
		while ($notend && $counter < $maxwordlength)
		{
			
			$phonemes = DB::table('rules')->join('followers', 'rules.id', '=', 'followers.rule_id')->select('rules.*', 'followers.rule_id')->where('followers.follows_id', '=', $prevletter)->get();
			
			if (count($phonemes) == 0)
			{
				// nothing follows this letter... which shouldn't happen in a well-designed language, but happens in incomplete ones all the time
				$notend = false;
				break;
			}
			
			$randpick = rand(0, count($phonemes) - 1);
			$word .= $phonemes[$randpick]->letters;
			$prevletter = $phonemes[$randpick]->id;
			
			if ($phonemes[$randpick]->can_end == 1)
			{
				// mix things up a bit
				$randend = rand(0,($maxwordlength - $counter));
				if ($randend == 0)
				{
					$notend = false;
				}
			}
			$counter++;
		}
		
		$this->alldata['placeholder'] .= "<p>" . $word . "</p>";
		
		
		return View::make('index', $this->alldata);
	}

}
