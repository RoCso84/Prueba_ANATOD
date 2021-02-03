<?php
    if (isset($_POST['Nuevo'])) {
        $nom = $_POST['nombre'];
        $dni = $_POST['dni'];
        $loc = $_POST['localidad'];

        $conDB=new class_db();    

        //obtener los datos de todos los clientes
        $sqlIns = "insert into clientes (cliente_nombre,cliente_dni,cliente_localidad) values('".$nom."','".$dni."',".$loc.")";
            $query = $conDB->conn->query($sqlIns);

        
    };
    if (isset($_POST['Editar'])) {
        $id = $_POST['id'];
        $nom = $_POST['nombre'];
        $dni = $_POST['dni'];
        $loc = $_POST['localidad'];

        $conDB=new class_db();    
        $sqlEdit = "UPDATE clientes SET cliente_nombre = '".$nom."', cliente_dni='".$dni."', cliente_localidad='".$loc."' WHERE cliente_id =  $id";
        $query = $conDB->conn->query($sqlEdit);
        
    }
?>