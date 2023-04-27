<link rel="stylesheet" href="../assestPanel/dist/css/persian-datepicker.min.css"/>
<style>



    .titlegalery{background: #f7f7f7;padding:8px;}



    .closeg:hover{color:red;cursor:pointer;}



    .item.left.btn.btn-success{

        color: #fff;border-bottom: 0px;

        display:none;

    }

    .item.left.btn.btn-success:hover{

        border-color:green;

        background:green !important;



    }

    @media (min-width: 0px) and (max-width: 480px){



        #dragandrophandler{font-size:150%;}

    }

    #dragandrophandler{

        border: 2px dotted #4e595b;

        color: #92AAB0;

        text-align: center;

        vertical-align: middle;

        margin-bottom: 10px;



        padding: 5%;

        border-radius: 30px;



        margin: 5px auto !important;

        height: 115px;

        cursor:pointer;

    }

    #dragandrophandler:active{

        background-image: none;

        outline: 0;

        -webkit-box-shadow: inset 0 3px 5px rgba(0,0,0,0.125);

        box-shadow: inset 0 3px 5px rgba(0,0,0,0.125);

    }

    .progressBar {

        width: 33%;

        height: 22px;

        border: 1px solid #ddd;

        border-radius: 5px;

        overflow: hidden;

        display:inline-block;

        margin:0px 10px 5px 5px;

        vertical-align:top;

    }



    .progressBar div {

        height: 100%;

        color: #fff;

        text-align: right;

        line-height: 22px; /* same as #progressBar height if we want text middle aligned */

        width: 0;

        background-color: #0ba1b5; border-radius: 3px;

    }

    .statusbar

    {

        border-top:1px solid #A9CCD1;

        min-height:25px;

        padding:10px 10px 0px 10px;

        vertical-align:top;

    }

    .statusbar:nth-child(odd){

        background:#EBEFF0;

    }

    .filename

    {

        display:inline-block;

        vertical-align:top;

        width:33%;

        overflow: hidden;

        height: 20px;

    }

    .filesize

    {

        display:inline-block;

        vertical-align:top;

        color:#30693D;

        width:100px;

        margin-left:10px;

        margin-right:5px;

    }

    .abort{

        background-color:#A8352F;

        -moz-border-radius:4px;

        -webkit-border-radius:4px;

        border-radius:4px;display:inline-block;

        color:#fff;

        font-family:arial;font-size:13px;font-weight:normal;

        padding:4px 15px;

        cursor:pointer;

        vertical-align:top

    }
    .marj{
        margin: 10px;
    }

</style>
<div class="content">
    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium ml-auto">
          ویرایش کتاب
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


                                <div class="col-span-12 xl:col-span-3 mt-3">
                                    <div>
                                        <label for="dateBirthSh" class="form-label">نام <span class="text-theme-6">* </span>  </label>
                                        <div class="relative w-100 mx-auto">
                                            <input type="text"  id="name"   value="<?php echo $listAPI1['data'][0]['name']?>" class="form-control pr-12"/>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-span-12 xl:col-span-3 mt-3">
                                    <div class=" xxl:mt-0">
                                        <label for="category" class="form-label">دسته بندی<span class="text-theme-6">*</span></label>
                                        <select  id="category" data-search="true" class="form-control tail-select m-1 w-full">
                                            <?php
                                            $url = "https://omid.asqtest.ir/manager/categoryList";
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
                                                   if($listAPI1['data'][0]['category']==$item['id']){
                                                       echo '<option selected value="'.$item['id'].'">'.$item['name'].'</option>';
                                                   }else{
                                                       echo '<option value="'.$item['id'].'">'.$item['name'].'</option>';
                                                   }
                                                   foreach ($item['subcategory'] as $subcategory){
                                                       if($listAPI1['data'][0]['category']==$subcategory['id']){
                                                           echo '<option selected value="'.$subcategory['id'].'">--'.$subcategory['name'].'</option>';
                                                       }else{
                                                           echo '<option value="'.$subcategory['id'].'">--'.$subcategory['name'].'</option>';
                                                       }

                                                   }
                                               }
                                            }


                                            ?>


                                        </select>
                                    </div>
                                </div>
                                <div class="col-span-12 xl:col-span-3 mt-3">
                                    <div class=" xxl:mt-0">
                                        <label for="comod" class="form-label">کمد<span class="text-theme-6">*</span></label>
                                        <select  id="comod" data-search="true" class="form-control tail-select m-1 w-full">
                                            <option <?php if($listAPI1['data'][0]['comode']==1) echo 'selected'?> >1</option>
                                            <option <?php if($listAPI1['data'][0]['comode']==2) echo 'selected'?>>2</option>
                                            <option <?php if($listAPI1['data'][0]['comode']==3) echo 'selected'?>>3</option>
                                            <option <?php if($listAPI1['data'][0]['comode']==4) echo 'selected'?>>4</option>
                                            <option <?php if($listAPI1['data'][0]['comode']==5) echo 'selected'?>>5</option>
                                            <option <?php if($listAPI1['data'][0]['comode']==6) echo 'selected'?>>6</option>


                                        </select>
                                    </div>
                                </div>

                                <div class="col-span-12 xl:col-span-3 mt-3">
                                    <div class=" xxl:mt-0">
                                        <label for="ghafase" class="form-label">قفسه<span class="text-theme-6">*</span></label>
                                        <select  id="ghafase" data-search="true" class="form-control tail-select m-1 w-full">
                                            <option <?php if($listAPI1['data'][0]['ghafase']=='A') echo 'selected'?> >A</option>
                                            <option <?php if($listAPI1['data'][0]['ghafase']=='B') echo 'selected'?>>B</option>


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


                            <button onclick="editeBook(<?php echo $listAPI1['data'][0]['id']?>)"   type="button" class="btn   btn-primary w-20 mt-3"> ذخیره </button>
                        </div>

                    </div>
                </div>
            </div>
            <!-- END: Display Information -->

        </div>
    </div>

</div>
<script src=".../assestPanel/dist/js/jquery-3.6.0.min.js"></script>


<script src="../assestPanel/dist/js/num2persian-min.js"></script>
<script>






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
    async function editeBook(id){
        $('#alert-danger').hide(500);
        let name=$('#name').val();

        let category=$('#category :selected').val();
        let comod=$('#comod :selected').val();
        let ghafase=$('#ghafase :selected').val();



        let error=[];
        if(name=='' && name.length<3){
            error.push("نام را به درستی وارد کنید.");
        }



        if(error.length==0){

            let data = {

                "id": id,
                "name": name,
                "category": category,
                "comod": comod,
                "ghafase": ghafase,
                "token":"<?php echo $_SESSION['employeeId'] ?>"

            }

            const response = await fetch('https://omid.asqtest.ir/manager/editeBook', {
                method: "POST",
                body: JSON.stringify(data),
                headers: {"Content-type": "application/json; charset=UTF-8"}
            });

            console.log(response);
            if(response.ok){

                var dataAPI = await response.json();
                console.log(dataAPI);
                $('#alert-danger').hide(400);
                if(dataAPI['status']==200){
                    $('#loding').hide(400);

                    $('#alert-success').show(500);
                    $('#alert-success').html(dataAPI['description']);
                    setTimeout(function () {
                        $('#alert-success').hide(400);
                        location.reload();
                    },10000);


                }else{
                    $('#loding').hide(400);
                    $('#alert-danger').show(500);
                    $('#alert-danger').html(dataAPI['description']);
                    setTimeout(function () {
                        $('#alert-danger').hide(400);
                    },10000);

                }
            }else{
                $('#loding').hide(400);
                $('#alert-danger').show(500);
                $('#alert-danger').html('لطفا صفحه کلید خود را در حالت EN قرار دهید.');

                setTimeout(function () {
                    $('#alert-danger').hide(400);
                },10000);

            }
        }else{

            console.log(error);
            let text = error.join("<br><br>");
            $('#loding').hide(400);
            $('#alert-danger').show(500);
            $('#alert-danger').html(text);

            setTimeout(function () {
                $('#alert-danger').hide(400);
            },50000);
        }
    }
    function testASQ3List(){
        let keyword=$('#search-data-table-listLoad').val();
        let limit=$('#limitPage :selected').val();


        count();
        pagetion();
        $.ajax({
            url : 'viewModel/ASQ3/testList.php',
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
        testASQ3List();
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
            url : 'viewModel/ASQ3/testList.php',
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
    function pagetion(){
        let keyword=$('#search-data-table-listLoad').val();
        let limit=$('#limitPage :selected').val();
        $.ajax({
            url : 'viewModel/ASQ3/testList.php',
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

    function getSelectValues(select) {
        var result = [];
        var options = select && select.options;
        var opt;

        for (var i=0, iLen=options.length; i<iLen; i++) {
            opt = options[i];

            if (opt.selected) {
                result.push(opt.value || opt.text);
            }
        }
        return result;
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
            url : 'viewModel/ASQ3/testList.php',
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