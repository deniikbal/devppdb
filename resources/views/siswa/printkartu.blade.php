<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <style>
        .box {
            background-color: #;
            border: 1px solid #17202A;
            height: auto;
            margin: 10px 0px;
            padding: 5px;
            width: auto;
        }

        .hr {
            border-color: black
        }

        .ukuran {
            font-size: 18px;

        }

        .ukuran2 {
            font-size: 12px;
            margin-top: 0px;
        }

    </style>
    <style type="text/css">
        .tg {
            border-collapse: collapse;
            border-spacing: 0;
        }

        .tg td {
            border-color: black;
            border-style: solid;
            border-width: 1px;
            font-size: 10px;
            overflow: hidden;
            word-break: normal;
        }

        .tg th {
            border-color: black;
            border-style: solid;
            border-width: 1px;
            font-size: 10px;
            font-weight: normal;
            overflow: hidden;
            word-break: normal;
        }

        .tg .tg-zv4m {
            border-color: #ffffff;
            text-align: left;
            vertical-align: top;
            margin-left: 5px;
        }

        .tg .tg-nrix {
            border-color: #ffffff;
            text-align: center;
            vertical-align: middle;
            width: 100px;
        }

    </style>
</head>

<body style="font-family: sans-serif">
<div class="box">
    <table style="text-align:left;">
        <tr>
            <td style="">
                <img src="{{ asset('assets/img/logots.png') }}" style="height: 60px;margin-top: 7px" />
            </td>
            <td style="">
                <b class="ukuran"> PPDB SMA TELKOM BANDUNG<br></b>
                <b class="ukuran2">https://ppdb.smatelkombandung.sch.id/</b> <br>
            </td>
        </tr>
    </table>
    <hr style="border-color: black; margin-bottom:2px">
    <b style="font-size:18px;">Kartu Peserta Test PPDB SMA TELKOM Tahun 2022
    </b>
    <table class="tg" style="margin-top:20px;">
        <tbody>
        <tr>
            <td class="tg-zv4m" style="width: 120px">No. Pendaftaran</td>
            <td class="tg-zv4m">:</td>
            <td class="tg-zv4m" style="width: 170px">{{ $student->nodaftar }}</td>
            <td class="tg-nrix" rowspan="6">
                <img src="{{asset('storage/'. $student->foto)}}" width="100" height="150" alt="Foto">
            </td>
        </tr>
        <tr>
            <td class="tg-zv4m">Nama Pendaftar</td>
            <td class=" tg-zv4m" style="width: 20px">:</td>
            <td class="tg-zv4m">{{ $student->name }}</td>
        </tr>
        <tr>
            <td class="tg-zv4m">NIK</td>
            <td class="tg-zv4m">:</td>
            <td class="tg-zv4m">{{ $student->nik }}</td>
        </tr>
        <tr>
            <td class="tg-zv4m">Sekolah Asal</td>
            <td class="tg-zv4m">:</td>
            <td class="tg-zv4m">{{ $student->asal_sekolah }}</td>
        </tr>
        <tr>
            <td class="tg-zv4m">Alamat Siswa</td>
            <td class="tg-zv4m">:</td>
            <td class="tg-zv4m">{{ $student->alamat_pd }}</td>
        </tr>
        <tr>
            <td class="tg-zv4m">No. Telepon</td>
            <td class="tg-zv4m">:</td>
            <td class="tg-zv4m">{{ $student->nohp_siswa }}</td>
        </tr>
        </tbody>
    </table>
    <div style="font-size: 12px">
        Saya tunduk dan patuh terhadap segala ketentuan dan peraturan <strong>TEST PPDB SMA TELKOM</strong>
    </div>

    <style type="text/css">
        .tg {
            border-collapse: collapse;
            border-spacing: 0;
        }

        .tg td {
            border-color: black;
            border-style: solid;
            border-width: 1px;
            font-family: Arial, sans-serif;
            font-size: 12px;
            overflow: hidden;
            word-break: normal;
        }

        .tg th {
            border-color: black;
            border-style: solid;
            border-width: 1px;
            font-family: Arial, sans-serif;
            font-size: 12px;
            font-weight: normal;
            overflow: hidden;
            word-break: normal;
        }

        .tg .tg-8jgo {
            border-color: #ffffff;
            text-align: center;
            vertical-align: top
        }

    </style>
    <table class="tg" style="undefined;table-layout: fixed; width: 183px; margin-left:280px">
        <colgroup>
            <col style="width: 183px">
        </colgroup>
        <thead>
        <tr>
            <th class="tg-8jgo">Tanda tangan</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td class="tg-8jgo" style="padding: 20px 5px"></td>
        </tr>
        <tr>
            <td class="tg-8jgo">(Deni Muhamad Ikbal)</td>
        </tr>
        </tbody>
    </table>
    <i style="font-size: 10px">
        Dicetak pada : {{ \Carbon\Carbon::now()->isoFormat('dddd, D MMMM Y') }}</i>
</div>
<ul type="square" style="font-size: 10px">
    <li>FORMULIR INI ADALAH BUKTI ANDA TERDAFTAR SEBAGAI CALON PESERTA TEST PPDB SMA TELKOM BANDUNG TAHUN AJAR 2022/2023.
    </li>
    <li>Cetak kartu peserta KIP Kuliah menggunakan kertas berukuran minimal A5</li>
    <li>Kartu peserta KIP Kuliah diberikan kepada pendaftar sebagai tanda bukti bahwa siswa yang bersangkutan telah melakukan
        tahap pendaftaran secara online</li>
    <li>
        Jika terdapat kesalahan data silahkan perbaiki data terlebih dahulu, kemudian cetak kembal
    </li>
    <li>
        Simpan baik-baik kartu peserta ini karena harus dibawa pada saat daftar ulang di SMA Telkom Bandung
    </li>
</ul>


</body>

</html>
