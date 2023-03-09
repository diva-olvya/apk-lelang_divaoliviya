<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Laporan</title>
    <style>
        .title{
            text-align: center;
            font-size: 24px;
            font-weight: bold;
            font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
        }

        .title,
        .tanggal {
            text-align: center;
            font-size: 24px;
            font-family: sans-serif;
        }

        #table {
            font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }


        #table td,
        #table th {
            border: 1px solid #ddd;
            padding: 8px;
            font-size: 13px;
        }

        #table tr:hover {
            background-color: #ddd;
        }

        #table th{
            padding-top: 10px;
            padding-bottom: 10px;
            text-align: left;
            background-color: #558595;
            color: white;
            font-size: 13px;
        }
    </style>
</head>
<body>
    
            <center>
                <h1>Laporan Data Masyarakat Pelelangan</h1><h2>VIALELANG Mobil</h2>
            </center> <hr>
            
    <table>
        <tr>
            <td clas="tanggal">
            <?= date("d M Y") ?>
            </td>
        </tr>
    </table>
    <br><br>
    <table id="table">
        <tr>
            <th>No</th>
            <th>Nama Lengkap</th>
            <th>Nomor Telepon</th>
            <th>Username</th>
        </tr>
        <?php 
        $CI =& get_instance();
        $CI->load->model('M_lelang');
        $si = 1;
        foreach ($masyarakat as $m) : ?>
            
                <tr>
                    <td><?= $si++ ?></td>
                    <td><?= $m->nama_lengkap; ?></td>
                    <!-- <td><?= $CI->M_lelang->max_bid($m->id_lelang)->nama_lengkap ?></td>  -->
                    <td><?= $m->telp; ?></td>
                    <td><?= $m->username; ?></td>
                </tr>
             
        <?php endforeach; ?>

    </table>
    <table width="100%">
        <tr>
            <td></td>
            <td width=" 200px">
                <p>Jember, <?= date("d M Y") ?> <br> </p><br><br>
                <p>______________________</p>
            </td>
        </tr>
    </table>
    
</body>
</html>