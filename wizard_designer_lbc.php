<?php
define('INDEX_AUTH', '1');

require '../../../../sysconfig.inc.php';

// include printed settings configuration file
require SB.'admin'.DS.'admin_template'.DS.'printed_settings.inc.php';
// check for custom template settings
$custom_settings = SB.'admin'.DS.$sysconf['admin_template']['dir'].DS.$sysconf['template']['theme'].DS.'printed_settings.inc.php';
if (file_exists($custom_settings)) {
    include $custom_settings;
}

loadPrintSettings($dbs, 'barcode');
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Label Barcode Warna</title>
        <style>
            * {
                font-family: Arial, Helvetica, sans-serif !important;
                margin: 0;
            }
            @page {
                size: landscape !important;
                margin: 10px 0 0 0 !important;
            }
            @media print {
                /* html, body {
                    width: 210mm;
                    height: 297mm;
                } */
                #noprint {
                    display: none;
                }
            }
        </style>
    </head>
    <body>
        <!-- <div id="noprint" style="float: left; height: 100vh; width: 250px">
            Hai
        </div> -->
        <div style="float: left; width: 100%">
            <?php
            include __DIR__.'/left_right_barcode.php';
            ?>
        </div>
    </body>
</html>
