@extends('layouts.app')

@section('title'){{ $data->title }}@endsection

@section('breadcrumb')
<li class="breadcrumb-item active" aria-current="page"><a href="{{ route('home') }}">Home</a></li>
<li class="breadcrumb-item active" aria-current="page">{{ $data->title }}</li>
@endsection

@section('class_row')
 justify-content-md-center
@endsection

@section('content')
<div class="col-7">
    <figure>
        <blockquote class="blockquote">
            <h1 class="display-4 text-white-50 bg-dark">{{ $data->title }}</h1>
        </blockquote>
        <figcaption class="blockquote-footer">
            <small class="text-muted">{{ $data->date_text }}&emsp;&#171;{{ $data->source }}&#187;</small>
        </figcaption>
    </figure>

    <div>
        @if($data->image)
        <img
        src="{{ $data->image }}"
        alt="{{ $data->title }}"
        class="img-fluid rounded"
        style="max-width:800px;">
        @endif
         <div class="text-white-50 bg-dark">
             @if($data->description)
            <p>{{ $data->description }}</p>
            @else
            <div class="alert alert-danger" role="alert">
                <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" fill="currentColor" class="bi bi-exclamation-octagon" viewBox="0 0 16 16">
                <path d="M4.54.146A.5.5 0 0 1 4.893 0h6.214a.5.5 0 0 1 .353.146l4.394 4.394a.5.5 0 0 1 .146.353v6.214a.5.5 0 0 1-.146.353l-4.394 4.394a.5.5 0 0 1-.353.146H4.893a.5.5 0 0 1-.353-.146L.146 11.46A.5.5 0 0 1 0 11.107V4.893a.5.5 0 0 1 .146-.353L4.54.146zM5.1 1 1 5.1v5.8L5.1 15h5.8l4.1-4.1V5.1L10.9 1H5.1z"/>
                <path d="M7.002 11a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 4.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 4.995z"/>
                </svg>
                &emsp;
                Произошла ошибка, данные не найдены.
            </div>
            @endif
         </div>
        <a href="{{ $data->address }}" target="_blank">Перейти на оригинальную страницу новости</a>
    </div>
</div>
@endsection