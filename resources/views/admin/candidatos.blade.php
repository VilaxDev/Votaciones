@extends('admin.dashboard')
@section('content')
    <!-- Modal create -->
    <div class="modal fade" id="modalId" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog"
        aria-labelledby="modalTitleId" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-dm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTitleId">
                        Registro
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('candidatos.create') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="" class="form-label">Nombre del Candidato</label>
                            <input type="text" class="form-control" name="name" id=""
                                aria-describedby="emailHelpId" placeholder="nombre" />
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Nombre del Partido</label>
                            <input type="text" class="form-control" name="party" id=""
                                aria-describedby="emailHelpId" placeholder="nombre del partido" />
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Cargo a postularse</label>
                            <input type="text" class="form-control" name="charge" id=""
                                aria-describedby="emailHelpId" placeholder="cargo" />
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Biografia</label>
                            <textarea class="form-control" name="biography" id="" rows="3" placeholder="describir"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Logo</label>
                            <input type="file" class="form-control" name="photo" id=""
                                aria-describedby="emailHelpId" />
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                Cerrar
                            </button>
                            <button type="submit" class="btn btn-primary">Guardar</button>
                        </div>

                    </form>

                </div>

            </div>
        </div>
    </div>



    <!-- Modal Edit -->
    @foreach ($candidato as $candidatos)
        <div class="modal fade" id="modalEditId__{{ $candidatos->id }}" tabindex="-1" data-bs-backdrop="static"
            data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-dm" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalTitleId">
                            Editar Candidato
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('candidatos.update', $candidatos->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="" class="form-label">Nombre del Candidato</label>
                                <input type="text" class="form-control" name="name" id=""
                                    aria-describedby="emailHelpId" placeholder="nombre"
                                    value="{{ $candidatos->name }}" />
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Nombre del Partido</label>
                                <input type="text" class="form-control" name="party" id=""
                                    aria-describedby="emailHelpId" placeholder="nombre del partido"
                                    value="{{ $candidatos->party }}" />
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Cargo a postularse</label>
                                <input type="text" class="form-control" name="charge" id=""
                                    aria-describedby="emailHelpId" placeholder="cargo"
                                    value="{{ $candidatos->charge }}" />
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Biografia</label>
                                <textarea class="form-control" name="biography" id="" rows="3" placeholder="describir">{{ $candidatos->biography }}</textarea>
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Logo</label>
                                <input type="file" class="form-control" name="photo" id=""
                                    aria-describedby="emailHelpId" value="{{ $candidatos->photo }}" />
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                    Cerrar
                                </button>
                                <button type="submit" class="btn btn-primary">Guardar</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    <!-- Modal delete -->
    @foreach ($candidato as $candidatos)
        <div class="modal fade" id="modalDeletesId__{{ $candidatos->id }}" tabindex="-1" data-bs-backdrop="static"
            data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable modal-dm" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalTitleId">
                            Eliminar Candidato
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">Estas seguro de eliminar este candidato?</div>
                    <form action="{{ route('candidatos.delete', $candidatos->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach



    <h2 class="text-center mb-2">Tabla de Candidatos</h2>
    <div class="table-responsive">
        <table class="table">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalId">
                Añadir Candidato
            </button>

            <thead>
                <tr>
                    <th scope="col">Nombre</th>
                    <th scope="col">Partido</th>
                    <th scope="col">Cargo</th>
                    <th scope="col">Biografia</th>
                    <th scope="col">Logo</th>
                    <th scope="col">Operaciones</th>
                </tr>
            </thead>
            @foreach ($candidato as $candidatos)
                <tbody>
                    <tr class="">
                        <td>{{ $candidatos->id }}</td>
                        <td>{{ $candidatos->name }}</td>
                        <td>{{ $candidatos->charge }}</td>
                        <td>{{ $candidatos->biography }}</td>
                        <td>
                            <img src="{{ asset('storage/' . $candidatos->photo) }}" alt="{{ $candidatos->name }}"
                                class="img-fluid" width="50" height="50">

                        </td>
                        <td>
                            <div class="d-flex gap-1">
                                <button type="button" class="btn btn-warning" data-bs-toggle="modal"
                                    data-bs-target="#modalEditId__{{ $candidatos->id }}">
                                    Editar
                                </button>

                                <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#modalDeletesId__{{ $candidatos->id }}">
                                    Eliminar
                                </button>

                            </div>
                        </td>
                    </tr>

                </tbody>
            @endforeach
        </table>
    </div>
    <div class="justify-content-center d-flex">
        {{ $candidato->links() }}
    </div>
@endsection
