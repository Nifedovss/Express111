<?php switch ( Date("l") ){
    case "Monday":
        $day = "�����������";
    break;
    case "Tuesday":
        $day = "�������";
    break;
    case "Wednesday":
        $day = "�����";
    break;
    case "Thursday":
        $day = "�������";
    break;
    case "Friday":
        $day = "�������";
    break;
    case "Saturday":
        $day = "�������";
    break;
    case "Sunday":
        $day = "�����������";
    break;
}
switch ( Date("M") ){
    case "Jan":
        $mon = "������";
    break;
    case "Feb":
        $mon = "�������";
    break;
    case "Mar":
        $mon = "����";
    break;
    case "Apr":
        $mon = "������";
    break;
    case "May":
        $mon = "���";
    break;
    case "Jun":
        $mon = "����";
    break;
    case "Jul":
        $mon = "����";
    break;
    case "Aug":
        $mon = "������";
    break;
    case "Sep":
        $mon = "��������";
    break;
    case "Oct":
        $mon = "�������";
    break;
    case "Nov":
        $mon = "������";
    break;
    case "Dec":
        $mon = "�������";
    break;
}
c("lsMounth")->caption = $mon . " " . Date("d") . ", " . $day;
