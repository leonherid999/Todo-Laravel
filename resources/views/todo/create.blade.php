@extends('layout.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card shadow">
            <div class="card-header bg-success text-white">
                <h4 class="mb-0">Buat ToDo Baru</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('todo.store') }}" method="POST">
                    @csrf
                    
                    <div class="mb-3">
                        <label for="title" class="form-label">Nama Tugas</label>
                        <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" placeholder="Tulis rencana tugasmu..." required>
                        @error('title')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-flex justify-content-between">
                        <a href="{{ route('todo.index') }}" class="btn btn-secondary">Kembali</a>
                        <button type="submit" class="btn btn-success">Simpan Tugas</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection