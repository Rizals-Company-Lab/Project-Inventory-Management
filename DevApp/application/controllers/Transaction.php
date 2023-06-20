<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transaction extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Transaction_model');
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
        $config['total_rows'] = $this->Transaction_model->get_transaction_count($searchINVENTTRANSID, $searchNAME, $searchITEMNAME);
        $config['base_url'] = base_url() . 'transaction/index';
        $config['use_page_numbers'] = true;
        $config['per_page'] = $row_per_page;

        //initialize
        $this->pagination->initialize($config);

        $data['pagination'] = $this->pagination->create_links();

        // Get record
        $data['transaction'] = $this->Transaction_model->get_transaction($row_no, $row_per_page, $searchINVENTTRANSID, $searchNAME, $searchITEMNAME);

        $data['row'] = $row_no;

        $data['searchINVENTTRANSID'] = $searchINVENTTRANSID;
        $data['searchNAME'] = $searchNAME;
        $data['searchITEMNAME'] = $searchITEMNAME;
        $data['totalRow'] = $config['total_rows'];

        $this->load->view('transaction/transaction_view.php', $data);
        // $this->load->view('transaction/transaction_view', $data);
    }

    public function insert_checkout()
    {

        $SKU = $this->input->post('SKU');
        $this->Transaction_model->insert_checkout($SKU);
        $data['product'] = $this->Transaction_model->get_product();
        $data['checkout'] = $this->Transaction_model->get_checkout();
        // var_dump($this->Transaction_model->get_checkout()->result());
        $this->load->view('ajax/CheckoutList.php', $data);
    }

    public function add_new_transaction()
    {
        $data['product'] = $this->Transaction_model->get_product();

        $data['checkout'] = $this->Transaction_model->get_checkout();
        $this->load->view('transaction/entryOrder_view.php', $data);
    }

    public function entryOrder()
    {
        $this->load->view('entryJual.php');
    }

    public function createOrder()
    {
        $this->load->view('entryJual.php');
    }

    public function save_transaction()
    {
        var_dump($this->input->post());
        // $idOrder = $this->Transaction_model->get_new_idOrder();
        $this->Transaction_model->save_transaction($this->input->post());
    }
}