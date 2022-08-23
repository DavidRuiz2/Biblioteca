<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Biblioteca Municipal</title>
        <link rel="stylesheet" type="text/css" href="./css/estilos.css">
    </head>

    <body>
        <div class="contenedor">
            <div class="encabezado">
                <img src="./img/banner.jpg" alt="Imagen biblioteca municipal">
            </div>
            <nav class="opciones">
            <ul class="nav";>
                    <li ><a href="C:\xampp\htdocs\biblioteca1.0-20220818T124614Z-001\biblioteca1.0\indx.php">Inicio</a></li>
                    <li><a href="C:\xampp\htdocs\biblioteca1.0-20220818T124614Z-001\biblioteca1.0\indx.php">Areas</a> 
                        <ul>
                            <li><a href="./area.php?accion=ingresar">Ingresar nueva</a></li>
                            <li><a href="./area.php?accion=consultar">Consultar</a></li>
                            <li><a href="./area.php?accion=modificar">Modificar</a></li>
                            <li><a href="./area.php?accion=eliminar">Eliminar</a></li>
                        </ul>
                    </li>

                    <li><a href="">Libros</a> 
                        <ul>
                            <li><a href="./libro.php?accion=ingresar">Ingresar nuevo</a></li>
                            <li><a href="./libro.php?accion=consultar">Consultar</a></li>
                            <li><a href="./libro.php?accion=modificar">Modificar</a></li>
                            <li><a href="./libro.php?accion=eliminar">Eliminar</a></li>
                        </ul>
                    </li>

                    <li><a href="">Prestamos</a> 
                        <ul>
                            <li><a href="./prestamo.php?accion=prestamo">Realizar prestamo</a></li>
                            <li><a href="./prestamo.php?accion=devolucion">Realizar devolucion</a></li>
                        </ul>
                    </li>

                    <li><a href="">Sanciones</a> 
                        <ul>
                            <li><a href="">Ingresar nueva</a></li>
                            <li><a href="">Consultar</a></li>
                            <li><a href="">Modificar</a></li>
                            <li><a href="">Eliminar</a></li>
                        </ul>
                    </li>

                    <li><a href="">Usuarios</a> 
                        <ul>
                            <li><a href="./usuario.php?accion=ingresar">Ingresar nuevo</a></li>
                            <li><a href="./usuario.php?accion=consultar">Consultar</a></li>
                            <li><a href="./usuario.php?accion=modificar">Modificar</a></li>
                            <li><a href="./usuario.php?accion=eliminar">Eliminar</a></li>
                        </ul>
                    </li>

                </ul>
            </nav>
            <main>
                <h3 class="subtituloh3">Sistema de Gestión de Prestamos de libros de la Biblioteca municipal</h3>
                <div class="contenido">
                    <article>
                        <h1>Misión: </h1>
                        <br>
                        <p>La Biblioteca Pública Municipal, está comprometida  con la implementación de
                            programas tendientes a lograr que la comunidad en general, adquiera el hábito de la lectura y
                            que cada usuario lea como mínimo seis (6) libros por año.</p>
                    </article>
                    <article>
                        <h1>Objetivos: </h1>
                        <br>
                        <p>Promocionar el hábito de la lectura.
                            Apoyar la consulta de información local a los usuarios.
                            Manejar la biblioteca, planear, organizar, dirigir y controlar todas
                            las actividades técnicas de la Biblioteca Municipal.
                            Organizar programas de lectura, tertulias literarias y actividades culturales dentro y fuera de
                            la biblioteca.</p>
                    </article>
                    <article>
                        <h1>Metas: </h1>
                        <br>
                        <p>Lograr el incremento y sostenimiento de los índices estadísticos, en lo relacionado
                            con la consulta y la lectura en la Biblioteca Pública Municipal. </p>
                    </article>
                </div>
            </main>
        </div>
    </body>

</html>