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
                    <div class="card-header">Book Borrowing</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        @if (session('success_msg'))
                            <div class="alert alert-success" role="alert">
                                {{ session('success_msg') }}
                            </div>
                        @endif

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{route('store_book_borrowed')}}">
                            @csrf
                            <div class="form-group">
                                <label for="books">Books</label>
                                <select class="form-control" name="books" id="books">
                                    @foreach( $books as $book )
                                        <option value="{{$book->id}}">{{$book->title}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="students">Students</label>
                                <select class="form-control" name="students" id="students">
                                    @foreach( $students as $student )
                                        <option value="{{$student->id}}">{{$student->fname}} {{$student->lname}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Borrow Now!</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
