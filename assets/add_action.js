$(window).load(function(){
    $('.io_confirm_my_location').html('<div class="io_location_button"><a class="io_confirm iolabel" onclick="io_getLocation()">'
     +'<i class="fa fa-map-marker"></i> ตรวจสอบตำแหน่ง</a></div>' 
     +'<div id="io-spinner" class="spinner"><div class="loading-object"><div class="cp-spinner cp-hue"></div> <span class="iolabel"></span></div></div>');
});

function io_getLocation() {
    $('#io-spinner').show();
    $('.iolabel').html('Getting GPS data please wait.');
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(io_showPosition);
    } else {
        $('.iolabel').html('&#10008; System can not detect GPS on this device.');
    }
}

function io_showPosition(position) {
    $("input[value=latitude_io]").val(position.coords.latitude);
    $("input[value=longitude_io]").val(position.coords.longitude);
    $("input[name=latitude_io]").val(position.coords.latitude);
    $("input[name=longitude_io]").val(position.coords.longitude);
    $("#latitude_io").val(position.coords.latitude);
    $("#longitude_io").val(position.coords.longitude);
    $('.iolabel').html('&#10004; Successfully to get GPS data.');
    $('#io-spinner').fadeOut(300).delay(500);
}