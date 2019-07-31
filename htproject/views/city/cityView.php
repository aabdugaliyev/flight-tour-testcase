<?php
use app\assets\CityAsset;
use yii\helpers\ArrayHelper;

CityAsset::register($this);
echo '<pre>';
$cityArr = ArrayHelper::toArray($cities);

?>


<div id="cityDiv">
    <button id="cityPlus">+</button>
    <div id="addDiv">
        <input id="cityNew" type="text">
        <button id="cityAdd">Add city</button>
        
    </div>
    
    <?php foreach($cityArr as $key => $value): ?>
    <?php $cid = $value['city_id']; $cname = $value['city_name']; ?>
        <h3> 
            <div id="titleDiv">
                <input id="cityTitle<?php echo $cid; ?>" 
                type="text" disabled="true" value="<?php echo $cname; ?>">
                <button id="citySave" onclick="saveTitle(<?php echo $cid; ?>)">save</button>
            </div>
            
            <button id="cityEdit>" onclick="enableTitle(<?php echo $cid; ?>)" >Edit</button>
            <button id="cityDelete>" onclick="deleteClick(<?php echo $cid ?>)">Delete</button>
        </h3>
    <?php endforeach?>
</div>