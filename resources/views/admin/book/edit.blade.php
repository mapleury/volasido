@extends('template.base')
<!-- ini buat ngepanggil -->

@section ('tittle', 'Update Data Buku')

@section('content')

@if(session('message'))
<div class="alert alert-sucsess">
  {{session('message')}}
</div>
@endif

  <div class="col-10 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Update data buku</h4>
        <p class="card-description"> Silahkan isi untuk memperbaharui data Buku </p>
        <form method="POST" action="{{ route('books.update', $book->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
        
            <div class="form-group">
            <label for="exampleInputName1">Judul</label>
            <input value="{{ $book->title }}" name="title"type="text" class="form-control @error('title') is-invalid @enderror" id="exampleInputName1" placeholder="Masukkan Judul Buku">
            @error('title')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
          <div class="form-group">
            <label for="category">Pilih Kategori Buku</label>
            <select name="category_id" class="form-select @error('category_id') is-invalid @enderror">
              <option selected disabled>Pilih Kategori Buku...</option>
              @foreach ($categories as $category)
                  <option value="{{ $category->id }}" 
                      {{ old('category_id', $book->category_id) == $category->id ? 'selected' : '' }}>
                      {{ $category->name }}
                  </option>
              @endforeach
              @error('category_id')
                  <div class="invalid-feedback">{{ $message }}</div>
              @enderror
          </select>
          </div>
          <div class="form-group">
            <label for="author">Penulis</label>
            <input   value="{{ $book->author }}"name="author" type="text" class="form-control @error('author') is-invalid @enderror" id="exampleInputPassword4" placeholder="Masukkan Nama Penulis">
            @error('author')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
        
          <div class="form-group">
            <label for="publisher">Penerbit</label>
            <input  value="{{ $book->publisher }}" name="publisher" type="text" class="form-control @error('publisher') is-invalid @enderror" id="exampleInputPassword4" placeholder="Masukkan Nama Penerbit">
            @error('publisher')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>

          <div class="form-group">
            <label for="year">Tahun Cetak</label>
            <input value="{{ $book->year }}" name="year" type="number" class="form-control @error('year') is-invalid @enderror" id="exampleInputPassword4" placeholder="Masukkan Tahun Cetak">
            @error('year')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>

          <div class="form-group">
            <label for="stock">Stok Buku</label>
            <input value="{{ $book->stock }}" name="stock" type="number" class="form-control @error('stock') is-invalid @enderror" id="exampleInputPassword4" placeholder="Masukkan Stok Buku">
            @error('stock')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>


          <div class="form-group">
            <label for="cover">Upload Cover</label>
            <input  name="cover" type="file" class="form-control @error('cover') is-invalid @enderror" id="exampleInputPassword4" placeholder="Masukkan Stok Buku">
            @error('cover')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror

            @if($book->cover)
            <p style="margin-top: 50px;">Cover Saat ini</p>
            <img src="{{ asset($book->cover) }}" alt="img-book" style="width: 200px;">
            @endif
          
          </div>

        
    
          <button type="submit" class="btn btn-gradient-primary me-2">Submit</button>
        </form>
      </div>
    </div>
  </div>

@endsection