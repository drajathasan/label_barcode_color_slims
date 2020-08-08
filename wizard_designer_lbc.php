<?php
// set index auth
define('INDEX_AUTH', '1');

require '../../../../sysconfig.inc.php';

// start the session
require SB.'admin/default/session.inc.php';
require SB.'admin/default/session_check.inc.php';

$_SESSION['INDESIGN'] = true;

// include printed settings configuration file
require SB.'admin'.DS.'admin_template'.DS.'printed_settings.inc.php';
// check for custom template settings
$custom_settings = SB.'admin'.DS.$sysconf['admin_template']['dir'].DS.$sysconf['template']['theme'].DS.'printed_settings.inc.php';
if (file_exists($custom_settings)) {
    include $custom_settings;
}

// print setting
loadPrintSettings($dbs, 'barcode');

// load item pattern setting from database;
$itemPattern_q = $dbs->query("SELECT setting_value FROM setting WHERE setting_name = 'batch_item_code_pattern'");

$itemPattern = [];
if ($itemPattern_q->num_rows == 1)
{
    $itemPattern_d = $itemPattern_q->fetch_row();
    $itemPattern = unserialize($itemPattern_d[0]);
}

$type = 'left_right_barcode.php';
if (isset($_GET['type']))
{
    $type = $_GET['type'].'.php';
}


?>
<!DOCTYPE html>
<html lang="id">
    <head>
        <title>Label Barcode Warna</title>
        <script type="text/javascript" src="<?=JWB?>jquery.js"></script>
        <script type="text/javascript" src="<?=JWB?>updater.js"></script>
        <style>
            * {
                font-family: Arial, Helvetica, sans-serif !important;
                margin: 0;
                color: #585858;
            }
            
            #noprint {
                background-color: #dcdcdc;
            }

            .block {
                display: block;
                padding: 5px;
                font-weight: bold;
            }

            .w-full {
                width: 100%;
            }

            .b-none {
                border: none;
            }

            .bg-white {
                background-color: #fff;
            }

            .d-none {
                display: none;
            }

            #noprint {
                padding: 10px;
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
        <div class="w-full" style="background: #b5b5b5">
            <h1 style="padding: 10px; display: inline-block">Label Barcode Color Wizard :</h1>
            <select id="temp" style="padding: 10px">
                <option value="left_right_barcode">Template Kanan Kiri Label Barcode</option>
                <option value="right_barcode">Template Kanan Kiri Label Barcode</option>
                <option value="left_barcode">Template Kanan Kanan Label Barcode</option>
            </select>
        </div>
        <div class="loader d-none" ></div>
        <div id="view">
            <?php
            if (file_exists(__DIR__.'/'.$type))
            {
                include __DIR__.'/'.$type;
            }
            else
            {
                echo 'Tidak ada "View" dari template yang anda pilih';
            }
            ?>
        </div>
        <script id="lbc" src="./lbc.js?ver=<?=date('YmdHis');?>" data-url="<?=SWB?>"></script>
         <?php
            if (!file_exists(SB.'images/barcodes/SMP001.png'))
            {
                // Sample data
                echo '<script>jQuery.ajax({ url: \''.SWB.'lib/phpbarcode/barcode.php?code=SMP001&encoding='.$sysconf['barcode_encoding'].'&scale=2&mode=png&act=save\', type: \'GET\', error: function() { alert(\'Error creating barcode!\'); } });
                self.location.reload();</script>';
            }
        ?>
    </body>
</html>
