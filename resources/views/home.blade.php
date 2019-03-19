@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Menu</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <a href="{{route('create_book')}}">
                        <button type="button" class="btn btn-primary btn-sm">Add Books</button>
                    </a>

                    <a href="{{route('book_borrowing')}}">
                        <button type="button" class="btn btn-primary btn-sm">Book Borrowing</button>
                    </a>

                    <a href="{{route('list-book-borrowed')}}">
                        <button type="button" class="btn btn-primary btn-sm">Books Borrowed</button>
                    </a>

                </div>
            </div>
        </div>
    </div>
</div>

<br>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Books</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Title</th>
                                <th scope="col">Count</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if( !empty($books) )
                                @foreach( $books as $book )
                                <tr>
                                    <th scope="row">{{$book->id}}</th>
                                    <td>
                                        <a href="{{route('view_book', ['book_id'=>$book->id])}}">
                                            {{$book->title}}
                                        </a>
                                    </td>
                                    <td>{{$book->count}}</td>
                                </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
