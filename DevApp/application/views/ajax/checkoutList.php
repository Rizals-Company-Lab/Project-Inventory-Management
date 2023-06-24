<div id="allContent">

    <table class="w-auto mx-auto p-4 sm:text-xl text-[11px]">
        <tr class="cursor-pointer duration-300">
            <th class="colom">SKU</th>
            <th class="colom">Nama Barang</th>
            <th class="colom">Deskripsi Barang</th>
            <th class="colom">Harga Jual</th>
            <th class="colom">Stock</th>
            <th class="colom">Action</th>
        </tr>
        <?php foreach ($product->result() as $singleView): ?>
        <tr class="cursor-pointer hover:bg-slate-200 duration-300">
            <td class="border px-3 py-2 shadow-sm">
                <?= $singleView->SKU ?>
            </td>
            <td class="border px-7 py-2 shadow-sm">
                <?= $singleView->productName ?>
            </td class="border px-3 py-2 shadow-sm">
            <td>
                <?= $singleView->productDescription ?>
            </td class="border px-5 py-2 shadow-sm">
            <td>
                <?= $singleView->sellingPrice ?>
            </td class="border px-3 py-2 shadow-sm">
            <td>
                <?= $singleView->sisa_stock ?>
            </td class="border px-3 py-2 shadow-sm">
            <td>
                <?php
                    $isSKUExist = in_array($singleView->SKU, array_column($checkout->result(), 'SKU'));
                    ?>
                <button class="bg-blue-700 rounded-md text-white px-5 py-1 shadow-md hover:bg-blue-900"
                    <?= $isSKUExist ? 'disabled' : '' ?> type="button"
                    onclick="insertDataPesan('<?= $singleView->SKU ?>')">Pesan</button>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
    <div>
        <br>
        <h1 class="font-bold text-2xl py-3 bg-bg2 text-center">PEMESANAN</h1>
        <table class="w-auto mt-3 p-4 sm:text-xl text-[11px]">
            <tr class="cursor-pointer duration-300">
                <th class="colom">SKU</th>
                <th class="colom">Nama Barang</th>
                <th class="colom">Deskripsi Barang</th>
                <th class="colom">Jumlah</th>
            </tr>
            <?php foreach ($checkout->result() as $row): ?>
            <tr>
                <td class="border px-3 py-2 shadow-sm">

                    <input type="hidden" name="SKU<?= $row->idCheckout ?>" id="SKU<?= $row->idCheckout ?>"
                        value="<?= $row->idCheckout ?>">

                    <input type="hidden" name="sellingPrice<?= $row->idCheckout ?>"
                        id="sellingPrice<?= $row->idCheckout ?>" value="<?= $row->sellingPrice ?>">
                    <!-- <?= $row->sellingPrice ?> -->
                </td>
                <td class="border px-3 py-2 shadow-sm">
                    <!-- <input type="hidden" name="productName<?= $row->productName ?>"
                                    id="productName<?= $row->productName ?>" value="<?= $row->productName ?>"> -->
                    <?= $row->productName ?>
                </td>
                <td class="border px-3 py-2 shadow-sm">
                    <?= $row->productDescription ?>
                </td>
                <td class="border px-3 py-2 shadow-sm">

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