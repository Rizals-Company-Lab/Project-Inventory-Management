<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Product extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Product_model');
        if(!$this->session->userdata('login_id')) {
            redirect('Auth/login');
        }
    }

    public function index($row_no = 0) {
        $testVar = "";
        //search text
        $searchSKU = "";
        $searchProduct = "";
        $searchITEMNAME = "";
        // var_dump($this->input->post());
        if($this->input->post('search') != '') {
            $searchSKU = $this->input->post('searchSKU');
            $searchProduct = $this->input->post('searchProduct');
            $searchITEMNAME = $this->input->post('searchITEMNAME');
            $this->session->set_userdata("searchSKU", $searchSKU);
            $this->session->set_userdata("searchProduct", $searchProduct);
            $this->session->set_userdata("searchITEMNAME", $searchITEMNAME);
        } else {
            if($this->session->userdata('searchSKU') != "") {
                $searchSKU = $this->session->userdata('searchSKU');
            }
            if($this->session->userdata('searchProduct') != "") {
                $searchProduct = $this->session->userdata('searchProduct');
            }
            if($this->session->userdata('searchITEMNAME') != "") {
                $searchITEMNAME = $this->session->userdata('searchITEMNAME');
            }
        }

        //--pagination--
        $row_per_page = 5;

        if($row_no != 0) {
            $row_no = ($row_no - 1) * $row_per_page;
        }

        // Pagination Configuration
        // All record count
        $config['total_rows'] = $this->Product_model->get_product_count($searchSKU, $searchProduct, $searchITEMNAME);
        $config['base_url'] = base_url().'product/index';
        $config['use_page_numbers'] = true;
        $config['per_page'] = $row_per_page;

        //initialize
        $this->pagination->initialize($config);

        $data['pagination'] = $this->pagination->create_links();

        // Get record
        $data['product'] = $this->Product_model->get_stock_product_limit($row_no, $row_per_page, $searchSKU, $searchProduct, $searchITEMNAME);

        $data['row'] = $row_no;

        $data['searchSKU'] = $searchSKU;
        $data['searchProduct'] = $searchProduct;
        $data['searchITEMNAME'] = $searchITEMNAME;
        $data['totalRow'] = $config['total_rows'];

        if($this->session->userdata('login_id') == 'admin') {

            $this->load->view('nav/navbar.php');
        } else {
            $this->load->view('nav/navbar_kasir.php');

        }
        $this->load->view('product/product_view.php', $data);
        // $this->load->view('purcase/purcase_view', $data);
    }


    public function add_product() {
        // $data['product'] = $this->Product_model->get_product();
        if($this->session->userdata('login_id') == 'admin') {

            $this->load->view('nav/navbar.php');
        } else {
            $this->load->view('nav/navbar_kasir.php');

        }
        $this->load->view('product/add_product_view.php');
    }

    public function save_product() {
        // var_dump($this->input->post());

        $SKU = $this->input->post('SKU');
        $productName = $this->input->post('productName');
        $productDescription = $this->input->post('productDescription');
        $sellingPrice = $this->input->post('sellingPrice');
        $distributorPrice = $this->input->post('distributorPrice');
        $materialPrice = $this->input->post('materialPrice');
        $productionPrice = $this->input->post('productionPrice');
        $this->Product_model->save_product($SKU, $productName, $productDescription, $sellingPrice, $distributorPrice, $materialPrice, $productionPrice);

        // $data['product'] = $this->Product_model->get_product();
        // $this->load->view('purcase/add_purcasing_view.php', $data);

        redirect('Product');
    }

    public function get_update() {
        // var_dump($this->input->post());

        $SKU = $this->input->post('SKU');
        $data['product'] = $this->Product_model->get_product_ByID($SKU);
        if($this->session->userdata('login_id') == 'admin') {

            $this->load->view('nav/navbar.php');
        } else {
            $this->load->view('nav/navbar_kasir.php');

        }
        $this->load->view('product/update_product_view.php', $data);
    }



    public function update_product() {
        // var_dump($this->input->post());

        $SKU = $this->input->post('SKU');
        $productName = $this->input->post('productName');
        $productDescription = $this->input->post('productDescription');
        $sellingPrice = $this->input->post('sellingPrice');
        $distributorPrice = $this->input->post('distributorPrice');
        $materialPrice = $this->input->post('materialPrice');
        $productionPrice = $this->input->post('productionPrice');
        $this->Product_model->update_product($SKU, $productName, $productDescription, $sellingPrice, $distributorPrice, $materialPrice, $productionPrice);

        // $data['product'] = $this->Product_model->get_product();
        // $this->load->view('purcase/add_purcasing_view.php', $data);

        redirect('Product');
    }


    public function delete_product() {
        // var_dump($this->input->post());
        // die;
        $SKU = $this->input->post('SKU');
        $this->Product_model->delete_product($SKU);

        // $data['product'] = $this->Product_model->get_product();
        // $this->load->view('purcase/add_purcasing_view.php', $data);

        redirect('Product');


    }
}