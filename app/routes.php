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

Route::get('/', 'SplashController@getIndex');

// Word and name generation
Route::get('/generate', 'GenerateController@getIndex');
Route::post('/generate', 'GenerateController@postIndex');

// Language management
Route::get('/language', 'LanguageController@getIndex');
Route::get('/language/create', 'LanguageController@getCreate');
Route::post('/language/create', 'LanguageController@postCreate');
Route::get('/language/{lang}/edit', 'LanguageController@getEdit');
Route::post('/language/{lang}/edit', 'LanguageController@postEdit');
Route::get('/language/{lang}/delete', 'LanguageController@getDelete');
Route::post('/language/{lang}/delete', 'LanguageController@postDelete');


// Phoneme management
Route::get('/language/{lang}/phoneme', 'PhonemeController@getIndex');
Route::get('/language/{lang}/phoneme/create', 'PhonemeController@getCreate');
Route::post('/language/{lang}/phoneme/create', 'PhonemeController@postCreate');
Route::get('/language/{lang}/phoneme/{phon}/delete','PhonemeController@getDelete');
Route::post('/language/{lang}/phoneme/{phon}/delete','PhonemeController@postDelete');
Route::get('/language/{lang}/phoneme/{phon}/edit','PhonemeController@getEdit');
Route::post('/language/{lang}/phoneme/{phon}/edit','PhonemeController@postEdit');

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
