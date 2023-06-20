<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Product extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Product_model');
    }

    public function index($row_no = 0)
    {
        //search text
        $searchINVENTTRANSID = "";
        $searchNAME = "";
        $searchITEMNAME = "";
        if ($this->input->post('search') != '') {
            $searchINVENTTRANSID = $this->input->post('searchINVENTTRANSID');
            $searchNAME = $this->input->post('searchNAME');
            $searchITEMNAME = $this->input->post('searchITEMNAME');
            $this->session->set_userdata("searchINVENTTRANSID", $searchINVENTTRANSID);
            $this->session->set_userdata("searchNAME", $searchNAME);
            $this->session->set_userdata("searchITEMNAME", $searchITEMNAME);
        } else {
            if ($this->session->userdata('searchINVENTTRANSID') != "") {
                $searchINVENTTRANSID = $this->session->userdata('searchINVENTTRANSID');
            }
            if ($this->session->userdata('searchNAME') != "") {
                $searchNAME = $this->session->userdata('searchNAME');
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
        $config['total_rows'] = $this->Product_model->get_purcase_count($searchINVENTTRANSID, $searchNAME, $searchITEMNAME);
        $config['base_url'] = base_url() . 'purcase/index';
        $config['use_page_numbers'] = true;
        $config['per_page'] = $row_per_page;

        //initialize
        $this->pagination->initialize($config);

        $data['pagination'] = $this->pagination->create_links();

        // Get record
        $data['product'] = $this->Product_model->get_product($row_no, $row_per_page, $searchINVENTTRANSID, $searchNAME, $searchITEMNAME);

        $data['row'] = $row_no;

        $data['searchINVENTTRANSID'] = $searchINVENTTRANSID;
        $data['searchNAME'] = $searchNAME;
        $data['searchITEMNAME'] = $searchITEMNAME;
        $data['totalRow'] = $config['total_rows'];



        $this->load->view('product/product_view.php', $data);
        // $this->load->view('purcase/purcase_view', $data);
    }

}