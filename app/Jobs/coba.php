$user = $this->user;
$url = "https://chat-api.ypt.or.id/send-message/key=smabandung";
$data_array = [
'number'  => $nohportu,
'message' => "Terima kasih sudah membuat akun web PPDB SMA Telkom Bandung, berikut data pendaftaran:
/nNama Lengkap : $name
/nNomor Daftar : $id_daftar
/nUsername : $username
/nEmail : **
/nPassword : $pass
/nTahap selanjutnya silahkan orang tua $name segera menghubungi admin PPDB
/nAdmin 1 : 081322299010 (Bu Nissa)
/nAdmin 2 : 081398877234 (Bu Lilis)
/nAdmin 3 : 082116497877 (Bu Ranti)
/nPANITIA PPDB SMA TELKOM BANDUNG
/n*Note : Untuk login di web silahkan menggunakan email dan pass yang sudah di buat."];
$data = http_build_query($data_array);
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

$resp = curl_exec($ch);
if ($e = curl_error($ch)) {
echo $e;
} else {
$decoded = json_decode($resp);
}
curl_close($ch);
