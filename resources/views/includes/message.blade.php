
@if($errors->any())
<div class="alert alert-warning alert-dismissible fade show" role="alert">
    <ul>
        @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

@if(session('seccess'))
    <div class="alert alert-success alert-dismissible fade show">
        {{ session('seccess') }}
    </div>
@endif