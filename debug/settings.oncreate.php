<?php $get = shell_exec("ipconfig");
$ethernet = iconv("CP866", "CP1251", $get);
$adapters = explode("Ethernet adapter ", $ethernet);
$count = count( $adapters );
for ( $add = 1; $add <= $count; $add++ ){
    $adapter = explode(": ", $adapters[$add]);
    $adapter = str_replace("   DNS-������� ����������� . . . . . ", "", $adapter);
    $adapter = str_replace("   ��������� IPv6-����� ������ . . . ", "", $adapter);
    $adapter = str_replace("   IPv4-�����. . . . . . . . . . . . ", "", $adapter);
    $adapter = str_replace("   ����� ������� . . . . . . . . . . ", "", $adapter);
    $adapter = str_replace("   �������� ����. . . . . . . . . ", "", $adapter);
    $adapter = str_replace("   ��������� �����. . . . . . . . ", "", $adapter);
    $adapter = str_replace("����� �������� ����������.", "", $adapter);
    $adapter = str_replace("\n", "", $adapter);
    c("adapters")->text .= $adapter[0];
    c("adapters")->text = str_replace("   ��������� �����. . . . . . . . ", "", c("adapters")->text);
    c("adapters")->text = str_replace(":", "", c("adapters")->text);
}
