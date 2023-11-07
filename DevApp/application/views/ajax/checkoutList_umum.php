<div id="allContent">
            <div class="mt-3">
                <label for="search">Search:</label>
                <input type="text" id="search" placeholder="Enter keywords...">
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
                                <tr
                                    class="cursor-pointer text-[10px] sm:text-xl bg-white py-2  hover:bg-slate-200 duration-300">
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
                                        <?= $singleView->sellingPrice ?>
                                    </td>
                                    <td class="py-3 w-auto">
                                        <?= $singleView->sisa_stock ?>
                                    </td>
                                    <td class="py-3 w-auto">
                                        <?php


                                        $isSKUExist = in_array($singleView->SKU, array_column($checkout->result(), 'SKU'));

                                        ?>
                                        <button
                                            class="bg-blue-700 rounded-md text-white px-5 py-1 shadow-md hover:bg-blue-900"
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
                            class="inline-flex -space-x-px px-3 py-2 leading-tight text-gray-500 bg-white hover:bg-gray-100 hover:text-gray-700">1</span>
                        <span id="prevCurrent"
                            class="inline-flex -space-x-px px-3 py-2 leading-tight text-gray-500 bg-white hover:bg-gray-100 hover:text-gray-700">1</span>
                        <span id="currentPage"
                            class="inline-flex -space-x-px px-3 py-2 leading-tight text-blue-600 bg-blue-100 divide-x-2">1</span>
                        <span id="nextCurrent"
                            class="inline-flex -space-x-px px-3 py-2 leading-tight text-gray-500 bg-white hover:bg-gray-100 hover:text-gray-700">1</span>
                        <span id="nextNextCurrent"
                            class="inline-flex -space-x-px px-3 py-2 leading-tight text-gray-500 bg-white hover:bg-gray-100 hover:text-gray-700">1</span>
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

                                        <input type="hidden" name="SKU<?= $row->idCheckout ?>"
                                            id="SKU<?= $row->idCheckout ?>" value="<?= $row->idCheckout ?>">

                                        <input type="hidden" name="sellingPrice<?= $row->idCheckout ?>"
                                            id="sellingPrice<?= $row->idCheckout ?>" value="<?= $row->sellingPrice ?>">
                                        <!-- <?= $row->sellingPrice ?> -->
                                        <td class="border px-3 py-2 shadow-sm">
                                            <!-- <input type="hidden" name="productName<?= $row->productName ?>"
                                        id="productName<?= $row->productName ?>" value="<?= $row->productName ?>"> -->
                                            <?= $row->productName ?>
                                        </td>
                                        <td class="border px-3 py-2 shadow-sm">
                                            <?= $row->productDescription ?>
                                        </td>
                                        <td class="border px-3 py-2 shadow-sm">

                                            <input type="number" name="qtyOrder<?= $row->idCheckout ?>" value="1" min="1"
                                                max="<?php foreach ($product->result() as $singleView):
                                                    if ($row->SKU == $singleView->SKU) {
                                                        echo $singleView->sisa_stock;
                                                    }
                                                endforeach; ?>">
                                        </td>
                                        <td class="border px-3 py-2 shadow-sm">

                                            <button
                                                class="bg-blue-700 rounded-md text-white px-5 py-1 shadow-md hover:bg-blue-900"
                                                type="button" onclick="deleteDataPesan('<?= $row->SKU ?>')">-</button>
                                        </td>

                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </div>

                    </table>

                </div>
            </div>
            
            <script src="<?= base_url() ?>/dist/js/script.js"></script>
            
            <script src="<?= base_url() ?>dist/js/jquery.min.js"></script>
            
            <script type="text/javascript">
                $(document).ready(function () {



                    // Initialize the display




                });


                var itemsPerPage = 3; // Set the number of items per page
                var currentPage = 1;
                // Menghitung jumlah elemen <tr> dalam tabel
                var jumlahTr = $('#dataProduct tr').length;

                var maxPages = Math.ceil(jumlahTr / itemsPerPage);

                // Menampilkan jumlah <tr> dalam console (bisa diubah sesuai kebutuhan)
                console.log("Jumlah <tr> dalam tabel: " + maxPages);
                // Function to update the displayed items based on the current page


                function updateDisplay() {
                    var startIndex = (currentPage - 1) * itemsPerPage;
                    var endIndex = startIndex + itemsPerPage;

                    $('#dataProduct tr').hide(); // Hide all rows
                    $('#dataProduct tr').slice(startIndex, endIndex).show(); // Show the current page items
                    $('#prevPrevCurrent').text(currentPage - 2); // Update the current page indicator
                    $('#prevCurrent').text(currentPage - 1); // Update the current page indicator
                    $('#currentPage').text(currentPage); // Update the current page indicator
                    $('#nextCurrent').text(currentPage + 1); // Update the current page indicator
                    $('#nextNextCurrent').text(currentPage + 2); // Update the current page indicator

                    if (currentPage < maxPages) {
                        $('#nextPage').show()

                    } else {
                        $('#nextPage').hide()
                    }
                    if (currentPage < maxPages - 1) {
                        $('#nextNextCurrent').show()
                    } else {
                        $('#nextNextCurrent').hide()
                    }
                    if (currentPage < maxPages) {
                        $('#nextCurrent').show()
                    } else {
                        $('#nextCurrent').hide()
                    }
                    if (currentPage > 1) {
                        $('#prevCurrent').show()
                    } else {
                        $('#prevCurrent').hide()
                    }
                    if (currentPage > 2) {
                        $('#prevPrevCurrent').show()
                    } else {
                        $('#prevPrevCurrent').hide()
                    }
                    if (currentPage > 1) {
                        $('#prevPage').show()
                    } else {
                        $('#prevPage').hide()
                    }


                }


                updateDisplay();

                // Pagination - Next Page
                $('#nextNextCurrent').click(function () {
                    currentPage = currentPage + 2;
                    updateDisplay();
                });

                // Pagination - Previous Page
                $('#prevPrevCurrent').click(function () {
                    if (currentPage > 1) {
                        currentPage = currentPage - 2;
                        updateDisplay();
                    }
                });

                // Pagination - Next Page
                $('#nextCurrent').click(function () {
                    currentPage++;
                    updateDisplay();
                });

                // Pagination - Previous Page
                $('#prevCurrent').click(function () {
                    if (currentPage > 1) {
                        currentPage--;
                        updateDisplay();
                    }
                });

                // Pagination - Next Page
                $('#nextPage').click(function () {
                    currentPage++;
                    updateDisplay();
                });

                // Pagination - Previous Page
                $('#prevPage').click(function () {
                    if (currentPage > 1) {
                        currentPage--;
                        updateDisplay();
                    }
                });


                $('#search').on('keyup', function (e) {
                    var searchText = $(this).val().toLowerCase();
                    var characterCount = searchText.length;


                    console.log("SDFG tertekan" + characterCount);
                    if (characterCount <= 0) {
                        console.log("Backspace koso" + characterCount);
                        $('#pagination').show()
                        updateDisplay();
                    } else {
                        $('#dataProduct tr').hide(); // Hide all rows
                        $('#pagination').hide()
                        // Show rows that match the search text
                        $('#dataProduct tr').filter(function () {
                            return $(this).text().toLowerCase().includes(searchText);
                        }).show();
                    }

                });

                function insertDataPesan(SKU) {
                    $.ajax({
                        url: "<?= base_url('transaction_umum/insert_checkout') ?>",
                        type: "post",
                        data: {
                            SKU: SKU
                        },
                        success: function (response) {
                            console.log(response);
                            $("#allContent").html(response);
                            // $.ajax({
                            //     type: "GET",
                            //     url: "dist/ajax/ajaxEntry.php",
                            //     data: "",
                            //     success: function (data) {
                            //         $("#allContent").html(data);
                            //         operasi();
                            //     }
                            // });
                            updateDisplay();
                            // location.reload()
                        }
                    });


                    console.log("UPdaterrrt");
                }

                function deleteDataPesan(SKU) {
                    $.ajax({
                        url: "<?= base_url('transaction_umum/delete_checkout') ?>",
                        type: "post",
                        data: {
                            SKU: SKU
                        },
                        success: function (response) {
                            console.log(response);
                            $("#allContent").html(response);
                            // $.ajax({
                            //     type: "GET",
                            //     url: "dist/ajax/ajaxEntry.php",
                            //     data: "",
                            //     success: function (data) {
                            //         $("#allContent").html(data);
                            //         operasi();
                            //     }
                            // });
                            updateDisplay();
                            // location.reload()
                        }
                    });
                }
            </script>

        </div>

        