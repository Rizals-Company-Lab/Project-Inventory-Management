<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Purcase extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Purcase_model');
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
        $searchSKU = "";
        $searchProduct = "";
        $searchDate = "";
        if ($this->input->post('search') != '') {
            $searchSKU = $this->input->post('searchSKU');
            $searchProduct = $this->input->post('searchProduct');
            $searchDate = $this->input->post('searchDate');
            $this->session->set_userdata("searchSKU", $searchSKU);
            $this->session->set_userdata("searchProduct", $searchProduct);
            $this->session->set_userdata("searchDate", $searchDate);
        } else {
            if ($this->session->userdata('searchSKU') != "") {
                $searchSKU = $this->session->userdata('searchSKU');
            }
            if ($this->session->userdata('searchProduct') != "") {
                $searchProduct = $this->session->userdata('searchProduct');
            }
            if ($this->session->userdata('searchDate') != "") {
                $searchDate = $this->session->userdata('searchDate');
            }
        }

        //--pagination--
        $row_per_page = 5;

        if ($row_no != 0) {
            $row_no = ($row_no - 1) * $row_per_page;
        }

        // Pagination Configuration
        // All record count
        $config['total_rows'] = $this->Purcase_model->get_purcase_count($searchSKU, $searchProduct, $searchDate);
        $config['base_url'] = base_url() . 'purcase/index';
        $config['use_page_numbers'] = true;
        $config['per_page'] = $row_per_page;

        //initialize
        $this->pagination->initialize($config);

        $data['pagination'] = $this->pagination->create_links();

        // Get record
        $data['purcase'] = $this->Purcase_model->get_purcase($row_no, $row_per_page, $searchSKU, $searchProduct, $searchDate);

        $data['row'] = $row_no;

        $data['searchSKU'] = $searchSKU;
        $data['searchProduct'] = $searchProduct;
        $data['searchDate'] = $searchDate;
        $data['totalRow'] = $config['total_rows'];
        if ($this->session->userdata('login_id') == 'admin') {

            $this->load->view('nav/navbar.php');
            $this->load->view('purcase/purcasing_view.php', $data);
        } else {
            $this->load->view('nav/navbar_kasir.php');
            $this->load->view('purcase/purcasing_view_kasir.php', $data);

        }
        // $this->load->view('purcase/purcase_view', $data);
    }

    public function insertDataPesan()
    {
        $this->load->view('entryJual.php');
    }

    public function createOrder()
    {
        $this->load->view('entryJual.php');
    }

    public function add_purcase()
    {
        $data['product'] = $this->Product_model->get_product();
        if ($this->session->userdata('login_id') == 'admin') {

            $this->load->view('nav/navbar.php');
        } else {
            $this->load->view('nav/navbar_kasir.php');

        }
        $this->load->view('purcase/add_purcasing_view.php', $data);
    }

    public function get_update()
    {
        $idPurcase = $this->input->post('idPurcase');
        $data['product'] = $this->Product_model->get_product();
        $data['purcase'] = $this->Purcase_model->get_purcase_by_id($idPurcase);

        if ($this->session->userdata('login_id') == 'admin') {

            $this->load->view('nav/navbar.php');
        } else {
            $this->load->view('nav/navbar_kasir.php');

        }
        $this->load->view('purcase/update_purcasing_view.php', $data);
    }

    public function update_purcase()
    {
        // var_dump($this->input->post());

        $idPurcase = $this->input->post('idPurcase');
        $SKU = $this->input->post('SKU');
        $buyingPrice = $this->input->post('buyingPrice');
        $qtyPurcase = $this->input->post('qtyPurcase');
        $priceAmount = $buyingPrice * $qtyPurcase;
        $purcaseTimestamp = $this->input->post('purcaseTimestamp');
        $this->Purcase_model->update_purcase($idPurcase, $SKU, $buyingPrice, $qtyPurcase, $priceAmount, $purcaseTimestamp);

        // $data['product'] = $this->Product_model->get_product();
        // $this->load->view('purcase/add_purcasing_view.php', $data);

        redirect('Purcase');
    }

    public function save_purcase()
    {
        // var_dump($this->input->post());

        $currentDateTime = date("Y-m-d H:i:s");

        $SKU = $this->input->post('SKU');
        $buyingPrice = $this->input->post('buyingPrice');
        $qtyPurcase = $this->input->post('qtyPurcase');
        $priceAmount = $buyingPrice * $qtyPurcase;
        // $purcaseTimestamp = $this->input->post('purcaseTimestamp');
        $purcaseTimestamp = NULL;
        $this->Purcase_model->save_purcase($SKU, $buyingPrice, $qtyPurcase, $priceAmount, $purcaseTimestamp);

        // $data['product'] = $this->Product_model->get_product();
        // $this->load->view('purcase/add_purcasing_view.php', $data);

        redirect('Purcase');
    }




}