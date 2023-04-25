<?php
include "functions/config.php";

if(isset($_SESSION['employeeId']) ){
    echo "<script>location.replace('dashboard/home')</script>";
}

?>
<!DOCTYPE html>
<html lang="en" class="light">
<head>
    <meta charset="utf-8">
 
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="سامانه مدیریت asq | جهت مدیریت کلیکن های پزشکی">
    <meta name="keywords" content="مدیریت کتابخانه بخش کامپیوتر دانشگاه شیراز ">
    <meta name="author" content="گروه برنامه نویسی بام ++ ">
    <title> مدیریت کتابخانه بخش کامپیوتر دانشگاه شیراز  | cselibrary </title>
    <!-- BEGIN: CSS Assets-->

    <link rel="stylesheet" type="text/css" href="assestPanel/dist/css/app.css"/>
    <!-- END: CSS Assets-->
</head>
<!-- END: Head -->
<body class="login">
<div class="container sm:px-10">
    <div class="block xl:grid grid-cols-2 gap-4">
        <!-- BEGIN: Login Info -->
        <div class="hidden xl:flex flex-col min-h-screen">
            <a href="" class="-intro-x flex items-center pt-5">
                <img alt="وب اپلیکیشن مدیریت مدیریت asq -مدیریت asq" class="w-20" src="assestPanel/dist/images/Logo.png">
                <span class="text-white text-lg mr-3"><span class="font-medium">مدیریت asq</span> </span>
            </a>
            <div class="my-auto">
                <img alt="وب اپلیکیشن مدیریت مدیریت asq -مدیریت asq" class="-intro-x w-1/2 -mt-16" src="assestPanel/dist/images/illustration.svg">
                <div class="-intro-x text-white font-medium text-4xl leading-tight mt-10">
                    این پنل مخصوص کاربران  می باشد
                </div>
                <div class="-intro-x mt-5 text-lg text-white text-opacity-70 dark:text-gray-500">در صورت بروز هر گونه مشکل با پشتیبانی تماس حاصل فرمایید.</div>
            </div>
        </div>
        <!-- END: Login Info -->
        <!-- BEGIN: Login Form -->
        <div class="h-screen xl:h-auto flex py-5 xl:py-0 my-10 xl:my-0">
            <div class="my-auto mx-auto xl:mr-20 bg-white dark:bg-dark-1 xl:bg-transparent px-5 sm:px-8 py-8 xl:p-0 rounded-md shadow-md xl:shadow-none w-full sm:w-3/4 lg:w-2/4 xl:w-auto">
                <h2 class="intro-x font-bold text-2xl xl:text-3xl text-center xl:text-right">
                    ورود
                </h2>
                <div class="intro-x mt-2 text-gray-800 xl:hidden text-center">مدیریت asq - پنل مدیریت </div>

                <!-- BEGIN: Basic Select -->

                <div class="intro-x mt-8">

                    <div class="mt-3">
                        <label for="input-state-3" class="form-label">نام کاربری <span class="text-theme-6">*</span> </label>
                        <input id="username" type="text" class="intro-x login__input form-control py-3 px-4 border-gray-300 block" placeholder="نام کاربری">
                        <div class="text-theme-6 mt-2" id="alert-username"></div>
                    </div>
                    <div class="mt-3">
                        <label for="input-state-3" class="form-label">رمز عبور <span class="text-theme-6">*</span> </label>
                        <div class="flex flex-col sm:flex-row ">

                            <div class="form-check mr-2">
                                <input  id="passwoord" type="password" class="intro-x login__input form-control  shadow-lg py-3 px-4 border-gray-300 block mt-4" placeholder="رمزعبور">
                                <div class="text-theme-6 mt-2" id="alert-passwoord"></div>
                            </div>


                        </div>



                    </div>

                </div>

                <div class="intro-x mt-5 xl:mt-8 text-center ">
                    <div class="alert alert-danger  mb-2" id="alert-danger-login" role="alert"></div>
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
                    <div class="alert alert-success  mb-2" id="alert-success-login" role="alert">با موفقیت وارد شدید تا چند لحظه دیگر به پنل کاربری وارد خواهید شد</div>
                    <button onclick="login()" id="butoon-login" class="btn btn-primary py-3 px-4 mb-3 w-full xl:w-32 xl:ml-3 align-top">ورود</button>


                </div>

            </div>
        </div>
        <!-- END: Login Form -->
    </div>
</div>

<!-- END: Dark Mode Switcher-->
<!-- BEGIN: JS Assets-->
<script src="assestPanel/dist/js/app.js"></script>
<script src="assestPanel/dist/js/jquery-3.6.0.min.js"></script>
<script>



    async function login(){
        $('#alert-danger-login').hide(400);
        $('#alert-success-login').hide(400);
        $('#butoon-login').hide(400);
        $('#loding').show(400);
        let username=$('#username').val();
        let passwoord=$('#passwoord').val();
        let kind='password';
        if(username!='' && passwoord!='' ){
           if(kind!='OTP'){
               let dataSend = {
                   "username": username,
                   "password":passwoord

               }

               const response = await fetch('https://omid.asqtest.ir/manager/login', {
                   method: "POST",
                   body: JSON.stringify(dataSend),
                   headers: {"Content-type": "application/json"}
               });
               console.log(response);

               if(response.ok){
                   var data = await response.json();
                   console.log(response);
                   if(data['status']==200){
                       $.ajax({
                           url : 'functions/setTokenDoctor',
                           type : 'POST',
                           data : {
                               "userToken":data['userToken']
                           },
                           success : function (dataAjax){
                               if(!dataAjax.localeCompare('true')){
                                   $('#alert-success-login').show(500);
                                   $('#alert-success-login').html(data['description']);
                                   $('#loding').hide(400);
                                   setTimeout(function () {
                                       location.replace('dashboard/home');
                                   },5000);
                               }else{
                                   $('#loding').hide(400);
                                   $('#alert-danger-login').show(500);
                                   $('#alert-danger-login').html("خطای در ورود رخ داده است با مدیریت تماس بگیرید");
                                   $('#butoon-login').show(400);
                                   setTimeout(function () {
                                       $('#alert-danger-login').hide(400);
                                   },10000);
                               }
                           }
                       })

                   }else{
                       $('#loding').hide(400);
                       $('#alert-danger-login').show(500);
                       $('#alert-danger-login').html(data['description']);
                       $('#butoon-login').show(400);
                       setTimeout(function () {
                           $('#alert-danger-login').hide(400);
                       },10000);

                   }
               }else{
                   $('#loding').hide(400);
                   $('#alert-danger-login').show(500);
                   $('#alert-danger-login').html('لطفا صفحه کلید خود را در حالت EN قرار دهید.');
                   $('#butoon-login').show(400);
                   setTimeout(function () {
                       $('#alert-danger-login').hide(400);
                   },10000);

               }
           }



        }else{
            $('#loding').hide(400);
            $('#alert-danger-login').show(500);
            $('#alert-danger-login').html('موارد ضروری را وارد کنید');
            $('#butoon-login').show(400);
            setTimeout(function () {
                $('#alert-danger-login').hide(400);
            },10000);

        }

    }



</script>

<?php

?>
<!-- END: JS Assets-->
</body>
</html>