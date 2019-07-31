window.onload = function(){

    $(document).ready(function(){
        
        $('#addCountryDiv').hide();
        $('#countryPlus').click(function(){
            $('#addCountryDiv').show();    
        });

        $('#countryAdd').click(function(){
            addClick();
        });
    });
}

function addClick(){
    var countryName = $('#countryNew').val();
    //alert(countryName)

    var dt = {
        'country': countryName,
        '_csrf': yii.getCsrfToken()
    }

    $.ajax({
        url: "/country/add",
        method: "post",
        data: dt,
        success: function(res){
            alert(res)
            window.location.replace("/country/get");
        }
    });
}

function deleteClick(id){
    var dt = {
        'id': id,
        '_csrf': yii.getCsrfToken()
    }

    $.ajax({
        url: "/country/delete",
        method: "post",
        data: dt,
        success: function(res){
            alert(res)
            window.location.replace("/country/get");
        }
    });
}

function enableTitle(id){
    $('#countryTitle' + id).prop('disabled', false);
}


function saveTitle(id){
    var newName = $('#countryTitle' + id).val();
    var dt = {
        'id': id,
        'newName': newName,
        '_csrf': yii.getCsrfToken()
    }

    $.ajax({
        url: "/country/update",
        method: "post",
        data: dt,
        success: function(res){
            alert(res)
            window.location.replace("/country/get");
        }
    });
}

