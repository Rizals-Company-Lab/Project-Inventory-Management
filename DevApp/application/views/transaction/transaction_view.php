<!-- navbar end -->

<!-- tabel penjualan -->
<div class="h-auto  w-full overflow-x-auto  sm:ml-5 sm:mr-5 rounded-md shadow-sm  ">
    <div class="sm:mt-10 mt-2">

        <h1 class="text-center sm:text-3xl text-xl font-bold  bg-bg2 py-3 ml-3 mr-3">
            RIWAYAT PEMBELIAN LIST
        </h1>
    </div>
    <div class="sm:flex mr-5 sm:mr-0 sm:justify-evenly">
        <a class="rounded-md w-full sm:py-5 hover:bg-blue-800 flex justify-center items-center sm:mb-5 sm:mt-3 sm:ml-3 ml-3 mr-3 mt-3 py-3 px-3 bg-dark"
            href="<?php echo site_url('Transaction_umum/add_new_transaction'); ?>">
            <div>
                <h1 class="px-5 text-white font-bold">
                    <i class="fa-sharp fa-solid fa-cart-plus">
                    </i> TAMBAH UMUM
                </h1>
            </div>
        </a>
        <a class="rounded-md w-full sm:py-5 hover:bg-blue-800 flex justify-center items-center sm:mb-5 sm:mt-3 sm:ml-3 ml-3 mr-3 mt-3 py-3 px-3 bg-dark"
            href="<?php echo site_url('Transaction_material/add_new_transaction'); ?>">
            <div>
                <h1 class="px-5 text-white font-bold">
                    <i class="fa-sharp fa-solid fa-cart-plus">
                    </i> TAMBAH MATERIAL
                </h1>
            </div>
        </a>
        <a class="rounded-md w-full sm:py-5 hover:bg-blue-800 flex justify-center items-center sm:mb-5 sm:mt-3 sm:ml-3 ml-3 mr-3 mt-3 py-3 px-3 bg-dark"
            href="<?php echo site_url('Transaction_distributor/add_new_transaction'); ?>">
            <div>
                <h1 class="px-5 text-white font-bold">
                    <i class="fa-sharp fa-solid fa-cart-plus">
                    </i> TAMBAH DISTRIBUTOR
                </h1>
            </div>
        </a>

    </div>

    <form class="" action="<?= base_url('Transaction/index') ?>" method="post">
        <div class="sm:flex  sm:mt-1">
            <div class=" sm:ml-5 ml-5">
                <label for="default-search">Pembeli</label>
                <br>
                <input class="mt-2 mb-4 sm:w-full mr-5 h-[40px] border text-black px-5  rounded-md shadow-md"
                    type="text" id="searchBuyer" name="searchBuyer" placeholder="Cari Nama Pembeli"
                    value="<?= (isset($searchBuyer)) ? $searchBuyer : '' ?>">
            </div>
            <div class="flex flex-wrap">
                <div class=" ml-5 sm:ml-10 ">
                    <label for="default-search">Tanggal</label>
                    <br>
                    <input class="mt-2 mb-4 sm:w-full h-[40px] border text-black px-5  rounded-md shadow-md" type="date"
                        id="searchDate" name="searchDate" placeholder="Cari Tanggal"
                        value="<?= (isset($searchDate)) ? $searchDate : '' ?>">
                </div>
                <div class=" ml-5 sm:ml-16 ">
                    <label for="default-search">Status Pembayaran</label>
                    <br>
                    <select class="mt-2 mb-4 sm:w-full h-[40px] border text-black px-5  rounded-md shadow-md"
                        id="searchStatus" name="searchStatus">
                        <option value="" <?php echo (isset($searchStatus) && $searchStatus == '') ? 'selected' : ''; ?>>
                            Semua
                        </option>
                        <option value="0" <?php echo (isset($searchStatus) && $searchStatus == '0') ? 'selected' : ''; ?>>
                            Pending
                        </option>
                        <option value="1" <?php echo (isset($searchStatus) && $searchStatus == '1') ? 'selected' : ''; ?>>
                            Done</option>
                    </select>
                </div>
                <div class="sm:mt-7 sm:ml-5">
                    <button type="submit" value="search" id="search" name="search"
                        class="text-white ml-5 right-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-10 py-3 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Search</button>
                </div>
            </div>
        </div>
    </form>
    <div class="overflow-x-scroll">
        <table class=" w-[600px]  sm:w-full sm:-mt-5">
            <div class="p-3 w-full ">
                <thead class="bg-blue-400">
                    <tr class="text-[12px] sm:text-lg">
                        <th class="py-3 ">No</th>
                        <th class="py-3">Nama PEMBELI</th>
                        <th class="py-3">WAKTU ORDER</th>
                        <th class="py-3">STATUS PEMBAYARAN</th>
                        <th class="py-3">Action</th>
                    </tr>
                </thead>
                <?php
                $count = $row + 1;
                foreach ($transaction->result() as $singleView):
                    ?>
                    <tbody class="">
                        <tr
                            class="cursor-pointer text-[12px] sm:text-lg text-center bg-white py-2 group-hover:text-white hover:bg-slate-400 duration-300 group">
                            <th class="kolomhover">
                                <?= $count; ?>
                            </th>
                            <td class="kolomhover ">
                                <?= $singleView->buyerName ?>
                            </td>
                            <td class="kolomhover  ">
                                <?= $singleView->orderTimestamp ?>
                            </td>
                            <td class="kolomhover ">
                                <?= ($singleView->paymentStatus == 1) ? 'Done' : 'Pending' ?>
                            </td>
                            <td class=" p-1 text-white flex justify-evenly mt-1">


                                <form action="<?= site_url('transaction/order_detail'); ?>" method="post">
                                    <button type="submit" value="<?= $singleView->idOrder ?>" name="idOrder" id="idOrder"
                                        class="bg-blue-600 rounded-md px-3 py-1 shadow-md hover:bg-blue-900"><i
                                            class="fa-solid fa-circle-info"></i> Details</button>
                                </form>
                                <form action="<?= site_url('transaction/get_update'); ?>" method="post">
                                    <button type="submit" value="<?= $singleView->idOrder ?>" name="idOrder" id="idOrder"
                                        class="bg-lime-500 rounded-md px-3 py-1 shadow-md hover:bg-green-700"><i
                                            class="fa-regular fa-pen-to-square"></i> Update</button>
                                </form>
                                <form action="<?= site_url('transaction/delete_order'); ?>" method="post">
                                    <button type="submit" value="<?= $singleView->idOrder ?>" name="idOrder" id="idOrder"
                                        onclick="return confirm('Anda yakin ingin delete <?= $singleView->idOrder ?>')"
                                        class="bg-red-700 rounded-md px-3 py-1 shadow-md hover:bg-red-900"><i
                                            class="fa-solid fa-trash-can"></i> Delete</button>
                                </form>
                                <form action="<?= site_url('export'); ?>" method="post">
                                    <button type="submit" value="<?= $singleView->idOrder ?>" name="idOrder" id="idOrder"
                                        class="bg-blue-600 rounded-md px-3 py-1 shadow-md hover:bg-blue-900"><i
                                            class="fa-solid fa-circle-info"></i>
                                        Print</button>
                                </form>
                                <!-- <button class="bg-lime-500 rounded-md px-3 py-1 shadow-md hover:bg-green-700"
                            onclick="insertDataPesan(<?= $singleView->idOrder ?>)">Update</button>

                        <button class="bg-blue-500 rounded-md px-3 py-1 ml-2 shadow-md hover:bg-blue-700"
                            onclick="insertDataPesan(<?= $singleView->idOrder ?>)">Details</button> -->
                            </td>
                        </tr>
                        <?php
                        $count++;
                endforeach; ?>
                </tbody>
            </div>

        </table>
        <div>
            <p class="px-5 font-bold">
                Total Transaksi =
                <?= $totalRow ?>
            </p>

        </div>
    </div>
    <div class="flex justify-center mt-4">
        <!-- Pagination -->
        <div class="pagination">
            <?php echo $pagination; ?>
        </div>
    </div>
</div>
<!-- akhir tabel penjualan -->
<script src="<?= base_url() ?>/dist/js/script.js"></script>
</body>

</html>