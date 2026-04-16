<?php
class Login_model extends CI_Model {

       

        public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();
        }

        public function ingreso($u,$p)
        {
				
                $sql="SELECT usuarios.*, 'usuario' as tipo,0 as id_cliente FROM usuarios WHERE usuario =? AND pwdcompare(?,contraseña)=1";				                
                $query=$this->db->query($sql,array($u,$p));                                
                var_dump($query);
                
                die($sql);
                $rta=$query->result();               
				if(!empty($rta)){                   
                    return $rta;                    
					}
                else{
                    //pruebo con clientes
                    $sql="SELECT clientes.*,'vendedor' as tipo FROM clientes WHERE usuario =? AND clave=?";				
                    $query=$this->db->query($sql,array($u,$p));                                
                    $rta=$query->result();               
		    		if(!empty($rta)){                   
                            return $rta;                    
					    }
                    else{
                    return false;                   
                }   					
                    
                }
        }
		public function checkear_contrasena_actual($contrasena_actual, $username)
        {
            $sql="SELECT * FROM usuario WHERE username = ? AND password = ?";
            return $this->db->query($sql, array($username, md5($contrasena_actual)))->row_array();
        }
        public function cambiar_contrasena($contrasena_nueva, $username)
        {
            $sql="UPDATE usuario SET password = ? WHERE username = ?";
            return $this->db->query($sql, array(md5($contrasena_nueva), $username));
        }

}
?>
