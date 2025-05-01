@extends('student.base')

@section('title', 'Welcome Student')

@section('content')

<section class="py-5 min-vh-100" style="background-color: #f9f1e4;">
    <div class="px-5 py-5">
        <div class="row g-4 align-items-center">
            <div class="col-md-5">
                <img src="{{ asset($book->cover) }}" alt="" class="img-fluid rounded shadow-sm" style="max-height: 450px; object-fit: cover; border: 4px solid #6A100C; margin-left: 160px;">
            </div>
            <div class="col-md-7">
                <h2 class="text-dark" style="font-family: 'Times New Roman', serif; font-weight: bold; font-size: 2.5rem; color: #6A100C;">{{  $book->title }}</h2>
                <p class="text-muted mb-2" style="font-size: 1.2rem; font-style: italic;">Author: <strong>{{  $book->author }}</strong></p>
                <p class="text-muted mb-2" style="font-size: 1.2rem;">Year: {{  $book->year }}</p>
                <p class="text-muted mb-2" style="font-size: 1.2rem;">Publisher: {{  $book->publisher }}</p>
                <p class="text-muted mb-2" style="font-size: 1.2rem;">Category: <span class="badge" style="background-color: #6A100C; color: white; font-size: 1.1rem;">{{  $book->category->name }}</span></p>
                <p class="text-muted mb-2" style="font-size: 1.2rem;">Stock: {{  $book->stock }}</p>

                <hr style="border: 1px solid #6A100C;">
                <p class="mb-4" style="font-size: 1.2rem; font-style: italic;">later</p>

                @if ($book->stock > 0)
                    @if ($isAlreadyBorrowed)
                        {{-- stok masih ada, sudah dipinjam --}}
                        <button class="btn btn-secondary btn-lg" type="submit" disabled style="background-color: #A8A8A8; border-color: #6A100C; color: white;">
                            <i class="bi bi-check-circle"></i> Borrowed by you
                        </button>
                    @else
                        {{-- kondisi buku belum dipinjam dan stok masih ada --}}
                        <form action="{{ route('student.borrow', $book->id) }}" method="POST">
                            @csrf
                            <input type="hidden" name="book_id" value="{{ $book->id }}">
                            <button class="btn" type="submit" style="background-color: #6A100C; color: white; font-size: 1.1rem; border-radius: 4px; padding: 0.75rem 1.5rem;">
                                <i class="bi bi-journal-arrow-down"></i> Borrow
                            </button>
                        </form>
                    @endif
                @else
                    {{-- stok tidak tersedia --}}
                    <div class="alert alert-warning" style="background-color: #F9E1C3; border: 1px solid #F7C52B; color: #6A100C; font-weight: bold;">Out of Stock</div>
                @endif
            </div>
          
        </div>
           <!-- Back to Home -->
           <div class="mt-4">
            <a href="{{ route('student.dashboard') }}" class="btn" style="background-color: #6A100C; color: white; font-size: 1.1rem; padding: 0.75rem 1.5rem; border-radius: 4px; margin-left: 160px;">
                <i class="bi bi-house-door"></i> Back to Home
            </a>
        </div>
    </div>
</section>

@endsection
