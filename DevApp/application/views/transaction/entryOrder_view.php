<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="<?= base_url() ?>/dist/css/output.css" rel="stylesheet">

    <title>Entry Order</title>
</head>

<body>
    <form
        class="sm:mx-auto overflow-hidde bg-white sm:mt-5 relative mb-5 w-auto mt-6 h-[500px] sm:w-[75%] sm:h-[90%] p-3 ml-3 mr-3  shadow-sm border shadow-white rounded-md group"
        action="<?= site_url('transaction/save_transaction'); ?>" method="post">
        <h1 class="font-bold text-2xl py-3 bg-bg2 text-center">TAMBAH TRANSAKSI</h1>
        <br>
        <div class="flex w-full justify-evenly">
            <div>
                <label class="font-bold text-lg " for="buyerName">Nama Pembeli</label>

                <input
                    class="mt-2 appearance-none w-full bg-gray-200 text-gray-700 border border-blue-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                    required type="text" name="buyerName" id="buyerName">
            </div>
            <div class="ml-10">
                <label class="font-bold text-lg" for="bankAccountNumber">Rekening</label>

                <input
                    class="mt-2 appearance-none  w-full bg-gray-200 text-gray-700 border border-blue-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                    type="text" name="bankAccountNumber" id="bankAccountNumber">
            </div>
        </div>

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
                    </td>
                    <td class="border px-5 py-2 shadow-sm">
                        <?= $singleView->productDescription ?>
                    </td>
                    <td class="border px-3 py-2 shadow-sm">
                        <?= $singleView->sellingPrice ?>
                    </td>
                    <td class="border px-3 py-2 shadow-sm">
                        <?= $singleView->sisa_stock ?>
                    </td>
                    <td class="border px-3 py-2 shadow-sm">
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
            <br>
            <div>
                <h1 class="font-bold text-2xl py-3 bg-bg2 text-center">PEMESANAN</h1>
                <table class="w-auto mt-3 p-4 sm:text-xl text-[11px]">
                    <tr class="cursor-pointer duration-300">
                        <th class="colom">SKU</th>
                        <th class="colom ">Nama Barang</th>
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

                            <input type="number" name="qtyOrder<?= $row->idCheckout ?>" value="1" min="1" max="<?php foreach ($product->result() as $singleView):
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
        <button class="text-lg font-bold mt-3 px-[50px] text-white py-2 w-full rounded-sm bg-blue-500 hover:bg-lime-500"
            type="submit">PESAN SEKARANG</button>
    </form>
</body>

<script src="<?= base_url() ?>dist/js/jquery.min.js"></script>
<script type="text/javascript">
function insertDataPesan(SKU) {
    $.ajax({
        url: "<?= base_url('transaction/insert_checkout') ?>",
        type: "post",
        data: {
            SKU: SKU
        },
        success: function(response) {
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