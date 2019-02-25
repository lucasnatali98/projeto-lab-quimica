<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Contatos_model extends CI_Model {
        public $id;
        public $nome;
        public $email;

        public function __construct(){
            parent::__construct();
        }

        public function listar_contatos(){
            $this->db->order_by('nome','ASC');
            return $this->db->get('contato')->result();
        }

        public function listar_contato($id){
            $this->db->order_by('nome','ASC');
            $this->db->from('contato');
            $this->db->where('md5(id)',$id);
            return $this->db->get()->result();
        }

        public function adicionar($nome, $email){
            $dados['nome'] = $nome;
            $dados['email'] = $email;
            return $this->db->insert('contato',$dados); 
        }

        public function excluir($id){
            $this->db->where('md5(id)', $id);
            return $this->db->delete('contato');
        }

        public function alterar($id, $nome, $email){
            $dados['nome'] = $nome;
            $dados['email'] = $email;
            $this->db->where('id',$id);
            return $this->db->update('contato', $dados);
        }
    }   
?>