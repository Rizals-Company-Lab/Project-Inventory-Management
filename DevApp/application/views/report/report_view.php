<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page-Details-Riwayat-pembelian</title>
    <link href="<?= base_url() ?>/dist/css/output.css" rel="stylesheet">

</head>

<body>
    <!-- Navbar star -->
    <nav class="mt-4 ml-4 mr-4 w-auto">
        <div class="sm:flex justify-around border rounded-md shadow-md  bg-dark text-white">
            <div class="flex justify-between">
                <h1 class=" p-5">LOGO</h1>
                <div class="flex items-center relative px-4 sm:hidden">
                    <button class="" id="tombolMenu" name="tombolMenu" type="button">
                        <span class="tombol-line transition duration-300 ease-in-out origin-top-left"></span>
                        <span class="tombol-line"></span>
                        <span class="tombol-line transition duration-300 ease-in-out origin-bottom-left"></span>
                    </button>
                </div>
            </div>
            <div class="sm:flex  ">
                <ul class="sm:flex  sm:border-none sm:rounded-none sm:shadow-none border rounded-md shadow-md hidden  ml-2 mr-2 mb-2;"
                    id="hilang" nama="hilang">
                    <li class="text-center sm:p-4 p-1 hover:bg-primary"><a class="hover:text-white" href="Home">HOME</a>
                    </li>
                    <li class="text-center sm:p-4 p-1 hover:bg-primary"><a class="hover:text-white"
                            href="<?php echo site_url('product'); ?>">PRODUK</a>
                    </li>
                    <li class="text-center sm:p-4 p-1 hover:bg-primary"><a class="hover:text-white"
                            href="">TRANSAKSI</a></li>
                    <li class="text-center sm:p-4 p-1 hover:bg-primary"><a class="hover:text-white" href="">KONTAK</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- navbar end -->
    <!-- tabel Details -->
    <div class="mt-10">

        <h1 class="text-center sm:text-3xl text-sm  font-bold  bg-bg2 py-3 ml-3 mr-3">
            DETAILS RIWAYAT PEMBELIAN LIST
        </h1>

        <br>
    </div>
    <div class="h-auto w-auto overflow-x-auto  sm:ml-5 sm:mr-5 rounded-md shadow-sm  ">
        <div class="flex mt-3">

            <div>
                <h1>
                    TOTAL BELI :
                    <?= $grandTotal->grandTotalBuyingAmount ?>
                </h1>
                <h1>
                    TOTAL JUAL :
                    <?= $grandTotal->grandTotalSellingAmount ?>
                </h1>
                <h1>
                    KEUNTUNGAN :
                    <?= $grandTotal->grandTotalDifference ?>
                </h1>
                <h1>
                    ASET :
                    <?= $grandTotal->grandTotalaset ?>
                </h1>
                <h1>
                    PROFIT ESTIMASI :
                    <?= $grandTotal->grandTotalProfitEstimation ?>
                </h1>
            </div>
        </div>
        <table class="w-auto mx-auto mb-10 mt-10  shadow-2xl border-2 sm:text-xl text-[11px]">
            <thead>
                <tr class="cursor-pointer duration-300">
                    <th class="p-1 border shadow-md bg-bg ">No</th>
                    <th class="kolom">SKU</th>
                    <th class="kolom">NAMA BARANG</th>
                    <th class="kolom">HARGA JUAL </th>
                    <th class="kolom">TOTAL BELI </th>
                    <th class="kolom">TOTAL JUAL </th>
                    <th class="kolom"> KEUNTUNGAN</th>
                    <th class="kolom"> STOCK</th>
                    <th class="kolom"> ASET</th>
                    <th class="kolom"> PROF EST</th>
                </tr>
            </thead>
            <?php foreach ($report->result() as $singleView): ?>
            <tbody>
                <tr class="cursor-pointer hover:bg-slate-100 duration-300">
                    <td class="border-2 p-2">1</td>
                    <td class="border-2 p-1 shadow-md">
                        <?= $singleView->SKU ?>
                    </td>
                    <td class="border-2 p-1  shadow-md ">
                        <?= $singleView->productName ?>
                    </td>
                    <td class="border-2 p-1  shadow-md ">
                        <?= $singleView->sellingPrice ?>
                    </td>
                    <td class="border-2 p-1  shadow-md ">
                        <?= $singleView->buyingAmount ?>
                    </td>
                    <td class="border-2 p-1  shadow-md ">
                        <?= $singleView->sellingAmount ?>
                    </td>
                    <td class="border-2 p-1  shadow-md ">
                        <?= $singleView->selisih ?>
                    </td>
                    <td class="border-2 p-1  shadow-md ">
                        <?= $singleView->stock ?>
                    </td>
                    <td class="border-2 p-1  shadow-md ">
                        <?= $singleView->aset ?>
                    </td>
                    <td class="border-2 p-1  shadow-md ">
                        <?= $singleView->profitEstimation ?>
                    </td>

                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <?= $pagination ?>
    </div>
    <!-- akhir tabel Details -->
    <script src="<?= base_url() ?>/dist/js/script.js"></script>
</body>

</html>