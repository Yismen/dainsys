<?php

Route::get('notes', ['as'=>'notes.index', 'uses'=>'NotesController@index']);

Route::group(['prefix' => 'api'], function(){
    Route::post('notes/search', 'NotesController@search');
    Route::get('notes/{id}', 'NotesController@show');
});
