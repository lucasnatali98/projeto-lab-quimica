<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Galeria_model extends CI_Model {
        public $id;
        public $nome;
        public $descricao;
        public $data;

        public function __construct(){
            parent::__construct();
        }

        public function listar_galerias(){
            $this->db->order_by('data','DESC');
            return $this->db->get('galeria')->result();
        }

        public function listar_galeria($id){
            $this->db->select('id, nome, descricao, data');
            $this->db->from('galeria');
            $this->db->where('md5(id)',$id);
            return $this->db->get()->result();
        }
        public function listar_anos()
        {
            $this->db->order_by('data','DESC');
            $galeria = $this->db->get('galeria')->result();
            
            for($i=0; $i < count($galeria); $i++){
                $aux = date('Y-m-d',strtotime(str_replace('-','/',$galeria[$i]->data)));
                $listaAnos[$i] =  date('Y',strtotime(str_replace('-','/',$aux)));
            }
            return array_unique($listaAnos);
        }

        
        
        

        public function adicionar($nome, $descricao, $data){
            $dados['nome'] = $nome;
            $dados['descricao'] = $descricao;
            $dados['data'] = $data;
            return $this->db->insert('galeria',$dados); 
        }

        public function excluir($id){
            $this->db->where('md5(id)', $id);
            return $this->db->delete('galeria');
        }

        public function alterar($id, $nome, $descricao, $data){
            $dados['nome'] = $nome;
            $dados['descricao'] = $descricao;
            $dados['data'] = $data;
            $this->db->where('id',$id);
            return $this->db->update('galeria', $dados);
        }
        
       /* public function alterar_img($id){
            $dados['imagem']= 1;
            $this->db->where('md5(id)', $id);
            return $this->db->update('foto', $dados);
        }*/
    }   
?>