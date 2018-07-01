<?php

class Connect_model extends CI_Model
{

    public function __construct()
    {
        $this->load->database();
    }

    public function connect($username)
    {
        $query = $this->db->get_where('administration', ['username' => $username]);

        return $query->row_array();

    }
}