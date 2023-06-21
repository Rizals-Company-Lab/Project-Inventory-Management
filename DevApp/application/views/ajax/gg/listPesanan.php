<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>test</title>
</head>

<body>

    <table>
        <tr>
            <th>SKU</th>
            <th>Nama Barang</th>
            <th>Deskripsi Barang</th>
            <th>Harga Jual</th>
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
                    <button onclick="insertDataPesan(<?= $singleView->SKU ?>)">Pesan</button>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>

</html>