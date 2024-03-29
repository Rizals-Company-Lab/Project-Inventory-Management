<!-- navbar end -->
<!-- tabel Details -->
<div class="h-auto w-full overflow-x-auto  sm:ml-5 sm:mr-5 rounded-md shadow-sm  ">
    <div class="sm:mt-10 mt-3">

        <h1 class="text-center sm:text-3xl text-sm  font-bold  bg-bg2 py-3 ml-3 mr-3">
            DETAILS RIWAYAT PEMBELIAN LIST
        </h1>

        <br>
    </div>
    <div class="flex sm:mt-3">
        <div>
            <a class="bg-dark sm:text-lg text-sm text-white sm:ml-5 ml-3 hover:bg-slate-600 px-3 py-2 rounded-md"
                href="<?php echo site_url('purcase/add_purcase'); ?>"><i class="fa-solid fa-cart-plus"></i> TAMBAH
                TRANSAKSI KOLAKKAN</a>
        </div>
        <div>

        </div>
    </div>
    <form action="<?= base_url('Purcase/index') ?>" method="post">
        <label for="default-search">SKU</label>
        <div>

            <input type="text" id="searchSKU" name="searchSKU" placeholder="Cari SKU"
                value="<?= (isset($searchSKU)) ? $searchSKU : '' ?>">
        </div>
        <label for="default-search">Barang</label>
        <div>

            <input type="text" id="searchProduct" name="searchProduct" placeholder="Cari Barang"
                value="<?= (isset($searchProduct)) ? $searchProduct : '' ?>">
        </div>
        <label for="default-search">Tanggal</label>
        <div>

            <input type="date" id="searchDate" name="searchDate" placeholder="Cari Tanggal"
                value="<?= (isset($searchDate)) ? $searchDate : '' ?>">
        </div>

        <button type="submit" value="search" id="search" name="search"
            class="text-white absolute right-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Search</button>
    </form>
    <div class="overflow-x-scroll">
        <table class=" w-[600px]  sm:w-full sm:mt-5">
            <div class="p-3 w-full sm:bg-dark">
                <thead class="bg-blue-400">
                    <tr class="text-[12px] sm:text-lg">
                        <th class="py-3">SKU</th>
                        <th class="py-3">NAMA BARANG</th>
                        <th class="py-3">TOTAL BELI </th>
                        <th class="py-3">TANGGAL BELI</th>
                    </tr>
                </thead>
                <?php foreach ($purcase->result() as $singleView): ?>
                    <tbody>
                        <tr
                            class="cursor-pointer text-[10px] sm:text-lg text-center bg-white py-2 hover:bg-blue-200 duration-300">
                            <td class="py-3 w-auto">
                                <?= $singleView->SKU ?>
                            </td>
                            <td class="py-3 w-auto  ">
                                <?= $singleView->productName ?>
                            </td>

                            <td class="py-3 w-auto   ">
                                <?= $singleView->qtyPurcase ?>
                            </td>

                            <td class="py-3 w-auto  ">
                                <?= $singleView->purcaseTimestamp ?>
                            </td>

                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </div>
        </table>
    </div>
    <div class="flex justify-center mt-4">
        <!-- Pagination -->
        <div class="pagination">
            <?php echo $pagination; ?>
        </div>
    </div>
</div>
<!-- akhir tabel Details -->
<script src="<?= base_url() ?>/dist/js/script.js"></script>
</body>

</html>