<?php
include_once("../../functions/config.php");
if(isset($_REQUEST['keyword']) and isset($_REQUEST['limit']) and isset($_REQUEST['page'])){
    $url = "https://omid.asqtest.ir/manager/historyBook";
    $data=array(
        "token"=>$_SESSION['employeeId'],
        "id"=>$_REQUEST['id'],
        "keyword"=>$_REQUEST['keyword'],
        "limit"=>$_REQUEST['limit'],
        "page"=>$_REQUEST['page'],
    )
    ;


    $postdata = json_encode($data);

    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $postdata);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json','Origin: https://omid.asqtest.ir']);

    $result = curl_exec($ch);
    curl_close($ch);
    $listAPI = json_decode($result,true);



    $startLimit=($_REQUEST['page']-1)*$_REQUEST['limit'];


    if(isset($_REQUEST['count'])){
        $startLimit=($_REQUEST['page']-1)*$_REQUEST['limit'];
        echo "نمایش از ".($startLimit+1)." تا ".($startLimit+$_REQUEST['limit'])."  از ".$listAPI['count']." داده یافت شده ";
        return;
    }
    //pagetions start

    if(isset($_REQUEST['pagetions'])){
        $pages=$listAPI['count']/$_REQUEST['limit'];
        if($pages<0){
            $pages=1;
        }
        $page=$_REQUEST['page'];
        pagination($page,$pages);
        return;
    }


    if($listAPI['status']!=200){
        echo '<div class="col-span-12 mt-6 -mb-6 intro-y">
        <div class="alert alert-warning alert-dismissible show flex font-bold items-center mb-6" role="alert">
            
            <span>
            '.$listAPI['description'].' 

            </span>

            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x w-4 h-4"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg> </button>
        </div>
    </div>';

        return;
    }



    $datas=$listAPI['data'];
    echo '<thead>
                <tr>
                    <th class="border-b-2 dark:border-dark-5 whitespace-nowrap">#</th>
                    <th class="border-b-2 dark:border-dark-5 whitespace-nowrap">کاربر</th>
                    <th class="border-b-2 dark:border-dark-5 whitespace-nowrap">تاریخ تحویل</th>
                    <th class="border-b-2 dark:border-dark-5 whitespace-nowrap">روز باقی مونده</th>
                    <th class="border-b-2 dark:border-dark-5 whitespace-nowrap">وضعیت</th>
                    <th class="border-b-2 dark:border-dark-5 whitespace-nowrap">توضیحات</th>
                   
          
                    <th class="border-b-2 dark:border-dark-5 whitespace-nowrap"> عملیات</th>
                </tr>
            </thead>
            <tbody id="myTable">';
    $j=$startLimit;

    foreach ($datas as $data){
        $j++;
        $btn='';
        $status='پس گرفته شده';
        if($data['status']=='active'){
            $btn='<a data-toggle="modal" data-target="#header-footer-modal-preview"  class="btn btn-danger-soft" onclick="showReturn('.$data['id'].')">پس گرفتن</button>          ';
            $status='در امانت';
        }


        echo '
         <tr>
                    <td class="border-b whitespace-nowrap">'.$j.'</td>
                    <td class="border-b whitespace-nowrap">'.$data['user'].'  </td>
              
                    <td class="border-b whitespace-nowrap">'.$data['startDateFa'].'</td>
                    <td class="border-b whitespace-nowrap ">'.$data['diffDays'].'</td>
                    <td class="border-b whitespace-nowrap ">'.$status.'</td>
                    <td class="border-b whitespace-nowrap ">'.$data['descreptions'].'</td>
                    <td class="border-b whitespace-nowrap">
                    
                    '.$btn .'
                    </td>
                
        </tr>
        ';
    }


    echo ' </tbody>';




}else{
    echo "sdfasdf";
    return;
}

function pagination($page,$pages){
    if($pages <= 5){


        for($i=0;$i<$pages;$i++){
            $thisPage = $i + 1;
            if(($thisPage-1) == $page){

                echo '
                    <li >
                        <a class="pagination__link pagination__link--active" onclick="setPage('.$thisPage.')" href="javascript:void(0)">'.$thisPage.'  </a>
                    </li>
                    ';
            }else{

                echo '
                    <li ><a class="pagination__link" onclick="setPage('.$thisPage.')" href="javascript:void(0)">'.$thisPage.'</a></li>';
            }

        }

    }
    else{

        if($page == 1){

            echo '
                <li  >
                     <a class="pagination__link pagination__link--active" >1  </a>
                 </li>
                 <li class="  "><a class="pagination__link" onclick="  setPage(2)" href="javascript:void(0)">2</a></li>
                 <li class="  "><a class="pagination__link" onclick="  setPage(3)" href="javascript:void(0)">3</a></li>
                 <li class="  "><a class="pagination__link" onclick="  setPage(4)" href="javascript:void(0)">4</a></li>
                 <li class="  "><a class="pagination__link" onclick="  setPage(5)" href="javascript:void(0)">5</a></li>
               
                ';

        }
        elseif($page == 2){
            echo '
                
                 <li ><a class="pagination__link" onclick="  setPage(1)" href="javascript:void(0)">1</a></li>
                 <li  >
                     <a class="pagination__link pagination__link--active " onclick="  setPage(2)" href="javascript:void(0)">2  </a>
                 </li>
                 <li ><a class="pagination__link" onclick="  setPage(3)" href="javascript:void(0)">3</a></li>
                 <li><a class="pagination__link" onclick="  setPage(4)" href="javascript:void(0)">4</a></li>
                 <li ><a class="pagination__link" onclick="  setPage(5)" href="javascript:void(0)">5</a></li>
               
                ';
        }
        elseif(($pages - $page) == 0){

            for($i = ($page-4) ; $i <= $page ; $i++){

                if($i==$page){
                    echo '<li  >
                                <a class="pagination__link pagination__link--active  " onclick="  setPage('.$i.')" href="javascript:void(0)">'.$i.'  </a>
                             </li>';

                }else{
                    echo '<li><a class="pagination__link" onclick="  setPage('.$i.')" href="javascript:void(0)">'.$i.'</a></li>';
                }
            }

        }
        elseif(($pages - $page) == 1){

            for($i = ($page-3) ; $i <= $page ; $i++){

                if($i==$page){
                    echo '<li  >
                                <a class="pagination__link pagination__link--active " href="#">'.$i.'  </a>
                             </li>';

                }else{
                    echo '<li ><a class="pagination__link" onclick="  setPage('.$i.')" href="javascript:void(0)">'.$i.'</a></li>';
                }
            }


        }else{
            $page1 = $page-2;
            $page2 = $page-1;
            $page3 = $page;
            $page4 = $page+1;
            $page5 = $page+2;
            echo '
                 <li><a class="pagination__link" onclick="setPage('.$page1.')" href="javascript:void(0)">'.$page1.'</a></li>
                 <li ><a class="pagination__link" onclick="setPage('.$page2.')" href="javascript:void(0)">'.$page2.'</a></li>
                 <li >
                     <a class="pagination__link pagination__link--active " onclick="setPage('.$page3.')" href="javascript:void(0)">'.$page3.'</a>
                 </li>
                 <li ><a class="pagination__link" onclick="setPage('.$page4.')" href="javascript:void(0)">'.$page4.'</a></li>
                 <li ><a class="pagination__link" onclick="setPage('.$page5.')" href="javascript:void(0)">'.$page5.'</a></li>
                
                ';
        }
    }

}
function convertSecondToAge($inputSeconds){


    $secondsInAMinute =60;
    $secondsInAnHour = 60 * $secondsInAMinute;
    $secondsInADay = 86400;
    $secondsInAWeek = 7 * $secondsInADay;
    $secondsInAMonth = 30 * $secondsInADay;
    $secondsYers = 60 * 525600;
    ;

    // Extract Month
    $Month = floor($inputSeconds / $secondsInAMonth);
    $yers = floor($inputSeconds/ $secondsYers);

    // Extract days

    $days = floor(($inputSeconds / $secondsInADay)%30);




    // Format and return
    $timeParts = [];
    $sections = [
        'سال' => (int)$yers,
        'ماه' => (int)$Month,
        'روز' => (int)$days,


    ];

    foreach ($sections as $name => $value){

        $timeParts[] = $value;

    }

    return $timeParts;

}
?>





