<?php
/**
 * Copyright 2017 Google Inc. All Rights Reserved.
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *     http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */
//namespace Google\AdsApi\Examples\AdWords\v201710\Targeting;

require 'vendor/autoload.php';

use Google\AdsApi\AdWords\AdWordsServices;
use Google\AdsApi\AdWords\AdWordsSession;
use Google\AdsApi\AdWords\AdWordsSessionBuilder;
use Google\AdsApi\AdWords\v201710\cm\ConstantDataService;
use Google\AdsApi\Common\OAuth2TokenBuilder;

/**
 * This example gets all language and carrier criteria available for targeting.
 */
class GetTargetableLanguagesAndCarriers {

    const PAGE_LIMIT = 500;

    public static function runExample(AdWordsServices $adWordsServices,
                                      AdWordsSession $session) {
        $constantDataService =
            $adWordsServices->get($session, ConstantDataService::class);

        // Retrieve language criteria.
        $languages = $constantDataService->getLanguageCriterion();
        $all_lang = [];
        foreach ($languages as $language) {
            $lang =  new stdClass();
            $lang->name = $language->getName();
            $lang->id = $language->getId();
            $all_lang[] = $lang;
        }
        file_put_contents(__DIR__ . '/config/lang.json',json_encode($all_lang));
        //print_r($all_lang);
    }

    public static function main() {
        // Generate a refreshable OAuth2 credential for authentication.
        $oAuth2Credential = (new OAuth2TokenBuilder())
            ->fromFile(__DIR__ . '/config/adsapi_php.ini')
            ->build();

        // Construct an API session configured from a properties file and the OAuth2
        // credentials above.
        $session = (new AdWordsSessionBuilder())
            ->fromFile(__DIR__ . '/config/adsapi_php.ini')
            ->withOAuth2Credential($oAuth2Credential)
            ->build();
        self::runExample(new AdWordsServices(), $session);
    }
}

GetTargetableLanguagesAndCarriers::main();
