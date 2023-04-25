<link rel="stylesheet" href="../assestPanel/dist/css/persian-datepicker.min.css"/>

<div class="content">

    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium ml-auto">
            لیست دسته بندی
        </h2>
    </div>
    <div class="grid grid-cols-12 gap-6 mt-5" >

        <div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2">
            <a onclick="categoryList()" class="btn  shadow-md ml-2" ><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-refresh-ccw block mx-auto ml-1"><polyline points="1 4 1 10 7 10"></polyline><polyline points="23 20 23 14 17 14"></polyline><path d="M20.49 9A9 9 0 0 0 5.64 5.64L1 10m22 4l-4.64 4.36A9 9 0 0 1 3.51 15"></path></svg>بروزرسانی</a>
            <div class="hidden md:block mx-auto text-gray-600" id="countListTrucks">نمایش 1 تا 10 از 150 داده</div>

            <div class="w-full sm:w-auto mt-3 ml-1 sm:mt-0 sm:ml-auto md:ml-0" style="">
                <div class="w-56 relative text-gray-700 dark:text-gray-300">
                    <input type="text" id="search-data-table-listLoad" onkeyup="categoryList()" class="form-control w-56 box pl-10 placeholder-theme-13" placeholder="جستجو...">
                    <i class="w-4 h-4 absolute my-auto inset-y-0 ml-3 left-0" data-feather="search" onclick="categoryList()"></i>
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
            <select class="w-20 form-select box mt-3 sm:mt-0" onchange="categoryList()" id="limitPage">
                <option >20</option>
                <option>50</option>
                <option>35</option>
                <option selected>45</option>
            </select>
        </div>
        <!-- END: Pagination -->
    </div>
</div>
<script src=".../assestPanel/dist/js/jquery-3.6.0.min.js"></script>


<script src="../assestPanel/dist/js/num2persian-min.js"></script>
<script>






    async function deActive(id) {


        let error=[];

        if(error.length==0){
            let dataSend = {
                "type":'deActiveTest',
                "id":id,
                "token": "<?php echo $_SESSION['employeeId'] ?>"

            }
            const response = await fetch('https://api.asqtest.ir/manager/setDoctorActive', {
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
                        categoryList()
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
    async function activeTion(id) {


        let error=[];

        if(error.length==0){
            let dataSend = {
                "type":'activeTest',
                "id":id,

                "token": "<?php echo $_SESSION['employeeId'] ?>"

            }
            const response = await fetch('https://api.asqtest.ir/manager/setDoctorActive', {
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
                        categoryList()
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
    function categoryList(){
        let keyword=$('#search-data-table-listLoad').val();
        let limit=$('#limitPage :selected').val();


        count();
        pagetion();
        $.ajax({
            url : 'viewModel/categoryList/List.php',
            type : 'POST',
            data : {
                "keyword":keyword,
                "limit":limit,
                "page": page

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
        categoryList();
    }
    function  listLoadShowSearch(e){
        if(e.keyCode==13){
            var keyword=$('#search-data-table-listLoad').val();
            $("#myTable tr").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(keyword) > -1)
            });
        }
    }
    function count(){
        let keyword=$('#search-data-table-listLoad').val();
        let limit=$('#limitPage :selected').val();
        $.ajax({
            url : 'viewModel/categoryList/List.php',
            type : 'POST',
            data : {
                "keyword":keyword,
                "limit":limit,
                "page": page,
                "count":1

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
            url : 'viewModel/categoryList/List.php',
            type : 'POST',
            data : {
                "keyword":keyword,
                "limit":limit,
                "page": page,
                "pagetions":1

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
    function showEditBime(id){
        $('#header-footer-modal-preview').show(400);
        $.ajax({
            url : 'viewModel/categoryList/List.php',
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