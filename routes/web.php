<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/add/books', 'BooksController@create')->name('create_book');
Route::get('/view/book/{book_id}', 'BooksController@view')->name('view_book');
Route::post('/store/books', 'BooksController@store')->name('store_book');
Route::get('/book-borrowing', 'BooksController@book_borrowing')->name('book_borrowing');
Route::get('/store/book-borrowed', 'BorrowedBooksController@store_borrowed_books')->name('store_book_borrowed');
Route::get('/list/book-borrowed', 'BorrowedBooksController@borrowed_books_list')->name('list-book-borrowed');
Route::get('/return/book-borrowed/{borrowed_book_id}', 'BorrowedBooksController@return_book')->name('return-book-borrowed');
