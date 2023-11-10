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
    <form class="mt-5 ml-5 mr-5" action="<?= base_url('Purcase/index') ?>" method="post">
        <div class="sm:flex justify-evenly">
            <div>
                <label for="default-search"> Cari SKU</label>
                <div>
                    <input class="mt-2 mb-4 w-full h-[40px] border text-black px-5  rounded-md shadow-md" type="text"
                        id="searchSKU" name="searchSKU" placeholder="Cari SKU"
                        value="<?= (isset($searchSKU)) ? $searchSKU : '' ?>">
                </div>
            </div>
            <div>
                <label for="default-search">Cari Barang</label>
                <div>

                    <input class="mt-2 mb-4 w-full h-[40px] border text-black px-5  rounded-md shadow-md" type="text"
                        id="searchProduct" name="searchProduct" placeholder="Cari Barang"
                        value="<?= (isset($searchProduct)) ? $searchProduct : '' ?>">
                </div>
            </div>
            <div>
                <label for="default-search">Cari Tanggal</label>
                <div>
                    <input class="mt-2 mb-4 w-full h-[40px] border text-black px-5  rounded-md shadow-md" type="date"
                        id="searchDate" name="searchDate" placeholder="Cari Tanggal"
                        value="<?= (isset($searchDate)) ? $searchDate : '' ?>">
                </div>
            </div>
            <div>
                <label class="opacity-0">Cari</label>
                <div>
                    <button type="submit" value="search" id="search" name="search"
                        class="text-white mt-2 right-2.5 sm:mb-5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm py-2 px-7 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Search</button>
                </div>
            </div>
        </div>
    </form>
    <div class="overflow-x-scroll">
        <table class=" w-[600px]  sm:w-full sm:mt-5">
            <div class="p-3 w-full sm:bg-dark">
                <thead class="bg-blue-400">
                    <tr class="text-[12px] sm:text-lg">
                        <th class="py-3">SKU</th>
                        <th class="py-3">NAMA BARANG</th>
                        <th class="py-3">HARGA BELI </th>
                        <th class="py-3">JUMLAH BELI </th>
                        <th class="py-3">TOTAL BELI </th>
                        <th class="py-3">TANGGAL BELI </th>
                        <th class="py-3">Action</th>
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
                            <td class="py-3 w-auto  ">
                                <?= $singleView->buyingPrice ?>
                            </td>
                            <td class="py-3 w-auto   ">
                                <?= $singleView->qtyPurcase ?>
                            </td>
                            <td class="py-3 w-auto  ">
                                <?= $singleView->priceAmount ?>
                            </td>
                            <td class="py-3 w-auto  ">
                                <?= $singleView->purcaseTimestamp ?>
                            </td>
                            <td class="py-3 w-auto text-white  text-center">
                                <!-- <button class="bg-lime-500 rounded-md px-3 py-1 shadow-md hover:bg-green-700"
                                onclick="insertDataPesan(<?= $singleView->idPurcase ?>)">Update</button> -->
                                <!-- <button class="bg-blue-500 rounded-md px-3 py-1 ml-2 shadow-md hover:bg-blue-700"
                            onclick="insertDataPesan(<?= $singleView->idPurcase ?>)">Details</button> -->
                                <form action="<?= site_url('purcase/get_update'); ?>" method="post">
                                    <button type="submit" value="<?= $singleView->idPurcase ?>" name="idPurcase"
                                        id="idPurcase"
                                        class="bg-lime-400 rounded-md px-3 py-1 shadow-md hover:bg-lime-600"><i
                                            class="fa-regular fa-pen-to-square"></i> Update</button>
                                </form>


                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </div>
        </table>
        <div>
            <div>
                <p class="px-5 font-bold">
                    Total Transaksi =
                    <?= $totalRow ?>
                </p>

            </div>
        </div>
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