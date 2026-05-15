<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Tambah Buku') }}
        </h2>
    </x-slot>


    
    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow-md rounded-lg p-6">

                <form method="PUT" action="{{ route('books.update', $books->id) }}" enctype="multipart/form-data" class="space-y-6">
    @csrf
    
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

        
        <div>
            <x-input-label for="title" value="Judul Buku"/>
            <x-text-input id="title" name="title" type="text"
                class="mt-1 block w-full focus:ring-2 focus:ring-blue-500"
                value="{{ old('title') }}" required/>
            <x-input-error :messages="$errors->get('title')" class="mt-2"/>
        </div>

        
        <div>
            <x-input-label for="author" value="Penulis"/>
            <x-text-input id="author" name="author" type="text"
                class="mt-1 block w-full focus:ring-2 focus:ring-blue-500"
                value="{{ old('author') }}" required/>
            <x-input-error :messages="$errors->get('author')" class="mt-2"/>
        </div>

        
        <div>
            <x-input-label for="year" value="Tahun Terbit"/>
            <x-text-input id="year" name="year" type="number"
                class="mt-1 block w-full focus:ring-2 focus:ring-blue-500"
                value="{{ old('year') }}" required/>
            <x-input-error :messages="$errors->get('year')" class="mt-2"/>
        </div>

        
        <div>
            <x-input-label for="publisher" value="Penerbit"/>
            <x-text-input id="publisher" name="publisher" type="text"
                class="mt-1 block w-full focus:ring-2 focus:ring-blue-500"
                value="{{ old('publisher') }}" required/>
            <x-input-error :messages="$errors->get('publisher')" class="mt-2"/>
        </div>

        
        <div>
            <x-input-label for="city" value="Kota Terbit"/>
            <x-text-input id="city" name="city" type="text"
                class="mt-1 block w-full focus:ring-2 focus:ring-blue-500"
                value="{{ old('city') }}" required/>
            <x-input-error :messages="$errors->get('city')" class="mt-2"/>
        </div>

        
        <div>
            <x-input-label for="bookshelf_id" value="Kategori Rak"/>
            <select name="bookshelf_id" id="bookshelf_id"
                class="mt-1 block w-full border-gray-300 rounded focus:ring-2 focus:ring-blue-500">
                <option value="">-- Pilih Rak Buku --</option>
                @foreach($bookshelves as $bookshelf)
                    <option value="{{ $bookshelf->id }}"
                        {{ old('bookshelf_id') == $bookshelf->id ? 'selected' : '' }}>
                        {{ $bookshelf->code }} - {{ $bookshelf->name }}
                    </option>
                @endforeach
            </select>
            <x-input-error :messages="$errors->get('bookshelf_id')" class="mt-2"/>
        </div>

    </div>

    
    <div>
        <x-input-label for="cover" value="Cover Buku"/>
        <input type="file" name="cover" id="cover"
            class="mt-1 block w-full border-gray-300 rounded cursor-pointer"/>

        <!-- Preview -->
        <img id="preview" class="mt-3 hidden w-32 rounded shadow"/>

        <x-input-error :messages="$errors->get('cover')" class="mt-2"/>
    </div>

    <!-- BUTTON -->
    <div class="flex justify-between items-center pt-6 border-t">

        <a href="{{ route('books') }}"
           class="px-4 py-2 bg-gray-500 text-white rounded hover:bg-gray-600 transition">
            Cancel
        </a>

        <div class="flex gap-3">
            <x-primary-button name="save_and_create" value="true">
                Save dan Simpan baru
            </x-primary-button>

            <x-primary-button name="save" value="true">
                💾 Save
            </x-primary-button>
        </div>
    </div>
</form>

<script>
document.getElementById('cover').addEventListener('change', function(event) {
    const preview = document.getElementById('preview');
    const file = event.target.files[0];

    if (file) {
        preview.src = URL.createObjectURL(file);
        preview.classList.remove('hidden');
    }
});
</script>
            </div>
        </div>
    </div>
</x-app-layout>