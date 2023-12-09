<body>
    <div class="w-full">
        <!-- <?= var_dump($detailOrder[0]->buyerName) ?> -->
        <h1 class="bg-yellow-400 font-bold sm:text-3xl ml-3 mr-3 text-base text-center py-3 mt-5">DETAILS RIWAYAT
            PEMBELIAN</h1>
        <!-- <form class="bg-white font-semibold ml-5 mr-5 py-3" action="<?= site_url('Transaction/update_order'); ?>"
            method="post"> -->
        <div class="sm:ml-2 ml-2 mr-2 py-2 font-bold rounded-md sm:mr-2 bg-white">
            <input type="hidden" name="idOrder" id="idOrder" value="<?= $detailOrder[0]->idOrder ?>">
            <div class=" sm:ml-3 text-center  sm:mr-3 sm:text-base text-xs">
                <div class="sm:flex justify-between w-full mt-3">
                    <div>
                        <label>NAMA PEMBELI</label>
                        <input
                            class="mt-2 appearance-none w-full bg-gray-200 text-gray-700 border  rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                            disabled type="text" name="buyerName" id="buyerName"
                            value="<?= $detailOrder[0]->buyerName ?>">
                    </div>
                    <div class="sm:ml-5">
                        <label> NO. REKENING</label>
                        <input
                            class="mt-2 appearance-none w-full bg-gray-200 text-gray-700 border  rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                            disabled type="text" name="bankAccountNumber" id="bankAccountNumber"
                            value="<?= $detailOrder[0]->bankAccountNumber ?>">
                    </div>
                    <div class="sm:ml-5">
                        <label>WAKTU ORDER</label>
                        <input
                            class="mt-2 appearance-none w-full bg-gray-200 text-gray-700 border  rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                            type="text" name="orderTimestamp" id="orderTimestamp"
                            value="<?= $detailOrder[0]->orderTimestamp ?>" disabled>
                    </div>
                </div>
                <div class="sm:flex justify-between w-full mt-3">
                    <div class="">
                        <label>STATUS PEMBAYARAN</label>
                        <input
                            class="mt-2 appearance-none w-full bg-gray-200 text-gray-700 border  rounded py-3 px-2 mb-3 leading-tight focus:outline-none focus:bg-white"
                            disabled type="text" name="paymentStatus" id="paymentStatus"
                            style="color: <?= ($detailOrder[0]->paymentStatus == 1) ? 'green' : 'red' ?>"
                            value="<?= ($detailOrder[0]->paymentStatus == 1) ? 'LUNAS' : 'PENDING' ?>">
                    </div>
                    <div class="sm:ml-5">
                        <label>No Hp Pembeli</label>
                        <input
                            class="mt-2 appearance-none w-full bg-gray-200 text-gray-700 border  rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                            type="text" name="buyerPhone" id="buyerPhone" value="<?= $detailOrder[0]->buyerPhone ?>"
                            disabled>
                    </div>
                    <div class="sm:ml-5">
                        <label>ALAMAT PEMBELI</label>
                        <input
                            class="mt-2 appearance-none w-full bg-gray-200 text-gray-700 border  rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                            disabled type="text" name="buyerAddress" id="buyerAddress"
                            value="<?= $detailOrder[0]->buyerAddress ?>">
                    </div>
                </div>
            </div>
            <div class="overflow-x-scroll">
                <table class=" w-[600px]  sm:w-full sm:mt-5">
                    <div class="p-3 w-full sm:bg-dark">
                        <thead class="bg-blue-400">
                            <tr class="text-[12px] sm:text-xl">
                                <th class="py-3">SKU</th>
                                <th class="py-3 ">Nama Barang</th>
                                <th class="py-3 ">Harga Beli</th>
                                <th class="py-3">Harga Jual</th>
                                <th class="py-3">Jumlah</th>
                                <th class="py-3">Subtotal</th>
                                <th class="py-3">Laba</th>
                            </tr>
                        </thead>
                        <tbody class="">
                            <?php
                            $total = 0;
                            foreach($detailOrder as $row): ?>
                            <tr class=" bg-white py-3  text-[12px] sm:text-xl text-center hover:bg-slate-100">
                                <td class="kolomhover">
                                    <?= $row->SKU ?>
                                </td>
                                <td class="kolomhover">
                                    <?= $row->productName ?>
                                </td>
                                <td class="kolomhover">
                                    <?= $row->buyingPrice ?>
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
                                <td class="kolomhover">
                                    <?= $row->profitAmount ?>
                                </td>
                            </tr>
                        </tbody>
                        <?php $total += $row->priceAmount; endforeach; ?>
                    </div>
                </table>

            </div>
            <div class="font-bold text-center text-lg py-2 sm:flex items-center bg-slate-300">
                <div class="bg-white font-bold sm:ml-10 ml-0 rounded-md mb-1 mt-1 py-3">
                    <div class="sm:ml-10 ml-0">
                        <div class="flex mt-2 mr-3">
                            <p class="sm:px-3 sm:py-0 py-2 w-[200px]">Ongkos Kirim</p><span
                                class="sm:w-[200px]   w-[200px] px-5 py-0  rounded-md">=
                                <?= $detailOrder[0]->ongkir ?>
                            </span>
                        </div>
                        <div class="flex mt-2 mr-3">
                            <p class="sm:px-3 sm:py-0 py-2 w-[200px]">Total Bayar</p><span
                                class="sm:w-[200px] w-[200px]   text-lime-500 px-3 py-0  rounded-md">=
                                <?= $detailOrder[0]->orderPriceAmount ?>
                            </span>
                        </div>
                        <div class="flex mt-2 mr-3">
                            <p class="sm:px-3 sm:py-0 py-2 w-[200px]">Total Laba</p><span
                                class="sm:w-[200px] w-[200px]  text-blue-500 px-3 py-0  rounded-md">=
                                <?= $detailOrder[0]->orderProfitAmount ?>
                            </span>
                        </div>
                        <div class="flex mt-2 mr-3">
                            <p class="sm:px-3 sm:py-0 py-2 w-[200px]">Di Bayar</p><span
                                class="sm:w-[200px] w-[200px]   px-3 py-0  rounded-md">=
                                <?= ($totalPayment > 0 || $totalPayment != NULL) ? $totalPayment : 'Belum Dibayar';
                                ?>
                                <?php
                                $kekurangan = $detailOrder[0]->orderPriceAmount - $totalPayment;

                                if($kekurangan > 0): ?>
                                <p>(Kurang
                                    <?= $kekurangan ?>)
                                </p>
                                <?php endif; ?>

                            </span>
                        </div>
                    </div>
                </div>

                <div class="sm:ml-10 ml-0 mt-5 ">
                    <div class="flex justify-around text-white">
                        <div>
                            <form action="<?= site_url('export/surat_jalan'); ?>" method="post" target="_blank">
                                <button type="submit" value="<?= $detailOrder[0]->idOrder ?>" name="idOrder"
                                    id="idOrder" class="bg-blue-500 rounded-md px-3 py-1 shadow-md hover:bg-blue-900"><i
                                        class="fa-solid fa-circle-info"></i>
                                    Print Surat Jalan</button>
                            </form>
                            <!-- <button type="submit" value="" name="idOrder" id="idOrder"
                                                        class="bg-blue-500 rounded-md px-3 py-1 shadow-md hover:bg-blue-900"><i
                                                            class="fa-solid fa-circle-info"></i>
                                                        Print 1</button> -->
                        </div>
                        <div>
                            <form action="<?= site_url('export'); ?>" method="post" target="_blank">
                                <button type="submit" value="<?= $detailOrder[0]->idOrder ?>" name="idOrder"
                                    id="idOrder" class="bg-blue-500 rounded-md px-3 py-1 shadow-md hover:bg-blue-900"><i
                                        class="fa-solid fa-circle-info"></i>
                                    Print Struk</button>
                            </form>
                            <!-- <button type="submit" value="" name="idOrder" id="idOrder"
                                class="bg-blue-500 rounded-md px-3 py-1 shadow-md hover:bg-blue-900"><i
                                    class="fa-solid fa-circle-info"></i>
                                Print 1</button> -->
                        </div>

                    </div>
                    <form class=" font-semibold ml-5 mr-5 py-3" action="<?= site_url('Transaction/paying'); ?>"
                        method="post">
                        <div class="ml-3 sm:mr-5 mt-5 sm:ml-0 sm:mt-7 flex sm:w-full">
                            <input type="hidden" name="idOrder" id="idOrder" value="<?= $detailOrder[0]->idOrder ?>">
                            <input type="hidden" name="kekurangan" id="kekurangan" value="<?= $kekurangan ?>">
                            <?php
                            if($kekurangan > 0): ?>
                            <input type="number"
                                class="sm:mt-2 mb-4 sm:w-full sm:h-[40px] w-[200px] border text-black sm:px-5 py-2 px-3  rounded-md shadow-md "
                                placeholder="Masukan Nominal" id="totalPayment" name="totalPayment"
                                max="<?= $kekurangan ?>" min="0">
                            <div class="sm:mt-3 mt-1 sm:ml-5">

                                <button type="submit" value="payment" id="payment" name="payment"
                                    class="text-white ml-2 sm:ml-0 right-2.5 bottom-2.5 bg-red-600 hover:bg-red-800 py-2 px-10 font-medium rounded-lg text-sm sm:px-5 sm:py-2">Bayar</button>

                            </div>
                            <?php else: ?>

                            <button type="submit" value="payment" id="payment" name="payment" disabled
                                class="text-white ml-2 w-full sm:-mt-2 bg-lime-600  py-2 px-10 font-bold rounded-lg sm:text-xl sm:px-5 sm:py-5">PEMBAYARAN
                                SUDAH
                                LUNAS</button>
                            <?php endif; ?>
                        </div>
                        <p>Jika Lunas Tombol input hijau jika pending merah</p>
                    </form>
                </div>
            </div>
            <div class="bg-white font-bold rounded-md mb-1 mt-1 py-3">
                <div class="sm:ml-20 sm:mr-20 ml-0 mr-0 ">
                    <div class="flex mt-2 mr-3 mb-5 bg-slate-400">
                        <p class="sm:px-5 sm:py-2 px-3 py-2 w-[200px]">TOTAL BAYAR</p><span
                            class="sm:w-[200px]   w-[200px] px-5 py-2  rounded-md">
                            TANGGAL BAYAR</span>
                    </div>

                    <?php
                    $total = 0;
                    foreach($payment as $row): ?>

                    <div class="flex mt-2 mr-3 bg-slate-300">
                        <p class="sm:px-5 sm:py-2 px-3 py-2 w-[200px]">
                            <?= $row->totalPayment ?>
                        </p><span class="sm:w-full   w-[200px] py-2  rounded-md">
                            <?= $row->paymentTimestamp ?>
                        </span>
                    </div>

                    <?php endforeach; ?>


                </div>
            </div>
            <br>
            <a class="sm:text-lg sm:w-full text-sm  sm:mt-3 font-bold px-[100px] text-white py-2 rounded-sm bg-red-700 hover:bg-primary"
                href="<?= base_url() ?>transaction">kembali</a>
        </div>


        <!-- </form> -->
    </div>
    <script src="<?= base_url() ?>/dist/js/script.js"></script>
</body>

</html>