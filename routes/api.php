<?php
use Illuminate\Support\Facades\Route;

Route::namespace('Notes')->group(function(){
    Route::prefix('notes')->group(function(){
        Route::POST('create-new-note', 'NoteController@store');
        Route::GET('', 'NoteController@index');
        Route::GET('{note:slug}', 'NoteController@show')->name('notes.show');
        Route::PATCH('{note:slug}/edit', 'NoteController@update');
        Route::DELETE('{note:slug}/delete', 'NoteController@destroy');
    });

    Route::prefix('subjects')->group(function(){
        Route::GET('', 'SubjectController@index');
    });
});

