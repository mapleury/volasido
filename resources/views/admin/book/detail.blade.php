@extends('template.base')

@section('tittle', 'Detail Buku')

@section('content')

@if(session('message'))
<div class="alert alert-success retro-alert">
  {{session('message')}}
</div>
@endif

<div class="retro-container">
    <div class="row">
        <div class="col-5 text-center">
            <div class="retro-card text-center" style="padding: 20px; width: 100%; max-width: 300px; margin: 0 auto;">
                <img class="card-img" src="{{ asset($book->cover) }}" alt="{{ $book->title }}" style="width: 150px;">
            </div>
        </div>

        <div class="col-md-7">
            <div class="retro-card p-4">
                <h4 class="mb-3 retro-title">{{ $book->title }}</h4>
                <p><strong>Penulis:</strong> {{ $book->author }}</p>
                <p><strong>Penerbit:</strong> {{ $book->publisher }}</p>
                <p><strong>Tahun Cetak:</strong> {{ $book->year }}</p>
                <p><strong>Kategori:</strong> {{ $book->category->name }}</p>
                <p>
                    @if ($book->stock > 0)
                    <span class="badge bg-success">Tersedia {{$book->stock}}</span>
                    @else
                    <span class="badge bg-danger">Tidak Tersedia</span>
                    @endif
                </p>

                <div class="mt-3">
                    <a href="{{ route('books.edit', $book->id) }}" class="btn retro-btn-warning">Edit</a>
                    <button class="btn retro-btn-danger" onclick="confirmDelete({{ $book->id }})">Hapus</button>
                    <a href="{{ route('book') }}" class="btn retro-btn-secondary">Kembali</a>
                    <form id="delete-form-{{  $book->id }}" action="{{  route('books.destroy', $book->id) }}" method="post" style="display: none;">
                        @csrf
                        @method('DELETE')
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Retro Style -->
<style>
body {
    background-color: #EDE4D5;
    font-family: 'Playfair display', monospace;
    color: #6A100C;
}

.retro-container {
    padding: 30px;
}

.retro-card {
    border: 3px double #6A100C;
    background-color: #fff;
    border-radius: 10px;
    box-shadow: 4px 4px 0 #6A100C;
    padding: 20px;
    widht: 100px;
}

.retro-title {
    font-family: 'Playfair display', serif;
    font-weight: bold;
    color: #6A100C;
    border-bottom: 2px dashed #6A100C;
    padding-bottom: 10px;
}

.retro-btn-warning {
    background-color: #EAC696;
    border: 2px solid #6A100C;
    color: #6A100C;
}

.retro-btn-danger {
    background-color: #F8C8C8;
    border: 2px solid #6A100C;
    color: #6A100C;
}

.retro-btn-secondary {
    background-color: #D5C6B2;
    border: 2px solid #6A100C;
    color: #6A100C;
}

.retro-btn-warning,
.retro-btn-danger,
.retro-btn-secondary {
    background-color: #EAC696;
    border: 2px solid #6A100C;
    color: #6A100C;
    padding: 6px 12px; 
    font-size: 14px;
    border-radius: 6px;
    margin-right: 5px;
}


.retro-btn-warning:hover,
.retro-btn-danger:hover,
.retro-btn-secondary:hover {
    background-color: #6A100C;
    color: #fff;
}

.retro-alert {
    background-color: #F9ECCC;
    color: #6A100C;
    border-left: 5px solid #6A100C;
    padding: 10px;
    margin-bottom: 20px;
}
</style>

<script>    
function confirmDelete(bookId) {
  Swal.fire({
    title: "Apakah Anda yakin?",
    text: "Data Buku akan dihapus permanen!",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#6A100C",
    cancelButtonColor: "#aaa",
    confirmButtonText: "Ya, Hapus"
  }).then((result) => {
    if (result.isConfirmed) {
      document.getElementById('delete-form-' + bookId).submit();
    }
  });
}
</script>

@endsection
