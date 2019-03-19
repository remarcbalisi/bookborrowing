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
                        <a href="{{route('home')}}">
                            <button type="button" class="btn btn-primary btn-sm">View Books</button>
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
                    <div class="card-header">Book Information</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <p>
                            <strong>Title: </strong>{{$book->title}}
                        </p>
                        <p>
                            <strong>Description: </strong>{{$book->description}}
                        </p>
                        <p>
                            <strong>Count: </strong>{{$book->count}}
                        </p>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
