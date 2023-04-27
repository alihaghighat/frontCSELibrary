<?php
include "functions/config.php";
if(!isset($_SESSION['employeeId'])){
    echo "<script>location.replace('../login')</script>";
}

if(isset($_REQUEST['page'])){
    $page=$_REQUEST['page'];
}else{
    $page='home';
}
//check profile is complate


?>
<html lang="en" class="light">
<!-- BEGIN: Head -->
<head>
    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="control panel of asq app">
    <meta name="keywords" content="مدیریت کتابخانه بخش کامپیوتر دانشگاه شیراز ">
    <meta name="author" content="گروه برنامه نویسی بام ++ ">
    <title> مدیریت کتابخانه بخش کامپیوتر دانشگاه شیراز  | cselibrary </title>
    <base href="https://cselibrary.ir/">
    <!-- BEGIN: CSS Assets-->
    <link rel="stylesheet" type="text/css" href="/assestPanel/dist/css/app.css" />
    <!-- END: CSS Assets-->
</head>
<!-- END: Head -->
<body class="main">
<!-- BEGIN: Mobile Menu -->
<?php
include("include/menu/mobile-menu.php")
?>
<!-- END: Mobile Menu -->
<!-- BEGIN: Top Bar -->
<?php
include("include/topBar/topBar.php");
?>
<!-- END: Top Bar -->
<!-- BEGIN: Top Menu -->
<?php
include("include/menu/topMenu.php")
?>
<!-- END: Top Menu -->
<!-- BEGIN: Content -->
<?php
$file="pages/".$page.".php";
if(is_file($file)){
    include($file);
}else{
    include_once("pages/500.php");
}

?>
<!-- END: Content -->
<!-- BEGIN: Dark Mode Switcher-->

<!-- END: Dark Mode Switcher-->
<!-- BEGIN: JS Assets-->

<script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js"></script>

<?php
 include_once ("include/app_js.php");
?>
<script type="text/javascript" src="https://cdn.map.ir/web-sdk/1.4.2/js/jquery-3.2.1.min.js"></script>

<script src="assestPanel/dist/js/persian-date.min.js"></script>
<script src="assestPanel/dist/js/persian-datepicker.min.js"></script>
<script src="assestPanel/dist/js/custome.js"></script>
<script type="text/javascript">


    $(document).ready(function() {
        $(".dateBirthSh").pDatepicker({
            format: 'YYYY/MM/DD',
            calendarType: 'persian'
        });
    });
    $(document).ready(function() {
        $(".exapl2").pDatepicker({
            format: 'YYYY/MM/DD',
            calendarType: 'persian'
        });
    });
   $(document).ready(function() {
        $(".exapl1").pDatepicker({
            format: 'YYYY/MM/DD',
            calendarType: 'persian',
            onSelect: function(dateText, inst) {
                var days = ['یکشنبه', 'دوشنبه', 'سه شنبه', 'چهارشنبه', 'پنج شنبه', 'جمعه', 'شنبه'];
                var d = new Date(dateText);
                var dayName = days[d.getDay()];
                $('#dayName').val(dayName)

            }
        });
    });
   $(document).ready(function() {
        $(".exapl11").pDatepicker({
            format: 'YYYY/MM/DD',
            calendarType: 'persian',
            onSelect: function(dateText, inst) {
                var days = ['یکشنبه', 'دوشنبه', 'سه شنبه', 'چهارشنبه', 'پنج شنبه', 'جمعه', 'شنبه'];
                var d = new Date(dateText);
                var dayName = days[d.getDay()];
                $('#dayName').val(dayName)

            }
        });
    });
   $(document).ready(function() {
        $(".exapl-Bokking").pDatepicker({
            format: 'YYYY/MM/DD',
            calendarType: 'persian',
            onSelect: function(dateText, inst) {
                var days = ['یکشنبه', 'دوشنبه', 'سه شنبه', 'چهارشنبه', 'پنج شنبه', 'جمعه', 'شنبه'];
                var d = new Date(dateText);
                var dayName = days[d.getDay()];
                $('#dayName').val(dayName)
                showeTime();

            }
        });
    });
    function showNotificatins(title,des){
        $('#title-modale-waring').html(title);
        $('#desc-modale-waring').html(des);
    }
    <?php
        if($page=='TestASQSE2'){
            echo "testASQ3List()
            
            
            ";

        }
        if($page=='ASQSE2Question'){
            echo "testASQ3List()
            
            
            ";

        }
        if($page=='TestADHD'){
            echo "testAdHD()
            
            
            ";

        }
        if($page=='addVisit'){
            echo "showServiess()
            
            
            ";

        }
        if($page=='categoryList'){
            echo "
           
           setTimeout(function () {

        categoryList()
    },500) ;
     setTimeout(function () {

        categoryList();
    },2500) 
            ";

        }if($page=='bookList'){
        echo "
           
           setTimeout(function () {

        bookList()
    },500) ;
     setTimeout(function () {

        bookList();
    },2500) 
            ";

        }if($page=='userList'){
        echo "
           
           setTimeout(function () {

        userList()
    },500) ;
     setTimeout(function () {

        userList();
    },2500) 
            ";

        }if($page=='listOfDoctor'){
            echo "
            doctorList();
           
           setTimeout(function () {
        doctorList();
 
    },2500) 
            ";

        }if($page=='doctorsBill'){
            echo "
            doctorList();
           
           setTimeout(function () {
        doctorList();
 
    },2500) 
            ";

        }if($page=='doctorBillDetaile'){
            echo "
            doctorList();
           
           setTimeout(function () {
        doctorList();
 
    },2500) 
            ";

        }if($page=='settlementDoctors'){
            echo "
            settlementDoctors();
           
           setTimeout(function () {
        settlementDoctors();
 
    },2500) 
            ";

        }
        if($page=='TestASQ3'){

            echo "
            testASQ3List();
           setTimeout(function () {

        testASQ3List();
    },500) ; setTimeout(function () {

        testASQ3List();
    },2500) ;
            ";

        }  if($page=='ASQ3Question'){

            echo "
            testASQ3List();
           setTimeout(function () {

        testASQ3List();
    },500) ; setTimeout(function () {

        testASQ3List();
    },2500) ;
            ";

        } if($page=='endoscopyList'){

            echo "
            patientlist();
           setTimeout(function () {

        patientlist();
    },500) ; setTimeout(function () {

        patientlist();
    },2500) ;
            ";

        }
        if($page=='serviceslist'){
            echo "
           
           setTimeout(function () {

        patientlist()
    },500) ;
     setTimeout(function () {

        patientlist()
    },2500) ;
            ";

        }
        if($page=='home'){
            echo "
          
           setTimeout(function () {
 showServiess1();
        patientlist()
    },500) ;
     setTimeout(function () {

        patientlist()
    },2500) ;
            ";

        }
        if($page=='listOfTickets'){
            echo "
          
           setTimeout(function () {
showPading()
    },500) ;
     setTimeout(function () {

showPading()
    },2500) ;
            ";

        }
        if($page=='listOfTicketsUser'){
            echo "
          
           setTimeout(function () {
showPading()
    },500) ;
     setTimeout(function () {

showPading()
    },2500) ;
            ";

        }
    ?>
    let url=""

    async function editeDoctor(id){
        $('#alert-danger').hide(500);
        let name=$('#name').val();
        let lastName=$('#lastName').val();
        let phone=fixNumbers($('#phone').val());
        let expertise=$('#expertise :selected').val();
        let decExpertise=$('#decExpertise').val();
        let idCode=$('#idCode').val();
        let Percent=fixNumbers($('#Percent').val());
        let price=fixNumbers($('#price').val());
        let urlImage=url;

        let error=[];
        if(name=='' && name.length<3){
            error.push("نام را به درستی وارد کنید.");
        }
        if(lastName=='' && lastName.length<3){
            error.push("نام خانوادگی را به درستی وارد کنید.");
        }
        if(phone=='' && phone.length<11){
            error.push("شماره را به درستی وارد کنید.");
        }
        if(idCode=='' && idCode.length<5){
            error.push("کد معرف را به درستی وارد کنید.");
        }
        if(Percent<0){
            error.push("درصد کمتر ازصفر نمی شود..");
        }
        if(price<0){
            error.push("مبلغ کمتر ازصفر نمی شود.");
        }


        if(error.length==0){

            let data = {

                "name": name,
                "id": id,
                "token":"<?php echo $_SESSION['employeeId'] ?>",
                "lastName":lastName,
                "phone":phone,
                "expertise":expertise,
                "decExpertise": decExpertise,
                "picUrl":urlImage,
                "idCode":idCode,
                "price":price,
                "Percent":Percent

            }

            const response = await fetch('https://api.asqtest.ir/doctor/editeDoctor', {
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
    let showBoxMasseage=false;
    function showeChatModel(){
        if(showBoxMasseage==false){
            $('#chat-new-massage').show(400);
            showBoxMasseage=true;
        }else{
            $('#chat-new-massage').hide(400);
            showBoxMasseage=false;
        }

    }
    async function sendFileToServer(formData, status) {
        const uploadURL = "https://api.asqtest.ir/doctor/uploadImage/<?php echo $_SESSION['employeeId']?>";
        var jqXHR=$.ajax({

            xhr: function() {

                var xhrobj = $.ajaxSettings.xhr();

                if (xhrobj.upload) {

                    xhrobj.upload.addEventListener('progress', function(event) {

                        var percent = 0;

                        var position = event.loaded || event.position;

                        var total = event.total;

                        if (event.lengthComputable) {

                            percent = Math.ceil(position / total * 100);

                        }

                        //Set progress

                        status.setProgress(percent);

                    }, false);

                }

                return xhrobj;

            },

            url: uploadURL,

            type: "POST",

            contentType:false,

            processData: false,

            cache: false,

            data: formData,

            success: function(data){

                status.setProgress(100);
                if(data['status']!="200"){

                    status.abort.text(data['error']);

                }else{

                    status.abort.text('بارگزاری شد.');

                    status.abort.attr('style','background: #78cd51;');
                    console.log(data);
                    url=data['urlImg'];
                    console.log(url);
                }

            },

            error:function(error){



                alert(error[responseText]);



            }

        });



        status.setAbort(jqXHR);




    }

    var rowCount=0;
    let UserIdTicket=0;
    let UserIdTicketUser=0;
    function createStatusbar(obj)

    {

        rowCount++;

        var row="odd";

        if(rowCount %2 ==0) row ="even";

        this.statusbar = $("<div class='statusbar "+row+"'></div>");

        this.filename = $("<div class='filename'></div>").appendTo(this.statusbar);

        this.size = $("<div class='filesize'></div>").appendTo(this.statusbar);

        this.progressBar = $("<div class='progressBar'><div></div></div>").appendTo(this.statusbar);

        this.abort = $("<div class='abort'>لغو آپلود</div>").appendTo(this.statusbar);

        $('#status1').after(this.statusbar);



        this.setFileNameSize = function(name,size)

        {



            var allwoefromat = new Array('jpg','png','jpeg');

            var mystr=name;

            var myarr = mystr.split(".");

            var typefile= myarr[myarr.length-1].toLowerCase();

            var a=allwoefromat.indexOf(typefile);

            if(allwoefromat.indexOf(typefile)){



            }else{

                this.abort.text('فرمت غیر مجاز');

            }

            var sizeStr="";

            var sizeKB = size/1024;

            if(parseInt(sizeKB) > 1024)

            {

                var sizeMB = sizeKB/1024;

                sizeStr = sizeMB.toFixed(2)+" MB";

            }

            else

            {

                sizeStr = sizeKB.toFixed(2)+" KB";

            }



            this.filename.html(name);

            this.size.html(sizeStr);

        }

        this.setProgress = function(progress)

        {

            var progressBarWidth =progress*this.progressBar.width()/ 100;

            this.progressBar.find('div').animate({ width: progressBarWidth }, 10).html(progress + "% ");

            if(parseInt(progress) >= 100)

            {

                this.abort.text("در حال بررسی ...");

            }

        }

        this.setAbort = function(jqxhr)

        {

            var sb = this.statusbar;

            this.abort.click(function()

            {

                jqxhr.abort();

                sb.hide();

            });

        }

    }

    function handleFileUpload(files,obj)

    {



        for (var i = 0; i < files.length; i++)

        {



            var fd = new FormData();

            fd.append('file', files[i]);

            fd.append('target','file');

            var status = new createStatusbar(obj); //Using this we can set progress.

            status.setFileNameSize(files[i].name,files[i].size);

            sendFileToServer(fd,status);



        }

    }

    $(document).ready(function(){



        var obj = $("#dragandrophandler");

        $("#fileadd12").change(function(){



            files = this.files;

            if (files){

                handleFileUpload(files,obj);

            }

        });

        obj.on('dragenter', function (e)

        {

            e.stopPropagation();

            e.preventDefault();

            $(this).css('border', '2px solid #0B85A1');

            $(this).text('فایل را اینچا رها کنید');

        });

        obj.on('dragover', function (e)

        {

            e.stopPropagation();

            e.preventDefault();

        });

        obj.on('drop', function (e)

        {

            $(this).text('فایل را جهت آپلود بکشید و اینجا رها کنید');

            $(this).css('border', '2px dotted #0B85A1');

            e.preventDefault();

            var files = e.originalEvent.dataTransfer.files;

            handleFileUpload(files,obj);

        });

        $(document).on('dragenter', function (e)

        {

            e.stopPropagation();

            e.preventDefault();

        });

        $(document).on('dragover', function (e)

        {

            e.stopPropagation();

            e.preventDefault();

            obj.css('border', '2px dotted #0B85A1');

            obj.text('عکس ها را جهت آپلود بکشید و اینجا رها کنید');

        });

        $(document).on('drop', function (e)

        {

            e.stopPropagation();

            e.preventDefault();

        });



    });

</script>
<script type="module">

    var audio = new Audio('sound/Creepy-clock-chiming.mp3');
    import { io } from "https://cdn.socket.io/4.4.1/socket.io.esm.min.js";


    const socket = io("https://api.asqtest.ir/");
    socket.on("connect", () => {
        console.log(socket.id); // ojIckSD2jqNzOqIrAGzL

    });
    socket.emit('conectedEmployee', {token:"<?php echo $_SESSION['employeeId']?>"});
    socket.on("reloaDataPantisaa",(arg) => {
        console.log("okkk!")

    });

    socket.on("CallEmployee",(arg) => {
        console.log("okkk!")
        audio.play();
        $('#CallEmployee').html(`<div class="col-span-12 mt-1 intro-y"> <div class="alert alert-warning alert-dismissible show flex font-bold items-center mb-1" role="alert"> <span>
             ${arg}  شما را صدا زده است
    </span>

        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x w-4 h-4"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg> </button>
    </div>
    </div`)
        setTimeout(function () {
            audio.pause();
        },3000)
        setTimeout(function () {
            $('#CallEmployee').html('');
        },30000)
    });
    socket.on("callPatinst",(arg) => {
        audio.play();
        if(arg['name']==2){
            $('#callPatinst').append(`<div class="col-span-12 mt-1 intro-y"> <div class="alert alert-outline-warnings alert-dismissible show flex font-bold items-center mb-1" role="alert"> <span>
             ${arg['name']}  بیمار بعدی را صدا زده است
    </span>

        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x w-4 h-4"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg> </button>
    </div>
    </div`)
        }else{
            $('#callPatinst').append(`<div class="col-span-12 mt-1 intro-y"> <div class="alert alert-outline-primary alert-dismissible show flex font-bold items-center mb-1" role="alert"> <span>
             ${arg['name']}  بیمار بعدی را صدا زده است
    </span>

        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x w-4 h-4"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg> </button>
    </div>
    </div`)
        }


        setTimeout(function () {
            audio.pause();
        },3000)
        setTimeout(function () {
            $('#CallEmployee').html('');
        },30000)
    });
    socket.on("reloaData",(arg) => {
        patientlist();
    });

    socket.on("newTicket",(arg) => {

        if(UserIdTicket==arg.userId){
            console.log(arg.userId);
            showChats(UserIdTicket)
        }
        if(UserIdTicketUser==arg.userId){
            console.log(arg.userId);
            showChats(UserIdTicketUser)
        }
        showPading();
    });

</script>
<!-- END: JS Assets-->
</body>
</html>