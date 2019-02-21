<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Producoes_model extends CI_Model {
        public $id;
        public $titulo;
        public $descricao;
        public $data;

        public function __construct(){
            parent::__construct();
        }

        public function listar_producoes(){
            $this->db->order_by('titulo','ASC');
            return $this->db->get('producao')->result();
        }

        public function listar_producao($id){
            $this->db->order_by('titulo','ASC');
            $this->db->from('producao');
            $this->db->where('md5(id)',$id);
            return $this->db->get()->result();
        }

                
        public function listar_anos(){
            $this->db->order_by('ano','DESC');
            $producoes = $this->db->get('producao')->result();
            
            for($i=0; $i < count($producoes); $i++){
                $listaDeAnos[$i] = $producoes[$i]->ano; 
            }
            return array_unique($listaDeAnos);
        }
        
        public function adicionar($titulo, $descricao,$data){
            $dados['titulo'] = $titulo;
            $dados['descricao'] = $descricao;
            $data['data'] = $data;
            return $this->db->insert('producao',$dados); 
        }

        public function excluir($id){
            $this->db->where('md5(id)', $id);
            return $this->db->delete('producao');
        }

        public function alterar($id, $titulo, $descricao){
            $dados['titulo'] = $titulo;
            $dados['descricao'] = $descricao;
            $dados['data'] = $data;
            $this->db->where('id',$id);
            return $this->db->update('producao', $dados);
        }
    }   
?>