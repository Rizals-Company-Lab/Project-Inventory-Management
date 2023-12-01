<div id="allContent">
    <div class="sm:flex w-full sm:justify-evenly">
        <div class="">
            <label class="font-bold sm:text-lg text-sm " for="buyerName">Nama Pembeli :</label>
            <input class="mt-2 w-full py-2 border text-black px-5  rounded-md shadow-md" placeholder="Nama Pembeli"
                required type="text" name="buyerName" id="buyerName">
        </div>
        <div class="sm:ml-3">
            <label class="font-bold sm:text-lg text-sm " for="buyerName">Alamat Pembeli :</label>
            <input class="mt-2 w-full  py-2 border text-black px-5  rounded-md shadow-md" placeholder="Alamat Pembeli"
                required type="text" name="buyerName" id="buyerName">
        </div>
        <div class="sm:ml-3">
            <label class="font-bold sm:text-lg text-sm " for="buyerName">No Hp Pembeli :</label>
            <input class="mt-2 w-full  py-2 border text-black px-5  rounded-md shadow-md" placeholder="No Hp Pembeli"
                required type="text" name="buyerName" id="buyerName">
        </div>
        <div class="sm:ml-3">
            <label class="font-bold sm:text-lg text-sm " for="buyerName">No. REK Pembeli :</label>
            <input class="mt-2 w-full  py-2 border text-black px-5  rounded-md shadow-md" placeholder="Rekening Pembeli"
                required type="text" name="buyerName" id="buyerName">
        </div>
    </div>
    <div class="sm:flex w-full justify-between mb-5 sm:mt-3">
        <div class="">
            <label class="font-bold sm:text-lg text-sm" for="search">Search:</label>
            <input class="mt-2 w-full  py-2 border text-black px-5  rounded-md shadow-md" type="text" id="search"
                placeholder="Cari Barang Disini...">
        </div>
        <div class="sm:ml-3">
            <label class="font-bold sm:text-lg text-sm" for="buyerName">Ongkos Kirim :</label>
            <input class="mt-2 w-full  py-2 border text-black px-5  rounded-md shadow-md" placeholder="Input Nominal"
                required type="text" name="buyerName" id="buyerName">
        </div>
    </div>
    <div class="overflow-x-scroll">
        <table class=" w-[500px] sm:w-full mt-5">
            <div class="p-3 w-full sm:bg-dark">
                <thead class="bg-blue-400">
                    <tr class="text-[12px] sm:text-xl">
                        <th class="py-3">SKU</th>
                        <th class="py-3">Nama Barang</th>
                        <th class="py-3">Deskripsi Barang</th>
                        <th class="py-3">Harga Jual</th>
                        <th class="py-3">Stock</th>
                        <th class="py-3">Action</th>
                    </tr>
                </thead>
                <tbody id="dataProduct">

                    <?php foreach ($product->result() as $singleView): ?>
                    <tr class="cursor-pointer text-[10px] sm:text-xl bg-white py-2  hover:bg-slate-200 duration-300">
                        <td class="py-3 w-auto">
                            <?= $singleView->SKU ?>
                        </td>
                        <td class="py-3 w-auto">
                            <?= $singleView->productName ?>
                        </td>
                        <td class="py-3 w-auto">
                            <?= $singleView->productDescription ?>
                        </td>
                        <td class="py-3 w-auto">
                            <?= $singleView->materialPrice ?>
                        </td>
                        <td class="py-3 w-auto">
                            <?= $singleView->sisa_stock ?>
                        </td>
                        <td class="py-3 w-auto">
                            <?php


                                        $isSKUExist = in_array($singleView->SKU, array_column($checkout->result(), 'SKU'));

                                        ?>
                            <button class="bg-blue-700 rounded-md text-white px-5 py-1 shadow-md hover:bg-blue-900"
                                <?= $isSKUExist ? 'disabled' : ($singleView->sisa_stock > 0 ? '' : 'disabled') ?>
                                type="button" onclick="insertDataPesan('<?= $singleView->SKU ?>')">

                                <?= $isSKUExist ? 'Sudah dipesan' : ($singleView->sisa_stock > 0 ? 'Pesan' : 'Stock Kosong') ?>
                            </button>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </div>
        </table>
    </div>
    <div id="pagination" class="mt-3">

        <nav aria-label="Page navigation example">
            <ul
                class="inline-flex -space-x-px w-fit h-fit rounded-lg border border-gray-300 overflow-hidden  divide-x ">
                <li id="prevPage"
                    class="inline-flex -space-x-px px-3 py-2 leading-tight text-gray-500 bg-white hover:bg-gray-100 hover:text-gray-700">
                    &laquo;

                </li>
                <span id="prevPrevCurrent"
                    class="inline-flex -space-x-px px-3 py-2 leading-tight text-gray-500 bg-white hover:bg-gray-100 hover:text-gray-700"></span>
                <span id="prevCurrent"
                    class="inline-flex -space-x-px px-3 py-2 leading-tight text-gray-500 bg-white hover:bg-gray-100 hover:text-gray-700"></span>
                <span id="currentPage"
                    class="inline-flex -space-x-px px-3 py-2 leading-tight text-blue-600 bg-blue-100 divide-x-2"></span>
                <span id="nextCurrent"
                    class="inline-flex -space-x-px px-3 py-2 leading-tight text-gray-500 bg-white hover:bg-gray-100 hover:text-gray-700"></span>
                <span id="nextNextCurrent"
                    class="inline-flex -space-x-px px-3 py-2 leading-tight text-gray-500 bg-white hover:bg-gray-100 hover:text-gray-700"></span>
                <li id="nextPage"
                    class="inline-flex -space-x-px px-3 py-2 leading-tight text-gray-500 bg-white hover:bg-gray-100 hover:text-gray-700">
                    &raquo;
                </li>
            </ul>
        </nav>


        <!-- <button id="prevPage">Previous</button>
                <span id="currentPage">1</span>
                <button id="nextPage">Next</button> -->
    </div>
    <br>
    <div>
        <h1 class="font-bold sm:text-2xl text-base py-3 bg-bg2 text-center">PEMESANAN</h1>
        <div class="overflow-x-scroll">

            <table class=" w-[500px] sm:w-full sm:mt-5">
                <div class="p-3 w-full sm:bg-dark">
                    <thead class="bg-blue-400">
                        <tr class="text-[12px] sm:text-xl">
                            <th class="py-3 ">Nama Barang</th>
                            <th class="py-3">Deskripsi Barang</th>
                            <th class="py-3">Jumlah</th>
                            <th class="py-3">Delete</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php foreach ($checkout->result() as $row): ?>
                        <tr>

                            <input type="hidden" name="SKU<?= $row->idCheckout ?>" id="SKU<?= $row->idCheckout ?>"
                                value="<?= $row->idCheckout ?>">

                            <input type="hidden" name="materialPrice<?= $row->idCheckout ?>"
                                id="materialPrice<?= $row->idCheckout ?>" value="<?= $row->materialPrice ?>">
                            <!-- <?= $row->materialPrice ?> -->
                            <td class="border px-3 py-2 shadow-sm">
                                <!-- <input type="hidden" name="productName<?= $row->productName ?>"
                                        id="productName<?= $row->productName ?>" value="<?= $row->productName ?>"> -->
                                <?= $row->productName ?>
                            </td>
                            <td class="border px-3 py-2 shadow-sm">
                                <?= $row->productDescription ?>
                            </td>
                            <td class="border px-3 py-2 shadow-sm">

                                <input class="py-2 w-full ml-3 text-center border" type="number"
                                    name="qtyOrder<?= $row->idCheckout ?>" value="1" min="1" max="<?php foreach ($product->result() as $singleView):
                                                    if ($row->SKU == $singleView->SKU) {
                                                        echo $singleView->sisa_stock;
                                                    }
                                                endforeach; ?>">
                            </td>
                            <td class="border px-3 py-2 shadow-sm">

                                <button class="bg-blue-700 rounded-md text-white px-5 py-1 shadow-md hover:bg-blue-900"
                                    type="button" onclick="deleteDataPesan('<?= $row->SKU ?>')">-</button>
                            </td>

                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </div>
            </table>
        </div>
    </div>
</div>