'use strict';

// get base url
let baseurl = $('#lbc').data('url');

// set stylesheet
let w1 = Number(window.innerWidth) * Number(75) / Number(100);
let w2 = Number(window.innerWidth) * Number(20) / Number(100);

$('#printarea').attr('style', 'float:left;width:'+w1+'px');
$('#noprint').attr('style', 'height: 100vh; float:left;width:'+w2+'px');

$('#temp').change(function(){
    $('#view').simbioAJAX(baseurl+'admin/modules/bibliography/lbc/'+$(this).val()+'.php');
});

// Function area
function changeSrcBarcode()
{
    // create barcode sample
    jQuery.ajax({ url: baseurl+'lib/phpbarcode/barcode.php?code='+event.target.value+'&encoding=code128&scale=2&mode=png&act=save', type: 'GET', error: function() { alert('Error creating barcode!'); } });

    let val = event.target.value;

    setTimeout(function(){
        // set sample
        $('.barcode').attr('src', baseurl+'images/barcodes/'+val+'.png');
    }, 2000);
}

function changeBoxHeight()
{
    $('.content').attr('style', 'height: '+event.target.value+'px');
}

function changeBoxWidth()
{
    $('.col').attr('style', 'width: '+event.target.value+'px');
}

function changeContentWidth()
{
    $('.content-header, .content-main').attr('style', 'width: '+event.target.value+'px');
}

function changeBarcodeHeight()
{
    $('.left-barcode, .right-barcode').attr('style', 'height: '+event.target.value+'px');
}

function changeBarcodeWidth()
{
    $('.left-barcode, .right-barcode').attr('style', 'width: '+event.target.value+'px');
}

function changeTextAlign()
{
    $('.content-header').attr('style', 'text-align : '+event.target.value);
    $('.content-main').attr('style', 'text-align : '+event.target.value);
}

function changeMargin(position)
{
    $('.'+position+'-barcode').attr('style', 'margin: '+event.target.value);
}