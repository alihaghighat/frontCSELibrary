<nav class="top-nav">
    <ul>

        <?php

        $url = "https://omid.asqtest.ir/manager/menu/$_SESSION[employeeId]";
        $client = curl_init($url);
        curl_setopt($client,CURLOPT_RETURNTRANSFER,true);
        curl_setopt($client, CURLOPT_HTTPHEADER, ['Origin: https://omid.asqtest.ir']);
        $response = curl_exec($client);
        $menus = json_decode($response,true);


        if($menus['status']="200"){
            foreach ($menus['data'] as $menu){
                $classActive="";
                if($page==$menu['url']){
                    $classActive="top-menu--active";
                }
                if(count($menu['subArray'])!=0){
                    foreach ($menu['subArray'] as $submenu){
                        if($page==$submenu['url']){
                            $classActive="top-menu--active";
                        }
                    }
                    echo '<li>
                    <a href="dashboard/'.$menu['url'].'" class="top-menu '.$classActive.'">
                        <div class="top-menu__icon"> <i data-feather="'.$menu['icon'].'"></i> </div>
                        <div class="top-menu__title"> '.$menu['name'].' <i data-feather="chevron-down" class="top-menu__sub-icon"></i> </div>
                    </a>';
                    echo '<ul class="top-menu__sub-open">;';
                    foreach ($menu['subArray'] as $submenu){
                        echo '
                    <li>
                        <a href="dashboard/'.$submenu['url'].'" class="top-menu ">
                            <div class="top-menu__icon"> <i data-feather="activity"></i> </div>
                            <div class="top-menu__title"> '.$submenu['name'].' </div>
                        </a>
                    </li>
                    ';
                    }


                    echo ' </ul>';
                    echo '</li>';
                }else{

                    echo '<li>
                    <a href="dashboard/'.$menu['url'].'" class="top-menu '.$classActive.'">
                        <div class="top-menu__icon"> <i data-feather="'.$menu['icon'].'"></i> </div>
                        <div class="top-menu__title"> '.$menu['name'].' </div>
                    </a>';

                    echo '</li>';
                }


            }
        }

        ?>


    </ul>
</nav>
