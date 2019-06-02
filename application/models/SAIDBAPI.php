<?php

class SAIDBAPI extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->load->library(array('cart'));
        $this->load->library('');
        $this->load->helper('url');
        $this->load->database();
    }
    function addSequence($pdata){
        $date=date('Y-m-d h:i:s');
        $this->db->set("created_on", $date);
        $this->db->insert("tbl_sequence_prefix", $pdata);
        return $this->db->insert_id();
    }
    function checkPrefix($prefix,$dealer_id=''){
        $this->db->select("m.pk_id");
        $this->db->where("m.prefix LIKE '%".$prefix."%'");
        $query = $this->db->get("tbl_sequence_prefix m");
        if ($query->num_rows() > 0) {
            return true;
        }
        return false;
    }
    function updatePrefix($pdata,$member_id){
        $this->db->where("member_id", $member_id);
        return $this->db->update("tbl_sequence_prefix", $pdata);

    }
    function getPrefixByMember($member_id){
        $this->db->select("m.prefix");
        $this->db->where("m.member_id",$member_id);
        $query = $this->db->get("tbl_sequence_prefix m");
        if ($query->num_rows() > 0) {
            return $query->row_array();
        }
        return false;
    }
    function getSequenceByMemberId($member_id){
        $this->db->select("CONCAT(m.prefix,'-',m.series_start) as sequence");
        $this->db->where("m.member_id",$member_id);
        $query = $this->db->get("tbl_sequence_prefix m");
        if ($query->num_rows() > 0) {
            return $query->row_array();
        }
        return false;
    }
    function getOrderCountByMember($member_id){
        $this->db->select("m.series_start as cnt");
        $this->db->where("m.member_id",$member_id);
        $query = $this->db->get("tbl_sequence_prefix m");
        if ($query->num_rows() > 0) {
            return $query->row_array();
        }
        return false;
    }
    function getSequences($s = array())
    {
        $this->db->select("m.member_id,CONCAT_WS(' ',m.first_name,m.last_name) as user_name,sp.prefix,sp.series_start,sp.pk_id");

        $this->db->join("tbl_sequence_prefix sp","sp.member_id=m.member_id","LEFT");
        if (isset($s['member_id']) && !empty($s['member_id'])) {
            $this->db->where("m.member_id", $s['member_id']);
        }
        $this->db->order_by("m.member_id");
        $query = $this->db->get("tbl_members m");
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        return false;
    }
}