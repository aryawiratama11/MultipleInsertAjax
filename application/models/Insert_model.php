<?php
/**
 * Created by PhpStorm.
 * User: bookeventz
 * Date: 12/14/2016
 * Time: 7:38 PM
 */

class Insert_model extends CI_Model
{
    public function insert_data($data)
    {
        $this->db->insert('student', $data);
    }

    public function view_students()
    {
        $this->db->select("sid,sname");
        $this->db->from('student');
        $query = $this->db->get();
        return $query->result();
    }
}

?>