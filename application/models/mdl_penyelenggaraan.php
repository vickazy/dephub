<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of mdl_penyelenggaraan
 *
 * @author bharata
 */
class Mdl_penyelenggaraan extends CI_Model{
    
//    function insert_peserta($data_peserta){
//        if($this->db->insert('peserta',$data_peserta)){
//            unset($data_peserta['tanggal_lahir']);
//            $query=$this->db->get_where('peserta',$data_peserta);
//            if($query->num_rows()==1){
//                $idv=$query->row_array();
//                return $idv['id'];
//            }else{
//                return FALSE;
//            }
//        }else{
//            return FALSE;
//        }
//    }
    
    function getall_peserta($id_program){
        if($id_program!=-1){
            $this->db->where('registrasi.id_program',$id_program);
        }
        $this->db->join('pegawai','registrasi.id_peserta=pegawai.id');
        return $this->db->get('registrasi')->result_array();
    }
    
    function toggle_status($clause,$data){
        $this->db->where($clause);
        $this->db->update('registrasi',$data);
    }
    
    function insert_registrasi($data_reg){
        $this->db->insert('registrasi',$data_reg);
        return TRUE;
    }
    
    function insert_widyaiswara($data){
        $this->db->insert('dosen_tamu',$data);
    }
    
    function getall_widyaiswara(){
        return $this->db->get_where('dosen_tamu')->result_array();
    }
    
    function get_widyaiswara($id){
        $data = $this->db->get_where('dosen_tamu',array('id'=>$id));
        if($data->num_rows()==1){
            return $data->row_array();
        }else{
            return FALSE;
        }
    }
    
    function update_widyaiswara($id,$data){
        $this->db->where('id',$id);
        $this->db->update('dosen_tamu',$data);        
    }
    
    function delete_widyaiswara($id){
        $this->db->where('id',$id);
        $this->db->delete('dosen_tamu');
    }
    
    function getall_instansi(){
        return $this->db->get('instansi')->result_array();
    }
    
    function getkode_instansi($param){
        $query=$this->db->get_where('instansi',array('nama_instansi'=>$param));
        if($query->num_rows()==0){
            return -1;
        }else{
            return $query->row()->kode_kantor;
        }
    }
    
    function get_peserta($param){
        $query=$this->db->get_where('pegawai',array('instansi'=>$param));
        if($query->num_rows()==0){
            return FALSE;
        }else{
            return $query->result_array();
        }
    }
    
    function get_data_peserta($param){
        $query=$this->db->get_where('pegawai',array('nip'=>$param));
        if($query->num_rows()==0){
            return FALSE;
        }else{
            return $query->row_array();
        }
    }
    
    function get_data_peserta_id($param){
        $query=$this->db->get_where('pegawai',array('id'=>$param));
        if($query->num_rows()==0){
            return FALSE;
        }else{
            return $query->row_array();
        }
    }
    
    function get_history($id){
        return $this->db->get_where('history_pelatihan',array('id_peserta'=>$id))->result_array();
    }
}
