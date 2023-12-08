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

    <div class="sm:flex mt-3 sm:mt-1">
        <form class="" action="<?= base_url('Transaction/index') ?>" method="post">
            <div class="flex sm:w-full">
                <div class="sm:text-base sm:w-full text-sm sm:ml-5 ml-3">
                    <label for="default-search">Pembeli</label>
                    <br>
                    <input
                        class="sm:mt-2 sm:mb-4 sm:w-[180px] mr-5 sm:h-[40px] border text-black sm:px-5 px-3 py-2 rounded-md shadow-md"
                        type="text" id="searchBuyer" name="searchBuyer" placeholder="Cari Nama Pembeli"
                        value="<?= (isset($searchBuyer)) ? $searchBuyer : '' ?>">
                </div>
                <div class="flex">
                    <div class="sm:text-base text-sm -ml-3  sm:ml-0 ">
                        <label for="default-search">Tanggal</label>
                        <br>
                        <input
                            class="sm:mt-2 sm:mb-4 cursor-text sm:w-full sm:h-[40px] border text-black sm:px-5 py-2 px-3  rounded-md shadow-md"
                            type="date" id="searchDate" name="searchDate" placeholder="Cari Tanggal"
                            value="<?= (isset($searchDate)) ? $searchDate : '' ?>">
                    </div>
                </div>
            </div>
            <div class="flex ml-3 sm:w-full">
                <div>
                    <label for="default-search">Status Pembayaran</label>
                    <br>
                    <select
                        class="sm:mt-2 sm:mb-4 cursor-pointer sm:w-full h-[40px] border text-black w-full px-10 sm:px-3  rounded-md shadow-md"
                        id="searchStatus" name="searchStatus">
                        <option value="" <?php echo (isset($searchStatus) && $searchStatus == '') ? 'selected' : ''; ?>>
                            Semua
                        </option>
                        <option value="0" <?php echo (isset($searchStatus) && $searchStatus == '0') ? 'selected' : ''; ?>>
                            Pending
                        </option>
                        <option value="1" <?php echo (isset($searchStatus) && $searchStatus == '1') ? 'selected' : ''; ?>>
                            Lunas</option>
                    </select>
                </div>
                <div class="sm:mt-10 mt-6 ">
                    <button type="submit" value="search" id="search" name="search"
                        class="text-white ml-5 right-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm sm:px-10 px-14 py-3 sm:py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Search</button>
                </div>
            </div>
        </form>
        <form class="" action="<?= base_url('Transaction/add_spending') ?>" method="post">
            <div class="ml-3 sm:mr-5 mt-5 sm:ml-0 sm:mt-7 flex sm:w-full">
                <select name="idCategory"
                    class="sm:mt-2 ml-3 sm:mb-4 cursor-text sm:w-full sm:h-[40px] border text-black sm:px-5 py-2 px-3  rounded-md shadow-md">
                    <?php foreach($spendingCategory as $category): ?>
                        <option value="<?= $category->idCategory; ?>">
                            <?= $category->categorySpending; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
                <input type="text"
                    class="sm:mt-2 ml-3 mb-4 sm:w-full sm:h-[40px] border text-black sm:px-5 py-2 px-3  rounded-md shadow-md "
                    placeholder="Pengeluaran Harian" id="totalSpending" name="totalSpending" required>
                <div class="sm:mt-3 mt-1 sm:ml-5">
                    <button type="submit" value="spending" id="spending" name="spending"
                        class="text-white ml-2 sm:ml-0 right-2.5 bottom-2.5 bg-red-600 hover:bg-red-800 py-2 px-10 font-medium rounded-lg text-sm sm:px-5 sm:py-2">Simpan</button>
                </div>
            </div>
        </form>
    </div>

    <div class="overflow-x-scroll">
        <table class=" w-[600px]  sm:w-full sm:-mt-5">
            <div class="p-3 w-full ">
                <thead class="bg-blue-400">
                    <tr class="text-[12px] sm:text-base">
                        <th class="py-3 px-3">No</th>
                        <th class="py-3 px-3">Nama PEMBELI</th>
                        <th class="py-3">WAKTU ORDER</th>
                        <th class="py-3">STATUS PEMBAYARAN</th>
                        <th class="py-3">ACTION</th>
                    </tr>
                </thead>
                <?php
                $count = $row + 1;
                foreach($transaction->result() as $singleView):
                    ?>
                    <tbody class="">
                        <tr
                            class="cursor-pointer text-[11px] sm:text-sm text-center bg-white py-1 group-hover:text-white hover:bg-slate-400 duration-300 group">
                            <th class="kolomhover">
                                <?= $count; ?>
                            </th>
                            <td class="kolomhover ">
                                <?= $singleView->buyerName ?>
                            </td>
                            <td class="kolomhover  ">
                                <?= $singleView->orderTimestamp ?>
                            </td>
                            <td class="kolomhover font-bold"
                                style="color: <?= ($singleView->paymentStatus == 1) ? 'lime' : 'red' ?>">
                                <?= ($singleView->paymentStatus == 1) ? 'LUNAS ('.$singleView->paidTimestamp.')' : 'PENDING' ?>
                            </td>

                            <td class=" p-1 px-3 text-[10px] sm:text-base text-white flex justify-evenly mt-1">
                                <form action="<?= site_url('transaction/order_detail'); ?>" method="post">
                                    <button type="submit" value="<?= $singleView->idOrder ?>" name="idOrder" id="idOrder"
                                        class="bg-blue-600 rounded-md px-3 py-1 shadow-md hover:bg-blue-900"><i
                                            class="fa-solid fa-circle-info "></i> Details</button>
                                </form>
                                <!-- <form action="<?= site_url('transaction/get_update'); ?>" method="post">
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
                                    class="bg-yellow-400 rounded-md px-3 py-1 shadow-md hover:bg-yellow-900"><i
                                        class="fa-solid fa-circle-info"></i>
                                    Print</button>
                            </form> -->
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
    </div>
    <div class="overflow-x-scroll w-full">
        <div class="sm:w-full bg-yellow-400 sm:mt-3 ">
            <p class="text-center py-2 font-bold sm:text-lg ">Total Transaksi =
                <?= $totalRow ?>
            </p>
        </div>
        <div class="flex justify-center mt-4">
            <!-- Pagination -->
            <div class="pagination">
                <?php echo $pagination; ?>
            </div>
        </div>
        <div class="bg-white font-bold rounded-md mb-1 mt-1 py-3">
            <div class="sm:ml-20 ml-5 ">
                <div class="flex mt-2 mr-3">
                    <p class="sm:px-5 sm:py-2 py-2 w-[200px]">Total Penjualan</p><span
                        class="sm:w-[200px]  hover:bg-slate-300 w-[200px] px-5 py-2  rounded-md">=
                        <?= ($transactionToday == NULL) ? '0' : $transactionToday ?>
                    </span>
                </div>
                <div class="flex mt-2 mr-3">
                    <p class="sm:px-5 sm:py-2 py-2 w-[200px]">Total Pengeluaran</p><span
                        class="sm:w-[200px] w-[200px] hover:bg-slate-300  text-red-500 px-5 py-2  rounded-md">=
                        <?= ($spendingToday == NULL) ? '0' : $spendingToday ?>
                    </span>
                </div>
                <div class="flex mt-2 mr-3">
                    <p class="sm:px-5 sm:py-2 py-2 w-[200px]">Total Laba</p><span
                        class="sm:w-[200px] w-[200px] hover:bg-slate-300 text-green-500 px-5 py-2  rounded-md">=
                        <?= ($get_total_final_profit_today == NULL) ? '0' : $get_total_final_profit_today ?>
                    </span>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- akhir tabel penjualan -->
<script src="<?= base_url() ?>/dist/js/script.js"></script>
</body>

</html>