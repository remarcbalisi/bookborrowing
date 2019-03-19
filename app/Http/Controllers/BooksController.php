<?php

namespace App\Http\Controllers;

use App\Books;
use App\User;
use Illuminate\Http\Request;

class BooksController extends Controller
{
    public function create(){
        return view('create_book');
    }

    public function store(Request $request){
        $request->validate([
            'title' => 'unique:books|required',
            'description' => 'required',
            'count' => 'required'
        ]);

        $new_book = new Books;
        $new_book->title = $request->input('title');
        $new_book->description = $request->input('description');
        $new_book->count = $request->input('count');
        $new_book->save();

        return redirect()->back()->with([
            'success_msg' => 'Successfully added ' . $new_book->title,
        ]);
    }

    public function view($book_id){
        return view('view_book')->with([
            'book' => Books::where('id', $book_id)->first(),
        ]);
    }

    public function book_borrowing(){
        return view('book_borrowing')->with([
            'books' => Books::get(),
            'students' => User::where('role_id', 2)->get(),
        ]);
    }

}
