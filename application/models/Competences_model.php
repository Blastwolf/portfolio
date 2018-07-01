<?php

class Competences_model extends CI_Model
{

    public function __construct()
    {
        $this->load->database();
    }

    public function get_competences($id = FALSE)
    {
        if ($id === FALSE) {
            $this->db->order_by('secret-level', 'DESC');
            $query = $this->db->get('competences');
            return $query->result_array();
        }
        $query = $this->db->get_where('competences', ['id' => $id]);
        return $query->row_array();
    }

    public function set_competence()
    {
        $data = ['name'     => $this->input->post('name'),
                 'level'    => $this->input->post('level'),
                 'category' => $this->input->post('category')];

        $data['secret-level'] = $this->set_privateLevel($data['level']);

        return $this->db->insert('competences', $data);
    }

    public function update_competence($id)
    {
        $data = ['name'     => $this->input->post('name'),
                 'level'    => $this->input->post('level'),
                 'category' => $this->input->post('category')];

        $data['secret-level'] = $this->set_privateLevel($data['level']);

        return $this->db->update('competences', $data, ['id' => $id]);
    }

    public function delete_competence($id = FALSE)
    {
        $this->db->where('id', $id);
        $this->db->from('competences');

        if ($this->db->count_all_results() == 0) {
            return;
        } else {
            return $this->db->delete('competences', ['id' => $id]);
        }
    }

    private function set_privateLevel($level)
    {
        switch ($level) {
            case 'debutant':
                return 30;
                break;
            case 'intermediaire':
                return 50;
                break;
            case 'bon':
                return 70;
                break;
            case 'excellent':
                return 100;
                break;
            default :
                return 0;
                break;
        }
    }

}