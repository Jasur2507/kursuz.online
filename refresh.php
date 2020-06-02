<?php
include 'simple_html_dom.php';

$servername = 'localhost';
$username = 'u0504061_kursuz';
$password = '25JasurO7';
$dbname = 'u0504061_kurs';

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
// if ($conn->connect_error) {
//     die('Connection failed: ' . $conn->connect_error);
// }

$dadd = time();




$nbu = file_get_html('https://nbu.uz/uz/exchange-rates/');
if ($nbu) {
$ubn = $nbu->find('td', 2)->innertext;
$ubn = intval($ubn);
$usn = $nbu->find('td', 3)->innertext;
$usn = intval($usn);
$rbn = $nbu->find('td', 10)->innertext;
$rbn = intval($rbn);
$rsn = $nbu->find('td', 11)->innertext;
$rsn = intval($rsn);
if ($ubn and $usn and $rbn and $rsn) {
$conn->query("UPDATE db_usd SET nbu='$ubn', dad='$dadd' WHERE id=1");
$conn->query("UPDATE db_usd SET nbu='$usn', dad='$dadd' WHERE id=2");
$conn->query("UPDATE db_rub SET nbu='$rbn', dad='$dadd' WHERE id=1");
$conn->query("UPDATE db_rub SET nbu='$rsn', dad='$dadd' WHERE id=2");
    echo 'Milliy Bank kurslari yangilandi<br>';
} else {
    echo 'Milliy Bank yangilashda xatolik:<br>' . $conn->error;
}
}
unset($nbu);

$ham = file_get_html('https://hamkorbank.uz/uz/exchange-rate/');
if ($ham) {
$ubh = $ham->find('div.exchangeRates__content', 0)->find('span', 9)->innertext;
$ubh = intval($ubh);
$ush = $ham->find('div.exchangeRates__content', 0)->find('span', 10)->innertext;
$ush = intval($ush);
$rbh = $ham->find('div.exchangeRates__content', 0)->find('span', 21)->innertext;
$rbh = intval($rbh);
$rsh = $ham->find('div.exchangeRates__content', 0)->find('span', 22)->innertext;
$rsh = intval($rsh);
if ($ubh and $ush and $rbh and $rsh) {
$conn->query("UPDATE db_usd SET hamkor='$ubh' WHERE id=1");
$conn->query("UPDATE db_usd SET hamkor='$ush' WHERE id=2");
$conn->query("UPDATE db_rub SET hamkor='$rbh' WHERE id=1");
$conn->query("UPDATE db_rub SET hamkor='$rsh' WHERE id=2");
  echo 'HAMKORBANK kurslari yangilandi<br>';
} else {
  echo 'HAMKORBANK yangilashda xatolik:<br>' . $conn->error;
}
}
unset($ham);

$xb = file_get_html('https://www.xb.uz/uz');
if ($xb) {
$ubx = $xb->find('td', 7)->innertext;
$usx = $xb->find('td', 8)->innertext;
$rbx = 0;
$rsx = 0;
if ($ubx and $usx) {
$conn->query("UPDATE db_usd SET xalq='$ubx' WHERE id=1");
$conn->query("UPDATE db_usd SET xalq='$usx' WHERE id=2");
  echo 'Xalq Bank kurslari yangilandi<br>';
} else {
  echo 'Xalq Bank yangilashda xatolik:<br>' . $conn->error;
}
}
unset($xb);

$agro = file_get_html('https://agrobank.uz/');
if ($agro) {
$uba = $agro->find('td', 5)->innertext;
$usa = $agro->find('td', 6)->innertext;
$uba = round($uba);
$usa = round($usa);
if ($ubh and $ush) {
$conn->query("UPDATE db_usd SET agro='$uba' WHERE id=1");
$conn->query("UPDATE db_usd SET agro='$usa' WHERE id=2");
  echo 'Agrobank kurslari yangilandi<br>';
} else {
  echo 'Agrobank yangilashda xatolik: <br>' . $conn->error;
}
}
unset($agro);
// $infin = file_get_html('https://www.infinbank.com/ru/');
// if ($infin) {
// $ubin = $infin->find('table.b-rates__table', 0)->find('tr', 2)->find('span', 0)->innertext;
// $ubin = intval($ubin);
// $usin = $infin->find('table.b-rates__table', 0)->find('tr', 3)->find('span', 0)->innertext;
// $usin = intval($usin);
// if ($ubh and $ush) {
// $conn->query("UPDATE db_usd SET infin='$ubin' WHERE id=1");
// $conn->query("UPDATE db_usd SET infin='$usin' WHERE id=2");
//   echo 'InFinbank kurslari yangilandi<br>';
// } else {
//   echo 'InFinbank yangilashda xatolik: <br>' . $conn->error;
// }
// }

$mik = file_get_html('https://mikrokreditbank.uz/ru/');
if ($mik) {
$ubm = $mik->find('td', 1)->innertext;
$usm = $mik->find('td', 2)->innertext;
$ubm = round($ubm);
$usm = round($usm);
if ($ubh and $ush) {
$conn->query("UPDATE db_usd SET mikro='$ubm' WHERE id=1");
$conn->query("UPDATE db_usd SET mikro='$usm' WHERE id=2");
  echo 'Mikrokreditbank kurslari yangilandi<br>';
} else {
  echo 'Mikrokreditbank yangilashda xatolik: <br>' . $conn->error;
}
}
unset($mik);

$ofb = file_get_html('https://ofb.uz/about/kurs-obmena-valyut/');
if ($ofb) {
$ubo = $ofb->find('td', 3)->innertext;
$uso = $ofb->find('td', 2)->innertext;
$ubo = round($ubo);
$uso = round($uso);
if ($ubh and $ush) {
$conn->query("UPDATE db_usd SET ofb='$ubo' WHERE id=1");
$conn->query("UPDATE db_usd SET ofb='$uso' WHERE id=2");
  echo 'Ofb kurslari yangilandi<br>';
} else {
  echo 'Ofb yangilashda xatolik: <br>' . $conn->error;
}
}
unset($ofb);

$ravnaq = file_get_html('https://ravnaqbank.uz/ru/services/exchange-rates/');
if ($ravnaq) {
$ubr = $ravnaq->find('div.header__exchange_item span', 0)->innertext;
$usr = $ravnaq->find('div.header__exchange_item span', 1)->innertext;
if ($ubh and $ush) {
$conn->query("UPDATE db_usd SET ravnaq='$ubr' WHERE id=1");
$conn->query("UPDATE db_usd SET ravnaq='$usr' WHERE id=2");
  echo 'Ravnaqbank kurslari yangilandi<br>';
} else {
  echo 'Ravnaqbank yangilashda xatolik: <br>' . $conn->error;
}
}
unset($ravnaq);
// $kdb = file_get_html('http://www.kdb.uz/');
// if ($kdb) {
// $ubkd = $kdb->find('div.exchange_widget_text', 0)->find('td', 4)->find('b', 0)->innertext;
// $ubkd = str_replace(',', '', $ubkd);
// $ubkd = intval($ubkd);
// $uskd = $kdb->find('div.exchange_widget_text', 0)->find('td', 5)->find('b', 0)->innertext;
// $uskd = str_replace(',', '', $uskd);
// $uskd = intval($uskd);
// if ($ubh and $ush) {
// $conn->query("UPDATE db_usd SET kdb='$ubkd' WHERE id=1");
// $conn->query("UPDATE db_usd SET kdb='$uskd' WHERE id=2");
//   echo 'KDB kurslari yangilandi<br>';
// } else {
//   echo 'KDB yangilashda xatolik: <br>' . $conn->error;
// }
// }

// $trust = file_get_html('https://trustbank.uz/oz/services/exchange-rates/');
// if ($trust) {
// $ubtr = $trust->find('#currency-archive', 0)->children(0)->children(0)->children(2)->children(1)->children(0)->innertext;
// $ubtr = intval($ubtr);
// $ustr = $trust->find('#currency-archive', 0)->children(0)->children(0)->children(3)->children(1)->children(0)->innertext;
// $ustr = intval($ustr);
// $rbtr = $trust->find('#currency-archive', 0)->children(0)->children(0)->children(2)->children(4)->children(0)->innertext;
// $rbtr = intval($rbtr);
// $rstr = $trust->find('#currency-archive', 0)->children(0)->children(0)->children(3)->children(4)->children(0)->innertext;
// $rstr = intval($rstr);
// if ($ubh and $ush and $rbh and $rsh) {
// $conn->query("UPDATE db_usd SET trast='$ubtr' WHERE id=1");
// $conn->query("UPDATE db_usd SET trast='$ustr' WHERE id=2");
// $conn->query("UPDATE db_rub SET trast='$rbtr' WHERE id=1");
// $conn->query("UPDATE db_rub SET trast='$rstr' WHERE id=2");
//   echo 'Trustbank kurslari yangilandi<br>';
// } else {
//   echo 'Trustbank yangilashda xatolik: <br>' . $conn->error;
// }
// }

$turk = file_get_html('http://www.turkistonbank.uz/ru');
if ($turk) {
$ubt = $turk->find('td', 6)->innertext;
$ust = $turk->find('td', 7)->innertext;
$ubt = round($ubt);
$ust = round($ust);
if ($ubh and $ush) {
$conn->query("UPDATE db_usd SET turk='$ubt' WHERE id=1");
$conn->query("UPDATE db_usd SET turk='$ust' WHERE id=2");
  echo 'Turkiston Bank kurslari yangilandi<br>';
} else {
  echo 'Turkiston Bank yangilashda xatolik: <br>' . $conn->error;
}
}
unset($turk);


$zira = file_get_html('https://www.ziraatbank.uz/');
if ($zira) {
$ubzr = $zira->find('span.rate', 1)->innertext;
$ubzr = str_replace(' ', '', $ubzr);
$ubzr = intval($ubzr);
$uszr = $zira->find('span.rate', 2)->innertext;
$uszr = str_replace(' ', '', $uszr);
$uszr = intval($uszr);
$rbzr = $zira->find('span.rate', 7)->innertext;
$rbzr = intval($rbzr);
$rszr = $zira->find('span.rate', 8)->innertext;
$rszr = intval($rszr);
if ($ubh and $ush and $rbh and $rsh) {
$conn->query("UPDATE db_usd SET ziraat='$ubzr' WHERE id=1");
$conn->query("UPDATE db_usd SET ziraat='$uszr' WHERE id=2");
$conn->query("UPDATE db_rub SET ziraat='$rbzr' WHERE id=1");
$conn->query("UPDATE db_rub SET ziraat='$rszr' WHERE id=2");
  echo 'Ziraat Bank kurslari yangilandi<br>';
} else {
  echo 'Ziraat Bank yangilashda xatolik: <br>' . $conn->error;
}
}
unset($zira);
$ipoteka = file_get_html('https://www.ipotekabank.uz/');
if ($ipoteka) {
$ubip = $ipoteka->find('span.corrupt', 0)->innertext;
$usip = $ipoteka->find('span.corrupt', 1)->innertext;
if ($ubip and $usip) {
$conn->query("UPDATE db_usd SET ipoteka='$ubip' WHERE id=1");
$conn->query("UPDATE db_usd SET ipoteka='$usip' WHERE id=2");
  echo 'Ipoteka Bank kurslari yangilandi<br>';
} else {
  echo 'Ipoteka Bank yangilashda xatolik: <br>' . $conn->error;
}
}
unset($ipoteka);
$aloqa = file_get_html('https://aloqabank.uz/');
if ($aloqa) {
$ubal = $aloqa->find('table', 3)->find('td', 1)->innertext;
$usal = $aloqa->find('table', 3)->find('td', 2)->innertext;
if ($ubal and $usal) {
$conn->query("UPDATE db_usd SET aloqa='$ubal' WHERE id=1");
$conn->query("UPDATE db_usd SET aloqa='$usal' WHERE id=2");
  echo 'Aloqabank kurslari yangilandi<br>';
} else {
  echo 'Aloqabank yangilashda xatolik: <br>' . $conn->error;
}
}
unset($aloqa);
$sanoat = file_get_html('https://uzpsb.uz/uz/exchange-rate/');
if ($sanoat) {
$ubuz = $sanoat->find('div.exchangeRates__content', 0)->find('ul.usd', 0)->find('span', 3)->innertext;
$usuz = $sanoat->find('div.exchangeRates__content', 0)->find('ul.usd', 0)->find('span', 4)->innertext;
$rbuz = $sanoat->find('div.exchangeRates__content', 0)->find('ul.usd', 2)->find('span', 3)->innertext;
$rsuz = $sanoat->find('div.exchangeRates__content', 0)->find('ul.usd', 2)->find('span', 4)->innertext;
$ubuz = round($ubuz);
$usuz = round($usuz);
$rbuz = round($rbuz);
$rsuz = round($rsuz);
if ($ubuz and $usuz and $rbuz and $rsuz) {
$conn->query("UPDATE db_usd SET uzsanoat='$ubuz' WHERE id=1");
$conn->query("UPDATE db_usd SET uzsanoat='$usuz' WHERE id=2");
$conn->query("UPDATE db_rub SET uzsanoat='$rbuz' WHERE id=1");
$conn->query("UPDATE db_rub SET uzsanoat='$rsuz' WHERE id=2");
  echo 'Uzsanoatqurilishbank kurslari yangilandi<br>';
} else {
  echo 'Uzsanoatqurilishbank yangilashda xatolik: <br>' . $conn->error;
}
}
unset($sanoat);
$savdo = file_get_html('https://www.savdogarbank.uz/ru/');
if ($savdo) {
$ubsa = $savdo->find('table.b-rates__table', 0)->find('td', 13)->innertext;
$ussa = $savdo->find('table.b-rates__table', 0)->find('td', 19)->innertext;
$ubsa = intval($ubsa);
$ussa = intval($ussa);
if ($ubsa and $ussa) {
$conn->query("UPDATE db_usd SET savdo='$ubsa' WHERE id=1");
$conn->query("UPDATE db_usd SET savdo='$ussa' WHERE id=2");
  echo 'Savdogarbank kurslari yangilandi<br>';
} else {
  echo 'Savdogarbank yangilashda xatolik: <br>' . $conn->error;
}
}
unset($savdo);
$kap = file_get_html('https://kapitalbank.uz/ru/services/exchange-rates/');
if ($kap) {
$ubka = $kap->find('div.item-rate-buy', 0)->find('span.item-value', 0)->innertext;
$uska = $kap->find('div.item-rate-sale', 0)->find('span.item-value', 0)->innertext;
$rbka = $kap->find('div.item-rate-buy', 3)->find('span.item-value', 0)->innertext;
$rska = $kap->find('div.item-rate-sale', 3)->find('span.item-value', 0)->innertext;
if ($ubka and $uska and $rbka and $rska) {
$conn->query("UPDATE db_usd SET kapital='$ubka' WHERE id=1");
$conn->query("UPDATE db_usd SET kapital='$uska' WHERE id=2");
$conn->query("UPDATE db_rub SET kapital='$rbka' WHERE id=1");
$conn->query("UPDATE db_rub SET kapital='$rska' WHERE id=2");
  echo 'Kapitalbank kurslari yangilandi<br>';
} else {
  echo 'Kapitalbank yangilashda xatolik: <br>' . $conn->error;
}
}
unset($kap);
$tur = file_get_html('https://turonbank.uz/ru/services/exchange-rates/');
if ($tur) {
$ubtu = $tur->find('table.side_currency__table', 0)->find('td', 1)->innertext;
$ustu = $tur->find('table.side_currency__table', 0)->find('td', 2)->innertext;
$rbtu = $tur->find('table.side_currency__table', 0)->find('td', 17)->innertext;
$rstu = $tur->find('table.side_currency__table', 0)->find('td', 18)->innertext;
if ($ubtu and $ustu and $rbtu and $rstu) {
$conn->query("UPDATE db_usd SET turon='$ubtu' WHERE id=1");
$conn->query("UPDATE db_usd SET turon='$ustu' WHERE id=2");
$conn->query("UPDATE db_rub SET turon='$rbtu' WHERE id=1");
$conn->query("UPDATE db_rub SET turon='$rstu' WHERE id=2");
  echo 'Turonbank kurslari yangilandi<br>';
} else {
  echo 'Turonbank yangilashda xatolik: <br>' . $conn->error;
}
}
unset($tur);
$qqb = file_get_html('http://qishloqqurilishbank.uz/tarif.php');
if ($qqb) {
$ubqq = $qqb->find('div.exchange-rates', 0)->find('td', 5)->innertext;
$ubqq = str_replace(' ', '', $ubqq);
$ubqq = intval($ubqq);
$usqq = $qqb->find('div.exchange-rates', 0)->find('td', 6)->innertext;
$usqq = str_replace(' ', '', $usqq);
$usqq = intval($usqq);
$rbqq = $qqb->find('div.exchange-rates', 0)->find('td', 25)->innertext;
$rbqq = intval($rbqq);
$rsqq = $qqb->find('div.exchange-rates', 0)->find('td', 26)->innertext;
$rsqq = intval($rsqq);
if ($ubqq and $usqq and $rbqq and $rsqq) {
$conn->query("UPDATE db_usd SET qishloq='$ubqq' WHERE id=1");
$conn->query("UPDATE db_usd SET qishloq='$usqq' WHERE id=2");
$conn->query("UPDATE db_rub SET qishloq='$rbqq' WHERE id=1");
$conn->query("UPDATE db_rub SET qishloq='$rsqq' WHERE id=2");
  echo 'Qishloq Qurilish Bank kurslari yangilandi<br>';
} else {
  echo 'Qishloq Qurilish Bank yangilashda xatolik: <br>' . $conn->error;
}
}
unset($qqb);
$aab = file_get_html('http://www.aab.uz/ru/');
if ($aab) {
$ubaa = $aab->find('div.rates-list', 0)->find('span.item-value', 0)->innertext;
$usaa = $aab->find('div.rates-list', 0)->find('span.item-value', 6)->innertext;
$rbaa = $aab->find('div.rates-list', 0)->find('span.item-value', 2)->innertext;
$rsaa = $aab->find('div.rates-list', 0)->find('span.item-value', 8)->innertext;
if ($ubaa and $usaa and $rbaa and $rsaa) {
$conn->query("UPDATE db_usd SET aaa='$ubaa' WHERE id=1");
$conn->query("UPDATE db_usd SET aaa='$usaa' WHERE id=2");
$conn->query("UPDATE db_rub SET aaa='$rbaa' WHERE id=1");
$conn->query("UPDATE db_rub SET aaa='$rsaa' WHERE id=2");
  echo 'AAB kurslari yangilandi<br>';
} else {
  echo 'AAB yangilashda xatolik: <br>' . $conn->error;
}
}
unset($aab);
$univer = file_get_html('https://universalbank.uz/');
if ($univer) {
$ubun = $univer->find('table.rates-table', 0)->find('td', 1)->innertext;
$ubun = intval($ubun);
$usun = $univer->find('table.rates-table', 0)->find('td', 2)->innertext;
$usun = intval($usun);
$rbun = $univer->find('table.rates-table', 0)->find('td', 21)->innertext;
$rbun = intval($rbun);
$rsun = $univer->find('table.rates-table', 0)->find('td', 22)->innertext;
$rsun = intval($rsun);
if ($ubun and $usun and $rbun and $rsun) {
$conn->query("UPDATE db_usd SET univer='$ubun' WHERE id=1");
$conn->query("UPDATE db_usd SET univer='$usun' WHERE id=2");
$conn->query("UPDATE db_rub SET univer='$rbun' WHERE id=1");
$conn->query("UPDATE db_rub SET univer='$rsun' WHERE id=2");
  echo 'Universalbank kurslari yangilandi<br>';
} else {
  echo 'Universalbank yangilashda xatolik: <br>' . $conn->error;
}
}
unset($univer);
$file = simplexml_load_file("http://cbu.uz/uzc/arkhiv-kursov-valyut/xml/");
if ($file) {
$xml = $file->xpath("//CcyNtry[@ID='840']");
$ucb = strval($xml[0]->Rate);
$xml = $file->xpath("//CcyNtry[@ID='643']");
$rcb = strval($xml[0]->Rate);
$xml = $file->xpath("//CcyNtry[@ID='978']");
$ecb = strval($xml[0]->Rate);
if ($ucb and $rcb and $ecb) {
$conn->query("UPDATE db_usd SET cb='$ucb' WHERE id=1");
$conn->query("UPDATE db_usd SET cb='$ecb' WHERE id=2");
$conn->query("UPDATE db_rub SET cb='$rcb' WHERE id=1");
$conn->query("UPDATE db_rub SET cb='$ecb' WHERE id=2");

  echo 'Markaziy bank kurslari yangilandi<br>';
} else {
  echo 'Markaziy bank yangilashda xatolik: <br>' . $conn->error;
}
}
$sql = "UPDATE db_buy_usd SET cb='$ucb', dad='$dadd' WHERE id=1";
if ($conn->query($sql)) {
  echo 'Markaziy bank kurslari yangilandi<br>';
} else {
  echo 'Markaziy bank yangilashda xatolik: ' . $sql . '<br>' . $conn->error;
}

$conn->close();
?>
