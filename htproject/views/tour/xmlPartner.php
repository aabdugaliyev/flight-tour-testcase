<?php 
echo "<pre>";
use Yii;
use yii\helpers\ArrayHelper;

$array = $data;
$xml = simplexml_load_string($array);

echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";
?>

<div id="showInputData">
    <?php foreach($xml->tours as $xmlItem):?>
        <?php foreach($xmlItem as $hotel):?>
            <div id="hotelElement">
                <?php echo $hotel->hotel . ' costs ' . $hotel->tourPrice . $hotel->currency . '<br>'?>
            </div>
        <?php endforeach?>
    <?php endforeach?>
</div>