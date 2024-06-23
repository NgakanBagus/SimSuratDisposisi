<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FileUploadController;

Route::get('/', [FileUploadController::class, 'create'])->name('upload');
Route::get('/upload', [FileUploadController::class, 'create'])->name('upload');
Route::post('/upload', [FileUploadController::class, 'store']);
Route::get('/pdf/{id}', [FileUploadController::class, 'show'])->name('pdf.show');

// Routes for disposisi surat
Route::get('/disposisi/create/{pdfId}', [FileUploadController::class, 'createDisposisi'])->name('disposisi.create');
Route::post('/disposisi/store/{pdfId}', [FileUploadController::class, 'storeDisposisi'])->name('disposisi.store');
Route::get('/disposisi/edit/{id}', [FileUploadController::class, 'editDisposisi'])->name('disposisi.edit');
Route::put('/disposisi/update/{id}', [FileUploadController::class, 'updateDisposisi'])->name('disposisi.update');
Route::delete('/disposisi/delete/{id}', [FileUploadController::class, 'deleteDisposisi'])->name('disposisi.delete');
