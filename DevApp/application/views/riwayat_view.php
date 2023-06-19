<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page-Riwayat-pembelian</title>
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
                    <li class="text-center sm:p-4 p-1 hover:bg-primary"><a class="hover:text-white" href="#">HOME</a>
                    </li>
                    <li class="text-center sm:p-4 p-1 hover:bg-primary"><a class="hover:text-white"
                            href="<?php echo site_url('product');?>">PRODUK</a>
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
    <!-- tabel penjualan -->
    <div class="mt-10">

        <h1 class="text-center sm:text-3xl text-xl font-bold  bg-bg2 py-3 ml-3 mr-3">
            RIWAYAT PEMBELIAN LIST
        </h1>
        <br>

        <br>
    </div>
    <div class="h-auto w-auto overflow-x-auto  sm:ml-5 sm:mr-5 rounded-md shadow-sm  ">
        <div class="flex mt-3">
            <div>
                <a class="bg-blue-500 text-white sm:ml-48 ml-3 sm:text-xl text-sm hover:bg-blue-700 px-3 py-2 rounded-md"
                    href="<?php echo site_url('product/transaksi');?>">TAMBAH TRANSAKSI</a>
            </div>
        </div>
        <table class="w-auto mx-auto mb-10 mt-10  shadow-2xl border-2 sm:text-xl text-[11px]">
            <thead>
                <tr class="cursor-pointer duration-300">
                    <th class="p-1 border shadow-md bg-bg ">No</th>
                    <th class="kolom">Nama PEMBELI</th>
                    <th class="kolom">WAKTU ORDER</th>
                    <th class="kolom">STATUS PEMBAYARAN</th>
                    <th class="kolom">Action</th>
                </tr>
            </thead>
            <tbody>
                <tr class="cursor-pointer hover:bg-slate-100 duration-300">
                    <td class="border-2 p-2">1</td>
                    <td class="border-2 p-1 shadow-md">Hanss</td>
                    <td class="border-2 p-1  shadow-md ">2023-3-24 16:03:45 0</td>
                    <td class="border-2 p-1  shadow-md ">Lunas</td>
                    <td class="border-2 p-1 text-white flex shadow-md">
                        <a class="bg-lime-500 rounded-md px-3 py-1 shadow-md hover:bg-green-700"
                            href="<?php echo site_url('product/get_edit/');?>">Update</a>
                        <a class="bg-blue-500 rounded-md px-3 py-1 ml-2 shadow-md hover:bg-blue-700"
                            href="<?php echo site_url('product/details/');?>">Details</a>
                    </td>
                </tr>
                <tr class="cursor-pointer hover:bg-slate-100 duration-300">
                    <td class="border-2 p-2">2</td>
                    <td class="border-2 p-1 shadow-md">Rijal</td>
                    <td class="border-2 p-1  shadow-md ">2023-3-24 16:03:45 0</td>
                    <td class="border-2 p-1  shadow-md ">Lunas</td>
                    <td class="border-2 p-1 text-white flex shadow-md">
                        <a class="bg-lime-500 rounded-md px-3 py-1 shadow-md hover:bg-green-700"
                            href="<?php echo site_url('product/get_edit/');?>">Update</a>
                        <a class="bg-blue-500 rounded-md px-3 py-1 ml-2 shadow-md hover:bg-blue-700"
                            href="<?php echo site_url('product/details/');?>">Details</a>
                    </td>
                </tr>
                <tr class="cursor-pointer hover:bg-slate-100 duration-300">
                    <td class="border-2 p-2">3</td>
                    <td class="border-2 p-1 shadow-md">Sholeh</td>
                    <td class="border-2 p-1  shadow-md ">2023-3-24 16:03:45 0</td>
                    <td class="border-2 p-1  shadow-md ">Lunas</td>
                    <td class="border-2 p-1 text-white flex shadow-md">
                        <a class="bg-lime-500 rounded-md px-3 py-1 shadow-md hover:bg-green-700"
                            href="<?php echo site_url('product/get_edit/');?>">Update</a>
                        <a class="bg-blue-500 rounded-md px-3 py-1 ml-2 shadow-md hover:bg-blue-700"
                            href="<?php echo site_url('product/details/');?>">Details</a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <!-- akhir tabel penjualan -->
    <script src="<?= base_url() ?>/dist/js/script.js"></script>
</body>

</html>