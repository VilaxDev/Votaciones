@extends('admin.dashboard')
@section('content')
    <h2 class="text-center">Usuarios</h2>
    <div class="table-responsive">
        <div class="col-md-5 mt-2">
            <form action="{{ route('admin.usuarios.importExcel') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <label for="">Cargar Archivo en Formo Excel</label>
                <input class="form-control mb-2" type="file" name="file" accept=".xlsx">
                <button type="submit" class="btn btn-success">Importar Usuarios <i
                        class="fa-solid fa-file-excel"></i></button>
            </form>
        </div>


        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Rol</th>
                    <th scope="col">dni</th>
                </tr>
            </thead>
            @foreach ($user as $users)
                <tbody>
                    <tr class="">
                        <td>{{ $users->id }}</td>
                        <td>{{ $users->rol }}</td>
                        <td>{{ $users->dni }}</td>
                    </tr>
                </tbody>
            @endforeach
        </table>
    </div>
@endsection
