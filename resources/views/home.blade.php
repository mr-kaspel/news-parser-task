@extends('layouts.app')

@section('title')Главная@endsection

@section('breadcrumb')<li class="breadcrumb-item active" aria-current="page">Home</li>@endsection

@section('count-news') {{ $data->count() }} @endsection

@section('content')
<div class="col-9">
    @if(!count($data))
    <div class="row p-2">
        <div class="col-8">
            <div class="alert alert-warning" role="alert">
                Записи отсутствуют.<br>Для сбора данных нажмите на кнопку "Собрать новости".
            </div>
        </div>
    </div>
    @endif
    @foreach($data as $k => $v)
    <div class="row p-2">
        <div class="col-8">
            <div class="card">
                <div class="card-header">
                    <span class="text-info">
                        #{{ $loop->iteration }}
                        &#126;
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-newspaper" viewBox="0 0 16 16">
                        <path d="M0 2.5A1.5 1.5 0 0 1 1.5 1h11A1.5 1.5 0 0 1 14 2.5v10.528c0 .3-.05.654-.238.972h.738a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 1 1 0v9a1.5 1.5 0 0 1-1.5 1.5H1.497A1.497 1.497 0 0 1 0 13.5v-11zM12 14c.37 0 .654-.211.853-.441.092-.106.147-.279.147-.531V2.5a.5.5 0 0 0-.5-.5h-11a.5.5 0 0 0-.5.5v11c0 .278.223.5.497.5H12z"/>
                        <path d="M2 3h10v2H2V3zm0 3h4v3H2V6zm0 4h4v1H2v-1zm0 2h4v1H2v-1zm5-6h2v1H7V6zm3 0h2v1h-2V6zM7 8h2v1H7V8zm3 0h2v1h-2V8zm-3 2h2v1H7v-1zm3 0h2v1h-2v-1zm-3 2h2v1H7v-1zm3 0h2v1h-2v-1z"/>
                        </svg>
                        &emsp;
                        <small>{{ $v->created_at }}</small>
                        @if(!$v->description)
                        &emsp;
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark-excel text-danger" viewBox="0 0 16 16">
                        <path d="M5.884 6.68a.5.5 0 1 0-.768.64L7.349 10l-2.233 2.68a.5.5 0 0 0 .768.64L8 10.781l2.116 2.54a.5.5 0 0 0 .768-.641L8.651 10l2.233-2.68a.5.5 0 0 0-.768-.64L8 9.219l-2.116-2.54z"/>
                        <path d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2zM9.5 3A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5v2z"/>
                        </svg>
                        @endif
                    </span>
                    <h4>{{ $v->title }}</h4>
                </div>
                <div class="card-body">
                    @if($v->description)
                    <p>
                        {!! Str::limit($v->description, 200, ' ...') !!}
                    </p>
                    @else
                    <div class="alert alert-danger" role="alert">
                        Произошла ошибка, данные не найдены.
                    </div>
                    @endif
                    <footer class="blockquote-footer">{{ $v->date_text }}</footer>
                    <a href="{{ route('aliase-data-item', $v->alias) }}" class="link-primary">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-90deg-right" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M14.854 4.854a.5.5 0 0 0 0-.708l-4-4a.5.5 0 0 0-.708.708L13.293 4H3.5A2.5 2.5 0 0 0 1 6.5v8a.5.5 0 0 0 1 0v-8A1.5 1.5 0 0 1 3.5 5h9.793l-3.147 3.146a.5.5 0 0 0 .708.708l4-4z"/>
                        </svg>
                        Читать
                    </a>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection