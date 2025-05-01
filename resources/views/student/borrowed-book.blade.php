@extends('student.base')

@section('title', 'Borrowed Books')

@section('content')
<section class="py-5 pt-5 bg-light">
    <div class="px-5">
        <img class="centered-image" src="{{ asset('images/your-books.svg') }}" alt="Book Title">

        @if($borrowings->isEmpty())
            <div class="alert alert-info">You haven't borrowed any books yet.</div>
        @else
            <div class="list-group">
                @foreach($borrowings as $borrowing)
                @php
                    $book = $borrowing->book;
                    $borrowedAt = \Carbon\Carbon::parse($borrowing->borrowed_at);
                    $returnDate = \Carbon\Carbon::parse($borrowing->return_at);
                    $extendedReturnDate = $returnDate->addDays(5);

                    $diffInHours = now()->diffInHours($extendedReturnDate, false);
                    $diffInDays = floor($diffInHours / 24); 
                    $diff = $diffInDays < 0 ? 0 : $diffInDays; 
                @endphp

                    <div class="list-group-item list-group-item-action shadow-sm rounded mb-3 p-3">
                        <div class="d-flex flex-column flex-md-row align-items-md-center gap-4">
                            <img src="{{ asset($book->cover) }}" alt="{{ $book->title }}" class="rounded shadow-sm" style="width: 120px; height: 170px; object-fit: cover;">
                           
                            <div class="flex-grow-1">
                                <h5 class="mb-1 card-title">{{ $book->title }}</h5>
                                <p class="mb-1 text-muted">
                                    Borrowed on: <strong>{{ $borrowedAt->format('d M Y') }}</strong> |
                                    Return by: <strong>{{ $returnDate->format('d M Y') }}</strong>
                                </p>

                                @if($diff === 0)
                                    <span class="badge bg-danger mb-2">MUST BE RETURNED!</span>
                                @elseif($diff < 0)
                                    <span class="badge bg-danger mb-2">Late by {{ abs($diff) }} days - Penalty Applicable</span>
                                @elseif($diff <= 5)
                                    <span class="badge bg-red mb-2">{{ $diff }} days left to return</span>
                                @else
                                    <span class="badge bg-success mb-2">Still {{ $diff }} days remaining</span>
                                @endif

                                <p class="mb-0"><strong>Status:</strong> {{ ucfirst($borrowing->status) }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</section>

<style>
  

    .bg-light {
        background-color: #EDE4D5 !important;
    }

    .bg-danger {
        background-color: #6A100C !important;
    }

    .bg-success {
        background-color: #3E8E41 !important;
    }

    .list-group-item-action {
        background-color: #fff;
        border: 2px solid #6A100C;
    }

    .list-group-item-action:hover {
        background-color: #F1E5D1;
    }

    .badge {
        font-size: 0.85rem;
        font-weight: 600;
    }

    h5 {
        font-family: 'Serif', sans-serif;
        font-size: 1.1rem;
    }

    .centered-image {
    display: block;
    margin-left: auto;
    margin-right: auto;
    margin-top: -40px ;
    margin-bottom: 20px;
    width: 50%; 
    max-width: 100%; 
}


.card-title {
    font-family: serif;
    font-size: 2rem;
    color: #6A100C !important;
    margin-bottom: 0.5rem;
}
</style>

@endsection
