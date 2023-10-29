<?php

class Transaction_model extends CI_Model
{
    public function get_all_transaction($INVENTTRANSID = "", $NAME = "", $ITEMNAME = "")
    {
        $this->db->select('*');
        $this->db->from('purchline AS PL');
        $this->db->join('purchtable AS PT', 'PL.PURCHID = PT.PURCHID');
        $this->db->join('vendtable AS V', 'PT.INVOICEACCOUNT = V.ACCOUNTNUM');
        $this->db->join('inventtable AS I', 'PL.ITEMID = I.ITEMID');

        $this->db->like('INVENTTRANSID', $INVENTTRANSID);
        $this->db->like('NAME', $NAME);
        $this->db->like('ITEMNAME', $ITEMNAME);

        $this->db->order_by('INVENTTRANSID', 'DESC');
        $result = $this->db->get();

        return $result;
    }

    public function get_transaction($rowno, $rowperpage, $searchBuyer = "", $searchDate = "", $searchStatus = "")
    {
        $this->db->select('*');
        $this->db->from('tbl_order AS TO');
        // $this->db->join('purchtable AS PT', 'PL.PURCHID = PT.PURCHID');
        // $this->db->join('vendtable AS V', 'PT.INVOICEACCOUNT = V.ACCOUNTNUM');
        // $this->db->join('inventtable AS I', 'PL.ITEMID = I.ITEMID');

        // $this->db->like('INVENTTRANSID', $INVENTTRANSID);
        // $this->db->like('NAME', $NAME);
        // $this->db->like('ITEMNAME', $ITEMNAME);

        if ($searchBuyer) {
            $this->db->like('buyerName', $searchBuyer);
        }

        if ($searchDate) {
            $formattedDate = date('Y-m-d', strtotime($searchDate));
            $this->db->where("DATE(orderTimestamp) =", $formattedDate);
        }
        if ($searchStatus != "") {
            $this->db->where('paymentStatus', $searchStatus);
        }
        $this->db->order_by('orderTimestamp', 'DESC');
        $result = $this->db->limit($rowperpage, $rowno)->get();
        return $result;
    }

    public function get_product()
    {
        // $this->db->select('TPC.SKU, productName, productDescription, sellingPrice, SUM(qtyPurcase) AS QTY');
        // $this->db->from('tbl_purcase AS TPC');
        // $this->db->join('tbl_product AS TPD', 'TPC.SKU = TPD.SKU');
        // $this->db->group_by('TPC.SKU');

        // $this->db->select('s.SKU, productName, productDescription, sellingPrice, $distributorPrice, $materialPrice, s.stock - COALESCE(t.terjual, 0) AS sisa_stock');
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

        $this->db->select('s.SKU, productName, productDescription, sellingPrice, distributorPrice, materialPrice, s.stock - COALESCE(t.terjual, 0) AS sisa_stock')
            ->from("($subquery_s) s")
            ->join("($subquery_t) t", 's.SKU = t.SKU', 'left')
            ->join('tbl_product p', 's.SKU = p.SKU', 'left');

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

    public function insert_checkout($SKU)
    {
        $data_checkout = array(
            'idCheckout' => NULL,
            'idOrder' => NULL,
            'SKU' => $SKU,
            'productPrice' => 0,
            'qtyOrder' => 0,
            'priceAmount' => 0,
        );

        $this->db->insert('tbl_checkout', $data_checkout);

        return true;
    }



    public function get_order_detail($idOrder)
    {
        $this->db->select('*');
        $this->db->from('tbl_order TOR');
        $this->db->join('tbl_checkout TCK', 'TOR.idOrder = TCK.idOrder');
        $this->db->join('tbl_product TPD', 'TCK.SKU = TPD.SKU');
        $this->db->where('TOR.idOrder', $idOrder);

        $result = $this->db->get();


        return $result;
    }


    public function get_checkout()
    {
        $this->db->select('*');
        $this->db->from('tbl_checkout AS CO');
        $this->db->join('tbl_product AS TPD', 'CO.SKU = TPD.SKU');
        // $this->db->group_by('TPC.SKU');
        // $this->db->join('vendtable AS V', 'PT.INVOICEACCOUNT = V.ACCOUNTNUM');
        // $this->db->join('inventtable AS I', 'PL.ITEMID = I.ITEMID');

        $this->db->where('idOrder', NULL);
        // $this->db->like('INVENTTRANSID', $INVENTTRANSID);
        // $this->db->like('NAME', $NAME);
        // $this->db->like('ITEMNAME', $ITEMNAME);


        // $this->db->order_by('INVENTTRANSID', 'DESC');
        $result = $this->db->get();
        return $result;
    }

    public function get_QTY()
    {
        $this->db->select('TPC.SKU, productName, productDescription, sellingPrice, SUM(qtyPurcase) AS QTY');
        $this->db->from('tbl_purcase AS TPC');
        $this->db->join('tbl_product AS TPD', 'TPC.SKU = TPD.SKU');
        $this->db->group_by('TPC.SKU');
        // $this->db->join('vendtable AS V', 'PT.INVOICEACCOUNT = V.ACCOUNTNUM');
        // $this->db->join('inventtable AS I', 'PL.ITEMID = I.ITEMID');

        // $this->db->like('INVENTTRANSID', $INVENTTRANSID);
        // $this->db->like('NAME', $NAME);
        // $this->db->like('ITEMNAME', $ITEMNAME);


        // $this->db->order_by('INVENTTRANSID', 'DESC');
        $result = $this->db->get();
        return $result;
    }

    public function get_new_purcase($rowno, $rowperpage, $INVENTTRANSID = "", $NAME = "", $ITEMNAME = "")
    {
        $this->db->select('PT.PURCHID, NAME, SUM(LINEAMOUNT) AS TOTAL');
        $this->db->from('purchtable AS PT');
        $this->db->join('purchline AS PL', 'PL.PURCHID = PT.PURCHID');
        // $this->db->join('purchline', 'PT.PURCHID = PL.PURCHID');
        $this->db->join('vendtable AS V', 'PT.INVOICEACCOUNT = V.ACCOUNTNUM');
        $this->db->group_by('PT.PURCHID');
        // $this->db->order_by('purchtable.PURCHID', 'ASC');
        // $this->db->select('*');
        // $this->db->from('purchline AS PL');
        // $this->db->join('inventtable AS I', 'PL.ITEMID = I.ITEMID');

        // $this->db->like('INVENTTRANSID', $INVENTTRANSID);
        // $this->db->like('NAME', $NAME);
        // $this->db->like('ITEMNAME', $ITEMNAME);


        $this->db->order_by('INVENTTRANSID', 'DESC');
        $result = $this->db->limit($rowperpage, $rowno)->get();
        return $result;
    }

    public function get_vendor()
    {
        $result = $this->db->get('vendtable');
        return $result;
    }

    public function get_items()
    {
        $result = $this->db->get('inventtable');
        return $result;
    }

    public function get_new_idOrder()
    {
        $this->db->select('idOrder');
        $this->db->from('tbl_order');
        $this->db->order_by('idOrder', 'DESC');
        $this->db->limit(1);
        $result = $this->db->get()->row()->idOrder;
        // $inventtransid = $this->db->get()->row()->INVENTTRANSID;
        // $last_inventtransid = substr($inventtransid, -3);
        // $new_inventtransid = intval($last_inventtransid) + 1;
        // $result = "MID" . str_pad($new_inventtransid, 3, "0", STR_PAD_LEFT);

        return $result;
    }

    public function get_new_purchid()
    {
        $this->db->select('PURCHID');
        $this->db->from('purchtable');
        $this->db->order_by('PURCHID', 'DESC');
        $this->db->limit(1);
        $purchid = $this->db->get()->row()->PURCHID;
        $last_purchid = substr($purchid, strrpos($purchid, "-") + 1);
        $new_purchid = intval($last_purchid) + 1;
        $result = "PO-23-" . str_pad($new_purchid, 4, "0", STR_PAD_LEFT);
        return $result;
    }

    // public function get_checkout()
    // {
    //     $this->db->select('*');
    //     $this->db->from('purchline AS PL');
    //     // $this->db->join('purchtable AS PT', 'PL.PURCHID = PT.PURCHID');
    //     // $this->db->join('vendtable AS V', 'PT.INVOICEACCOUNT = V.ACCOUNTNUM');
    //     $this->db->join('inventtable AS I', 'PL.ITEMID = I.ITEMID');

    //     $this->db->where('PL.PURCHID', NULL);
    //     // $this->db->like('INVENTTRANSID', $INVENTTRANSID);
    //     // $this->db->like('NAME', $NAME);
    //     // $this->db->like('ITEMNAME', $ITEMNAME);


    //     $result = $this->db->order_by('INVENTTRANSID', 'DESC')->get();
    //     // $result = $this->db->limit($rowperpage, $rowno)->get();
    //     return $result;
    // }
    public function delete_checkout($SKU)
    {
        $this->db->where('idOrder', NULL);
        $this->db->where('SKU', $SKU);
        $this->db->delete('tbl_checkout');
        return true;
    }

    public function update_checkout($data_post, $PURCHID)
    {
        foreach ($data_post as $key => $value) {
            if (strpos($key, 'QTYMID') === 0) {
                $INVENTTRANSID = substr($key, 3);
                $QTY = $value;
                $PRICE = $data_post['PRICE' . $INVENTTRANSID];
                $LINEAMOUNT = $PRICE * $QTY;

                // var_dump($key);
                // echo ($data_post['PRICEMID128']);


                $this->db->set('QTYORDERED', $QTY);
                $this->db->set('PURCHID', $PURCHID);
                $this->db->set('PURCHPRICE', $PRICE);
                $this->db->set('LINEAMOUNT', $LINEAMOUNT);
                $this->db->where('INVENTTRANSID', $INVENTTRANSID);
                $this->db->update('purchline');

            }
        }
        // foreach ($data_post as $key => $value2) {
        //     if (strpos($key, 'PRICEMID') === 0) {
        //         $quantity2 = $value2;
        //         $inventtransid2 = substr($key, 5);
        //         echo $quantity2;
        //         echo $inventtransid2;

        //         $this->db->set('LINEAMOUNT', $quantity2);
        //         $this->db->where('INVENTTRANSID', $inventtransid2);
        //         $this->db->update('purchline');

        //     }
        // }
    }

    public function save_transaction($POSTDATA, $typeTrans)
    {

        $this->db->trans_start();

        try {
            $this->db->select('idOrder');
            $this->db->from('tbl_order');
            $this->db->order_by('idOrder', 'DESC');
            $this->db->limit(1);
            $idOrder = $this->db->get()->row()->idOrder + 1;

            $data_tbl_order = array(
                'idOrder' => $idOrder,
                'buyerName' => $POSTDATA['buyerName'],
                'bankAccountNumber' => $POSTDATA['bankAccountNumber'],
                'orderTimestamp' => NULL,
                'paymentStatus' => 0
            );

            $this->db->insert('tbl_order', $data_tbl_order);

            foreach ($POSTDATA as $key => $value) {
                if (strpos($key, 'qtyOrder') === 0) {
                    $idCheckout = substr($key, 8);
                    echo $idCheckout;
                    $qtyOrder = $value;
                    $sellingPrice = $POSTDATA[$typeTrans . $idCheckout];
                    $priceAmount = $sellingPrice * $qtyOrder;

                    // var_dump($key);
                    // echo ($data_post['PRICEMID128']);


                    $this->db->set('idOrder', $idOrder);
                    $this->db->set('productPrice', $sellingPrice);
                    $this->db->set('qtyOrder', $qtyOrder);
                    $this->db->set('priceAmount', $priceAmount);
                    $this->db->where('idCheckout', $idCheckout);
                    $this->db->update('tbl_checkout');

                }
            }

            $this->db->trans_commit();
            return true;
        } catch (Exception $e) {
            $this->db->trans_rollback();
            return false;
        }

    }

    public function save_purcase($INVENTTRANSID, $PURCHID, $ACCOUNTNUM, $ITEMID, $LINENUM, $QTYORDERED, $PURCHRECEIVEDNOW, $PURCHPRICE, $LINEAMOUNT, $DELIVERYDATE, $PURCHSTATUS)
    {
        $this->db->trans_start();

        try {
            $data_purchtable = array(
                'PURCHID' => $PURCHID,
                'INVOICEACCOUNT' => $ACCOUNTNUM,
                'DELIVERYDATE' => $DELIVERYDATE,
                'PURCHSTATUS' => $PURCHSTATUS
            );

            $this->db->insert('purchtable', $data_purchtable);

            $data_purchline = array(
                'INVENTTRANSID' => $INVENTTRANSID,
                'PURCHID' => $PURCHID,
                'LINENUM' => $LINENUM,
                'ITEMID' => $ITEMID,
                'PURCHPRICE' => $PURCHPRICE,
                'QTYORDERED' => $QTYORDERED,
                'PURCHRECEIVEDNOW' => $PURCHRECEIVEDNOW,
                'LINEAMOUNT' => $LINEAMOUNT
            );
            $this->db->insert('purchline', $data_purchline);

            $this->db->trans_commit();
            return true;
        } catch (Exception $e) {
            $this->db->trans_rollback();
            return false;
        }


    }
    public function checkout_purcase($data_post)
    {
        $this->db->select('INVENTTRANSID');
        $this->db->from('purchline');
        $this->db->order_by('INVENTTRANSID', 'DESC');
        $this->db->limit(1);
        $inventtransid = $this->db->get()->row()->INVENTTRANSID;
        $last_inventtransid = substr($inventtransid, -3);

        $this->db->trans_start();

        try {

            $linenum = 1;
            foreach ($data_post as $key => $value) {
                $new_inventtransid = intval($last_inventtransid) + $linenum;
                $result_inventtransid = "MID" . str_pad($new_inventtransid, 3, "0", STR_PAD_LEFT);


                if ($value != "checkout") {
                    $data = array(
                        'INVENTTRANSID' => $result_inventtransid,
                        'PURCHID' => NULL,
                        'LINENUM' => $linenum,
                        'ITEMID' => $value,
                        'PURCHPRICE' => '0',
                        'QTYORDERED' => '0',
                        'PURCHRECEIVEDNOW' => '0',
                        'LINEAMOUNT' => '1'
                    );

                    $this->db->insert('purchline', $data);

                    $linenum++;
                }
            }

            // $data = array(
            //     'INVENTTRANSID' => $result_inventtransid,
            //     'PURCHID' => NULL,
            //     'PURCHPRICE' => '0',
            //     'QTYORDERED' => '0',
            //     'PURCHRECEIVEDNOW' => '0',
            //     'LINEAMOUNT' => '1'
            // );

            // $linenum = 1;
            // foreach ($data as $key => $value) {
            //     if ($value !== 'checkout') {
            //         $data['LINENUM'] = $linenum;
            //         $data['ITEMID'] = $value;

            //         $this->db->insert('purchline', $data);

            //         $linenum++;
            //     }
            // }

            $this->db->trans_commit();
            return true;
        } catch (Exception $e) {
            $this->db->trans_rollback();
            return false;
        }

    }

    public function update_order($idOrder, $buyerName, $bankAccountNumber, $paymentStatus)
    {

        $data_tbl_order = array(
            'buyerName' => $buyerName,
            'bankAccountNumber' => $bankAccountNumber,
            'paymentStatus' => $paymentStatus
        );

        $this->db->where('idOrder', $idOrder);
        $this->db->update('tbl_order', $data_tbl_order);
    }

    public function update_purcase($INVENTTRANSID, $PURCHID, $ACCOUNTNUM, $ITEMID, $LINENUM, $QTYORDERED, $PURCHRECEIVEDNOW, $PURCHPRICE, $LINEAMOUNT, $DELIVERYDATE, $PURCHSTATUS)
    {
        $query = "UPDATE purchline
        JOIN purchtable ON purchtable.PURCHID = purchline.PURCHID
        SET purchline.LINENUM = '$LINENUM',
            purchline.ITEMID = '$ITEMID',
            purchline.PURCHPRICE = '$PURCHPRICE',
            purchline.QTYORDERED = '$QTYORDERED',
            purchline.PURCHRECEIVEDNOW = '$PURCHRECEIVEDNOW',
            purchline.LINEAMOUNT = '$LINEAMOUNT',
            purchtable.INVOICEACCOUNT = '$ACCOUNTNUM',
            purchtable.DELIVERYDATE = '$DELIVERYDATE',
            purchtable.PURCHSTATUS = '$PURCHSTATUS'
        WHERE purchline.INVENTTRANSID = '$INVENTTRANSID'
        AND purchtable.PURCHID = '$PURCHID'";

        $this->db->query($query);


        // $this->db->trans_start();

        // try {
        //     $data_purchtable = array(
        //         'INVOICEACCOUNT' => $ACCOUNTNUM,
        //         'DELIVERYDATE' => $DELIVERYDATE,
        //         'PURCHSTATUS' => $PURCHSTATUS
        //     );

        //     $data_purchline = array(
        //         'LINENUM' => $LINENUM,
        //         'ITEMID' => $ITEMID,
        //         'PURCHPRICE' => $PURCHPRICE,
        //         'QTYORDERED' => $QTYORDERED,
        //         'PURCHRECEIVEDNOW' => $PURCHRECEIVEDNOW,
        //         'LINEAMOUNT' => $LINEAMOUNT
        //     );
        //     $this->db->set('purchline.LINENUM', $LINENUM);
        //     $this->db->set('purchline.ITEMID', '5150');
        //     $this->db->set('purchline.PURCHPRICE', '100000');
        //     $this->db->set('purchline.QTYORDERED', '6');
        //     $this->db->set('purchline.PURCHRECEIVEDNOW', '2');
        //     $this->db->set('purchline.LINEAMOUNT', '300000');

        //     $this->db->where('purchline.INVENTTRANSID', 'MID101');
        //     $this->db->update('purchline');

        //     $this->db->set('purchtable.INVOICEACCOUNT', '1150');
        //     $this->db->set('purchtable.DELIVERYDATE', '2023-05-21');
        //     $this->db->set('purchtable.PURCHSTATUS', '1');

        //     $this->db->join('purchline', 'purchtable.PURCHID = purchline.PURCHID');
        //     $this->db->where('purchline.INVENTTRANSID', 'MID101');
        //     $this->db->update('purchtable');
        //     $this->db->trans_commit();
        // } catch (Exception $e) {
        //     $this->db->trans_rollback();
        //     return false;
        // }

        return true;
    }

    public function get_purcase_id($INVENTTRANSID)
    {
        $this->db->select('*');
        $this->db->from('purchline AS PL');
        $this->db->join('purchtable AS PT', 'PL.PURCHID = PT.PURCHID');
        $this->db->join('vendtable AS V', 'PT.INVOICEACCOUNT = V.ACCOUNTNUM');
        $this->db->join('inventtable AS I', 'PL.ITEMID = I.ITEMID');
        $this->db->where('INVENTTRANSID', $INVENTTRANSID);
        $result = $this->db->get()->row();
        // $query = $this->db->get_where('purchline', array('INVENTTRANSID' => $INVENTTRANSID));
        return $result;
    }

    public function delete($INVENTTRANSID, $PURCHID)
    {
        $this->db->trans_start();

        try {
            $this->db->where('INVENTTRANSID', $INVENTTRANSID);
            $this->db->delete('purchline');

            $this->db->where('PURCHID', $PURCHID);
            $this->db->delete('purchtable');

            $this->db->trans_complete();

            if ($this->db->trans_status() === false) {
                return false;
            }

            return true; // Transaksi berhasil
        } catch (Exception $e) {
            $this->db->trans_rollback();
            return false;
        }
    }

    //count total record
    public function get_transaction_count($searchBuyer = "", $searchDate = "", $searchStatus = "")
    {
        $this->db->select('*');
        $this->db->from('tbl_order AS TO');

        // $this->db->like('INVENTTRANSID', $INVENTTRANSID);
        // $this->db->like('NAME', $NAME);
        // $this->db->like('ITEMNAME', $ITEMNAME);
        if ($searchBuyer) {
            $this->db->like('buyerName', $searchBuyer);
        }

        if ($searchDate) {
            $formattedDate = date('Y-m-d', strtotime($searchDate));
            $this->db->where("DATE(orderTimestamp) =", $formattedDate);
        }

        if ($searchStatus != "") {
            $this->db->where('paymentStatus', $searchStatus);
        }
        $result = $this->db->count_all_results();

        return $result;
    }

    public function get_new_purcase_count($INVENTTRANSID = "", $NAME = "", $ITEMNAME = "")
    {
        $this->db->select('PT.PURCHID, NAME, SUM(LINEAMOUNT) AS TOTAL');
        $this->db->from('purchtable AS PT');
        $this->db->join('purchline AS PL', 'PL.PURCHID = PT.PURCHID');
        // $this->db->join('purchline', 'PT.PURCHID = PL.PURCHID');
        $this->db->join('vendtable AS V', 'PT.INVOICEACCOUNT = V.ACCOUNTNUM');
        $this->db->group_by('PT.PURCHID');
        // $this->db->order_by('purchtable.PURCHID', 'ASC');
        // $this->db->select('*');
        // $this->db->from('purchline AS PL');
        // $this->db->join('inventtable AS I', 'PL.ITEMID = I.ITEMID');

        // $this->db->like('INVENTTRANSID', $INVENTTRANSID);
        // $this->db->like('NAME', $NAME);
        // $this->db->like('ITEMNAME', $ITEMNAME);
        $this->db->order_by('INVENTTRANSID', 'DESC');


        $result = $this->db->count_all_results();

        return $result;
    }

    public function delete_order($idOrder)
    {
        $this->db->where('idOrder', $idOrder);
        $this->db->delete('tbl_order');
        return true;
    }

}