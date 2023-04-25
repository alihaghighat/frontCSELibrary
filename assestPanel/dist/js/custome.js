function searchTopBar(){
    let keyword=$('#searchBox').val();
    $.ajax({
        url : 'viewModel/searchTopBar',
        type : 'POST',
        data : {
            "keyword":keyword
        },
        success : function (dataAjax){
            $('#result-search-box').html(dataAjax);
        }
    })

}


function logout(){
    $('#title-success-notification-content').html('با موفقیت خارج شدید');
    $('#descriptions-success-notification-content').html('به امید دیدار مجدد.');
    $("#success-notification-toggle").click();
    $.ajax({
        url : 'functions/logout',
        type : 'POST',
        data : {

        },
        success : function (dataAjax){

            setTimeout(function () {
                location.reload();
            },5000)
        }
    })

}
showFilterBoxVar=0;
function showFilterBox(){
    if(showFilterBoxVar==0){
        $('#filterBox').show(400);
        $('#box-data-loads').hide(400);
        $('#filter-Button').html('<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-corner-right-up block mx-auto"><polyline points="10 9 15 4 20 9"></polyline><path d="M4 20h7a4 4 0 0 0 4-4V4"></path></svg>فیلتر');

        showFilterBoxVar=1;
        return;
    }if(showFilterBoxVar==1){
        $('#filterBox').hide(400);
        $('#box-data-loads').show(400);
        $('#filter-Button').html('<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-corner-right-down block mx-auto"><polyline points="10 15 15 20 20 15"></polyline><path d="M4 4h7a4 4 0 0 1 4 4v12"></path></svg>فیلتر');
        showFilterBoxVar=0;
        return;
    }

}
async function updateCitySourcelistLoad(token){
    let subId=$('#province-Source-listLoad :selected').val();
    const response = await fetch('https://carrier.sabas-co.ir/api//getCity/'+token+'/'+subId);

    console.log(response);
    if(response.ok){
        var dataAPI = await response.json();
        console.log(dataAPI);
        $('#alert-danger').hide(400);
        if(!dataAPI['status'].localeCompare('200')){
            let otions=""
            for (var i = 0; i<dataAPI['data'].length; i++){
                otions=otions+"<option value='"+dataAPI['data'][i].id.toString()+"'  >" +dataAPI['data'][i].name+ "</option>"
            }

            otions='<div id="input-group-email  "  class="input-group-text">شهر</div> <select id="City-Source-listLoad"   data-search="true" class="form-control tail-select m-1 w-full">'+otions+'</select> ';
            ;

            $('#div-City-Source-listLoad').html("");
            $('#div-City-Source-listLoad').html(otions);



        }else{
            $('#title-success-notification-content').html('خطای رخ داده است.');
            $('#success-notification-content-icon').html('<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x-circle text-theme-6 block mx-auto"><circle cx="12" cy="12" r="10"></circle><line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line></svg>');
            $('#descriptions-success-notification-content').html(dataAPI['description']);
            $("#success-notification-toggle").click();
            setTimeout(function () {
                $(".toast-close").click();
            },10000);

        }
    }else{
        $('#title-success-notification-content').html('خطای رخ داده است.');
        $('#success-notification-content-icon').html('<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x-circle text-theme-6 block mx-auto"><circle cx="12" cy="12" r="10"></circle><line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line></svg>');
        $('#descriptions-success-notification-content').html('ارتباط با سرور برقرار نشده.');
        $("#success-notification-toggle").click();
        setTimeout(function () {
            $(".toast-close").click();
        },10000);


    }

}
async  function updateCityDestinationlistLoad(token){
    let subId=$('#province-Destination-listLoad :selected').val();
    const response = await fetch('https://carrier.sabas-co.ir/api/getCity/'+token+'/'+subId);

    console.log(response);
    if(response.ok){
        var dataAPI = await response.json();
        console.log(dataAPI);
        $('#alert-danger').hide(400);
        if(!dataAPI['status'].localeCompare('200')){
            let otions=""
            for (var i = 0; i<dataAPI['data'].length; i++){
                otions=otions+"<option value='"+dataAPI['data'][i].id.toString()+"'  >" +dataAPI['data'][i].name+ "</option>"
            }

            otions='<div id="input-group-email" class="input-group-text">شهر</div> <select id="City-Destination-listLoad"  data-search="true" class="form-control tail-select m-1 w-full">'+otions+'</select> ';
            ;

            $('#div-City-Destination-listLoad').html("");
            $('#div-City-Destination-listLoad').html(otions);



        }else{
            $('#title-success-notification-content').html('خطای رخ داده است.');
            $('#success-notification-content-icon').html('<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x-circle text-theme-6 block mx-auto"><circle cx="12" cy="12" r="10"></circle><line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line></svg>');
            $('#descriptions-success-notification-content').html(dataAPI['description']);
            $("#success-notification-toggle").click();
            setTimeout(function () {
                $(".toast-close").click();
            },10000);

        }
    }else{
        $('#title-success-notification-content').html('خطای رخ داده است.');
        $('#success-notification-content-icon').html('<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x-circle text-theme-6 block mx-auto"><circle cx="12" cy="12" r="10"></circle><line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line></svg>');
        $('#descriptions-success-notification-content').html('ارتباط با سرور برقرار نشده.');
        $("#success-notification-toggle").click();
        setTimeout(function () {
            $(".toast-close").click();
        },10000);


    }


}




var app;
var marker;
var latG=32;
var lngG=52;
$(document).ready(function() {
    app = new Mapp({
        element: '#appSource',

        apiKey: 'eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6ImExNDk2Y2U0MDNkYTk4NzQwNmFlNzJmYWZkZjg1ZGIwNTgyMzQyN2ZiZjhmMDQ2YjEwYWQ0MmQxOGUwMDQ0YTFjOWU3NGVkOGQwNDJjNmJlIn0.eyJhdWQiOiIxNzMwOSIsImp0aSI6ImExNDk2Y2U0MDNkYTk4NzQwNmFlNzJmYWZkZjg1ZGIwNTgyMzQyN2ZiZjhmMDQ2YjEwYWQ0MmQxOGUwMDQ0YTFjOWU3NGVkOGQwNDJjNmJlIiwiaWF0IjoxNjQ2NjYxMzQ0LCJuYmYiOjE2NDY2NjEzNDQsImV4cCI6MTY0OTA3Njk0NCwic3ViIjoiIiwic2NvcGVzIjpbImJhc2ljIl19.XHokuybrfM-gfOWAAQeLzcIq8pX_A_rq5F6sONhLjCzEXhNt22nCoss3Ngtqp7M9dKx34m-ytbnUqkd3joAOgixHs29a4zXiqNzFeBEj8ZhwnjbHW6pdJjnKxMV8UQU2b_wnwjsc6g4y1b56mTS6_4_DiP7HFk4_jf9hIFYVgxlXuHQ8GsNX992yUZ15Tw0h7PmZrCZEjxti6KfBmWqreasGvTc2MEd_TZZbzbHgIladi1UgEu_Iod-G__D86xJqmzqjZbUlJdgcjtCZEO3MEixS9TxMx_wN_O7c5ykiXJRGAvVra9VhZ9DSZAoVbbUHUQSbSVDzdxb5LsBhlH3rog',
        presets: {
            latlng: {
                lat: latG,
                lng: lngG
            },
            zoom: 6
        },gestureHandling: true,
        gestureHandlingOptions: {
            duration: 1200,
            text: {
                touch: "نقشه را با دو انگشت حرکت دهید",
                scroll: "برای بزرگنمایی نقشه از ctrl + scroll  استفاده کنید",
                scrollMac: "برای بزرگنمایی نقشه از \u2318  + scroll  استفاده کنید"
            }
        }

    });
    app.addVectorLayers();



});

function setmap(lat1,lng1,lat2,lng2){
    app.drawRoute({
        start: [lat1, lng1],
        end: [lat2,lng2],
        mode: 'car',
        draggable: true,
        fit: true,
    });
}

