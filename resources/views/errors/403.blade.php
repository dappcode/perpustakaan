@extends('layouts.app')

@section('content')
<div class="container">
        <div class="col-lg-12 col-lg-offset-2 text-center">
            <div class="logo">
                <h1>403</h1>
            </div>
            <p class="lead text-muted">Oops, an error has occurred. Forbidden!</p>
            <div class="clearfix"></div>
            <div class="sr-only">
                &nbsp;

            </div>
            <br>
            <div class="col-lg-12 col-lg-offset-3">
                <div class="btn-group btn-group-justified">
                    <a href="{{ route('home') }}" class="btn btn-info">Return Beranda</a>
                </div>
            </div>
        </div>
        <!-- /.col-lg-8 col-offset-2 -->
    </div>
@endsection
