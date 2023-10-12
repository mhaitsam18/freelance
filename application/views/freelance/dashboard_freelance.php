<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-4 text-gray-800"><?= $judul . $user['username']; ?></h1>
    </div>

    <div class="row">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-3 mb-3">
            <a href="<?= base_url('Freelance/riwayat_lamar') ?>">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    Jumlah Melamar</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $jumlah_melamar ?></div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-file fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
        </a>
        <div class="col-xl-3 col-md-3 mb-3">
            <a href="<?= base_url('Freelance/riwayat_lamar') ?>">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                    Lamaran Diterima & Undangan</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $jumlah_diterima+$jumlah_jalur_undangan ?></div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-file fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-xl-3 col-md-3 mb-3">
            <a href="<?= base_url('Freelance/riwayat_lamar') ?>">
                <div class="card border-left-danger shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                    Lamaran Ditolak</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $jumlah_ditolak ?></div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-file fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <a href="<?= base_url('Freelance/riwayat_lamar') ?>">
        </div>
        <div class="col-xl-3 col-md-3 mb-3">
            <a href="<?= base_url('Freelance/riwayat_lamar') ?>">
                <div class="card border-left-secondary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-secondary text-uppercase mb-1">
                                    Lamaran dipending</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $jumlah_pending ?></div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-file fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div>

</div>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->

    <div class="row">
        <div class="col-md-6">
            <div class="card mb-2">
                <div class="row g-2">
                    <div class="col-md-6">
                        <img src="<?= base_url('assets/img/profil/default.png')  ?>" width="100%" alt="...">
                    </div>
                    <div class="col-md-6">
                        <div class="card-body">
                            <h5 class="card-title mb-3"><strong> Akun Freelance</strong></h5>
                            <h6 class="card-text">Username : <?= $user['username']; ?></h6>
                            <h6 class="card-text">Email : <?= $user['email']; ?></h6>
                            <h6 class="card-text">Akun Freelance Sejak : <?= date('d F Y', $user['date_created']); ?></h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card mb-2">
                <div class="card-body">
                    <h4 class="card-title"><strong>Persentase Lamaran</strong></h4>
                    <canvas id="lamaranChart"></canvas>
                </div>
            </div>
        </div>
        
    </div>



</div>
<!-- <div class="content-wrapper iframe-mode" data-widget="iframe" data-loading-screen="750">
    <div class="nav navbar navbar-expand navbar-white navbar-light border-bottom p-0">
        <div class="nav-item dropdown">
            <a class="nav-link bg-danger dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Close</a>
            <div class="dropdown-menu mt-0">
                <a class="dropdown-item" href="#" data-widget="iframe-close" data-type="all">Close All</a>
                <a class="dropdown-item" href="#" data-widget="iframe-close" data-type="all-other">Close All Other</a>
            </div>
        </div>
        <a class="nav-link bg-light" href="#" data-widget="iframe-scrollleft"><i class="fas fa-angle-double-left"></i></a>
        <ul class="navbar-nav overflow-hidden" role="tablist"></ul>
        <a class="nav-link bg-light" href="#" data-widget="iframe-scrollright"><i class="fas fa-angle-double-right"></i></a>
        <a class="nav-link bg-light" href="#" data-widget="iframe-fullscreen"><i class="fas fa-expand"></i></a>
    </div>
    <div class="tab-content">
        <div class="tab-empty">
            <h2 class="display-4">No tab selected!</h2>
        </div>
        <div class="tab-loading">
            <div>
                <h2 class="display-4">Tab is loading <i class="fa fa-sync fa-spin"></i></h2>
            </div>
        </div>
    </div>
</div> -->
<script src="<?= base_url('assets/') ?>vendor/chart.js/Chart.min.js"></script>
<script type="text/javascript">
    Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
    Chart.defaults.global.defaultFontColor = '#858796';

    function number_format(number, decimals, dec_point, thousands_sep) {
      // *     example: number_format(1234.56, 2, ',', ' ');
      // *     return: '1 234,56'
      number = (number + '').replace(',', '').replace(' ', '');
      var n = !isFinite(+number) ? 0 : +number,
        prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
        sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
        dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
        s = '',
        toFixedFix = function(n, prec) {
          var k = Math.pow(10, prec);
          return '' + Math.round(n * k) / k;
        };
      // Fix for IE parseFloat(0.55).toFixed(0) = 0;
      s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
      if (s[0].length > 3) {
        s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
      }
      if ((s[1] || '').length < prec) {
        s[1] = s[1] || '';
        s[1] += new Array(prec - s[1].length + 1).join('0');
      }
      return s.join(dec);
    }
    var ctx = document.getElementById("lamaranChart");
    // const config = {
    //     type: 'pie',
    //     data: data,
    //     options: {
    //         responsive: true,
    //         plugins: {
    //             legend: {
    //                 position: 'top',
    //             },
    //             title: {
    //                 display: true,
    //                 text: 'Chart.js Pie Chart'
    //             }
    //         }
    //     },
    // };
    const DATA_COUNT = 5;
    const NUMBER_CFG = {count: DATA_COUNT, min: 0, max: 100};
    // const data = {
    //     labels: ['Red', 'Orange', 'Yellow', 'Green', 'Blue'],
    //     datasets: [
    //         {
    //             label: 'Dataset 1',
    //             data: Utils.numbers(NUMBER_CFG),
    //             backgroundColor: Object.values(Utils.CHART_COLORS),
    //         }
    //     ]
    // };
    const actions = [
        {
            name: 'Randomize',
            handler(chart) {
                chart.data.datasets.forEach(dataset => {
                    dataset.data = Utils.numbers({count: chart.data.labels.length, min: 0, max: 100});
                });
                chart.update();
            }
        },
        {
            name: 'Add Dataset',
            handler(chart) {
                const data = chart.data;
                const newDataset = {
                    label: 'Dataset ' + (data.datasets.length + 1),
                    backgroundColor: [],
                    data: [],
                };
                for (let i = 0; i < data.labels.length; i++) {
                    newDataset.data.push(Utils.numbers({count: 1, min: 0, max: 100}));

                    const colorIndex = i % Object.keys(Utils.CHART_COLORS).length;
                    newDataset.backgroundColor.push(Object.values(Utils.CHART_COLORS)[colorIndex]);
                }

                chart.data.datasets.push(newDataset);
                chart.update();
            }
        },
        {
            name: 'Add Data',
            handler(chart) {
                const data = chart.data;
                if (data.datasets.length > 0) {
                    data.labels.push('data #' + (data.labels.length + 1));
                    for (var index = 0; index < data.datasets.length; ++index) {
                        data.datasets[index].data.push(Utils.rand(0, 100));
                    }
                    chart.update();
                }
            }
        },
        {
            name: 'Remove Dataset',
            handler(chart) {
                chart.data.datasets.pop();
                chart.update();
            }
        },
        {
            name: 'Remove Data',
            handler(chart) {
                chart.data.labels.splice(-1, 1); // remove the label first
                chart.data.datasets.forEach(dataset => {
                    dataset.data.pop();
                });
                chart.update();
            }
        }
    ];
    var myPieChart = new Chart(ctx, {
        type: 'pie',
        // data: data,
        data: {
            labels: ['Lamaran diterima <?= $jumlah_diterima/$jumlah_melamar*100 ?>%', 'Lamaran ditolak <?= $jumlah_ditolak/$jumlah_melamar*100 ?>%', 'Lamaran Pending <?= $jumlah_pending/$jumlah_melamar*100 ?>%', 'Jalur Undangan <?= $jumlah_jalur_undangan/$jumlah_melamar*100 ?>%'],
            datasets: [{
                data: [<?= "$jumlah_diterima, $jumlah_ditolak, $jumlah_pending, $jumlah_jalur_undangan" ?>],
                backgroundColor: ['#03a5fc', '#ed0202', '#f5cc02', '#05b50e'],
                hoverBorderColor: "rgba(234, 236, 244, 1)",
            }],
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'top',
                },
                title: {
                    display: true,
                    text: 'Chart.js Pie Chart'
                }
            }
        },
        // type: 'pie',
        // options: {
        //     maintainAspectRatio: false,
        //     tooltips: {
        //         backgroundColor: "rgb(255,255,255)",
        //         bodyFontColor: "#858796",
        //         borderColor: '#dddfeb',
        //         borderWidth: 1,
        //         xPadding: 15,
        //         yPadding: 15,
        //         displayColors: false,
        //         caretPadding: 10,
        //     },
        //     legend: {
        //         display: false
        //     },
        //     cutoutPercentage: 80,
        // },
    });
</script>