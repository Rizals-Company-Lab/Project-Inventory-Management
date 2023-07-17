<div id="allContent">
    <table class="w-full mt-5">
        <div class="p-3 bg-dark">
            <thead class="bg-blue-400">
                <tr class="cursor-pointer duration-300">
                    <th class="py-3">SKU</th>
                    <th class="py-3">Nama Barang</th>
                    <th class="py-3">Deskripsi Barang</th>
                    <th class="py-3">Harga Jual</th>
                    <th class="py-3">Stock</th>
                    <th class="py-3">Action</th>
                </tr>
            </thead>
            <?php foreach ($product->result() as $singleView): ?>
            <tbody class="">
                <tr class="cursor-pointer bg-white py-2  hover:bg-slate-200 duration-300">
                    <td class="py-3 w-auto">
                        <?= $singleView->SKU ?>
                    </td>
                    <td class="py-3 w-auto">
                        <?= $singleView->productName ?>
                    </td>
                    <td class="py-3 w-auto">
                        <?= $singleView->productDescription ?>
                    </td>
                    <td class="py-3 w-auto">
                        <?= $singleView->sellingPrice ?>
                    </td>
                    <td class="py-3 w-auto">
                        <?= $singleView->sisa_stock ?>
                    </td>
                    <td class="py-3 w-auto">
                        <?php
                
                    
                    $isSKUExist = in_array($singleView->SKU, array_column($checkout->result(), 'SKU'));
                
                            ?>
                        <button class="bg-blue-700 rounded-md text-white px-5 py-1 shadow-md hover:bg-blue-900"
                            <?= $isSKUExist &&  $singleView->sisa_stock > 0 ? 'disabled' : '' ?> type="button"
                            onclick="insertDataPesan('<?= $singleView->SKU ?>')">Pesan</button>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </div>
    </table>
    <br>
    <div>
        <h1 class="font-bold text-2xl py-3 bg-bg2 text-center">PEMESANAN</h1>
        <table class="w-full mt-5">
            <div class="p-3 bg-dark">
                <thead class="bg-blue-400">
                    <tr class="cursor-pointer duration-300">
                        <th class="py-3 ">Nama Barang</th>
                        <th class="py-3">Deskripsi Barang</th>
                        <th class="py-3">Jumlah</th>
                        <th class="py-3">Delete</th>
                    </tr>
                </thead>
                <?php foreach ($checkout->result() as $row): ?>
                <tbody>

                    <tr class="cursor-pointer bg-white py-2 text-center hover:bg-slate-200 duration-300">

                        <input type="hidden" name="SKU<?= $row->idCheckout ?>" id="SKU<?= $row->idCheckout ?>"
                            value="<?= $row->idCheckout ?>">

                        <input type="hidden" name="sellingPrice<?= $row->idCheckout ?>"
                            id="sellingPrice<?= $row->idCheckout ?>" value="<?= $row->sellingPrice ?>">
                        <!-- <?= $row->sellingPrice ?> -->
                        <td class="py-3 w-auto">
                            <!-- <input type="hidden" name="productName<?= $row->productName ?>"
                                    id="productName<?= $row->productName ?>" value="<?= $row->productName ?>"> -->
                            <?= $row->productName ?>
                        </td>
                        <td class="py-3 w-auto">
                            <?= $row->productDescription ?>
                        </td>
                        <td class="py-3 w-auto">

                            <input
                                class="peer block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-3 leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 peer-focus:text-primary data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-neutral-200 dark:placeholder:text-neutral-200 dark:peer-focus:text-primary [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0"
                                type="number" name="qtyOrder<?= $row->idCheckout ?>" value="1" min="1" max="<?php foreach ($product->result() as $singleView):
                                      if ($row->SKU == $singleView->SKU) {
                                          echo $singleView->sisa_stock;
                                      }
                                  endforeach; ?>">
                        </td>
                        <td class="py-3 w-auto">

                            <button class="bg-blue-700 rounded-md text-white px-5 py-1 shadow-md hover:bg-blue-900"
                                type="button" onclick="deleteDataPesan('<?= $row->SKU ?>')">-</button>
                        </td>

                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </div>
        </table>
    </div>
</div>