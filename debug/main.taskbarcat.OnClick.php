<?php if ( c("start")->alphaBlendValue <= 0 ){
    c("start")->show();
    c("startShow")->enable = true;
    c("start")->x = 0;
    c("start")->y = $SCREEN->height - c("taskbar")->h - c("start")->h;
}
if ( c("start")->alphaBlendValue >= 255 ){
    c("startHide")->enable = true;
}
