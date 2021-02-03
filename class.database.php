<?php
/*
 * anatod ® - ©
 */
?>
<?php
class class_db { 
    PUBLIC  $conn=NULL;
/*BD REMOTA
    CONST user      =   'test',
          pass      =   'test5678',
          db        =   'test_anatod',
          serverip  =   'anatod-test.c75o4mima6rb.us-east-1.rds.amazonaws.com';
*/ 
/*BD LOCAL*/
    CONST 
        user      =   'root',
        pass      =   'vertrigo',
        db        =   'baseprueba',
        serverip  =   'localhost';

    public function __construct(){
        if(!$this->conn){
            try {
                $this->conn = new mysqli(SELF::serverip,SELF::user,SELF::pass,SELF::db); 
                $this->conn->set_charset("utf8");
                if (!$this->conn) 
                    {die('No se pudo conectar.');}
            } catch (Exception $exc) {
                echo $exc->getTraceAsString();
            }
        }
    }    
}
?>
