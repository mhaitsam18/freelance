<!-- Footer -->
<footer class="sticky-footer bg-white">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>Copyright &copy; Bakoye.Corp <?= date('Y') ?></span>
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


<!-- Bootstrap core JavaScript-->
<script src="<?= base_url('assets/') ?>vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url('assets/') ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="<?= base_url('assets/') ?>vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="<?= base_url('assets/') ?>js/sb-admin-2.min.js"></script>

<script src="<?= base_url('assets/') ?>js/demo/datatables-demo.js"></script>
<script src="<?= base_url('assets/') ?>js/demo/datatables2-demo.js"></script>
<script src="<?= base_url('assets/') ?>js/isotope.pkgd.min.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
<script src="<?= base_url('app.js') ?>"></script>
<script>
    $('.custom-file-input').on('change', function(){
            let filename = $(this).val().split('\\').pop();
            $(this).next('.custom-file-label').addClass("selected").html(filename);
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
</script><script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap4.min.js"></script><script src="<?= base_url('assets/') ?>dist/sweetalert2.all.js"></script>
    <!-- Optional: include a polyfill for ES6 Promises for IE11 -->
    <script src="//cdn.jsdelivr.net/npm/promise-polyfill@8/dist/polyfill.js"></script>
    <script type="text/javascript">
        const pin = $('.pin').data('pin');
        const sesi = $('.sesi').data('sesi');
        const flashData = $('.flash-data').data('flashdata');
        const gagalPin = $('.flash-gagal').data('gagalpin');
        const objek = $('.flash-data').data('objek');
        if (flashData) {
            //'Data ' + 
            Swal.fire({
                title: objek,
                text: flashData,
                icon: 'success'
            });
        }

        if (gagalPin) {
            Swal.fire({
                title: 'Oops...',
                text: 'Pin yang Anda inputkan, Salah!',
                icon: 'error'
            });
        }
        if (pin == 'salah') {
            Swal.fire({
                title: 'Oops...',
                text: 'Pin yang Anda inputkan, Salah!',
                icon: 'error'
            });
        }
        if (sesi) {
            Swal.fire({
                title: 'Oops...',
                text: 'Sesi Anda Telah habis!',
                icon: 'error'
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

        // $('.minta-pin').on('click', function(e) {
        //     const action = $('.form_pin').attr('action');
        //     e.preventDefault();
        //     Swal.fire({
        //         title: 'Masukkan Pin',
        //         input: 'password',
        //         inputAttributes: {
        //             maxlength: 6,
        //             minlength: 6,
        //             autocapitalize: 'off',
        //             autocorrect: 'off'
        //         },
        //         showCancelButton: true,
        //         confirmButtonText: 'Simpan',
        //         showLoaderOnConfirm: true,
        //         preConfirm: (login) => {
        //             return fetch(`//api.github.com/users/${login}`)
        //             .then(response => {
        //                 if (!response.ok) {
        //                     throw new Error(response.statusText)
        //                 }
        //                 return response.json()
        //             })
        //             .catch(error => {
        //                 Swal.showValidationMessage(
        //                     `Request failed: ${error}`
        //                     )
        //             })
        //         },
        //         allowOutsideClick: () => !Swal.isLoading()
        //     }).then((result) => {
        //         if (result.isConfirmed) {
        //             console.log(action);
        //             $('.form_pin').attr("onsubmit", 'return true');
        //         }
        //     })
        // });
        
        $('.minta-pin').on('click', function(e) {
            const action = $('.form_pin').attr('action');
            var form = $(this).parents('form');
            e.preventDefault();
            Swal.fire({
                title: 'Masukkan Pin',
                input: 'password',
                inputAttributes: {
                    maxlength: 6,
                    autocapitalize: 'off',
                    autocorrect: 'off'
                },
                showCancelButton: true,
                confirmButtonText: 'Simpan',
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
                    // const validPassword = await bcrypt.compare(result.value.login, );
                    // const CryptoJS = require('./././node_modules/crypto-js');
                    // console.log(result.value.login);
                    // var result = CryptoJS.MD5(result.value.login);
                    // console.log(result.toString());
                    $('#pin_validasi').val(result.value.login);
                    form.submit();
                    // if ('' == '') {
                    // } else{
                    //     Swal.fire({
                    //         icon: 'error',
                    //         title: 'Oops...',
                    //         text: 'Pin yang Anda inputkan, Salah!',
                    //         footer: '<a href="">Why do I have this issue?</a>'
                    //     })
                    // }
                    // Swal.fire({
                    //     title: `${result.value.login}'s avatar`,
                    //     imageUrl: result.value.avatar_url
                    // })
                }
            })
        });
    

        $('.minta-pin-masuk').on('click', function(e) {
            const action = $('.form_pin').attr('action');
            const href = $(this).attr('href');
            e.preventDefault();
            Swal.fire({
                title: 'Masukkan Pin',
                input: 'password',
                inputAttributes: {
                    maxlength: 6,
                    autocapitalize: 'off',
                    autocorrect: 'off'
                },
                showCancelButton: true,
                confirmButtonText: 'Simpan',
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
                    document.location.href = href + '/' + result.value.login;
                    
                    // const validPassword = await bcrypt.compare(result.value.login, );
                    // const CryptoJS = require('./././node_modules/crypto-js');
                    // console.log(result.value.login);
                    // var result = CryptoJS.MD5(result.value.login);
                    // console.log(result.toString());
                    $('#pin_validasi').val(result.value.login);
                    // form.submit();
                    // if ('' == '') {
                    // } else{
                    //     Swal.fire({
                    //         icon: 'error',
                    //         title: 'Oops...',
                    //         text: 'Pin yang Anda inputkan, Salah!',
                    //         footer: '<a href="">Why do I have this issue?</a>'
                    //     })
                    // }
                    // Swal.fire({
                    //     title: `${result.value.login}'s avatar`,
                    //     imageUrl: result.value.avatar_url
                    // })
                }
            })
        });
    

        $('.minta-pin-2').on('click', function(e) {
            // const { value: password } = await Swal.fire({
            //     title: 'Enter your password',
            //     input: 'password',
            //     inputLabel: 'Password',
            //     inputPlaceholder: 'Enter your password',
            //     inputAttributes: {
            //         maxlength: 10,
            //         autocapitalize: 'off',
            //         autocorrect: 'off'
            //     }
            // })
            // if (password) {
            //     Swal.fire(`Entered password: ${password}`)
            // }
        });

        // $('.minta-pin').on('click', function(e) {
        //     Swal.fire({
        //         title: 'Submit your Github username',
        //         input: 'password',
        //         inputAttributes: {
        //             autocapitalize: 'off'
        //         },
        //         showCancelButton: true,
        //         confirmButtonText: 'Look up',
        //         showLoaderOnConfirm: true,
        //         preConfirm: (login) => {
        //             return fetch(`//api.github.com/users/${login}`)
        //             .then(response => {
        //                 if (!response.ok) {
        //                     throw new Error(response.statusText)
        //                 }
        //                 return response.json()
        //             })
        //             .catch(error => {
        //                 Swal.showValidationMessage(
        //                     `Request failed: ${error}`
        //                     )
        //             })
        //         },
        //         allowOutsideClick: () => !Swal.isLoading()
        //     }).then((result) => {
        //         if (result.isConfirmed) {
        //             Swal.fire({
        //                 title: `${result.value.login}'s avatar`,
        //                 imageUrl: result.value.avatar_url
        //             })
        //         }
        //     })
        // });

        function cariChat(id_freelance) {
            $.ajax({
                type  : 'post',
                url   : '<?= base_url('Perusahaan/getChat/')?>',
                data  : {id_freelance:id_freelance},
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

         function kirimChat(id_freelance) {
            var pesan = document.getElementById("pesan").value;
            $.ajax({
                type  : 'post',
                url   : '<?= base_url('Perusahaan/kirimChat/')?>',
                data  : {
                    id_freelance:id_freelance,
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
                url   : '<?= base_url('Perusahaan/getChatGrup/')?>',
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
                url   : '<?= base_url('Perusahaan/kirimChatGrup/')?>',
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
</body>

</html>