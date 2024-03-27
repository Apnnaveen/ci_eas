<?php
// Leave_model.php (models/Leave_model.php)

defined('BASEPATH') or exit ('No direct script access allowed');

class Leave_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        // Load database library if not autoloaded
        // $this->load->database();
    }
    // public function index()
    // {
  

    // // Fetch data from model
    // $f_list['f_list'] = $this->your_model->get_data(); // Assuming you have a method like get_data() to fetch the data
    
    // // Load view
    // $this->load->view('admin/index', $f_list);
    // }

    public function saveLeave($leave_data)
    {
        // Insert leave data into the database
        $this->db->insert('leaves', $leave_data);

        // Check if the leave application is successfully inserted
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    
}
