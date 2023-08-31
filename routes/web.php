<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Home\HomeSliderController;
use App\Http\Controllers\Home\AboutController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SkillsController;
use App\Http\Controllers\Home\PortfolioController;
use Illuminate\Support\Facades\Route;



// get the main landing page
Route::controller(HomeController::class)->group(function(){
    Route::get('/', 'index')->name('frontend.home');

});

// dashboard
Route::get('/dashboard', function () {
    return view('admin.index');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Admin routes
Route::controller(AdminController::class)->group(function(){ 
    Route::get('/admin/logout', 'destroy')->name('admin.logout');
    Route::get('/admin/profile', 'Profile')->name('admin.profile');
    Route::get('/admin/edit/profile', 'EditProfile')->name('edit.profile');
    Route::post('/admin/store/profile', 'StoreProfile')->name('store.profile');
    Route::get('/change/password', 'ChangePassword')->name('change.password');
    Route::post('/update/password', 'UpdatePassword')->name('update.password');
});

// Home slider
Route::controller(HomeSliderController::class)->group(function(){ 
    Route::get('/home/slide', 'HomeSlider')->name('home.slide');
    Route::post('/update/slide', 'UpdateSlider')->name('update.slider');
});

// about controller
Route::controller(AboutController::class)->group(function(){

    Route::get('/about', 'aboutFull')->name('aboutfull.page');
    Route::get('/about/me', 'AboutMe')->name('about.page');
    Route::post('/update/about', 'UpdateAbout')->name('update.about');
    Route::get('/about/tow', 'toolsOfWork')->name('about.gallery');

    // store the gallery route
    Route::post('/store/gallery', 'StoreGallery')->name('store.gallery');
    Route::get('/all/gallery', 'AllGallery')->name('all.about.gallery');
    Route::get('/edit/gallery/{id}', 'editGallery')->name('edit.images');
    Route::post('/update/gallery', 'UpdateGallery')->name('update.gallery');
    Route::get('/delete/gallery/{id}', 'deleteGallery')->name('delete.images');
});

// skills controller
Route::controller(SkillsController::class)->group(function(){

    Route::get('/skills', 'MySkill')->name('my.skill');
    Route::post('/skills/update', 'updateSkill')->name('update.skill');
});

// portfolio controller
Route::controller(PortfolioController::class)->group(function(){ 
    Route::get('/home/portfolio', 'homePortfolio')->name('home.portfolio');
    Route::get('/add/portfolio', 'addPortfolio')->name('add.portfolio');
    Route::post('/store/data','StoreData')->name('store');
    // Route::post('/update/slide', 'UpdateSlider')->name('update.slider');
});




require __DIR__.'/auth.php';
