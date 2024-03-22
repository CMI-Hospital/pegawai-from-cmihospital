<!-- resources/views/articles/create.blade.php -->

@extends('layout.base')

@section('content')

    <h1 class="text-center mt-5">Halaman Pembuatan Artikel</h1>

    <!-- Form to create a new article -->
    <form class="mt-4" action="{{ route('articles.store') }}" method="post" enctype="multipart/form-data">
        @csrf

        <input type="hidden" name="pegawai_id" value="{{ $pegawaiId }}">

        <div class="form-group">
            <label for="title">Judul</label>
            <input type="text" class="form-control" name="title" id="title" required>
        </div>

        <div class="form-group">
            <label for="content">Konten</label>
            <textarea rows="20" class="form-control" name="content" id="content" required></textarea>
        </div>
        
        <div class="form-group">
            <label for="category">Kategori</label>
            <select class="form-control" name="category" id="category" required>
                <option value="">Select Category</option>
                @foreach($categories as $category)
                    <option value="{{ $category->category }}">{{ $category->category }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="image">Gambar</label>
            <input type="file" class="form-control-file" id="image" name="image">
        </div>

        <button type="submit" class="btn btn-primary">Buat Artikel</button>
    </form>

    <!-- Bootstrap JS (optional, for some components) -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

@endsection
