<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sitemas de Seguro</title>
    <link rel="shortcut icon" href="{{asset('assets/welcome/images/favicon.png')}}" type="image/x-icon">
    <link rel="stylesheet" href="{{asset('assets/welcome/css/normalize.css')}}">
    <link rel="stylesheet" href="{{asset('assets/welcome/css/estilos.css')}}">
    
    <!-- Custom fonts for this template-->
    <link href="{{asset('assets/admin/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{asset('assets/admin/css/sb-admin-2.min.css')}}" rel="stylesheet">

    <meta name="theme-color" content="#2091F9">

    <meta name="title" content="Aprende CSS desde cero">
    <meta name="description"
        content="Hola, soy una descripción que verás cuando busques algo de mi temática en Google.">

    <meta property="og:type" content="website">
    <meta property="og:url" content="https://alexcgdesign.github.io">
    <meta property="og:title" content="Aprende CSS desde cero">
    <meta property="og:description"
        content="Hola, soy una descripción que verás cuando busques algo de mi temática en Google.">
    <meta property="og:image" content="https://alexcgdesign.github.io/images/css.jpg">

    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="https://www.jordanalex.com/">
    <meta property="twitter:title" content="Aprende CSS desde cero">
    <meta property="twitter:description"
        content="Hola, soy una descripción que verás cuando busques algo de mi temática en Google.">
    <meta property="twitter:image" content="https://alexcgdesign.github.io/images/css.jpg">
</head>

<body>

    <header class="hero">
        <nav class="nav container">
            <div class="nav__logo">
                <h2 class="nav__title">Aseguradora Fortaleza </h2>
            </div>

            <ul class="nav__link nav__link--menu">
                @if (Route::has('login'))
                @auth
                <li class="nav__items">
                    <a class="nav__links" href="{{ url('/admin') }}" >Home</a>
                </li>
                @else
                <li class="nav__items">
                    <a class="nav__links" data-toggle="modal" data-target="#loginModal">Login</a>
                </li>
                <li class="nav__items">
                    <a class="nav__links" data-toggle="modal" data-target="#registerModal">Register</a>
                </li>
                @endauth
                @endif
                <li class="nav__items">
                    <a class="nav__links" data-toggle="modal" data-target="#cotizacionModal">Cotizacion</a>
                </li>
                <li class="nav__items">
                    <a href="#" class="nav__links">Blog</a>
                </li>

                <img src="assets/welcome/images/close.svg" class="nav__close">
            </ul>

            <div class="nav__menu">
                <img src="assets/welcome/images/menu.svg" class="nav__img">
            </div>
        </nav>

        <section class="hero__container container">
            <h4 class="hero__title">BIENVENIDO/A A
                ASEGURADORA FORTALEZA</h4>
            <p class="hero__paragraph">Una compañía de seguros comprometida a estar con vos en cada etapa. En este espacio podés encontrar la información que estás buscando sobre seguros personales y empresariales.</p>
   
        </section>
    </header>

    <main>     
        <section class="knowledge">
            <div class="knowledge__container container">
                <div class="knowledege__texts">
                    <h2 class="subtitle">Nosotros :</h2>
                    <p class="knowledge__paragraph">Aseguradora Fortaleza nace el 14 de agosto de 1975 como “Cruceña Cooperativa de Seguros”, a raíz de la iniciativa de la Cooperativa de Ahorro y Crédito “La Merced”, de brindar regionalmente un servicio financiero adicional a sus socios.</p>
                    <a href="#" class="cta">Mas informacion</a>
                </div>

                <figure class="knowledge__picture">
                    <img src="assets/welcome/images/oficina.jpg" class="knowledge__img">
                </figure>
            </div>
        </section>
        <section class="testimony">
            <div class="testimony__container container">
               
            
                <img src="assets/welcome/images/leftarrow.svg" class="testimony__arrow" id="before">
          
                <section class="testimony__body testimony__body--show" data-id="1">
                    
                    <div class="testimony__texts">
                        <h2 class="subtitle">Mi nombre es Jordan Alexander, <span class="testimony__course">Equipo Fortaleza .</span></h2>
                        <p class="testimony__review">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ut est
                            esse, asperiores eaque totam nulla repudiandae quasi, deserunt culpa exercitationem
                            blanditiis laborum veniam laboriosam saepe reiciendis dolorem. Cum, ratione voluptatum!</p>
                    </div>

                    <figure class="testimony__picture">
                        <img src="assets/welcome/images/face.jpg" class="testimony__img">
                    </figure>
                </section>

                <section class="testimony__body" data-id="2">
                    <div class="testimony__texts">
                        <h2 class="subtitle">Mi nombre es Alejandra Perez, <span class="testimony__course">Equipo Fortaleza .</span></h2>
                        <p class="testimony__review">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ut est
                            esse, asperiores eaque laborum veniam laboriosam saepe reiciendis dolorem. Cum, ratione
                            voluptatum!</p>
                    </div>

                    <figure class="testimony__picture">
                        <img src="assets/welcome/images/face2.jpg" class="testimony__img">
                    </figure>
                </section>

                <section class="testimony__body" data-id="3">
                    <div class="testimony__texts">
                        <h2 class="subtitle">Mi nombre es Karen Arteaga, <span class="testimony__course">Equipo Fortaleza .</span></h2>
                        <p class="testimony__review">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ut est
                            esse, niam laboriosam saepe reiciendis dolorem. Cum, ratione voluptatum!</p>
                    </div>

                    <figure class="testimony__picture">
                        <img src="assets/welcome/images/face3.jpg" class="testimony__img">
                    </figure>
                </section>

                <section class="testimony__body" data-id="4">
                    <div class="testimony__texts">
                        <h2 class="subtitle">Mi nombre es Kevin Ramirez, <span class="testimony__course">Equipo Fortaleza ..</span></h2>
                        <p class="testimony__review">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ut est
                            esse, niam laboriosam saepe reiciendis dolorem. Cum, ratione voluptatum!</p>
                    </div>

                    <figure class="testimony__picture">
                        <img src="assets/welcome/images/face4.jpg" class="testimony__img">
                    </figure>
                </section>


                <img src="assets/welcome/images/rightarrow.svg" class="testimony__arrow" id="next">
            </div>
        </section>
    </main>

   
    @include('welcome.footer')
    @include('welcome.modal')

    <script src="assets/welcome/js/slider.js"></script>
    <script src="assets/welcome/js/questions.js"></script>
    <script src="assets/welcome/js/menu.js"></script>

        <!-- Bootstrap core JavaScript-->
        <script src="{{asset('assets/admin/vendor/jquery/jquery.min.js')}}"></script>
        <script src="{{asset('assets/admin/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

        <!-- Core plugin JavaScript-->
        <script src="{{asset('assets//admin/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

        <!-- Custom scripts for all pages-->
        <script src="{{asset('assets/admin/js/sb-admin-2.min.js')}}"></script>

        <!-- Page level plugins -->
        <script src="{{asset('assets/admin/vendor/chart.js/Chart.min.js')}}"></script>

        <!-- Page level custom scripts -->
        <script src="{{asset('assets/admin/js/demo/chart-area-demo.j')}}s"></script>
        <script src="{{asset('assets/admin/js/demo/chart-pie-demo.js')}}"></script>

</body>

</html>