<?php 
    include('../shared/header.php');
    include('../util/conexion.php');
?>
    <body>
        <script
            src="https://code.jquery.com/jquery-3.6.0.js"
            integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
            crossorigin="anonymous"></script>
        <?php include('../shared/menu.php'); ?>
            <main>
                <?php if(isset($_REQUEST['accion'])) {
                    $accion = $_REQUEST['accion'];
                    if($accion == 'prestamo'){?>
                        <form action="../php/prestamo/ingreso.php" class="register" method="POST">
                          
                            <div class="realizarprestamo">
                                <h3>Realizar Préstamo</h3>
                                <label>Codigo: &nbsp<input class="new" type="text" name="codigo" value="<?php if(isset($_REQUEST['dato3'])) {echo $_REQUEST['dato3']; } ?>" required><br></label>
                                <label>Fecha: &nbsp<input class="new" type="date" name="fecha" value="<?php if(isset($_REQUEST['dato1'])) {echo $_REQUEST['dato1']; } ?>" required><br></label>
                                <label>Usuario: &nbsp
                                    <select class="new" name="usuNom">
                                        <?php 
                                            $registros = mysqli_query($con, "SELECT * FROM usuarios");
                                            while($reg = mysqli_fetch_array($registros)){
                                                if(isset($_REQUEST['dato2']) && $_REQUEST['dato2'] == $reg['usuDocumento']){
                                                    echo "<option value='$reg[usuDocumento]' selected>$reg[usuNombre]</option>";
                                                } else {
                                                    echo "<option value='$reg[usuDocumento]'>$reg[usuNombre]</option>";
                                                }
                                            }
                                        ?>
                                    </select><br>
                                </label>
                            </div>
                        </form>
                        <br><br><br>
                        <form action="../php/prestamo/ingreso.php?libro=1" class="register" method="POST">
                            <div class="realizarprestamoparte2">
                                <input type="hidden" name="dato3" value="<?php if(isset($_REQUEST['dato3'])) {echo $_REQUEST['dato3']; } ?>">
                                <input type="hidden" name="dato2" value="<?php if(isset($_REQUEST['dato2'])) {echo $_REQUEST['dato2']; } ?>">
                                <input type="hidden" name="dato1" value="<?php if(isset($_REQUEST['dato1'])) {echo $_REQUEST['dato1']; } ?>">
                                <label>Libro: &nbsp
                                    <select  class="new" name="libNom">
                                        <?php 
                                            $registros = mysqli_query($con, "SELECT * FROM libros");
                                            while($reg = mysqli_fetch_array($registros)){
                                                echo "<option value='$reg[libCodigo]'>$reg[libNombre]</option>";
                                            }
                                        ?>
                                    </select>
                                    <br>
                                </label>
                                <label>Cantidad: &nbsp<input class="new" type="number" min="1" max="10" name="cantidad" required><br></label>
                                <label>Limite de Entrega: &nbsp<input class="new" type="date" name="limite" required><br></label>
                                <input class="boton" type="submit" value="Guardar Préstamo">
                            </div>
                        </form>
                    <?php } else if($accion == 'devolucion'){ ?>
                        <form action="../php/prestamo/devolucion.php" class="register" method="POST">
                        <br>
                            <div class="realizardevolucion">
                                <h3>Realizar Devolución</h3><br>
                                <label>Fecha: &nbsp<input class="new" type="date" name="fechaDev" required><br></label>
                                <label>Usuario: &nbsp
                                    <select class="new" name="usuNom" id="usuNom">
                                        <option value='0'>Seleccione el usuario</option>
                                        <?php 
                                            $registros = mysqli_query($con, "SELECT * FROM usuarios");
                                            while($reg = mysqli_fetch_array($registros)){
                                                echo "<option value='$reg[usuDocumento]'>$reg[usuNombre]</option>";
                                            }
                                        ?>
                                    </select><br>
                                </label>

                                <label>Libros: &nbsp
                                    <select class="new" name="libNom" id="libros">
                                    </select><br>
                                </label>
                                <input class="boton" type="submit" value="Guardar">
                            </div>
                        </form>
                    <?php } ?>
                    <?php
                        if(isset($_REQUEST['dato3'])){
                            $registros = mysqli_query($con, "SELECT * FROM detalleprestamo WHERE dtpPrestamo = $_REQUEST[dato3]");
                            if($reg = mysqli_fetch_array($registros)){   
                    ?>
                            <div class="tabla">
                                <table>
                                    <tr>
                                        <th>Libro</th>
                                        <th>Cant.</th>
                                        <th>Fecha Inicio</th>
                                        <th>Fecha Limite</th>
                                    </tr>
                                    <?php 
                                        $registros = mysqli_query($con, "SELECT * FROM detalleprestamo WHERE dtpPrestamo = $_REQUEST[dato3]");
                                        while($reg = mysqli_fetch_array($registros)){
                                            $sel = mysqli_query($con, "SELECT * FROM libros WHERE libCodigo = '$reg[dtpLibro]'");
                                            $nomLib = mysqli_fetch_array($sel);
                                            $sele = mysqli_query($con, "SELECT * FROM prestamos WHERE preCodigo  = '$reg[dtpPrestamo]'");
                                            $fecIni = mysqli_fetch_array($sele);
                                            echo "<tr>
                                                    <td>$nomLib[libNombre]</td>
                                                    <td>$reg[dtpCantidad]</td>
                                                    <td>$fecIni[preFecha]</td>
                                                    <td>$reg[dtpFechaFin]</td>
                                                </tr>";
                                        }
                                    ?>
                                </table>
                            </div>
                    <?php }} ?>
                <?php } ?>
            </main>
        </div>
    </body>

</html>
<script type="text/javascript">
    $(document).ready(function(){
        $('#usuNom').change(function(){
            recargarLista();
        });
    })

    function recargarLista(){
        const id = $('#usuNom').val();
        $.ajax({
            type: 'POST',
            url: '/punto6/php/prestamo/datos.php',
            data: {'usuario': id},
            success: function(r){
                $('#libros').html(r);
            }
        });
    }
</script>