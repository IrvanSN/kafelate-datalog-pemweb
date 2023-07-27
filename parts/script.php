<?php
$header = <<<XYZ
<script src="/public/javascript/script.js"></script>
<script>
    function confirmLogout() {
        var result = confirm("Apakah Anda yakin ingin keluar?");
        if (result) {
            var logoutUrl = "/admin/logout/action.php";
            window.location.href = logoutUrl;
        }
    }
</script>
XYZ;
echo $header;