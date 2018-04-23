@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"> <h2 class="text-primary">Dashboard</h2></div>
                <div class="card-body justify-content-center">
                    <h1 class="text-info text-center">The Books you are Borrowing</h1>
                    <hr class="bg-light" width="60%" align="center">
                    @if ($borrowLogs->count() == 0)
                       <h5 class="text-danger text-center">No Books Borrowed</h5>
                    @else
                    <div class="row">
                        <div class="col col-lg-2">
    
                        </div>
                        <div class="col col col-lg-8">
                            <table class="table table-striped table-bordered table-hover">
                                <thead class="thead-dark">
                                  <tr>
                                    <th scope="col">#</th>
                                    <th scope="col"> Book Name</th>
                                    <th scope="col"></th>
                                  </tr>
                                </thead>
                                <tbody>
                                @foreach ($borrowLogs as $key => $log)
                                    <tr>
                                        <th> {{ $key+1 }} </th>
                                        <th> {{ $log->book->title }} </th>
                                        <th> 
                                        <form class="form-inline js-confirm" action=" {{ route('member.books.return', $log->book->id)}} " method="post" data-confirm="Apakah anda Yakin ingin mengembalikan buku {{ $log->book->title}}? ">
                                        @csrf
                                        @method('PATCH')

                                        <button type="submit" class="btn btn-warning"> Return's Book</button>
                                        </form>
                                        </th>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="col col col-lg-2">
    
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
