@extends('student.base')  

@section('content')
<style>
    .book-card {
        background-color: transparent;
       
    }

    .book-card .card {
    overflow: hidden;
    background-color: transparent;
    border: 2px solid #6A100C; 
    box-shadow: none; }
.card-img-top {
    width: 100%;
    height: auto;
    display: block;
    object-fit: cover;
}

.card-body {
    background-color: #EDE4D5;
    padding: 1rem;
}

.card-title {
    font-family: serif;
    font-size: 2rem;
    color: #6A100C !important;
    margin-bottom: 0.5rem;
}

.custom-badge {
    display: inline-block;
    background-color: #6A100C;
    color: #fff;
    font-size: 1rem;
    padding: 4px 8px;
}

.read-now-btn {
margin-top: 0.75rem;
border: 2px solid #6A100C;
background-color: #EDE4D5;
color: #6A100C;
font-size: 0.85rem;
padding: 6px 12px;
border-radius: none;
text-align: center;
text-decoration: none;
display: inline-block;
transition: all 0.3s ease;
}

.read-now-btn:hover {
background-color: #6A100C;
color: #fff;
}

h3 {
    margin-top: 3rem;
    margin-bottom: 1.5rem;
}

.centered-image {
display: block;
margin-left: auto;
margin-right: auto;
width: 50%; 
max-width: 100%; 
}


</style>

<div class="px-5 my-5">
    <img class="centered-image" src="{{ asset('images/all-book-title.svg') }}" alt="Book Title">

    @foreach ($categories as $category)
        @if ($category->books->count())
            <h3 class="card-title mb-4" style="font-size:3rem !important; font-style: italic;">{{ $category->name }}</h3>
            <div class="row">
                @foreach ($category->books as $book)
                    <div class="col-md-3 mb-4 book-card">
                        <div class="card h-100">
                            <img src="{{ asset($book->cover) }}" class="card-img-top" alt="{{ $book->title }}">
                            <div class="card-body">
                                <h5 class="card-title fw-semibold">{{ $book->title }}</h5>
                                <span class="custom-badge">#{{ $book->author }}</span>
                                <a href="{{ route('student.book.show', $book->id) }}" class="read-now-btn">Read Now</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    @endforeach
</div>
@endsection
