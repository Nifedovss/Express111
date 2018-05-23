<?php
function updatescrollBarNew() {
    $Max = 0;

    array_map(function($v) use (&$Max){
        if($Max < ($v->top + $v->h))
            $Max = $v->top + $v->h;
    }, c("Form1")->componentList);

    c("scrollBar1")->max = $Max;
}
?>