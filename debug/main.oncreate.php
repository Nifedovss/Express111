<?php 
c("time")->caption = Date("H:i");
c("lockScreen->lsTime")->caption = Date("H:i");
switch ( Date("M") ){
    case "Jan":
        $mon = "января";
    break;
    case "Feb":
        $mon = "февраля";
    break;
    case "Mar":
        $mon = "марта";
    break;
    case "Apr":
        $mon = "апреля";
    break;
    case "May":
        $mon = "мая";
    break;
    case "Jun":
        $mon = "июня";
    break;
    case "Jul":
        $mon = "июля";
    break;
    case "Aug":
        $mon = "августа";
    break;
    case "Sep":
        $mon = "сентября";
    break;
    case "Oct":
        $mon = "октября";
    break;
    case "Nov":
        $mon = "ноября";
    break;
    case "Dec":
        $mon = "декабря";
    break;
}
$i = 1;
while( $i <= Date("t") ){
    c("pcDays")->caption = c("pcDays")->caption . " " . $i;
    $i++;
}
c("pcDate")->caption = Date("d") . " " . $mon . " " . Date("Y");
if ( !is_writable( $progDir ) ){
    message("Недостаточно прав доступа.\nЗапустите ozScript от имени администратора.");
    $APPLICATION->terminate();
}
if ( file_exists( $progDir . "localStorage/data/desktop.ini" ) ){
    ini::open( $progDir . "localStorage/data/desktop.ini" );
    ini::readKeys("desktop", $keys);
    foreach ( $keys as $key ){
        switch ( $key ){
            case "image":
                ini::read("desktop", $key, $image);
                c("background")->loadFromFile( $image );
                c("settings->desktopImage")->loadFromFile( $image );
            break;
            case "imagePos":
                ini::read("desktop", $key, $imagePos);
                switch ( $imagePos ){
                    case "proportional":
                        c("settings->desktopImage")->center = true;
                        c("settings->desktopImage")->proportional = true;
                    break;
                    case "stretch":
                        c("settings->desktopImage")->center = false;
                        c("settings->desktopImage")->stretch = true;
                    break;
                }
            break;
        }
    }
}
if ( file_exists( $progDir . "localStorage/data/icons.ini" ) ){
    ini::open( $progDir . "localStorage/data/icons.ini" );
    ini::readSections( $sections );
    foreach ( $sections as $sec ){
        ini::readKeys( $sec, $keys );
        foreach ( $keys as $key ){
            switch ( $key ){
                case "x";
                    ini::read( $sec, $key, $x );
                    c( $sec )->x = $x;
                break;
                case "y":
                    ini::read( $sec, $key, $y );
                    c( $sec )->y = $y;
                break;
            }
        }
    }
}
function niCTS(){
    global $offlineMode;
    err_no();
    if ( !file_get_contents("http://ozscript.info/") ){
        t::c("notifiInfo")->alphaBlendValue = 0;
        t::c("notifiInfo")->show();
        t::c("notifiInfo->niTShow")->enable = true;
        t::c("notifiInfo")->x = t::c("notifiPlayerSP")->x;
        t::c("notifiInfo")->y = t::c("notifiPlayerSP")->y;
        t::c("notifiInfo->niText")->caption = "Ваш компьютер не подключен к интернету.\nНекоторые функции могут быть недоступны.";
        t::c("notifiInfo->niTWait")->enable = true;
        $offlineMode = true;
    }
    err_yes();
}
err_no();
if ( file_exists("localStorage/data/main.ini") ){
    ini::open("localStorage/data/main.ini");
    ini::readSections( $sections );
    foreach ( $sections as $sec ){
        ini::readKeys( $sec, $keys );
        foreach ( $keys as $key ){
            switch ( $key ){
                case "offlineMode":
                    ini::read("main", "offlineMode", $offlineMode);
                break;
            }
        }
    }
} else {
    ini::open("localStorage/data/main.ini");
    ini::write("main", "offlineMode", false);
    $offlineMode = false;
}
err_yes();
if ( file_exists("localStorage/data/lockScreen.ini") ){
    ini::open("localStorage/data/lockScreen.ini" );
    ini::readSections( $sections );
    foreach ( $sections as $sec ){
        ini::readKeys( $sec, $keys );
        foreach ( $keys as $key ){
            switch ( $key ){
                case "color";
                    ini::read( $sec, $key, $color );
                    c("lockScreen")->color = $color;
                    c("settings->LSColor")->brushColor = $color;
                break;
                case "image";
                    ini::read( $sec, $key, $image );
                    if ( $image ){
                        ini::read( $sec, "imagePath", $imagePath );
                        c("lockScreen->lsImage")->loadFromFile( $imagePath );
                        c("settings->imageLS")->loadFromFile( $imagePath );
                        c("settings->LSIDelete")->visible = true;
                        c("settings->LSINF")->visible = false;
                    }
                break;
            }
        }
    }
}
if ( file_exists("localStorage/data/iconsCreated.ini") ){
    ini::open("localStorage/data/iconsCreated.ini" );
    ini::readSections( $sections );
    foreach ( $sections as $sec ){
        c("settings->createIconList")->text .= $sec;
        $icon = new UIIcon( $self );
        $icon->parent = $self;
        $icon->w = 48;
        $icon->h = 48;
        $icon->center = true;
        $icon->proportional = true;
        $icon->name = $sec;
        ini::readKeys( $sec, $keys );
        foreach ( $keys as $key ){
            switch ( $key ){
                case "x":
                    ini::read($sec, $key, $x);
                    $icon->x = $x;
                break;
                case "y":
                    ini::read($sec, $key, $y);
                    $icon->y = $y;
                break;
                case "image":
                    ini::read($sec, $key, $image);
                    $icon->loadFromFile( $image );
                break;
            }
        }
        $icon->create();
    }
}
if ( file_exists("localStorage/data/panels.ini") ){
    ini::open("localStorage/data/panels.ini");
    ini::readSections( $sections );
    foreach( $sections as $sec ){
        ini::readKeys( $sec, $keys );
        foreach( $keys as $key ){
        switch ( $key ){
            case "event":
                ini::read($sec, $key, $event);
                $event = explode("::", $event);
                if ( $event[1] ){
                    switch ( $event[0] ){
                        case "run":
                            c("start->" . $sec)->loadFromFile("localStorage/data/images/upFile.png");
                            $GLOBALS["userPanels"][$sec] = $event;
                        break;
                        case "notifiShow":
                            c("start->" . $sec)->loadFromFile("localStorage/data/images/notification.png");
                            $GLOBALS["userPanels"][$sec] = $event;
                        break;
                        default:
 							$GLOBALS["userPanels"][$sec] = "err";
                        break;
                    }
                }
        }
        }
    }
}
if ( !$offlineMode ){
    connectionCheck();
}
