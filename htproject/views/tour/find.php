<?php 
use app\assets\AppAsset;
AppAsset::register($this);

use yii\helpers\ArrayHelper;
ArrayHelper::toArray($dataArray);
?>
<div>
        <select name="city" id="departCity">
            <?php foreach($dataArray['cityData'] as $key => $value):?>
                <option value="<?php echo $value['city_id']?>"><?php echo $value['city_name']?></option>
            <?php endforeach?>
        </select>
        
        <select name="country" id="country">
            <?php foreach($dataArray['countryData'] as $key => $value):?>
                <option value="<?php echo $value['country_id']?>"><?php echo $value['country_name']?></option>
            <?php endforeach?>
        </select>

    <input id="date" name="date" type="date"> 
    <input id="nights" name="nights" type="text"> 
    <button id="findP1" type="submit">Partner1</button>
    <button id="findP2" type="submit">Partner2</button>
</div>


<form id="redirectPostForm" action="/tour/showx" method="post" >
    <input type="hidden" name="_csrf" value="<?php Yii::$app->request->getCsrfToken()?>">
    <input id="postData" name="data" type="hidden">
</form>

<form id="redirectGetForm" action="/tour/showj" method="get" >
    <input type="hidden" name="_csrf" value="<?php Yii::$app->request->getCsrfToken()?>">
    <input id="getData" name="data" type="hidden">
</form>
