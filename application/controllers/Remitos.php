<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Remitos extends CI_Controller {

	
	public function __construct(){
		
		    parent::__construct();			
			if(!isset($this->session->usuario) or  $this->session->tipo<>'vendedor'){							
			redirect('salir');
				exit;
		}		
	}	
	public function index() {
        $this->load->view('encabezado.php'); 
		$this->load->view('menu.php');
        $data["data"]="<h1>Pagina No disponible</h1>";
		$this->load->view('remitos/index.php', $data);
    }	
		
}	