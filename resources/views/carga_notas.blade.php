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

    <title>Carga Notas Docente</title>
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
                <h6>CARGA NOTAS POR ALUMNO</h6> 
            </div>
        </div> 
    </section> 

    <!--formulario-->
    <section class="formulario section-general">
        <div class="container">
            <div class="row">
                <div class="col-md-4 mx-auto mx-2 mx-md-0 text-center custom-border customer-content content">
                    <div class="titulo-con-fondo border text-center alineacion-texto">
                        <h6>MATERIAS del DOCENTE</h6>                       
                    </div>
                    <!--menu de cursos -->
                    @foreach ($cursos as $indice => $curso)
                        @if (isset($materias[$indice]))
                            <?php $materia = $materias[$indice]; ?>
                            <a class= "btn btn-primary margin-boton text-center" href="{{ route('alumnos-show', ['id_curso' => $curso->id, 'id_materia' => $materia->id ]) }}">
                                {{ $curso->año }} {{ $curso->comision }} {{ $curso->carrera }} {{$materia->nombre}}
                            </a>
                        @endif
                    @endforeach
                    
                </div>
                <div class="col-md-8 mx-auto mx-2 mx-md-0 text-center custom-border customer-content">
                    <div class="titulo-con-fondo border">
                        <h4>{{session('nombreMateria')}}</h4>
                        <h6 class="text-left">Listado de alumnos</h6>
                    </div>                
                     <table class="table table-bordered table-striped ">
                        <thead>
                          <tr>
                                <th class="espaciado">Legajo</th>
                                <th class="espaciado">Nombre</th>
                                <th class="espaciado">Apellido</th>
                                <th class="espaciado">DNI</th>
                                <th class="espaciado">Nota</th>
                                <th class="espaciado">Comentario</th>
                            </tr>
                            @if (isset($alumnos))
                                @foreach ($alumnos as $indice => $alumno)
                                    <tr>
                                        <th class="espaciado" scope="row">{{$alumno->legajo}}</th>
                                        <td class="espaciado">{{$alumno->nombre}}</td>
                                        <td class="espaciado">{{$alumno->apellido}}</td>
                                        <td class="espaciado">{{$alumno->dni}}</td>
                                        @if (isset($notas[$indice]))
                                            <?php $nota = $notas[$indice]; ?>
                                            <td class="espaciado">{{$nota->nota}}</td>
                                            <td class="espaciado">{{$nota->comentario}}</td>
                                        @else
                                            @if (isset($alumnos))
                                                <div>
                                                    @csrf  <!-- Genera un token que protege que un atacante realice acciones no autorizadas en nombre de un usuario autenticado.-->
                                                    <td>
                                                        <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">+</button>

                                                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content section-general border"><i class="bi bi-save-fill icono-persona"></i>
                                                            <div class="modal-header ">
                                                                <h1 class="modal-title fs-5" id="exampleModalLabel">MATERIA: {{session('nombreMateria')}}</h1>
                                                                
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>

                                                            <form action = "{{ route('alumnos-store', ['id_alumno' => $alumno->id]) }}" method = "POST">
                                                                @csrf  <!-- Genera un token que protege que un atacante realice acciones no autorizadas en nombre de un usuario autenticado.-->
                                                                <div class="modal-body">
                                                                    <div class="mb-3">
                                                                        <label for="nota" class="col-form-label titulo-con-fondo border text-center alineacion-texto">NOTA:</label>
                                                                        <input type="number" min="1" max="10" class="form-control" name="nota">
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label for="comentario" class="col-form-label titulo-con-fondo border text-center alineacion-texto">COMENTARIO:</label>
                                                                        <textarea class="form-control" name="comentario"></textarea>
                                                                    </div>
                                                                </div>
                                                                    <button type="submit" class="btn btn-primary alineacion-texto">GUARDAR</button>
                                                                                                                    
                                                                </div> 
                                                            </form>

                                                            </div>
                                                        </div>
                                                        </div>
                                                        </th>
                                                        <th class="espaciado"></th>
                                                    </td>
                                                    
                                                </div>
                                            @endif
                                            
                                        @endif
                                    </tr>
                                @endforeach
                            @endif
                            <tr>
                        </thead>
                   </table>
                </div>
            </div>
        </div>
    </section>     
    

    <!--consulta-->
    <section class="footer section-general">
            <div class="row border color-row text-center">
                <div class="col justify-content-end"> 
                    <a href="{{ route('menu') }}" class="btn btn-primary" type="button">Volver <i class="bi bi-skip-backward-circle-fill icono-general"></i></a>
                </div>                    
        </div>
    </section>
    <!--Insertado de JavaScript de Bootstrap-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>