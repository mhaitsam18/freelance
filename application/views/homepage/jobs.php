<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap" rel="stylesheet">

    <title><?= $tittle ?></title>

    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/css/font-awesome.css">

    <link rel="stylesheet" href="<?= base_url() ?>assets/css/style.css">

</head>

<body>

    <!-- ***** Preloader Start ***** -->
    <div id="js-preloader" class="js-preloader">
        <div class="preloader-inner">
            <span class="dot"></span>
            <div class="dots">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
    </div>
    <!-- ***** Preloader End ***** -->


    <!-- ***** Header Area Start ***** -->
    <header class="header-area header-sticky">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        <!-- ***** Logo Start ***** -->
                        <a href="<?= base_url('Auth/home') ?>" class="logo">Job Agency</a>
                        <!-- ***** Logo End ***** -->
                        <!-- ***** Menu Start ***** -->
                        <ul class="nav">
                            <li><a href="index.html">Home</a></li>
                            <li><a href="<?= base_url('Auth/')?>" class="active">Jobs</a></li>
                            <li class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">About</a>

                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="about.html">About Us</a>
                                    <a class="dropdown-item" href="team.html">Team</a>
                                    <a class="dropdown-item" href="blog.html">Blog</a>
                                    <a class="dropdown-item" href="testimonials.html">Testimonials</a>
                                    <a class="dropdown-item" href="terms.html">Terms</a>
                                </div>
                            </li>
                            <li><a href="contact.html">Contact</a></li>
                        </ul>
                        <a class='menu-trigger'>
                            <span>Menu</span>
                        </a>
                        <!-- ***** Menu End ***** -->
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- ***** Header Area End ***** -->

    <!-- ***** Call to Action Start ***** -->
    <section class="section section-bg" id="call-to-action" style="background-image: url(<?= base_url() ?>assets/images/banner-image-1-1920x500.jpg)">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <div class="cta-content">
                        <br>
                        <br>
                        <h2>Our <em>Jobs</em></h2>
                        <p>Ut consectetur, metus sit amet aliquet placerat, enim est ultricies ligula</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Call to Action End ***** -->

    <!-- ***** Fleet Starts ***** -->
    <section class="section" id="trainers">
        <div class="container">
            <br>
            <br>

            <div class="row">
                <div class="col-lg-4">
                    <form action="#">
                        <h5 style="margin-bottom: 15px">Provinsi</h5>

                        <div class="provinsi">
                            <label for="id_provinsi">
                                <select name="id_provinsi" id="id_provinsi_filter" >
                                    <option value="">Pilih Semua</option>
                                    <?php foreach ($provinsi->result() as $pr): ?>
                                        <?php if ($pr->id_provinsi == $id_provinsi): ?>
                                            <option  value="<?= $pr->id_provinsi ?>" selected><?= $pr->provinsi ?></option>
                                        <?php else: ?>
                                            <option  value="<?= $pr->id_provinsi ?>"><?= $pr->provinsi ?></option>
                                        <?php endif ?>
                                    <?php endforeach ?>
                                </select>
                            </label>
                        </div>
                        <h5 style="margin-bottom: 15px">Kota</h5>

                        <div id="kota">
                            <label for="id_kota">
                                <select name="id_kota" id="id_kota_filter">
                                    <option value="">Pilih Semua</option>
                                    <?php if ($kota): ?>
                                        <?php foreach ($kota->result() as $k): ?>
                                            <?php if ($k->id_kota == $id_kota): ?>
                                                <option  value="<?= $k->id_kota ?>" selected><?= $k->kota ?></option>
                                            <?php else: ?>
                                                <option value="<?= $k->id_kota ?>"><?= $k->kota ?></option>
                                            <?php endif ?>
                                        <?php endforeach ?>
                                    <?php endif ?>
                                </select>
                            </label>
                        </div>

                        <h5 style="margin-bottom: 15px">Pendidikan</h5>
                        <?php foreach ($pendidikan->result() as $pend): ?>
                            <div class="pendidikan">
                                <label for="id_pendidikan<?= $pend->id_pendidikan  ?>">
                                    <input type="checkbox" class="select-grid" name="id_pendidikan" value=".ip_<?= $pend->id_pendidikan ?>" id="id_pendidikan<?= $pend->id_pendidikan  ?>">
                                    <span><?= $pend->pendidikan ?></span>
                                </label>
                            </div>
                        <?php endforeach ?>
                        
                        <h5 style="margin-bottom: 15px">Pengalaman</h5>
                        <?php foreach ($pengalaman->result() as $peng): ?>
                            <div class="pengalaman">
                                <label for="id_pengalaman<?= $peng->id_pengalaman ?>">
                                    <input class="select-grid" type="checkbox" name="id_pengalaman" value=".ipeng_<?= $peng->id_pengalaman ?>" id="id_pengalaman<?= $peng->id_pengalaman  ?>">
                                    <span><?= $peng->pengalaman ?></span>
                                </label>
                            </div>
                        <?php endforeach ?>

                        <h5 style="margin-bottom: 15px">Jenis Pekerjaan</h5>
                        <?php foreach ($jenis_pekerjaan->result() as $jp): ?>
                            <div class="jenis_pekerjaan">
                                <label for="id_jenis_pekerjaan_<?= $jp->id_jenis_pekerjaan  ?>">
                                    <input class="form-check-input select-grid" type="checkbox" name="id_jenis_pekerjaan" value=".ijp_<?= $jp->id_jenis_pekerjaan ?>" id="id_jenis_pekerjaan_<?= $jp->id_jenis_pekerjaan  ?>">
                                    <span><?= $jp->jenis_pekerjaan ?></span>
                                </label>
                            </div>
                        <?php endforeach ?>
                        <h5 style="margin-bottom: 15px">Keahlian</h5>
                        <?php foreach ($keahlian->result() as $k): ?>
                            <div class="keahlian">
                                <label for="id_keahlian<?= $k->id_keahlian  ?>">
                                    <input class="form-check-input select-grid" type="checkbox" name="id_keahlian" value=".ik_<?= $k->id_keahlian ?>" id="id_keahlian<?= $k->id_keahlian  ?>">
                                    <span><?= $k->keahlian ?></span>
                                </label>
                            </div>
                        <?php endforeach ?>
                    </form>

                    <br>
                </div>
                <div class="col-lg-8">
                    <div class="row gridd">
                        <?php foreach ($lowongan as $low) :  ?>
                            <?php $kategori_keahlian = $this->db->get_where('kategori_keahlian', ['id_kategori' => $low['id_kategori']])->result_array(); ?>
                            <div class="
                                col-md-6 grid-item 
                                ijp_<?= $low['id_jenis_pekerjaan'] ?> 
                                ip_<?= $low['id_pendidikan'] ?> 
                                ipeng_<?= $low['id_pengalaman'] ?> 
                                kot_<?= $low['id_kota'] ?> 
                                <?php foreach ($kategori_keahlian as $key): ?>
                                    ik_<?= $key['id_keahlian'] ?>
                                <?php endforeach ?>
                            ">
                                <div class="trainer-item">
                                    <div class="image-thumb">
                                        <img src="<?= base_url() ?>assets/images/product-1-720x480.jpg" alt="">
                                    </div>
                                    <div class="down-content">
                                        <span> <?= $low['kota']; ?> </span>
                                        <!-- <span> Tanggal dibuat : <?= $low['tgl_buat']; ?></span> -->
                                        <!-- <span> Tanggal berakhir : <?= $low['batas_tgl']; ?></span> -->

                                        <h4><?= $low['judul']; ?></h4>

                                        <p><?= $low['deskripsi']; ?></p>
                        
                                        <ul class="social-icons">
                                            <li><a href="<?= base_url('Freelance/detail_lowongan/') . $low['id_lowongan'] ?>">Lamar Sekarang</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>



            <br>

            <nav>
                <ul class="pagination pagination-lg justify-content-center">
                    <li class="page-item">
                        <a class="page-link" href="#" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                            <span class="sr-only">Previous</span>
                        </a>
                    </li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item">
                        <a class="page-link" href="#" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                            <span class="sr-only">Next</span>
                        </a>
                    </li>
                </ul>
            </nav>

        </div>
    </section>
    <!-- ***** Fleet Ends ***** -->


    <!-- ***** Footer Start ***** -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <p>
                        Copyright © 2020 Company Name
                        - Template by: <a href="https://www.phpjabbers.com/">PHPJabbers.com</a>
                    </p>
                </div>
            </div>
        </div>
    </footer>

    <!-- jQuery -->
    <script src="<?= base_url() ?>assets/js/jquery-2.1.0.min.js"></script>

    <!-- Bootstrap -->
    <script src="<?= base_url() ?>assets/js/popper.js"></script>
    <script src="<?= base_url() ?>assets/js/bootstrap.min.js"></script>

    <!-- Plugins -->
    <script src="<?= base_url() ?>assets/js/scrollreveal.min.js"></script>
    <script src="<?= base_url() ?>assets/js/waypoints.min.js"></script>
    <script src="<?= base_url() ?>assets/js/jquery.counterup.min.js"></script>
    <script src="<?= base_url() ?>assets/js/imgfix.min.js"></script>
    <script src="<?= base_url() ?>assets/js/mixitup.js"></script>
    <script src="<?= base_url() ?>assets/js/accordions.js"></script>

    <!-- Global Init -->
    <script src="<?= base_url() ?>assets/js/custom.js"></script>
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
                $checkboxes.each(function(i, elem) {
                    // if checkbox, use value if checked
                    if (elem.checked) {
                        filters.push(elem.value);
                    } 
                    var joinFilters = filters.length ? filters.join(', ') : '*';
                    console.log(joinFilters);
                    $container.isotope({
                        filter: joinFilters
                    });
                });
            });

        });

        var provinsi = document.getElementById('id_provinsi_filter');
        provinsi.addEventListener('change', function () {
            const id_provinsi = provinsi.value;
            document.location.href = "<?= base_url('Auth/jobs/') ?>" + id_provinsi;

        });

        var kota = document.getElementById('id_kota_filter');
        kota.addEventListener('change', function () {
            console.log()
            const id_kota = kota.value;
            const id_provinsi = provinsi.value;
            document.location.href = "<?= base_url('Auth/jobs/') ?>" + id_provinsi + '/' + id_kota;

        });
    </script>
</body>

</html>