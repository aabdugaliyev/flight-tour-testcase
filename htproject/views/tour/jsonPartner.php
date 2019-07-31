<?php 
echo "<pre>";
use Yii;


$str = $data;
$json = json_decode(str_replace("%26", "&", $str), true);
//print_r($json);
?>



<div id="showInputData">
    <?php foreach($json['tours'] as $key => $value): ?>
        <div id="hotelElement">
            <?php echo $value['hotelName'] . ' costs ' . $value['price'] . $value['currency'] . '<br>'?>
        </div>
    <?php endforeach ?>
</div>
    
        
