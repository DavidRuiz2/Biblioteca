<?php 
    include('../shared/header.php');
    include('../util/conexion.php');
?>
    <body>
        <?php include('../shared/menu.php'); ?>
            <main>
                <?php if(isset($_REQUEST['accion'])) {
                    $accion = $_REQUEST['accion'];
                    if($accion == 'ingresar'){?>
                        <form action="../php/libro/ingreso.php" class="register" method="POST">
                 
                            <div class="ingresarlibro">
                                <h3>Ingresar Nuevo Libro</h3><br>
                                <label>Código Libro: &nbsp<input class="new" type="text" name="codigo" required><br></label>
                                <label>Nombre Libro: &nbsp<input class="new" type="text" name="nombre" required><br></label>
                                <label>Cantidad de Páginas: &nbsp<input class="new" type="number" name="cantidadPg" required><br></label>
                                <label>Nombre Autor: &nbsp<input class="new" type="text" name="autor" required><br></label>
                                <label>Nombre Editorial: &nbsp<input class="new" type="text" name="editorial" required><br></label>
                                <label>Seleccione Área: &nbsp
                                    <?php $registros = mysqli_query($con, "SELECT * FROM areas") ?>
                                    <select class="new" name="arNom">
                                        <?php while($reg = mysqli_fetch_array($registros)){
                                            echo "<option value='$reg[areCodigo]'>$reg[areNombre]</option>";
                                        } ?>
                                    </select>
                                </label><br>
                                <input class="boton" type="submit" value="Guardar">
                            </div>
                        </form>
                    <?php } else if($accion == 'consultar' || $accion == 'modificar' || $accion == 'eliminar'){ ?>
                        <form action="libro.php?accion=<?php echo $accion ?>" class="register" method="post">
                            <br>                            
                            <div class="consultarlibro">

                                <h3>Consultar Libro</h3>
                                <br>
                                <label>Seleccione Libro: &nbsp
                                    <?php $registros = mysqli_query($con, "SELECT * FROM libros") ?>
                                    <select class="new" name="libNom">
                                        <?php while($reg = mysqli_fetch_array($registros)){
                                            echo "<option value='$reg[libCodigo]'>$reg[libNombre]</option>";
                                        } ?>
                                    </select>
                                </label><br>
                                <input class="boton" type="submit" value="Consultar">
                            </div>
                        </form>
                        <?php if($accion == 'consultar'){ ?>
                            
                            <div class="tabla">
                                <table>
                                    <tr>
                                        <th>Codigo</th>
                                        <th>Nombre</th>
                                        <th>Cant. Páginas</th>
                                        <th>Autor</th>
                                        <th>Editorial</th>
                                        <th>Área</th>
                                    </tr>
                                    <?php if($accion == 'consultar' && isset($_REQUEST['libNom'])){
                                        $registros = mysqli_query($con, "SELECT * FROM libros WHERE libCodigo = $_REQUEST[libNom]");
                                        while($reg = mysqli_fetch_array($registros)){
                                            echo "<tr>
                                                    <td>$reg[libCodigo]</td>
                                                    <td>$reg[libNombre]</td>
                                                    <td>$reg[libNumPag]</td>
                                                    <td>$reg[libAutor]</td>
                                                    <td>$reg[libEditorial]</td>
                                                    <td>$reg[libArea]</td>
                                                </tr>";
                                        }
                                    } else {
                                        $registros = mysqli_query($con, "SELECT * FROM libros");
                                        while($reg = mysqli_fetch_array($registros)){
                                            echo "<tr>
                                                    <td>$reg[libCodigo]</td>
                                                    <td>$reg[libNombre]</td>
                                                    <td>$reg[libNumPag]</td>
                                                    <td>$reg[libAutor]</td>
                                                    <td>$reg[libEditorial]</td>
                                                    <td>$reg[libArea]</td>
                                                </tr>";
                                        }
                                    } ?>
                                </table>
                            </div>
                        <?php } else if($accion == 'modificar' && isset($_REQUEST['libNom'])) {
                            $registros = mysqli_query($con, "SELECT * FROM libros WHERE libCodigo = $_REQUEST[libNom]");
                            if($reg = mysqli_fetch_array($registros)){ ?>
                                <form action='../php/libro/modificar.php' class='register' method='POST'>
                                    <div class='modificarlibro'>
                                        <label>Código Libro: &nbsp<input class='new' type='text' name='codigo' value="<?php echo $reg['libCodigo']; ?>" required><br></label>
                                        <label>Nombre Libro: &nbsp<input class='new' type='text' name='nombre' value="<?php echo $reg['libNombre']; ?>" required><br></label>
                                        <label>Cantidad de Páginas: &nbsp<input class='new' type='number' name='cantidadPg' value="<?php echo $reg['libNumPag']; ?>" required><br></label>
                                        <label>Nombre Autor: &nbsp<input class='new' type='text' name='autor' value="<?php echo $reg['libAutor']; ?>" required><br></label>
                                        <label>Nombre Editorial: &nbsp<input class='new' type='text' name='editorial' value="<?php echo $reg['libEditorial']; ?>" required><br></label>
                                        <label>Seleccione Área: &nbsp
                                            <?php $registros = mysqli_query($con, "SELECT * FROM areas") ?>
                                            <select class="new" name="arNom">
                                                <?php while($regis = mysqli_fetch_array($registros)){
                                                    if($reg['libArea'] == $regis['areCodigo']) {
                                                        echo "<option value='$regis[libArea]' selected>$regis[areNombre]</option>";
                                                    }else {
                                                        echo "<option value='$regis[areCodigo]'>$regis[areNombre]</option>";
                                                    }
                                                } ?>
                                            </select>
                                        </label><br>
                                        <input class='boton' type='submit' value='Modificar'>
                                    </div>
                                </form>
                            <?php }
                        } else if($accion == 'eliminar' && isset($_REQUEST['libNom'])){
                            $registros = mysqli_query($con, "SELECT * FROM libros WHERE libCodigo = $_REQUEST[libNom]");
                                while($reg = mysqli_fetch_array($registros)){
                                    echo "<form action='../php/libro/eliminar.php' class='register' method='POST'>
                                            <div class='area'>
                                                <label>Seguro que desea eliminar el libro</label><br>
                                                <input type='hidden' name='codigo' value='$reg[libCodigo]'>
                                                <a href='/punto6/views/libro.php?accion=consultar'>Volver</a>
                                                <input class='boton' type='submit' value='Eliminar'>
                                            </div>
                                        </form>";
                                }
                        } ?>
                    <?php } ?>
                <?php } ?>
            </main>
        </div>
    </body>

</html>