<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    // Menampilkan Tabel Utama
    public function index()
    {
        $todos = Todo::all();
        // PASTIKAN ADA KATA 'return'
        return view('todo.index', compact('todos')); 
    }

    // Menampilkan Form Pembuatan
    public function create()
    {
        // PASTIKAN ADA KATA 'return'
        return view('todo.create');
    }

    // Menyimpan Data Baru
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|min:3'
        ]);

        Todo::create([
            'title' => $request->title,
            'is_done' => false
        ]);

        // PASTIKAN ADA KATA 'return' untuk redirect
        return redirect()->route('todo.index')->with('success', 'Tugas berhasil ditambahkan!');
    }

    // Menampilkan Halaman Edit
    public function edit($id)
    {
        $todo = Todo::find($id);
        // PASTIKAN ADA KATA 'return'
        return view('todo.edit', compact('todo'));
    }

    // Menyimpan Perubahan Judul (Aksi Edit)
    public function updateTitle(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|min:3'
        ]);

        $todo = Todo::find($id);
        $todo->update([
            'title' => $request->title
        ]);

        return redirect()->route('todo.index')->with('success', 'Tugas berhasil diperbarui!');
    }

    // Mengubah Status Selesai / Batal
    public function toggleStatus($id)
    {
        $todo = Todo::find($id);
        $todo->update([
            'is_done' => !$todo->is_done
        ]);

        return redirect()->route('todo.index');
    }

    // Menghapus Data
    public function destroy($id)
    {
        $todo = Todo::find($id);
        $todo->delete();

        return redirect()->route('todo.index')->with('success', 'Tugas berhasil dihapus!');
    }
}