<!-- navbar end -->
<!-- tabel penjualan -->
<div class="h-auto w-full overflow-x-auto  sm:ml-5 sm:mr-5 rounded-md shadow-sm  ">
    <div class="mt-5">

        <h1 class="text-center sm:text-3xl text-xl font-bold bg-bg2 py-3 ">
            LIST BARANG PENJUALAN
        </h1>

        <div class="flex sm:mt-4 mt-3">
            <div>
                <a class="bg-slate-900 text-white text-[12px] sm:text-xl px-3 py-2 ml-3 rounded-md"
                    href="<?= site_url('Product/add_product'); ?>"><i class="fa-sharp fa-solid fa-cart-plus"></i>
                    TAMBAH DAFTAR
                    BARANG PENJUALAN</a>
            </div>
        </div>
    </div>
    <div class="">
        <form class="mt-5" action="<?= base_url('Product/index') ?>" method="post">
            <label for="default-search">SKU</label>
            <div>
                <input class="mt-2 mb-4 w-full h-[40px] border text-black px-5  rounded-md shadow-md" type="search"
                    id="searchSKU" name="searchSKU" placeholder="Cari SKU"
                    value="<?= (isset($searchSKU)) ? $searchSKU : '' ?>">
            </div>
            <label for="default-search">Cari Barang</label>
            <div>

                <input class="mt-2 mb-4 w-full h-[40px] border text-black px-5  rounded-md shadow-md" type="search"
                    id="searchProduct" name="searchProduct" placeholder="Cari Barang"
                    value="<?= (isset($searchProduct)) ? $searchProduct : '' ?>">
            </div>
            <button type="submit" value="search" id="search" name="search"
                class="text-white right-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Search</button>
        </form>
    </div>
    <div class="overflow-x-scroll">
        <table class=" w-[600px] sm:text-sm  sm:w-full sm:mt-5">
            <div class="p-3 w-full sm:bg-dark">
                <thead class="bg-blue-400">
                    <tr class="text-[10px] sm:text-[14px]">
                        <th class="py-3  ">SKU</th>
                        <th class="py-3 sm:text-left">NAMA BARANG</th>
                        <th class="py-3 sm:text-left ">DESKRIPSI BARANG </th>
                        <th class="py-3 ">STOK</th>
                        <th class="py-3 ">HARGA UMUM</th>
                        <th class="py-3 ">HARGA DISTRIBUTOR</th>
                        <th class="py-3 ">HARGA MATERIAL</th>
                        <th class="py-3 ">Action</th>
                    </tr>
                </thead>
                <tbody class="">
                    <?php foreach ($product->result() as $singleView): ?>
                    <tr class=" bg-white py-2 text-[9px] sm:text-[13px] cursor-pointer  hover:bg-slate-300">
                        <td class="py-3 w-auto px-3">
                            <?= $singleView->SKU ?>
                        </td>
                        <td class="py-3 w-auto ">
                            <?= $singleView->productName ?>
                        </td>
                        <td class="py-3 w-auto ">
                            <?= $singleView->productDescription ?>
                        </td>
                        <td class="py-3 w-auto px-3">
                            <?= $singleView->sisa_stock ?>
                        </td>
                        <td class="py-3 w-auto text-center px-3">
                            <?= $singleView->sellingPrice ?>
                        </td>
                        <td class="py-3 w-auto text-center px-3">
                            <?= $singleView->distributorPrice ?>
                        </td>
                        <td class="py-3 w-auto text-center px-3">
                            <?= $singleView->materialPrice ?>
                        </td>
                        <td class="flex text-white justify-center mt-1">
                            <form action="<?= site_url('product/get_update'); ?>" method="post">
                                <button type="submit" value="<?= $singleView->SKU ?>" name="SKU" id="SKU"
                                    class="bg-lime-500 rounded-md sm:px-3 px-2 py-1 shadow-md hover:bg-green-700"><i
                                        class="sm:flex hidden fa-regular fa-pen-to-square"></i> Update</button>
                            </form>
                            <form action="<?= site_url('product/delete_product'); ?>" method="post">
                                <button type="submit" value="<?= $singleView->SKU ?>" name="SKU" id="SKU"
                                    onclick="return confirm('Anda yakin ingin delete <?= $singleView->SKU ?>')"
                                    class="bg-red-500 rounded-md ml-2 px-3 py-1 shadow-md hover:bg-red-700">Delete</button>
                            </form>
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

</div>
</div>
<!-- akhir tabel penjualan -->
<script src="<?= base_url() ?>/dist/js/script.js"></script>
</body>

</html>