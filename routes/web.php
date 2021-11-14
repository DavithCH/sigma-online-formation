<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ChapterController;
use App\Http\Controllers\CourseController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [CategoryController::class,'index']);
Route::get('/courses/list', [CourseController::class, 'index'])->name('courseList');
Route::get('/courses/{id}',[CourseController::class, 'show'])->where('id', '[0-9]+')->name('courseDetails');
Route::get('/courses/create',[CourseController::class, 'add'])->name('addCourse');
Route::post('/courses',[CourseController::class, 'store']);
Route::delete('/courses/{id}', [CourseController::class, 'delete'])->name('deleteCourse');
Route::get('/courses/edit/{id}', [CourseController::class, 'edit'])->name('editCourse');
Route::put('/courses/edit/{id}',[CourseController::class, 'update'])->name('updateCourse');

Route::get('/categories/list', [CategoryController::class, 'list'])->name('categoryList');
Route::get('/categories/create',[CategoryController::class, 'add'])->name('addCategory');
Route::post('/categories',[CategoryController::class,'store'])->name('storeCategory');
Route::delete('/categories/delete/{id}',[CategoryController::class, 'delete'])->name('deleteCategory');
Route::put('/categories/edit/{id}',[CategoryController::class, 'update'])->name('updateCategory');
Route::get('/categories/{id}',[CategoryController::class, 'show'])->name('showCategory');

Route::get('/chapters/create/course/{id}',[ChapterController::class, 'add'])->name('addChapter');
Route::post('/chapters/create/{course}',[ChapterController::class, 'store'])->name('storeChapter');
Route::delete('/chapters/{id}',[ChapterController::class, 'delete'])->name('deleteChapter');
Route::get('/chapters/edit/{id}/{course}',[ChapterController::class, 'edit'])->name('editChapter');
Route::put('/chapters/edit/{id}/{course}',[ChapterController::class, 'update'])->name('updateChapter');
