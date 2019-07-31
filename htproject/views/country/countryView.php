<?php
use yii\helpers\ArrayHelper;
use app\assets\CountryAsset;
echo '<pre>';
$countryArr = ArrayHelper::toArray($countries);
CountryAsset::register($this);

?>


<div id="countryDiv">
    <button id="countryPlus" onclick="">+</button>
    <div id="addCountryDiv">
        <input id="countryNew" type="text">
        <button id="countryAdd">Add Country</button>
        
    </div>
</div>   

<?php foreach($countryArr as $key => $value): ?>
<?php $cid = $value['country_id']; $cname = $value['country_name']; ?>
    
    <div id="countryElemet"> 
        <div id="titleDiv">
            <input id="countryTitle<?php echo $cid; ?>" 
            type="text" disabled="true" value="<?php echo $cname; ?>">
            <button id="countrySave" onclick="saveTitle(<?php echo $cid; ?>)">save</button>
            <button id="countryEdit>" onclick="enableTitle(<?php echo $cid; ?>)" >Edit</button>
            <button id="countryDelete>" onclick="deleteClick(<?php echo $cid ?>)">Delete</button>
        </div>         
    <?php endforeach?>
    </div>  
