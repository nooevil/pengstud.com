<?php
namespace YandexDirectClient\Methods;

/*
 * GetRegions method
 * @link https://tech.yandex.ru/direct/doc/dg-v4/reference/GetKeywordsSuggestion-docpage/
 */
class GetRegions extends AbstractMethod
{
    /**
     * {@inheritdoc}
     */
    protected $methodName = "GetRegions";

    protected static $schema = '{
        "$schema": "http://json-schema.org/draft-04/schema#",
        "data": "/",
        "type": "array"
    }';

    /**
     * {@inheritdoc}
     */
    public function isValid() {
        $this->validateSchema();
    }
}
