
<?php
//carga de datos desde BD
 $conDB=new class_db();    

 $sql = "SELECT 
             cliente_id,
             cliente_nombre,
             cliente_dni,
             localidades.localidad_nombre as cliente_localidad,
             provincias.provincia_nombre as cliente_provincia                    
         FROM clientes 
         INNER JOIN localidades ON clientes.cliente_localidad=localidades.localidad_id
         INNER JOIN provincias ON localidades.localidad_provincia=provincias.provincia_id
         ORDER BY cliente_id
         ";

 $result = $conDB->conn->query($sql);
 $res_clientes = $result->fetch_all(MYSQLI_ASSOC);

 //obtener los datos de todos las clientes por localidad
 $sql2 = "SELECT 
             provincia_id as Id_prov,
             provincias.provincia_nombre as Provincia,
             localidades.localidad_id as Id_loc,
             localidades.localidad_nombre as Localidad,
             count(*) as cantidad_clientes      
             FROM clientes 
             INNER JOIN localidades ON clientes.cliente_localidad=localidades.localidad_id
             INNER JOIN provincias ON localidades.localidad_provincia=provincias.provincia_id    
             GROUP BY localidad_id       
         ";

$result = $conDB->conn->query($sql2);
$res_local = $result->fetch_all(MYSQLI_ASSOC);

 //obtener los datos de todos las clientes por localidad
 $sql3 = "SELECT 
            localidad_id     as Id_loc,
            localidad_nombre as Localidad,
            provincia_nombre as Provincia
            FROM
                localidades 
                inner JOIN
                provincias ON localidades.localidad_provincia = provincias.provincia_id
            ORDER BY provincia_nombre
            ";

$result = $conDB->conn->query($sql3);
$res_localidades = $result->fetch_all(MYSQLI_ASSOC);
?>



