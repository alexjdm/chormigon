<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Cálculo Hormigón</title>
    <base href="http://localhost/chormigon/" />
    <link rel="stylesheet" href="dist/home/css/font-awesome.min.css">
    <link rel="stylesheet" href="dist/home/css/bootstrap.min.css">
    <link rel="stylesheet" href="dist/home/css/style.css">
    <link rel="stylesheet" href="dist/home/css/login.css">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:600italic,400,800,700,300' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=BenchNine:300,400,700' rel='stylesheet' type='text/css'>
</head>

<body>

<header class="top-header">
    <div class="container">
        <div class="row">
            <div class="col-xs-5 header-logo">
                <br>
                <a href="#"><img src="dist/home/img/logo.png" alt="" class="img-responsive logo"></a>
            </div>

            <div class="col-md-7">
                <nav class="navbar navbar-default">
                    <div class="container-fluid nav-bar">

                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>

                        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

                            <ul class="nav navbar-nav navbar-right">
                                <li><a class="menu active" href="#home" >Home</a></li>
                                <li><a class="menu" href="#project">Proyecto</a></li>
                                <li><a class="menu" href="#tecnology">Tecnología</a></li>
                                <li><a class="menu" href="#contact">Contacto</a></li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</header>

<section class="slider" id="home">
    <div class="container-fluid">
        <div class="row">

            <div id="carouselHacked" class="carousel slide carousel-fade" data-ride="carousel">
                <div class="header-backup"></div>

                <div class="carousel-inner" role="listbox">

                    <div class="item active">
                        <img src="dist/home/img/slide-two.jpg" alt="">
                        <div class="carousel-caption">
                            <p>Diseño asistido de elementos en Hormigón Armado</p>
                            <p>Estructurales de Hormigón Armado:</p>
                            <h2>VIGAS RECTANGULARES, VIGAS TEE Y PILARES RECTANGULARES DE ACUERDO AL ACI 318 – 2005</h2>
                        </div>
                    </div>
                </div>

                <a class="left carousel-control" href="#carouselHacked" role="button" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="right carousel-control" href="#carouselHacked" role="button" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>

        </div>
    </div>
</section>

<section class="about text-center" id="project">
    <div class="container">
        <div class="row">
            <h2>Proyecto</h2>
            <h4>El sitio permite guardar un archivo de memoria en formato pdf, con el detalle de los elementos diseñados en hormigón armado.</h4>

            <div class="col-md-4 col-sm-12">
                <div class="single-about-detail clearfix">

                    <div class="about-details">
                        <div class="pentagon-text">
                            <h1><i class="fa fa-file"></i></h1>
                        </div>

                        <h3>Datos generales del proyecto</h3>
                        <p>Indique el nombre y descripción.</p>
                        <p><input type="text" name="username" id="username" tabindex="1" class="form-control" placeholder="Nombre" value=""><br>
                            <input type="text" name="username" id="username" tabindex="1" class="form-control" placeholder="Descripción" value=""></p>
                    </div>
                </div>
            </div>

            <div class="col-md-4 col-sm-6">
                <div class="single-about-detail">

                    <div class="about-details">
                        <div class="pentagon-text">
                            <h1><i class="fa fa-bars"></i></h1>
                        </div>

                        <h3>Ingreso Sección</h3>
                        <p>Seleccione el tipo de estructura a utilizar:</p>
                        <br>
                        <button type="button" class="btn btn-default" onclick="window.location.href='index.php?controller=VigaRectangular&action=index'">VIGA RECTANGULAR</button>
                        <button type="button" class="btn btn-default" onclick="window.location.href='index.php?controller=VigaT&action=index'">VIGA T</button>
                        <button type="button" class="btn btn-default" onclick="window.location.href='index.php?controller=PilarRectangular&action=index'">PILAR RECTANGULAR</button>
                        <br><br><br>
                    </div>
                </div>
            </div>


            <div class="col-md-4 col-sm-6">
                <div class="single-about-detail">

                    <div class="about-details">
                        <div class="pentagon-text">
                            <h1><i class="fa fa-file-excel-o"></i></h1>
                        </div>

                        <h3>Carga de documento</h3>
                        <p>Ingresar datos desde un archivo Excel.</p>
                        <br>
                        <div style="text-align: center;"><input type="file" class="btn btn-default btn-xs" id="inputfile"></div>
                        <br><br>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<section class="team" id="tecnology">
    <div class="container">
        <div class="row">
            <div class="team-heading text-center">
                <h2>Tecnología</h2>
                <h4>Esta página web está diseñada principalmente en lenguaje php, el cual permite realizar los cálculos matemáticos, ciclos iterativos, discriminación de variables, etc., en conjunto con los lenguajes html, javascript y ajax dan la posibilidad de armar un sitio dinámico y capaz de satisfacer las exigencias necesarias en un programa de estas características.</h4>
            </div>

            <div class="col-md-2 single-member col-sm-4">
                <div class="person">
                    <img class="img-responsive" src="dist/home/img/item1.jpg" alt="member-1">
                </div>

                <div class="person-detail">
                    <div class="arrow-bottom"></div>
                    <h3>PHP</h3>
                    <p>PHP: Hypertext Preprocessor es un lenguaje de código abierto interpretado, de alto nivel, embebido en páginas HTML y ejecutado en el servidor.</p>
                </div>

            </div>

            <div class="col-md-2 single-member col-sm-4">

                <div class="person-detail">
                    <div class="arrow-top"></div>
                    <h3>HTML</h3>
                    <p>HTML: HyperText Markup Language. Este es el lenguaje utilzado con el fin de crear documentos para lo que se conoce como World Wide Web.</p>
                </div>
                <div class="person">
                    <img class="img-responsive" src="dist/home/img/item2.jpg" alt="member-2">
                </div>
            </div>
            <div class="col-md-2 single-member col-sm-4">
                <div class="person">
                    <img class="img-responsive" src="dist/home/img/item3.jpg" alt="member-3">
                </div>
                <div class="person-detail">
                    <div class="arrow-bottom"></div>
                    <h3>Javascript</h3>
                    <p>JavaScript es un lenguaje de programación que se utiliza principalmente para crear páginas web dinámicas. Una página web dinámica es aquella que incorpora...</p>
                </div>
            </div>

            <div class="col-md-2 single-member col-sm-4">
                <div class="person-detail">
                    <div class="arrow-top"></div>
                    <h3>Ajax</h3>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, </p>
                </div>
                <div class="person">
                    <img class="img-responsive" src="dist/home/img/item4.jpg" alt="member-4">
                </div>
            </div>

            <div class="col-md-2 single-member col-sm-4">
                <div class="person">
                    <img class="img-responsive" src="dist/home/img/item5.jpg" alt="member-5">
                </div>

                <div class="person-detail">
                    <div class="arrow-bottom"></div>
                    <h3>MySQL</h3>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, </p>
                </div>
            </div>

            <div class="col-md-2 single-member col-sm-4">

                <div class="person-detail">
                    <div class="arrow-top"></div>
                    <h3>Bootstrap</h3>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, </p>
                </div>
                <div class="person">
                    <img class="img-responsive" src="dist/home/img/item6.jpg" alt="member-5">
                </div>

            </div>
        </div>
    </div>
</section>

<section class="api-map" id="contact">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 map" id="map"></div>
        </div>
    </div>
</section>


<section class="contact">
    <div class="container">
        <div class="row">
            <div class="contact-caption clearfix">
                <div class="contact-heading text-center">
                    <h2>Contacto</h2>
                </div>

                <div class="col-md-5 contact-info text-left">
                    <h3>Información de contacto</h3>
                    <div class="info-detail">
                        <ul><li><i class="fa fa-phone"></i><span>Teléfono:</span> (064) 24 61 54</li></ul>
                        <ul><li><i class="fa glyphicon glyphicon-phone"></i><span>Celular:</span> (+569) 8770 9565</li></ul>
                        <ul><li><i class="fa fa-envelope"></i><span>Email:</span> rrodolfomansilla@gmail.com </li></ul>
                    </div>
                </div>


                <div class="col-md-6 col-md-offset-1 contact-form">
                    <h3>Deje su mensaje</h3>

                    <form class="form">
                        <input class="name" type="text" placeholder="Name">
                        <input class="name" type="text" placeholder="Empresa">
                        <input class="email" type="email" placeholder="Email">
                        <input class="phone" type="text" placeholder="Teléfono:">
                        <textarea class="message" name="message" id="message" cols="30" rows="10" placeholder="Mensaje"></textarea>
                        <input class="submit-btn" type="submit" value="Enviar">
                    </form>
                </div>

            </div>
        </div>
    </div>
</section>

<footer class="footer clearfix">
    <div class="container">
        <div class="row">
            <div class="col-xs-6 footer-para">
                <p>&copy;Ion Group All right reserved</p>
            </div>

        </div>
    </div>
</footer>

<script src="dist/home/js/jquery-2.1.1.js"></script>
<script src="http://maps.google.com/maps/api/js?sensor=true"></script>
<script src="dist/home/js/gmaps.js"></script>
<script src="dist/home/js/smoothscroll.js"></script>
<script src="dist/home/js/bootstrap.min.js"></script>
<script src="dist/home/js/custom.js"></script>
<script type="text/javascript" src="dist/home/js/bootstrap-filestyle.min.js"> </script>
<script type="text/javascript">
    $(function() {

        $('#login-form-link').click(function(e) {
            $("#login-form").delay(100).fadeIn(100);
            $("#register-form").fadeOut(100);
            $('#register-form-link').removeClass('active');
            $(this).addClass('active');
            e.preventDefault();
        });
        $('#register-form-link').click(function(e) {
            $("#register-form").delay(100).fadeIn(100);
            $("#login-form").fadeOut(100);
            $('#login-form-link').removeClass('active');
            $(this).addClass('active');
            e.preventDefault();
        });

    });

    $(":file").filestyle({buttonText: "Agregar archivo", input: false});

    $("#inputfile").change(function () {
        window.location = "http://www.google.cl/";
    });
</script>

</body>
</html>