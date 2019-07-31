window.onload = function(){

    $(document).ready(function(){
        $('#findP1').click(function(){
            getRequest();
        });
        $('#findP2').click(function(){
            postRequest();
        });
    });
}

function getRequest(){
    var dt = {
        'departCity': $('#departCity option:selected').val(),
        'country': $('#country option:selected').val(),
        'date': $('#date').val(),
        'nights': $('#nights').val(),
    };

    $.ajax({
        url: "/tour/json",
        method: "get",
        data: dt,
        success: function(res){
            alert('sucess')
            redirectGetRequest(res);
        }
    });
}

function postRequest(){
    var dt = {
        'cityId': $('#departCity option:selected').val(),
        'countryId': $('#country option:selected').val(),
        'dateFrom': $('#date').val(),
        'nights': $('#nights').val(),
    };

    $.ajax({
        url: "/tour/xml",
        method: "post",
        data: dt,
        success: function(res){
            alert('sucess')
            redirectPostRequest(res);
        }
    });
}

function redirectPostRequest(data){
    $('#postData').val(data);
    $('#redirectPostForm').submit();
}

function redirectGetRequest(data){
    $('#getData').val(data);
    $('#redirectGetForm').submit();
}