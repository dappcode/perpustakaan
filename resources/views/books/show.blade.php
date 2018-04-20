@extends('layouts.app')
@section('content')

    <div class="container">
        <div class="detail" style="padding: 50px 0 0 0">
            <div class="card text-center">
                <div class="card-header">
                    <h1 class="text-center" style="padding: 30px 0 0 0;">{{ $book->title}} Books</h1>
                </div>
                <div class="card-body">
                @if($book->cover)
                <img src="{{ asset('cover/'.$book->cover) }}" class="card-img-top" alt="{{ $book->title }} image" height="500px">
                @else
                        <img src="/cover/default-image.png"  alt="Dont Have a Image">   
                @endif
                    <h5 class="card-title"> 
                        {{ $book->author->name }}
                    </h5>
                    <p class="card-text"> Amounts of book : {{ $book->amount }} </p>
                </div>
                <div class="card-footer text-muted">
                    <form action="{{ route('books.destroy', $book->id) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" type="submit"> Deleted </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop