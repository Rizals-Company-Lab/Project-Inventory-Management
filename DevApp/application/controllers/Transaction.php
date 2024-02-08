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
        $searchIdOrder = "";
        $searchBuyer = "";
        $searchDate = "";
        $searchStatus = "";
        // var_dump($this->input->post());
        if ($this->input->post('search') != '') {
            $searchIdOrder = $this->input->post('searchIdOrder');
            $searchBuyer = $this->input->post('searchBuyer');
            $searchDate = $this->input->post('searchDate');
            $searchStatus = $this->input->post('searchStatus');
            $this->session->set_userdata("searchIdOrder", $searchIdOrder);
            $this->session->set_userdata("searchBuyer", $searchBuyer);
            $this->session->set_userdata("searchDate", $searchDate);
            $this->session->set_userdata("searchStatus", $searchStatus);
        } else {
            if ($this->session->userdata('searchIdOrder') != "") {
                $searchIdOrder = $this->session->userdata('searchIdOrder');
            }
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

        // var_dump($this->Transaction_model->get_total_spending_today());
        // die;

        // Pagination Configuration

        // All record count
        $config['total_rows'] = $this->Transaction_model->get_transaction_count($searchIdOrder, $searchBuyer, $searchDate, $searchStatus);
        $config['base_url'] = base_url() . 'transaction/index';
        $config['use_page_numbers'] = true;
        $config['per_page'] = $row_per_page;

        //initialize
        $this->pagination->initialize($config);

        $data['pagination'] = $this->pagination->create_links();

        // Get record
        $data['transaction'] = $this->Transaction_model->get_transaction($row_no, $row_per_page, $searchIdOrder, $searchBuyer, $searchDate, $searchStatus);

        $data['row'] = $row_no;



        $data['searchIdOrder'] = $searchIdOrder;
        $data['searchBuyer'] = $searchBuyer;
        $data['searchDate'] = $searchDate;
        $data['searchStatus'] = $searchStatus;
        $data['totalRow'] = $config['total_rows'];
        $data['spendingCategory'] = $this->Transaction_model->get_spending_category()->result();

        $totalTransaction = $this->Transaction_model->get_total_transaction_today();
        $totalProfit = $this->Transaction_model->get_total_profit_today();
        $totalSpending = $this->Transaction_model->get_total_spending_today();

        // var_dump($this->Transaction_model->get_total_transaction_today());

        $data['transactionToday'] = $totalTransaction;
        $data['spendingToday'] = $totalSpending;
        $data['get_total_profit_today'] = $totalProfit;
        $data['get_total_final_profit_today'] = $totalProfit - $totalSpending;

        if ($this->session->userdata('login_id') == 'admin') {

            $data['admin'] = true;
            $this->load->view('nav/navbar.php');
        } else {
            $data['admin'] = false;
            $this->load->view('nav/navbar_kasir.php');

        }
        $this->load->view('transaction/transaction_view.php', $data);
        // $this->load->view('transaction/transaction_view', $data);
    }

    public function add_spending()
    {

        $idCategory = $this->input->post('idCategory');
        $totalSpending = $this->input->post('totalSpending');
        $this->Transaction_model->add_spending($idCategory, $totalSpending);

        // var_dump($this->Transaction_model->get_checkout()->result());
        redirect('Transaction');
    }

    public function insert_checkout()
    {

        $SKU = $this->input->post('SKU');
        $this->Transaction_model->insert_checkout($SKU);
        $data['product'] = $this->Transaction_model->get_product();
        $data['checkout'] = $this->Transaction_model->get_checkout();
        // var_dump($this->Transaction_model->get_checkout()->result());
        $this->load->view('ajax/checkoutList.php', $data);
    }

    public function insert_checkout_SKU($SKU)
    {
        $this->Transaction_model->insert_checkout($SKU);
    }


    public function delete_checkout()
    {

        $SKU = $this->input->post('SKU');

        $this->Transaction_model->delete_checkout($SKU);
        $data['product'] = $this->Transaction_model->get_product();
        $data['checkout'] = $this->Transaction_model->get_checkout();
        // var_dump($this->Transaction_model->get_checkout()->result());
        $this->load->view('ajax/checkoutList.php', $data);
    }

    public function delete_order()
    {

        $idOrder = $this->input->post('idOrder');

        $this->Transaction_model->delete_order($idOrder);
        redirect('Transaction');
    }

    public function add_new_transaction()
    {


        $data['buyerNameTransaction'] = $this->session->flashdata('buyerName');
        $data['buyerAddressTransaction'] = $this->session->flashdata('buyerAddress');
        $data['buyerPhoneTransaction'] = $this->session->flashdata('buyerPhone');
        $data['bankAccountNumberTransaction'] = $this->session->flashdata('bankAccountNumber');
        $data['ongkirTransaction'] = $this->session->flashdata('ongkir');

        $data['product'] = $this->Transaction_model->get_product();

        $data['checkout'] = $this->Transaction_model->get_checkout();
        if ($this->session->userdata('login_id') == 'admin') {

            $data['admin'] = true;
            $this->load->view('nav/navbar.php');
        } else {
            $data['admin'] = false;
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
    public function check_order_product()
    {
        // var_dump($this->input->post());
        // $idOrder = $this->Transaction_model->get_new_idOrder();
        if ($this->Transaction_model->check_order_product()) {
            echo "sudah";
        } else {
            echo 'belum';
        }


    }


    public function save_transaction()
    {
        // var_dump($this->input->post());
        // $idOrder = $this->Transaction_model->get_new_idOrder();

        // var_dump($this->Transaction_model->check_order_product());
        // die;

        if ($this->Transaction_model->check_order_product()) {
            $this->Transaction_model->save_transaction($this->input->post(), 'sellingPrice');
            $this->session->keep_flashdata('idOrder');
            $this->session->keep_flashdata('buyerName');
            $this->session->keep_flashdata('buyerAddress');
            $this->session->keep_flashdata('buyerPhone');
            $this->session->keep_flashdata('bankAccountNumber');
            $this->session->keep_flashdata('ongkir');
            redirect('Transaction_umum');


        } else {
            $idOrder = $this->input->post('idOrder');
            $buyerName = $this->input->post('buyerName');
            $buyerAddress = $this->input->post('buyerAddress');
            $buyerPhone = $this->input->post('buyerPhone');
            $bankAccountNumber = $this->input->post('bankAccountNumber');
            $ongkir = $this->input->post('ongkir');


            $this->session->set_flashdata('idOrder', $idOrder);
            $this->session->set_flashdata('buyerName', $buyerName);
            $this->session->set_flashdata('buyerAddress', $buyerAddress);
            $this->session->set_flashdata('buyerPhone', $buyerPhone);
            $this->session->set_flashdata('bankAccountNumber', $bankAccountNumber);
            $this->session->set_flashdata('ongkir', $ongkir);
            redirect('Transaction_umum/add_new_transaction');
        }

    }

    public function update_transaction()
    {
        // var_dump($this->input->post());
        // $idOrder = $this->Transaction_model->get_new_idOrder();

        // var_dump($this->Transaction_model->check_order_product());
        // die;

        // var_dump($this->input->post());
        $idOrder = $this->input->post('idOrder');
        $buyerName = $this->input->post('buyerName');
        $buyerAddress = $this->input->post('buyerAddress');
        $buyerPhone = $this->input->post('buyerPhone');
        $bankAccountNumber = $this->input->post('bankAccountNumber');
        $ongkir = $this->input->post('ongkir');
        $typeTrans = $this->input->post('typeTrans');

        $this->Transaction_model->delete_checkout_by_idOrder($idOrder);


        foreach ($this->input->post() as $key => $value) {
            if (strpos($key, 'SKU') === 0) {
                $SKUSingle = $key = $value;
                $this->insert_checkout_SKU($SKUSingle);
            }
        }
        // die;



        $this->session->set_flashdata('idOrder', $idOrder);
        $this->session->set_flashdata('buyerName', $buyerName);
        $this->session->set_flashdata('buyerAddress', $buyerAddress);
        $this->session->set_flashdata('buyerPhone', $buyerPhone);
        $this->session->set_flashdata('bankAccountNumber', $bankAccountNumber);
        $this->session->set_flashdata('ongkir', $ongkir);
        if ($typeTrans == "distributor") {
            redirect('Transaction_distributor/add_new_transaction');
        } elseif ($typeTrans == "material") {
            redirect('Transaction_material/add_new_transaction');
        } elseif ($typeTrans == "production") {
            redirect('Transaction_production/add_new_transaction');
        } else {
            redirect('Transaction_umum/add_new_transaction');
        }

    }

    public function order_detail()
    {
        // var_dump($this->input->post('idOrder'));
        if ($this->session->flashdata('idOrder')) {
            echo "1";
            $idOrder = $this->session->flashdata('idOrder');
        } else {

            $idOrder = $this->input->post('idOrder');

        }

        $data['payment'] = $this->Transaction_model->get_payment($idOrder)->result();
        $data['totalPayment'] = $this->Transaction_model->get_total_paying($idOrder);
        // var_dump($this->Transaction_model->get_total_paying($idOrder));
        // die;

        $data['detailOrder'] = $this->Transaction_model->get_order_detail($idOrder)->result();
        // var_dump($this->Transaction_model->get_order_detail($idOrder)->result());
        if ($this->session->userdata('login_id') == 'admin') {

            $data['admin'] = true;
            $this->load->view('nav/navbar.php');
        } else {
            $data['admin'] = false;
            $this->load->view('nav/navbar_kasir.php');

        }
        $this->session->keep_flashdata('idOrder');
        $this->load->view('transaction/detail_transaction_view.php', $data);
    }

    public function get_update()
    {
        // var_dump($this->input->post('idOrder'));
        $idOrder = $this->input->post('idOrder');

        $data['detailOrder'] = $this->Transaction_model->get_order_detail($idOrder)->result();
        if ($this->session->userdata('login_id') == 'admin') {

            $data['admin'] = true;
            $this->load->view('nav/navbar.php');
        } else {
            $data['admin'] = false;
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
        $this->session->set_flashdata('idOrder', $idOrder);
        redirect('Transaction/order_detail');
    }


    public function paying()
    {
        // var_dump($this->input->post());

        $idOrder = $this->input->post('idOrder');
        $totalPayment = $this->input->post('totalPayment');
        $kekurangan = $this->input->post('kekurangan');
        if ($kekurangan == $totalPayment) {
            $this->Transaction_model->update_payment_status($idOrder);
        }
        $this->Transaction_model->paying($idOrder, $totalPayment);

        // $data['product'] = $this->Product_model->get_product();
        // $this->load->view('purcase/add_purcasing_view.php', $data);
        $this->session->set_flashdata('idOrder', $idOrder);
        redirect('Transaction/order_detail');
    }


}