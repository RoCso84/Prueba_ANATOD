<?php 
    include 'php/class.database.php';   //Realiza la conexion
    include 'php/get_data.php';         //Obtiene los datos
    include 'php/add_edit.php';        //Agregar y editar datos
?>

<!DOCTYPE html>
<meta name="viewport" content="width=device-width, initial-scale=1">
<head>
<link rel="stylesheet" href="css/style.css">
</head>
<body>

<div class="tab">
  <button class="tablinks active" onclick="openTab(event, 'Clientes')"><i class="fas fa-user-friends"></i>  Clientes</button>
  <button class="tablinks" onclick="openTab(event, 'Localidades')"><i class="fas fa-map-marker-alt"></i>  Localidades</button>
  <button class="tablinks" onclick="openTab(event, 'About')"><i class="fas fa-question-circle"></i>  About</button>
</div>
<!--------------------MODAL NUEVO CLIENTE------------------------>
        <div id="openModal" class="modalDialog">
            <div>
                <a href="#close" title="Close" class="close">X</a>
                <h2>Nuevo Cliente</h2>

                <form autocomplete="off" action="" method="post">
                <p align="left">
                    <labe>Nombre: </label><br>
                    <input autocomplete="off" name="nombre" type="text" required/><br>
                    <label>Nro. de documento:</label><br>
                    <input autocomplete="off" name="dni" type="text" onkeypress="allowNumbersOnly(event)" maxlength="8" required/><br>
                    <label>Localidad:</label><br>
                        <select name="localidad" required>
                        <option value="" selected disabled hidden>Elija una localidad</option>
                            <?php
                            foreach ($res_local as $data) {
                                echo("<option value=".$data["Id_loc"].">".$data["Localidad"]." (".$data["Provincia"].")</option>");
                            }
                            ?>
                        </select><br>
                        <p align="center">
                            <input  name="Nuevo" type="submit"  value="Agregar" />
                        </p>
                </p>
                </form>

            </div>
        </div>
<!--------------------------------------------------------------->  

<!--------------------MODAL EDITAR CLIENTE----------------------->
        <div id="openModalE" class="modalDialog">
            <div>
                <a href="#close" title="Close" class="close">X</a>
                <h2>Editar Cliente</h2>

                <form autocomplete="off" action="" method="post">
                <p align="left">
                    <labe>Id; </label><br>
                    <input id="idEdit" name="id" autocomplete="off" type="text" readonly/><br>
                    <labe>Nombre: </label><br>
                    <input id="nomEdit" name="nombre"autocomplete="off" type="text" required/><br>
                    <label>Nro. de documento:</label><br>
                    <input id="dniEdit" name="dni" autocomplete="off" type="text" onkeypress="allowNumbersOnly(event)" maxlength="8" required/><br>
                    <label>Localidad:</label><br>
                        <select id="localidadEdit" name="localidad"required>
                        <option value="" selected disabled hidden>Elija una localidad</option>
                            <?php
                            foreach ($res_local as $data) {
                                echo("<option value=".$data["Id_loc"].">".$data["Localidad"]." (".$data["Provincia"].")</option>");
                            }
                            ?>
                        </select><br>
                        <p align="center">
                            <input  name="Editar" type="submit"  value="Editar" />
                        </p>
                </p>
                </form>

            </div>
        </div>
<!--------------------------------------------------------------->

<!--------------------TABLA DE CLIENTES-------------------------------------->
    <div id="Clientes" class="tabcontent" style="display:block">
        <h2 align=center>Listado A - Clientes-</h2>
        <p align=center>

            <input type="text" id="buscarNom" onkeyup="buscarNom()" placeholder="Buscar por nombre...">
            <input type="text" id="buscarDni" onkeyup="buscarDni()"onkeypress="allowNumbersOnly(event)" maxlength="8" placeholder="Buscar por numero dni...">
            <button onclick="reload()"><i class="fas fa-sync fa-2x"></i></button>
            <button><a href="#openModal"><i class="fas fa-user-plus fa-2x"></i></a></button>
        </p>
        <table id="clientes">
            <tr>
                <th onclick="sortTable(0)"h>ID</th>
                <th onclick="sortTable(1)">Nombre</th>
                <th onclick="sortTable(2)">DNI</th>
                <th onclick="sortTable(3)">Localidad</th>
                <th onclick="sortTable(4)">Provincia</th>
                <th>Acciones</th>
                
            </tr>

                <?php 
                    foreach ($res_clientes as $data_cli) {
                        echo("
                        <tr>
                            <td>".$data_cli["cliente_id"]."</td>
                            <td>".$data_cli["cliente_nombre"]."</td>
                            <td>".$data_cli["cliente_dni"]."</td>
                            <td>".$data_cli["cliente_localidad"]."</td>
                            <td>".$data_cli["cliente_provincia"]."</td>
                            <td  align='center'>
                                <button class='btn btn-primary btn-xs' title='Editar cliente' onclick='editar(this)'>
                                <a href='#openModalE'><i class='fas fa-edit fa-2x'></i>
                                </button>
                                <button class='btn btn-primary btn-xs' title='Eliminar cliente' disabled >
                                    <i class='fas fa-trash-alt fa-2x'></i></i>
                                </button>
                            </td>
                        </tr>
                        ");
                    }            
                ?>
            </table>



    </div>
<!--------------------------------------------------------------------------->

<!-----------------TABLA DE LOCALIDADES-------------------------------------->
    <div id="Localidades" class="tabcontent" >
    <h2 align=center>Listado B - Localidades-</h2>
        <table id="localidades">
        <tr>
            <th onclick="sortTable(0,'L')">ID</th>
            <th onclick="sortTable(1,'L')">Provincia</th>
            <th onclick="sortTable(2,'L')">Localidad</th>
            <th onclick="sortTable(3,'L')">Cantidad de clientes</th>      
        </tr>
            <?php 
                //dar formato a los datos
                foreach ($res_local as $loc_data) {
                    echo("
                    <tr>
                            <td>".$loc_data["Id_prov"]."</td>
                            <td>".$loc_data["Provincia"]."</td>
                            <td>".$loc_data["Localidad"]."</td>
                            <td>".$loc_data["cantidad_clientes"]."</td>
                    </tr>
                    ");
                }
            ?>
        </table>  
    </div>
<!--------------------------------------------------------------------------->

</body>
</html>

<script src="js/1afd94d30f.js" crossorigin="anonymous"></script>
<script src="js/utilities.js" crossorigin="anonymous"></script>
