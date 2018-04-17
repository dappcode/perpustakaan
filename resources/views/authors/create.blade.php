@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home')}}">Beranda</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('authors.index')}}">Authors</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Add Author</li>
                    
                </ol>
            </nav>
            <div class="card">
                <div class="card-header"> Add Author 
                </div>

                <div class="card-body">
                    <form class="form-horizontal" action=" {{ route('authors.store') }} " method="post">
                        @csrf
                        <div class="form-group row">
                            <label for="text" class="col-sm-2 col-form-label">Author Name :</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" id="name" name="name" placeholder="Input Author Name..." value="{{ old('name') }}" autofocus>
                                @if ($errors->has('name'))
                                    <span class="invalid-feedback">
                                        <strong> {{ $errors->first('name') }} </strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12 col-md-offset-2">
                                <button class="btn btn-primary float-right" type="submit">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
