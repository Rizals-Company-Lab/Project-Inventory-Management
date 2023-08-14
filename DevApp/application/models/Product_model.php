<?php

class Product_model extends CI_Model
{

    public function get_stock_product()
    {
        // $this->db->select('TPC.SKU, productName, productDescription, sellingPrice, SUM(qtyPurcase) AS QTY');
        // $this->db->from('tbl_purcase AS TPC');
        // $this->db->join('tbl_product AS TPD', 'TPC.SKU = TPD.SKU');
        // $this->db->group_by('TPC.SKU');

        // $this->db->select('s.SKU, productName, productDescription,  sellingPrice, distributorPrice, materialPrice, s.stock - COALESCE(t.terjual, 0) AS sisa_stock');
        // $this->db->from('tbl_purcase');
        // $this->db->join('(SELECT SKU, SUM(qtyPurcase) AS stock FROM tbl_purcase GROUP BY SKU) s', 's.SKU = tbl_purcase.SKU');
        // $this->db->join('(SELECT SKU, SUM(qtyOrder) AS terjual FROM tbl_checkout WHERE idOrder IS NOT NULL GROUP BY SKU) t', 't.SKU = s.SKU', 'left');
        // $this->db->join('tbl_product p', 's.SKU = p.SKU', 'left');

        $subquery_s = $this->db->select('SKU, SUM(qtyPurcase) AS stock')
            ->from('tbl_purcase')
            ->group_by('SKU')
            ->get_compiled_select();

        $subquery_t = $this->db->select('SKU, SUM(qtyOrder) AS terjual')
            ->from('tbl_checkout')
            ->where('idOrder IS NOT NULL')
            ->group_by('SKU')
            ->get_compiled_select();

        $this->db->select('p.SKU, productName, productDescription, sellingPrice, distributorPrice, materialPrice, s.stock - COALESCE(t.terjual, 0) AS sisa_stock')
            ->from("($subquery_s) s")
            ->join("($subquery_t) t", 's.SKU = t.SKU', 'left')
            ->join('tbl_product p', 's.SKU = p.SKU', 'right');

        // $query = $this->db->get();


        // $query = $this->db->get();




        // $this->db->join('vendtable AS V', 'PT.INVOICEACCOUNT = V.ACCOUNTNUM');
        // $this->db->join('inventtable AS I', 'PL.ITEMID = I.ITEMID');

        // $this->db->like('INVENTTRANSID', $INVENTTRANSID);
        // $this->db->like('NAME', $NAME);
        // $this->db->like('ITEMNAME', $ITEMNAME);


        // $this->db->order_by('INVENTTRANSID', 'DESC');
        $result = $this->db->get();
        return $result;
    }

    public function get_stock_product_limit($rowno, $rowperpage, $searchINVENTTRANSID, $searchNAME, $searchITEMNAME)
    {
        // $this->db->select('TPC.SKU, productName, productDescription, sellingPrice, SUM(qtyPurcase) AS QTY');
        // $this->db->from('tbl_purcase AS TPC');
        // $this->db->join('tbl_product AS TPD', 'TPC.SKU = TPD.SKU');
        // $this->db->group_by('TPC.SKU');

        // $this->db->select('s.SKU, productName, productDescription,  sellingPrice, distributorPrice, materialPrice, s.stock - COALESCE(t.terjual, 0) AS sisa_stock');
        // $this->db->from('tbl_purcase');
        // $this->db->join('(SELECT SKU, SUM(qtyPurcase) AS stock FROM tbl_purcase GROUP BY SKU) s', 's.SKU = tbl_purcase.SKU');
        // $this->db->join('(SELECT SKU, SUM(qtyOrder) AS terjual FROM tbl_checkout WHERE idOrder IS NOT NULL GROUP BY SKU) t', 't.SKU = s.SKU', 'left');
        // $this->db->join('tbl_product p', 's.SKU = p.SKU', 'left');

        $subquery_s = $this->db->select('SKU, SUM(qtyPurcase) AS stock')
            ->from('tbl_purcase')
            ->group_by('SKU')
            ->get_compiled_select();

        $subquery_t = $this->db->select('SKU, SUM(qtyOrder) AS terjual')
            ->from('tbl_checkout')
            ->where('idOrder IS NOT NULL')
            ->group_by('SKU')
            ->get_compiled_select();

        $this->db->select('p.SKU, productName, productDescription,  sellingPrice, distributorPrice, materialPrice, s.stock - COALESCE(t.terjual, 0) AS sisa_stock')
            ->from("($subquery_s) s")
            ->join("($subquery_t) t", 's.SKU = t.SKU', 'left')
            ->join('tbl_product p', 's.SKU = p.SKU', 'right');

        // $query = $this->db->get();


        // $query = $this->db->get();




        // $this->db->join('vendtable AS V', 'PT.INVOICEACCOUNT = V.ACCOUNTNUM');
        // $this->db->join('inventtable AS I', 'PL.ITEMID = I.ITEMID');

        // $this->db->like('INVENTTRANSID', $INVENTTRANSID);
        // $this->db->like('NAME', $NAME);
        // $this->db->like('ITEMNAME', $ITEMNAME);


        $this->db->order_by('p.SKU', 'ASC');
        $result = $this->db->limit($rowperpage, $rowno)->get();
        return $result;
    }


    public function get_product_count($INVENTTRANSID = "", $NAME = "", $ITEMNAME = "")
    {
        $this->db->select('*');
        $this->db->from('tbl_product');

        // $this->db->like('INVENTTRANSID', $INVENTTRANSID);
        // $this->db->like('NAME', $NAME);
        // $this->db->like('ITEMNAME', $ITEMNAME);

        $result = $this->db->count_all_results();

        return $result;
    }

    public function get_product()
    {
        $this->db->select('*');
        $this->db->from('tbl_product');

        // $this->db->like('INVENTTRANSID', $INVENTTRANSID);
        // $this->db->like('NAME', $NAME);
        // $this->db->like('ITEMNAME', $ITEMNAME);

        $result = $this->db->get();

        return $result;
    }


    public function get_product_ByID($SKU)
    {
        $this->db->select('*');
        $this->db->from('tbl_product');

        $this->db->where('SKU', $SKU);

        $result = $this->db->get()->row();

        return $result;
    }

    public function save_product($SKU, $productName, $productDescription, $sellingPrice, $distributorPrice, $materialPrice)
    {

        $data_tbl_product = array(
            'SKU' => $SKU,
            'productName' => $productName,
            'productDescription' => $productDescription,
            'sellingPrice' => $sellingPrice
        );

        $this->db->insert('tbl_product', $data_tbl_product);
    }

    public function update_product($SKU, $productName, $productDescription, $sellingPrice, $distributorPrice, $materialPrice)
    {

        $data_tbl_product = array(
            'productName' => $productName,
            'productDescription' => $productDescription,
            'sellingPrice' => $sellingPrice,
            'distributorPrice' => $distributorPrice,
            'materialPrice' => $materialPrice
        );

        $this->db->where('SKU', $SKU);
        $this->db->update('tbl_product', $data_tbl_product);
    }

    public function delete_product($SKU)
    {

        $this->db->where('SKU', $SKU);
        $this->db->delete('tbl_product');

    }


}