<?php

use App\Http\Controllers\Admin as Admin;
use App\Http\Controllers\Web\SiteController;
use Illuminate\Support\Facades\Route;


Route::middleware('auth')
    ->prefix('admin')
    ->as('admin.')
    ->group(function () {
        Route::get('/', [Admin\AdminController::class, 'index'])
            ->name('index');
        Route::put('sort', [Admin\AdminController::class, 'sort'])
            ->name('sort');
        Route::put('show', [Admin\AdminController::class, 'show'])
            ->name('show');

        Route::get('docs', [Admin\DocsController::class, 'index'])->name('docs.index');
        Route::get('pages/{page}/add-block', [Admin\PageController::class, 'addBlock'])
            ->name('pages.add-block');
        Route::post('pages/{page}/{template}/store-block', [Admin\PageController::class, 'storeBlock'])
            ->name('pages.store-block');
        Route::resource('pages', Admin\PageController::class);
        Route::post('blocks/add-sub-blocks/{block}', [Admin\BlockController::class, 'addSubBlocks'])
            ->name('blocks.addSubBlocks');
        Route::resource('blocks', Admin\BlockController::class);
        Route::resource('tags', Admin\TagController::class);
        Route::get('menus/{menu}/add-block', [Admin\MenuController::class, 'addBlock'])
            ->name('menus.add-block');
        Route::post('menus/{menu}/{template}/store-block', [Admin\MenuController::class, 'storeBlock'])
            ->name('menus.store-block');
        Route::resource('menus', Admin\MenuController::class);
        Route::get('settings/{setting}/add-block', [Admin\SettingController::class, 'addBlock'])
            ->name('settings.add-block');
        Route::post('settings/{setting}/{template}/store-block', [Admin\SettingController::class, 'storeBlock'])
            ->name('settings.store-block');
        Route::resource('settings', Admin\SettingController::class);

        Route::get('templates/general', [Admin\GeneralTemplateController::class, 'index'])
            ->name('templates.general');
        Route::get('templates/general/create', [Admin\GeneralTemplateController::class, 'create'])
            ->name('templates.general-create');
        Route::post('templates/general', [Admin\GeneralTemplateController::class, 'store'])
            ->name('templates.general-store');

        Route::get('general-blocks', [Admin\GeneralBlockController::class, 'index'])
            ->name('general-blocks.index');
        Route::put('general-blocks', [Admin\GeneralBlockController::class, 'update'])
            ->name('general-blocks.update');

        Route::post('templates/add-level/{template}', [Admin\TemplateController::class, 'addLevel'])
            ->name('templates.add-level');
        Route::resource('templates', Admin\TemplateController::class);



        Route::get('backups/create-from-file', [Admin\BackupController::class, 'createFromFile'])
            ->name('backups.create-from-file');
        Route::post('backups/store-from-file', [Admin\BackupController::class, 'storeFromFile'])
            ->name('backups.store-from-file');
        Route::get('backups/download/{backup}', [Admin\BackupController::class, 'download'])
            ->name('backups.download');
        Route::post('backups/restore/{backup}', [Admin\BackupController::class, 'restore'])
            ->name('backups.restore');
        Route::resource('backups', Admin\BackupController::class);

        Route::get('history', [Admin\EventController::class, 'index'])->name('events.index');
    });
require __DIR__ . '/auth.php';

Route::get('{slug?}/{any?}/{some?}', [SiteController::class, 'index'])->name('web.index');
