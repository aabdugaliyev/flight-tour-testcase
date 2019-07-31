window.onload = function(){

    $(document).ready(function(){
        $('#directionCreate').click(function(){
            city = $('#selectCity>option:selected').text();
            country = $('#selectCountry>option:selected').text();
            createDirection(city, country);
        });
        $('#directionSearch').click(function(){
            city = $('#selectFlySearch>option:selected').text();
            searchFlies(city);
        });
        $('#createFly').click(function(){
            window.location.replace('/fly/retrieve')
        });
    });
}

function hideDiv(data){
    $(data).hide();
}

function createDirection(city, country){
    var dt = {
        'city': city,
        'country': country,
        '_csrf': yii.getCsrfToken(),
    };

    $.ajax({
        url: "/fly/create",
        method: "post",
        data: dt,
        success: function(res){
            alert(res);
            window.location.replace('/fly/get?data=all');
        }
    });
}

function deleteDirection(id){
    var dt = {
        'id': id,
        '_csrf': yii.getCsrfToken(),
    }

    $.ajax({
        url: "/fly/delete",
        method: "post",
        data: dt,
        success: function(res){
            alert(res);
            window.location.replace('/fly/get?data=all');
        }
    });
}



function searchFlies(city){
    var dt = {
        'city': city,
        '_csrf': yii.getCsrfToken(),
    };

    $.ajax({
        url: "/fly/search",
        method: "post",
        data: dt,
        success: function(res){
            alert(res);
            window.location.replace('/fly/get?data='+res);
        }
    });
}