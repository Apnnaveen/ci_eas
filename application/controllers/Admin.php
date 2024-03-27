<?php
defined('BASEPATH') or exit ('No direct script access allowed');

class Admin extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    is_weekends();
    is_logged_in();
    is_checked_in();
    is_checked_out();
    $this->load->library('form_validation');
    $this->load->model('Public_model');
    $this->load->model('Admin_model');
  }

  public function index()
  {
    // Fetch department data
    $dquery = "SELECT department_id AS d_id, COUNT(employee_id) AS qty FROM employee_department GROUP BY d_id";
    $data['d_list'] = $this->db->query($dquery)->result_array();

    // Fetch shift data
    $squery = "SELECT e.shift_id AS s_id, COUNT(e.id) AS qty, s.start, s.end FROM employee e INNER JOIN `shift` s ON e.shift_id = s.id GROUP BY s_id";
    $data['s_list'] = $this->db->query($squery)->result_array();

    // Fetch employee list
    $employee_query = "SELECT id, name FROM employee";
    $data['employee_list'] = $this->db->query($employee_query)->result_array();

    // Fetch leave updates
    $leave_query = "SELECT start_date, end_date, reason,employee_id FROM leaves";
    $data['leave_updates'] = $this->db->query($leave_query)->result_array();
    // echo"<pre>";print_r($data);
    // exit;

    // Load the view with data
    $data['title'] = 'Dashboard';
    $data['account'] = $this->Admin_model->getAdmin($this->session->userdata('username'));
    $data['display'] = $this->Admin_model->getDataForDashboard();

    $this->load->view('templates/dashboard_header', $data);
    $this->load->view('templates/sidebar');
    $this->load->view('templates/topbar');
    $this->load->view('admin/index', $data); // Dashboard Page
    $this->load->view('templates/dashboard_footer');
  }
}
?>