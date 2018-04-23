@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home')}}">Beranda</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('books.index')}}">Books</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Add Books</li>
                    
                </ol>
            </nav>
            <div class="card">
                <div class="card-header"> Add Books 
                </div>
{{-- {{dump($errors)}} --}}
                <div class="card-body">
                    <form class="form-horizontal" action=" {{ route('books.store') }} " method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label for="text" class="col-sm-2 col-form-label">Book Title :</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" id="title" name="title" placeholder="Input Book title..." value="{{ old('title') }}" autofocus>
                                @if ($errors->has('title'))
                                    <span class="invalid-feedback">
                                        <strong> {{ $errors->first('title') }} </strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="text" class="col-sm-2 col-form-label">Author Name :</label>
                            <div class="col-sm-10">
                                <select class="custom-select form-control js-selectize {{ $errors->has('amount') ? ' is-invalid' : '' }}" name="author_id" id="inputGroupSelect01">
                                <option selected>Choose Authors...</option>
                                @foreach ($authors as $author)
                                    <option value=" {{ $author->id }}"> {{ $author->name }} </option>
                                @endforeach    
                                </select>
                                @if ($errors->has('author_id'))
                                    <span class="invalid-feedback">
                                        <strong> {{ $errors->first('author_id') }} </strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="text" class="col-sm-2 col-form-label">Amounts of Books :</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control{{ $errors->has('amount') ? ' is-invalid' : '' }}" id="amount" name="amount" placeholder="Amounts of Books..." value="{{ old('amount') }}" autofocus>
                                @if ($errors->has('amount'))
                                    <span class="invalid-feedback">
                                        <strong> {{ $errors->first('amount') }} </strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="text" class="col-sm-2 col-form-label">Cover of Book :</label>
                            <div class="col-sm-10">
                                <div class="custom-file">
                                    <input type="file" id="cover" class="custom-file-input" id="cover" name="cover" value="{{ old('cover') }}" autofocus>
                                    <label class="custom-file-label" for="customFile">Choose image</label>
                                </div>
                                @if ($errors->has('cover'))
                                    <span class="invalid-feedback">
                                        <strong> {{ $errors->first('cover') }} </strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12 col-md-offset-2">
                                <button class="btn btn-primary float-right" type="submit">Save</button>
                            </div>
                        </div>

                        {{-- @include('books._form') --}}
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
