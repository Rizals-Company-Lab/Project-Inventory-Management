<!-- navbar end -->

<!-- tabel penjualan -->
<div class="h-auto w-full overflow-x-auto  sm:ml-5 sm:mr-5 rounded-md shadow-sm  ">
    <div class="mt-10">

        <h1 class="text-center sm:text-3xl text-xl font-bold  bg-bg2 py-3 ml-3 mr-3">
            RIWAYAT PEMBELIAN LIST MATERIAL
        </h1>
        <br>

        <br>
    </div>
    <div class="flex sm:mt-3">
        <div>
            <a class="bg-dark text-white ml-3 sm:text-xl text-sm hover:bg-slate-600 px-3 py-2 rounded-md"
                href="<?php echo site_url('transaction_material/add_new_transaction'); ?>"><i
                    class="fa-sharp fa-solid fa-cart-plus"></i> TAMBAH TRANSAKSI MATERIAL</a>
        </div>
    </div>
    <div class="overflow-x-scroll">
        <table class=" w-[600px]  sm:w-full sm:mt-5">
            <div class="p-3 w-full sm:bg-dark">
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

                            <form action="<?= site_url('transaction_material/order_detail'); ?>" method="post">
                                <button type="submit" value="<?= $singleView->idOrder ?>" name="idOrder" id="idOrder"
                                    class="bg-blue-600 rounded-md px-3 py-1 shadow-md hover:bg-blue-900"><i
                                        class="fa-solid fa-circle-info"></i> Details</button>
                            </form>
                            <form action="<?= site_url('transaction_material/get_update'); ?>" method="post">
                                <button type="submit" value="<?= $singleView->idOrder ?>" name="idOrder" id="idOrder"
                                    class="bg-lime-500 rounded-md px-3 py-1 shadow-md hover:bg-green-700"><i
                                        class="fa-regular fa-pen-to-square"></i> Update</button>
                            </form>
                            <form action="<?= site_url('transaction_material/delete_order'); ?>" method="post">
                                <button type="submit" value="<?= $singleView->idOrder ?>" name="idOrder" id="idOrder"
                                    onclick="return confirm('Anda yakin ingin delete <?= $singleView->idOrder ?>')"
                                    class="bg-red-700 rounded-md px-3 py-1 shadow-md hover:bg-red-900"><i
                                        class="fa-solid fa-trash-can"></i> Delete</button>
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