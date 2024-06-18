import './bootstrap';
import { Fancybox } from "@fancyapps/ui";

import $ from 'jquery';
import 'bootstrap'
import 'slick-carousel';
import 'datatables.net';
import 'datatables.net-responsive';
import Cropper from 'cropperjs';
Fancybox.bind("[data-fancybox]", {

  });


$(function() {
//     $('.slider').slick({
//         slidesToShow: 4,
//         slidesToScroll: 1,
//         autoplay: true,
//         autoplaySpeed: 2000,
//         dots: true,
//     });

$('form').on('submit', function(e) {
    var submitButton = $(this).find(':submit');
    if (submitButton.prop('disabled')) {
        e.preventDefault();
    } else {
        submitButton.prop('disabled', true);
        $('.spinner-border').removeClass('d-none');
    }
});

var studentSlots =$("#studentSlot").val();

// console.log(studentSlots,"studentSlots")
    var student_table =$('#student').DataTable({
        "processing": true,
        "serverSide": false,
        "responsive":true,
        "ajax": {
            "url": "/api/student-details/"+studentSlots,
            "type": "GET",
            "dataType": "json",
            "dataSrc": function(json) {

                if (json.data === null) {
                    return []; // Return an empty array
                } else {

                    return json.data;
                }
            }
        },
        "columns": [
            { "data": "id" },
            { "data": "name" },
            { "data": "email" },
            { "data": "gender" },
            { "data": "state" },
            { "data": "address" },
            { "data": "timeslot" },
            { "data": "seat_no" },
        ]
    });
    $("#studentSlot").on('change',function(e){
        studentSlots =$("#studentSlot").val();
        student_table.ajax.url("/api/student-details/"+studentSlots).load()

    })
    $('.dt-layout-row').addClass('container');
    $('.dt-layout-row').addClass('p-0');
    $("#student").on('click','tbody tr', function (e) {
        e.preventDefault()
        if($(this).hasClass('selected')){
            $(this).removeClass('selected')
            $("#editstudentbtnid").removeAttr('data-bs-toggle', 'modal').removeAttr('data-bs-target','#exampleModal');
        }else if(student_table.row(this).data() !=null||student_table.row(this).data() !=undefined) {

            $("#student tbody tr").removeClass('selected')
            $("#studentModalLabel").text('Update student details');
            $(this).addClass('selected');
            $('#editstudentbtnid').attr('data-bs-toggle', 'modal').attr('data-bs-target', '#exampleModal');
            $("#student_id").val(student_table.row(this).data().id)
            $("#name").val(student_table.row(this).data().name);
            $("#email").val(student_table.row(this).data().email);
            $("#timeslot").val(student_table.row(this).data().timeslot);
            $("#state").val(student_table.row(this).data().state);
            $("#age").val(student_table.row(this).data().age);
            $("#address").val(student_table.row(this).data().address);
            $("#gender").val(student_table.row(this).data().gender);
            $("#joindate").val(student_table.row(this).data().joindate);

        }else{
            alert('No record found')
        }
    });
    $("#addstudentbtnid").on('click',function(){
        $("#studentform")[0].reset();
        ("#student_id").val();
        $("#studentModalLabel").text('Add student details');
    })
    $("#editstudentbtnid").on('click',function(e){
        if ((!$("#student tbody tr").hasClass('selected'))){
            alert('Please Select a row first to edit')
            $("#studentModalLabel").text('Update student details');
        }

    })
    $("#savestudent").on('click',function(e){
        $('.spinner-border').removeClass('d-none')
        $(this).prop('disabled',true)

        $.ajax({
            url: "/api/save-student",
            type: 'POST',
            data:  $('#studentform').serializeArray(),
            dataType: 'JSON',

            success:function(response)
            {
                $('.spinner-border').addClass('d-none')
                $("#savestudent").removeAttr('disabled')
                $("#studentform")[0].reset();
                $('.btn-close').trigger('click');
                student_table.ajax.reload();
                alert(response.success)
            },
            error: function(response) {
                var response = JSON.parse(response.responseText);
               $.each(response.errors,function(key,val){
                    $("."+key).text(val)
               })
            }
        });
    })
     $("#delete_student").on('click',function(e){
            var id =$("#student_id").val();
            if ($("#student  tbody tr").hasClass('selected')) {
                if(confirm('Are you Sure want to delete student')){
                    $.ajax({
                        url: "/api/delete-student",
                        type: 'POST',
                        data:  {id},
                        dataType: 'JSON',

                        success:function(response)
                        {
                            $("#studentform")[0].reset();
                            $('.btn-close').trigger('click');
                            student_table.ajax.reload();
                            alert(response.success)
                        },
                        error: function(response) {
                            var response = JSON.parse(response.responseText);
                           $.each(response.errors,function(key,val){
                                $("."+key).text(val)
                           })
                        }
                    });
                }

            }else {
                alert('Please select a row to delete');
            }


    })


    // Conact Us Js
    $("#contact-us").on('click',function(e){
        $(this).prop('disabled',true)
        $('.spinner-border').removeClass('d-none');

        if($("#name").val()==""){
            $('.name').text('Please Enter Your Name')
            return false
        }else{
            $('.name').text('')

        }
        if($("#usernumber").val()==""){
            $('.usernumber').text('Please Enter Your Phone Number')
            return false
        }else{
            $('.usernumber').text('')

        }
        if($("#email").val()==""){
            $('.email').text('Please Enter Your Email')
            return false
        }else{
            $('.email').text('')

        }
        if($("#message").val()==""){
            $('.message').text('Please Enter Your Message')
            return false
        }else{
            $('.message').text('')

        }

        $.ajax({
            url: "/api/save-contact-us",
            type: 'POST',
            data:  $('#contactform').serializeArray(),
            dataType: 'JSON',
            success:function(response)
            {
                $("#contact-us").removeAttr('disabled')
                $('.spinner-border').addClass('d-none');
                $("#contactform")[0].reset();
                $(".success").text(response.success)
                $('.alert-success').removeClass('d-none')
            },
            error: function(response) {
                var response = JSON.parse(response.responseText);
               $.each(response.errors,function(key,val){
                    $("."+key).text(val)
               })
            }
        });

    })

    // setting services
    var settings_service =$('#settings-service').DataTable({
        "processing": true,
        "serverSide": false,
        "responsive":true,
        "ajax": {
            "url": "/api/settings-service",
            "type": "GET",
            "dataType": "json",
        },
        "columns": [
            { "data": "id" },
            { "data": "title" },
            { "data": "description" },
            { "data": "image_path" },
        ]
    });

        let cropper;
        $('#file').on('change', function(event) {
            const input = event.target;
            if (input.files && input.files[0]) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    $('#image').attr('src', e.target.result);
                    if (cropper) {
                        cropper.destroy();
                    }
                    const image = document.getElementById('image');
                    cropper = new Cropper(image, {
                        aspectRatio: 16 / 9,
                        viewMode: 1,
                        autoCrop: true,
                        crop: function(event) {
                            $(".cropimage").removeClass('d-none')
                            $(".full-image-crop").removeClass('d-none');
                            const canvas = cropper.getCroppedCanvas({
                                width: 200,
                                height: 150
                            });
                            $('#croppedImage').attr('src', canvas.toDataURL('image/png'));
                            $('#image_file').val(canvas.toDataURL('image/png'));

                        }
                    });
                };
                reader.readAsDataURL(input.files[0]);
            }
        });
        $("#saveSettingServiceBtnId").on('click',function(e){
            e.preventDefault();

            $(this).prop('disabled',true)
            $('.spinner-border').removeClass('d-none');

            if($("#title").val()==""){
                $('.title').text('Please Enter Your title')
                return false
            }else{
                $('.title').text('')

            }
            if($("#description").val()==""){
                $('.description').text('Please Enter description')
                return false
            }else{
                $('.description').text('')

            }
            $("#service_id").val()
            if($("#file")[0].files.length === 0 && $("#service_id").val() <= 0){
                $('.file').text('Please upload file')
                return false
            }else{
                $('.file').text('')
            }
            var formData = new FormData($('#settingsServiceForm')[0]);
            $.ajax({
                url: "/api/save-settings-service",
                type: 'POST',
                data: formData,
                contentType: false, // Don't set contentType
                processData: false,
                success:function(response)
                {
                    settings_service.ajax.reload()
                    $('.spinner-border').addClass('d-none');
                    $("#saveSettingServiceBtnId").removeAttr('disabled');
                    $("#settingsServiceForm")[0].reset();
                    $(".success").text(response.message)
                    $('.alert-success').removeClass('d-none')
                    $('.close-btn').trigger('click');
                },
                error: function(response) {
                    var response = JSON.parse(response.responseText);
                   $.each(response.errors,function(key,val){
                        $("."+key).text(val)
                   })
                }
            });

    })



$("#settings-service").on('click','tbody tr',function(e){
    if($(this).hasClass('selected')){
        $(this).removeClass('selected')
        $("#editSettingServiceBtnId").removeAttr('data-bs-toggle', 'modal').removeAttr('data-bs-target','#exampleModal');
    }else{
        if(settings_service.row(this).data() !=null||settings_service.row(this).data() !=undefined) {
            $("#settings-service tbody tr").removeClass('selected')
            $(this).addClass('selected')
            $("#editSettingServiceBtnId").attr('data-bs-toggle', 'modal').attr('data-bs-target', '#exampleModal');
            $("#title").val(settings_service.row(this).data().title);
            $("#description").val(settings_service.row(this).data().description);
            $("#service_id").val(settings_service.row(this).data().id);
            var source =settings_service.row(this).data().image_path;

            if(source!="") {
                $("#croppedImage").attr("src",source);
                $('#image').attr('src', source);
                if (cropper) {
                    cropper.destroy();
                }
                cropper = new Cropper(image, {
                    aspectRatio: 16 / 9,
                    viewMode: 1,
                    autoCrop: true,
                    crop: function(event) {
                        $(".cropimage").removeClass('d-none')
                        const canvas = cropper.getCroppedCanvas({
                            width: 200,
                            height: 150
                        });
                        $('#croppedImage').attr('src', canvas.toDataURL('image/png'));
                        $('#image_file').val(canvas.toDataURL('image/png'));
                    }
                });
            }
            $(".cropimage").removeClass('d-none');
        }else{
            alert('No record found')
        }


    }
})

$("#addSettingServiceBtnId").on('click',function(e){
    $("#settingsServiceForm")[0].reset();
    $(".cropimage").addClass('d-none');
    $(".full-image-crop").addClass('d-none');
    $("#settingsServiceForm input[type='hidden']").val('');
})
$("#editSettingServiceBtnId").on('click',function(e){

    $(".cropimage").removeClass('d-none');
    $(".full-image-crop").removeClass('d-none');


    if ((!$("#settings-service tbody tr").hasClass('selected'))){
        alert('Please Select a row first to edit')
    }
})

$("#deleteSettingServiceBtnId").on('click',function(e){
    if (!$("#settings-service tbody tr").hasClass('selected')){
        alert('Please Select a row first to delete')
    }else{
        if(confirm('Are you Sure want to delete')) {
            var id =$("#service_id").val();
            $.ajax({
                url:"/api/del-setting-service",
                type:"post",
                data:{id:id},
                dataType:'json',
                success:function(response){
                    settings_service.ajax.reload()
                    $("#settingsServiceForm")[0].reset();
                    $(".success").text(response.message)
                    $('.alert-success').removeClass('d-none')

                },
                error:function(error){
                    var err = JSON.parse(error.responseText);
                    $.each(err.errors,function(key,val){
                         $("."+key).text(val)
                    })
                }
               })
        }
    }

})
});





