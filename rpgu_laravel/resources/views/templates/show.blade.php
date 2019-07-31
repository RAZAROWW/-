@extends('main')

@section('content')
    <div class="row">
        <div class="col-md-8">
            <h1>Шаблон #{{ $template->id }}</h1>
            <table class="table">
                <thead>
                    <tr>
                        <th>table_name</th>
                        <th>cell_name</th>
                        <th>day</th>
                        <th>year</th>
                        <th>text_mail</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $template->table_name }}</td>
                        <td>{{ $template->cell_name }}</td>
                        <td>{{ $template->day }}</td>
                        <td>{{ $template->year }}</td>
                        <td>{{ $template->text_mail }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="col-md-3 offset-1">
            <div class="card card-body bg-light">
                <a class="btn btn-block btn-outline-primary" href="{{ route('templates.edit', $template->id) }}">Редактировать</a>
                <a class="btn btn-block btn-outline-secondary" href="{{ route('templates.index') }}">Назад</a>
            </div>
        </div>
    </div>
@endsection