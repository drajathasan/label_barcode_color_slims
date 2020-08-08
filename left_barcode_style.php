<style>
.row {
    display: block; width: 100%; margin-left: 20px; margin-top: 10px;
}

.sub-row {
    display: block; width: 95%;
}

.col {
    width: <?=$style['col']['width']?>px; display: inline-block; border: solid 2px black; height: auto;margin-left: 1px;
}

.left-barcode {
    transform: rotate(90deg);width: <?=$style['barocde-lr']['width']?>px;height: <?=$style['barocde-lr']['height']?>px;margin: <?=$style['barocde-lr']['left']['margin']?>;
}

.left-title {
    transform: rotate(90deg); display: block; float:right; font-size: 10pt; margin-top: 10px;
}

.content {
    float: left;border-left: solid 2px black;height: <?=$style['content']['height']?>px;
}

.content-header {
    display: block; width: <?=$style['content-hm']['width']?>px; border-bottom: solid 2px black; padding: 1px;font-size: 8pt; text-transform: uppercase; font-weight: bold; text-align: center; padding-top: 2px; padding-bottom: 2px;
}

.content-main {
    display: block; width: <?=$style['content-hm']['width']?>px; padding: 1px;font-size: 10pt;font-weight: bold; text-align: center;
}
</style>