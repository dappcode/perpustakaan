@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home')}}">Beranda</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('authors.index')}}">Authors</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Author Detail</li>
                </ol>
            </nav>
            <div class="card">
                <div class="card-header row"> 
                    <div class="col-6">
                        <h2 class="float-left"> Author Detail </h2>  
                    </div>
                </div>
                <div class="card-body">
                    <div class="form-group row">
                        <label for="text" class="col-sm-2 col-form-label">Author Name :</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" id="name" name="name" value="{{ $author->name }}" autofocus>
                            @if ($errors->has('name'))
                                <span class="invalid-feedback">
                                    <strong> {{ $errors->first('name') }} </strong>
                                </span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
