<?php
class Proveedores_model extends CI_Model {

       

        public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();
        }

         public function listado()
        {
		
				return $this->buscar('');
        }
		public function buscar($p)
        {
				
				    $cliente ='';
		    if(strlen($p)>0 and strlen($p) <20){
		    	$cliente=" where upper(nombre) like upper('".$p."') + '%' ";
		    }

		    $sql="SELECT top 50 * from saldos_proveedores ".$cliente." order by Nombre";
		    $query = $this->db->query($sql,array($p.'%'));			
		    return $query->result();
		   return $query->result();	
				
        }
        public function editar($p)
        {
				$query=$this->db->get_where('prove',array("id"=>$p));
				//echo $this->db->queries[0];die;
				return $query->result();
        }
         public function eliminar($p)
        {
				
				//verificar si esta en pagos
				$query=$this->db->get_where('cc_pago',array("idcp"=>$p,"tipo"=>'P'),1);
				$b=$query->result();
				//echo $this->db->queries[0];die;
				//verificar si esta en pedido
				$query=$this->db->get_where('pedido',array("idp"=>$p),1);
				$c=$query->result();
				//verificar si esta en proveedor 
				$query=$this->db->get_where('prove',array("id"=>$p),1);
				$d=$query->result();
				return array("cc_pago"=>$b,"pedido"=>$c,"prove"=>$d);
        }
         public function guardar($p)
        {
				$object=$p["proveedor"];
				
				if($object->id > 0){
					$this->db->where('id',$object->id);
					$this->db->update('prove', $object);
				    //var_dump($object);die;
				}
				else{
					$query=$this->db->insert('prove', $object);
						
				}	
			return true;
        }
         public function delete($p)
        {
				$this->db->where('id', $p);
				$this->db->delete("prove");
        }
            public function cmbProveedores($p)
        {
		    
		   $sql="select * from prove where nombre like ? Order by nombre";
		   $query = $this->db->query($sql,array($p));
		   //echo $this->db->queries[0];die;
		   $rta=$query->result_array();
		   $t=array();
		   foreach($rta as $r){
					$t[$r["id"]]=$r["nombre"];
			   }
		   return $t;	   
        }
}
?>
