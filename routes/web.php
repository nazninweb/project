<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JsonFileController;
use App\Http\Controllers\JsonFileUploadController;
use App\Http\Controllers\ObservationController;
use App\Http\Controllers\PlantController;
use App\Http\Controllers\TemplateController;
use App\Http\Controllers\AdminNewController;
use App\Http\Controllers\HomeController;



//--------------------------------------------------------------------------------------//
// Admin Panel Start //
//--------------------------------------------------------------------------------------//

//Page Links 

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/citizen_scientists', function () {
    return view('citizen_scientists');
});

Route::get('/add_new_admin', function () {
    return view('add_new_admin');
});

Route::get('/delete_admin', function () {
    return view('delete_admin');
});

Route::get('/add_monthly_observations', function () {
    return view('add_monthly_observations');
});

Route::get('/add_individual_observations', function () {
    return view('add_individual_observations');
});

Route::get('/number_of_observations', function () {
    return view('number_of_observations');
});

Route::get('/individual_observations', function () {
    return view('individual_observations');
});

Route::get('/summary', function () {
    return view('summary');
});

//Add Monthly Observations

Route::get('/add_monthly_observations', [ObservationController::class, 'index'])->name('add_monthly_observations.index');
Route::post('/add_monthly_observations', [ObservationController::class, 'store'])->name('add_monthly_observations.store');

//Add Individual Observations

Route::get('/add_individual_observations', [PlantController::class, 'index'])->name('add_individual_observations.index');
Route::post('/add_individual_observations', [PlantController::class, 'store'])->name('add_individual_observations.store');

//Add New Admin

Route::get('/add_new_admin', [AdminNewController::class, 'index'])->name('add_new_admin.index');
Route::post('/add_new_admin', [AdminNewController::class, 'store'])->name('add_new_admin.store');

//Show Observations data

Route::get('/number_of_observations', [ObservationController::class, 'Show']);
Route::get('/individual_observations', [PlantController::class, 'showPlant']);
Route::get('/home', [HomeController::class, 'Show']);

//Show Chart

Route::get('/home', [HomeController::class, 'Chart']);

//Upload excel file

Route::get('/excel_upload', [ObservationController::class, 'excel'])->name('excel_upload');
Route::post('/excel_upload', [ObservationController::class, 'excel_worker'])->name('excel_worker');

//Download excel file
Route::get('/download', [ObservationController::class, 'download_excel'])->name('download');

//Modify Monthly Observations

Route::get('edit_observation_number/{id}', [ObservationController::class, 'edit']);
Route::put('update_data/{id}', [ObservationController::class, 'update']);
Route::get('delete_observation_number/{id}', [ObservationController::class, 'remove']);

//Modify Individual Observations
Route::get('edit_plant_data/{id}', [PlantController::class, 'edit']);
Route::put('update_data/{id}', [PlantController::class, 'update']);
Route::get('update_data/{id}', [PlantController::class, 'destroy']);
Route::get('delete_plant_data/{id}', [PlantController::class, 'remove']);

//Show Detail Individual Observations
Route::get('detail_plant_data/{id}', [PlantController::class, 'detail']);

//Search Individual Observations
Route::get('/search', [PlantController::class, 'search']);

//Upload json file
Route::get('/jsonfile_upload', [JsonFileUploadController::class, 'upload'])->name('upload');
Route::post('/jsonfile_upload', [JsonFileUploadController::class, 'uploadPost'])->name('upload.post');
Route::get('/json_upload_image', [JsonFileUploadController::class, 'uploadJson'])->name('upload.json');
Route::post('/json_upload_image', [JsonFileUploadController::class, 'uploadImage'])->name('upload.image');
Route::get('/json', [JsonFileController::class, 'saveJsonData']);
Route::get('/json_detail_plant', [JsonFileController::class, 'showPlant']);

// Admin Panel End 



//--------------------------------------------------------------------------------------//
// Frontend Start 
//--------------------------------------------------------------------------------------//


Route::get('/', [TemplateController::class, 'template']);

Route::get('/participate', function () {
    return view('frontend.participate');
});

Route::get('/data', function () {
    return view('frontend.data');
});

Route::get('/num_observation', function () {
    return view('frontend.num_observation');
});

Route::get('/data', [TemplateController::class, 'Chart']);
Route::get('/ind_observation', [TemplateController::class, 'Chart']);
Route::get('/num_observation', [TemplateController::class, 'Chart']);
Route::get('/num_observation', [TemplateController::class, 'Show']);
Route::get('/ind_observation', [TemplateController::class, 'showPlant']);
Route::get('detail_plant_data/{id}', [TemplateController::class, 'detail']);

Route::get('/about', function () {
    return view('frontend.about');
});

Route::get('/contact', function () {
    return view('frontend.contact');
});

Route::get('/news', function () {
    return view('frontend.news');
});


// Frontend End 