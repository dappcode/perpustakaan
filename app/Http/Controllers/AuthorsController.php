<?php

namespace App\Http\Controllers;

use Session;
use App\Author;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Yajra\DataTables\Html\Builder;


class AuthorsController extends Controller
{
    public function index(Request $request, Builder $htmlBuilder)
    {
        // Cara Biasa
        // $authors = Author::all();
        // return view('authors.index', compact('authors'));

        // Cara DataTables
        if($request->ajax()){
            $authors = Author::all();

            return Datatables::of($authors)
                    ->addColumn('action', function ($author) {
                        return view('datatable._action', [
                            'author_name' => $author->name,
                            'edit_url' => route('authors.edit', $author->id),
                            'detail_url' => route('authors.show', $author->id),
                            'delete_url' => route('authors.destroy', $author->id),
                            'confirm_message' => 'Yakin akan menghapus ' . $author->name,
                        ]);
                    })->toJson();
        }

        $html = $htmlBuilder->columns([
            ['data' => 'name',  'name' => 'name', 'title' => 'Nama'],
            ['data' => 'action', 'name' => 'action', 'title' => '', 'orderable' => false, 'searchable' => false,]
        ]);

        return view('authors.index', compact('html'));
    }

    public function create()
    {
        return view('authors.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:authors'
        ],
        [
            'name.required' => ' Nama tidak boleh kosong!!!',
            'name.unique'   => 'Nama Sudah terdaftar, Ganti yang lain!!!'
        ]);

        $author = Author::create($request->all());
        
        // Cara Pertama
        // Session::flash('flash_notification', [
        //     'level' => 'success',
        //     'message' => 'Berhasil Menyimpan Data '.$author->name
        // ]);
        // return redirect()->route('authors.index');


        // Cara Kedua
        return redirect()->route('authors.index')->with('flash_notification', [
            'level' => 'success',
            'message' => 'Berhasil Menyimpan Data '.$author->name
        ]);
    }

    public function show(Author $author)
    {
        return view('authors.show', compact('author'));
    }

    public function edit(Author $author)
    {
        return view('authors.edit', compact('author'));
    }

    public function update(Request $request, Author $author)
    {
        $request->validate([
            'name' => 'required|unique:authors,name,' . $author->id,
            // Boleh sama dengan syarat nama dia sendiri
        ],
        [
            'name.required' => ' Nama tidak boleh kosong!!!',
            'name.unique'   => 'Nama Sudah terdaftar, Ganti yang lain!!!'
        ]);

        $author->update($request->only('name'));

        return redirect()->route('authors.index')->with('flash_notification', [
            'level' => 'success',
            'message' => 'Berhasil Merubah Data <strong class="text-info">'.$author->name.'</strong>'
        ]);
    }

    public function destroy(Author $author)
    {
        if (!$author->delete()) {
            return redirect()->back();
        }
        
        return redirect()->route('authors.index')->with('flash_notification', [
            'level' => 'danger',
            'message' => 'Berhasil Menghapus Data <strong class="text-primary">'.$author->name.'</strong>'
        ]);
    }
}
