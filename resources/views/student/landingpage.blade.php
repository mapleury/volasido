@extends('student.base')

@section('title', 'welcome Student')

@section('content')

<style> 
.card-title {
    font-family: serif;
    font-size: 1.5rem;
    color: #6A100C !important;
    margin-bottom: 0.5rem;
}
</style>

 <!-- Hero Section -->
 <section class="hero" style="
 background-image: url('{{ asset('images/bg-hero.svg') }}');
 background-attachment: fixed;
 background-size: cover;
 background-position: center;
 background-repeat: no-repeat;
 width: 100%;
 height: 100vh;
 display: flex;
 justify-content: center;
 align-items: center;
 color: white;
 text-shadow: 0 2px 5px rgba(0,0,0,0.5);
">

<!-- Language Switcher -->
<div class="language-switcher" onclick="switchLanguage()" style="cursor: pointer;">
 <img id="language-img" src="{{ asset('images/language.svg') }}" alt="Switch Language" style="width: 140px; height: 140px;">
</div>

<img src="{{ asset('images/hero-title.svg') }}" alt="Hero Title" class="blur-hero-title">

 </div>
 </section>

 </div>
 </section>

 <div class="transition" style="
 position: relative;
 margin-top: -120px;
 display: flex;
 flex-direction: column;
 align-items: center;
">
 <img src="{{ asset('images/book-shelf.svg') }}" alt="Transition Image" style="width: 86%; height: auto; margin-bottom: 350px;"  class="jumpy">
 <a href="{{ route('student.all.books') }}" class="see-all" id="see-all" style="
 margin-top: -150px;
 font-size: 40px;
 color: white;
 font-family: 'Playfair Display', serif;
 font-weight: 200;
 font-style: italic;
 cursor: pointer;
 text-decoration: underline;
 opacity: 60%;
">
 See all
</a>

</div>

<div class="container">
 <div class="column image-column">
     <img src="{{ asset('images/about.svg') }}" alt="About Volasido" style="width: 80%;">
 </div>
 <div class="column text-column">
     <div class="row title-row">
         <h1 id="sorrow-text">We have all sorts <br>  of russian sorrows,</h1>
     </div>
     <div class="row categories">
         <img src="{{ asset('images/category.svg') }}" alt="Description of Image" style="width: 70%;" class="tremor">
     </div>
     <div id="volasido-desc" class="row paragraph-row">
         <p class="volasido-paragraph" id="volasido-text">
             Thus, Volasido represents a journey through stories, translations, <br>
             and cultures. Where Russian literature "flies" across language <br>
             barriers into English, just like an octave.
         </p>
     </div>
 </div>

</div>

<img src="{{ asset('images/phone.svg') }}" class="phone" alt="Description of Image" style="width: 40%; margin-bottom: 10px;">


<!-- Buku Terbaru -->
<section id="books" class="py-5 bg-red">

 <div class="d-flex justify-content-between align-items-center w-100 mb-4 px-5" style="margin-top: -50px; padding-top: 20px; padding-bottom: 20px;">
     <img src="{{ asset('images/top-picks.svg') }}" alt="Icon" style="height: 200px; width: 200px;" class="jumpy">
     <h1 class="see-more-text mb-0">
         <a href="{{ route('student.all.books') }}" style="color: #EDE4D5;"> Discover more </a></h1>
 </div>
 

 <div class="contain" style="margin-top: -100px;">
     <div class="row">
         @foreach ($books->sortBy('stock')->take(4) as $book)
         <div class="col-md-3 mb-4 book-card">
             <div class="card h-100">
                 <img src="{{ asset($book->cover) }}" class="card-img-top" alt="img">
                 <div class="card-body">
                     <h5 class="card-title fw-semibold">{{ $book->title }}</h5>
                     <span class="custom-badge">#{{ $book->category->name }}</span>
                 </div>
             </div>
         </div>
         @endforeach
 
 </div>

</section>

<!-- Semua Buku -->
<section id="all-books" class="py-5 bg-red">

    <div class="d-flex justify-content-between align-items-center w-100 mb-4 px-5" style="margin-top: -180px;  padding-top: 20px; padding-bottom: 20px;">
        <img src="{{ asset('images/all-books.svg') }}" alt="Icon" style="height: 200px; width: 200px;" class="tremor">
    </div>
    <div class="contain" style="margin-top: -50px;">
        <div class="row">
           @foreach ( $allBook as $book )
               
            <div class="col-md-3 mb-4">
                <div class="card h-100">
                    <img src="{{ asset($book->cover) }}" class="card-img-top" alt="img">
                    <div class="card-body">
                        <h6 class="card-title fw-semibold">{{  $book->title }}</h6>
                        <span class="custom-badge">#{{ $book->category->name }}</span>
                        <a href="{{ route('student.book.show', $book->id) }}" class="read-now-btn">Read Now</a>
                    </div>
                </div>
            </div>
            
            @endforeach
        </div>
    </div>
</section>


@endsection