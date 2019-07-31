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


class CountryController extends Controller
{
    public function actionAdd(){
        try{
            $data = Yii::$app->request->post();
            $countryName = $data['country'];
            $country = new Country();
            $country->country_name = $countryName;
            $country->save();
            return $countryName . ' added sucessfully!';
        } catch(IntegrityException $e) {
            return $e->getMessage();
        }
    }

    
    public function actionDelete(){
        try{
            $data = Yii::$app->request->post();
            $countryId = $data['id'];
            $country = Country::findOne($countryId);
            $countryName = $country->country_name;
            $country->delete();
            return $countryName . ' removed sucessfully!';
        } catch(IntegrityException $e) {
            return $e->getMessage();
        }
    }


    public function actionGet(){
        try{
            $countries = Country::find()->all();
            return $this->render('countryView', compact('countries'));
        } catch(IntegrityException $e) {
            return $e->getMessage();
        }
        
    }


    public function actionUpdate(){
        try{
            $data = Yii::$app->request->post();
            $countryId = $data['id'];
            $country = Country::findOne($countryId);
            $countryOldName = $country->country_name;
            $countryNewName = $data['newName'];
            $country->country_name = $countryNewName;
            $country->save();
            return $countryOldName . ' changed to ' . $countryNewName;
        } catch(IntegrityException $e) {
            return $e->getMessage();
        }
    }

}
