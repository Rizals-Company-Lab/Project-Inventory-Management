<?php

class Report_model extends CI_Model
{

    public function get_report()
    {

        // Assuming you have already loaded the database library in CodeIgniter

        $this->db->select('
            SUM(COALESCE(TPC.PEMBELIAN, 0)) AS grandTotalBuyingAmount,
            SUM(COALESCE(TPC2.PENJUALAN, 0)) AS grandTotalSellingAmount,
            SUM(COALESCE(TPC2.PENJUALAN, 0) - COALESCE(TPC.PEMBELIAN, 0)) AS grandTotalDifference,
            SUM(TPD.sellingPrice * (COALESCE(TPC.stock, 0) - COALESCE(TPC2.terjual, 0))) AS grandTotalaset,
            SUM((TPD.sellingPrice * (COALESCE(TPC.stock, 0) - COALESCE(TPC2.terjual, 0))) + (COALESCE(TPC2.PENJUALAN, 0) - COALESCE(TPC.PEMBELIAN, 0))) AS grandTotalProfitEstimation
        ');

        $this->db->from('tbl_product AS TPD');

        $this->db->join('(SELECT SKU, SUM(qtyPurcase) AS stock, SUM(priceAmount) AS PEMBELIAN
            FROM tbl_purcase
            GROUP BY SKU) AS TPC', 'TPD.SKU = TPC.SKU', 'left');

        $this->db->join('(SELECT SKU, SUM(qtyOrder) AS terjual, SUM(priceAmount) AS PENJUALAN
            FROM tbl_checkout
            WHERE idOrder IS NOT NULL
            GROUP BY SKU) AS TPC2', 'TPD.SKU = TPC2.SKU', 'left');

        $query = $this->db->get();
        $result = $query->row();

        return $result;
    }



    public function get_report_byProduct($rowno, $rowperpage, $INVENTTRANSID = "", $NAME = "", $ITEMNAME = "")
    {
        // $this->db->select('*');




        // $this->db->select('*, SUM(priceAmount) AS PEMBELIAN');
        // $this->db->from('tbl_purcase AS TPC');
        // $this->db->join('tbl_product AS TPD', 'TPC.SKU = TPD.SKU');
        // $this->db->group_by('TPC.SKU');
        // $result = $this->db->limit($rowperpage, $rowno)->get();

        // Assuming you have already loaded the database library in CodeIgniter

        // $this->db->select('TPD.SKU, TPD.productName, TPD.productDescription, TPD.sellingPrice,
        //            COALESCE(TPC.PEMBELIAN, 0) AS PEMBELIAN, COALESCE(TPC2.PENJUALAN, 0) AS PENJUALAN,
        //            (TPC.stock - COALESCE(TPC2.terjual, 0)) AS sisa_stock,
        //            (TPD.sellingPrice * (TPC.stock - COALESCE(TPC2.terjual, 0))) AS aset,
        //            (COALESCE(TPC2.PENJUALAN, 0) - COALESCE(TPC.PEMBELIAN, 0)) AS selisih');
        // $this->db->from('tbl_product AS TPD');
        // $this->db->join('(SELECT SKU, SUM(qtyPurcase) AS stock, SUM(priceAmount) AS PEMBELIAN
        //          FROM tbl_purcase
        //          GROUP BY SKU) AS TPC', 'TPD.SKU = TPC.SKU', 'left');
        // $this->db->join('(SELECT SKU, SUM(qtyOrder) AS terjual, SUM(priceAmount) AS PENJUALAN
        //          FROM tbl_checkout
        //          WHERE idOrder IS NOT NULL
        //          GROUP BY SKU) AS TPC2', 'TPD.SKU = TPC2.SKU', 'left');

        // $result = $this->db->get();
        // Assuming you have already loaded the database library in CodeIgniter

        $this->db->select('TPD.SKU, TPD.productName, TPD.productDescription, TPD.sellingPrice,
        COALESCE(TPC.buyingAmount, 0) AS buyingAmount, COALESCE(TPC2.sellingAmount, 0) AS sellingAmount,
        (TPC.stock - COALESCE(TPC2.terjual, 0)) AS stock,
                   (TPD.sellingPrice * (TPC.stock - COALESCE(TPC2.terjual, 0))) AS aset,
                   (COALESCE(TPC2.sellingAmount, 0) - COALESCE(TPC.buyingAmount, 0)) AS selisih,
                   ((COALESCE(TPC2.sellingAmount, 0) - COALESCE(TPC.buyingAmount, 0)) +
                   (TPD.sellingPrice * (TPC.stock - COALESCE(TPC2.terjual, 0)))) AS profitEstimation');
        $this->db->from('tbl_product AS TPD');
        $this->db->join('(SELECT SKU, SUM(qtyPurcase) AS stock, SUM(priceAmount) AS buyingAmount
                   FROM tbl_purcase
                   GROUP BY SKU) AS TPC', 'TPD.SKU = TPC.SKU', 'left');
        $this->db->join('(SELECT SKU, SUM(qtyOrder) AS terjual, SUM(priceAmount) AS sellingAmount
                   FROM tbl_checkout
                   WHERE idOrder IS NOT NULL
                   GROUP BY SKU) AS TPC2', 'TPD.SKU = TPC2.SKU', 'left');

        $result = $this->db->limit($rowperpage, $rowno)->get();
        //    $result = $this->db->get();
        // $result = $query->result();



        // $this->db->select_sum('priceAmount AS PEMBELIAN');
        // $this->db->group_by('SKU');
        // $result = $this->db->get('tbl_purcase');




        // $this->db->join('vendtable AS V', 'PT.INVOICEACCOUNT = V.ACCOUNTNUM');
        // $this->db->join('inventtable AS I', 'PL.ITEMID = I.ITEMID');

        // $this->db->like('INVENTTRANSID', $INVENTTRANSID);
        // $this->db->like('NAME', $NAME);
        // $this->db->like('ITEMNAME', $ITEMNAME);


        // $this->db->order_by('INVENTTRANSID', 'DESC');
        return $result;
    }




    public function get_report_count_byProduct($INVENTTRANSID = "", $NAME = "", $ITEMNAME = "")
    {
        // $this->db->select('*');
        // $this->db->from('tbl_purcase');

        // // $this->db->like('INVENTTRANSID', $INVENTTRANSID);
        // // $this->db->like('NAME', $NAME);
        // // $this->db->like('ITEMNAME', $ITEMNAME);

        // $result = $this->db->count_all_results();


        $this->db->from('tbl_product AS TPD');
        $this->db->join('(SELECT SKU, SUM(qtyPurcase) AS stock, SUM(priceAmount) AS PEMBELIAN
                 FROM tbl_purcase
                 GROUP BY SKU) AS TPC', 'TPD.SKU = TPC.SKU', 'left');
        $this->db->join('(SELECT SKU, SUM(qtyOrder) AS terjual, SUM(priceAmount) AS PENJUALAN
                 FROM tbl_checkout
                 WHERE idOrder IS NOT NULL
                 GROUP BY SKU) AS TPC2', 'TPD.SKU = TPC2.SKU', 'left');

        $result = $this->db->count_all_results();

        return $result;
    }


}