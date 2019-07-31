<?php

namespace app\controllers;

require '../vendor/autoload.php';

use Yii;
use yii\web\Controller;
use yii\web\Response;
use yii\helpers\ArrayHelper;
use app\models\Direction;
use app\models\Country;
use app\models\City;
use GuzzleHttp\Client;


class FlyController extends Controller
{
    public function actionGet($data){
        if ($data === 'all'){
            $dirs = Direction::find()->all();
            $cities = City::find()->all();

            $dataArray = [
                'dirs' => $dirs,
                'cities' => $cities
            ];
            return $this->render('flyView', compact('dataArray'));
        } else {
            $json = json_decode($data, true);
            $cities = City::find()->all();

            $dataArray = [
                'dirs' => $json,
                'cities' => $cities
            ];
            return $this->render('flyView', compact('dataArray'));
        }
        
    }


    public function actionSearch(){
        try{
            $data = Yii::$app->request->post();
            $city = $data['city'];
            $dataArray = Direction::find()->where(['city' => $city])->all();
            $array = ArrayHelper::toArray($dataArray);
            $json = json_encode($array);
            return $json;
        } catch(IntegrityException $e) {
            return $e->getMessage();
        } 
    }
   

    public function actionRetrieve(){
        try{
            $cities = City::find()->all();
            $countries = Country::find()->all();
            $dataArray = [
                'cityData' => $cities,
                'countryData' => $countries
            ];
            return $this->render('directionView', compact('dataArray'));
        } catch(IntegrityException $e) {
            return $e->getMessage();
        } 
    }


    public function actionCreate(){
        try{
            $data = Yii::$app->request->post();
            $city = $data['city'];
            $country = $data['country'];

            $duplicate = Direction::find()->where(['country' => $country, 'city' => $city])->all();
            $array = ArrayHelper::toArray($duplicate);
            //print_r($array);
            if (empty($array)){
                $dir = new Direction();
                $dir->city = $city;
                $dir->country = $country;
                $dir->save();
                $message = 'Direction from ' . $city . ' to ' . $country . ' created.';
                return $message;
            }
            $message = 'Such direction already exists';
            return $message;

            
        } catch(IntegrityException $e) {
            return $e->getMessage();
        }
    }


    public function actionDelete(){
        try{
            $data = Yii::$app->request->post();
            $id = $data['id'];
            $dir = Direction::findOne($id);
            $city = $dir->city;
            $country = $dir->country;
            $dir->delete();
            $message = "Flight from " . $city . ' to ' . $country . ' removed.';
            return $message;
        } catch(IntegrityException $e) {
            return $e->getMessage();
        }
    }
}