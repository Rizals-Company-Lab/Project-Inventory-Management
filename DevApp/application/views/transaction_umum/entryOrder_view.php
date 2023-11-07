<body>


    <form
        class="sm:mx-auto  bg-white sm:mt-5 relative mb-5 w-auto mt-6 h-full sm:w-[75%] sm:h-[90%] p-3 ml-3 mr-3  shadow-sm border shadow-white rounded-md group"
        action="<?= site_url('transaction_umum/save_transaction'); ?>" method="post">
        <h1 class="font-bold sm:text-2xl text-base py-3 bg-bg2 text-center">TAMBAH TRANSAKSI UMUM</h1>
        <br>
        <div class="flex w-full justify-evenly">
            <div>
                <label class="font-bold sm:text-lg text-sm " for="buyerName">Nama Pembeli</label>

                <input
                    class="mt-2 appearance-none w-full bg-gray-200 text-gray-700 border border-blue-500 rounded sm:py-3 py-1 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                    required type="text" name="buyerName" id="buyerName">
            </div>
            <div class="ml-10">
                <label class="font-bold sm:text-lg text-base " for="bankAccountNumber">Rekening</label>

                <input
                    class="mt-2 appearance-none  w-full bg-gray-200 text-gray-700 border border-blue-500 rounded sm:py-3 py-1 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                    type="text" name="bankAccountNumber" id="bankAccountNumber">
            </div>
        </div>
        <style>
            #loading-container {
                position: fixed;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
            }

            #loading-spinner {
                border: 6px solid rgba(0, 0, 0, 0.3);
                border-radius: 50%;
                border-top: 6px solid #3498db;
                width: 50px;
                height: 50px;
                animation: spin 1s linear infinite;
            }

            @keyframes spin {
                0% {
                    transform: rotate(0deg);
                }

                100% {
                    transform: rotate(360deg);
                }
            }
        </style>
        <div id="loading-container">
            <div id="loading-spinner"></div>
        </div>
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




        </div>
        <script src="<?= base_url() ?>/dist/js/script.js"></script>

        <script src="<?= base_url() ?>dist/js/jquery.min.js"></script>

        <script type="text/javascript">
            $(document).ready(function () {



                // Initialize the display




            });


            function test() {

                var currentPage = sessionStorage.getItem('currentPage') || 1;

                console.log("currentPage" + currentPage);
                var itemsPerPage = 3; // Set the number of items per page
                // Menghitung jumlah elemen <tr> dalam tabel
                var jumlahTr = $('#dataProduct tr').length;

                var maxPages = Math.ceil(jumlahTr / itemsPerPage);

                // Menampilkan jumlah <tr> dalam console (bisa diubah sesuai kebutuhan)
                console.log("Jumlah <tr> dalam tabel: " + maxPages);
                // Function to update the displayed items based on the current page


                function updateDisplay() {


                    if (sessionStorage.getItem('searchText')) {
                        searchProduct()
                    } else {
                        console.log("currentPage" + currentPage);
                        sessionStorage.setItem('currentPage', currentPage);
                        var startIndex = (currentPage - 1) * itemsPerPage;
                        var endIndex = startIndex + itemsPerPage;

                        $('#dataProduct tr').hide(); // Hide all rows
                        $('#dataProduct tr').slice(startIndex, endIndex).show(); // Show the current page items
                        $('#prevPrevCurrent').text(parseInt(currentPage) - 2); // Update the current page indicator
                        $('#prevCurrent').text(parseInt(currentPage) - 1); // Update the current page indicator
                        $('#currentPage').text(parseInt(currentPage)); // Update the current page indicator
                        $('#nextCurrent').text(parseInt(currentPage) + 1); // Update the current page indicator
                        $('#nextNextCurrent').text(parseInt(currentPage) + 2); // Update the current page indicator

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
                        // Remove a specific item from session storage
                        sessionStorage.removeItem('searchText');

                        console.log("Backspace koso" + characterCount);
                        $('#pagination').show()
                        updateDisplay();
                    } else {
                        sessionStorage.setItem('searchText', searchText);
                        searchProduct()
                    }

                });
                function searchProduct() {

                    var searchText = sessionStorage.getItem('searchText');



                    $('#search').val(searchText);
                    $('#dataProduct tr').hide(); // Hide all rows
                    $('#pagination').hide()
                    // Show rows that match the search text
                    $('#dataProduct tr').filter(function () {
                        return $(this).text().toLowerCase().includes(searchText);
                    }).show();
                }
            }

            test()
            $('#loading-container').hide();

            function insertDataPesan(SKU) {
                $('#loading-container').show();
                console.log("loadinggggggg");
                $.ajax({
                    url: "<?= base_url('transaction_umum/insert_checkout') ?>",
                    type: "post",
                    data: {
                        SKU: SKU
                    },
                    success: function (response) {
                        // console.log(response);
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
                        test();
                        $('#loading-container').hide();
                        console.log("loadingg ilabnggg");
                        // location.reload()
                    }
                });


                console.log("UPdaterrrt");
            }

            function deleteDataPesan(SKU) {
                $('#loading-container').show();
                console.log("loadinggggggg");
                $.ajax({
                    url: "<?= base_url('transaction_umum/delete_checkout') ?>",
                    type: "post",
                    data: {
                        SKU: SKU
                    },
                    success: function (response) {
                        // console.log(response);
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
                        test();
                        $('#loading-container').hide();
                        console.log("loadingg ilabnggg");
                        // location.reload()
                    }
                });
            }
        </script>
        <button
            class="sm:text-lg text-sm mb-3 sm:font-bold font-semibold mt-3 px-[50px] text-white py-2 w-full rounded-sm bg-blue-500 hover:bg-lime-500"
            type="submit">PESAN SEKARANG</button>

    </form>
</body>

<!-- <script>
    $(document).ready(function () {
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

        // Initialize the display
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

        // Search functionality
        // $('#search').on('input', function () {
        //     var searchText = $(this).val().toLowerCase();
        //     console.log("aksdfhkasdf: '" + searchText + "'");


        //     $('#dataProduct tr').hide(); // Hide all rows

        //     // Show rows that match the search text
        //     $('#dataProduct tr').filter(function () {
        //         return $(this).text().toLowerCase().includes(searchText);
        //     }).show();

        // });

        // if (searchText = '') {
        //     updateDisplay();
        // }


        // MINIMAL SEPERTI INI
        // $('#search').on('keydown', function (e) {
        //     var searchText = $(this).val().toLowerCase();
        //     var characterCount = searchText.length;
        //     if (e.which === 8 || e.keyCode === 8) {
        //         console.log("Backspace tertekan" + characterCount);
        //         if (characterCount <= 1) {
        //             console.log("Backspace koso" + characterCount);
        //             updateDisplay();
        //         } else {

        //             $('#dataProduct tr').hide(); // Hide all rows

        //             // Show rows that match the search text
        //             $('#dataProduct tr').filter(function () {
        //                 return $(this).text().toLowerCase().includes(searchText);
        //             }).show();
        //         }
        //     } else {
        //         $('#dataProduct tr').hide(); // Hide all rows

        //         // Show rows that match the search text
        //         $('#dataProduct tr').filter(function () {
        //             return $(this).text().toLowerCase().includes(searchText);
        //         }).show();
        //     }
        // });


        // VERSI MINIMUM YANG LEBIH SINGKAT
        // $('#search').on('keyup', function (e) {
        //     var searchText = $(this).val().toLowerCase();
        //     var characterCount = searchText.length;


        //     console.log("SDFG tertekan" + characterCount);
        //     if (characterCount <= 0) {
        //         console.log("Backspace koso" + characterCount);
        //         updateDisplay();
        //     } else {
        //         $('#dataProduct tr').hide(); // Hide all rows

        //         // Show rows that match the search text
        //         $('#dataProduct tr').filter(function () {
        //             return $(this).text().toLowerCase().includes(searchText);
        //         }).show();
        //     }

        // });
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

    });

</script> -->
<!-- <script>
    $(document).ready(function () {
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
            $('#currentPage').text(currentPage); // Update the current page indicator

            if (currentPage < maxPages) {
                $('#nextPage').show()

            } else {

                $('#nextPage').hide()
            }
            if (currentPage > 1) {
                $('#prevPage').show()

            } else {

                $('#prevPage').hide()
            }


        }

        // Initialize the display
        updateDisplay();

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

        // Search functionality
        $('#search').on('input', function () {
            var searchText = $(this).val().toLowerCase();

            $('#dataProduct tr').hide(); // Hide all rows

            // Show rows that match the search text
            $('#dataProduct tr').filter(function () {
                return $(this).text().toLowerCase().includes(searchText);
            }).show();
        });
    });
</script> -->




</html>