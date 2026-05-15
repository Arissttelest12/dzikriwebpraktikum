<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Bookshelf;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
        $bookshelves = Bookshelf::all();
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
        $books = Book::with('bookshelf')->get();
        return view('books.show', compact('books'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $books = Book::findOrFail($id);
        $bookshelves = Bookshelf::all();
        return view('books.edit', compact('books', 'bookshelves'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
    $books = Book::findOrFail($id);
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
    $books->update($data);
    return redirect()->route('books');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $books = Book::findOrFail($id);

        Storage::delete('public/cover_buku/'.$books->cover);

        $books->delete();
        return redirect()->route('books');
    }

    public function print(){
        $books = Book::all();

        $pdf = Pdf::loadView('books.print', ['books'=>$books]);
        return $pdf->stream('laporan_buku2026.pdf');
    }
}
