<?php

class Follower extends Eloquent { 
	
    public function follower(){
        return $this->hasOne('Rule', 'follows_id', 'id'); 
    }
}
