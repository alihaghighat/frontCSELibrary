<?php @session_start();




function showPriceText($price){
    if(strlen($price) < 5){
        return $price;
    }
    $strprice = "";
    $length = strlen($price);
    $ln = 0;
    while($ln <= $length){
        if(($length - $ln) <= 3){
            $res = substr($price,0,($length - $ln));
            $strprice = "$res"."$strprice";
            break;
        }else{
            $ln = $ln + 3;
            $res = substr($price,$length-$ln,3);
            $strprice = ",$res"."$strprice";
        }
    }

    return($strprice);
}

function showText($string){
    $newString = str_replace('\n','<br>',$string);

    return $newString;
}

function showText1($string){
    $newString = str_replace('\n','<br>',$string);
    $newString = str_replace('\n','<br>',$newString);

    return $newString;
}


if(!isset($_SESSION['employeeId'])){
    $adminId=0;
}

function goToLoginPage(){
    echo "<script>location.replace('login')</script>";
    return;
}
function gregorian_to_jalali($gy,$gm,$gd,$mod=''){
    $g_d_m=array(0,31,59,90,120,151,181,212,243,273,304,334);
    if($gy>1600){
        $jy=979;
        $gy-=1600;
    }else{
        $jy=0;
        $gy-=621;
    }
    $gy2=($gm>2)?($gy+1):$gy;
    $days=(365*$gy) +((int)(($gy2+3)/4)) -((int)(($gy2+99)/100)) +((int)(($gy2+399)/400)) -80 +$gd +$g_d_m[$gm-1];
    $jy+=33*((int)($days/12053));
    $days%=12053;
    $jy+=4*((int)($days/1461));
    $days%=1461;
    if($days > 365){
        $jy+=(int)(($days-1)/365);
        $days=($days-1)%365;
    }
    $jm=($days < 186)?1+(int)($days/31):7+(int)(($days-186)/30);
    $jd=1+(($days < 186)?($days%31):(($days-186)%30));
    return($mod=='')?array($jy,$jm,$jd):$jy.$mod.$jm.$mod.$jd;
}


function jalali_to_gregorian($jy,$jm,$jd,$mod=''){
    if($jy>979){
        $gy=1600;
        $jy-=979;
    }else{
        $gy=621;
    }
    $days=(365*$jy) +(((int)($jy/33))*8) +((int)((($jy%33)+3)/4)) +78 +$jd +(($jm<7)?($jm-1)*31:(($jm-7)*30)+186);
    $gy+=400*((int)($days/146097));
    $days%=146097;
    if($days > 36524){
        $gy+=100*((int)(--$days/36524));
        $days%=36524;
        if($days >= 365)$days++;
    }
    $gy+=4*((int)($days/1461));
    $days%=1461;
    if($days > 365){
        $gy+=(int)(($days-1)/365);
        $days=($days-1)%365;
    }
    $gd=$days+1;
    foreach(array(0,31,(($gy%4==0 and $gy%100!=0) or ($gy%400==0))?29:28 ,31,30,31,30,31,31,30,31,30,31) as $gm=>$v){
        if($gd<=$v)break;
        $gd-=$v;
    }
    return($mod=='')?array($gy,$gm,$gd):$gy.$mod.$gm.$mod.$gd;
}

function convertMonthName($month){
    switch ($month) {
        case '1':
            return "فروردین";
        case '2':
            return "اردیبهشت";
        case '3':
            return "خرداد";
        case '4':
            return "تیر";
        case '5':
            return "مرداد";
        case '6':
            return "شهریور";
        case '7':
            return "مهر";
        case '8':
            return "آبان";
        case '9':
            return "آذر";
        case '10':
            return "دی";
        case '11':
            return "بهمن";
        case '12':
            return "اسفند";

    }
}

function searchFor2D($id, $array,$keyword) {
    foreach ($array as $key => $val) {

        if ($val[$keyword] === $id) {

            return $val;
        }
    }
    return null;
}

function convertSecondToString($inputSeconds){

    $secondsInAMinute = 60;
    $secondsInAnHour = 60 * $secondsInAMinute;
    $secondsInADay = 24 * $secondsInAnHour;

    // Extract days
    $days = floor($inputSeconds / $secondsInADay);

    // Extract hours
    $hourSeconds = $inputSeconds % $secondsInADay;
    $hours = floor($hourSeconds / $secondsInAnHour);

    // Extract minutes
    $minuteSeconds = $hourSeconds % $secondsInAnHour;
    $minutes = floor($minuteSeconds / $secondsInAMinute);

    // Extract the remaining seconds
    $remainingSeconds = $minuteSeconds % $secondsInAMinute;
    $seconds = ceil($remainingSeconds);

    // Format and return
    $timeParts = [];
    $sections = [
        'روز' => (int)$days,
        'ساعت' => (int)$hours,
        'دقیقه' => (int)$minutes,
    ];

    foreach ($sections as $name => $value){
        if ($value > 0){
            $timeParts[] = $value. ' '.$name;
        }
    }

    return implode(' و ', $timeParts);

}