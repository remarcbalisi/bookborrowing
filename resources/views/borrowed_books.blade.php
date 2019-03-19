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

                        <a href="{{route('home')}}">
                            <button type="button" class="btn btn-primary btn-sm">View Books</button>
                        </a>

                        <a href="{{route('create_book')}}">
                            <button type="button" class="btn btn-primary btn-sm">Add Books</button>
                        </a>

                        <a href="{{route('book_borrowing')}}">
                            <button type="button" class="btn btn-primary btn-sm">Book Borrowing</button>
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
                    <div class="card-header">Borrowed Books</div>

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
                                    <th scope="col">Student</th>
                                    <th scope="col">Book</th>
                                    <th scope="col">Borrowed Date</th>
                                    <th scope="col">Fines</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach( $borrowed_books as $borrowed_book )
                                <tr>
                                    <th scope="row">{{$borrowed_book->id}}</th>
                                    <td>{{$borrowed_book->user->fname . ' ' . $borrowed_book->user->lname}}</td>
                                    <td>{{$borrowed_book->book->title}}</td>
                                    <td>{{$borrowed_book->created_at}}</td>
                                    <td>₱ {{number_format ( $borrowed_book->fine , 2 )}}</td>
                                    <td>
                                        <a href="{{route('return-book-borrowed', ['book_borrowed_id'=>$borrowed_book->id])}}">
                                            <button type="button" class="btn btn-success btn-sm">Return</button>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
