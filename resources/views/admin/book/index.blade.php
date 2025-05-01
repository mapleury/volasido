@extends('template.base')
<!-- ini buat ngepanggil -->

@section ('tittle', 'Dashboard Admin')

@section('content')

@if(session('message'))
<div class="alert alert-sucsess">
  {{session('message')}}
</div>
@endif

    <div class="col-lg-10 grid-margin stretch-card">

      <div class="card">
        <div class="card-body position-relative">
          <h4 class="card-title">Daftar List Buku</h4>
          <table class="table table-bordered">
            <thead>
              <tr>
                <th> ID Buku </th>
                <th> Judul </th>
                <th> Status </th>
                <th> Action </th>
              </tr>
            </thead>
            <tbody>
              @forelse ( $books as $book)

              <tr>
                <td> {{ $book->id }} </td>
                <td>  {{ $book->title }}  </td>
                <td>
                  @if ($book->stock > 0)
                  <span class="badge bg-success">Tersedia {{$book->stock}}</span>
                  @else
                  <span class="badge bg-danger">Tidak Tersedia</span>
                  @endif
                   </td>
                <td>
                  <a href="{{ route('books.detail', $book->id) }}" class="btn btn-gradient-success btn-sm"><i class="fa-solid fa-eye"></i></a>
                  <a href="{{ route('books.edit', $book->id) }}" class="btn btn-gradient-warning btn-sm"><i class="fa-solid fa-pencil"></i></a>
                  <button href="#" class="btn btn-gradient-danger btn-sm" onclick="confirmDelete({{ $book->id }})"><i class="fa-solid fa-trash"></i></button>

                  <form id="delete-form-{{  $book->id }}" action="{{  route('books.destroy', $book->id) }}" method="post" style="display: none;">
                  @csrf
                  @method('DELETE')
                  </form>
            
                </td>
    
              </tr>

              @empty
              <tr>
                <td colspan="7"> Tidak ada data buku </td>
              </tr>  
              @endforelse
                
      
            
          
            </tbody>
          </table>

          {{-- pagination --}}
          <div class="flex justify-content-center mt-3">
            {{ $books->links('pagination::bootstrap-4') }}

          </div>
        </div>
      </div>
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