@extends('layout.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-10"> <h2 class="mb-4 text-center">Daftar Tugas (ToDo List)</h2>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="card shadow-sm mb-4">
            <div class="card-body p-0">
                <table class="table table-hover mb-0">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col" style="width: 5%">No</th>
                            <th scope="col" style="width: 35%">Tugas</th>
                            <th scope="col" style="width: 30%">Waktu</th> <th scope="col" style="width: 30%" class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($todos as $index => $todo)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>
                                    <span class="{{ $todo->is_done ? 'text-decoration-line-through text-muted' : 'fw-bold' }}">
                                        {{ $todo->title }}
                                    </span>
                                </td>
                                <td>
                                    <div class="small text-muted">
                                        <strong>Dibuat:</strong> {{ $todo->created_at->format('d M Y H:i') }} WIB
                                    </div>
                                    
                                    @if($todo->is_done)
                                        <div class="small text-success mt-1">
                                            <strong>Selesai:</strong> {{ $todo->updated_at->format('d M Y H:i') }} WIB
                                        </div>
                                    @endif
                                </td>
                                <td>
                                    <div class="d-flex justify-content-center gap-2">
                                        <form action="{{ route('todo.toggle', $todo->id) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <button type="submit" class="btn btn-sm {{ $todo->is_done ? 'btn-warning' : 'btn-success' }}">
                                                {{ $todo->is_done ? 'Batal' : 'Selesai' }}
                                            </button>
                                        </form>

                                        <a href="{{ route('todo.edit', $todo->id) }}" class="btn btn-sm btn-primary">Edit</a>

                                        <form action="{{ route('todo.destroy', $todo->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center text-muted py-4">Belum ada tugas hari ini.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <div class="text-center">
            <a href="{{ route('todo.create') }}" class="btn btn-success px-4 shadow">
                + Tambah ToDo Baru
            </a>
        </div>

    </div>
</div>
@endsection