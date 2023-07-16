<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product</title>
    <link href="<?= base_url() ?>/dist/css/output.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body class="bg-slate-200">
    <!-- Navbar star -->
    <div class="sm:flex">
        <nav class="mt-4 ml-4 mr-4 w-auto">
            <div class=" justify-around border rounded-md shadow-md  bg-dark text-white">
                <div class=" justify-between">
                    <img class="w-[300px]" src="<?= base_url() ?>/dist/img/abk3.png" alt="">

                </div>
                <div class="h-[100vh]">
                    <ul class="  sm:border-none sm:rounded-none sm:shadow-none border rounded-md shadow-md h-auto  ml-2 mr-2"
                        id="hilang" nama="hilang">
                        <li class="text-center sm:p-4 p-1 hover:bg-primary"><a class="hover:text-white"
                                href="Home">HOME</a>
                        </li>
                        <li class="text-center sm:p-4 p-1 hover:bg-primary"><a class="hover:text-white"
                                href="<?php echo site_url('product');?>">PRODUK</a>
                        </li>
                        <li class="text-center sm:p-4 p-1 hover:bg-primary"><a class="hover:text-white"
                                href="">TRANSAKSI</a></li>
                        <li class="text-center sm:p-4 p-1 hover:bg-primary"><a class="hover:text-white"
                                href="">KONTAK</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- navbar end -->
        <!-- tabel penjualan -->
        <div class="h-auto w-full overflow-x-auto  sm:ml-5 sm:mr-5 rounded-md shadow-sm  ">
            <div class="mt-5">

                <h1 class="text-center sm:text-3xl text-xl font-bold bg-bg2 py-3 ">
                    BARANG LIST
                </h1>

                <div class="flex sm:mt-4 mt-3">
                    <div>
                        <a class="bg-slate-900 text-white  text-[11px] sm:text-xl px-3 py-2 rounded-md"
                            href="<?= site_url('Product/add_product'); ?>"><i
                                class="fa-sharp fa-solid fa-cart-plus"></i> TAMBAH BARANG</a>
                    </div>
                </div>
            </div>

            <table class="w-full mt-5">
                <div class="p-3 bg-dark">
                    <thead class="bg-blue-400">
                        <tr class="">
                            <th class="py-3 ">SKU</th>
                            <th class="py-3 text-left">NAMA BARANG</th>
                            <th class="py-3 text-left">DESKRIPSI BARANG </th>
                            <th class="py-3">STOK</th>
                            <th class="py-3">HARGA JUAL</th>
                            <th class="py-3">Action</th>
                        </tr>
                    </thead>
                    <tbody class="">
                        <?php foreach ($product->result() as $singleView): ?>
                        <tr class=" bg-white py-2  hover:bg-slate-100">
                            <td class="py-3 w-auto px-3"><?= $singleView->SKU ?></td>
                            <td class="py-3 w-auto "><?= $singleView->productName ?></td>
                            <td class="py-3 w-auto "><?= $singleView->productDescription ?></td>
                            <td class="py-3 w-auto px-3"><?= $singleView->sisa_stock ?></td>
                            <td class="py-3 w-auto text-center px-3"> <?= $singleView->sellingPrice ?></td>
                            <td class=" text-white text-center">
                                <button class="bg-lime-500 rounded-sm px-3 py-1 shadow-md hover:bg-green-700"
                                    onclick="insertDataPesan(<?= $singleView->SKU ?>)">Update</button>
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
    </div>
    <!-- akhir tabel penjualan -->
    <script src="<?= base_url() ?>/dist/js/script.js"></script>
</body>

</html>