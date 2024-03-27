<?php
// LeaveController.php

defined('BASEPATH') or exit ('No direct script access allowed');

class LeaveController extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        // Load any necessary models or helpers here if needed
    }

    public function applyLeave()
    {
        $employeeId = $this->input->post('employeeId');
        $employee_name = $this->input->post('employeeName');

        // print_r($employee_name);
        // exit;


        // Check if the form is submitted
        if ($this->input->post()) {
            // Assuming you have a model named Leave_model to handle database operations
            $this->load->model('Leave_model');

            // Get form data
            $start_date = $this->input->post('start_date');
            $end_date = $this->input->post('end_date');
            $reason = $this->input->post('reason');

            // Example: Saving leave application to database
            $leave_data = array(
                'employee_id' => $employeeId,
                'name' => $employee_name,
                'start_date' => $start_date,
                'end_date' => $end_date,
                'reason' => $reason
            );
            // print_r($leave_data);
            // exit;


            // Call model function to save leave data
            $result = $this->Leave_model->saveLeave($leave_data);

            if ($result) {
                // Leave application successfully saved
                // You can redirect to a success page or do any other action
                $this->session->set_flashdata('success', 'Leave applied successfully.');
                redirect('profile/index');
               
            } else {
                // Failed to save leave application
                // You can redirect back to the form with an error message or do any other action
                redirect('', 'refresh');
            }
        } else {
            // If form is not submitted, redirect to leave application form
            redirect('');
        }
    }
}
