<?php
include_once ("../../functions/config.php");
?>
<link rel="stylesheet" href="../../assestPanel/dist/css/persian-datepicker.min.css"/>
<!-- END: Modal Header -->
<!-- BEGIN: Modal Body -->
<div class="modal-body col-span-12" id="body-modal">

    <div class="p-5">
        <div class="flex flex-col-reverse xl:flex-row flex-col">
            <div class="flex-1 mt-6 xl:mt-0">
                <div class="grid grid-cols-12 gap-x-5">
                    <div class="col-span-12 xl:col-span-12 mt-3">
                        <div>
                            <label for="descreptions" class="form-label">توضیحات <span class="text-theme-6">*</span></label>
                            <input id="descreptions" type="text" class="form-control" placeholder="" value="" >
                        </div>

                    </div>






                    <div class="col-span-12 xl:col-span-12 mt-3">
                        <div class="alert alert-danger  mb-2" id="alert-danger-add" role="alert">ddd</div>
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
                        <div class="alert alert-success  mb-2"  id="alert-success-add" >با موفقیت وارد شدید تا چند لحظه دیگر به پنل کاربری وارد خواهید شد</div>

                    </div>

                </div>

                <button onclick="addRetrun(<?php echo $_REQUEST['id']?>)"   type="button" class="btn   btn-primary w-20 mt-3"> ذخیره </button>
            </div>

        </div>
    </div>



</div>


<!-- END: Modal Body -->
<!-- BEGIN: Modal Footer -->
<div class="modal-footer text-right">
    <button type="button" data-dismiss="modal" class="btn btn-outline-secondary w-20 ml-1">لغو</button>


</div>
<script src=".../../assestPanel/dist/js/jquery-3.6.0.min.js"></script>

<?php
include_once ("../../include/app_js.php");
?>
<script src="../../assestPanel/dist/js/num2persian-min.js"></script>
<script src="../../assestPanel/dist/js/persian-datepicker.min.js"></script>
<script src="../../assestPanel/dist/js/custome.js"></script>
<script >
    $(".exapl1").pDatepicker({
        format: 'YYYY/MM/DD',
        calendarType: 'persian',
        initialValue: true,
        initialValueType: 'persian'


    });


</script>
