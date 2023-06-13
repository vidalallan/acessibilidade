<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Crowdsourcing - Validando Barreiras de Acessibilidade para aplicativos móveis </title>
        <link rel="icon" type="image/x-icon" href="begin/assets/favicon.ico" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Catamaran:100,200,300,400,500,600,700,800,900" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="{{asset('assets/begin/css/styles.css')}}" rel="stylesheet" />
    </head>
    <body id="page-top">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-dark navbar-custom fixed-top">
            <div class="container px-5">
                <a class="navbar-brand" href="#page-top"> Problemas de Acessibilidade </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item"><a class="nav-link" href="/inscrever-usuario">Inscreva-se</a></li>
                        <li class="nav-item"><a class="nav-link" href="/login"> Entrar </a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Header-->
        <header class="masthead text-center text-white"
            style="background:url({{asset('assets/begin/assets/img/backgroundmain.webp')}});
                   background-repeat: no-repeat;
                   background-attachment: fixed;
                   background-size: cover;
                   background-position: center;"                   
        >
            <div class="masthead-content">
                <div class="container px-5">                    
                    <h2 class="masthead-subheading mb-0"> Uma ferramenta de crowdsourcing para validação das barreiras de acessibilidade móvel </h2>
                    <a class="btn btn-primary btn-xl rounded-pill mt-5" href="#scroll">Saiba mais</a>
                </div>
            </div>
            <!--
            <div class="bg-circle-1 bg-circle"></div>
            <div class="bg-circle-2 bg-circle"></div>
            <div class="bg-circle-3 bg-circle"></div>
            <div class="bg-circle-4 bg-circle"></div>
            -->
        </header>
        <!-- Content section 1-->
        <section id="scroll">
            <div class="container px-5">
                <div class="row gx-5 align-items-center">
                    <div class="col-lg-6 order-lg-2">
                        <div class="p-5"><img class="img-fluid rounded-circle" src="{{asset('assets/begin/assets/img/01.jpg')}}" alt="..." /></div>
                    </div>
                    <div class="col-lg-6 order-lg-1">
                        <div class="p-5">
                            <h2 class="display-4"> Motivação </h2>
                            <p style="font-size:20px">
                                Existem diversas ferramentas de avaliação de acessibilidade. Entretanto, os problemas identificados pelas ferramentas exibem em seus resultados falsos positivos e/ou falsos negativos e muitos usuários possuem conhecimento superficial sobre o tema.
                            </p>                                
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Content section 2-->
        <section>
            <div class="container px-5">
                <div class="row gx-5 align-items-center">
                    <div class="col-lg-6">
                        <div class="p-5"><img class="img-fluid rounded-circle" src="{{asset('assets/begin/assets/img/02.jpg')}}" alt="..." /></div>
                    </div>
                    <div class="col-lg-6">
                        <div class="p-5">
                            <h2 class="display-4"> Objetivo </h2>
                            <p style="font-size:20px">Propor um ambiente colaborativo para a validação das barreiras de acessibilidade encontradas por ferramentas ou avaliadores de acessibilidade móvel.</p>
                            
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Content section 3-->
        <section>
            <div class="container px-5">
                <div class="row gx-5 align-items-center">
                    <div class="col-lg-6 order-lg-2">
                        <div class="p-5"><img class="img-fluid rounded-circle" src="{{asset('assets/begin/assets/img/03.jpg')}}" alt="..." /></div>
                    </div>
                    <div class="col-lg-6 order-lg-1">
                        <div class="p-5">
                            <h2 class="display-4"> Dados para análise </h2>
                            <ul>
                                <li> <p style="font-size:20px"> Problemas encontrados pelas ferramentas nos aplicativos móveis; </p> </li>
                                <li> <p style="font-size:20px"> Estatísticas referentes aos problemas validados sobre os principais falsos positivos das ferramentas; </p> </li>
                                <li> <p style="font-size:20px"> Principais problemas não detectados pelas ferramentas e eventualmente detectados por pessoas. </p> </li>                            
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Footer-->
        <footer class="py-5 bg-black">
            <div class="container px-5"><p class="m-0 text-center text-white small">&copy; Problemas de Acessibilidade - 2023</p></div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>
