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
    <div class="mt-5">

        <h1 class="text-center sm:text-3xl text-xl font-bold bg-bg2 py-3 ml-3 mr-3">
            BARANG LIST
        </h1>

        <div class="flex sm:mt-4 mt-3">
            <div>
                <a class="bg-blue-500 text-white  text-[11px] ml-3 sm:ml-32 sm:text-xl hover:bg-blue-700 px-3 py-2 rounded-md"
                    href="<?= site_url('Product/add_product'); ?>">TAMBAH BARANG</a>
            </div>
        </div>
    </div>
    <div class="h-auto w-auto overflow-x-auto  sm:ml-5 sm:mr-5 rounded-md shadow-sm  ">

        <table class="w-auto mx-auto mb-10 mt-5  shadow-2xl border-2 sm:text-2xl text-[11px]">
            <thead>
                <tr class="cursor-pointer w-full duration-300">
                    <th class="p-1 border shadow-md bg-bg ">No</th>
                    <th class="kolom">SKU</th>
                    <th class="kolom">NAMA BARANG</th>
                    <th class="kolom">DESKRIPSI BARANG </th>
                    <th class="kolom">STOK</th>
                    <th class="kolom">HARGA JUAL</th>
                    <th class="kolom">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $count = $row +1;
                 foreach ($product->result() as $singleView): ?>

                <tr class="cursor-pointer hover:bg-slate-100 duration-300">
                    <td class="border-2 p-2"><?= $count ?></td>
                    <td class="border-2 p-1 shadow-md"><?= $singleView->SKU ?></td>
                    <td class="border-2 p-1  shadow-md "><?= $singleView->productName ?></td>
                    <td class="border-2 p-1  shadow-md "><?= $singleView->productDescription ?></td>
                    <td class="border-2 p-1  shadow-md "><?= $singleView->sisa_stock ?></td>
                    <td class="border-2 p-1  shadow-md "> <?= $singleView->sellingPrice ?></td>
                    <td class="border-2 p-1 text-white flex shadow-md">
                        <!-- <button class="bg-lime-500 rounded-md px-3 py-1 shadow-md hover:bg-green-700"
                            onclick="insertDataPesan(<?= $singleView->SKU ?>)">Update</button>
                        <button class="bg-lime-500 rounded-md px-3 py-1 shadow-md hover:bg-green-700"
                            onclick="insertDataPesan(<?= $singleView->SKU ?>)">Update</button> -->
                        <!-- <a href="<?= site_url('Product/get_update'); ?>"
                            class="bg-lime-500 rounded-md px-3 py-1 shadow-md hover:bg-green-700">Update</a> -->

                        <form action="<?= site_url('product/get_update'); ?>" method="post">
                            <button type="submit" value="<?= $singleView->SKU ?>" name="SKU" id="SKU"
                                class="bg-lime-500 rounded-md px-3 py-1 shadow-md hover:bg-green-700">Update</button>
                        </form>
                        <form action="<?= site_url('product/delete_product'); ?>" method="post">
                            <button type="submit" value="<?= $singleView->SKU ?>" name="SKU" id="SKU"
                                onclick="return confirm('Anda yakin ingin delete <?= $singleView->SKU ?>')"
                                class="bg-lime-500 rounded-md px-3 py-1 shadow-md hover:bg-green-700">Delete</button>
                        </form>
                        <!-- <a href="<?= site_url('Product/delete'); ?>"
                            class="bg-red-700 rounded-md px-3 py-1 shadow-md hover:bg-green-700"
                            onclick="return confirm('Anda yakin ingin delete <?= $singleView->SKU ?>?')">Delete</a> -->
                    </td>
                </tr>
                <?php $count++;  endforeach;
                ?>
            </tbody>
        </table>
        <div><?= $pagination ?></div>
    </div>
    <!-- akhir tabel penjualan -->
    <script src="<?= base_url() ?>/dist/js/script.js"></script>
</body>

</html>