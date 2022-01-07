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
            <small class="text-muted">{{ $data->date_text }}</small>
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
                Произошла ошибка, данные не найдены.
            </div>
            @endif
         </div>
        <a href="{{ $data->address }}" target="_blank">Перейти на оригинальную страницу новости</a>
    </div>
</div>
@endsection