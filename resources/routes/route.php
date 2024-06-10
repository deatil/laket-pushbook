<?php

use think\facade\Route;

use Laket\Admin\Facade\Flash;
use Laket\Admin\Pushbook\Controller\Pushbook;
use Laket\Admin\Pushbook\Controller\Admin\Pushbook as AdminPushbook;

// 插件后台路由
Flash::routes(function() {
    Route::get('pushbook/index', AdminPushbook::class . '@index')->name('admin.pushbook.index');
    Route::get('pushbook/index-data', AdminPushbook::class . '@indexData')->name('admin.pushbook.index-data');
    Route::get('pushbook/view', AdminPushbook::class . '@view')->name('admin.pushbook.view');
    Route::post('pushbook/delete', AdminPushbook::class . '@delete')->name('admin.pushbook.delete');
});

// 插件用户端路由
Route::get('pushbook', Pushbook::class . '@index')->name('pushbook.index');
Route::post('pushbook', Pushbook::class . '@save')->name('pushbook.save');


