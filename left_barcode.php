<?php

// set index auth
if (!defined('INDEX_AUTH'))
{
    define('INDEX_AUTH', '1');

    require '../../../../sysconfig.inc.php';   
}

// start the session
require SB.'admin/default/session.inc.php';
require SB.'admin/default/session_check.inc.php';

// check indesign or not
if (isset($_SESSION['INDESIGN']))
{
    // Dummy data
    $data = ['title' => 'Hai', 'call_number' => '005.13/3-22 Jan p', 'img' => 'SMP001.png'];
}

$style = [
    'content' => ['height' => 117],
    'col' => ['width' => 328],
    'content-hm' => ['width' => 246],
    'barocde-lr' => ['height' => 48, 'width' => 107, 'left' => ['margin' => '34px -29px 30px -20px'], 'right' => ['margin' => '34px -15px 30px -28px']]
];

// include style
include __DIR__.'/left_barcode_style.php';
?>
<!-- Left -->
<div id="noprint" style="float: left; height: 100vh; width: 250px">
    <form method="post" action="<?=$_SERVER['PHP_SELF'];?>">
        <section style="padding: 10px;">
            <h1 style="text-transform: uppercase; font-size: 14pt; font-weight: 700;">Atur Ukuran Barcode</h1>
            
            <!-- Polaa kode item -->
            <label class="block">Pola kode item</label>
            <select class="w-full b-none block bg-white" onchange="changeSrcBarcode()">
                <option value="0">Pilih</option>
                <?php
                    foreach ($itemPattern as $value) {
                        echo '<option value="'.$value.'">'.$value.'</option>';
                    }
                ?>
            </select>
            
            <!-- Tinggi kotak -->
            <label class="block">Tinggi kotak</label>
            <input type="number" name="" title="Satuan dalam px. (Rekomendasi >= 120 < 200)" class="w-full b-none block bg-white" onkeyup="changeBoxHeight()" placeholder="Secara default akan otomatis (dalam PX)" value="<?=$style['content']['height']?>"/>

            <!-- Lebar kotak -->
            <label class="block">Lebar kotak</label>
            <input type="number" title="Satuan dalam px. (Rekomendasi 328)" class="w-full b-none block bg-white" onkeyup="changeBoxWidth()" placeholder="Secara default akan otomatis (dalam PX)" value="<?=$style['col']['width']?>"/>

            <!-- Lebar konten -->
            <label class="block">Lebar konten</label>
            <input type="number" title="Satuan dalam px. (Rekomendasi 160)" class="w-full b-none block bg-white" onkeyup="changeContentWidth()" placeholder="Secara default akan otomatis (dalam PX)" value="<?=$style['content-hm']['width']?>"/>
            
            <!-- Tinggi barcode -->
            <label class="block">Tinggi Barcode</label>
            <input type="number" title="Satuan dalam px. (Rekomendasi >= 55 <= 65)" max="55" class="w-full b-none block bg-white" onkeyup="changeBarcodeHeight()" placeholder="Secara default akan otomatis (Satuan dalam PX)" value="<?=$style['barocde-lr']['height']?>"/>
            
            <!-- Tinggi barcode -->
            <label class="block">Lebar Barcode</label>
            <input type="number" title="Satuan dalam px. (Rekomendasi >= 55 <= 65)" max="55" class="w-full b-none block 
            bg-white" onkeyup="changeBarcodeWidth()" placeholder="Secara default akan otomatis (Satuan dalam PX)" value="<?=$style['barocde-lr']['width']?>"/>

            <!-- Margin Barcode Kiri -->
            <label class="block">Margin Barcode Kiri</label>
            <input type="text" class="w-full b-none block bg-white" value="<?=$style['barocde-lr']['right']['margin']?>" onkeyup="changeMargin('left')"/>
            <span class="w-full block" style="margin-top: 2px; font-weight: 200">Atas, Kanan, Bawah, Kiri</span>

            <button style="padding: 10px; float: right;">Simpan</button>
        </section>
    </form>
</div>
<div id="printarea" style="float: left;">
    <!-- Left -->
    <section id="left-barcode" style="display: block; width: 100%">
        <!-- 1st Row -->
        <div class="row">
            <!-- Sub row -->
            <div class="sub-row">
                <!-- 1st Col -->
                <div class="col">
                    <!-- Col barcode left -->
                    <div style="float: left;">
                        <span class="left-title"><?=$data['title'];?></span>
                        <img src="<?=SWB?>images/barcodes/<?=$data['img']?>" class="left-barcode barcode"/>
                    </div>
                    <!-- Content -->
                    <div class="content">
                        <div class="content-header">
                            Perpustakaan Mana Saja Boleh
                        </div>
                        <div class="content-main">
                            <br/>
                            005.13/3-22 <br/>
                            Jan <br/>
                            p <br/>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>