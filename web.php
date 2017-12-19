<?php
// フォームページへアクセス
Route::get('sample/cap', 'SampleController@cap');
// フォームページ送信
Route::post('sample/cap', 'SampleController@capPost');