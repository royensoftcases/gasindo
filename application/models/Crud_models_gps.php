<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Crud_models_gps extends CI_Model {
    function __construct(){
        parent::__construct();
         $this->db2 = $this->load->database('db_gps', TRUE);
    }


    public function insert($table, $data) {
        if ($this->db2->insert($table, $data)) {
            return $this->db2->insert_id();
        } else {
            return false;
        }
    }

    public function insert_batch($table, $data) {
        if ($this->db2->insert_batch($table, $data)) {
            return true;
        } else {
            return false;
        }
    }

    public function inserted_id() {
        return $this->db2->insert_id();
    }

    public function update($table, $data, $where) {
        $this->db2->where($where);
        if ($this->db2->update($table, $data)) {
            return true;
        } else {
            return false;
        }
    }

    public function select($table) {
        $get = $this->db2->get($table);
        if ($get->num_rows() > 0) {
            return $get->result_array();
        } else {
            return FALSE;
        }
    }

   public function select_tes($table) {
        $get = $this->db2->get($table);
        if ($get->num_rows() > 0) {
            return $get->result_array();
        } else {
            return FALSE;
        }
    }

    public function select_query($query) {

        if (!$this->db2->simple_query($query)) {
            return FALSE;
        } else {
            $get = $this->db2->query($query);
            if ($get->num_rows() > 0) {
                return $get->result_array();
            } else {
                return FALSE;
            }
        }
    }


    public function select_where($table, $where) {
        $this->db2->where($where);
        $get = $this->db2->get($table);
        if ($get->num_rows() > 0) {
            return $get->result_array();
        } else {
            return FALSE;
        }
    }

    public function select_limit($table, $limit) {
        $this->db2->limit($limit);
        $get = $this->db2->get($table);
        if ($get) {
            return $get->result_array();
        } else {
            return FALSE;
        }
    }

    public function select_like($table, $like) {
        $this->db2->like($like);
        $get = $this->db2->get($table);
        if ($get) {
            return $get->result_array();
        } else {
            return FALSE;
        }
    }

    public function select_like_limit($table, $like, $limit) {
        $this->db2->like($like);
        $this->db2->limit($limit);
        $get = $this->db2->get($table);
        if ($get) {
            return $get->result_array();
        } else {
            return FALSE;
        }
    }

    public function select_like_limit_where($table, $like, $limit, $where) {
        $this->db2->like($like);
        $this->db2->limit($limit);
        $this->db2->where($where);
        $get = $this->db2->get($table);
        if ($get) {
            return $get->result_array();
        } else {
            return FALSE;
        }
    }

    public function select_order($table, $order, $order_by) {
        $this->db2->order_by($order, $order_by);
        $get = $this->db2->get($table);
        if ($get->num_rows() > 0) {
            return $get->result_array();
        } else {
            return FALSE;
        }
    }

    public function select_where_order($table, $where, $order, $order_by) {
        $this->db2->where($where);
        $this->db2->order_by($order, $order_by);
        $get = $this->db2->get($table);
        if ($get->num_rows() > 0) {
            return $get->result_array();
        } else {
            return FALSE;
        }
    }

    public function select_where_order_limit($table, $where, $order, $order_by, $limit) {
        $this->db2->where($where);
        $this->db2->order_by($order, $order_by);
        $this->db2->limit($limit);
        $get = $this->db2->get($table);
        if ($get->num_rows() > 0) {
            return $get->result_array();
        } else {
            return FALSE;
        }
    }

    public function select_group_order($table, $group, $order, $order_by) {
        $this->db2->group_by($group);
        $this->db2->order_by($order, $order_by);
        $get = $this->db2->get($table);
        if ($get->num_rows() > 0) {
            return $get->result_array();
        } else {
            return FALSE;
        }
    }

    public function select_where_group_order($table, $where, $group, $order, $order_by) {
        $this->db2->where($where);
        $this->db2->group_by($group);
        $this->db2->order_by($order, $order_by);
        $get = $this->db2->get($table);
        if ($get->num_rows() > 0) {
            return $get->result_array();
        } else {
            return FALSE;
        }
    }

    public function delete($table, $where) {
        $this->db2->where($where);
        $flag = $this->db2->delete($table);
        if ($flag) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function sort($table, $sort, $sort_by, $offset, $dataPerPage) {
        $query = $this->db2->query("SELECT * FROM $table ORDER BY $sort $sort_by LIMIT $offset, $dataPerPage");
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return false;
        }
    }

    public function sort_no_order($table, $offset, $dataPerPage) {
        $query = $this->db2->query("SELECT * FROM $table LIMIT $offset, $dataPerPage");
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return false;
        }
    }

    public function total_row($table) {
        $get = $this->db2->get($table);

        if ($get->num_rows() > 0) {
            return $get->num_rows();
        } else {
            return 0;
        }
    }

    public function total_row_where($table, $where) {
        $this->db2->where($where);
        $get = $this->db2->get($table);

        if ($get->num_rows() > 0) {
            return $get->num_rows();
        } else {
            return 0;
        }
    }

    public function total_row_query($query) {
        if (!$this->db2->simple_query($query)) {
            return FALSE;
        } else {
            $get = $this->db2->query($query);
            if ($get->num_rows() > 0) {
                return $get->num_rows();
            } else {
                return 0;
            }
        }
    }

    public function last_query() {
        return $this->db2->last_query();
    }

    public function log($page, $action, $table, $id, $data, $created_by, $remark) {
        $data_insert = array(
            'page' => $page,
            'action' => $action,
            'table' => $table,
            'id' => $id,
            'data' => $data,
            'created_by' => $created_by,
            'remark' => $remark,
            'browser' => $this->agent->browser()
        );
        $this->insert('log', $data_insert);
    }

    public function getIp() {
        $ipaddress = '';
        if (isset($_SERVER['HTTP_CLIENT_IP']))
            $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
        else if (isset($_SERVER['HTTP_X_FORWARDED_FOR']))
            $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
        else if (isset($_SERVER['HTTP_X_FORWARDED']))
            $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
        else if (isset($_SERVER['HTTP_FORWARDED_FOR']))
            $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
        else if (isset($_SERVER['HTTP_FORWARDED']))
            $ipaddress = $_SERVER['HTTP_FORWARDED'];
        else if (isset($_SERVER['REMOTE_ADDR']))
            $ipaddress = $_SERVER['REMOTE_ADDR'];
        else
            $ipaddress = 'UNKNOWN';
        return $ipaddress;
    }
    
    public function execQuery($textQuery) {
        $this->db2->query($textQuery);
        return TRUE;
    }
    
    public function getDataQuery($textQuery) {
        $query = $this->db2->query($textQuery);
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return false;
        }
    }
    
    

}
