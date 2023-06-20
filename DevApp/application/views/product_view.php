<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product</title>
    <link href="<?= base_url() ?>/dist/css/output.css" rel="stylesheet">

</head>

<body>
    <!-- Navbar star -->
    <nav class="mt-4 ml-4 mr-4 w-auto">
        <div class="sm:flex justify-around border rounded-md shadow-md">
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
                    <li class="text-center sm:p-4 p-1 hover:bg-primary"><a class="hover:text-white" href="#">PRODUK</a>
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
    <div class="mt-20">
        <h1 class="text-3xl font-bold mb-10">
            <center>PRODUCT LIST</center>
        </h1>
        <a class="bg-blue-500 text-white sm:ml-72 ml-3 hover:bg-blue-700 px-3 py-2 rounded-md"
            href="<?php echo site_url('product/add_new');?>">ADD PRODUCT</a>
        <br>
    </div>
    <div class="h-auto w-auto overflow-x-auto border sm:ml-5 sm:mr-5 rounded-md shadow-sm  ">
        <table class="w-auto mx-auto mb-10 mt-10  shadow-2xl border-2 sm:text-xl text-[11px]">
            <thead>
                <tr class="cursor-pointer duration-300">
                    <th class="p-1 border shadow-md bg-bg ">No</th>
                    <th class="kolom">Nama Product</th>
                    <th class="kolom">Tebal</th>
                    <th class="kolom">panjang</th>
                    <th class="kolom">Stok</th>
                    <th class="kolom">harga</th>
                    <th class="kolom">Action</th>
                </tr>
            </thead>
            <tbody>
                <tr class="cursor-pointer hover:bg-slate-100 duration-300">
                    <td class="border-2 p-2">1</td>
                    <td class="border-2 p-1 shadow-md">Baja galvalum ringan</td>
                    <td class="border-2 p-1  shadow-md ">0,25</td>
                    <td class="border-2 p-1  shadow-md ">6 meter</td>
                    <td class="border-2 p-1  shadow-md ">50</td>
                    <td class="border-2 p-1  shadow-md ">100.000</td>
                    <td class="border-2 p-1 text-white flex shadow-md">
                        <a class="bg-lime-500 rounded-md px-3 py-1 shadow-md hover:bg-green-700"
                            href="<?php echo site_url('product/get_edit/');?>">Update</a>
                        <a class="bg-red-500 rounded-md px-3 py-1 ml-2 shadow-md hover:bg-red-700"
                            href="<?php echo site_url('product/get_delete/');?>">Delete</a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <script src="<?= base_url() ?>/dist/js/script.js"></script>
</body>

</html>