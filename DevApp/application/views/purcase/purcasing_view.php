<!-- navbar end -->
<!-- tabel Details -->
<div class="h-auto w-full overflow-x-auto  sm:ml-5 sm:mr-5 rounded-md shadow-sm  ">
    <div class="mt-10">

        <h1 class="text-center sm:text-3xl text-sm  font-bold  bg-bg2 py-3 ml-3 mr-3">
            DETAILS RIWAYAT PEMBELIAN LIST
        </h1>

        <br>
    </div>
    <div class="flex mt-3">
        <div>
            <a class="bg-dark text-white sm:ml-5 ml-3 hover:bg-slate-600 px-3 py-2 rounded-md"
                href="<?php echo site_url('purcase/add_purcase'); ?>"><i class="fa-solid fa-cart-plus"></i> TAMBAH
                TRANSAKSI</a>
        </div>
        <div>

        </div>
    </div>
    <table class="w-full mt-5">
        <div class="p-3 bg-dark">
            <thead class="bg-blue-400">
                <tr class="cursor-pointer duration-300">
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
                <tr class="cursor-pointer text-center bg-white py-2 hover:bg-blue-200 duration-300">
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
                            <button type="submit" value="<?= $singleView->idPurcase ?>" name="idPurcase" id="idPurcase"
                                class="bg-lime-400 rounded-md px-3 py-1 shadow-md hover:bg-lime-600"><i
                                    class="fa-regular fa-pen-to-square"></i> Update</button>
                        </form>


                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </div>
    </table>
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