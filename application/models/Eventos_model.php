<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Eventos_model extends CI_Model {
        public $id;
        public $titulo;
        public $descricao;
        public $ano;
        public $eventos;
        public $anos;

        public function __construct(){
            parent::__construct();
        }

        public function listar_eventos(){
            $this->db->order_by('ano','DESC');
            return $this->db->get('evento')->result();
        }
        
        public function listar_anos(){
            $this->db->order_by('ano','DESC');
            $eventos = $this->db->get('evento')->result();
            
            for($i=0; $i < count($eventos); $i++){
                $listaDeAnos[$i] = $eventos[$i]->ano; 
            }
            return array_unique($listaDeAnos);
        }

        public function listar_evento($ano){
            $this->db->order_by('ano','ASC');
            $this->db->from('evento');
            $this->db->where('evento.ano',$ano);
            return $this->db->get()->result();
        }

        public function adicionar($titulo, $descricao, $ano){
            $dados['titulo'] = $titulo;
            $dados['descricao'] = $descricao;
            $dados['ano'] = $ano;

            return $this->db->insert('evento',$dados); 
        }

        public function excluir($id){
            $this->db->where('md5(id)', $id);
            return $this->db->delete('evento');
        }

        public function alterar($id, $titulo, $descricao, $ano){
            $dados['titulo'] = $titulo;
            $dados['descricao'] = $descricao;
            $dados['ano'] = $ano;
            $this->db->where('id',$id);
            return $this->db->update('evento', $dados);
        }
        
        public function alterar_img($id){
            $dados['imagem']= 1;
            $this->db->where('md5(id)', $id);
            return $this->db->update('evento', $dados);
        }
    }   
?>
