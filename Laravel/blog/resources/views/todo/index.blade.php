@extends('layouts.app')

@section('content')

    <!-- Bootstrap Boilerplate... -->

    <div class="panel-body">
        <!-- Display Validation Errors -->
{{--    @include('common.errors')--}}

    <!-- New Task Form -->
        <form action="{{ route('todo.store') }}" method="POST" class="form-horizontal">
        {{ csrf_field() }}

        <!-- Task Name -->
            <div class="form-group">
                <label for="task" class="col-sm-3 control-label">Tâche</label>

                <div class="col-sm-6">
                    <input type="text" name="name" id="task-name" class="form-control">
                </div>
            </div>

            <!-- Add Task Button -->
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    <button type="submit" class="btn btn-default">
                        <i class="fa fa-plus"></i> Ajouter cette tâche
                    </button>
                </div>
            </div>
        </form>

    </div>

    <!-- TODO: Current Tasks -->

    @if (count($todos) > 0)
        <div class="panel panel-default">
            <div class="panel-heading">
                Tâches à Réaliser
            </div>

            <div class="panel-body">
                <table class="table table-striped task-table">

                    <!-- Table Headings -->
                    <thead>
                    <th>Tâches</th>
                    <th>&nbsp;</th>
                    </thead>

                    <!-- Table Body -->
                    <tbody>
                    @foreach ($todos as $todo)
                        <tr>
                            <!-- Task Name -->
                            <td class="table-text">
                                <div>{{ $todo->name }}</div>
                            </td>

                            <td>
                                <form action="{{ route('todo.destroy',['todo' => $todo]) }}" method="POST">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}

                                    <button type="submit" class="btn btn-danger">
                                        <i class="fa fa-trash"></i> Supprimer
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif
@endsection