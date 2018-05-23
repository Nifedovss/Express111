<?php global $systemLang;
switch ( $systemLang->GetCurrentKeyboard ){
    case "ru":
        c("langT")->caption = "RUS";
    break;
    case "en":
        c("langT")->caption = "ENG";
    break;
}
