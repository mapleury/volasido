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
 align-items: center;
 padding: 1rem 5rem;
 font-family: 'Playfair Display', serif;
 font-weight: 600;
 font-style: italic;
 border-bottom: 2px solid #EDE4D5;
">

  <div class="nav-left">
      <a href="{{ route('student.dashboard') }}">
          <img src="{{ asset('images/logo.svg') }}" alt="Volasido Logo" style="height: 50px;">
      </a>
  </div>

  <div class="nav-right" style="display: flex; gap: 2rem; align-items: center;">
      <a href="{{ route('student.dashboard') }}"  id="nav-home" style="color: #EDE4D5; text-decoration: none;">Home</a>
      <a href="{{ route('student.all.books') }}"id="nav-books" style="color: #EDE4D5; text-decoration: none;">Books</a>
      <a href="{{ route('student.borrow.all') }}"id="nav-shelf" style="color: #EDE4D5; text-decoration: none;">Your Shelf</a>
      
      <div style="width: 2px; height: 24px; background-color: #EDE4D5;"></div>
      
      <a href="{{ route('logout') }}"
         style="color: #EDE4D5; text-decoration: none;"
         id="nav-logout"
         onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
          {{ __('Logout') }}
      </a>

      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
          @csrf
      </form>
  </div>
</nav>
   
@yield('content')

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

    document.getElementById("see-all").textContent = trans["see-all"];
    document.getElementById("nav-home").textContent = trans["nav-home"];
    document.getElementById("nav-books").textContent = trans["nav-books"];
    document.getElementById("nav-shelf").textContent = trans["nav-shelf"];
    document.getElementById("nav-logout").textContent = trans["nav-logout"];
    document.getElementById("sorrow-text").innerHTML = trans["sorrow-text"];
    document.getElementById("volasido-text").innerHTML = trans["volasido-desc"];
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


