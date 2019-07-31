@extends('main')

@section('content')
    <div class="row">
        <div class="col-md-2 mb-3">
            <a href="{{ route('templates.create') }}" class="btn btn-block btn-lg btn-outline-success">Создать</a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <table class="table">
                <thead>
                <tr>
                    <th>#</th>
                    <th>cell_name</th>
                    <th>day</th>
                    <th>year</th>
                    <th>text_mail</th>
                    <th></th>   <!-- Buttons -->
                </tr>
                </thead>
                <tbody>
                    @foreach($templates as $template)
                        <tr>
                            <th>{{ $template->id }}</th>
                            <td>{{ $template->cell_name }}</td>
                            <td>{{ $template->day }}</td>
                            <td>{{ $template->year }}</td>
                            <td>{{ str_limit($template->text_mail, 20, '...') }}</td>
                            <td>
                                <div class="btn-group">
                                    <a class="btn btn-group btn-outline-primary mr-1" href="{{ route('templates.show', $template->id) }}">Показать</a>
                                    {!! Form::open(['route' => ['templates.destroy', $template->id], 'method' => 'DELETE', 'style' => 'margin: 0;']) !!}
                                        {{ Form::submit('Удалить', ['class' => 'btn btn-outline-danger btn-group btn-block']) }}
                                    {!! Form::close() !!}
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection