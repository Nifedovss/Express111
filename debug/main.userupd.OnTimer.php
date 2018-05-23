<?php global $user;
if ( file_exists("localStorage/data/user.ini") ){
    ini::open("localStorage/data/user.ini");
    ini::read("auth", "user", $buff);
    $user = $buff;
    c("start->startUserNameText")->caption = $user;
    $self->enable = false;
}
