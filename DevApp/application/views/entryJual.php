<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>test</title>
</head>

<body>
    <a href="<?= site_url('Purcase/add_new_purcase'); ?>" class="btn btn-primary mb-3">Tambah
        Purcase</a>

    <table>
        <tr>
            <th>Nama Pembeli</th>
            <th>Waktu Order</th>
            <th>Status Pembayaran</th>
            <th>Action</th>
        </tr>
        <?php foreach ($transaction->result() as $singleView): ?>
            <tr>

                <td>
                    <?= $singleView->buyerName ?>
                </td>

                <td>
                    <?= $singleView->orderTimestamp ?>
                </td>

                <td>
                    <?= $singleView->paymentStatus ?>
                </td>
                <td>
                    <button onclick="insertDataPesan(<?= $singleView->idOrder ?>)">Update</button>
                </td>
                <td>
                    <button onclick="insertDataPesan(<?= $singleView->idOrder ?>)">Details</button>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>

</html>