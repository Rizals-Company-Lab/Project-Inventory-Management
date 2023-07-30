<body>
    <div class="w-full">
        <!-- <?= var_dump($detailOrder[0]->buyerName) ?> -->
        <h1 class="bg-yellow-400 font-bold text-3xl text-center py-3 mt-5">DETAILS RIWAYAT PEMBELIAN</h1>
        <form class="bg-white font-semibold py-3" action="<?= site_url('Transaction/update_order'); ?>" method="post">
            <div class="ml-2">
                <input type="hidden" name="idOrder" id="idOrder" value="<?= $detailOrder[0]->idOrder ?>">
                <div class="ml-10">
                    <div class="flex w-full mt-3">
                        <div>
                            <label>NAMA PEMBELI</label>
                            <input
                                class="mt-2 appearance-none w-full bg-gray-200 text-gray-700 border  rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                                disabled type="text" name="buyerName" id="buyerName"
                                value="<?= $detailOrder[0]->buyerName ?>">
                        </div>
                        <div class="ml-[100px]">
                            <label> NO. REKENING</label>
                            <input
                                class="mt-2 appearance-none w-full bg-gray-200 text-gray-700 border  rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                                disabled type="text" name="bankAccountNumber" id="bankAccountNumber"
                                value="<?= $detailOrder[0]->bankAccountNumber ?>">
                        </div>
                    </div>
                    <div class="flex w-full mt-3">
                        <div>

                            <label>WAKTU ORDER</label>
                            <input
                                class="mt-2 appearance-none w-full bg-gray-200 text-gray-700 border  rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                                type="text" name="orderTimestamp" id="orderTimestamp"
                                value="<?= $detailOrder[0]->orderTimestamp ?>" disabled>
                        </div>

                        <div class="ml-[100px]">

                            <label>STATUS PEMBAYARAN</label>
                            <select
                                class="mt-2 appearance-none w-full bg-gray-200 text-gray-700 border   rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                                disabled name="paymentStatus" id="paymentStatus">
                                <option value="0" <?= ($detailOrder[0]->paymentStatus == 0) ? 'selected' : '' ?>>Pending
                                </option>
                                <option value="1" <?= ($detailOrder[0]->paymentStatus == 1) ? 'selected' : '' ?>>Done
                                </option>
                            </select>
                        </div>
                    </div>
                </div>


                <table class="w-full mt-5">
                    <div class="p-3 bg-dark">
                        <thead class="bg-blue-400">
                            <tr>
                                <th class="py-3">SKU</th>
                                <th class="py-3 ">Nama Barang</th>
                                <th class="py-3">Product Price</th>
                                <th class="py-3">Jumlah</th>
                                <th class="py-3">Subtotal</th>
                            </tr>
                        </thead>
                        <tbody class="">
                            <?php
                            $total = 0;
                            foreach ($detailOrder as $row): ?>
                            <tr class=" bg-white py-2 text-center hover:bg-slate-100">
                                <td class="kolomhover">
                                    <?= $row->SKU ?>
                                </td>
                                <td class="kolomhover">
                                    <?= $row->productName ?>
                                </td>
                                <td class="kolomhover">
                                    <?= $row->productPrice ?>
                                </td>
                                <td class="kolomhover">
                                    <?= $row->qtyOrder ?>
                                </td>
                                <td class="kolomhover">
                                    <?= $row->priceAmount ?>
                                </td>
                            </tr>
                        </tbody>
                        <?php $total += $row->priceAmount; endforeach; ?>
                    </div>
                </table>
                <h1 class="font-bold text-center text-lg py-2 bg-yellow-400">TOTAL PEMBELIAN = <?= $total ?></h1>

                <br>
            </div>


        </form>
    </div>
    <script src="<?= base_url() ?>/dist/js/script.js"></script>
</body>

</html>