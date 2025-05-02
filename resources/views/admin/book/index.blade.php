@extends('template.base')

@section('title', 'Dashboard Admin')

@section('content')

{{-- Playfair Display Font --}}
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display&display=swap" rel="stylesheet">

<style>
  body {
    background-color: #EDE4D5;
    font-family: 'Playfair Display', serif;
    color: #6A100C;
  }

  .card {
    background-color: #EDE4D5;
    border: 1px solid #6A100C;
    border-left: 4px solid #6A100C;
    border-radius: 12px;
    box-shadow: 4px 4px 0 #6A100C33;
  }

  .card-title, th, td {
    font-weight: 600;
    font-family: 'Playfair Display', serif;
    color: #6A100C;
  }

  table {
    border-color: #6A100C !important;
    border: 10px;
  }

  .btn {
    border-radius: 6px;
    font-family: 'Playfair Display', serif;
  }

  .btn-sm i {
    margin-right: 4px;
  }

  .badge.bg-success {
    background-color: #6A100C !important;
  }

  .badge.bg-danger {
    background-color: #a12824 !important;
  }

  .alert-success {
    background-color: #fff4e6;
    color: #6A100C;
    border-left: 6px solid #6A100C;
    font-family: 'Playfair Display', serif;
  }

  .pagination .page-link {
    color: #6A100C;
  }

.pagination .page-item.active .page-link {
  background-color: #6A100C;
  border-color: #6A100C;
  color: #EDE4D5;
}

.pagination .page-link {
  color: #6A100C;
  border-color: #6A100C;
}

.pagination .page-link:hover {
  background-color: #6A100C22;
}

.table thead tr {
  background-color: #f7f2ea;
  color: #6A100C;
  font-weight: bold;
  font-family: 'Playfair Display', serif;
}

</style>

@if(session('message'))
<div class="alert alert-success">
  {{ session('message') }}
</div>
@endif

<div class="col-lg-10 grid-margin stretch-card">
  <div class="card">
    <div class="card-body position-relative">
      <h4 class="card-title" style="font-family: 'Playfair display';">Library Book List</h4>
      <table class="table table-bordered">
        <thead>
          <tr>
            <th style="font-family: 'Playfair display';">ID Book</th>
            <th style="font-family: 'Playfair display';">Title</th>
            <th style="font-family: 'Playfair display';">Status</th>
            <th style="font-family: 'Playfair display';">Action</th>
          </tr>
        </thead>
        <tbody>
          @forelse ($books as $book)
          <tr>
            <td>{{ $book->id }}</td>
            <td>{{ $book->title }}</td>
            <td>
              @if ($book->stock > 0)
                <span class="badge bg-success">Available ({{ $book->stock }})</span>
              @else
                <span class="badge bg-danger">Unavailable</span>
              @endif
            </td>
            <td>
              <a href="{{ route('books.detail', $book->id) }}" class="btn btn-outline-success btn-sm">
                <i class="fa-solid fa-eye"></i> View
              </a>
              <a href="{{ route('books.edit', $book->id) }}" class="btn btn-outline-warning btn-sm">
                <i class="fa-solid fa-pencil"></i> Edit
              </a>
              <button class="btn btn-outline-danger btn-sm" onclick="confirmDelete({{ $book->id }})">
                <i class="fa-solid fa-trash"></i> Delete
              </button>
              <form id="delete-form-{{ $book->id }}" action="{{ route('books.destroy', $book->id) }}" method="POST" style="display: none;">
                @csrf
                @method('DELETE')
              </form>
            </td>
          </tr>
          @empty
          <tr>
            <td colspan="4">No books available</td>
          </tr>
          @endforelse
        </tbody>
      </table>

      <div class="flex justify-content-center mt-3">
        {{ $books->links('pagination::bootstrap-4') }}
      </div>
    </div>
  </div>
</div>

<script>    
function confirmDelete(bookId) {
  Swal.fire({
    title: "Are you sure?",
    text: "This book record will be permanently deleted!",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#6A100C",
    cancelButtonColor: "#aaa",
    confirmButtonText: "Yes, delete it"
  }).then((result) => {
    if (result.isConfirmed) {
      document.getElementById('delete-form-' + bookId).submit();
    }
  });
}
</script>

@endsection
