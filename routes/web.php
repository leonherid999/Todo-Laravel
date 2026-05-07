<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;

// 1. Halaman Utama: Menampilkan tabel daftar ToDo
Route::get('/', [TodoController::class, 'index'])->name('todo.index');

// 2. Halaman Create: Menampilkan form pembuatan ToDo baru
Route::get('/todo/create', [TodoController::class, 'create'])->name('todo.create');

// 3. Aksi Store: Menyimpan data dari form create ke database
Route::post('/todo', [TodoController::class, 'store'])->name('todo.store');

// 4. Halaman Edit: Menampilkan form edit ToDo berdasarkan ID
Route::get('/todo/{id}/edit', [TodoController::class, 'edit'])->name('todo.edit');

// 5. Aksi Update Title: Menyimpan hasil edit judul ke database
Route::put('/todo/{id}/update', [TodoController::class, 'updateTitle'])->name('todo.updateTitle');

// 6. Aksi Toggle Status: Mengubah status selesai/batal (is_done)
// Pastikan nama routenya adalah 'todo.toggle'
Route::put('/todo/{id}/toggle', [TodoController::class, 'toggleStatus'])->name('todo.toggle');

// 7. Aksi Destroy: Menghapus data ToDo
Route::delete('/todo/{id}', [TodoController::class, 'destroy'])->name('todo.destroy');