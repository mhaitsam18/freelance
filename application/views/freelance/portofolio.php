    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" /> -->
    <div class="content-header">
        <!-- <section class=""> -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6 mb-2">
                    <!-- <h1>Profil</h1> -->
                    <ol class="breadcrumb float-md-left ">

                        <li class="breadcrumb-item active">Portofolio <?= $user['username']; ?></li>
                    </ol>
                </div>
                <div class="col-sm-6 mb-2 ">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('Freelance') ?>">Home</a></li>
                        <li class="breadcrumb-item active">
                            <button class=" btn btn-primary btn-user btn-block"  data-toggle="modal" data-target="#portofolioModal">
                                Tambah Portofolio
                            </button>
                        </li>
                        <li class="breadcrumb-item active">
                            <button class="btn btn-dark btn-user btn-block">
                                Pdf Portofolio
                            </button>
                        </li>
                    </ol>
                </div>
            </div>

            <?= $this->session->flashdata('message'); ?>
            <div class="container">
                <div class="row">
                    <div class="col mb-4">

                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">Tahun</th>
                                    <th scope="col">Pengalaman</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            <tbody>
                                <!-- <?php $i = 1; ?>
                                <?php foreach ($porto as $p) : ?>
                                    <tr>
                                        <td><?= $i ?></td>
                                        <td><?= $p['tahun']; ?></td>
                                        <td><?= $p['pengalaman'] ?></td>
                                        <td>
                                            <a href="<?= base_url('Freelance/edit_portofolio') ?>" class="badge badge-success">Ubah</a>
                                            <a href="" class="badge badge-danger">Hapus</a>
                                        </td>
                                    </tr>
                                    <?php $i++ ?>
                                <?php endforeach; ?> -->
                            </tbody>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    <!-- /.container-fluid -->
    <!-- Modal -->
    <div class="modal fade" id="portofolioModal" tabindex="-1" aria-labelledby="portofolioModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="portofolioModalLabel">Tambah Portofolio</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post" action="<?= base_url('Freelance/portofolio') ?>" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="tahun">Tahun</label>
                            <input type="number" class="form-control" name="tahun" id="tahun" value="<?= set_value('tahun') ?>">
                            <?= form_error('tahun','<small class="text-danger pl-3">','</small>') ?>
                        </div>
                        <div class="form-group">
                            <label for="pengalaman">Pengalaman</label>
                            <input type="text" class="form-control" name="pengalaman" id="pengalaman" value="<?= set_value('pengalaman') ?>">
                            <?= form_error('pengalaman','<small class="text-danger pl-3">','</small>') ?>
                        </div>
                        <div class="form-group">
                            <label for="paklaring">Upload Paklaring</label>
                            <input type="file" class="form-control" name="paklaring" id="paklaring">
                            <?= form_error('paklaring','<small class="text-danger pl-3">','</small>') ?>
                        </div>
                        
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap4.min.js"></script><script src="<?= base_url('assets/') ?>dist/sweetalert2.all.js"></script>
    <!-- Optional: include a polyfill for ES6 Promises for IE11 -->
    <script src="//cdn.jsdelivr.net/npm/promise-polyfill@8/dist/polyfill.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script type="text/javascript" language="javascript" >
        $(document).ready(function(){
            function load_data()
            {
                $.ajax({
                    url:"<?php echo base_url(); ?>Freelance/load_portofolio",
                    dataType:"JSON",
                    success:function(data){
                        var html = '<tr>';
                        html += '<td id="tahun" contenteditable placeholder="Masukkan tahun"></td>';
                        html += '<td id="pengalaman" contenteditable placeholder="Masukkan pengalaman"></td>';
                        html += '<td><button type="button" name="btn_add" id="btn_add" class="btn btn-xs btn-success"><i class="fas fa-plus"></i></button></td></tr>';
                        html+= '<?= form_error('tahun','<small class="text-danger pl-3">','</small>') ?>';
                        html+= '<?= form_error('pengalaman','<small class="text-danger pl-3">','</small>') ?>';
                        for(var count = 0; count < data.length; count++) {
                            html += '<tr>';
                            html += '<td class="table_data" data-row_id="'+data[count].id_portofolio+'" data-column_name="tahun" contenteditable>'+data[count].tahun+'</td>';
                            html += '<td class="table_data" data-row_id="'+data[count].id_portofolio+'" data-column_name="pengalaman" contenteditable>'+data[count].pengalaman+'</td>';
                            html += '<td><button type="button" name="delete_btn" id="'+data[count].id_portofolio+'" class="btn btn-xs btn-danger btn_delete"><i class="fas fa-trash"></i></button></td></tr>';
                        }
                        $('tbody').html(html);
                    }
                });
            }
            load_data();
            $(document).on('click', '#btn_add', function(){
                var tahun = $('#tahun').text();

                var pengalaman = $('#pengalaman').text();
                hasil = parseInt(tahun);
                if(tahun == '') {
                    alert('Masukkan tahun');
                    return false;
                }
                // if(typeof Number(tahun) != null) {
                //     alert('Masukkan harus berupa Angka'+ Number(tahun));
                //     return false;
                // }
                if(pengalaman == '') {
                    alert('Masukkan pengalaman');
                    return false;
                }
                $.ajax({
                    url:"<?php echo base_url(); ?>freelance/insert_portofolio",
                    method:"POST",
                    data:{tahun:tahun, pengalaman:pengalaman},
                    success:function(data){
                        load_data();
                    }
                })
            });
            $(document).on('blur', '.table_data', function(){
                var id = $(this).data('row_id');
                var table_column = $(this).data('column_name');
                var value = $(this).text();
                $.ajax({
                    url:"<?php echo base_url(); ?>freelance/update_portofolio",
                    method:"POST",
                    data:{id:id, table_column:table_column, value:value},
                    success:function(data) {
                        load_data();
                    }
                })
            });
            $(document).on('click', '.btn_delete', function(){
                var id = $(this).attr('id');
                Swal.fire({
                    title: 'Apakah Anda Yakin?',
                    text: "Data Portofolio akan dihapus!",
                    icon: 'warning',
                    confirmButtonText: 'Hapus',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url:"<?php echo base_url(); ?>freelance/delete_portofolio",
                            method:"POST",
                            data:{id:id},
                            success:function(data){
                                load_data();
                            }
                        })
                    }
                })
            });
        });
    </script>
