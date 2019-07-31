<?php

namespace app\controllers;

require '../vendor/autoload.php';

use Yii;
use yii\web\Controller;
use yii\web\Response;
use app\models\Direction;
use app\models\Country;
use app\models\City;
use GuzzleHttp\Client;


class CityController extends Controller
{
    public function actionAdd(){
        try{
            $data = Yii::$app->request->post();
            $cityName = $data['city'];
            $city = new City();
            $city->city_name = $cityName;
            $city->save();
            return $cityName . ' added sucessfully!';
        } catch(IntegrityException $e) {
            return $e->getMessage();
        }
    }

    
    public function actionDelete(){
        try{
            $data = Yii::$app->request->post();
            $cityId = $data['id'];
            $city = City::findOne($cityId);
            $cityName = $city->city_name;
            $city->delete();
            return $cityName . ' removed sucessfully!';
        } catch(IntegrityException $e) {
            return $e->getMessage();
        }
    }


    public function actionGet(){
        try{
            $cities = City::find()->all();
            return $this->render('cityView', compact('cities'));
        } catch(IntegrityException $e) {
            return $e->getMessage();
        } 
    }


    public function actionUpdate(){
        try{
            $data = Yii::$app->request->post();
            $cityId = $data['id'];
            $city = City::findOne($cityId);
            $cityOldName = $city->city_name;
            $cityNewName = $data['newName'];
            $city->city_name = $cityNewName;
            $city->save();
            return $cityOldName . ' changed to ' . $cityNewName;
        } catch(IntegrityException $e) {
            return $e->getMessage();
        }
    }
}
