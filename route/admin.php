<?php

//后台路由

Route::group('admin', function () {

    Route::get("/","index/index"); //首页

    Route::get('/question','Question/index');


})->prefix('admin/');

?>