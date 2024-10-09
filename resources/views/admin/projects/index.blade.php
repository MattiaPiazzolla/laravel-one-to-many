@extends('layouts.dashboard')

@section('main-content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h2>Progetti</h2>
                    <a href="{{ route('admin.projects.create') }}" class="btn btn-sm btn-primary">Aggiungi Progetto</a>
                </div>
            </div>
            <div class="col-12 overflow-scroll">
                <table class="table table-hover table-striped table-bordered">
                    <thead class="thead-dark">
                        <tr>
                            <th>Id</th>
                            <th>Nome</th>
                            <th>Slug</th>
                            <th>Linguaggio Principale</th>
                            <th class="text-center">Comandi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($projects as $project)
                            <tr>
                                <td>{{ $project->id }}</td>
                                <td>{{ $project->name }}</td>
                                <td>{{ $project->slug }}</td>
                                <td>{{ $project->category ? $project->category->name : 'Nessuna Categoria' }}</td>
                                <td class="text-center">
                                    <div class="d-flex justify-content-between">
                                        <a href="{{ route('admin.projects.show', ['project' => $project->id]) }}"
                                            class="btn btn-sm btn-info" title="Vedi Dettagli">
                                            <i class="bi bi-eye"></i>
                                        </a>
                                        <a href="{{ route('admin.projects.edit', ['project' => $project->id]) }}"
                                            class="btn btn-sm btn-warning" title="Modifica">
                                            <i class="bi bi-pencil-square"></i>
                                        </a>
                                        <form class="d-inline">
                                            <button type="button" class="btn btn-sm btn-danger delete-project"
                                                data-project-id="{{ $project->id }}">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @include('admin.projects.partials.modal_delete')
@endsection
