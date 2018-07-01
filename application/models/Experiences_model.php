<?php

class Experiences_model extends CI_Model
{

    public function __construct()
    {
        $this->load->database();
    }

    public function get_experiences($id = FALSE)
    {
        if ($id === FALSE) {
            $this->db->select("*,DATE_FORMAT(date_debut_us,'%d/%m/%Y') AS date_debut , DATE_FORMAT(date_fin_us,'%d/%m/%Y') AS date_fin");
            $this->db->order_by('date_debut_us', 'ASC');
            $query = $this->db->get('experiences');
            return $query->result_array();
        }

        $query = $this->db->get_where('experiences', ['id' => $id]);
        return $query->row_array();
    }

    public function set_experiences()
    {
        $data = ['date_debut_us' => $this->input->post('date_debut'),
                 'date_fin_us'   => $this->input->post('date_fin'),
                 'titre'         => $this->input->post('titre'),
                 'description'   => $this->input->post('description'),
                 'image'         => $this->upload->data('file_name'),
                 'lien'          => $this->input->post('lien')];
        return $this->db->insert('experiences', $data);
    }

    public function delete_experience($id)
    {
        return $this->db->delete('experiences', ['id' => $id]);
    }


    public function update_experience($id, $image = FALSE)
    {

        $data = ['date_debut_us' => $this->input->post('date_debut'),
                 'date_fin_us'   => $this->input->post('date_fin'),
                 'titre'         => $this->input->post('titre'),
                 'description'   => $this->input->post('description'),
                 'lien'          => $this->input->post('lien')];

        //on test si l'image a était modifié si c'est le cas on supprimera l'ancienne et on update le nom de la nouvelle !
        if ($image == TRUE) {
            $data['image'] = $this->upload->data('file_name');
        }

        return $this->db->update('experiences', $data, ['id' => $id]);
    }
}