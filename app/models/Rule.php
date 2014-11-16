<?php

class Rule extends Eloquent { 

    public function rule() {
        # A rule connect to meny other rules
        return $this->hasMany('Rule');
    }
}
