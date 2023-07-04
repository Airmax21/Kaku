<!DOCTYPE html>
<html>

<head>
    <style type="text/css">
        body,
        table tr td {
            font-family: 'Times';
            font-size: 13px !important;
        }

        h1 {
            font-weight: bold;
            font-size: 16px;
        }

        h2 {
            font-weight: bold;
            font-size: 13px;
        }

        table {
            border-collapse: collapse;
        }

        table td {
            padding: 3px;
        }

        .border-kop-1 {
            border-top: 4px solid #000;
        }

        .border-kop-2 {
            border-top: 2px solid #000;
        }

        .border-all {
            border: 1px solid #000;
        }

        .border-top {
            border-top: 1px solid #000;
        }

        .border-bottom {
            border-bottom: 1px solid #000;
        }

        .dotted {
            border-bottom: 2px solid #000;
            border-style: dotted;
        }

        .dotted2 {
            border-bottom: 1px solid #000;
            border-style: dashed;
        }

        .border-left {
            border-left: 1px solid #000;
        }

        .border-right {
            border-right: 1px solid #000;
        }

        .bold {
            font-weight: bold;
        }

        .left {
            text-align: left !important;
        }

        .right {
            text-align: right !important;
        }

        .center {
            text-align: center !important;
        }

        .justify {
            text-align: justify !important;
        }

        .italic {
            font-style: italic !important;
        }

        .small {
            font-size: 9px;
        }

        .lg {
            font-size: 25px;
        }

        .highlight {
            background-color: lightsteelblue;
        }

        .red {
            background-color: red;
        }

        .yellow {
            background-color: yellow;
        }

        .black {
            background-color: black;
        }

        .green {
            background-color: green;
        }
    </style>
</head>
<title>Laporan Harian</title>

<body>
    <?php date_default_timezone_set('Asia/Jakarta'); ?>

    <table width="100%" style="border-collapse: collapse;">
        <tr>
            <td class="center" colspan="2">
                <b style="font-size: 17pt;">
                    LAPORAN PENJUALAN HARIAN
                </b><br>
            </td>
        </tr>
    </table>
    <br><br><br>
    <table width="100%">
        <tr>
            <th class="center" style="border: 1px solid black;border-collapse: collapse;">
                ID
            </th>
            <th class="center" style="border: 1px solid black;border-collapse: collapse;">
                Tanggal
            </th>
            <th class="center" style="border: 1px solid black;border-collapse: collapse;">
                Nama Pemesan
            </th>
            <th class="center" style="border: 1px solid black;border-collapse: collapse;" width="200px">
                Item
            </th>
            <th class="center" style="border: 1px solid black;border-collapse: collapse;">
                QTY
            </th>
            <th class="center" style="border: 1px solid black;border-collapse: collapse;">
                Harga
            </th>
            <th class="center" style="border: 1px solid black;border-collapse: collapse;">
                Sub Total
            </th>
        </tr>
        <?php foreach ($order as $o) :
            $c = sizeof($detail[$o['order_id']]);
            $i = 0;
        ?>
            <tr>
                <td class="center" rowspan="<?= $c ?>" style="border: 1px solid black;border-collapse: collapse;">
                    <?= $o['order_id'] ?>
                </td>
                <td class="center" rowspan="<?= $c ?>" style="border: 1px solid black;border-collapse: collapse;">
                    <?= $o['tgl_pesan'] ?>
                </td>
                <td class="center" rowspan="<?= $c ?>" style="border: 1px solid black;border-collapse: collapse;">
                    <?= $o['nama'] != null ? $o['nama'] : $o['pelanggan_nm'] ?>
                </td>
                <td class="center" style="border: 1px solid black;border-collapse: collapse;" width="200px">
                    <?= $detail[$o['order_id']][0]['menu_nm'] ?>
                </td>
                <td class="center" style="border: 1px solid black;border-collapse: collapse;">
                    <?= $detail[$o['order_id']][0]['jumlah'] ?>
                </td>
                <td class="center" style="border: 1px solid black;border-collapse: collapse;">
                    <?= $detail[$o['order_id']][0]['harga'] ?>
                </td>
                <td class="center" style="border: 1px solid black;border-collapse: collapse;">
                    <?= $detail[$o['order_id']][0]['jumlah'] * $detail[$o['order_id']][0]['harga'] ?>
                </td>
            </tr>
            <?php foreach ($detail[$o['order_id']] as $d) :
                if ($i == 0) :
                    $i++;
                    continue;
                endif;
            ?>
                <tr>
                    <td class="center" style="border: 1px solid black;border-collapse: collapse;">
                        <?= $d['menu_nm'] ?>
                    </td>
                    <td class="center" style="border: 1px solid black;border-collapse: collapse;">
                        <?= $d['jumlah'] ?>
                    </td>
                    <td class="center" style="border: 1px solid black;border-collapse: collapse;">
                        <?= $d['harga'] ?>
                    </td>
                    <td class="center" style="border: 1px solid black;border-collapse: collapse;">
                        <?= $d['jumlah'] * $d['harga'] ?>
                    </td>
                </tr>
            <?php
            endforeach; ?>
            <tr>
                <td class="right" colspan="6" style="border: 1px solid black;border-collapse: collapse;">
                    Total
                </td>
                <td class="center" style="border: 1px solid black;border-collapse: collapse;">
                    <?= $o['grand_total'] ?>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>