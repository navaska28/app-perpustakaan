@extends('layouts.app')

@section('title', 'Tambah Buku')

@section('content')

<style>
    .form-container {
        max-width: 600px;
    }

    .form-group {
        margin-bottom: 16px;
    }

    .form-group label {
        display: block;
        margin-bottom: 6px;
        font-weight: bold;
    }

    .form-group input,
    .form-group select {
        width: 100%;
        padding: 9px;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
    }

    .error {
        color: red;
        font-size: 14px;
        margin-top: 5px;
    }

    .btn {
        padding: 10px 20px;
        background-color: #2563eb;
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    .btn:hover {
        background-color: #1d4ed8;
    }
</style>

<h1>Tambah Buku</h1>

<p>
    <a href="{{ route('books.index') }}">
        &larr; Kembali ke daftar buku
    </a>
</p>

<div class="form-container">

    <form action="{{ route('books.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="judul">Judul</label>
            <input
                type="text"
                name="judul"
                id="judul"
                value="{{ old('judul') }}"
            >

            @error('judul')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="penulis">Penulis</label>
            <input
                type="text"
                name="penulis"
                id="penulis"
                value="{{ old('penulis') }}"
            >

            @error('penulis')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="penerbit">Penerbit</label>
            <input
                type="text"
                name="penerbit"
                id="penerbit"
                value="{{ old('penerbit') }}"
            >

            @error('penerbit')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="tahun_terbit">Tahun Terbit</label>
            <input
                type="number"
                name="tahun_terbit"
                id="tahun_terbit"
                value="{{ old('tahun_terbit') }}"
            >

            @error('tahun_terbit')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="isbn">ISBN (opsional)</label>
            <input
                type="text"
                name="isbn"
                id="isbn"
                value="{{ old('isbn') }}"
            >

            @error('isbn')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="stok">Stok</label>
            <input
                type="number"
                name="stok"
                id="stok"
                value="{{ old('stok', 1) }}"
            >

            @error('stok')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="category_id">Kategori</label>

            <select name="category_id" id="category_id">
                <option value="">-- Pilih Kategori --</option>

                @foreach ($categories as $category)
                    <option
                        value="{{ $category['id'] }}"
                        @selected(old('category_id') == $category['id'])
                    >
                        {{ $category['nama_kategori'] }}
                    </option>
                @endforeach
            </select>

            @error('category_id')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn">
            Simpan
        </button>

    </form>

</div>

@endsection