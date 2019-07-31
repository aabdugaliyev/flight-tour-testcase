<?php 
use yii\helpers\ArrayHelper;
use app\assets\FlyAsset;
FlyAsset::register($this);

ArrayHelper::toArray($dataArray);
echo '<pre>';
//print_r($dataArray);
?>


<div id="flyDiv">
    <button id="createFly">Options</button>

    <select name="city" id="selectFlySearch">
        <?php foreach($dataArray['cities'] as $key => $value):?>
            <option value="<?php echo $value['city_id']?>"><?php echo $value['city_name']?></option>
        <?php endforeach?>
    </select>

    <button id="directionSearch">Search</button>

    <?php foreach($dataArray['dirs'] as $key => $value):?>

    <div id="flyElement">

        <?php echo 'From ' . $value['city'] . ' to '. $value['country'];?>
        <button id="directionDelete" onclick="deleteDirection(<?php echo $value['id']?>)">Delete</button>
        
    </div>
    <?php endforeach?>

</div>