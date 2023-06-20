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

                        <input type="number" name="qtyOrder<?= $row->idCheckout ?>" max="<?php foreach ($product->result() as $singleView):
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