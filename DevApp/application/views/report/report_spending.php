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
                    <ul class=" sm:flex flex-col hidden sm:border-none sm:rounded-none sm:shadow-none rounded-md shadow-md h-auto  ml-2 mr-2"
                        id="hilang" nama="hilang">
                        <a class="hover:text-white" href="<?= base_url('Home') ?>">
                            <li class="text-center sm:p-4 p-1 hover:bg-primary ">HOME
                            </li>
                        </a>
                        <a class="hover:text-white" href="<?= base_url('product') ?>">
                            <li class="text-center sm:p-4 p-1 hover:bg-primary ">PRODUK
                            </li>
                        </a>
                        <a class="hover:text-white" href="<?= base_url('Transaction') ?>">
                            <li class="text-center sm:p-4 p-1 hover:bg-primary ">TRANSAKSI
                            </li>
                        </a>
                        <a class="hover:text-white" href="<?= base_url('report/spending') ?>">
                            <li class="text-center sm:p-4 p-1 hover:bg-primary ">PENGELUARAN
                            </li>
                        </a>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- navbar end -->

        <!-- tabel Details -->
        <div class="h-auto w-full  sm:ml-5 sm:mr-5 rounded-md shadow-sm  ">
            <div class="sm:mt-10 mt-3">
                <h1 class="text-center sm:text-3xl text-sm  font-bold  bg-bg2 py-3 ml-3 mr-3">
                    DETAILS RIWAYAT PENGELUARAN HARI INI
                </h1>

                <br>
            </div>
            
            <div class="bg-white font-bold sm:text-base text-[12px] rounded-md mb-1 mt-1 py-3">
                <div class="sm:ml-20 sm:mr-20 ml-5 ">
                    <div class="flex mt-2 mr-3 mb-5 bg-slate-400">
                        <p class="sm:px-5 sm:py-2 px-3 py-2 sm:w-[400px] w-[200px]">KATEGORI PENGELUARAN</p><span
                            class="sm:w-full   w-[200px] px-5 py-2  rounded-md">
                            TOTAL PENGELUARAN</span>
                    </div>
                    <?php foreach($spending as $singleView): ?>
                        <tbody>


                            <div class="flex mt-2 mr-3 bg-slate-300">
                                <span class="sm:w-full   w-[200px] py-2  rounded-md">
                                    <?= $singleView->categorySpending ?>
                                </span>
                                <p class="sm:px-5 sm:py-2 px-3 py-2 sm:w-[200px] w-[400px]">
                                    <?= $singleView->totalSpending ?>
                                </p>
                            </div>
                        <?php endforeach; ?>


                </div>
            </div>
        </div>
        <!-- akhir tabel Details -->
    </div>
    <footer
        class="bg-dark text-white w-full items-center gap-y-6 gap-x-12 border-t border-blue-gray-50 py-6 text-center md:justify-between">
        <p class="block font-bold font-sans text-base  leading-relaxed text-blue-gray-900 antialiased">
            © 2023 Material ALI Baja Galvalum Plavon
        </p>
    </footer>
    <script src="<?= base_url() ?>/dist/js/script.js"></script>

</body>

</html>