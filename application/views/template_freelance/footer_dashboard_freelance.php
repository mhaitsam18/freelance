        <!-- Footer -->
        <footer class="sticky-footer bg-white">
            <div class="container my-auto">
                <div class="copyright text-center my-auto">
                    <span>Copyright &copy; Bakoye.Corp <?= date('Y') ?></span>
                </div>
            </div>
        </footer>
        <!-- End of Footer -->

        <!-- </div> -->
        <!-- End of Content Wrapper -->

        <!-- </div> -->
        <!-- End of Page Wrapper -->

        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>
    </div>
</div>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Pilih "Keluar" Apakah kamu yakin ingin keluar dari dashboard.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="<?= base_url('Auth/logout') ?>">Logout</a>
            </div>
        </div>
    </div>
</div>
<!-- </div> -->

<!-- Bootstrap core JavaScript-->
<!-- Bootstrap core JavaScript-->
    <script src="<?= base_url('assets/') ?>vendor/jquery/jquery.min.js"></script>
    <script src="<?= base_url('assets/') ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?= base_url('assets/') ?>vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?= base_url('assets/') ?>js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="<?= base_url('assets/') ?>vendor/chart.js/Chart.min.js"></script>


    <!--Chart Js-->
    <script src="<?= base_url('assets/'); ?>js/Chart.js"></script>


    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script>
    <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
    <script src="http://code.jquery.com/ui/1.11.0/jquery-ui.js"></script>
    <script src="<?= base_url('assets/') ?>js/demo/datatables-demo.js"></script>
    <script src="<?= base_url('assets/') ?>js/demo/datatables2-demo.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
    
    <!--jQuery-->
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    
    <!--Plugin JavaScript file-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/ion-rangeslider/2.3.1/js/ion.rangeSlider.min.js"></script>
    <!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
</aside>

<script>

    $(function() {
        $('.kuliahModal').on('click', function(){
            $('#kuliahModalLabel').html('Tambah Riwayat Kuliah');
            $('.modal-footer button[type=submit]').html('Tambah');
            $('.modal-content form')[0].reset();
            $('.modal-content form').attr('action', '<?= base_url('Freelance/insert_kuliah/') ?>');
        });

        $('.updateKuliahModal').on('click', function() {
            $('#kuliahModalLabel').html('Ubah Riwayat Kuliah');
            $('.modal-footer button[type=submit]').html('Simpan');
            $('.modal-content form').attr('action', '<?= base_url('Freelance/update_kuliah/') ?>');
            const id_kuliah = $(this).data('id_kuliah');
            jQuery.ajax({
                url: '<?= base_url('Freelance/get_update_kuliah/') ?>',
                data: {id_kuliah : id_kuliah},
                method: 'post',
                dataType: 'json',
                success: function(data) {
                    console.log(data);
                    $('#id_kuliah').val(data.id_kuliah);
                    $('#id_cv3').val(data.id_cv);
                    $('#id_jenjang_pendidikan').val(data.id_jenjang_pendidikan);
                    $('#kuliah_universitas').val(data.universitas);
                    $('#fakultas').val(data.fakultas);
                    $('#prodi').val(data.prodi);
                    $('#tahun_lulusan').val(data.tahun_lulusan);
                    // $('#ijazah').val(data.ijazah);
                    // $('#transkip_nilai').val(data.transkip_nilai);
                }
            });
        });
    });
    $(function() {
        $('.newPertanyaanModalButton').on('click', function(){
            $('#newPertanyaanModalLabel').html('Tambah Pertanyaan Umum');
            $('.modal-footer button[type=submit]').html('Tambah');
            $('.modal-content form')[0].reset();
            $('.modal-content form').attr('action', '<?= base_url() ?>/DataMaster/pertanyaan/');
        });

        $('.updatePertanyaanModalButton').on('click', function() {
            $('#newPertanyaanModalLabel').html('Ubah Pertanyaan');
            $('.modal-footer button[type=submit]').html('Simpan');
            $('.modal-content form').attr('action', '<?= base_url() ?>/DataMaster/updatePertanyaan/');
            const id_pertanyaan = $(this).data('id_pertanyaan');
            jQuery.ajax({
                url: '<?= base_url('/DataMaster/getUpdatePertanyaan') ?>',
                data: {id_pertanyaan : id_pertanyaan},
                method: 'post',
                dataType: 'json',
                success: function(data) {
                    console.log(data);
                    $('#id_pertanyaan').val(data.id_pertanyaan);
                    $('#pertanyaan').val(data.pertanyaan);
                }
            });
        });
    });
    $('.custom-file-input').on('change', function() {
        let fileName = $(this).val().split('\\').pop();
        $(this).next('.custom-file-label').addClass("selected").html(fileName);
    });

    $('.cek_role').on('click', function() {
        const menuId = $(this).data('menu');
        const roleId = $(this).data('role');

        $.ajax({
            url: "<?= base_url('admin/changeaccess'); ?>",
            type: 'post',
            data: {
                menuId: menuId,
                roleId: roleId
            },
            success: function() {
                document.location.href = "<?= base_url('admin/roleaccess/') ?>" + roleId;
            }

        });

    });


    // var btn = document.getElementById('button-addon2');

    // tambahkan event ketika provinsi ditulis

    <?php if ($this->uri->segment(2)== 'pencarian'): ?>
        
        var provinsi = document.getElementById('id_provinsi_filter');
        provinsi.addEventListener('change', function () {
            const id_provinsi = provinsi.value;
            document.location.href = "<?= base_url('Freelance/pencarian/') ?>" + id_provinsi;
            // $.ajax({
            //     url: "<?= base_url('Freelance/cariKota'); ?>",
            //     type: 'post',
            //     data: {id_provinsi: id_provinsi},
            //     success: function(data) {
            //         var html = data;
            //         var i;
            //         // for(i=0; i<data.length; i++){
            //         //     html += '<tr>'+
            //         //     '<td>'+data[i].barang_kode+'</td>'+
            //         //     '<td>'+data[i].barang_nama+'</td>'+
            //         //     '<td>'+data[i].barang_harga+'</td>'+
            //         //     '</tr>';
            //         // }
            //         $('#kota').html(html);
            //     }

            // });

        });

        var kota = document.getElementById('id_kota_filter');
        kota.addEventListener('change', function () {
            console.log()
            const id_kota = kota.value;
            const id_provinsi = provinsi.value;
            document.location.href = "<?= base_url('Freelance/pencarian/') ?>" + id_provinsi + '/' + id_kota;
            // $.ajax({
            //     url: "<?= base_url('Freelance/cariKota'); ?>",
            //     type: 'post',
            //     data: {id_kota: id_kota},
            //     success: function() {
            //     }

            // });

        });
    <?php endif ?>
    
</script>
<!-- <script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap4.min.js"></script> -->
<script src="<?= base_url('assets/') ?>dist/sweetalert2.all.js"></script>
    <!-- Optional: include a polyfill for ES6 Promises for IE11 -->
    <script src="//cdn.jsdelivr.net/npm/promise-polyfill@8/dist/polyfill.js"></script>
    <script type="text/javascript">
        const flashData = $('.flash-data').data('flashdata');
        const objek = $('.flash-data').data('objek');
        if (flashData) {
            //'Data ' + 
            Swal.fire({
                title: objek,
                text: flashData,
                icon: 'success'
            });
        }
        $('.tombol-hapus').on('click', function(e) {
            const hapus = $(this).data('hapus');
            const href = $(this).attr('href');
            e.preventDefault();
            Swal.fire({
                title: 'Apakah Anda Yakin?',
                text: "Data " + hapus + " akan dihapus!",
                icon: 'warning',
                confirmButtonText: 'Hapus',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.location.href = href;
                }
            })
        });

        $('.tombol-terima').on('click', function(e) {
            const href = $(this).attr('href');
            e.preventDefault();
            Swal.fire({
                title: 'Apakah Anda Yakin?',
                text: "Pesanan yang diterima, tidak dapat dikembalikan!",
                icon: 'warning',
                confirmButtonText: 'diterima',
                showCancelButton: true,
                confirmButtonColor: '#32a852',
                cancelButtonColor: '#d33'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.location.href = href;
                }
            })
        });
        $('.tombol-yakin').on('click', function(e) {
            const href = $(this).attr('href');
            e.preventDefault();
            Swal.fire({
                title: 'Apakah Anda Yakin?',
                text: "",
                icon: 'warning',
                confirmButtonText: 'Ya',
                cancelButtonText: 'Tidak',
                showCancelButton: true,
                confirmButtonColor: '#32a852',
                cancelButtonColor: '#d33'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.location.href = href;
                }
            })
        });
        $('.minta-password').on('click', function(e) {
            Swal.fire({
                title: 'Masukkan Password',
                input: 'password',
                inputAttributes: {
                    autocapitalize: 'off'
                },
                showCancelButton: true,
                confirmButtonText: 'Look up',
                showLoaderOnConfirm: true,
                preConfirm: (login) => {
                    return fetch(`//api.github.com/users/${login}`)
                    .then(response => {
                        if (!response.ok) {
                            throw new Error(response.statusText)
                        }
                        return response.json()
                    })
                    .catch(error => {
                        Swal.showValidationMessage(
                            `Request failed: ${error}`
                            )
                    })
                },
                allowOutsideClick: () => !Swal.isLoading()
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire({
                        title: `${result.value.login}'s avatar`,
                        imageUrl: result.value.avatar_url
                    })
                }
            })
        });
    </script>
    <script src="https://unpkg.com/isotope-layout@3/dist/isotope.pkgd.min.js"></script>
    <script>
        $(document).ready(function() {
            var $container = $('.gridd').isotope({
                itemSelector: '.grid-item',
            });
            var $checkboxes = $('.select-grid');
            $checkboxes.change(function() {
                var filters = [];
                console.log(filters);
                // get checked checkboxes values
                // filters.push(".show-me");
                // filters.push(":not(.dont-show)");
                $checkboxes.each(function(i, elem) {
                    // if checkbox, use value if checked
                    if (elem.checked) {
                        filters.push(elem.value + ':not(.dont-show)');
                    } 
                    var joinFilters = filters.length ? filters.join(':not(.dont-show), ') : ':not(.dont-show)';
                    console.log(joinFilters);
                    $container.isotope({
                        filter: joinFilters
                    });
                });
            });

            $("#range").ionRangeSlider({
                skin: 'round',
                hide_min_max: true,
                keyboard: true,
                min: 0,
                max: 50000000,
                from: 3000000,
                to: 10000000,
                type: 'double',
                step: 1,
                prefix: "Rp. ",
                grid: true,
                onChange: function(data) {
                    $(".grid-item").each(function(){
                        min_gaji = $(this).find('.gaji_min').data('min');
                        max_gaji = $(this).find('.gaji_max').data('max');
                        console.log(min_gaji);
                        console.log(max_gaji);
                        // const test = min_gaji + max_gaji;
                        // console.log(test);
                        if (data.from <= max_gaji && data.to >= min_gaji) {
                            $(this).addClass('show-me');
                            $(this).removeClass('dont-show');
                        }
                        else {
                            $(this).addClass('dont-show');
                            $(this).removeClass('show-me');
                        }
                    });
                    var filters = [];
                    console.log(filters);
                    // get checked checkboxes values
                    // filters.push(":not(.dont-show)");
                    filters.push(".show-me");
                    $checkboxes.each(function(i, elem) {
                        // if checkbox, use value if checked
                        if (elem.checked) {
                            filters.push(elem.value + ':not(.dont-show)');
                        } 
                        var joinFilters = filters.length ? filters.join(':not(.dont-show), ') : ':not(.dont-show)';
                        console.log(joinFilters);
                        $container.isotope({
                            filter: joinFilters
                        });
                    });
                }
            });

        });

        
        $(function(){
            // var price = 0;
            // var $container = $("#container");
            // var $checkboxes = $("#filter1 input, #filter2 input");
            // var $sortPrice = $("#sort_price");
            // var filters = [];
            // $container.isotope({
            //     itemSelector: '.grid-item',
            //     getSortData: {
            //         number: '.price parseInt'
            //     },
            //     sortBy: 'number'
            // });
            // $sortPrice.on('change', function(){             
            //     var order = $('option:selected', this).attr('data-option-value');
            //     var valAscending = (order == "asc");
            //     $container.isotope({
            //         itemSelector: '.grid-item',
            //         getSortData: {
            //             number: '.price parseInt'   
            //         },
            //         sortBy: 'number',
            //         sortAscending: valAscending,
            //         filter: filters
            //     });
            // });
            // $checkboxes.on('change', function(){
            //     filters = [];
            //     $checkboxes.filter(':checked').each(function(){
            //         filters.push(this.value);
            //     });
            //     filters = filters.join('');
            //     $container.isotope({
            //         filter: filters
            //     });
            // });

            // $("#range").ionRangeSlider({
            //     hide_min_max: true,
            //     keyboard: true,
            //     min: 0,
            //     max: 50000000,
            //     from: 3000000,
            //     to: 10000000,
            //     type: 'double',
            //     step: 1,
            //     prefix: "Rp. ",
            //     grid: true,
            //     onChange: function(data) {
            //         $(".grid-item").each(function(){
            //             price = parseInt($(this).find(".price").text(), 10);
            //             if (data.from <= price && data.to >= price) {
            //                 $(this).addClass('show-me');
            //             }
            //             else {
            //                 $(this).removeClass('show-me');
            //             }
            //         });
            //         $container.isotope({
            //             itemSelector: '.grid-item',
            //             filter: '.show-me'
            //         });
            //     }
            // });
        });

        function hapus_keahlian_freelance(id_keahlian_freelance) {
            console.log(id_keahlian_freelance);
            $.ajax({
                type: "post",
                url: '<?= base_url('Freelance/hapus_keahlian_freelance/') ?>',
                data:{id_keahlian_freelance:id_keahlian_freelance},
                success:function(html) {
                }
            });
        }

        function cariChat(id_perusahaan) {
            $.ajax({
                type  : 'post',
                url   : '<?= base_url('Freelance/getChat/')?>',
                data  : {id_perusahaan:id_perusahaan},
                // async : false,
                // dataType : 'json',
                success : function(data){
                    var html = data;
                    var i;
                    // for(i=0; i<data.length; i++){
                    //     html += '<tr>'+
                    //     '<td>'+data[i].barang_kode+'</td>'+
                    //     '<td>'+data[i].barang_nama+'</td>'+
                    //     '<td>'+data[i].barang_harga+'</td>'+
                    //     '</tr>';
                    // }
                    $('#show_chat').html(html);
                }
            });
         }

         function kirimChat(id_perusahaan) {
            var pesan = document.getElementById("pesan").value;
            $.ajax({
                type  : 'post',
                url   : '<?= base_url('Freelance/kirimChat/')?>',
                data  : {
                    id_perusahaan:id_perusahaan,
                    pesan:pesan
                },
                // async : false,
                // dataType : 'json',
                success : function(data){
                    $('#pesan').val('');
                    var html = data;
                    var i;
                    // for(i=0; i<data.length; i++){
                    //     html += '<tr>'+
                    //     '<td>'+data[i].barang_kode+'</td>'+
                    //     '<td>'+data[i].barang_nama+'</td>'+
                    //     '<td>'+data[i].barang_harga+'</td>'+
                    //     '</tr>';
                    // }
                    $('#scroll').html(html);
                    $('#scroll').scrollTop($('#scroll')[0].scrollHeight);
                }
            });
         }

         function cariChatGrup(id_grup) {
            $.ajax({
                type  : 'post',
                url   : '<?= base_url('Freelance/getChatGrup/')?>',
                data  : {id_grup:id_grup},
                // async : false,
                // dataType : 'json',
                success : function(data){
                    var html = data;
                    var i;
                    // for(i=0; i<data.length; i++){
                    //     html += '<tr>'+
                    //     '<td>'+data[i].barang_kode+'</td>'+
                    //     '<td>'+data[i].barang_nama+'</td>'+
                    //     '<td>'+data[i].barang_harga+'</td>'+
                    //     '</tr>';
                    // }
                    $('#show_chat').html(html);
                }
            });
         }

         function kirimChatGrup(id_grup) {
            var pesan = document.getElementById("pesan").value;
            $.ajax({
                type  : 'post',
                url   : '<?= base_url('Freelance/kirimChatGrup/')?>',
                data  : {
                    id_grup:id_grup,
                    pesan:pesan
                },
                // async : false,
                // dataType : 'json',
                success : function(data){
                    $('#pesan').val('');
                    var html = data;
                    var i;
                    // for(i=0; i<data.length; i++){
                    //     html += '<tr>'+
                    //     '<td>'+data[i].barang_kode+'</td>'+
                    //     '<td>'+data[i].barang_nama+'</td>'+
                    //     '<td>'+data[i].barang_harga+'</td>'+
                    //     '</tr>';
                    // }
                    $('#scroll').html(html);
                    $('#scroll').scrollTop($('#scroll')[0].scrollHeight);
                }
            });
         }

         
    </script>
    <script type="text/javascript" src="<?= base_url('assets/') ?>js/jquery.isotope.js"></script>

</body>

</html>