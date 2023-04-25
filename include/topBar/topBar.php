<div class="border-b border-theme-29 -mt-10 md:-mt-5 -mx-3 sm:-mx-8 px-3 sm:px-8 pt-3 md:pt-0 mb-10">
    <div class="top-bar-boxed flex items-center">
        <!-- BEGIN: Logo -->
        <a href="" class="-intro-x hidden md:flex">
            <img alt="ب اپلیکیشن مدیریت مدیریت asq -مدیریت asq" class="w-10" src="assestPanel/dist/images/Logo.png">
            <span class="text-white text-lg mr-3"><span class="font-medium">مدیریت asq</span> </span>
        </a>
        <!-- END: Logo -->
        <!-- BEGIN: Breadcrumb -->
        <?php
        $url = "https://omid.asqtest.ir/manager/pageDetaile/$page";


        $client = curl_init($url);
        curl_setopt($client,CURLOPT_RETURNTRANSFER,true);
        curl_setopt($client, CURLOPT_HTTPHEADER, ['Origin: https://omid.asqtest.ir']);
        $response = curl_exec($client);
        $pageDteaile = json_decode($response,true);


        ?>
        <div class="-intro-x breadcrumb breadcrumb--light ml-auto"> <a href="">پنل مدیریت</a> <i data-feather="chevron-left" class="breadcrumb__icon"></i> <a href="javascript:;.html" class="breadcrumb--active"><?php echo $pageDteaile['data']['name']?></a></div>
        <!-- END: Breadcrumb -->
        <!-- BEGIN: Search -->
        <div class="intro-x relative ml-2 sm:ml-6">
            <div class="search hidden sm:block">
                <input type="text" onkeyup="searchTopBar()" id="searchBox" class="search__input form-control dark:bg-dark-1 border-transparent placeholder-theme-13" placeholder="جستجو...">
                <i data-feather="search" class="search__icon dark:text-gray-300"></i>
            </div>
            <av class="search-result " >
                <div class="search-result__content">
                    <div class="search-result__content__title">صفحات</div>
                    <div class="mb-5" id="result-search-box">

                    </div>
                </div>
            </av>
        </div>
        <!-- END: Search -->
        <div class="intro-x dropdown bg-white ml-3 p-1 rounded-lg sm:ml-1" id="chat-new-massage" onclick="showeChatModel()" style="display: none">
            <div class=" text-theme-6"  aria-expanded="false"> <p>پیام جدید دارید!</p> </div>
        </div>
        <!-- BEGIN: Notifications -->
        <div class="intro-x dropdown ml-4 sm:ml-6" id="chat-new">
            <div onclick="showeChatModel()" class="dropdown-toggle notification notification--light notification--bullet cursor-pointer" role="button" aria-expanded="false"> <i data-feather="bell" class="notification__icon dark:text-gray-300"></i> </div>
        </div>

        <!-- END: Notifications -->
        <!-- BEGIN: Account Menu -->
        <div class="intro-x dropdown w-8 h-8">
            <div class="dropdown-toggle w-8 h-8 rounded-full overflow-hidden shadow-lg image-fit zoom-in scale-110" role="button" aria-expanded="false">
                <img alt="" src="assestPanel/dist/images/avatar.png">
            </div>
            <div class="dropdown-menu w-56">
                <div class="dropdown-menu__content box bg-theme-26 dark:bg-dark-6 text-white">
                    <div class="p-4 border-b border-theme-27 dark:border-dark-3">
                        <?php
                        $url = "https://api.asqtest.ir/manager/checkDetaileManager/".$_SESSION['employeeId'];
                        $client = curl_init($url);
                        curl_setopt($client,CURLOPT_RETURNTRANSFER,true);
                        curl_setopt($client, CURLOPT_HTTPHEADER,  ['Origin: https://manager.asqtest.ir']);
                        $response = curl_exec($client);
                        $carrierDetail = json_decode($response,true);
                        if($carrierDetail['status']=="200"){
                            $carrierDetail=$carrierDetail['data'];
                        }



                        ?>

                        <div class="font-medium"><?php echo $carrierDetail['name'].' '.$carrierDetail['lastName']?></div>
                        <div class="text-xs text-theme-28 mt-0.5 dark:text-gray-600"><?php echo $carrierDetail['taskName']?></div>
                    </div>
                    <div class="p-2">
                        <a href="dashboard/profile" class="flex items-center block p-2 transition duration-300 ease-in-out hover:bg-theme-1 dark:hover:bg-dark-3 rounded-md"> <i data-feather="user" class="w-4 h-4 ml-2"></i> پروفایل </a>
                        <a href="https://sabas-co.ir/" target="_blank" class="flex items-center block p-2 transition duration-300 ease-in-out hover:bg-theme-1 dark:hover:bg-dark-3 rounded-md"> <i data-feather="help-circle" class="w-4 h-4 ml-2"></i>سایت اصلی</a>
                    </div>
                    <div class="p-2 border-t border-theme-27 dark:border-dark-3">
                        <div id="success-notification-toggle"></div>
                        <a onclick="logout()"   class="flex items-center block p-2 transition duration-300 ease-in-out hover:bg-theme-1 dark:hover:bg-dark-3 rounded-md"> <i data-feather="toggle-right" class="w-4 h-4 ml-2"></i>خروج</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- END: Account Menu -->
    </div>
</div>
<!-- BEGIN: Notification Content -->
<!-- BEGIN: Notification Content -->
<div id="success-notification-content" class="toastify-content hidden flex">
    <div id="success-notification-content-icon">
        <i class="text-theme-9" data-feather="check-circle"></i>
    </div>

    <div class="ml-4 mr-4">
        <div class="font-medium" id="title-success-notification-content">Message Saved!</div>
        <div class="text-gray-600 mt-1" id="descriptions-success-notification-content">The message will be sent in 5 minutes.</div>
    </div>
</div>
<!-- END: Notification Content --> <!-- BEGIN: Notification Toggle -->

<div id="warning-modal-preview" class="modal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-body p-0">
                <div class="p-5 text-center"> <i data-feather="x-circle" class="w-16 h-16 text-theme-12 mx-auto mt-3"></i>
                    <div class="text-3xl mt-5" id="title-modale-waring"></div>
                    <div class="text-gray-600 mt-2" id="desc-modale-waring"></div>
                </div>
                <div class="px-5 pb-8 text-center"> <button type="button" data-dismiss="modal" class="btn w-24 btn-primary">خواندم</button> </div>
                <div class="p-5 text-center border-t border-gray-200 dark:border-dark-5"> <a class="text-theme-1 dark:text-theme-10">در صورت وجود سوال از طریق پشتیبانی  ما را  در جریان بگذارید.</a> </div>
            </div>
        </div>
    </div>
</div>