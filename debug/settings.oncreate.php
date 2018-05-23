<?php $get = shell_exec("ipconfig");
$ethernet = iconv("CP866", "CP1251", $get);
$adapters = explode("Ethernet adapter ", $ethernet);
$count = count( $adapters );
for ( $add = 1; $add <= $count; $add++ ){
    $adapter = explode(": ", $adapters[$add]);
    $adapter = str_replace("   DNS-суффикс подключения . . . . . ", "", $adapter);
    $adapter = str_replace("   Локальный IPv6-адрес канала . . . ", "", $adapter);
    $adapter = str_replace("   IPv4-адрес. . . . . . . . . . . . ", "", $adapter);
    $adapter = str_replace("   Маска подсети . . . . . . . . . . ", "", $adapter);
    $adapter = str_replace("   Основной шлюз. . . . . . . . . ", "", $adapter);
    $adapter = str_replace("   Состояние среды. . . . . . . . ", "", $adapter);
    $adapter = str_replace("Среда передачи недоступна.", "", $adapter);
    $adapter = str_replace("\n", "", $adapter);
    c("adapters")->text .= $adapter[0];
    c("adapters")->text = str_replace("   Состояние среды. . . . . . . . ", "", c("adapters")->text);
    c("adapters")->text = str_replace(":", "", c("adapters")->text);
}
