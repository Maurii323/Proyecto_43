<!DOCTYPE html>
<html>
<head>
    <!--Metadatos-->
    <meta charset="utf-8">
    <meta name="author" content="Corbalan, Arroyo, Flores">
    <meta name="description" content="Carga de notas por alumno">
    <meta name="keywords" content="html, CSS, JavaScript, React">
    <meta name="viewport" content="width-device-width, initial-style=1" >
    <!--Bootstrap de CSS-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!--Bootstrap de Iconos-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <!--CSS-->
    <link href="{{ asset('style.css') }}" rel="stylesheet">
     <!--Favicon-->
    <link rel="icon" type="image/x-icon" href="{{ asset('imagenes/logo.jpeg') }}">
    <!--Google Fonts-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">

    <title>Menu de Docente</title>
</head>
<body>
    @if (empty(session('id_profesor')))
        <?php redirect()->route('mostrar-login');?>
            
    @endif
    <!--cabecera-->
    <section class="cabecera section-general fondo-oscuro">
        <div class="container-fluid"> <!--Contenedor responsivo-->
            <div class="row text-center">
                <div class="col-12 col-sm-8 "> <!--de las 12 columnas por defecto tomo 8-->
                    Desarrollado por Nivel Terciario de la Escuela Superior de Comercio Nº 49 "J. J. de Urquiza"
                </div>
                <div class="col-12 col-sm-4"> 
                    <img src="{{ asset('imagenes/logo.jpeg') }}" width="50" alt="Logo de la escuela">
                </div>
            </div> 
    </section>

    <section class="logeado section-general">
        <div class="row border color-row "> <!--se puede poner la cantidad de nombres de clases qeu necesite utilizar de css-->
            <div class="col text-center alineacion-texto"> 
                <h6>MENU DOCENTE</h6> 
            </div>
        </div> 
    </section> 

    <!--LISTADO DE BOTONES-->
    <section class="formulario section-general">
        <div class="content-menu"> 
            <div class="row">
                <div class="col-8 mx-auto text-center custom-border customer-content">
                <a class="btn btn-primary" href="{{ route('cursos-show') }}" style="width: 300px">CARGA DE NOTAS</a><br>
                <button class="btn btn-primary" type="button" style="width: 300px">NOTIFICACIONES</button><br>
                <button class="btn btn-primary" type="button" style="width: 300px">CUENTA</button><br>
                <button class="btn btn-primary" type="button" style="width: 300px">CONFIGURACION</button><br>
                </div>
            </div>                            
        </div>   
    </section>

    <!--consulta-->
    <section class="footer section-general">
            <div class="row border color-row text-center">
                <div class="col justify-content-end"> 
                    <a href= "{{ route('logout') }}" class="btn btn-primary" type="button">Cerrar Sesion <i class="bi bi-skip-backward-circle-fill icono-general"></i></a>
                </div>                    
        </div>
    </section>
    <!--Insertado de JavaScript de Bootstrap-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>