<?php
//session_start();
//namespace Google\AdsApi\Examples\AdWords\v201710\Optimization;

require 'vendor/autoload.php';
ini_set('display_errors', true);
error_reporting(E_ALL);
use Google\AdsApi\AdWords\AdWordsServices;
use Google\AdsApi\AdWords\AdWordsSession;
use Google\AdsApi\AdWords\AdWordsSessionBuilder;
use Google\AdsApi\AdWords\v201806\cm\Language;
use Google\AdsApi\AdWords\v201806\cm\NetworkSetting;
use Google\AdsApi\AdWords\v201806\cm\Paging;
use Google\AdsApi\AdWords\v201806\o\AttributeType;
use Google\AdsApi\AdWords\v201806\o\IdeaType;
use Google\AdsApi\AdWords\v201806\o\LanguageSearchParameter;
use Google\AdsApi\AdWords\v201806\o\LocationSearchParameter;
use Google\AdsApi\AdWords\v201806\o\NetworkSearchParameter;
use Google\AdsApi\AdWords\v201806\o\RelatedToQuerySearchParameter;
use Google\AdsApi\AdWords\v201806\o\RequestType;
//use Google\AdsApi\AdWords\v201710\o\SeedAdGroupIdSearchParameter;
use Google\AdsApi\AdWords\v201806\o\TargetingIdeaSelector;
use Google\AdsApi\AdWords\v201806\o\TargetingIdeaService;
use Google\AdsApi\Common\OAuth2TokenBuilder;
use Google\AdsApi\Common\Util\MapEntries;
use Google\AdsApi\AdWords\v201806\cm\Location;
use Google\AdsApi\AdWords\v201806\o\IdeaTextFilterSearchParameter;
use Google\AdsApi\AdWords\v201806\o\MoneyAttribute;


class GetKeywordIdeas
{

    // If you do not want to use an existing ad group to seed your request, you
    // can set this to null.
    const AD_GROUP_ID = null;
    public static $page_limit = 500; //количество результатов в одном запросе
    public static $error = array(); //массив для ошибок
    public static $offset = 0; //стартовая страница пагинации
    public static $total_limit = 700; //сколько записей нужно выбрать всего (по умолчанию 700 - это ограничение самого Adwords)
    private static $pagingType = array(
        700 => 700,
        1000 => 400,
        1200 => 300,
        1600 => 200,
        2800 => 100,
    );

    public static function runExample(AdWordsServices $adWordsServices, AdWordsSession $session, $adGroupId)
    {
        $result_keyword = array();
        $result_keyword['count_data'] = 0;
        $pagingLimit = 500;
        $totalNumEntries = 0;
        $requestType = 'IDEAS';
        //[$USER_ID][$PROJECT_ID]
        $USER_ID = $_SESSION['user_id'];
        $PROJECT_ID = intval(trim(strip_tags($_GET['id'])));
        $DATA = $_SESSION['user_'.$USER_ID]['project_'.$PROJECT_ID];
        $keyword_to_exluded = array();

        $monthNames = array(
            1 => 'янв',
            2 => 'фев',
            3 => 'мар',
            4 => 'апр',
            5 => 'май',
            6 => 'июн',
            7 => 'июл',
            8 => 'авг',
            9 => 'сен',
            10 => 'окт',
            11 => 'ноя',
            12 => 'дек',
        );
        /* Подготовим данные для гугла
            конкретно нужно очистить минус слова от лишних символов (- и () )
         */

        $DATA['excluded'] = preg_replace('/[-()]*/','',$DATA['excluded']);

        ///////////////////////////////////////
        $targetingIdeaService = $adWordsServices->get($session, TargetingIdeaService::class);

        // Create selector.


        if(isset($DATA['keywords_type']) && !empty($DATA['keywords_type'])) {
            $requestType = trim(strip_tags($DATA['keywords_type']));
        }

        $selector = new TargetingIdeaSelector();
        $selector->setRequestType($requestType);
        $selector->setIdeaType(IdeaType::KEYWORD);
        $selector->setRequestedAttributeTypes([
            AttributeType::KEYWORD_TEXT,
            AttributeType::SEARCH_VOLUME,
            AttributeType::AVERAGE_CPC,
            AttributeType::COMPETITION,
            AttributeType::TARGETED_MONTHLY_SEARCHES,
        ]);

       /* $paging = new Paging();
        $paging->setStartIndex(0);
        $paging->setNumberResults(10);
        $selector->setPaging($paging);*/

        $searchParameters = [];
        // Create related to query search parameter.

        /*Создаем набор ключевых слов по которым будем составлять деи*/
        $relatedToQuerySearchParameter = new RelatedToQuerySearchParameter();
        /*получаем данные от клиента*/
        $user_keywords = $DATA['keywords'];
        if (isset($user_keywords)) {
            $keyword_to_search = explode("\n", $user_keywords);
            foreach ($keyword_to_search as $id =>$kw_search) {
                if (empty($kw_search)) {
                    unset($keyword_to_search[$id]);
                }
                //(string)$kw_search;
            }
        }

        //$str = implode(',',$keyword_to_search);
        //echo $str;
        $relatedToQuerySearchParameter->setQueries($keyword_to_search);
        $searchParameters[] = $relatedToQuerySearchParameter;

        /*Создаем набор минус слов и включенных слов*/
        if(!empty($DATA['included']) || !empty($DATA['excluded'])) {
            $queryParams = new IdeaTextFilterSearchParameter();
            /*Минус слова*/
            if(!empty($DATA['excluded'])) {
                $user_excluded = $DATA['excluded'];
                if (isset($user_excluded)) {
                    $keyword_to_exluded = explode("\n", $user_excluded);
                    $keyword_to_exluded = array_map('trim',$keyword_to_exluded);
                    foreach ($keyword_to_exluded as $id => $kw_ex) {
                        if (empty($kw_ex)) {
                            unset($keyword_to_exluded[$id]);
                        }
                    }
                }

                if(count($keyword_to_exluded) >= 198) {
                    $part_excluded = array_chunk($keyword_to_exluded,199);
                    $queryParams->setExcluded($part_excluded[0]);
                } else {
                    $queryParams->setExcluded($keyword_to_exluded);
                }

            }

            /*Включенные слова*/
            if(!empty($DATA['included'])) {
                $user_included = $DATA['included'];
                if (isset($user_included)) {
                    $keyword_to_included = explode("\n", $user_included);
                    foreach ($keyword_to_included as $id => $kw_inc) {
                        if (empty($kw_inc)) {
                            unset($keyword_to_included[$id]);
                        }
                    }
                }
                //$str_included = implode(',',$keyword_to_included);
                $queryParams->setIncluded($keyword_to_included);
            }

            $searchParameters[] = $queryParams;

        }

        // Create language search parameter (optional).
        // The ID can be found in the documentation:
        // https://developers.google.com/adwords/api/docs/appendix/languagecodes
        $languageParameter = new LanguageSearchParameter();
        /*Указываем язык выборки*/
        $target_lang = (int)$DATA['target_lang'];
        if(empty($target_lang || !isset($target_lang))) {
            $target_lang = 1031;
        }
        $language = new Language();
        $language->setId($target_lang);
        $languageParameter->setLanguages([
            $language
        ]);
        $searchParameters[] = $languageParameter;

        // Create network search parameter (optional).
        $networkSetting = new NetworkSetting();
        $networkSetting->setTargetGoogleSearch(true);
        $networkSetting->setTargetSearchNetwork(false);
        $networkSetting->setTargetContentNetwork(false);
        $networkSetting->setTargetPartnerSearchNetwork(false);


        $networkSearchParameter = new NetworkSearchParameter();
        $networkSearchParameter->setNetworkSetting($networkSetting);
        $searchParameters[] = $networkSearchParameter;

        /*установка id региона в котором ищем*/
        $locationsSearchParameter = new LocationSearchParameter();
        /*Если города не  указали, ищем по всей стране*/
        if(empty($DATA['geo_criteria'])) {
            $country_criteria = $DATA['country_criteria'];
            $location = new Location();
            $location->setId((int)$country_criteria);
            $locationsSearchParameter->setLocations([
                $location
            ]);
        } else {
            /*если указаны города, ищем только по ним*/
            foreach ($DATA['geo_criteria'] as $geo_criterion) {
                $location = new Location();
                $location->setId((int)$geo_criterion);
                $locations[] = $location;
            }
            $locationsSearchParameter->setLocations($locations);
        }
        $searchParameters[] = $locationsSearchParameter;


        /*Установим валюту*/
        $currencyCode = $DATA['currency'];
        if(empty($currencyCode)) {
            $currencyCode = 'USD';
        }
        $selector->setCurrencyCode($currencyCode);

        /*Главный запрос на гугл апи*/
        $selector->setSearchParameters($searchParameters);
        $selector->setPaging(new Paging(self::$offset, self::$page_limit));

        /*указываем количество результатов*/
        /*if(isset($DATA['keywords_limit']) && $DATA['keywords_limit'] > 0) {
            $pagingLimit = self::$pagingType[$DATA['keywords_limit']];
        }*/

        /*do {*/
            if($page = $targetingIdeaService->get($selector)) {
                //echo __DIR__;
                //file_put_contents(__DIR__."/".$_SESSION['user_id'].date('H:i:s').'.txt',1);
                /*получение результатов*/
                $entries = $page->getEntries();
                if ($entries !== null) {
                    //$totalNumEntries += $page->getTotalNumEntries();
                    foreach ($entries as $targetingIdea) {
                        $data = MapEntries::toAssociativeArray($targetingIdea->getData());
                        $keyword = $data[AttributeType::KEYWORD_TEXT]->getValue();
                        $searchVolume =
                            ($data[AttributeType::SEARCH_VOLUME]->getValue() !== null)
                                ? $data[AttributeType::SEARCH_VOLUME]->getValue() : 0;
                        $averageCpc = $data[AttributeType::AVERAGE_CPC]->getValue();
                        $competition = $data[AttributeType::COMPETITION]->getValue();
                        $monthly = $data[AttributeType::TARGETED_MONTHLY_SEARCHES]->getValue();
                        if (!empty($monthly) && is_array($monthly)) {
                            $keyword_stats = array();
                            $keyword_stats_stock = array();
                            foreach ($monthly as $month_stats) {
                                $stats = new stdClass();
                                $stats->year = $month_stats->getYear();
                                $stats->month = $month_stats->getMonth();
                                $stats->count = $month_stats->getCount();
                                $keyword_stats[] = $stats;
                                $keyword_stats_stock['x'][] = $monthNames[$stats->month]. '.' . $stats->year;
                                $keyword_stats_stock['y'][] = $stats->count;
                            }
                            $keyword_stats_stock['x'] = array_reverse($keyword_stats_stock['x']);
                            $keyword_stats_stock['y'] = array_reverse($keyword_stats_stock['y']);
                        }

                        if( is_array($keyword_to_exluded) && !in_array($data[AttributeType::KEYWORD_TEXT]->getValue(),$keyword_to_exluded)) {
                            $keyword_obj = new  \stdClass();
                            $keyword_obj->keyword = $keyword;
                            $keyword_obj->search_volume = $searchVolume;
                            $keyword_obj->average_CPC = ($averageCpc === null) ? 0 : number_format($averageCpc->getMicroAmount()/1000000,'2');
                            $keyword_obj->competition = number_format($competition,'2');
                            $keyword_obj->year_stats = $keyword_stats;
                            $keyword_obj->year_stats_stock = $keyword_stats_stock;
                            $keyword_obj->source = 'google';
                            $keyword_obj->visible = 1;

                            $result_keyword['keywords'][$keyword] = $keyword_obj;
                            unset($keyword_obj);
                        } elseif(empty($keyword_to_exluded)) {
                            $keyword_obj = new  \stdClass();
                            $keyword_obj->keyword = $keyword;
                            $keyword_obj->search_volume = $searchVolume;
                            $keyword_obj->average_CPC = ($averageCpc === null) ? 0 : number_format($averageCpc->getMicroAmount()/1000000,'2');
                            $keyword_obj->competition = number_format($competition,'2');
                            $keyword_obj->year_stats = $keyword_stats;
                            $keyword_obj->year_stats_stock = $keyword_stats_stock;
                            $keyword_obj->source = 'google';
                            $keyword_obj->visible = 1;

                            $result_keyword['keywords'][$keyword] = $keyword_obj;
                            unset($keyword_obj);
                        }
                    }
                    //$result_keyword['count_data'] +=  $totalNumEntries;
                }
                if (empty($entries)) {
                    return false;
                }
                /*$paging = $selector->getPaging()->getStartIndex();
                $paging += $pagingLimit;
                $selector->getPaging()->setStartIndex($paging);*/
            } else {

                throw new Exception('превышение лимита');
            }
       /* } while ($page->gettotalNumEntries() > $selector->getPaging()->getStartIndex());*/


        return $result_keyword;
    }

    public static function main()
    {
        //file_put_contents(__DIR__."/".$_SESSION['user_id'].date('H:i:s').'main'.'.txt',1);
        $res = array();
        // Generate a refreshable OAuth2 credential for authentication.

        if(isset($_SESSION['miha_test'])) {
            $oAuth2Credential = (new OAuth2TokenBuilder())
                ->fromFile(__DIR__ . '/config/adsapi_php_new.ini')
                ->build();

            // Construct an API session configured from a properties file and the OAuth2
            // credentials above.
            $session = (new AdWordsSessionBuilder())
                ->fromFile(__DIR__ . '/config/adsapi_php_new.ini')
                ->withOAuth2Credential($oAuth2Credential)
                ->build();

        } else {
            $oAuth2Credential = (new OAuth2TokenBuilder())
                ->fromFile(__DIR__ . '/config/adsapi_php.ini')
                ->build();

            // Construct an API session configured from a properties file and the OAuth2
            // credentials above.
            $session = (new AdWordsSessionBuilder())
                ->fromFile(__DIR__ . '/config/adsapi_php.ini')
                ->withOAuth2Credential($oAuth2Credential)
                ->build();

        }





        $res = self::runExample(new AdWordsServices(), $session, self::AD_GROUP_ID);
        /*try {

        }
        catch (Exception $e) {
            echo 'code_error:'.$e->getCode();
        }*/

        return $res;
    }
}