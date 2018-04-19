<?php

namespace App\Http\Controllers;

use Session;
use App\Author;
use App\Book;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Yajra\DataTables\Html\Builder;
use App\Http\Requests\BookRequest;

class BooksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Builder $builder)
    {
        if ($request->ajax()) {
            $books = Book::with('author')->get();
            
            return Datatables::of($books)
               ->addColumn('action', function ($book) {
                    return view('datatable._action', [
                        'detail_url' => route('books.show', $book->id),
                        'edit_url' => route('books.edit', $book->id),
                        'delete_url' => route('books.destroy', $book->id),
                        'confirm_message' => 'Yakin akan menghapus '.$book->name
                    ]);
                })->toJson();
                
        }
        $html = $builder->columns([
            ['data' => 'title', 'name' => 'title', 'title' => 'Books of Title' ],
            ['data' => 'amount', 'name' => 'amount', 'title' => 'Amount of Books' ],
            ['data' => 'author.name', 'name' => 'author.name', 'title' => 'Authors' ],
            ['data' => 'action', 'name' => 'action', 'title' => '', 'orderable' => false, 'searchable' => false ],
        ]);

        return view('books.index', compact('html'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $authors = Author::all();
        // dd($authors);

        return view('books.create', compact('authors'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BookRequest $request)
    {
        $book = Book::create($request->except('cover')); // -> Kecuali cover maksudnya

        // Cek jika user mengupload file
        if ($request->hasFile('cover')) {
            // ambil file yang di upload
            $upload_image = $request->file('cover');

            // mengambil extension file
            $extension = $upload_image->getClientOriginalExtension();

            // membuat nama file secara acak untuk menghindari duplikasi nama gambar 
            $filename = md5(time()) . '.' . $extension;

            // simpan gambar ke folder public/cover
            $destinationPath = public_path() . DIRECTORY_SEPARATOR . 'cover';

            $upload_image->move($destinationPath, $filename);

            // simpan filename ke database
            $book->cover = $filename;
            $book->save();
        }

        return redirect()->route('books.index')->with('flash_notification', [
            'level'     => 'success',
            'message'   => 'Berhasil menyimpan buku dengan judul '.$book->title,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        //
    }
}
