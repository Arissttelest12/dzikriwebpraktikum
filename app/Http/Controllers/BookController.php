<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Bookshelf;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Book::with('bookshelf')->get();
        return view('books.index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $bookshelves = Bookshelf::pluck('name', 'id');
        return view('books.create', compact('bookshelves'));
    }

    /**
     * Store a newly created resource in storage.
     */
   public function store(Request $request)
    {
    $data = $request->validate([
        'title' => 'required',
        'author' => 'required',
        'year' => 'required',
        'publisher' => 'required',
        'city' => 'required',
        'bookshelf_id' => 'required',
        'cover' => 'nullable|image'
    ]);

    if ($request->hasFile('cover')) {
        $file = $request->file('cover');
        $filename = time().'.'.$file->getClientOriginalExtension();
        $file->storeAs('public/cover_buku', $filename);
        $data['cover'] = $filename;
    }

    Book::create($data);

    return redirect()->route('books');
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {

    }
}
