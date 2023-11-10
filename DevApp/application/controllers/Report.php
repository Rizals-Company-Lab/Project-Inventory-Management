<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Report extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Report_model');
        $this->load->model('Product_model');
        if (!$this->session->userdata('login_id')) {
            redirect('Auth/login');
        } else {
            if ($this->session->userdata('login_id') != 'admin') {
                redirect('Home');
            }
        }

    }

    public function index($row_no = 0)
    {
        //search text
        $dateStart = "";
        $dateEnd = "";
        $searchITEMNAME = "";
        if ($this->input->post('search') != '') {
            $dateStart = $this->input->post('dateStart');
            $dateEnd = $this->input->post('dateEnd');
            $searchITEMNAME = $this->input->post('searchITEMNAME');
            $this->session->set_userdata("dateStart", $dateStart);
            $this->session->set_userdata("dateEnd", $dateEnd);
            $this->session->set_userdata("searchITEMNAME", $searchITEMNAME);
        } else {
            if ($this->session->userdata('dateStart') != "") {
                $dateStart = $this->session->userdata('dateStart');
            }
            if ($this->session->userdata('dateEnd') != "") {
                $dateEnd = $this->session->userdata('dateEnd');
            }
            if ($this->session->userdata('searchITEMNAME') != "") {
                $searchITEMNAME = $this->session->userdata('searchITEMNAME');
            }
        }

        //--pagination--
        $row_per_page = 5;

        if ($row_no != 0) {
            $row_no = ($row_no - 1) * $row_per_page;
        }

        // Pagination Configuration
        // All record count
        $config['total_rows'] = $this->Report_model->get_report_count_byProduct($dateStart, $dateEnd, $searchITEMNAME);
        $config['base_url'] = base_url() . 'report/index';
        $config['use_page_numbers'] = true;
        $config['per_page'] = $row_per_page;

        //initialize
        $this->pagination->initialize($config);

        $data['pagination'] = $this->pagination->create_links();

        // Get record
        $data['report'] = $this->Report_model->get_report_byProduct($row_no, $row_per_page, $dateStart, $dateEnd, $searchITEMNAME);
        $data['grandTotal'] = $this->Report_model->get_report();

        $data['row'] = $row_no;

        $data['dateStart'] = $dateStart;
        $data['dateEnd'] = $dateEnd;
        $data['searchITEMNAME'] = $searchITEMNAME;
        $data['totalRow'] = $config['total_rows'];


        // var_dump($this->Report_model->get_report());

        $this->load->view('report/report_view.php', $data);
        // $this->load->view('report/report_view', $data);
    }

    public function details($row_no = 0)
    {
        //search text
        $dateStart = "";
        $dateEnd = "";
        $searchITEMNAME = "";
        if ($this->input->post('search') != '') {
            $dateStart = $this->input->post('dateStart');
            $dateEnd = $this->input->post('dateEnd');
            $searchITEMNAME = $this->input->post('searchITEMNAME');
            $this->session->set_userdata("dateStart", $dateStart);
            $this->session->set_userdata("dateEnd", $dateEnd);
            $this->session->set_userdata("searchITEMNAME", $searchITEMNAME);
        } else {
            if ($this->session->userdata('dateStart') != "") {
                $dateStart = $this->session->userdata('dateStart');
            }
            if ($this->session->userdata('dateEnd') != "") {
                $dateEnd = $this->session->userdata('dateEnd');
            }
            if ($this->session->userdata('searchITEMNAME') != "") {
                $searchITEMNAME = $this->session->userdata('searchITEMNAME');
            }
        }

        //--pagination--
        $row_per_page = 5;

        if ($row_no != 0) {
            $row_no = ($row_no - 1) * $row_per_page;
        }

        // Pagination Configuration
        // All record count
        $config['total_rows'] = $this->Report_model->get_report_count_details_byProduct($dateStart, $dateEnd, $searchITEMNAME);
        $config['base_url'] = base_url() . 'report/details';
        $config['use_page_numbers'] = true;
        $config['per_page'] = $row_per_page;

        //initialize
        $this->pagination->initialize($config);

        $data['pagination'] = $this->pagination->create_links();

        // Get record
        $data['reportDetailProduct'] = $this->Report_model->get_report_details_byProduct($row_no, $row_per_page, $dateStart, $dateEnd, $searchITEMNAME);
        $data['grandTotalPurcase'] = $this->Report_model->get_purcasing_details($dateStart, $dateEnd, $searchITEMNAME)->result()[0];
        $data['grandTotalOrder'] = $this->Report_model->get_order_details($dateStart, $dateEnd, $searchITEMNAME)->result()[0];

        $data['row'] = $row_no;

        $data['dateStart'] = $dateStart;
        $data['dateEnd'] = $dateEnd;
        $data['searchITEMNAME'] = $searchITEMNAME;
        $data['totalRow'] = $config['total_rows'];


        // var_dump($this->Report_model->get_report_details_byProduct($dateStart, $dateEnd, $searchITEMNAME)->result());


        // var_dump($this->Report_model->get_report_count_details_byProduct($dateStart, $dateEnd, $searchITEMNAME));
        // var_dump($this->Report_model->get_purcasing_details($dateStart, $dateEnd, $searchITEMNAME)->result());
        // var_dump($this->Report_model->get_order_details($dateStart, $dateEnd, $searchITEMNAME)->result());

        $this->load->view('report/report_detail_view.php', $data);
        // $this->load->view('report/report_view', $data);
    }

}