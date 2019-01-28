<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Eventos_model extends CI_Model {
        public $id;
        public $titulo;
        public $descricao;

        public function __construct(){
            parent::__construct();
        }

        public function listar_eventos(){
            $this->db->order_by('titulo','ASC');
            return $this->db->get('evento')->result();
        }

        public function listar_evento($id){
            $this->db->order_by('titulo','ASC');
            $this->db->from('evento');
            $this->db->where('md5(id)',$id);
            return $this->db->get()->result();
        }

        public function adicionar($titulo, $descricao){
            $dados['titulo'] = $titulo;
            $dados['descricao'] = $descricao;
            return $this->db->insert('evento',$dados); 
        }

        public function excluir($id){
            $this->db->where('md5(id)', $id);
            return $this->db->delete('evento');
        }

        public function alterar($id, $titulo, $descricao){
            $dados['titulo'] = $titulo;
            $dados['descricao'] = $descricao;
            $this->db->where('id',$id);
            return $this->db->update('evento', $dados);
        }
    }   
?>