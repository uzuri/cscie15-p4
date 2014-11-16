<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	
	$alldata = array();
	$alldata['placeholder'] = "This page will just be an introduction; maybe it will throw out a randomly generated word in an invented language just to show you what it can do.";
	return View::make('main', $alldata);
});

// Word and name generation
Route::get('/generate', function()
{
	
	$alldata = array();
	$alldata['placeholder'] = "This page will allow you to generate a word in a language of your chosing (GET view).";
	return View::make('main', $alldata);
});

Route::post('/generate', function()
{
	
	$alldata = array();
	$alldata['placeholder'] = "This page will allow you to generate a word in a language of your chosing (POST view).";
	return View::make('main', $alldata);
});




// Language management
Route::get('/language', function()
{
	
	$alldata = array();
	$alldata['placeholder'] = "This page will list all options relating to languages, eg. existing languages that can be edited, create a language, delete a language, etc. (GET view)";
	return View::make('main', $alldata);
});

Route::get('/language/{lang}/edit', function()
{
	
	$alldata = array();
	$alldata['placeholder'] = "This page will allow you to edit a language's basic information (GET view)";
	return View::make('main', $alldata);
});

Route::post('/language/{lang}/edit', function()
{
	
	$alldata = array();
	$alldata['placeholder'] = "This page will allow you to edit a language's basic information (POST view)";
	return View::make('main', $alldata);
});

Route::get('/language/create', function()
{
	
	$alldata = array();
	$alldata['placeholder'] = "This page will allow you to create a new language (GET view)";
	return View::make('main', $alldata);
});

Route::post('/language/create', function()
{
	
	$alldata = array();
	$alldata['placeholder'] = "This page will allow you to create a new language (POST view)";
	return View::make('main', $alldata);
});

Route::get('/language/{lang}/delete', function()
{
	
	$alldata = array();
	$alldata['placeholder'] = "This page will confirm language deletion (GET view)";
	return View::make('main', $alldata);
});

Route::post('/language/{lang}/delete', function()
{
	
	$alldata = array();
	$alldata['placeholder'] = "This page will actually delete a language (POST view)";
	return View::make('main', $alldata);
});


// Phoneme management
Route::get('/language/{lang}/phoneme', function()
{
	
	$alldata = array();
	$alldata['placeholder'] = "This page will list all options relating to phonemes WITHIN a language, eg. existing phonemes that can be edited, create a phonemes, delete a phoneme, etc. (GET view)";
	return View::make('main', $alldata);
});


Route::get('/language/{lang}/phoneme/create', function()
{
	
	$alldata = array();
	$alldata['placeholder'] = "This page will allow creation of a phoneme (GET view)";
	return View::make('main', $alldata);
});

Route::post('/language/{lang}/phoneme/create', function()
{
	
	$alldata = array();
	$alldata['placeholder'] = "This page will allow creation of a phoneme (POST view)";
	return View::make('main', $alldata);
});


Route::get('/language/{lang}/phoneme/{phon}/delete', function()
{
	
	$alldata = array();
	$alldata['placeholder'] = "This page will confirm phoneme deletion (GET view)";
	return View::make('main', $alldata);
});

Route::post('/language/{lang}/phoneme/{phon}/delete', function()
{
	
	$alldata = array();
	$alldata['placeholder'] = "This page will actually delete a phoneme (POST view)";
	return View::make('main', $alldata);
});


Route::get('/language/{lang}/phoneme/{phon}/edit', function()
{
	
	$alldata = array();
	$alldata['placeholder'] = "This page will allow you to edit a phoneme, including connecting it to existing phonemes that can follow it in a word (GET view)";
	return View::make('main', $alldata);
});

Route::post('/language/{lang}/phoneme/{phon}/edit', function()
{
	
	$alldata = array();
	$alldata['placeholder'] = "This page will allow you to edit a phoneme, including connecting it to existing phonemes that can follow it in a word (POST view)";
	return View::make('main', $alldata);
});



// Some debugging tools
Route::get('/get-environment',function() {

    echo "Environment: ".App::environment();

});

/*Route::get('/debug', function() {

    echo '<pre>';

    echo '<h1>environment.php</h1>';
    $path   = base_path().'/environment.php';

    try {
        $contents = 'Contents: '.File::getRequire($path);
        $exists = 'Yes';
    }
    catch (Exception $e) {
        $exists = 'No. Defaulting to `production`';
        $contents = '';
    }

    echo "Checking for: ".$path.'<br>';
    echo 'Exists: '.$exists.'<br>';
    echo $contents;
    echo '<br>';

    echo '<h1>Environment</h1>';
    echo App::environment().'</h1>';

    echo '<h1>Debugging?</h1>';
    if(Config::get('app.debug')) echo "Yes"; else echo "No";

    echo '<h1>Database Config</h1>';
    print_r(Config::get('database.connections.mysql'));

    echo '<h1>Test Database Connection</h1>';
    try {
        $results = DB::select('SHOW DATABASES;');
        echo '<strong style="background-color:green; padding:5px;">Connection confirmed</strong>';
        echo "<br><br>Your Databases:<br><br>";
        print_r($results);
    } 
    catch (Exception $e) {
        echo '<strong style="background-color:crimson; padding:5px;">Caught exception: ', $e->getMessage(), "</strong>\n";
    }

    echo '</pre>';

});*/
