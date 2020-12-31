<?php
//session_start();
ini_set('display_errors',true);
error_reporting(E_ALL);
/*
 * Example of usage yandex-direct-client lib.
 * @author Bubnov Mihail <bubnov.mihail@gmail.com>.
 */

/*
 * Use composer autoloader
 */
require 'vendor/autoload.php';

//file_put_contents(__DIR__.'/yandex.txt','test');

class getYandexData
{
    static private $authKey = 'AQAAAAAi8pzxAAS_8zj75C1O3kFct55MLp-CsQA';
    static private $results = array();
    const LIMIT = 800;

    static private $accounts = array(
        1 => array(
            'login' => 'penguin-team.develop.acc.1',
            'token' => 'AQAAAAAi8pzxAAS_8_gZi9UJJkiXuADhLVLg6Dk',
            'limit' => self::LIMIT
        ),
        2 => array(
            'login' => 'penguin-team.develop.acc.2',
            'token' => 'AQAAAAAi8p5xAAS_-LRWLajRL0YFkUtlcQWhVpc',
            'limit' => self::LIMIT
        ),
        3 => array(
            'login' => 'penguin-team.develop.acc.3',
            'token' => 'AQAAAAAi8qAhAAS_-bcY9YGK4EPhhF_RsuzLG2c',
            'limit' => self::LIMIT
        ),
        4 => array(
            'login' => 'penguin-team.develop.acc.4',
            'token' => 'AQAAAAAi8qHaAAS_-mDd9GLuOEORq4GdxCViWCQ',
            'limit' => self::LIMIT
        ),
        5 => array(
            'login' => 'penguin-team.develop.acc.5',
            'token' => 'AQAAAAAi8qNhAAS__O_pugYrfErzjoGjqRuTe4A',
            'limit' => self::LIMIT
        ),
        6 => array(
            'login' => 'penguin-team.develop.acc.6',
            'token' => 'AQAAAAAi8qStAAS__R0pJxlKoUMhnKUAMsy8vmg',
            'limit' => self::LIMIT
        ),
        7 => array(
            'login' => 'penguin-team.develop.acc.7',
            'token' => 'AQAAAAAi8qXDAAS__1QUoKhphkAtnUqS9jBPb7k',
            'limit' => self::LIMIT
        ),
    );

    static public function GetKeywords($account_index = 0)
    {
        $USER_ID = $_SESSION['user_id'];
        $PROJECT_ID = intval(trim(strip_tags($_GET['id'])));

        switch ($_SESSION['user_'.$USER_ID]['project_'.$PROJECT_ID]['target_lang']) {
            case '1036':
                $locale = 'ua';
                break;
            case '1031':
                $locale = 'ru';
                break;
            default:
                $locale = 'en';
                break;
        }

        //использовать для указания нового лимита для каждого аккаунта
        //file_put_contents(__DIR__.'/limits.json',json_encode(self::$accounts));
        try {
            $client = new YandexDirectClient\Client(self::$accounts[$account_index]['token'],$locale,'test');

            /**
             * Getting Units for users
             */
            $response = $client->GetClientsUnits([self::$accounts[$account_index]['login']]);

           /* foreach($response as $item){
                echo "\n" . $item->getLogin() . " has units: " . $item->getUnitsRest();
                print_r($item);
            }*/


            $user_keywords = $_SESSION['user_'.$USER_ID]['project_'.$PROJECT_ID]['keywords'];
            if (isset($user_keywords)) {
                $keyword_to_search = explode("\n", $user_keywords);
                foreach ($keyword_to_search as $id => $kw_search) {
                    if (empty($kw_search)) {
                        unset($keyword_to_search[$id]);
                    }
                }
            }
            $keywords_pack = array_map('trim',$keyword_to_search);
            $keywords_count = count($keyword_to_search);
            /*Если ключевых слов больше чем 10, нарезаем массив по 10 слов в каждом пакете*/
            if($keywords_count > 7) {
                $keywords_pack = array_chunk($keyword_to_search,7);
            }


            if(is_array($keywords_pack)) {
                $reportsID = array();

                $geo_id = array_unique($_SESSION['user_'.$USER_ID]['project_'.$PROJECT_ID]['yandex_geo']);
                //print_r($geo_id);
                //print_r($_SESSION['yandex_geo']);
                /* Если ключевых слов больше чем 10, то запросы обрабатываем пакетно, по 5 отчетов за раз */
                if($keywords_count > 7) {
                    foreach ($keywords_pack as $id => $keywords) {
                        $reportsID = array();
                        $reportsID[] = $client->CreateNewWordstatReport([
                            'Phrases' => $keywords,
                            'GeoID' => $_SESSION['user_'.$USER_ID]['project_'.$PROJECT_ID]['yandex_geo']
                        ]);
                        sleep(5);
                        self::KeywordsRequest($reportsID,$client);
                    }
                } else {
                    /* В противном случае будет всего один запрос */
                    $reportsID[] = $client->CreateNewWordstatReport([
                        'Phrases' => $keywords_pack,
                        'GeoID' => $_SESSION['user_'.$USER_ID]['project_'.$PROJECT_ID]['yandex_geo']
                    ]);
                    sleep(5);
                    self::KeywordsRequest($reportsID,$client);
                }
            }
        }
        catch (\YandexDirectClient\Exceptions\YandexErrorException $e){
            //echo "\nGot YandexErrorException: " . $e->getMessage() . ", code: " . $e->getCode() . "\nWith details: " . $e->getErrorDetail() . "\n";
            //print_r($e);

            /*Код ошибки при превышении лимита для аккаунта*/
            if($e->getCode() == '56') {

            }


        }
        catch (\Exception $e){
            //echo "\nGot Exception: " . $e->getMessage().'----'. $e->getCode() . "\n";
           // echo "\nGot YandexErrorException: " . $e->getMessage() . ", code: " . $e->getCode() . "\nWith details: " . $e->getLine().  "\n";

        }


        return self::$results;
    }

    static private function KeywordsRequest(array $reportsID,$client)
    {

        $USER_ID = $_SESSION['user_id'];
        $PROJECT_ID = intval(trim(strip_tags($_GET['id'])));

        /*минус слова, чистим руками выдачу от яндекса*/
        $keyword_to_exluded = explode("\n", $_SESSION['user_'.$USER_ID]['project_'.$PROJECT_ID]['excluded']);
        foreach ($keyword_to_exluded as $id => $kw_ex) {
            if (empty($kw_ex)) {
                unset($keyword_to_exluded[$id]);
            }
        }

        /*Получаем список всех отчетов на сервере*/
        $reports = $client->GetWordstatReportList();

        $done_reports = array();

        foreach($reports as $report){
            /*сохраняем себе только те отчеты, которые были созданы нашим запросом и уже были созданы на сервере*/
            if(in_array($report->getReportID(),$reportsID)  && $report->getStatusReport() === 'Done'){
                $done_reports[] = $report->getReportID();
            }
        }


        /*проходим циклом по всем готовым отчетам*/
        foreach ($done_reports as $done_report) {
            $report = $client->GetWordstatReport($done_report);
            /*получаем отчет и начинаем вытягивать с него ключевые слова*/
            foreach($report as $reportPart){
                /*Идеи ключевых слов по тем, что ввел пользователь*/
                /*слова, которые пользователи также искали (фича яндекса)*/
                //file_put_contents(__DIR__.'/yandex.txt',print_r($reportPart,true),FILE_APPEND);
                if($reportPart->getSearchedAlso() !== null) {
                    foreach($reportPart->getSearchedAlso() as $searchedAlso) {
                        $resObject = new stdClass();
                        if(!in_array($searchedAlso->getPhrase(),$keyword_to_exluded)) {
                            $resObject->keyword = str_replace('+', '', $searchedAlso->getPhrase());
                            $resObject->search_volume = $searchedAlso->getShows();
                            $resObject->source = 'yandex';
                            self::$results['searched_also'][] = $resObject;
                        }
                    }
                }

                foreach($reportPart->getSearchedWith() as $searchedWith) {
                    $resObject = new stdClass();
                    if(!in_array($searchedWith->getPhrase(),$keyword_to_exluded)) {
                        $resObject->keyword = str_replace('+','',$searchedWith->getPhrase());
                        $resObject->search_volume = $searchedWith->getShows();
                        $resObject->average_CPC = '0.00';
                        $resObject->competition = '0.00';
                        $resObject->year_stats = '0.00';
                        $resObject->year_stats_stock = array();
                        $resObject->source = 'yandex';
                        $resObject->visible = 1;
                        self::$results['keywords'][$searchedWith->getPhrase()] = $resObject;
                    }
                }

            }
            /*Удаляем отчет после работы с ним, что бы можно было получать больше слов*/
            $status = $client->DeleteWordstatReport($done_report);
        }
    }
}