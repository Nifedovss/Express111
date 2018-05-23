<?php c("start")->alphaBlendValue += 10;
if ( c("start")->alphaBlendValue == 250 ){
    c("start")->alphaBlendValue = 255;
    $self->enable = false;
}
