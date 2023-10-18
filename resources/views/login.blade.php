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

    <title>Carga de Notas</title>
</head>
<body>
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
                <h6>BIENVENIDO A CARGA DE NOTAS</h6> 
            </div>
        </div> 
    </section> 

    <!--formulario-->
    <form method = "POST" action = "{{ route('login') }}"  class="formulario section-general">
    @csrf
    <div class="content"> 
        <div class="row">
            <div class="col-4"> 
        </div>

        <div class="col custom-border"> 
            <div class="col-4 mx-auto text-center">
                <i class="bi bi-person-circle icono-persona"></i>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="floatingInput" name="dni">                
                <label for="floatingInput etiqueta-bold"><i class="bi bi-person-fill icono-general"></i>DNI</label>
            </div>
            <div class="form-floating">
                <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password">
                <label for="floatingPassword etiqueta-bold"><i class="bi bi-lock-fill icono-general"></i>Clave</label>
            </div>
            @if(session('error'))
                <div class="h6 text-danger">
                    {{ session('error') }}
                </div>
            @endif
            <div class="form-check form-check-inline text-center etiqueta-blanca"> <!-- Utiliza form-check-inline para mostrar los checkboxes en línea -->
                <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                <label class="form-check-label" for="flexRadioDefault1">
                    Recordar
                </label>
            </div>
            <div class="form-check form-check-inline text-center etiqueta-blanca" > <!-- Utiliza form-check-inline para mostrar los checkboxes en línea -->
                <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2">
                <label class="form-check-label" for="flexRadioDefault2">
                    Olvido Clave
                </label>
            </div>
            <div class="d-grid gap-2">
               <button class="btn btn-primary" type="submit">Login</button>
            </div>

         </div>      
         <div class="col-4"> 
        </div>
        </div>  
    </form>

    <!--consulta-->
    <section class="footer section-footer">
            <div class="row border color-row text-center">
                <div class="col justify-content-end"> 
                    <i class="bi bi-wrench-adjustable borde-icono"></i> <!--icono de Bootstrap-->
                </div>                    
        </div>
    </section>
    <!--Insertado de JavaScript de Bootstrap-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>