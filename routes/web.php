<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ChapterController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;



Route::get('/', [CategoryController::class,'index']);
Route::get('/courses/list', [CourseController::class, 'index'])->name('courseList');
Route::get('/courses/{id}',[CourseController::class, 'show'])->where('id', '[0-9]+')->name('courseDetails');
Route::get('/courses/create',[CourseController::class, 'add'])->name('addCourse')->middleware('auth');
Route::post('/courses',[CourseController::class, 'store'])->middleware('auth');
Route::delete('/courses/{id}', [CourseController::class, 'delete'])->name('deleteCourse')->middleware('auth');
Route::get('/courses/edit/{id}', [CourseController::class, 'edit'])->name('editCourse')->middleware('auth');
Route::put('/courses/edit/{id}',[CourseController::class, 'update'])->name('updateCourse')->middleware('auth');

Route::get('/categories/list', [CategoryController::class, 'list'])->name('categoryList');
Route::get('/categories/create',[CategoryController::class, 'add'])->name('addCategory')->middleware('auth');
Route::post('/categories',[CategoryController::class,'store'])->name('storeCategory')->middleware('auth');
Route::delete('/categories/delete/{id}',[CategoryController::class, 'delete'])->name('deleteCategory')->middleware('auth');
Route::put('/categories/edit/{id}',[CategoryController::class, 'update'])->name('updateCategory')->middleware('auth');
Route::get('/categories/{id}',[CategoryController::class, 'show'])->name('showCategory');

Route::get('/chapters/create/course/{id}',[ChapterController::class, 'add'])->name('addChapter')->middleware('auth');
Route::post('/chapters/create/{course}',[ChapterController::class, 'store'])->name('storeChapter')->middleware('auth');
Route::delete('/chapters/{id}',[ChapterController::class, 'delete'])->name('deleteChapter')->middleware('auth');
Route::get('/chapters/edit/{id}/{course}',[ChapterController::class, 'edit'])->name('editChapter')->middleware('auth');
Route::put('/chapters/edit/{id}/{course}',[ChapterController::class, 'update'])->name('updateChapter')->middleware('auth');

Route::get('/users/{id}',[UserController::class, 'show'])->name('userProfile')->middleware('auth');
Route::get('/users/edit/{id}', [UserController::class, 'edit'])->name('editUser')->middleware('auth');
Route::put('/users/update/{id}',[UserController::class, 'update'])->name('updateUser')->middleware('auth');

Route::get('/contact',[ContactController::class, 'contact'])->name('contact');
Route::post('/contact',[ContactController::class, 'send'])->name('sendMail');

require __DIR__.'/auth.php';
