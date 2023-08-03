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
            <div class=" justify-around border rounded-md shadow-md bg-dark text-white">
                <div class="flex justify-between">
                    <img class="sm:w-[300px] w-[50px]" src="<?= base_url() ?>/dist/img/abk3.png" alt="">
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
        <!-- tabel penjualan -->
        <div class="h-auto w-full overflow-x-auto  sm:ml-5 sm:mr-5 rounded-md shadow-sm  ">
            <div class="mt-5">

                <h1 class="text-center sm:text-3xl text-xl font-bold bg-bg2 py-3 ">
                    LIST BARANG PENJUALAN
                </h1>

                <div class="flex sm:mt-4 mt-3">
                    <div>
                        <a class="bg-slate-900 text-white text-[12px] sm:text-xl px-3 py-2 ml-3 rounded-md"
                            href="<?= site_url('Product/add_product'); ?>"><i
                                class="fa-sharp fa-solid fa-cart-plus"></i>
                            TAMBAH DAFTAR
                            BARANG PENJUALAN</a>
                    </div>
                </div>
            </div>
            <div class="overflow-x-scroll">
                <table class=" w-[600px]  sm:w-full sm:mt-5">
                    <div class="p-3 w-full sm:bg-dark">
                        <thead class="bg-blue-400">
                            <tr class="text-[12px] sm:text-lg">
                                <th class="py-3  ">SKU</th>
                                <th class="py-3 sm:text-left">NAMA BARANG</th>
                                <th class="py-3 sm:text-left ">DESKRIPSI BARANG </th>
                                <th class="py-3 ">STOK</th>
                                <th class="py-3 ">HARGA JUAL</th>
                                <th class="py-3 ">Action</th>
                            </tr>
                        </thead>
                        <tbody class="">
                            <?php foreach ($product->result() as $singleView): ?>
                            <tr class=" bg-white py-2 text-[10px] sm:text-lg cursor-pointer  hover:bg-slate-300">
                                <td class="py-3 w-auto px-3"><?= $singleView->SKU ?></td>
                                <td class="py-3 w-auto "><?= $singleView->productName ?></td>
                                <td class="py-3 w-auto "><?= $singleView->productDescription ?></td>
                                <td class="py-3 w-auto px-3"><?= $singleView->sisa_stock ?></td>
                                <td class="py-3 w-auto text-center px-3"> <?= $singleView->sellingPrice ?></td>
                                <td class="flex text-white justify-center mt-1">
                                    <form action="<?= site_url('product/get_update'); ?>" method="post">
                                        <button type="submit" value="<?= $singleView->SKU ?>" name="SKU" id="SKU"
                                            class="bg-lime-500 rounded-md sm:px-3 px-2 py-1 shadow-md hover:bg-green-700"><i
                                                class="sm:flex hidden fa-regular fa-pen-to-square"></i> Update</button>
                                    </form>
                                    <form action="<?= site_url('product/delete_product'); ?>" method="post">
                                        <button type="submit" value="<?= $singleView->SKU ?>" name="SKU" id="SKU"
                                            onclick="return confirm('Anda yakin ingin delete <?= $singleView->SKU ?>')"
                                            class="bg-red-500 rounded-md ml-2 px-3 py-1 shadow-md hover:bg-red-700">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </div>
                </table>
            </div>
        </div>
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