<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaction</title>
</head>

<body>
    <a href="<?= site_url('Product/add_new_product'); ?>" class="btn btn-primary mb-3">Tambah
        Product</a>

    <table>
        <tr>
            <th>SKU</th>
            <th>Nama Barang</th>
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
                    <?= $singleView->sellingPrice ?>
                </td>
                <td>
                    <?= $singleView->sisa_stock ?>
                </td>
                <td>
                    <button onclick="insertDataPesan(<?= $singleView->SKU ?>)">Update</button>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>

</html>