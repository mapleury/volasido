<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Volasido | Eng-Ru Bookstore</title>
      <!-- Playfair Display font -->
      <link href="https://fonts.googleapis.com/css2?family=Playfair+Display&display=swap" rel="stylesheet">
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <!--MY CSS-->
    <link href="{{ asset ('mycss/student.css') }}" rel="stylesheet">
</head>


<body>

   <!-- Navbar -->
   <nav style="
   position: sticky;
   top: 0;
   z-index: 9999;
   background-color: #6A100C;
   color: #EDE4D5;
   display: flex;
   justify-content: space-between;
   align-items: center;xs
   padding: 1rem 5rem;
   font-family: 'Playfair Display', serif;
   font-weight: 600;
   font-style: italic;
   border-bottom: 2px solid #EDE4D5;
">


    <div class="nav-left">
        <img src="{{ asset('images/logo.svg') }}" alt="Volasido Logo" class="volasido-logo" style="height: 50px;">
    </div>

    <div class="nav-right" style="display: flex; gap: 2rem; align-items: center;">
        <a href="#" id="nav-home" style="color: #EDE4D5; text-decoration: none;">Home</a>
        <a href="#books" id="nav-books" style="color: #EDE4D5; text-decoration: none;">Books</a>        
 
        <div style="width: 2px; height: 24px; background-color: #EDE4D5;"></div>
        
        <a href="{{ route('login') }}" id="login">
            Login
        </a>
        <a href="{{ route('register') }}" id="register">
            Register
        </a>
        

    </div>
</nav>




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
            <a href="{{ route('login') }}" style="color: #EDE4D5;"> Discover more </a></h1>
    </div>
    

    <div class="contain" style="margin-top: -100px;">
        <div class="row">
            @foreach ($books->sortBy('stock')->take(4) as $book)
            <div class="col-md-3 mb-4 book-card">
                <div class="card h-100">
                    <img src="{{ asset($book->cover) }}" class="card-img-top" alt="img">
                    <div class="card-body">
                        <h5 class="card-title">{{ $book->title }}</h5>
                        <span class="custom-badge">#{{ $book->category->name }}</span>
                    </div>
                </div>
            </div>
            @endforeach
    
    </div>
</section>

<footer class="footer-volasido">
    <div class="footer-content">    
        <div class="social-icons">
        <a href="#" target="_blank" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
        <a href="#" target="_blank" aria-label="Email"><i class="fas fa-envelope"></i></a>
        <a href="#" target="_blank" aria-label="X"><i class="fab fa-x-twitter"></i></a>
    </div>
        <p class="footer-title">Volasido (Eng–Ru) Bookstore — since 1984</p>
        <p class="copyright">
            © 1984–{{ date('Y') }} Volasido. All rights reserved.
        </p>
    </div>
</footer>

</body>
</html>
<script>
    let currentLang = 'en';

const translations = {
    ru: {
        "see-all": "Смотре",
        "login": "Войти",
        "register": "Зарегистр",
        "sorrow-text": "У нас есть всякие <br>  русские печали,",
        "volasido-desc": `Итак, Volasido — это путешествие сквозь истории, переводы и культуры.Где русская литература через языковые барьеры на английский, как октава.`,
        "nav-home": "Главная",
        "nav-books": "Книги",
        "nav-shelf": "Твоя полка",
        "nav-logout": "Выйти"
    },
    en: {
        "see-all": "See all",
        "login": "Login",
        "register": "Register",
        "sorrow-text": "We have all sorts <br>  of russian sorrows,",
        "volasido-desc": `Thus, Volasido represents a journey through stories, translations, and cultures. Where Russian literature "flies" across language <br>barriers into English, just like an octave.`,
        "nav-home": "Home",
        "nav-books": "Books",
        "nav-shelf": "Your Shelf",
        "nav-logout": "Logout"
    }
};

function switchLanguage() {
    currentLang = currentLang === 'en' ? 'ru' : 'en';

    const trans = translations[currentLang];

    document.getElementById('see-all').innerHTML = trans['see-all'];
    document.getElementById('login').innerText = trans['login'];
    document.getElementById('register').innerText = trans['register'];
    document.getElementById('sorrow-text').innerHTML = trans['sorrow-text'];
    document.getElementById('volasido-text').innerHTML = trans['volasido-desc'];
    document.getElementById('nav-home').innerText = trans['nav-home'];
    document.getElementById('nav-books').innerText = trans['nav-books'];
    document.getElementById('nav-shelf').innerText = trans['nav-shelf'];
    document.getElementById('nav-logout').innerText = trans['nav-logout'];
}

</script>

<script>
    const logo = document.querySelector('.volasido-logo');

    logo.addEventListener('mouseenter', function() {
        logo.src = "{{ asset('images/logo-2.svg') }}";
    });

    logo.addEventListener('mouseleave', function() {
        logo.src = "{{ asset('images/logo.svg') }}";
    });
</script>

<script>
    const langImg = document.getElementById('language-img');

    langImg.addEventListener('mouseenter', function() {
        langImg.src = "{{ asset('images/language2.svg') }}";
    });

    langImg.addEventListener('mouseleave', function() {
        langImg.src = "{{ asset('images/language.svg') }}";
    });
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

