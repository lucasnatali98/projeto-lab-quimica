<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Uploadfotos_model extends CI_Model {
        public $id;
        public $nome;
        public $imagem;
        public $id_galeria;
        public $id_producao;

        public function __construct(){
            parent::__construct();
        }

        public function listar_fotos(){
            $this->db->order_by('nome','ASC');
            return $this->db->get('foto')->result();
        }

        public function listar_foto($id){
            $this->db->select('id, nome, imagem, id_galeria, id_producao');
            $this->db->from('foto');
            $this->db->where('md5(id)',$id);
            return $this->db->get()->result();
        }

        public function adicionar($nome, $id_galeria, $id_producao){
            $dados['nome'] = $nome;
            $dados['id_galeria'] = $id_galeria;
            $dados['id_producao'] = $id_producao;
            return $this->db->insert('foto',$dados); 
        }

        public function excluir($id){
            $this->db->where('md5(id)', $id);
            return $this->db->delete('foto');
        }

        public function alterar($id, $nome, $id_galeria, $id_producao){
            $dados['nome'] = $nome;
            $dados['id_galeria'] = $id_galeria;
            $dados['id_producao'] = $id_producao;
            $this->db->where('id',$id);
            return $this->db->update('foto', $dados);
        }
        
        public function alterar_img($id){
            $dados['imagem']= 1;
            $this->db->where('md5(id)', $id);
            return $this->db->update('foto', $dados);
        }
    }   
?>