<?php 
use yii\helpers\ArrayHelper;
use app\assets\FlyAsset;
FlyAsset::register($this);
ArrayHelper::toArray($dataArray);

?>


<div id="directionDiv">
    <div id="createDirDiv">
    
        <select name="city" id="selectCity">
            <?php foreach($dataArray['cityData'] as $key => $value):?>
                <option value="<?php $value['city_id'] ?>"><?php echo $value['city_name']?></option>
            <?php endforeach?>
        </select>

        <select name="country" id="selectCountry">
            <?php foreach($dataArray['countryData'] as $key => $value):?>
                <option value="<?php $value['country_id'] ?>"><?php echo $value['country_name']?></option>
            <?php endforeach?>
        </select>

        <button id="directionCreate">Create</button>
    </div>
</div>