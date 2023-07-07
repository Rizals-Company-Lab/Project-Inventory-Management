<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page-Riwayat-pembelian</title>
    <link href="<?= base_url() ?>/dist/css/output.css" rel="stylesheet">

</head>

<body>
    <!-- <?= var_dump($detailOrder[0]->buyerName) ?> -->

    <form action="<?= site_url('Transaction/update_order'); ?>" method="post">

        <input type="hidden" name="idOrder" id="idOrder" value="<?= $detailOrder[0]->idOrder ?>">

        <label>Nama Pembeli</label>
        <input type="text" name="buyerName" id="buyerName" value="<?= $detailOrder[0]->buyerName ?>">


        <label> rekening</label>
        <input type="text" name="bankAccountNumber" id="bankAccountNumber"
            value="<?= $detailOrder[0]->bankAccountNumber ?>">


        <label>orderTimestamp</label>
        <input type="text" name="orderTimestamp" id="orderTimestamp" value="<?= $detailOrder[0]->orderTimestamp ?>"
            disabled>

        <label>paymentStatus</label>
        <select name="paymentStatus" id="paymentStatus">
            <option value="0" <?= ($detailOrder[0]->paymentStatus == 0) ? 'selected' : '' ?>>Pending</option>
            <option value="1" <?= ($detailOrder[0]->paymentStatus == 1) ? 'selected' : '' ?>>Done</option>
        </select>


        <table>
            <tr>
                <th class="colom">SKU</th>
                <th class="colom ">Nama Barang</th>
                <th class="colom">Product Price</th>
                <th class="colom">Jumlah</th>
                <th class="colom">Subtotal</th>
            </tr>
            <?php
        $total = 0;
        foreach ($detailOrder as $row): ?>
            <tr>
                <td>


                    <?= $row->SKU ?>
                </td>
                <td>
                    <?= $row->productName ?>
                </td>
                <td>
                    <?= $row->productPrice ?>
                </td>
                <td>
                    <?= $row->qtyOrder ?>
                </td>
                <td>
                    <?= $row->priceAmount ?>
                </td>
            </tr>
            <?php $total += $row->priceAmount; endforeach; ?>
        </table>
        <h1>Total = <?= $total ?></h1>

        <br>
        <button type="submit" name="save" id="save" value="save">Simpan</button>

    </form>
    <script src="<?= base_url() ?>/dist/js/script.js"></script>
</body>

</html>