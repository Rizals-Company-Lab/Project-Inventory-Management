<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page-Details-Riwayat-pembelian</title>
    <link href="<?= base_url() ?>/dist/css/output.css" rel="stylesheet">

</head>

<body class="bg-slate-200">
    <div class="sm:flex">
        <!-- Navbar star -->
        <nav class="mt-4 ml-4 mr-4 w-auto">
            <div class=" justify-around border rounded-md shadow-md bg-dark text-white">
                <div class="flex justify-between">
                    <img class="sm:w-[300px] w-[80px]" src="<?= base_url() ?>/dist/img/abk3.png" alt="">
                    <div class="flex items-center relative px-4 sm:hidden">
                        <button class="" id="tombolMenu" name="tombolMenu" type="button">
                            <span class="tombol-line transition duration-300 ease-in-out origin-top-left"></span>
                            <span class="tombol-line"></span>
                            <span class="tombol-line transition duration-300 ease-in-out origin-bottom-left"></span>
                        </button>
                    </div>
                </div>
                <div class="sm:h-[400px]">
                    <ul class=" sm:flex flex-col hidden  sm:rounded-none sm:shadow-none rounded-md shadow-md h-auto  ml-2 mr-2"
                        id="hilang" nama="hilang">
                        <li class="text-center sm:p-4 p-1 hover:bg-primary "><a class="hover:text-white"
                                href="<?= base_url('Home') ?>">HOME</a>
                        </li>
                        <li class="text-center sm:p-4 p-1 hover:bg-primary "><a class="hover:text-white "
                                href="<?php echo site_url('product');?>">PRODUK</a>
                        </li>
                        <li class="text-center sm:p-4 p-1 hover:bg-primary"><a class="hover:text-white"
                                href="<?php echo site_url('Transaction');?>">TRANSAKSI</a></li>
                        <li class="text-center sm:p-4 p-1 hover:bg-primary"><a class="hover:text-white"
                                href="<?php echo site_url('Purcase');?>">KOLAKAN</a></li>
                        <li class="text-center sm:p-4 p-1 hover:bg-primary"><a class="hover:text-white"
                                href="<?php echo site_url('report');?>">KEUNTUNGAN</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- navbar end -->

        <!-- tabel Details -->
        <div class="h-auto w-full  sm:ml-5 sm:mr-5 rounded-md shadow-sm  ">
            <div class="mt-10">

                <h1 class="text-center sm:text-3xl text-sm  font-bold  bg-bg2 py-3 ml-3 mr-3">
                    DETAILS RIWAYAT KOLAKKAN DAN LIST KEUNTUNGAN
                </h1>

                <br>
            </div>
            <div class="flex mt-3">

                <div class="">
                    <div class="sm:flex justify-evenly">
                        <div class="rounded-md  ml-3 mr-3 bg-red-500 py-3 px-3">
                            <h1 class="">
                                TOTAL BELI :
                                <input
                                    class="mt-2 text-center font-bold appearance-none w-full bg-gray-200 text-gray-700 border  rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                                    disabled type="text" value="<?= $grandTotal->grandTotalBuyingAmount ?>">
                            </h1>
                        </div>
                        <div class=" rounded-md sm:ml-3 ml-3 mr-3 mt-3 bg-blue-500 py-3 px-3">
                            <h1 class="">
                                TOTAL JUAL :
                                <input
                                    class="mt-2 text-center font-bold appearance-none w-full bg-gray-200 text-gray-700 border  rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                                    disabled type="text" value=" <?= $grandTotal->grandTotalSellingAmount ?>">

                            </h1>
                        </div>
                        <div class="rounded-md sm:ml-3 ml-3 mr-3 mt-3 py-3 px-3 bg-amber-300">
                            <h1 class="">
                                KEUNTUNGAN :
                                <input
                                    class="mt-2 text-center font-bold appearance-none w-full bg-gray-200 text-gray-700 border  rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                                    disabled type="text" value=" <?= $grandTotal->grandTotalDifference ?>">
                            </h1>
                        </div>
                        <div class="rounded-md sm:ml-3 ml-3 mr-3 mt-3 py-3 px-3 bg-lime-400">
                            <h1 class="">
                                ASET :
                                <input
                                    class="mt-2 text-center font-bold appearance-none w-full bg-gray-200 text-gray-700 border  rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                                    disabled type="text" value=" <?= $grandTotal->grandTotalaset ?>">
                            </h1>
                        </div>
                    </div>
                    <div class="rounded-md sm:mt-3 sm:ml-3 ml-3 mr-3 mt-3 py-3 px-3 bg-green-600">
                        <h1 class=" text-center">
                            PROFIT ESTIMASI
                            <input
                                class="mt-2 text-center font-bold appearance-none w-full bg-gray-200 text-gray-700 border  rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                                disabled type="text" value=" <?= $grandTotal->grandTotalProfitEstimation ?>">
                        </h1>
                    </div>
                </div>
            </div>

            <div class="overflow-x-scroll">
                <table class=" w-[900px] text-center  sm:w-full sm:mt-5">
                    <div class="p-3 w-full sm:bg-dark">
                        <thead class="bg-blue-400">
                            <tr class="text-[12px] sm:text-lg">
                                <th class="py-3">SKU</th>
                                <th class="py-3">NAMA BARANG</th>
                                <th class="py-3">HARGA JUAL </th>
                                <th class="py-3">TOTAL BELI </th>
                                <th class="py-3">TOTAL JUAL </th>
                                <th class="py-3"> KEUNTUNGAN</th>
                                <th class="py-3"> STOCK</th>
                                <th class="py-3"> ASET</th>
                                <th class="py-3"> PROF EST</th>
                            </tr>
                        </thead>
                        <?php foreach ($report->result() as $singleView): ?>
                        <tbody>
                            <tr
                                class="cursor-pointer bg-white sm:text-center text-[12px] sm:text-base hover:bg-slate-300 duration-300">

                                <td class="py-3 w-auto">
                                    <?= $singleView->SKU ?>
                                </td>
                                <td class="py-3 w-auto">
                                    <?= $singleView->productName ?>
                                </td>
                                <td class="py-3 w-auto">
                                    <?= $singleView->sellingPrice ?>
                                </td>
                                <td class="py-3 w-auto">
                                    <?= $singleView->buyingAmount ?>
                                </td>
                                <td class="py-3 w-auto">
                                    <?= $singleView->sellingAmount ?>
                                </td>
                                <td class="py-3 w-auto">
                                    <?= $singleView->selisih ?>
                                </td>
                                <td class="py-3 w-auto">
                                    <?= $singleView->stock ?>
                                </td>
                                <td class="py-3 w-auto">
                                    <?= $singleView->aset ?>
                                </td>
                                <td class="py-3 w-auto">
                                    <?= $singleView->profitEstimation ?>
                                </td>

                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </div>
                </table>
            </div>
            <?= $pagination ?>
        </div>
        <!-- akhir tabel Details -->
    </div>
    <script src="<?= base_url() ?>/dist/js/script.js"></script>

</body>

</html>