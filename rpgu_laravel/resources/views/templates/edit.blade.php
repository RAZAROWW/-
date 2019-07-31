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
                    {!! Form::model($template, ['method' => 'PUT', 'route' => ['templates.update', $template->id], 'class' => 'form-group']) !!}
                    <td>{{ Form::text('table_name', null, array('class' => 'form-control form-group', 'required' => '', 'maxlength' => '255', 'minlength' => '1')) }}</td>
                    <td>{{ Form::text('cell_name', null, array('class' => 'form-control form-group', 'required' => '', 'maxlength' => '255', 'minlength' => '2')) }}</td>
                    <td>{{ Form::text('day', null, array('class' => 'form-control form-group', 'required' => '', 'maxlength' => '255')) }}</td>
                    <td>{{ Form::text('year', null, array('class' => 'form-control form-group', 'maxlength' => '255')) }}</td>
                    <td>{{ Form::textarea('text_mail', null, array('class' => 'form-control form-group', 'required' => '', 'maxlength' => '255', 'minlength' => '5')) }}</td>

                </tr>
                </tbody>
            </table>
        </div>
        <div class="col-md-3 offset-1">
            <div class="card card-body bg-light">
                <button type="submit" class="btn btn-block btn-outline-success">Завершить</button>
                <a class="btn btn-block btn-outline-secondary" href="{{ route('templates.show', $template->id) }}">Назад</a>
            </div>
        </div>
        {!! Form::close() !!}
    </div>
@endsection