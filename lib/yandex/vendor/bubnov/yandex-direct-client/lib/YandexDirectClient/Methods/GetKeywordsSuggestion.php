<?php
namespace YandexDirectClient\Methods;

/*
 * GetKeywordsSuggestion method
 * @link https://tech.yandex.ru/direct/doc/dg-v4/reference/GetKeywordsSuggestion-docpage/
 */
class GetKeywordsSuggestion extends AbstractMethod
{
    /**
     * {@inheritdoc}
     */
    protected $methodName = "GetKeywordsSuggestion";

    protected static $schema = '{
        "$schema": "http://json-schema.org/draft-04/schema#",
        "keywords": "/",
        "type": "object"
    }';

    /**
     * {@inheritdoc}
     */
    public function isValid() {
        $this->validateSchema();
    }
}
