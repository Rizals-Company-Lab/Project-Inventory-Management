<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Report extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Report_model');
        $this->load->model('Product_model');
        

    }

    public function index($row_no = 0) {
        //search text
        if(!$this->session->userdata('login_id')) {
            redirect('Auth/login');
        } else {
            if($this->session->userdata('login_id') != 'admin') {
                redirect('Home');
            }
        }
        $dateStart = "";
        $dateEnd = "";
        $searchITEMNAME = "";
        if($this->input->post('search') != '') {
            $dateStart = $this->input->post('dateStart');
            $dateEnd = $this->input->post('dateEnd');
            $searchITEMNAME = $this->input->post('searchITEMNAME');
            $this->session->set_userdata("dateStart", $dateStart);
            $this->session->set_userdata("dateEnd", $dateEnd);
            $this->session->set_userdata("searchITEMNAME", $searchITEMNAME);
        } else {
            if($this->session->userdata('dateStart') != "") {
                $dateStart = $this->session->userdata('dateStart');
            }
            if($this->session->userdata('dateEnd') != "") {
                $dateEnd = $this->session->userdata('dateEnd');
            }
            if($this->session->userdata('searchITEMNAME') != "") {
                $searchITEMNAME = $this->session->userdata('searchITEMNAME');
            }
        }
        $datetimeStart = $dateStart . " 00:00:00";
        $datetimeEnd = $dateEnd . " 23:59:59";
        //--pagination--
        $row_per_page = 5;

        if($row_no != 0) {
            $row_no = ($row_no - 1) * $row_per_page;
        }

        // Pagination Configuration
        // All record count
        $config['total_rows'] = $this->Report_model->get_report_count_byProduct($datetimeStart, $datetimeEnd, $searchITEMNAME);
        $config['base_url'] = base_url().'report/index';
        $config['use_page_numbers'] = true;
        $config['per_page'] = $row_per_page;

        //initialize
        $this->pagination->initialize($config);

        $data['pagination'] = $this->pagination->create_links();

        // Get record
        $data['report'] = $this->Report_model->get_report_byProduct($row_no, $row_per_page, $datetimeStart, $datetimeEnd, $searchITEMNAME);
        $data['grandTotal'] = $this->Report_model->get_report();

        $data['row'] = $row_no;

        $data['dateStart'] = $dateStart;
        $data['dateEnd'] = $dateEnd;
        $data['searchITEMNAME'] = $searchITEMNAME;
        $data['totalRow'] = $config['total_rows'];
        $data['totalSpending'] = $this->Report_model->get_total_spending();
        $data['totalProfit'] = $this->Report_model->get_total_profit();

// var_dump($data['totalProfit']);

        // var_dump($this->Report_model->get_report());

        $this->load->view('report/report_view.php', $data);
        // $this->load->view('report/report_view', $data);
    }

    public function details($row_no = 0) {
        if(!$this->session->userdata('login_id')) {
            redirect('Auth/login');
        } else {
            if($this->session->userdata('login_id') != 'admin') {
                redirect('Home');
            }
        }
        //search text
        $dateStart = "";
        $dateEnd = "";
        
        $searchITEMNAME = "";
        if($this->input->post('search') != '') {
            $dateStart = $this->input->post('dateStart');
            $dateEnd = $this->input->post('dateEnd');
            $searchITEMNAME = $this->input->post('searchITEMNAME');
            $this->session->set_userdata("dateStart", $dateStart);
            $this->session->set_userdata("dateEnd", $dateEnd);
            $this->session->set_userdata("searchITEMNAME", $searchITEMNAME);
        } else {
            if($this->session->userdata('dateStart') != "") {
                $dateStart = $this->session->userdata('dateStart');
            }
            if($this->session->userdata('dateEnd') != "") {
                $dateEnd = $this->session->userdata('dateEnd');
            }
            if($this->session->userdata('searchITEMNAME') != "") {
                $searchITEMNAME = $this->session->userdata('searchITEMNAME');
            }
        }
        $datetimeStart = $dateStart . " 00:00:00";
        $datetimeEnd = $dateEnd . " 23:59:59";
        
        //--pagination--
        $row_per_page = 5;

        if($row_no != 0) {
            $row_no = ($row_no - 1) * $row_per_page;
        }

        // Pagination Configuration
        // All record count
        $config['total_rows'] = $this->Report_model->get_report_count_details_byProduct($datetimeStart, $datetimeEnd, $searchITEMNAME);
        $config['base_url'] = base_url().'report/details';
        $config['use_page_numbers'] = true;
        $config['per_page'] = $row_per_page;

        //initialize
        $this->pagination->initialize($config);

        $data['pagination'] = $this->pagination->create_links();

        // Get record
        $data['reportDetailProduct'] = $this->Report_model->get_report_details_byProduct($row_no, $row_per_page, $datetimeStart, $datetimeEnd, $searchITEMNAME);
        $data['grandTotalPurcase'] = $this->Report_model->get_purcasing_details($datetimeStart, $datetimeEnd, $searchITEMNAME)->result()[0];
        $data['grandTotalOrder'] = $this->Report_model->get_order_details($datetimeStart, $datetimeEnd, $searchITEMNAME)->result()[0];
        $data['grandTotalSpending'] = $this->Report_model->get_spending_details($datetimeStart, $datetimeEnd)->result()[0];
        $data['spending'] = $this->Report_model->get_spending_filter($datetimeStart, $datetimeEnd)->result();

        $data['totalSpending'] = $this->Report_model->get_total_spending_filter($datetimeStart, $datetimeEnd);
        $data['totalProfit'] = $this->Report_model->get_total_profit_filter($datetimeStart, $datetimeEnd);

        $data['row'] = $row_no;

        $data['dateStart'] = $dateStart;
        $data['dateEnd'] = $dateEnd;
        $data['searchITEMNAME'] = $searchITEMNAME;
        $data['totalRow'] = $config['total_rows'];

        // var_dump($data['totalProfit']);
        // var_dump($data['totalSpending']);
        // var_dump($this->Report_model->get_report_details_byProduct($dateStart, $dateEnd, $searchITEMNAME)->result());


        // var_dump($this->Report_model->get_report_count_details_byProduct($dateStart, $dateEnd, $searchITEMNAME));
        // var_dump($this->Report_model->get_purcasing_details($dateStart, $dateEnd, $searchITEMNAME)->result());
        // var_dump($this->Report_model->get_order_details($dateStart, $dateEnd, $searchITEMNAME)->result());

        $this->load->view('report/report_detail_view.php', $data);
        // $this->load->view('report/report_view', $data);
    }

    public function spending() {
        //search text
        $dateStart = date("Y-m-d");
        $dateEnd = date("Y-m-d");
       
        $dateStart = $dateStart . " 00:00:00";
        $dateEnd = $dateEnd . " 23:59:59";
        // $data['spending'] = $this->Report_model->get_spending_filter($dateStart, $dateEnd)->result();
        // $data['spending_plain'] = $this->Report_model->get_spending_plain($dateStart, $dateEnd)->result();
        $data['spending_plain'] = $this->Report_model->get_spending_plain($dateStart, $dateEnd);
// var_dump($data['spending_plain']);


        // var_dump($this->Report_model->get_report_details_byProduct($dateStart, $dateEnd, $searchITEMNAME)->result());


        // var_dump($this->Report_model->get_report_count_details_byProduct($dateStart, $dateEnd, $searchITEMNAME));
        // var_dump($this->Report_model->get_purcasing_details($dateStart, $dateEnd, $searchITEMNAME)->result());
        // var_dump($this->Report_model->get_order_details($dateStart, $dateEnd, $searchITEMNAME)->result());

        // var_dump( $data['spending']);
        // $this->load->view('report/report_detail_view.php', $data);
        $this->load->view('report/report_spending', $data);
    }
    
    
    public function delete_spending() {
        $idSpending = $this->input->post('idSpending');
        // var_dump($idSpending);
        // die;
        $this->Report_model->delete_spending($idSpending);

        // $data['product'] = $this->Product_model->get_product();
        // $this->load->view('purcase/add_purcasing_view.php', $data);

        // $data['spending_plain'] = $this->Report_model->get_spending_plain($dateStart, $dateEnd)->result();
        redirect('Report/spending');
        
    }

}