<?php

class Purcase_model extends CI_Model
{

    public function get_purcase_by_id($idPurcase)
    {
        $this->db->select('*');
        $this->db->from('tbl_purcase AS TPC');
        // $this->db->join('tbl_product AS TPD', 'TPC.SKU = TPD.SKU');
        // $this->db->join('vendtable AS V', 'PT.INVOICEACCOUNT = V.ACCOUNTNUM');
        // $this->db->join('inventtable AS I', 'PL.ITEMID = I.ITEMID');

        $this->db->where('idPurcase', $idPurcase);
        // $this->db->like('NAME', $NAME);
        // $this->db->like('ITEMNAME', $ITEMNAME);


        // $this->db->order_by('INVENTTRANSID', 'DESC');
        $result = $this->db->get()->row();
        return $result;

    }



    public function get_purcase($rowno, $rowperpage, $INVENTTRANSID = "", $NAME = "", $ITEMNAME = "")
    {
        $this->db->select('*');
        $this->db->from('tbl_purcase AS TPC');
        $this->db->join('tbl_product AS TPD', 'TPC.SKU = TPD.SKU');
        // $this->db->join('vendtable AS V', 'PT.INVOICEACCOUNT = V.ACCOUNTNUM');
        // $this->db->join('inventtable AS I', 'PL.ITEMID = I.ITEMID');

        // $this->db->like('INVENTTRANSID', $INVENTTRANSID);
        // $this->db->like('NAME', $NAME);
        // $this->db->like('ITEMNAME', $ITEMNAME);


        // $this->db->order_by('INVENTTRANSID', 'DESC');


        $this->db->order_by('purcaseTimestamp', 'DESC');
        $result = $this->db->limit($rowperpage, $rowno)->get();
        return $result;
    }




    public function get_purcase_count($INVENTTRANSID = "", $NAME = "", $ITEMNAME = "")
    {
        $this->db->select('*');
        $this->db->from('tbl_purcase');

        // $this->db->like('INVENTTRANSID', $INVENTTRANSID);
        // $this->db->like('NAME', $NAME);
        // $this->db->like('ITEMNAME', $ITEMNAME);

        $result = $this->db->count_all_results();

        return $result;
    }


    public function update_purcase($idPurcase, $SKU, $buyingPrice, $qtyPurcase, $priceAmount, $purcaseTimestamp)
    {

        $data_tbl_purcase = array(
            'SKU' => $SKU,
            'buyingPrice' => $buyingPrice,
            'qtyPurcase' => $qtyPurcase,
            'priceAmount' => $priceAmount,
            'purcaseTimestamp' => $purcaseTimestamp
        );

        $this->db->where('idPurcase', $idPurcase);
        $this->db->update('tbl_purcase', $data_tbl_purcase);

    }

    public function save_purcase($SKU, $buyingPrice, $qtyPurcase, $priceAmount, $purcaseTimestamp)
    {

        $data_tbl_purcase = array(
            'idPurcase' => NULL,
            'SKU' => $SKU,
            'buyingPrice' => $buyingPrice,
            'qtyPurcase' => $qtyPurcase,
            'priceAmount' => $priceAmount,
            'purcaseTimestamp' => $purcaseTimestamp
        );

        $this->db->insert('tbl_purcase', $data_tbl_purcase);
    }


}