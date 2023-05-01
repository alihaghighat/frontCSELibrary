<link rel="stylesheet" href="../assestPanel/dist/css/persian-datepicker.min.css"/>

<div class="content">
    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium ml-auto">
            امانت دادن کتاب
            <?php
            $url = "https://omid.asqtest.ir/manager/bookDetaile";
            $data=array(
                "token"=>$_SESSION['employeeId'],
                "id"=>$_REQUEST['id']
            )
            ;


            $postdata = json_encode($data);

            $ch = curl_init($url);
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $postdata);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json','Origin: https://manager.asqtest.ir']);

            $result = curl_exec($ch);
            curl_close($ch);
            $listAPI1 = json_decode($result,true);
            if($listAPI1['status']!=200){
            }
            echo $listAPI1['data'][0]['name']



            ?>
        </h2>
    </div>

    <div class="grid grid-cols-12 gap-6">
        <!-- BEGIN: Profile Menu -->

        <!-- END: Profile Menu -->
        <div class="col-span-12 " >
            <!-- BEGIN: Display Information -->
            <div class="intro-y box lg:mt-5 lg:mb-2">

                <div class="p-5">
                    <div class="flex flex-col-reverse xl:flex-row flex-col">
                        <div class="flex-1 mt-6 xl:mt-0">
                            <div class="grid grid-cols-12 gap-x-5">
                                <?php
                                if($listAPI1['data'][0]['status']=='loaned'){
                                    echo'  
                                     <div class="col-span-12 xl:col-span-12 mt-3 text-theme-6">
                                     این کتاب در وضعیت امانت می باشد.
                                     </div>';
                                }
                                ?>

                                <div class="col-span-12 xl:col-span-3 mt-3">
                                    <div class=" xxl:mt-0">
                                        <label for="userId" class="form-label">نام دانشجو<span class="text-theme-6">*</span></label>
                                        <select  id="userId" data-search="true" class="form-control tail-select m-1 w-full">
                                            <?php
                                            $url = "https://omid.asqtest.ir/manager/userList";
                                            $data=array(
                                                "token"=>$_SESSION['employeeId'],
                                                "limit"=>10000,
                                                "page"=>1,
                                                "keyword"=>""
                                            )
                                            ;


                                            $postdata = json_encode($data);

                                            $ch = curl_init($url);
                                            curl_setopt($ch, CURLOPT_POST, 1);
                                            curl_setopt($ch, CURLOPT_POSTFIELDS, $postdata);
                                            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                                            curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json','Origin: https://manager.asqtest.ir']);

                                            $result = curl_exec($ch);
                                            curl_close($ch);
                                            $listAPI = json_decode($result,true);
                                            if($listAPI['status']!=200){
                                            }else{
                                                foreach ($listAPI['data'] as $item){
                                                    echo '<option value="'.$item['id'].'">'.$item['name'].' '.$item['lastName'].' ('.$item['sNumber'].')</option>';
                                                }
                                            }


                                            ?>


                                        </select>
                                    </div>
                                </div>
                                <div class="col-span-12 xl:col-span-3 mt-3">
                                    <div class=" xxl:mt-0">
                                        <label for="amount" class="form-label">مدت زمان امانت<span class="text-theme-6">*</span></label>
                                        <select  id="amount" data-search="true" class="form-control tail-select m-1 w-full">
                                            <option value="1" >1 ماه</option>
                                            <option value="2" >2 ماه</option>
                                            <option value="3" >3 ماه</option>
                                            <option value="4" >4 ماه</option>
                                            <option value="5" >5 ماه</option>
                                            <option value="6" >6 ماه</option>



                                        </select>
                                    </div>
                                </div>


                            </div>

                            <div class="grid grid-cols-12 gap-x-5">
                                <div class="col-span-12 xl:col-span-12 mt-3">
                                    <div class="alert alert-danger  mb-2" id="alert-danger" role="alert">ddd</div>
                                    <div id="loding"  style="display: none"  class="col-span-6  sm:col-span-3 xl:col-span-2 flex flex-col justify-end items-center">
                                        <svg width="25" viewBox="-2 -2 42 42" xmlns="http://www.w3.org/2000/svg" stroke="rgb(45, 55, 72)" class="w-8 h-8">
                                            <g fill="none" fill-rule="evenodd">
                                                <g transform="translate(1 1)" stroke-width="4">
                                                    <circle stroke-opacity=".5" cx="18" cy="18" r="18"></circle>
                                                    <path d="M36 18c0-9.94-8.06-18-18-18">
                                                        <animateTransform attributeName="transform" type="rotate" from="0 18 18" to="360 18 18" dur="1s" repeatCount="indefinite"></animateTransform>
                                                    </path>
                                                </g>
                                            </g>
                                        </svg>
                                    </div>
                                    <div class="alert alert-success  mb-2"  id="alert-success" >با موفقیت وارد شدید تا چند لحظه دیگر به پنل کاربری وارد خواهید شد</div>

                                </div>
                            </div>


                            <button onclick="addLoan(<?php echo $listAPI1['data'][0]['id']?>)"   type="button" class="btn   btn-primary w-20 mt-3"> ذخیره </button>
                        </div>

                    </div>
                </div>
            </div>
            <!-- END: Display Information -->

        </div>
    </div>
    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium ml-auto">
           تاریخچه امانت کتاب
            <?php   echo $listAPI1['data'][0]['name']?>
        </h2>
    </div>
    <div class="grid grid-cols-12 gap-6 mt-5" >

        <div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2">
            <a onclick="historyBookList()" class="btn  shadow-md ml-2" ><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-refresh-ccw block mx-auto ml-1"><polyline points="1 4 1 10 7 10"></polyline><polyline points="23 20 23 14 17 14"></polyline><path d="M20.49 9A9 9 0 0 0 5.64 5.64L1 10m22 4l-4.64 4.36A9 9 0 0 1 3.51 15"></path></svg>بروزرسانی</a>
            <div class="hidden md:block mx-auto text-gray-600" id="countListTrucks">نمایش 1 تا 10 از 150 داده</div>

            <div class="w-full sm:w-auto mt-3 ml-1 sm:mt-0 sm:ml-auto md:ml-0" style="">
                <div class="w-56 relative text-gray-700 dark:text-gray-300">
                    <input type="text" id="search-data-table-listLoad" onkeyup="historyBookList()" class="form-control w-56 box pl-10 placeholder-theme-13" placeholder="جستجو...">
                    <i class="w-4 h-4 absolute my-auto inset-y-0 ml-3 left-0" data-feather="search" onclick="historyBookList()"></i>
                </div>
            </div>


        </div>


        <div class="col-span-12 xl:col-span-12 mt-3">
            <div class="alert alert-danger  mb-2" id="alert-danger-e" role="alert">ddd</div>
            <div id="loding-e"  style="display: none"  class="col-span-6  sm:col-span-3 xl:col-span-2 flex flex-col justify-end items-center">
                <svg width="25" viewBox="-2 -2 42 42" xmlns="http://www.w3.org/2000/svg" stroke="rgb(45, 55, 72)" class="w-8 h-8">
                    <g fill="none" fill-rule="evenodd">
                        <g transform="translate(1 1)" stroke-width="4">
                            <circle stroke-opacity=".5" cx="18" cy="18" r="18"></circle>
                            <path d="M36 18c0-9.94-8.06-18-18-18">
                                <animateTransform attributeName="transform" type="rotate" from="0 18 18" to="360 18 18" dur="1s" repeatCount="indefinite"></animateTransform>
                            </path>
                        </g>
                    </g>
                </svg>
            </div>
            <div class="alert alert-success mb-2"  id="alert-success" >با موفقیت وارد شدید تا چند لحظه دیگر به پنل کاربری وارد خواهید شد</div>
        </div>
        <div class="grid col-span-12 grid-cols-12 gap-6 mt-5" id="box-data-loads">
            <!-- BEGIN: Users Layout -->
            <div class="intro-y box intro-y show col-span-12 ">


                <div class="p-5" id="responsive-table">
                    <div class="preview">
                        <div class="overflow-x-auto">
                            <table class="table" id="data-table-listLoad">
                                <div id="loding-contact-one" style="display: none" class="col-span-12 flex flex-col justify-end items-center">

                                    <svg width="25" viewBox="-2 -2 42 42" xmlns="http://www.w3.org/2000/svg" stroke="rgb(45, 55, 72)" class="w-8 h-8">
                                        <g fill="none" fill-rule="evenodd">
                                            <g transform="translate(1 1)" stroke-width="4">
                                                <circle stroke-opacity=".5" cx="18" cy="18" r="18"></circle>
                                                <path d="M36 18c0-9.94-8.06-18-18-18">
                                                    <animateTransform attributeName="transform" type="rotate" from="0 18 18" to="360 18 18" dur="1s" repeatCount="indefinite"></animateTransform>
                                                </path>
                                            </g>
                                        </g>
                                    </svg>

                                    <div class="text-center text-xs mt-2">در حال بارگزاری ...</div>
                                </div>

                            </table>
                        </div>
                    </div>

                </div>
            </div>

        </div>


        <!-- END: Users Layout -->
        <!-- BEGIN: Pagination -->
        <div class="intro-y col-span-12 flex flex-wrap sm:flex-row sm:flex-nowrap items-center" >
            <ul class="pagination" id="pagetions">


            </ul>
            <select class="w-20 form-select box mt-3 sm:mt-0" onchange="historyBookList()" id="limitPage">
                <option >20</option>
                <option>50</option>
                <option>35</option>
                <option selected>45</option>
            </select>
        </div>
        <!-- END: Pagination -->
    </div>
</div>
<div id="header-footer-modal-preview" class="modal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content" id="modal-content">

            <div class="modal-header">
                <h2 class="font-medium text-base ml-auto" id="title-modal">
                    ویرایش
                </h2>
            </div>
            <!-- END: Modal Header -->
            <!-- BEGIN: Modal Body -->
            <div class="modal-body col-span-12" id="body-modal">


            </div>

            <!-- END: Modal Body -->
            <!-- BEGIN: Modal Footer -->
            <div class="modal-footer text-right">
                <button type="button" data-dismiss="modal" class="btn btn-outline-secondary w-20 ml-1">لغو</button>


            </div>
            <!-- END: Modal Footer -->
        </div>
    </div>
</div>
<script src=".../assestPanel/dist/js/jquery-3.6.0.min.js"></script>


<script src="../assestPanel/dist/js/num2persian-min.js"></script>
<script>






    async function addRetrun(id) {

        const descreptions=$('#descreptions').val();
        let error=[];

        if(error.length==0){
            let dataSend = {
                "id":id,
                "descreptions":descreptions,
                "token": "<?php echo $_SESSION['employeeId'] ?>"

            }
            const response = await fetch('https://omid.asqtest.ir/manager/addRetrun', {
                method: "POST",
                body: JSON.stringify(dataSend),
                headers: {"Content-type": "application/json"}
            });
            if (response.ok) {

                const data = await response.json();
                console.log(data)
                if(data['status']==200){
                    $('#title-success-notification-content').html('موفقیت آمیز');
                    $('#descriptions-success-notification-content').html(data['description']);
                    $("#success-notification-toggle").click();
                    $("#toast-close").click();

                    setTimeout(function () {
                        historyBookList()
                        $("#toast-close").click();
                    }, 5000);

                }else{
                    $('#title-success-notification-content').html('خطا');
                    $('#descriptions-success-notification-content').html(data['description']);
                    $("#success-notification-toggle").click();
                    setTimeout(function () {

                        $("#toast-close").click();
                    }, 5000);

                }


            } else {
                $('#title-success-notification-content').html('خطا');
                $('#descriptions-success-notification-content').html('خطای دریافت اطلاعات');
                $("#success-notification-toggle").click();
                setTimeout(function () {

                    $("#toast-close").click();
                }, 5000);



            }
        }else{
            console.log(error);
            let text = error.join("<br><br>");
            $('#loding').hide(400);
            $('#alert-danger').show(500);
            $('#alert-danger').html(text);

            setTimeout(function () {
                $('#alert-danger').hide(400);
            },5000);
        }

    }
    async function addLoan(id) {
        const userId=$('#userId :selected').val();
        const amount=$('#amount :selected').val();

        let error=[];

        if(error.length==0){
            let dataSend = {
                "id":id,
                "amount":amount,
                "userId":userId,
                "token": "<?php echo $_SESSION['employeeId'] ?>"

            }
            const response = await fetch('https://omid.asqtest.ir/manager/addLoan', {
                method: "POST",
                body: JSON.stringify(dataSend),
                headers: {"Content-type": "application/json"}
            });
            if (response.ok) {

                const data = await response.json();
                console.log(data)
                if(data['status']==200){
                    $('#title-success-notification-content').html('موفقیت آمیز');
                    $('#descriptions-success-notification-content').html(data['description']);
                    $("#success-notification-toggle").click();
                    $("#toast-close").click();

                    setTimeout(function () {
                        historyBookList()
                        $("#toast-close").click();
                    }, 5000);

                }else{
                    $('#title-success-notification-content').html('خطا');
                    $('#descriptions-success-notification-content').html(data['description']);
                    $("#success-notification-toggle").click();
                    setTimeout(function () {

                        $("#toast-close").click();
                    }, 5000);

                }


            } else {
                $('#title-success-notification-content').html('خطا');
                $('#descriptions-success-notification-content').html('خطای دریافت اطلاعات');
                $("#success-notification-toggle").click();
                setTimeout(function () {

                    $("#toast-close").click();
                }, 5000);



            }
        }else{
            console.log(error);
            let text = error.join("<br><br>");
            $('#loding').hide(400);
            $('#alert-danger').show(500);
            $('#alert-danger').html(text);

            setTimeout(function () {
                $('#alert-danger').hide(400);
            },5000);
        }

    }
    var
        persianNumbers = [/۰/g, /۱/g, /۲/g, /۳/g, /۴/g, /۵/g, /۶/g, /۷/g, /۸/g, /۹/g],
        arabicNumbers  = [/٠/g, /١/g, /٢/g, /٣/g, /٤/g, /٥/g, /٦/g, /٧/g, /٨/g, /٩/g]
    fixNumbers = function (str)
    {
        if(typeof str === 'string')
        {
            for(var i=0; i<10; i++)
            {
                str = str.replace(persianNumbers[i], i).replace(arabicNumbers[i], i);
            }
        }
        return str;
    };
    function checkCodeMeli(code)
    {

        var L=code.length;

        if(L<8 || parseInt(code,10)==0) return false;
        code=('0000'+code).substr(L+4-10);
        if(parseInt(code.substr(3,6),10)==0) return false;
        var c=parseInt(code.substr(9,1),10);
        var s=0;
        for(var i=0;i<9;i++)
            s+=parseInt(code.substr(i,1),10)*(10-i);
        s=s%11;
        return (s<2 && c==s) || (s>=2 && c==(11-s));
        return true;
    }
</script>
<script>
    var page=1;
    var isSearch=0;
    var latLoadDetailId=0;
    let selectServises=[];
    let selectServises2=[];
    function historyBookList(){
        let keyword=$('#search-data-table-listLoad').val();
        let limit=$('#limitPage :selected').val();


        count();
        pagetion();
        $.ajax({
            url : 'viewModel/historyBookList/List.php',
            type : 'POST',
            data : {
                "keyword":keyword,
                "limit":limit,
                "page": page,
                "id":"<?php echo $listAPI1['data'][0]['id']?>"

            },
            success : function (dataAjax){
                isSearch=0;

                $('#data-table-listLoad').html(dataAjax);
                $('#loding-contact-one').hide(400);
            }
        })
    }
    function setPage(pageInput){
        page=pageInput;
        historyBookList();
    }

    function count(){
        let keyword=$('#search-data-table-listLoad').val();
        let limit=$('#limitPage :selected').val();
        $.ajax({
            url : 'viewModel/historyBookList/List.php',
            type : 'POST',
            data : {
                "keyword":keyword,
                "limit":limit,
                "page": page,
                "count":1,
                "id":"<?php echo $listAPI1['data'][0]['id']?>"

            },
            success : function (dataAjax){
                isSearch=0;

                $('#countListTrucks').html(dataAjax);
                $('#loding-contact-one').hide(400);
            }
        })
    }
    function pagetion(){
        let keyword=$('#search-data-table-listLoad').val();
        let limit=$('#limitPage :selected').val();
        $.ajax({
            url : 'viewModel/historyBookList/List.php',
            type : 'POST',
            data : {
                "keyword":keyword,
                "limit":limit,
                "page": page,
                "pagetions":1,
                "id":"<?php echo $listAPI1['data'][0]['id']?>"

            },
            success : function (dataAjax){
                isSearch=0;


                $('#pagetions').html(dataAjax);
                $('#loding-contact-one').hide(400);
            }
        })
    }

    function myFunctionSerch() {
        // Declare variables
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("Search-table");
        filter = input.value.toUpperCase();
        table = document.getElementById("data-table-listLoad");
        tr = table.getElementsByTagName("tr");

        // Loop through all table rows, and hide those who don't match the search query
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[1];
            if (td) {
                txtValue = td.textContent || td.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }
        }
    }
    function gregorian_to_jalali(gy, gm, gd) {
        var g_d_m, jy, jm, jd, gy2, days;
        g_d_m = [0, 31, 59, 90, 120, 151, 181, 212, 243, 273, 304, 334];
        gy2 = (gm > 2) ? (gy + 1) : gy;
        days = 355666 + (365 * gy) + ~~((gy2 + 3) / 4) - ~~((gy2 + 99) / 100) + ~~((gy2 + 399) / 400) + gd + g_d_m[gm - 1];
        jy = -1595 + (33 * ~~(days / 12053));
        days %= 12053;
        jy += 4 * ~~(days / 1461);
        days %= 1461;
        if (days > 365) {
            jy += ~~((days - 1) / 365);
            days = (days - 1) % 365;
        }
        if (days < 186) {
            jm = 1 + ~~(days / 31);
            jd = 1 + (days % 31);
        } else {
            jm = 7 + ~~((days - 186) / 30);
            jd = 1 + ((days - 186) % 30);
        }

        return [jy, jm, jd];
    }
    function showReturn(id){
        $('#header-footer-modal-preview').show(400);
        $.ajax({
            url : 'viewModel/historyBookList/retrun.php',
            type : 'POST',
            data : {
                "id":id

            },
            success : function (dataAjax){


                $('#modal-content').html(dataAjax);

            }
        })
    }


</script>