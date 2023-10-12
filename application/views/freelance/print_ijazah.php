<div class="container-fluid">
    <h3 class="profile-username text-center"><?= $cv['nama']; ?></h3>
    <div class="row">
        <img src="<? base_url('assets/doc/ijazah/') . $ijazah; ?>" alt="">
    </div>
    <div class="text-center">
        <img src="<?= base_url('assets/doc/ijazah/') . $ijazah; ?>" alt="User profile picture">
    </div>
</div>
<script type="text/javascript">
    var css = '@page { size: potrait; }',
        head = document.head || document.getElementsByTagName('head')[0],
        style = document.createElement('style');

    style.type = 'text/css';
    style.media = 'print';

    if (style.styleSheet) {
        style.styleSheet.cssText = css;
    } else {
        style.appendChild(document.createTextNode(css));
    }

    head.appendChild(style);

    window.print();
</script>
<script type="text/javascript">
    window.print();
</script>