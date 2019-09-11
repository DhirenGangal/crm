<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Common_model extends CI_Model
{
    
    /*
        @Author:      Dhiraj Gangal
        @Description: Select data from one or more table with limit 
        @Input:       (array) OR (string) $field , e.g array('id','name') OR 'id,name'
        @Input:       (string) $table 
        @Input:       (array) $where  e.g array('id'=>1,'active'=>0)
        @Input:       (array) $join  e.g array('table1 t1'=>'t1.id = t2.id','table3 t3'=>'t3.id = t4.id@left')
        @Input:       (string) $order  e.g 'id DESC'
        @Input:       (array) $limit e.g array('limit'=>10,'page'=>1)
        @Input:       (array) $search  e.g array('t1.name'=>'xyz','t2.name'=>'abc')
        @Output:      (array) data 
        @Date:        13-Sept-2017
    */    
    function select_data($field, $table, $where = '', $join = '', $order = '', $limit = "", $search = "")
    {
        $this->db->select($field);

        $this->db->from($table);

        if ($where != '') {
            $this->db->where($where);
        }

        if ($order != '') {
            $this->db->order_by($order);
        }

        if (!empty($join)) {
            foreach ($join as $key => $value) {
                if (strpos($value, "@"))
                    $this->db->join($key, substr($value, 0, strpos($value, "@")), substr($value, strpos($value, "@") + 1));
                else
                    $this->db->join($key, $value);
            }
        }

        if (!empty($search)) {
            $or_like = FALSE;

            if ($where != '') {
                $this->db->group_start();
            }

            foreach ($search as $key => $value) {

                if ($or_like === FALSE) {

                    $this->db->like($key, $value, 'match');
                }
                else {
                    $this->db->or_like($key, $value, 'match');
                }
                $or_like = TRUE;
            }

            if ($where != '') {
                $this->db->group_end();
            }
        }

        if (!empty($limit) && is_array($limit)) 
        {
            $this->db->limit($limit['limit'], $limit['start']);
        }

        $query = $this->db->get();
        if($query) {
                    return $query->result_array(); 
        }
        else {
            return false;
        }
    }

    /*
        @Author:      Dhiraj Gangal
        @Description: Select one row from table
        @Input:       (array) OR (string) $field , e.g array('id','name') OR 'id,name'
        @Input:       (string) $table 
        @Input:       (array) $where  e.g array('id'=>1,'active'=>0) 
        @Input:       (string) $order  e.g 'id DESC'
        @Input:       (array) $limit e.g array('limit'=>10,'page'=>1) 
        @Output:      (array) data 
        @Date:        13-Sept-2017
    */  
    function select_data_row($field, $table, $where = '', $order = '', $limit = '')
    {
        $this->db->select($field);

        $this->db->from($table);

        if ($where != '') {
            $this->db->where($where);
        }

        if ($order != '') {
            $this->db->order_by($order);
        }

        if ($limit != '') {
            $this->db->limit($limit);
        }

        $query = $this->db->get();
        
        if($query) {
            return $query->row_array();
        }
        else {
            return false;
        }
    }

    /*
        @Author:      Dhiraj Gangal
        @Description: insert Data in table 
        @Input:       (string) $table 
        @Input:       (array) $fields e.g array('id'=>1,'active'=>0) 
        @Output:      (int) Last insert id
        @Date:        13-Sept-2017
    */ 
    function insert_data($table, $fields)
    {
        $result = $this->db->insert($table, $fields);
        //echo $this->db->last_query();exit;
        if ($result)
            return $this->db->insert_id();
        else
            return 0;
    }

    /*
        @Author:      Dhiraj Gangal
        @Description: Update Data in table 
        @Input:       (string) $table 
        @Input:       (array) $fields
        @Input:       (array) $where  e.g array('id'=>1,'active'=>0)
        @Output:      (int) affected record count
        @Date:        13-Sept-2017
    */
    function update_data($table, $field, $id)
    {
        $this->db->where($id);
        $this->db->update($table, $field);
        return $this->db->affected_rows();
    }

    /*
        @Author:      Dhiraj Gangal
        @Description: Delete Data from table 
        @Input:       (string) $table 
        @Input:       (array) $where  e.g array('id'=>1,'active'=>0)
        @Output:      (int) affected record count
        @Date:        13-Sept-2017
    */
    function delete_data($table, $where)
    {
        $this->db->where($where);
        $this->db->delete($table);
        return $this->db->affected_rows();
    }
    
    /*
        @Author:      Dhiraj Gangal
        @Description: Delete Data from table using in condition
        @Input:       (string) $table 
        @Input:       (string) $column_name e.g 'id'
        @Input:       (array) $match_value_array  e.g array(1,2,3)
        @Output:      (int) number of deleted record.
        @Date:        13-Sept-2017
    */
    function delete_data_in($table,$column_name,$match_value_array)
    {
        $this->db->where_in($column_name, $match_value_array);
        $this->db->delete($table);
        return $this->db->affected_rows();
    }

    /*
        @Author:      Dhiraj Gangal
        @Description: Update Data in table using in condition
        @Input:       (string) $table 
        @Input:       (string) $column_name e.g 'id'
        @Input:       (array) $match_value_array  e.g array(1,2,3)
        @Output:      (int) number of deleted record.
        @Date:        2-Nov-2017
    */
    function update_data_in($table, $field, $column_name, $match_value_array)
    {
        $this->db->where("$column_name IN ($match_value_array)");
        $this->db->update($table, $field);
        return $this->db->affected_rows();
    }

    /*
        @Author:      Dhiraj Gangal
        @Description: Update Data in table using in condition
        @Input:       (string) $table 
        @Input:       (array) $batch_data  
        @Output:      
        @Date:        3-Nov-2017
    */
    
    function insert_batch_data($table_name , $batch_data)
    {
        if(is_array($batch_data) && count($batch_data) > 0)
        {
            $this->db->insert_batch($table_name , $batch_data);
            return $this->db->affected_rows();
        }
    }

    /*
        @Author:      Dhiraj Gangal
        @Description: Update Data in table using in condition
        @Input:       (string) $table 
        @Input:       (string) $column_name e.g 'id'
        @Input:       (array) $match_value_array  e.g array(1,2,3)
        @Output:      (int) number of deleted record.
        @Date:        2-Nov-2017
    */
    
    function update_batch_data($table_name , $batch_data, $where_data)
    {
        if(is_array($batch_data) && count($batch_data) > 0)
        {
            $this->db->update_batch($table_name , $batch_data, $where_data);
        }
    }

    /*
        @Author:      Dhiraj Gangal
        @Description: start Transactions in database 
        @Date:        24-Sept-2017
    */
   
    function trans_start()
    {
        $this->db->trans_start();
    }
    
    /*
        @Author:      Dhiraj Gangal
        @Description: Complete Transactions in database 
        @Date:        24-Sept-2017
    */
    function trans_complete()
    {
        $this->db->trans_complete();
    }
    
    /*
        @Author:      Dhiraj Gangal
        @Description: Know status of Transactions database 
        @Output:      (boolean) true OR FALSE
        @Date:        24-Sept-2017
    */
    function trans_status()
    {
        return $this->db->trans_status();
    }
    
    /*
        @Author:      Dhiraj Gangal
        @Description: Rollback Changes of Transactions in database if Transactions status is false
        @Date:        24-Sept-2017
    */
    function trans_rollback()
    {
        $this->db->trans_rollback();
    }
    
    /*
        @Author:      Dhiraj Gangal
        @Description: Commit Changes in database if Transactions status is true
        @Date:        24-Sept-2017
    */
    function trans_commit()
    {
        $this->db->trans_commit();
    }
}