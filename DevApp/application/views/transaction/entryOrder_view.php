<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Entry Order</title>
</head>

<body>
    <form action="<?= site_url('transaction/save_transaction'); ?>" method="post">
        <label for="buyerName">Nama Pembeli</label>
        <input required type="text" name="buyerName" id="buyerName">
        <label for="bankAccountNumber">Rekening</label>
        <input required type="text" name="bankAccountNumber" id="bankAccountNumber">

        <div id="allContent">
            <table>
                <tr>
                    <th>SKU</th>
                    <th>Nama Barang</th>
                    <th>Deskripsi Barang</th>
                    <th>Harga Jual</th>
                    <th>Stock</th>
                    <th>Action</th>
                </tr>
                <?php foreach ($product->result() as $singleView): ?>
                    <tr>
                        <td>
                            <?= $singleView->SKU ?>
                        </td>
                        <td>
                            <?= $singleView->productName ?>
                        </td>
                        <td>
                            <?= $singleView->productDescription ?>
                        </td>
                        <td>
                            <?= $singleView->sellingPrice ?>
                        </td>
                        <td>
                            <?= $singleView->sisa_stock ?>
                        </td>
                        <td>
                            <?php
                            $isSKUExist = in_array($singleView->SKU, array_column($checkout->result(), 'SKU'));
                            ?>
                            <button <?= $isSKUExist ? 'disabled' : '' ?> type="button"
                                onclick="insertDataPesan('<?= $singleView->SKU ?>')">Pesan</button>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
            <div>
                <table>
                    <tr>
                        <th>SKU</th>
                        <th>Nama Barang</th>
                        <th>Deskripsi Barang</th>
                        <th>Jumlah</th>
                    </tr>
                    <?php foreach ($checkout->result() as $row): ?>
                        <tr>
                            <td>

                                <input type="hidden" name="SKU<?= $row->idCheckout ?>" id="SKU<?= $row->idCheckout ?>"
                                    value="<?= $row->idCheckout ?>">

                                <input type="hidden" name="sellingPrice<?= $row->idCheckout ?>"
                                    id="sellingPrice<?= $row->idCheckout ?>" value="<?= $row->sellingPrice ?>">
                                <!-- <?= $row->sellingPrice ?> -->
                            </td>
                            <td>
                                <!-- <input type="hidden" name="productName<?= $row->productName ?>"
                                    id="productName<?= $row->productName ?>" value="<?= $row->productName ?>"> -->
                                <?= $row->productName ?>
                            </td>
                            <td>
                                <?= $row->productDescription ?>
                            </td>
                            <td>

                                <input type="number" name="qtyOrder<?= $row->idCheckout ?>" value="1" min="1" max="<?php foreach ($product->result() as $singleView):
                                      if ($row->SKU == $singleView->SKU) {
                                          echo $singleView->sisa_stock;
                                      }
                                  endforeach; ?>">
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            </div>
        </div>
        <button type="submit">Submit</button>
    </form>
</body>

<script src="<?= base_url() ?>dist/js/jquery.min.js"></script>
<script type="text/javascript">

    function insertDataPesan(SKU) {
        $.ajax({
            url: "<?= base_url('transaction/insert_checkout') ?>",
            type: "post",
            data: { SKU: SKU },
            success: function (response) {
                console.log(response);
                $("#allContent").html(response);
                // $.ajax({
                //     type: "GET",
                //     url: "dist/ajax/ajaxEntry.php",
                //     data: "",
                //     success: function (data) {
                //         $("#allContent").html(data);
                //         operasi();
                //     }
                // });
            }
        });
    }

</script>

</html>