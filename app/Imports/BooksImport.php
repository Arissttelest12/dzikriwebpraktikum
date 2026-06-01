<?php

namespace App\Imports;

use App\Models\Book;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class BooksImport implements ToModel,WithHeadingRow
{
    /** 
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Book([
            'title'        => $row['title'] ?? $row['judul'] ?? null,
            'author'       => $row['author'] ?? $row['penulis'] ?? null,
            'year'         => $row['year'] ?? $row['tahun'] ?? null,
            'publisher'    => $row['publisher'] ?? $row['penerbit'] ?? null,
            'city'         => $row['city'] ?? $row['kota'] ?? '-',
            'bookshelf_id' => $row['bookshelf_id'] ?? $row['bookshelf'] ?? $row['rak'] ?? $row['rak_id'] ?? $row['id_rak'] ?? $row['kode_rak'] ?? 1,
        ]);
    }
}
