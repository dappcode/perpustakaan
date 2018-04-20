@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home')}}">Beranda</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Books</li>
                </ol>
            </nav>
            <div class="card">
                <div class="card-header row"> 
                    <div class="col-6">
                        <h2 class="float-left"> Books </h2>  
                    </div>
                    <div class="col-6">
                        <a class="btn btn-primary float-right" href="{{ route('books.create')}}"><i class="fas fa-plus-circle"></i> Add Books </a>
                    </div>                    
                </div>
                <div class="card-body">
                {!! $html->table([ 'class' => 'table-striped ']) !!}
                
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->


@endsection

@push('scripts')
    {!! $html->scripts() !!}

@endpush