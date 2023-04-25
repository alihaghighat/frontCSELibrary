<div class="mobile-menu md:hidden">
    <div class="mobile-menu-bar">
        <a href="" class="flex ml-auto">
            <img alt="وب اپلیکیشن مدیریت مدیریت asq -مدیریت asq" class="w-6" src="assestPanel/dist/images/logo.png">
        </a>
        <a href="javascript:;.html" id="mobile-menu-toggler"> <i data-feather="bar-chart-2" class="w-8 h-8 text-white transform -rotate-90"></i> </a>
    </div>
    <ul class="border-t border-theme-29 py-5 hidden">
        <?php

        $url = "https://omid.asqtest.ir/manager/menu/$_SESSION[employeeId]";
        $client = curl_init($url);
        curl_setopt($client,CURLOPT_RETURNTRANSFER,true);
        curl_setopt($client, CURLOPT_HTTPHEADER, ['Origin: https://omid.asqtest.ir']);
        $response = curl_exec($client);
        $menus = json_decode($response,true);
        if($menus['status']=200){
            foreach ($menus['data'] as $menu){
                $classActive="";
                if($page==$menu['url']){
                    $classActive="menu--active";
                }

                if(count($menu['subArray'])!=0){
                    foreach ($menu['subArray'] as $submenu){
                        if($page==$submenu['url']){
                            $classActive="menu--active";
                        }
                    }
                    echo '<li>
                    <a href="javascript:;.html" class="menu '.$classActive.'">
                        <div class="menu__icon"> <i data-feather="'.$menu['icon'].'"></i> </div>
                        <div class="menu__title"> '.$menu['name'].' <i data-feather="chevron-down" class="top-menu__sub-icon"></i> </div>
                    </a>';
                    echo '<ul class="menu__sub">;';
                    foreach ($menu['subArray'] as $submenu){
                        echo '
                    <li>
                        <a href="dashboard/'.$submenu['url'].'" class="menu ">
                            <div class="menu__icon"> <i data-feather="activity"></i> </div>
                            <div class="menu__title"> '.$submenu['name'].' </div>
                        </a>
                    </li>
                    ';
                    }


                    echo ' </ul>';
                    echo '</li>';
                }else{
                    echo '<li>
                    <a href="dashboard/'.$menu['url'].'" class="menu '.$classActive.'">
                        <div class="menu__icon"> <i data-feather="'.$menu['icon'].'"></i> </div>
                        <div class="menu__title"> '.$menu['name'].' <i data-feather="chevron-down" class="top-menu__sub-icon"></i> </div>
                    </a>';

                    echo '</li>';
                }


            }
        }

        ?>


    </ul>
</div>