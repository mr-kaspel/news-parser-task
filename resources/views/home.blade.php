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
                        @if($v->favicon)
                        <img class="favicon" src="https:{{ $v->favicon }}">
                        @else
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-newspaper" viewBox="0 0 16 16">
                        <path d="M0 2.5A1.5 1.5 0 0 1 1.5 1h11A1.5 1.5 0 0 1 14 2.5v10.528c0 .3-.05.654-.238.972h.738a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 1 1 0v9a1.5 1.5 0 0 1-1.5 1.5H1.497A1.497 1.497 0 0 1 0 13.5v-11zM12 14c.37 0 .654-.211.853-.441.092-.106.147-.279.147-.531V2.5a.5.5 0 0 0-.5-.5h-11a.5.5 0 0 0-.5.5v11c0 .278.223.5.497.5H12z"/>
                        <path d="M2 3h10v2H2V3zm0 3h4v3H2V6zm0 4h4v1H2v-1zm0 2h4v1H2v-1zm5-6h2v1H7V6zm3 0h2v1h-2V6zM7 8h2v1H7V8zm3 0h2v1h-2V8zm-3 2h2v1H7v-1zm3 0h2v1h-2v-1zm-3 2h2v1H7v-1zm3 0h2v1h-2v-1z"/>
                        </svg>
                        @endif
                        &emsp;
                    </span>
                    <span class="text-primary">{{ $v->source }}</span>
                     @if(!$v->description)
                     &emsp;
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-emoji-dizzy-fill" viewBox="0 0 16 16">
                    <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zM4.146 5.146a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 1 1 .708.708l-.647.646.647.646a.5.5 0 1 1-.708.708L5.5 7.207l-.646.647a.5.5 0 1 1-.708-.708l.647-.646-.647-.646a.5.5 0 0 1 0-.708zm5 0a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .708.708l-.647.646.647.646a.5.5 0 0 1-.708.708l-.646-.647-.646.647a.5.5 0 1 1-.708-.708l.647-.646-.647-.646a.5.5 0 0 1 0-.708zM8 13a2 2 0 1 1 0-4 2 2 0 0 1 0 4z"/>
                    </svg>
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-exclamation-octagon" viewBox="0 0 16 16">
                    <path d="M4.54.146A.5.5 0 0 1 4.893 0h6.214a.5.5 0 0 1 .353.146l4.394 4.394a.5.5 0 0 1 .146.353v6.214a.5.5 0 0 1-.146.353l-4.394 4.394a.5.5 0 0 1-.353.146H4.893a.5.5 0 0 1-.353-.146L.146 11.46A.5.5 0 0 1 0 11.107V4.893a.5.5 0 0 1 .146-.353L4.54.146zM5.1 1 1 5.1v5.8L5.1 15h5.8l4.1-4.1V5.1L10.9 1H5.1z"/>
                    <path d="M7.002 11a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 4.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 4.995z"/>
                    </svg>
                    @endif
                    &emsp;<small class="text-secondary text-date">{{ $v->created_at }}</small>
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