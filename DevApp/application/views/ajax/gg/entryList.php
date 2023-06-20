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
            <?= $singleView->QTY ?>
        </td>
        <td>
            <?php
            $isSKUExist = in_array($singleView->SKU, array_column($checkout, 'SKU'));
            ?>
            <button <?= $isSKUExist ? 'disabled' : '' ?> onclick="insertDataPesan('<?= $singleView->SKU ?>')">Pesan</button>

        </td>
    </tr>
<?php endforeach; ?>