    </div>
    <!-- End of Main Content -->

    <!-- Footer -->
    <footer class="sticky-footer bg-white">
        <div class="container my-auto">
            <div class="copyright text-center my-auto">
                <span>Copyright &copy; With Love <?= date('Y'); ?></span>
            </div>
        </div>
    </footer>
    <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Yakin untuk Keluar?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Pilih "keluar" di bawah ini jika Anda siap untuk mengakhiri sesi Anda saat ini.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                    <a class="btn btn-primary" href="<?= base_url('auth/logout') ?>">Keluar</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Bootstrap core JavaScript-->
    <script src="<?= base_url(); ?>assets/vendor/jquery/jquery.min.js"></script>
    <script src="<?= base_url(); ?>assets/vendor/jquery/jquery.js"></script>
    <script src="<?= base_url(); ?>assets/vendor/jquery/jquery-ui.js"></script>
    <script src="<?= base_url(); ?>assets/assets/js/jquery-3.3.1.js"></script>
    <script src="<?= base_url(); ?>assets/assets/js/jquery-ui.js"></script>
    <script src="<?= base_url(); ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?= base_url(); ?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?= base_url(); ?>assets/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="<?= base_url(); ?>assets/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="<?= base_url(); ?>assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <script src="<?= base_url(); ?>assets/vendor/datatables/Buttons-1.5.6/js/dataTables.buttons.min.js"></script>
    <script src="<?= base_url(); ?>assets/vendor/datatables/Buttons-1.5.6/js/buttons.bootstrap4.min.js"></script>
    <script src="<?= base_url(); ?>assets/vendor/datatables/JSZip-2.5.0/jszip.min.js"></script>
    <script src="<?= base_url(); ?>assets/vendor/datatables/pdfmake-0.1.36/pdfmake.min.js"></script>
    <script src="<?= base_url(); ?>assets/vendor/datatables/pdfmake-0.1.36/vfs_fonts.js"></script>
    <script src="<?= base_url(); ?>assets/vendor/datatables/Buttons-1.5.6/js/buttons.html5.min.js"></script>
    <script src="<?= base_url(); ?>assets/vendor/datatables/Buttons-1.5.6/js/buttons.print.min.js"></script>
    <script src="<?= base_url(); ?>assets/vendor/datatables/Buttons-1.5.6/js/buttons.colVis.min.js"></script>
    <!-- Page level custom scripts -->
    <script src="<?= base_url(); ?>assets/vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <!-- <script src="<?= base_url(); ?>assets/js/demo/chart-area-demo.js"></script>
    <script src="<?= base_url(); ?>assets/js/demo/chart-pie-demo.js"></script> -->
    <!-- tooltip -->
    <script>
        $(document).ready(function() {
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>
    <!-- export laporan -->
    <script>
        $(document).ready(function() {
            $('#dataTable').DataTable({
                // buttons: ['copy', 'csv', 'print', 'excel', 'pdf', 'colvis'],
                // dom: "<'row'<'col-md-3'l><'col-md-5'B><'col-md-4'f>>" +
                //     "<'row'<'col-md-12'tr>>" +
                //     "<'row'<'col-md-5'i><'col-md-7'p>>",
                // lengthMenu: [
                //     [5, 10, 25, 50, 100, -1],
                //     [5, 10, 25, 50, 100, "All"]
                //]
            });

            // table.buttons().container()
            //     .appendTo('#table_wrapper .col-md-5:eq(0)');
        });
    </script>

    <!-- autocomplete -->
    <script>
        var i = 0;
        var smartAuto = (function() {
            var addBtn, html, rowCount, tablebody;
            addBtn = $('#add');
            rowCount = $('#cekgizi tbody tr').length + 1;
            tablebody = $('#cekgizi tbody');


            function formHtml() {
                <?php $nomor = 1; ?>
                <?php
                // tanggal lahir
                $umr = $user['tanggallahir'];
                $tanggal = strtotime($umr);
                $sekarang = strtotime(date('y-m-d'));
                $diff = $sekarang - $tanggal;
                // tanggal hari ini
                // tahun
                $bulan = floor($diff / (60 * 60 * 24 * 30));
                $tahun = floor($diff / (60 * 60 * 24 * 365));

                ?>
                console.log(rowCount);
                <?php date_default_timezone_set('Asia/Jakarta'); ?>
                html = '<tr id = "row_' + rowCount + '" >';
                html += '<td class="text-center">' + rowCount + '</td>';
                html += '<td hidden>';
                html += '<input type="text" class="form-control" data-type="id_user" id="id_user[]" name="id_user[]" value="<?= $user['id']; ?>">';
                html += '</td>';
                html += '<td hidden>';
                html += '<input type="text" data-type="tgl" class="form-control" id="tgl[]" name="tgl[]" value="<?= date('Y-m-d'); ?>">';
                html += '</td>';
                html += '<td hidden>';
                html += '<input type="text" class="form-control" data-type="jeniskelamin" id="jeniskelamin[]" name="jeniskelamin[]" value="<?= $user['jeniskelamin']; ?>">';
                html += '</td>';
                html += '<td hidden>';
                html += '<input type="text" class="form-control" data-type="bulan" id="bulan[]" name="bulan[]" value="<?= $bulan; ?>">';
                html += '</td>';
                html += '<td hidden>';
                html += '<input type="text" class="form-control" data-type="tahun" id="tahun[]" name="tahun[]" value="<?= $tahun; ?>">';
                html += '</td>';
                html += '<td hidden>';
                html += '<input type="text" class="form-control" data-type="tinggibadan" id="tinggibadan[]" name="tinggibadan[]" value="<?= $user['tb']; ?>">';
                html += '</td>';
                html += '<td hidden>';
                html += '<input type="text" class="form-control" data-type="beratbadan" id="beratbadan[]" name="beratbadan[]" value="<?= $user['bb']; ?>">';
                html += '</td>';
                html += '<td>';
                html += '<input type="text" class="form-control autocomplete_txt" data-field-name="foodname" id="bahanmakanan_' + rowCount + '" name="bahanmakanan[]" placeholder = "Masukan Bahan Makanan" required>';
                html += '</td>';
                html += '<td>';
                html += '<input type="text" class="form-control" data-type="urt" id="urt[]" name="urt[]" placeholder ="Cth. 1 Piring " required>';
                html += '</td>';
                html += '<td>';
                html += '<input type="number" class="form-control" data-type="berat" id="berat_' + rowCount + '" name="berat[]" placeholder = "Masukan Berat (gr)" required>';
                html += '</td>';
                html += '<td hidden>';
                html += '<input type="text" data-field-name="energy" class="form-control autocomplete_txt" id="energi_' + rowCount + '"  readonly>';
                html += '</td>';
                html += '<td hidden>';
                html += '<input type="text" data-field-name="fats" class="form-control autocomplete_txt" id="lemak_' + rowCount + '"  readonly>';
                html += '</td>';
                html += '<td hidden>';
                html += '<input type="text" data-field-name="protein" class="form-control autocomplete_txt" id="protein_' + rowCount + '"  readonly>';
                html += '</td>';
                html += '<td hidden>';
                html += '<input type="text" data-field-name="carbhdrt" class="form-control autocomplete_txt" id="karbohidrat_' + rowCount + '" readonly>';
                html += '</td>';
                html += '<td hidden>';
                html += '<input type="text" data-field-name="f_edible" class="form-control autocomplete_txt" id="f_edible_' + rowCount + '" readonly>';
                html += '</td>';
                html += '<td>';
                html += '<input type="text" data-field-name="energy" class="form-control autocomplete_txt" id="h_energi_' + rowCount + '" name="energi[]" >';
                html += '</td>';
                html += '<td>';
                html += '<input type="text" data-field-name="protein" class="form-control autocomplete_txt" id="h_protein_' + rowCount + '" name="protein[]" >';
                html += '</td>';
                html += '<td>';
                html += '<input type="text" data-field-name="fats" class="form-control autocomplete_txt" id="h_lemak_' + rowCount + '" name="lemak[]" >';
                html += '</td>';
                html += '<td>';
                html += '<input type="text" data-field-name="carbhdrt" class="form-control autocomplete_txt" id="h_karbohidrat_' + rowCount + '" name="karbohidrat[]" >';
                html += '</td>';
                html += '<td class="delete_row text-center" id="delete_' + rowCount + '">';
                html += '<a data-toggle="tooltip" title="Hapus" id="hapusbaris" class="text-danger" ><i class="fas fa-trash"></i></a>';
                html += '</td>';
                html += '</tr>';
                rowCount++;
                return html;


            }

            function getFieldNo(type) {
                var fieldNo;
                switch (type) {
                    case 'bahanmakanan':
                        fieldNo = 0;
                        break;
                }
                return fieldNo;
            }


            function handleAutocomplete() {
                var fieldName, currentEle;
                currentEle = $(this);

                fieldName = currentEle.data('field-name');
                if (typeof fieldName === 'undefined') {
                    return false;
                }
                currentEle.autocomplete({
                    source: function(data, cb) {
                        $.ajax({
                            url: '<?php echo site_url('User/get_autocomplete'); ?>',
                            method: 'GET',
                            dataType: 'json',
                            data: {
                                bahanmakanan: data.term,
                                fieldName: fieldName
                            },
                            success: function(res) {
                                var result;
                                result = [{
                                    label: 'Bahan makanan ' + data.term + ' tidak ditemukan',
                                    value: ''
                                }];
                                console.log('before format', res);
                                if (res.length) {
                                    result = $.map(res, function(obj) {
                                        return {
                                            label: obj[fieldName],
                                            data: obj[fieldName],
                                            data: obj
                                        };
                                    });
                                }
                                console.log("after format", result);
                                cb(result);
                            }
                        });
                    },
                    autoFocus: true,
                    minLength: 1,
                    select: function(event, selectedData) {
                        console.log(selectedData);
                        if (selectedData && selectedData.item && selectedData.item.data) {
                            var rowNo, data;
                            rowNo = getId(currentEle);
                            data = selectedData.item.data;

                            $('#bahanmakanan_' + rowNo).val(data.foodname);
                            $('#energi_' + rowNo).val(data.energy);
                            $('#lemak_' + rowNo).val(data.fats);
                            $('#protein_' + rowNo).val(data.protein);
                            $('#karbohidrat_' + rowNo).val(data.carbhdrt);
                            $('#f_edible_' + rowNo).val(data.f_edible);
                        }
                    }

                });
            }

            function getId(element) {
                var id, idarr;
                id = element.attr('id');
                console.log(id);
                idarr = id.split('_');
                console.log(idarr);
                return idarr[idarr.length - 1];
            }

            function addNewRow() {
                tablebody.append(formHtml());
                tablebody.append(myFunction());

            }

            function deleteRow() {
                var currentEle, rowNo;
                currentEle = $(this);
                rowNo = getId(currentEle);
                console.log(rowNo);
                $('#row_' + rowNo).remove();
            }

            function registerEvent() {
                addBtn.on('click', addNewRow);
                $(document).on('click', '.delete_row', deleteRow);
                //register autocomplete event
                $(document).on('focus', '.autocomplete_txt', handleAutocomplete);
            }

            var i = 0;
            // hitung zat gizi
            function myFunction() {
                var rowCount = $('#cekgizi tbody tr').length + 0;
                console.log(rowCount);
                $("#berat_" + rowCount).keyup(function() {
                    var berat = $(this).val();
                    var energi = $('#energi_' + rowCount).val();
                    var lemak = $('#lemak_' + rowCount).val();
                    var protein = $('#protein_' + rowCount).val();
                    var karbohidrat = $('#karbohidrat_' + rowCount).val();
                    var bdd = $("#f_edible_" + rowCount).val();
                    var h_energi = parseFloat(berat) * parseFloat(energi) / parseFloat(bdd);
                    var h_lemak = parseFloat(berat) * parseFloat(lemak) / parseFloat(bdd);
                    var h_protein = parseFloat(berat) * parseFloat(protein) / parseFloat(bdd);
                    var h_karbohidrat = parseFloat(berat) * parseFloat(karbohidrat) / parseFloat(bdd);
                    $("input[id=h_energi_" + rowCount + "]").val(h_energi);
                    $("input[id=h_lemak_" + rowCount + "]").val(h_lemak);
                    $("input[id=h_protein_" + rowCount + "]").val(h_protein);
                    $("input[id=h_karbohidrat_" + rowCount + "]").val(h_karbohidrat);
                });


            }

            function init() {
                registerEvent();

            }
            return {
                init: init
            }

        })();
        $(document).ready(function() {
            smartAuto.init();
        });
    </script>

    <script>
        $(document).ready(function() {
            $('.hapus_tgl').click(function() {
                var tgl = $(this).attr("id");
                if (confirm("Yakin Ingin Menghapus ?")) {
                    window.location = "<?= base_url(); ?>User/hapusinformasi/" + tgl;
                } else {
                    return false;
                }
            });
        });
    </script>
    <script>

    </script>

    <script>
        // var aa = 0;
        // var z = 1;
        // var numb = 1;
        // var id = "ping";
        // var x, ab, bc, cd, tr, ty, tg, we, er;
        // var id1, id2, stat = "mark",
        //     num = "1";
        // var mnc = "avg";
        // var mno = "total";
        // var abcd = 1;
        // var msg = "status";
        // var aaa = "addrow";
        // $('#' + aaa).click(function(e) {
        //     var i = aa;
        //     var zz = z + aa;
        //     console.log(i);
        //     console.log(zz);
        //     for (i; i < zz; i++) {
        //         var head = document.createElement('TR');
        //         ab = "tear";
        //         bc = zz;
        //         console.log(zz);
        //         cd = ab.concat(bc);
        //         console.log(cd);
        //         head.setAttribute("id", cd);
        //         console.log(head);
        //         document.getElementById('frm').appendChild(head);

        //         var did = document.createElement("TD");
        //         var pin = id.concat(numb);
        //         console.log(pin);
        //         did.setAttribute("id", pin);
        //         console.log(did);
        //         document.getElementById(cd).appendChild(did);
        //         document.getElementById(pin).innerHTML = numb;
        //         numb++;

        //         for (var p = 0; p < 6; p++) {
        //             if (p < 3) {
        //                 var lab = document.createElement("TD");
        //                 tr = "tead";
        //                 ty = p;
        //                 we = zz;
        //                 er = tr.concat(ty);
        //                 tg = er.concat(we);
        //                 console.log(er);
        //                 console.log(tg);
        //                 lab.setAttribute("id", tg);
        //                 console.log(lab);
        //                 document.getElementById(cd).appendChild(lab);
        //             } else if (p == 3) {
        //                 var lab = document.createElement("TD");
        //                 tr = "tead";
        //                 ty = p;
        //                 we = zz;
        //                 er = tr.concat(ty);
        //                 tg = er.concat(we);
        //                 lab.setAttribute("id", tg);
        //                 var ctot = mno.concat(abcd);
        //                 lab.setAttribute("id", ctot);
        //                 console.log(lab);
        //                 document.getElementById(cd).appendChild(lab);
        //             } else if (p == 4) {
        //                 var lab = document.createElement("TD");
        //                 tr = "tead";
        //                 ty = p;
        //                 we = zz;
        //                 er = tr.concat(ty);
        //                 tg = er.concat(we);
        //                 lab.setAttribute("id", tg);
        //                 var cpo = mnc.concat(abcd);
        //                 lab.setAttribute("id", cpo);
        //                 console.log(lab);
        //                 document.getElementById(cd).appendChild(lab);
        //             } else if (p == 5) {
        //                 var lab = document.createElement("TD");
        //                 var meg = msg.concat(i);
        //                 lab.setAttribute("id", meg);
        //                 console.log(lab);
        //                 document.getElementById(cd).appendChild(lab);

        //             }
        //             // input pada td
        //             if (p == 0) {
        //                 x = document.createElement("INPUT");
        //                 x.setAttribute("type", "text");
        //                 console.log(x);
        //                 document.getElementById(tg).appendChild(x);
        //             } else if (p == 1) {
        //                 x = document.createElement("INPUT");
        //                 x.setAttribute("type", "number");
        //                 id1 = stat.concat(num);
        //                 num++;
        //                 x.setAttribute("id", id1);
        //                 document.getElementById(tg).appendChild(x);
        //             } else if (p == 2) {
        //                 x = document.createElement("INPUT");
        //                 x.setAttribute("type", "number");
        //                 id2 = stat.concat(num);
        //                 num++;
        //                 x.setAttribute("id", id2);
        //                 document.getElementById(tg).appendChild(x);
        //             }
        //         }

        //     }
        //     abcd++;
        //     aa++;

        // });
        // $("#myTable").change(function(e) {
        //     var n = 1;
        //     var qq = 0;
        //     for (var rr = 1; rr < aa; rr++) {
        //         var m1 = stat.concat(n);
        //         console.log(m1);
        //         n++;
        //         var m2 = stat.concat(n);
        //         console.log(m2);
        //         n++;
        //         var a = document.getElementById(m1).value;
        //         var b = document.getElementById(m2).value;
        //         if (a == "") {
        //             a = 0;

        //         } else if (b == "") {
        //             b = 0;
        //         } else {}
        //         var c = Number(a) + Number(b);
        //         var d = (Number(a) + Number(b)) / 2;
        //         var mp = mno.concat(rr);
        //         console.log(mp);
        //         document.getElementById(mp).innerHTML = c;
        //         var cp = mnc.concat(rr);
        //         console.log(cp);
        //         document.getElementById(cp).innerHTML = d;
        //         var stanum = msg.concat(qq);
        //         console.log(stanum);
        //         if ((a < 50) || (b < 50)) {
        //             document.getElementById(stanum).innerHTML = "fail";
        //             qq++;
        //         } else {
        //             document.getElementById(stanum).innerHTML = "Pass";
        //             qq++;
        //         }

        //     }
        // });
    </script>
    </body>

    </html>