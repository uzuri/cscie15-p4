<?php


class UriManager
{
	// Default URI is root
	private $uri = "/";
	
	/**
	  * Set the URI on initialization
	  */
	function __construct() 
	{
		if (isset($_SERVER['HTTP_X_FORWARDED_HOST']))
		{
			$this->uri = "http://" . $_SERVER['HTTP_X_FORWARDED_HOST'];
		}
	}
	
	/**
	  *  getUri
	  *  Basic getter; returns currently set URI
	  */
	public function getUri() 
	{
		return $this->uri;
	}   
	
}
