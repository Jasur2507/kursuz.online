<?php
  // include '/inc/test.php';
  $servername = "localhost";
  $username = "u0504061_kursuz";
  $password = "25JasurO7";
  $dbname = "u0504061_kurs";

  // Create connection
  $conn = new mysqli($servername, $username, $password, $dbname);
  // Check connection
  if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
  }
  $usdbuy = "SELECT * FROM db_usd WHERE id='1'";
  $usdbuy = $conn->query($usdbuy);
  $usdbuy = $usdbuy->fetch_assoc();
  $usdsell = "SELECT * FROM db_usd WHERE id='2'";
  $usdsell = $conn->query($usdsell);
  $usdsell = $usdsell->fetch_assoc();
  $rubbuy = "SELECT * FROM db_rub WHERE id='1'";
  $rubbuy = $conn->query($rubbuy);
  $rubbuy = $rubbuy->fetch_assoc();
  $rubsell = "SELECT * FROM db_rub WHERE id='2'";
  $rubsell = $conn->query($rubsell);
  $rubsell = $rubsell->fetch_assoc();
  $usdma = "SELECT * FROM db_usd WHERE id=1";
  $usdmaxs = $conn->query($usdma);
  $usdmax = $usdmaxs->fetch_array();
  rsort($usdmax);
  $usmax = $usdmax[4];
  $usdmi = "SELECT * FROM db_usd WHERE id=2";
  $usdmins = $conn->query($usdmi);
  $usdmin = $usdmins->fetch_array();
  sort($usdmin);
  $usmin = $usdmin[2];
  $rubma = "SELECT * FROM db_rub WHERE id=1";
  $rubmaxs = $conn->query($rubma);
  $rubmax = $rubmaxs->fetch_array();
  rsort($rubmax);
  $rumax = $rubmax[4];
  $rubmi = "SELECT * FROM db_rub WHERE id=2";
  $rubmins = $conn->query($rubmi);
  $rubmin = $rubmins->fetch_array();
  sort($rubmin);
  $rumin = $rubmin[24];
?>
<div class="col-sm-9">
  <div class="card my-5 p-3">
    <div class="row">
      <div class="m-3 mr-auto">Bugungi valyuta kurslari</div>
      <div class="m-3 text-info"><?=date("d.m.Y H:i:s",$usdbuy["dad"]); ?> da yangilandi.</div>
    </div>
    <table class="table table-hover">
    <thead>
      <tr style="font-size: 2vw; font-weight: bold;">
        <th class="text-dark">Valyuta</th>
        <th class="text-info">Markaziy bank</th>
        <th class="text-dark">Olish</th>
        <th class="text-dark">Sotish</th>
      </tr>
    </thead>
    <tbody>
      <tr style="font-size: 2vw; font-weight: bold;">
        <th class="text-info"><img src="http://kursuz.online/img/flag/usa.svg" alt="USD" width="30px"> USD</th>
        <td class="text-dark"><?=$usdbuy['cb'];?></td>
        <td class="text-success"><?=$usmax;?></td>
        <td class="text-info"><?=$usmin;?></td>
      </tr>
      <tr style="font-size: 2vw; font-weight: bold;">
        <th class="text-info"><img src="http://kursuz.online/img/flag/ru.svg" alt="RUB" width="30px"> RUB</th>
        <td class="text-dark"><?=$rubbuy['cb'];?></td>
        <td class="text-success"><?=$rumax;?></td>
        <td class="text-info"><?=$rumin;?></td>
      </tr>
      <tr style="font-size: 2vw; font-weight: bold;">
        <th class="text-info"><img src="http://kursuz.online/img/flag/eu.svg" alt="EU" width="30px"> EUR</th>
        <td class="text-dark"><?=$usdbuy['cb'];?></td>
        <td class="text-success"><?=$usdbuy['cb'];?></td>
        <td class="text-info"><?=$usdbuy['cb'];?></td>
      </tr>
    </tbody>
  </table>
  </div>
  <div class="card my-5 p-3">
    <div class="row">
      <div class="m-3 mr-auto">O'zbekiston banklaridagi valyuta kurslari</div>
      <div class="m-3 text-info"><?=date("d.m.Y H:i:s",$usdbuy["dad"]); ?> da yangilandi.</div>
    </div>
    <table class="table table-hover">
    <thead>
      <tr>
        <th class="text-muted">Bank</th>
        <th class="text-info">USD olish</th>
        <th class="text-muted">USD sotish</th>
        <th class="text-muted">RUB olish</th>
        <th class="text-muted">RUB sotish</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <th class="text-info bank">NBU</th>
        <td class="text-dark bg-<?=$usdbuy['nbu']==$usmax?warning:light;?> rate"><?=$usdbuy['nbu'];?></td>
        <td class="text-dark bg-<?=$usdsell['nbu']==$usmin?warning:light;?> rate"><?=$usdsell['nbu'];?></td>
        <td class="text-dark bg-<?=$rubbuy['nbu']==$rumax?warning:light;?> rate"><?=$rubbuy['nbu'];?></td>
        <td class="text-dark bg-<?=$rubsell['nbu']==$rumin?warning:light;?> rate"><?=$rubsell['nbu'];?></td>
      </tr>
      <tr>
        <th class="text-info bank">HAMKORBANK</th>
        <td class="text-dark bg-<?=$usdbuy['hamkor']==$usmax?warning:light;?> rate"><?=$usdbuy['hamkor'];?></td>
        <td class="text-dark bg-<?=$usdsell['hamkor']==$usmin?warning:light;?> rate"><?=$usdsell['hamkor'];?></td>
        <td class="text-dark bg-<?=$rubbuy['hamkor']==$rumax?warning:light;?> rate"><?=$rubbuy['hamkor'];?></td>
        <td class="text-dark bg-<?=$rubsell['hamkor']==$rumin?warning:light;?> rate"><?=$rubsell['hamkor'];?></td>
      </tr>
      <tr>
        <th class="text-info bank">Xalq Bank</th>
        <td class="text-dark bg-<?=$usdbuy['xalq']==$usmax?warning:light;?> rate"><?=$usdbuy['xalq'];?></td>
        <td class="text-dark bg-<?=$usdsell['xalq']==$usmin?warning:light;?> rate"><?=$usdsell['xalq'];?></td>
        <td class="text-dark bg-<?=$rubbuy['xalq']==$rumax?warning:light;?> rate"><?=$rubbuy['xalq'];?></td>
        <td class="text-dark bg-<?=$rubsell['xalq']==$rumin?warning:light;?> rate"><?=$rubsell['xalq'];?></td>
      </tr>
      <tr>
        <th class="text-info bank">Agrobank</th>
        <td class="text-dark bg-<?=$usdbuy['agro']==$usmax?warning:light;?> rate"><?=$usdbuy['agro'];?></td>
        <td class="text-dark bg-<?=$usdsell['agro']==$usmin?warning:light;?> rate"><?=$usdsell['agro'];?></td>
        <td class="text-dark bg-<?=$rubbuy['agro']==$rumax?warning:light;?> rate"><?=$rubbuy['agro'];?></td>
        <td class="text-dark bg-<?=$rubsell['agro']==$rumin?warning:light;?> rate"><?=$rubsell['agro'];?></td>
      </tr>
      <tr>
        <th class="text-info bank">InFinbank</th>
        <td class="text-dark bg-<?=$usdbuy['infin']==$usmax?warning:light;?> rate"><?=$usdbuy['infin'];?></td>
        <td class="text-dark bg-<?=$usdsell['infin']==$usmin?warning:light;?> rate"><?=$usdsell['infin'];?></td>
        <td class="text-dark bg-<?=$rubbuy['infin']==$rumax?warning:light;?> rate"><?=$rubbuy['infin'];?></td>
        <td class="text-dark bg-<?=$rubsell['infin']==$rumin?warning:light;?> rate"><?=$rubsell['infin'];?></td>
      </tr>
      <tr>
        <th class="text-info bank">Mikrokreditbank</th>
        <td class="text-dark bg-<?=$usdbuy['mikro']==$usmax?warning:light;?> rate"><?=$usdbuy['mikro'];?></td>
        <td class="text-dark bg-<?=$usdsell['mikro']==$usmin?warning:light;?> rate"><?=$usdsell['mikro'];?></td>
        <td class="text-dark bg-<?=$rubbuy['mikro']==$rumax?warning:light;?> rate"><?=$rubbuy['mikro'];?></td>
        <td class="text-dark bg-<?=$rubsell['mikro']==$rumin?warning:light;?> rate"><?=$rubsell['mikro'];?></td>
      </tr>
      <tr>
        <th class="text-info bank">Orient Finans bank</th>
        <td class="text-dark bg-<?=$usdbuy['ofb']==$usmax?warning:light;?> rate"><?=$usdbuy['ofb'];?></td>
        <td class="text-dark bg-<?=$usdsell['ofb']==$usmin?warning:light;?> rate"><?=$usdsell['ofb'];?></td>
        <td class="text-dark bg-<?=$rubbuy['ofb']==$rumax?warning:light;?> rate"><?=$rubbuy['ofb'];?></td>
        <td class="text-dark bg-<?=$rubsell['ofb']==$rumin?warning:light;?> rate"><?=$rubsell['ofb'];?></td>
      </tr>
      <tr>
        <th class="text-info bank">Ravnaqbank</th>
        <td class="text-dark bg-<?=$usdbuy['ravnaq']==$usmax?warning:light;?> rate"><?=$usdbuy['ravnaq'];?></td>
        <td class="text-dark bg-<?=$usdsell['ravnaq']==$usmin?warning:light;?> rate"><?=$usdsell['ravnaq'];?></td>
        <td class="text-dark bg-<?=$rubbuy['ravnaq']==$rumax?warning:light;?> rate"><?=$rubbuy['ravnaq'];?></td>
        <td class="text-dark bg-<?=$rubsell['ravnaq']==$rumin?warning:light;?> rate"><?=$rubsell['ravnaq'];?></td>
      </tr>
      <tr>
        <th class="text-info bank">KDB Bank Uzbekistan</th>
        <td class="text-dark bg-<?=$usdbuy['kdb']==$usmax?warning:light;?> rate"><?=$usdbuy['kdb'];?></td>
        <td class="text-dark bg-<?=$usdsell['kdb']==$usmin?warning:light;?> rate"><?=$usdsell['kdb'];?></td>
        <td class="text-dark bg-<?=$rubbuy['kdb']==$rumax?warning:light;?> rate"><?=$rubbuy['kdb'];?></td>
        <td class="text-dark bg-<?=$rubsell['kdb']==$rumin?warning:light;?> rate"><?=$rubsell['kdb'];?></td>
      </tr>
      <tr>
        <th class="text-info bank">Trastbank</th>
        <td class="text-dark bg-<?=$usdbuy['trast']==$usmax?warning:light;?> rate"><?=$usdbuy['trast'];?></td>
        <td class="text-dark bg-<?=$usdsell['trast']==$usmin?warning:light;?> rate"><?=$usdsell['trast'];?></td>
        <td class="text-dark bg-<?=$rubbuy['trast']==$rumax?warning:light;?> rate"><?=$rubbuy['trast'];?></td>
        <td class="text-dark bg-<?=$rubsell['trast']==$rumin?warning:light;?> rate"><?=$rubsell['trast'];?></td>
      </tr>
      <tr>
        <th class="text-info bank">Turkiston</th>
        <td class="text-dark bg-<?=$usdbuy['turk']==$usmax?warning:light;?> rate"><?=$usdbuy['turk'];?></td>
        <td class="text-dark bg-<?=$usdsell['turk']==$usmin?warning:light;?> rate"><?=$usdsell['turk'];?></td>
        <td class="text-dark bg-<?=$rubbuy['turk']==$rumax?warning:light;?> rate"><?=$rubbuy['turk'];?></td>
        <td class="text-dark bg-<?=$rubsell['turk']==$rumin?warning:light;?> rate"><?=$rubsell['turk'];?></td>
      </tr>
      <tr>
        <th class="text-info bank">Ziraat Bank Uzbekistan</th>
        <td class="text-dark bg-<?=$usdbuy['ziraat']==$usmax?warning:light;?> rate"><?=$usdbuy['ziraat'];?></td>
        <td class="text-dark bg-<?=$usdsell['ziraat']==$usmin?warning:light;?> rate"><?=$usdsell['ziraat'];?></td>
        <td class="text-dark bg-<?=$rubbuy['ziraat']==$rumax?warning:light;?> rate"><?=$rubbuy['ziraat'];?></td>
        <td class="text-dark bg-<?=$rubsell['ziraat']==$rumin?warning:light;?> rate"><?=$rubsell['ziraat'];?></td>
      </tr>
      <tr>
        <th class="text-info bank">Ipoteka</th>
        <td class="text-dark bg-<?=$usdbuy['ipoteka']==$usmax?warning:light;?> rate"><?=$usdbuy['ipoteka'];?></td>
        <td class="text-dark bg-<?=$usdsell['ipoteka']==$usmin?warning:light;?> rate"><?=$usdsell['ipoteka'];?></td>
        <td class="text-dark bg-<?=$rubbuy['ipoteka']==$rumax?warning:light;?> rate"><?=$rubbuy['ipoteka'];?></td>
        <td class="text-dark bg-<?=$rubsell['ipoteka']==$rumin?warning:light;?> rate"><?=$rubsell['ipoteka'];?></td>
      </tr>
      <tr>
        <th class="text-info bank">Aloqabank</th>
        <td class="text-dark bg-<?=$usdbuy['aloqa']==$usmax?warning:light;?> rate"><?=$usdbuy['aloqa'];?></td>
        <td class="text-dark bg-<?=$usdsell['aloqa']==$usmin?warning:light;?> rate"><?=$usdsell['aloqa'];?></td>
        <td class="text-dark bg-<?=$rubbuy['aloqa']==$rumax?warning:light;?> rate"><?=$rubbuy['aloqa'];?></td>
        <td class="text-dark bg-<?=$rubsell['aloqa']==$rumin?warning:light;?> rate"><?=$rubsell['aloqa'];?></td>
      </tr>
      <tr>
        <th class="text-info bank">Uzsanoatqurilishbank</th>
        <td class="text-dark bg-<?=$usdbuy['uzsanoat']==$usmax?warning:light;?> rate"><?=$usdbuy['uzsanoat'];?></td>
        <td class="text-dark bg-<?=$usdsell['uzsanoat']==$usmin?warning:light;?> rate"><?=$usdsell['uzsanoat'];?></td>
        <td class="text-dark bg-<?=$rubbuy['uzsanoat']==$rumax?warning:light;?> rate"><?=$rubbuy['uzsanoat'];?></td>
        <td class="text-dark bg-<?=$rubsell['uzsanoat']==$rumin?warning:light;?> rate"><?=$rubsell['uzsanoat'];?></td>
      </tr>
      <tr>
        <th class="text-info bank">Savdogarbank</th>
        <td class="text-dark bg-<?=$usdbuy['savdo']==$usmax?warning:light;?> rate"><?=$usdbuy['savdo'];?></td>
        <td class="text-dark bg-<?=$usdsell['savdo']==$usmin?warning:light;?> rate"><?=$usdsell['savdo'];?></td>
        <td class="text-dark bg-<?=$rubbuy['savdo']==$rumax?warning:light;?> rate"><?=$rubbuy['savdo'];?></td>
        <td class="text-dark bg-<?=$rubsell['savdo']==$rumin?warning:light;?> rate"><?=$rubsell['savdo'];?></td>
      </tr>
      <tr>
        <th class="text-info bank">Kapitalbank</th>
        <td class="text-dark bg-<?=$usdbuy['kapital']==$usmax?warning:light;?> rate"><?=$usdbuy['kapital'];?></td>
        <td class="text-dark bg-<?=$usdsell['kapital']==$usmin?warning:light;?> rate"><?=$usdsell['kapital'];?></td>
        <td class="text-dark bg-<?=$rubbuy['kapital']==$rumax?warning:light;?> rate"><?=$rubbuy['kapital'];?></td>
        <td class="text-dark bg-<?=$rubsell['kapital']==$rumin?warning:light;?> rate"><?=$rubsell['kapital'];?></td>
      </tr>
      <tr>
        <th class="text-info bank">Turonbank</th>
        <td class="text-dark bg-<?=$usdbuy['turon']==$usmax?warning:light;?> rate"><?=$usdbuy['turon'];?></td>
        <td class="text-dark bg-<?=$usdsell['turon']==$usmin?warning:light;?> rate"><?=$usdsell['turon'];?></td>
        <td class="text-dark bg-<?=$rubbuy['turon']==$rumax?warning:light;?> rate"><?=$rubbuy['turon'];?></td>
        <td class="text-dark bg-<?=$rubsell['turon']==$rumin?warning:light;?> rate"><?=$rubsell['turon'];?></td>
      </tr>
      <tr>
        <th class="text-info bank">Qishloq Qurilish Bank</th>
        <td class="text-dark bg-<?=$usdbuy['qishloq']==$usmax?warning:light;?> rate"><?=$usdbuy['qishloq'];?></td>
        <td class="text-dark bg-<?=$usdsell['qishloq']==$usmin?warning:light;?> rate"><?=$usdsell['qishloq'];?></td>
        <td class="text-dark bg-<?=$rubbuy['qishloq']==$rumax?warning:light;?> rate"><?=$rubbuy['qishloq'];?></td>
        <td class="text-dark bg-<?=$rubsell['qishloq']==$rumin?warning:light;?> rate"><?=$rubsell['qishloq'];?></td>
      </tr>
      <tr>
        <th class="text-info bank">Asia Alliance Bank</th>
        <td class="text-dark bg-<?=$usdbuy['aaa']==$usmax?warning:light;?> rate"><?=$usdbuy['aaa'];?></td>
        <td class="text-dark bg-<?=$usdsell['aaa']==$usmin?warning:light;?> rate"><?=$usdsell['aaa'];?></td>
        <td class="text-dark bg-<?=$rubbuy['aaa']==$rumax?warning:light;?> rate"><?=$rubbuy['aaa'];?></td>
        <td class="text-dark bg-<?=$rubsell['aaa']==$rumin?warning:light;?> rate"><?=$rubsell['aaa'];?></td>
      </tr>
      <tr>
        <th class="text-info bank">Universalbank</th>
        <td class="text-dark bg-<?=$usdbuy['univer']==$usmax?warning:light;?> rate"><?=$usdbuy['univer'];?></td>
        <td class="text-dark bg-<?=$usdsell['univer']==$usmin?warning:light;?> rate"><?=$usdsell['univer'];?></td>
        <td class="text-dark bg-<?=$rubbuy['univer']==$rumax?warning:light;?> rate"><?=$rubbuy['univer'];?></td>
        <td class="text-dark bg-<?=$rubsell['univer']==$rumin?warning:light;?> rate"><?=$rubsell['univer'];?></td>
      </tr>
    </tbody>
  </table>
  </div>

</div>
