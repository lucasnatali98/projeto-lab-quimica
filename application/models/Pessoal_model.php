<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Pessoal_model extends CI_Model {
        public $id;
        public $nome;
        public $cargo;
        public $lattes;
        public $foto;
        

        public function __construct(){
            parent::__construct();
        }

        public function listar_pessoas(){
            $this->db->order_by('nome','ASC');
            return $this->db->get('pessoal')->result();
        }

        public function listar_pessoa($id){
            $this->db->from('pessoal');
            $this->db->where('md5(id)',$id);
            return $this->db->get()->result();
        }

        public function adicionar($nome, $cargo, $lattes, $foto){
            $dados['nome'] = $nome;
            $dados['cargo'] = $cargo;
            $dados['lattes'] = $lattes;
            $dados['foto'] = $foto;
            
            
            return $this->db->insert('pessoal',$dados); 
        }

        public function excluir($id){
            $this->db->where('md5(id)', $id);
            return $this->db->delete('pessoal');
        }

        public function alterar($id, $nome, $cargo, $lattes, $foto){
            $dados['nome'] = $nome;
            $dados['cargo'] = $cargo;
            $dados['lattes'] = $lattes;
            $dados['foto'] = $foto;
            
            $this->db->where('id',$id);
            return $this->db->update('pessoal', $dados);
        }

        public function nova_foto($id, $foto){
            $dados['foto'] = $foto;
          $this->db->where('id',$id);
          return $this->db->update('pessoal',$dados);
        }

        
    }   
?>