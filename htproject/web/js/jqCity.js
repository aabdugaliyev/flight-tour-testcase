window.onload = function(){

    $(document).ready(function(){
        $('#addDiv').hide();
        $('#citySave').hide();
        $('#cityPlus').click(function(){
            $('#addDiv').show();    
        });

        $('#cityAdd').click(function(){
            addClick();
        });
    });
}

function addClick(){
    var cityName = $('#cityNew').val();
    alert(cityName)

    var dt = {
        'city': cityName,
        '_csrf': yii.getCsrfToken()
    }

    $.ajax({
        url: "/city/add",
        method: "post",
        data: dt,
        success: function(res){
            alert(res)
            window.location.replace("/city/get");
        }
    });
}

function deleteClick(id){
    var dt = {
        'id': id,
        '_csrf': yii.getCsrfToken()
    }

    $.ajax({
        url: "/city/delete",
        method: "post",
        data: dt,
        success: function(res){
            alert(res)
            window.location.replace("/city/get");
        }
    });
}

function enableTitle(id){
    $('#cityTitle' + id).prop('disabled', false);
    $('#citySave').show();
}


function saveTitle(id){
    var newName = $('#cityTitle' + id).val();
    var dt = {
        'id': id,
        'newName': newName,
        '_csrf': yii.getCsrfToken()
    }

    $.ajax({
        url: "/city/update",
        method: "post",
        data: dt,
        success: function(res){
            alert(res)
            window.location.replace("/city/get");
        }
    });
}
