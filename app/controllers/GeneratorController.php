<?php

/**
  * Class to generate names
  */

class GeneratorController extends BaseController {

	private $maxwordlength = 15;
	
	public function getWord($lang)
	{
		$word = "";
		
		$phonemes = Rule::where("can_start", "=", 1)->where("rules.language_id", "=", $lang)->get();
		
		if (count($phonemes) < 1)
		{
			return "";
		}
		
		$randpick = rand(0, count($phonemes) - 1);
		$word .= $phonemes[$randpick]->letters;
		$prevletter = $phonemes[$randpick]->id;
		
		$notend = true;
		$counter = 1;
		while ($notend && $counter < $this->maxwordlength)
		{
			
			$phonemes = DB::table('rules')->join('followers', 'rules.id', '=', 'followers.rule_id')->select('rules.*', 'followers.rule_id')->where("rules.language_id", "=", $lang)->where('followers.follows_id', '=', $prevletter)->get();
			
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
				$randend = rand(0,($this->maxwordlength + 10 - $counter));
				if ($randend == 0)
				{
					$notend = false;
				}
			}
			$counter++;
		}
		
		return $word;
		
	}

}
