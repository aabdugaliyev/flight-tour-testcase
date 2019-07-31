<?php

namespace app\controllers;

require '../vendor/autoload.php';

use Yii;
use yii\web\Controller;
use yii\web\Response;
use app\models\Direction;
use GuzzleHttp\Client;
use app\models\Country;
use app\models\City;


class TourController extends Controller
{
    public function actionFind(){
        try{
            $cities = City::find()->all();
            $countries = Country::find()->all();
            $dataArray = [
                'cityData' => $cities,
                'countryData' => $countries
            ];
            return $this->render('find', compact('dataArray'));
        } catch(IntegrityException $e) {
            return $e->getMessage();
        } 
    }


    public function actionShowx(){
        $req = Yii::$app->request->post();
        $data = $req['data'];
        return $this->render('xmlPartner', compact('data'));
        exit;
    }

    public function actionShowj(){
        $req = Yii::$app->request->get();
        $data = $req['data'];
        return $this->render('jsonPartner', compact('data'));
        exit;
    }


    public function actionJson(){
        $data = Yii::$app->request->get();
        $uriString = 'searchPartner1?departCity='. $data['departCity'] . '&country=' . $data['country'] . 
        '&date=' . $data['date'] . '&nights=' . $data['nights'];
        
        $client = new Client([
            'base_uri' => 'https://ht.kz/test/',
            'timeout' => 2.0
        ]);
        $response = $client->request('GET', $uriString);
        $body = $response->getBody();
        
        $json = json_encode(json_decode($body));
        $json = str_replace("&", "%26", $json);
        return $json;
        exit;
    }

    
    public function actionXml(){
        $data = Yii::$app->request->post();
        $city = $data['cityId'];
        $country = $data['countryId'];
        $date = $data['dateFrom'];
        $nights = $data['nights'];
        $client = new Client();

        try {
            $response = $client->request('POST', 'https://ht.kz/test/searchPartner2', [
                'form_params' => [
                    'cityId' => $city,
                    'countryId' => $country,
                    'dateFrom' => $date,
                    'nights' => $nights,
                ]
            ]);
        } catch (RequestException $e) {
            var_dump($e->getResponse()->getBody()->getContent());
        }
        $stream = $response->getBody();
        $contents = $stream->getContents();

        return $contents;
        exit;
    }
}

/*
                    'cityId' => $city,
                    'countryId' => $country,
                    'dateFrom' => $date,
                    'nights' => $nights,

                    https://ht.kz/test/searchPartner2
                    */