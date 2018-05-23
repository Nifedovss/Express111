<?php switch ( Date("l") ){
    case "Monday":
        $day = "Понедельник";
    break;
    case "Tuesday":
        $day = "Вторник";
    break;
    case "Wednesday":
        $day = "Среда";
    break;
    case "Thursday":
        $day = "Четверг";
    break;
    case "Friday":
        $day = "Пятница";
    break;
    case "Saturday":
        $day = "Суббота";
    break;
    case "Sunday":
        $day = "Воскресенье";
    break;
}
switch ( Date("M") ){
    case "Jan":
        $mon = "Январь";
    break;
    case "Feb":
        $mon = "Февраль";
    break;
    case "Mar":
        $mon = "Март";
    break;
    case "Apr":
        $mon = "Апрель";
    break;
    case "May":
        $mon = "Май";
    break;
    case "Jun":
        $mon = "Июнь";
    break;
    case "Jul":
        $mon = "Июль";
    break;
    case "Aug":
        $mon = "Август";
    break;
    case "Sep":
        $mon = "Сентябрь";
    break;
    case "Oct":
        $mon = "Октябрь";
    break;
    case "Nov":
        $mon = "Ноябрь";
    break;
    case "Dec":
        $mon = "Декабрь";
    break;
}
c("lsMounth")->caption = $mon . " " . Date("d") . ", " . $day;
