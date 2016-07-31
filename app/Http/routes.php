<?php
ini_set('xdebug.max_nesting_level', 200);
/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

   

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/


Route::group(['middleware' => 'web'], function () {

	/**
	 * -------------------------------------------------
	 * Site routes. Usually for guests
	 * -------------------------------------------------
	 */
	Route::get('/', function () {
		return view('welcome');
	});

	Route::get('notes', ['as'=>'notes.index', 'uses'=>'NotesController@getNotes']);
	Route::get('notes/search', ['as'=>'notes.search', 'uses'=>'NotesController@searchNotes']);


	/**
	 * ---------------------------------------------
	 * Admin Routes
	 * ---------------------------------------------
	 */
	Route::group(['prefix' => 'admin'], function() {
	    
	    Route::auth();  

	    Route::get('/', function () {
			$user = Auth::user();

			if(!$user->profile) return redirect()->route('admin.profiles.create');

	    	return view('welcome', compact('user'));
		});

		/**
		 * ---------------------------------------------
		 * Admin routes requiring authentication
		 * ---------------------------------------------
		 */
	    Route::group(['middleware' => 'auth'], function() {	
			Route::get('test-datatables', 'TestController@testDatatablesView')->name('test.datatables');
			Route::get('test-datatables/data', 'TestController@testDatatablesData')->name('test.datatables.data');

			

			/**
			 * =========================================
			 * Home Routes
			 * =========================================
			 */
	    	Route::get('/home', function(){
	    		return Auth::user()->rolesList;
	    	});
				

	        /**
			 * =========================================
			 * Note Routes
			 * =========================================
			 */
			Route::bind('notes', function($slug) {
				return App\Note::whereSlug($slug)->firstOrFail();
			});
			Route::get('notes/trashed', ['as'=>'admin.notes.trashed', 'uses'=>'NotesController@trashedNotes']);
			Route::get('notes/restore/{slug}', ['as'=>'admin.notes.restore', 'uses'=>'NotesController@restoreNotes']);
			Route::resource('notes', 'NotesController');

			

			/**
			 * get other routes registered externally
			 */
			foreach (File::allFiles(__DIR__.'/Routes') as $partial) {
				require_once $partial;
			}
	    }); // middleware auth

	  

			
	});
    
});

Route::group(['prefix'=>'api'], function(){
	/**
	 * Employees
	 */
	// Route::get('employees', ['uses'=>'EmployeesController@index']);
});
