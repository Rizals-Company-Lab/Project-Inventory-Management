<body>
    <form
        class="sm:mx-auto  bg-white sm:mt-5 relative mb-5 w-auto mt-6 h-full sm:w-[75%] sm:h-[90%] p-3 ml-3 mr-3  shadow-sm border shadow-white rounded-md group"
        action="<?= site_url('transaction_material/save_transaction'); ?>" method="post">
        <h1 class="font-bold sm:text-2xl text-base py-3 bg-bg2 text-center">TAMBAH TRANSAKSI</h1>
        <br>
        <div class="flex w-full justify-evenly">
            <div>
                <label class="font-bold sm:text-lg text-sm " for="buyerName">Nama Pembeli</label>

                <input
                    class="mt-2 appearance-none w-full bg-gray-200 text-gray-700 border border-blue-500 rounded sm:py-3 py-1 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                    required type="text" name="buyerName" id="buyerName">
            </div>
            <div class="ml-10">
                <label class="font-bold sm:text-lg text-base " for="bankAccountNumber">Rekening</label>

                <input
                    class="mt-2 appearance-none  w-full bg-gray-200 text-gray-700 border border-blue-500 rounded sm:py-3 py-1 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                    type="text" name="bankAccountNumber" id="bankAccountNumber">
            </div>
        </div>

        <div id="allContent">
            <div class="overflow-x-scroll">
                <table class=" w-[500px] sm:w-full mt-5">
                    <div class="p-3 w-full sm:bg-dark">
                        <thead class="bg-blue-400">
                            <tr class="text-[12px] sm:text-xl">
                                <th class="py-3">SKU</th>
                                <th class="py-3">Nama Barang</th>
                                <th class="py-3">Deskripsi Barang</th>
                                <th class="py-3">Harga Jual</th>
                                <th class="py-3">Stock</th>
                                <th class="py-3">Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php foreach ($product->result() as $singleView): ?>
                                <tr
                                    class="cursor-pointer text-[10px] sm:text-xl bg-white py-2  hover:bg-slate-200 duration-300">
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
                                        <?= $singleView->materialPrice ?>
                                    </td>
                                    <td class="py-3 w-auto">
                                        <?= $singleView->sisa_stock ?>
                                    </td>
                                    <td class="py-3 w-auto">
                                        <?php


                                        $isSKUExist = in_array($singleView->SKU, array_column($checkout->result(), 'SKU'));

                                        ?>
                                        <button
                                            class="bg-blue-700 rounded-md text-white px-5 py-1 shadow-md hover:bg-blue-900"
                                            <?= $isSKUExist && $singleView->sisa_stock > 0 ? 'disabled' : '' ?> type="button"
                                            onclick="insertDataPesan('<?= $singleView->SKU ?>')">Pesan</button>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </div>
                </table>
            </div>
            <br>
            <div>
                <h1 class="font-bold sm:text-2xl text-base py-3 bg-bg2 text-center">PEMESANAN</h1>
                <div class="overflow-x-scroll">

                    <table class=" w-[500px] sm:w-full sm:mt-5">
                        <div class="p-3 w-full sm:bg-dark">
                            <thead class="bg-blue-400">
                                <tr class="text-[12px] sm:text-xl">
                                    <th class="py-3 ">Nama Barang</th>
                                    <th class="py-3">Deskripsi Barang</th>
                                    <th class="py-3">Jumlah</th>
                                    <th class="py-3">Delete</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php foreach ($checkout->result() as $row): ?>
                                    <tr>

                                        <input type="hidden" name="SKU<?= $row->idCheckout ?>"
                                            id="SKU<?= $row->idCheckout ?>" value="<?= $row->idCheckout ?>">

                                        <input type="hidden" name="materialPrice<?= $row->idCheckout ?>"
                                            id="materialPrice<?= $row->idCheckout ?>" value="<?= $row->materialPrice ?>">
                                        <!-- <?= $row->materialPrice ?> -->
                                        <td class="border px-3 py-2 shadow-sm">
                                            <!-- <input type="hidden" name="productName<?= $row->productName ?>"
                                        id="productName<?= $row->productName ?>" value="<?= $row->productName ?>"> -->
                                            <?= $row->productName ?>
                                        </td>
                                        <td class="border px-3 py-2 shadow-sm">
                                            <?= $row->productDescription ?>
                                        </td>
                                        <td class="border px-3 py-2 shadow-sm">

                                            <input type="number" name="qtyOrder<?= $row->idCheckout ?>" value="1" min="1"
                                                max="<?php foreach ($product->result() as $singleView):
                                                    if ($row->SKU == $singleView->SKU) {
                                                        echo $singleView->sisa_stock;
                                                    }
                                                endforeach; ?>">
                                        </td>
                                        <td class="border px-3 py-2 shadow-sm">

                                            <button
                                                class="bg-blue-700 rounded-md text-white px-5 py-1 shadow-md hover:bg-blue-900"
                                                type="button" onclick="deleteDataPesan('<?= $row->SKU ?>')">-</button>
                                        </td>

                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </div>
                    </table>
                </div>
            </div>
        </div>
        <button
            class="sm:text-lg text-sm mb-3 sm:font-bold font-semibold mt-3 px-[50px] text-white py-2 w-full rounded-sm bg-blue-500 hover:bg-lime-500"
            type="submit">PESAN SEKARANG</button>
        <button
            class="sm:text-lg w-full text-sm font-bold px-[100px] text-white py-2 rounded-sm bg-red-700 hover:bg-primary">
            <a href="<?= base_url() ?>transaction_material">kembali</a>
        </button>
    </form>
</body>
<script src="<?= base_url() ?>/dist/js/script.js"></script>

<script src="<?= base_url() ?>dist/js/jquery.min.js"></script>
<script type="text/javascript">
    function insertDataPesan(SKU) {
        $.ajax({
            url: "<?= base_url('transaction_material/insert_checkout') ?>",
            type: "post",
            data: {
                SKU: SKU
            },
            success: function (response) {
                console.log(response);
                $("#allContent").html(response);
                // $.ajax({
                //     type: "GET",
                //     url: "dist/ajax/ajaxEntry.php",
                //     data: "",
                //     success: function (data) {
                //         $("#allContent").html(data);
                //         operasi();
                //     }
                // });
            }
        });
    }

    function deleteDataPesan(SKU) {
        $.ajax({
            url: "<?= base_url('transaction_material/delete_checkout') ?>",
            type: "post",
            data: {
                SKU: SKU
            },
            success: function (response) {
                console.log(response);
                $("#allContent").html(response);
                // $.ajax({
                //     type: "GET",
                //     url: "dist/ajax/ajaxEntry.php",
                //     data: "",
                //     success: function (data) {
                //         $("#allContent").html(data);
                //         operasi();
                //     }
                // });
            }
        });
    }
</script>

</html>