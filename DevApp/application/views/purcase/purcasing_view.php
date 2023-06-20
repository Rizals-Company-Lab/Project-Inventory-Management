<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaction</title>
</head>

<body>
    <a href="<?= site_url('Purcase/add_purcase'); ?>" class="btn btn-primary mb-3">Tambah
        Pembelian</a>

    <table>
        <tr>
            <th>SKU</th>
            <th>Nama Barang</th>
            <th>Harga Beli</th>
            <th>Jumlah Beli</th>
            <th>Total</th>
            <th>Tanggal Beli</th>
            <th>Action</th>
        </tr>
        <?php foreach ($purcase->result() as $singleView): ?>
            <tr>
                <td>
                    <?= $singleView->SKU ?>
                </td>
                <td>
                    <?= $singleView->productName ?>
                </td>
                <td>
                    <?= $singleView->buyingPrice ?>
                </td>
                <td>
                    <?= $singleView->qtyPurcase ?>
                </td>
                <td>
                    <?= $singleView->priceAmount ?>
                </td>
                <td>
                    <?= $singleView->purcaseTimestamp ?>
                </td>
                <td>
                    <button onclick="insertDataPesan(<?= $singleView->idPurcase ?>)">Update</button>
                </td>
                <td>
                    <button onclick="insertDataPesan(<?= $singleView->idPurcase ?>)">Details</button>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
    <?= $pagination ?>
</body>

</html>