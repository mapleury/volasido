@extends('template.base')
<!-- ini buat ngepanggil -->

@section ('tittle', 'Detail Buku')

@section('content')

@if(session('message'))
<div class="alert alert-sucsess">
  {{session('message')}}
</div>
@endif


<div class="row">
    <div class="col-md-4">
        <div class="card">
            <img class="card-img" src="{{ asset($book->cover) }}" alt="{{ $book->title }}" style="width: 200px; margin-top: 30px;">
        </div>
    </div>
</div>

<div class="col-md-8">
    <div class="card p-4">
        <h4 class="mb-3">{{ $book->title }}</h4>
        <p><strong>Penulis: {{ $book->author }}</strong></p>
        <p><strong>Penerbit: {{ $book->publisher }}</strong></p>
        <p><strong>Tahun Cetak: {{ $book->year }}</strong></p>
        <p><strong>Kategori: {{ $book->category->name }}</strong></p>
        <p>
            @if ($book->stock > 0)
                  <span class="badge bg-success">Tersedia {{$book->stock}}</span>
                  @else
                  <span class="badge bg-danger">Tidak Tersedia</span>
                  @endif</p>

            <div class="mt-3">
                <a href="{{ route('books.edit', $book->id) }}" class="btn btn-warning">Edit</a>
                <button class="btn btn-danger" onclick="confirmDelete({{ $book->id }})">Hapus</button>
                <a href="{{ route('book') }}" class="btn btn-secondary">Kembali</a>
                <form id="delete-form-{{  $book->id }}" action="{{  route('books.destroy', $book->id) }}" method="post" style="display: none;">
                @csrf
                @method('DELETE')
                </form>
            </div>


            <script>    
            function confirmDelete (bookId){
            Swal.fire({
  title: "Apakah Anda yakin?",
  text: "Data Buku akan dihapus permanen!",
  icon: "warning",
  showCancelButton: true,
  confirmButtonColor: "#3085d6",
  cancelButtonColor: "#d33",
  confirmButtonText: "Ya, Hapus"
}).then((result) => {
  if (result.isConfirmed) {
   document.getElementById('delete-form-' + bookId).submit();
  }
});}</script>

@endsection