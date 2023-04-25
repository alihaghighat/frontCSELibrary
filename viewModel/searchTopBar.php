<?php
if(!isset($_REQUEST['keyword'])){
  echo '<a href="" class="flex items-center">
    <div class="w-8 h-8 bg-theme-18 text-theme-9 flex items-center justify-center rounded-full"> <i class="w-4 h-4" data-feather="inbox"></i> </div>
    <div class="mr-3">خطای 404</div>
</a>';
}

$url = "https://api.parsenobat.ir/employee/searchBoxOfPage/".$_REQUEST['keyword'];
$client = curl_init($url);
curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
curl_setopt($client, CURLOPT_HTTPHEADER, ['Origin: https://employee.parsenobat.ir']);
$response = curl_exec($client);
$pages = json_decode($response, true);

if($pages!=null){
    foreach ($pages['data'] as $page){
        echo '<a href="dashboard/'.$page['url'].'" class="flex items-center">
                    <div class="w-8 h-8 bg-theme-18 text-theme-9 flex items-center justify-center rounded-full"> <i class="w-4 h-4" data-feather="'.$page['icon'].'"></i> </div>
                    <div class="mr-3">'.$page['name'].'</div>
              </a>';
    }
}
?>


