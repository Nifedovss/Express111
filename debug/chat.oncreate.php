<?php global $appId;
$appId = $self->name;
$GLOBALS["resize"][$appId]["W"] = c( $appId )->w;
$GLOBALS["resize"][$appId]["H"] = c( $appId )->h;
c("msgText")->text = str_replace("
", "", c("msgText")->text);
$self->doubleBuffered = true;

