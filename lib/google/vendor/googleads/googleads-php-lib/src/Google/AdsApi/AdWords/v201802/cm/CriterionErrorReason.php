<?php

namespace Google\AdsApi\AdWords\v201802\cm;


/**
 * This file was generated from WSDL. DO NOT EDIT.
 */
class CriterionErrorReason
{
    const CONCRETE_TYPE_REQUIRED = 'CONCRETE_TYPE_REQUIRED';
    const INVALID_EXCLUDED_CATEGORY = 'INVALID_EXCLUDED_CATEGORY';
    const INVALID_KEYWORD_TEXT = 'INVALID_KEYWORD_TEXT';
    const KEYWORD_TEXT_TOO_LONG = 'KEYWORD_TEXT_TOO_LONG';
    const KEYWORD_HAS_TOO_MANY_WORDS = 'KEYWORD_HAS_TOO_MANY_WORDS';
    const KEYWORD_HAS_INVALID_CHARS = 'KEYWORD_HAS_INVALID_CHARS';
    const INVALID_PLACEMENT_URL = 'INVALID_PLACEMENT_URL';
    const INVALID_USER_LIST = 'INVALID_USER_LIST';
    const INVALID_USER_INTEREST = 'INVALID_USER_INTEREST';
    const INVALID_FORMAT_FOR_PLACEMENT_URL = 'INVALID_FORMAT_FOR_PLACEMENT_URL';
    const PLACEMENT_URL_IS_TOO_LONG = 'PLACEMENT_URL_IS_TOO_LONG';
    const PLACEMENT_URL_HAS_ILLEGAL_CHAR = 'PLACEMENT_URL_HAS_ILLEGAL_CHAR';
    const PLACEMENT_URL_HAS_MULTIPLE_SITES_IN_LINE = 'PLACEMENT_URL_HAS_MULTIPLE_SITES_IN_LINE';
    const PLACEMENT_IS_NOT_AVAILABLE_FOR_TARGETING_OR_EXCLUSION = 'PLACEMENT_IS_NOT_AVAILABLE_FOR_TARGETING_OR_EXCLUSION';
    const INVALID_VERTICAL_PATH = 'INVALID_VERTICAL_PATH';
    const YOUTUBE_VERTICAL_CHANNEL_DEPRECATED = 'YOUTUBE_VERTICAL_CHANNEL_DEPRECATED';
    const YOUTUBE_DEMOGRAPHIC_CHANNEL_DEPRECATED = 'YOUTUBE_DEMOGRAPHIC_CHANNEL_DEPRECATED';
    const YOUTUBE_URL_UNSUPPORTED = 'YOUTUBE_URL_UNSUPPORTED';
    const CANNOT_EXCLUDE_CRITERIA_TYPE = 'CANNOT_EXCLUDE_CRITERIA_TYPE';
    const CANNOT_ADD_CRITERIA_TYPE = 'CANNOT_ADD_CRITERIA_TYPE';
    const INVALID_PRODUCT_FILTER = 'INVALID_PRODUCT_FILTER';
    const PRODUCT_FILTER_TOO_LONG = 'PRODUCT_FILTER_TOO_LONG';
    const CANNOT_EXCLUDE_SIMILAR_USER_LIST = 'CANNOT_EXCLUDE_SIMILAR_USER_LIST';
    const CANNOT_ADD_CLOSED_USER_LIST = 'CANNOT_ADD_CLOSED_USER_LIST';
    const CANNOT_ADD_DISPLAY_ONLY_LISTS_TO_SEARCH_ONLY_CAMPAIGNS = 'CANNOT_ADD_DISPLAY_ONLY_LISTS_TO_SEARCH_ONLY_CAMPAIGNS';
    const CANNOT_ADD_DISPLAY_ONLY_LISTS_TO_SEARCH_CAMPAIGNS = 'CANNOT_ADD_DISPLAY_ONLY_LISTS_TO_SEARCH_CAMPAIGNS';
    const CANNOT_ADD_DISPLAY_ONLY_LISTS_TO_SHOPPING_CAMPAIGNS = 'CANNOT_ADD_DISPLAY_ONLY_LISTS_TO_SHOPPING_CAMPAIGNS';
    const CANNOT_ADD_USER_INTERESTS_TO_SEARCH_CAMPAIGNS = 'CANNOT_ADD_USER_INTERESTS_TO_SEARCH_CAMPAIGNS';
    const CANNOT_SET_BIDS_ON_CRITERION_TYPE_IN_SEARCH_CAMPAIGNS = 'CANNOT_SET_BIDS_ON_CRITERION_TYPE_IN_SEARCH_CAMPAIGNS';
    const CANNOT_ADD_URLS_TO_CRITERION_TYPE_FOR_CAMPAIGN_TYPE = 'CANNOT_ADD_URLS_TO_CRITERION_TYPE_FOR_CAMPAIGN_TYPE';
    const INVALID_IP_ADDRESS = 'INVALID_IP_ADDRESS';
    const INVALID_IP_FORMAT = 'INVALID_IP_FORMAT';
    const INVALID_MOBILE_APP = 'INVALID_MOBILE_APP';
    const INVALID_MOBILE_APP_CATEGORY = 'INVALID_MOBILE_APP_CATEGORY';
    const INVALID_CRITERION_ID = 'INVALID_CRITERION_ID';
    const CANNOT_TARGET_CRITERION = 'CANNOT_TARGET_CRITERION';
    const CANNOT_TARGET_OBSOLETE_CRITERION = 'CANNOT_TARGET_OBSOLETE_CRITERION';
    const CRITERION_ID_AND_TYPE_MISMATCH = 'CRITERION_ID_AND_TYPE_MISMATCH';
    const INVALID_PROXIMITY_RADIUS = 'INVALID_PROXIMITY_RADIUS';
    const INVALID_PROXIMITY_RADIUS_UNITS = 'INVALID_PROXIMITY_RADIUS_UNITS';
    const INVALID_STREETADDRESS_LENGTH = 'INVALID_STREETADDRESS_LENGTH';
    const INVALID_CITYNAME_LENGTH = 'INVALID_CITYNAME_LENGTH';
    const INVALID_REGIONCODE_LENGTH = 'INVALID_REGIONCODE_LENGTH';
    const INVALID_REGIONNAME_LENGTH = 'INVALID_REGIONNAME_LENGTH';
    const INVALID_POSTALCODE_LENGTH = 'INVALID_POSTALCODE_LENGTH';
    const INVALID_COUNTRY_CODE = 'INVALID_COUNTRY_CODE';
    const INVALID_LATITUDE = 'INVALID_LATITUDE';
    const INVALID_LONGITUDE = 'INVALID_LONGITUDE';
    const PROXIMITY_GEOPOINT_AND_ADDRESS_BOTH_CANNOT_BE_NULL = 'PROXIMITY_GEOPOINT_AND_ADDRESS_BOTH_CANNOT_BE_NULL';
    const INVALID_PROXIMITY_ADDRESS = 'INVALID_PROXIMITY_ADDRESS';
    const INVALID_USER_DOMAIN_NAME = 'INVALID_USER_DOMAIN_NAME';
    const CRITERION_PARAMETER_TOO_LONG = 'CRITERION_PARAMETER_TOO_LONG';
    const AD_SCHEDULE_TIME_INTERVALS_OVERLAP = 'AD_SCHEDULE_TIME_INTERVALS_OVERLAP';
    const AD_SCHEDULE_INTERVAL_CANNOT_SPAN_MULTIPLE_DAYS = 'AD_SCHEDULE_INTERVAL_CANNOT_SPAN_MULTIPLE_DAYS';
    const AD_SCHEDULE_INVALID_TIME_INTERVAL = 'AD_SCHEDULE_INVALID_TIME_INTERVAL';
    const AD_SCHEDULE_EXCEEDED_INTERVALS_PER_DAY_LIMIT = 'AD_SCHEDULE_EXCEEDED_INTERVALS_PER_DAY_LIMIT';
    const AD_SCHEDULE_CRITERION_ID_MISMATCHING_FIELDS = 'AD_SCHEDULE_CRITERION_ID_MISMATCHING_FIELDS';
    const CANNOT_BID_MODIFY_CRITERION_TYPE = 'CANNOT_BID_MODIFY_CRITERION_TYPE';
    const CANNOT_BID_MODIFY_CRITERION_CAMPAIGN_OPTED_OUT = 'CANNOT_BID_MODIFY_CRITERION_CAMPAIGN_OPTED_OUT';
    const CANNOT_BID_MODIFY_NEGATIVE_CRITERION = 'CANNOT_BID_MODIFY_NEGATIVE_CRITERION';
    const BID_MODIFIER_ALREADY_EXISTS = 'BID_MODIFIER_ALREADY_EXISTS';
    const FEED_ID_NOT_ALLOWED = 'FEED_ID_NOT_ALLOWED';
    const ACCOUNT_INELIGIBLE_FOR_CRITERIA_TYPE = 'ACCOUNT_INELIGIBLE_FOR_CRITERIA_TYPE';
    const CRITERIA_TYPE_INVALID_FOR_BIDDING_STRATEGY = 'CRITERIA_TYPE_INVALID_FOR_BIDDING_STRATEGY';
    const CANNOT_EXCLUDE_CRITERION = 'CANNOT_EXCLUDE_CRITERION';
    const CANNOT_REMOVE_CRITERION = 'CANNOT_REMOVE_CRITERION';
    const PRODUCT_SCOPE_TOO_LONG = 'PRODUCT_SCOPE_TOO_LONG';
    const PRODUCT_SCOPE_TOO_MANY_DIMENSIONS = 'PRODUCT_SCOPE_TOO_MANY_DIMENSIONS';
    const PRODUCT_PARTITION_TOO_LONG = 'PRODUCT_PARTITION_TOO_LONG';
    const PRODUCT_PARTITION_TOO_MANY_DIMENSIONS = 'PRODUCT_PARTITION_TOO_MANY_DIMENSIONS';
    const INVALID_PRODUCT_DIMENSION = 'INVALID_PRODUCT_DIMENSION';
    const INVALID_PRODUCT_DIMENSION_TYPE = 'INVALID_PRODUCT_DIMENSION_TYPE';
    const INVALID_PRODUCT_BIDDING_CATEGORY = 'INVALID_PRODUCT_BIDDING_CATEGORY';
    const MISSING_SHOPPING_SETTING = 'MISSING_SHOPPING_SETTING';
    const INVALID_MATCHING_FUNCTION = 'INVALID_MATCHING_FUNCTION';
    const LOCATION_FILTER_NOT_ALLOWED = 'LOCATION_FILTER_NOT_ALLOWED';
    const LOCATION_FILTER_INVALID = 'LOCATION_FILTER_INVALID';
    const CANNOT_ATTACH_CRITERIA_AT_CAMPAIGN_AND_ADGROUP = 'CANNOT_ATTACH_CRITERIA_AT_CAMPAIGN_AND_ADGROUP';
    const UNKNOWN = 'UNKNOWN';


}
