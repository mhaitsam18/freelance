<div class="container-fluid">

    <div class="text-center">
        <img src="<?= base_url('assets/img/profil/') . $porlowongan['surat_lamar']; ?>" alt="User profile picture">
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