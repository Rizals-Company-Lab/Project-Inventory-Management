<!-- navbar end -->

<!-- tabel penjualan -->
<div class="h-auto w-full overflow-x-auto  sm:ml-5 sm:mr-5 rounded-md shadow-sm  ">
    <div class="sm:mt-10 mt-2">

        <h1 class="text-center sm:text-3xl text-xl font-bold  bg-bg2 py-3 ml-3 mr-3">
            RIWAYAT PEMBELIAN LIST
        </h1>
        <br>

        <br>
    </div>
    <div class="text-center sm:flex">
        <div class="sm:flex mt-10">
            <a class="bg-dark text-white ml-3 sm:text-xl text-sm   hover:bg-slate-600 sm:px-5 px-9 sm:py-5 py-5 rounded-md"
                href="<?php echo site_url('Transaction_umum/add_new_transaction'); ?>"><i
                    class="fa-sharp fa-solid fa-cart-plus"></i> TAMBAH
                TRANSAKSI UMUM</a>
        </div>
        <div class="sm:flex mt-10">
            <a class="bg-dark text-white ml-3 sm:text-xl text-sm   hover:bg-slate-600 px-8 sm:py-5 py-5 rounded-md"
                href="<?php echo site_url('Transaction_material/add_new_transaction'); ?>"><i
                    class="fa-sharp fa-solid fa-cart-plus"></i>
                TAMBAH
                TRANSAKSI MATERIAL</a>
        </div>
        <div class="sm:flex mt-10">
            <a class="bg-dark text-white ml-3 sm:text-xl text-sm  hover:bg-slate-600 px-5 sm:py-5 py-5 rounded-md"
                href="<?php echo site_url('Transaction_distributor/add_new_transaction'); ?>"><i
                    class="fa-sharp fa-solid fa-cart-plus"></i>
                TAMBAH
                TRANSAKSI DISTRIBUTOR</a>
        </div>
    </div>
    <form action="<?= base_url('Transaction/index') ?>" method="post">
        <label for="default-search">Pembeli</label>
        <div>

            <input type="text" id="searchBuyer" name="searchBuyer" placeholder="Cari Buyer"
                value="<?= (isset($searchBuyer)) ? $searchBuyer : '' ?>">
        </div>
        <label for="default-search">Tanggal</label>
        <div>

            <input type="date" id="searchDate" name="searchDate" placeholder="Cari Tanggal"
                value="<?= (isset($searchDate)) ? $searchDate : '' ?>">
        </div>
        <label for="default-search">Status Pembayaran</label>
        <div>
            <select id="searchStatus" name="searchStatus">
                <option value="" <?php echo (isset($searchStatus) && $searchStatus == '') ? 'selected' : ''; ?>>Semua
                </option>
                <option value="0" <?php echo (isset($searchStatus) && $searchStatus == '0') ? 'selected' : ''; ?>>Pending
                </option>
                <option value="1" <?php echo (isset($searchStatus) && $searchStatus == '1') ? 'selected' : ''; ?>>
                    Done</option>
            </select>
        </div>

        <button type="submit" value="search" id="search" name="search"
            class="text-white absolute right-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Search</button>
    </form>
    <div class="overflow-x-scroll">
        <table class=" w-[600px]  sm:w-full sm:mt-5">
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
            <p>Total Transaksi =
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