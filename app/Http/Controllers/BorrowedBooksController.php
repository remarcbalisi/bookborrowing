<?php

namespace App\Http\Controllers;

use App\Books;
use App\BorrowedBooks;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class BorrowedBooksController extends Controller
{
    public function store_borrowed_books(Request $request){

        $book_id = $request->input('books');
        $student_id = $request->input('students');

        $book = Books::where('id', $book_id)->first();
        $student = User::where('id', $student_id)->first();

        $new_borrowed_books = new BorrowedBooks;
        $new_borrowed_books->user_id = $student->id;
        $new_borrowed_books->books_id = $book->id;
        $new_borrowed_books->save();

        $book->count--;
        $book->save();

        return redirect()->back()->with([
            'success_msg' => 'Successfully borrowed!'
        ]);
    }

    public function borrowed_books_list() {
        $borrowed_books = BorrowedBooks::where('is_returned', false)->get();
        foreach( $borrowed_books as $borrowed_book ) {
            $date = Carbon::parse($borrowed_book->created_at);
            $now = Carbon::now();

            $diff = $date->diffInDays($now);

            $borrowed_book->fine = $diff * 3;
            $borrowed_book->save();
        }
        return view('borrowed_books')->with([
            'borrowed_books' => $borrowed_books,
        ]);
    }

    public function return_book($borrowed_books_id) {
        $borrowed_books = BorrowedBooks::where('id', $borrowed_books_id)->first();
        $borrowed_books->is_returned = true;
        $borrowed_books->save();

        return redirect()->back();
    }
}
