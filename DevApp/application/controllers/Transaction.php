<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transaction extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Transaction_model');
        if (!$this->session->userdata('login_id')) {
            redirect('Auth/login');
        }
    }

    public function index($row_no = 0)
    {
        //search text
        $searchBuyer = "";
        $searchDate = "";
        $searchStatus = "";
        // var_dump($this->input->post());
        if ($this->input->post('search') != '') {
            $searchBuyer = $this->input->post('searchBuyer');
            $searchDate = $this->input->post('searchDate');
            $searchStatus = $this->input->post('searchStatus');
            $this->session->set_userdata("searchBuyer", $searchBuyer);
            $this->session->set_userdata("searchDate", $searchDate);
            $this->session->set_userdata("searchStatus", $searchStatus);
        } else {
            if ($this->session->userdata('searchBuyer') != "") {
                $searchBuyer = $this->session->userdata('searchBuyer');
            }
            if ($this->session->userdata('searchDate') != "") {
                $searchDate = $this->session->userdata('searchDate');
            }
            if ($this->session->userdata('searchStatus') != "") {
                $searchStatus = $this->session->userdata('searchStatus');
            }
        }

        //--pagination--
        $row_per_page = 5;

        if ($row_no != 0) {
            $row_no = ($row_no - 1) * $row_per_page;
        }
        // Pagination Configuration
        // All record count
        $config['total_rows'] = $this->Transaction_model->get_transaction_count($searchBuyer, $searchDate, $searchStatus);
        $config['base_url'] = base_url() . 'transaction/index';
        $config['use_page_numbers'] = true;
        $config['per_page'] = $row_per_page;

        //initialize
        $this->pagination->initialize($config);

        $data['pagination'] = $this->pagination->create_links();

        // Get record
        $data['transaction'] = $this->Transaction_model->get_transaction($row_no, $row_per_page, $searchBuyer, $searchDate, $searchStatus);

        $data['row'] = $row_no;

        $data['searchBuyer'] = $searchBuyer;
        $data['searchDate'] = $searchDate;
        $data['searchStatus'] = $searchStatus;
        $data['totalRow'] = $config['total_rows'];
        if ($this->session->userdata('login_id') == 'admin') {

            $this->load->view('nav/navbar.php');
        } else {
            $this->load->view('nav/navbar_kasir.php');

        }
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

    public function delete_checkout()
    {

        $SKU = $this->input->post('SKU');

        $this->Transaction_model->delete_checkout($SKU);
        $data['product'] = $this->Transaction_model->get_product();
        $data['checkout'] = $this->Transaction_model->get_checkout();
        // var_dump($this->Transaction_model->get_checkout()->result());
        $this->load->view('ajax/CheckoutList.php', $data);
    }

    public function delete_order()
    {

        $idOrder = $this->input->post('idOrder');

        $this->Transaction_model->delete_order($idOrder);
        redirect('Transaction');
    }

    public function add_new_transaction()
    {
        $data['product'] = $this->Transaction_model->get_product();

        $data['checkout'] = $this->Transaction_model->get_checkout();
        if ($this->session->userdata('login_id') == 'admin') {

            $this->load->view('nav/navbar.php');
        } else {
            $this->load->view('nav/navbar_kasir.php');

        }
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
        // var_dump($this->input->post());
        // $idOrder = $this->Transaction_model->get_new_idOrder();
        $this->Transaction_model->save_transaction($this->input->post(), 'sellingPrice');

        redirect('Transaction');
    }

    public function order_detail()
    {
        // var_dump($this->input->post('idOrder'));
        $idOrder = $this->input->post('idOrder');
        $data['detailOrder'] = $this->Transaction_model->get_order_detail($idOrder)->result();
        if ($this->session->userdata('login_id') == 'admin') {

            $this->load->view('nav/navbar.php');
        } else {
            $this->load->view('nav/navbar_kasir.php');

        }
        $this->load->view('transaction/detail_transaction_view.php', $data);
    }

    public function get_update()
    {
        // var_dump($this->input->post('idOrder'));
        $idOrder = $this->input->post('idOrder');

        $data['detailOrder'] = $this->Transaction_model->get_order_detail($idOrder)->result();
        if ($this->session->userdata('login_id') == 'admin') {

            $this->load->view('nav/navbar.php');
        } else {
            $this->load->view('nav/navbar_kasir.php');

        }
        $this->load->view('transaction/update_transaction_view.php', $data);
    }

    public function update_order()
    {
        // var_dump($this->input->post());

        $idOrder = $this->input->post('idOrder');
        $buyerName = $this->input->post('buyerName');
        $bankAccountNumber = $this->input->post('bankAccountNumber');
        $paymentStatus = $this->input->post('paymentStatus');
        $this->Transaction_model->update_order($idOrder, $buyerName, $bankAccountNumber, $paymentStatus);

        // $data['product'] = $this->Product_model->get_product();
        // $this->load->view('purcase/add_purcasing_view.php', $data);

        redirect('Transaction');
    }
}