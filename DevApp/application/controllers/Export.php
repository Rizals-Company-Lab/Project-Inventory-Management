<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Export extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Transaction_model');
    }

    // public function index()
    // {
    //     $idOrder = $this->input->post('idOrder');
    //     ;
    //     $Transaction = $this->Transaction_model->get_order_detail($idOrder)->result();


    //     $this->load->library('pdf');
    //     $pdf = new Pdf();

    //     $pdf->AddPage("L", array(210, 148));

    //     $pdf->Image(base_url('dist/img/abk3.png'), 0, 0, 50, 0);
    //     $pdf->SetFont('Arial', 'B', 14);

    //     $pdf->Cell(35);
    //     $pdf->Cell(85, 10, "FAKTUR PENJUALAN", 0, 0);
    //     $pdf->SetFont('Arial', '', 10);
    //     $pdf->Cell(
    //         0,
    //         6,
    //         'Nomor Transaksi : ' . $Transaction[0]->idOrder . '/' . 'ABJ/' . date('m/y')
    //         ,
    //         0,
    //         1,
    //         'L'
    //     );
    //     // $pdf->Cell(0, 10, "FAKTUR PENJUALAN", 0, 0);
    //     $pdf->Cell(35);
    //     $pdf->SetFont('Arial', 'B', 14);
    //     $pdf->Cell(85, 15, "CV. ALI BAJA", 0, 0);
    //     $pdf->SetFont('Arial', '', 10);
    //     $pdf->Cell(
    //         0,
    //         6,
    //         'Tanggal               : ' . date('d-m-Y H:i:s', strtotime($Transaction[0]->orderTimestamp))
    //         ,
    //         0,
    //         1,
    //         'L'
    //     );
    //     $pdf->SetFont('Arial', '', 10);
    //     $pdf->Cell(35);
    //     $pdf->Cell(85, 20, 'Jl. Mranggen Kota Semarang Jawa Tengah', 0, 0);
    //     $pdf->Cell(
    //         0,
    //         6,
    //         'Pembeli               : ' . $Transaction[0]->buyerName
    //         ,
    //         0,
    //         1,
    //         'L'
    //     );
    //     // $pdf->Cell(85, 20, '                      ', 0, 0);
    //     $pdf->Cell(120);
    //     $pdf->Cell(
    //         0,
    //         6,
    //         'Rekening             : ' . $Transaction[0]->bankAccountNumber
    //         ,
    //         0,
    //         1,
    //         'L'
    //     );
    //     $pdf->Cell(35, 10, '', 0, 1);
    //     // $pdf->Cell(0, 10, "FAKTUR PENJUALAN", 0, 1);

    //     // $pdf->SetFont('Arial', '', 10);
    //     // $pdf->MultiCell(0, 10, 'This is the invoice for a purchasing of ' . $Transaction[0]->buyerName . ' to Rizal\'s Company Lab.', 0, 'L');
    //     // if ($Transaction[0]->PURCHSTATUS == 0) {
    //     //     $PURCHSTATUS = 'Pending';
    //     // } else {
    //     //     $PURCHSTATUS = 'Done';
    //     // }
    //     // $pdf->MultiCell(0, 10, 'Invoice No. ' . $Transaction[0]->idOrder . ' | Delivery Date : ' . $Transaction[0]->DELIVERYDATE . ' | Purchase Status : ' . $PURCHSTATUS, 0, 'L');
    //     // $pdf->Cell(0, 7, 'Invoice No.' . $Transaction[0]->idOrder, 0, 1);
    //     // $pdf->Cell(0, 7, 'Delivery Date : ' . $Transaction[0]->orderTimestamp, 0, 1);
    //     // $pdf->Cell(0, 7, ($Transaction[0]->paymentStatus == 0) ? 'Purchase Status : Pending' : 'Purchase Status : Done', 0, 1);
    //     // $pdf->Cell(0, 10, , 0, 1);

    //     // $pdf->Cell(0, 10, 'Delivery Date', 0, 0);
    //     // $pdf->Cell(0, 10, $Transaction[0]->paymentStatus, 0, 1);

    //     // $pdf->Cell(0, 10, 'Purchase Status', 0, 0);
    //     // $pdf->Cell(0, 10, ($Transaction[0]->paymentStatus == 0) ? 'Pending' : 'Done', 0, 1);

    //     // $pdf->SetFont('Arial', 'B', 12);
    //     // $pdf->Cell(0, 10, 'Details Buyer', 0, 1);
    //     // $pdf->SetFont('Arial', '', 10);
    //     // $pdf->MultiCell(0, 10, 'Vendor : ' . $Transaction[0]->buyerName . ' | Address : ' . $Transaction[0]->priceAmount . ' | Phone : ' . $Transaction[0]->priceAmount, 0, 'L');

    //     // $pdf->Cell(0, 10, $Transaction->buyerName, 0, 0);
    //     // $pdf->Cell(0, 10, $Transaction->ADDRESS, 0, 0);
    //     // $pdf->Cell(0, 10, $Transaction->PHONE, 0, 1);

    //     $pdf->SetFont('Arial', 'B', 10);
    //     $pdf->Cell(10, 10, 'No', 1, 0, 'C');
    //     $pdf->Cell(70, 10, 'Nama Barang', 1, 0, 'C');
    //     $pdf->Cell(40, 10, 'Harga', 1, 0, 'C');
    //     $pdf->Cell(10, 10, 'Qty', 1, 0, 'C');
    //     $pdf->Cell(60, 10, 'Total Harga', 1, 1, 'C');
    //     // $pdf->Cell(30, 10, 'Received Now', 1, 1, 'C');

    //     $pdf->SetFont('Arial', '', 10);

    //     $count = 1;
    //     $PRICEAMOUNT = 0;
    //     foreach ($Transaction as $row) {
    //         $pdf->Cell(10, 10, $count, 1, 0, 'C');
    //         $pdf->Cell(70, 10, $row->productName, 1, 0, 'C');
    //         $pdf->Cell(40, 10, number_format($row->productPrice, 0, ',', '.'), 1, 0, 'C');
    //         $pdf->Cell(10, 10, $row->qtyOrder, 1, 0, 'C');
    //         $pdf->Cell(60, 10, number_format($row->priceAmount, 0, ',', '.'), 1, 1, 'C');
    //         // $pdf->Cell(30, 10, $row->productName, 1, 1, 'C');
    //         $count++;
    //         $PRICEAMOUNT += $row->priceAmount;
    //     }

    //     $pdf->Cell(10, 5, ' ', 0, 1, 'C');
    //     $pdf->SetFont('Arial', 'B', 12);
    //     $pdf->Cell(130, 10, 'Total Pembayaran : ' . "Rp. " . number_format($PRICEAMOUNT, 0, ',', '.'), 0, 0);

    //     $pdf->Cell(60, 10, 'TIDAK TERIMA RETUR', 1, 1, 'C');
    //     // $pdf->Cell(0, 10, $PRICEAMOUNT, 0, 1);

    //     $pdf->Cell(10, 10, ' ', 0, 1, 'C');




    //     $pdf->SetFont('Arial', '', 12);
    //     $pdf->Cell(100, 10, "Hormat Kami", 0, 0, "C");
    //     $pdf->Cell(100, 10, "Penerima", 0, 1, "C");
    //     $pdf->Cell(100, 40, "Ali Baja", 0, 0, "C");
    //     $pdf->Cell(100, 40, ".............", 0, 0, "C");


    //     $pdf->Output('I', 'Daftar Transaction.pdf');
    // }


    public function index()
    {
        $idOrder = $this->input->post('idOrder');
        ;
        $Transaction = $this->Transaction_model->get_order_detail($idOrder)->result();

        $idCheckoutCount = array_reduce($Transaction, function ($carry, $item) {
            if (isset($carry[$item->idCheckout])) {
                $carry[$item->idCheckout]++;
            } else {
                $carry[$item->idCheckout] = 1;
            }
            return $carry;
        }, array());
        $heightPage = 180 + (15 * count($idCheckoutCount));
        // echo count($idCheckoutCount);
        // var_dump($idCheckoutCount);

        $this->load->library('pdf');
        $pdf = new Pdf();

        $pdf->AddPage("P", array(80, $heightPage));

        $pdf->Image(base_url('dist/img/abk3Outline.png'), -3, -3, 80, 0);
        $pdf->Cell(0, 35, '', 0, 1);
        $pdf->SetFont('Arial', 'B', 12);


        $pdf->Cell(0, 5, "FAKTUR PENJUALAN", 0, 1, "C");
        $pdf->Cell(
            0,
            10,
            "AB. TRASS",
            0,
            1,
            "C"
        );
        $pdf->SetFont('Arial', '', 10);
        $pdf->Cell(0, 5, 'Menerima Pemasangan Rangka', 0, 1, "C");
        $pdf->Cell(0, 5, 'Atap & Plavon PVC', 0, 1, "C");
        $pdf->Cell(0, 5, 'Dempel Kulon Kali RT 5 RW 9 Kebonbatur', 0, 1, "C");
        $pdf->Cell(0, 5, '085786046376', 0, 1, "C");
        $pdf->Cell(0, 5, '-----------------------------------------------------------', 0, 1, "C");

        $pdf->Cell(0, 5, '', 0, 1);



        $pdf->Cell(
            0,
            6,
            'Nomor Transaksi : ' . $Transaction[0]->idOrder . '/' . 'ABJ/' . date('m/y')
            ,
            0,
            1,
            'L'
        );
        $pdf->Cell(
            0,
            6,
            'Tanggal               : ' . date('d-m-Y H:i:s', strtotime($Transaction[0]->orderTimestamp))
            ,
            0,
            1,
            'L'
        );
        $pdf->Cell(
            0,
            6,
            'Pembeli               : ' . $Transaction[0]->buyerName
            ,
            0,
            1,
            'L'
        );
        // $pdf->Cell(85, 20, '                      ', 0, 0);
        $pdf->Cell(
            0,
            6,
            'Rekening             : ' . $Transaction[0]->bankAccountNumber
            ,
            0,
            1,
            'L'
        );
        $pdf->Cell(35, 10, '', 0, 1);


        // $pdf->Cell(10, 10, 'No', 1, 0, 'C');
        // $pdf->Cell(70, 10, 'Nama Barang', 1, 0, 'C');
        // $pdf->Cell(40, 10, 'Harga', 1, 0, 'C');
        // $pdf->Cell(10, 10, 'Qty', 1, 0, 'C');
        // $pdf->Cell(60, 10, 'Total Harga', 1, 1, 'C');
        // $pdf->Cell(30, 10, 'Received Now', 1, 1, 'C');

        $pdf->SetFont('Arial', '', 10);

        $count = 1;
        $PRICEAMOUNT = 0;
        foreach ($Transaction as $row) {
            // $pdf->Cell(10, 10, $count, 1, 0, 'C');


            $pdf->Cell(70, 5, $row->productName, 0, 1, 'L');
            $pdf->Cell(0, 10, $row->qtyOrder . ' x ' . number_format($row->productPrice, 0, ',', '.'), 0, 0, 'L');
            $pdf->SetFont('Arial', 'B', 10);
            $pdf->Cell(0, 10, number_format($row->priceAmount, 0, ',', '.'), 0, 1, 'R');

            $pdf->SetFont('Arial', '', 10);
            // $pdf->Cell(40, 10, $row->qtyOrder . ' X ' . number_format($row->productPrice, 0, ',', '.'), 1, 0, 'C');
            // $pdf->Cell(10, 10, $row->qtyOrder, 1, 0, 'C');
            // $pdf->Cell(60, 10, number_format($row->priceAmount, 0, ',', '.'), 1, 1, 'C');
            // $pdf->Cell(30, 10, $row->productName, 1, 1, 'C');
            $count++;
            $PRICEAMOUNT += $row->priceAmount;
        }

        $pdf->Cell(0, 5, ' ', 0, 1, 'C');
        $pdf->SetFont('Arial', 'B', 12);
        $pdf->Cell(0, 10, 'Total Bayar : ' . "Rp. " . number_format($PRICEAMOUNT, 0, ',', '.'), 0, 0);

        // $pdf->Cell(60, 10, 'TIDAK TERIMA RETUR', 1, 1, 'C');
        // // $pdf->Cell(0, 10, $PRICEAMOUNT, 0, 1);

        // $pdf->Cell(10, 10, ' ', 0, 1, 'C');

        $pdf->Cell(0, 15, '', 0, 1);
        $pdf->SetFont('Arial', '', 10);
        $pdf->Cell(0, 5, 'Terima kasih sudah berbelanja di', 0, 1, "C");
        $pdf->Cell(0, 5, 'toko kami', 0, 1, "C");
        $pdf->Cell(0, 5, 'ditunggu transaksi berikutnya', 0, 1, "C");

        // $pdf->SetFont('Arial', '', 12);
        // $pdf->Cell(100, 10, "Hormat Kami", 0, 0, "C");
        // $pdf->Cell(100, 10, "Penerima", 0, 1, "C");
        // $pdf->Cell(100, 40, "Ali Baja", 0, 0, "C");
        // $pdf->Cell(100, 40, ".............", 0, 0, "C");


        $pdf->Output('I', 'Daftar Transaction.pdf');
    }

}