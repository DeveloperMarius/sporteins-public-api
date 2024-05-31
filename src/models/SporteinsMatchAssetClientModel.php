<?php

namespace developermarius\sporteins\publicapi\models;

use utils\DataClass;

/**
 * @method SporteinsMatchAssetClientModelType getType()
 * @method SporteinsMatchPeriodType getPeriod()
 * @method string getContentId()
 */
class SporteinsMatchAssetClientModel extends DataClass{

    protected SporteinsMatchAssetClientModelType $type;
    protected SporteinsMatchPeriodType $period;
    protected string $content_id;

    public function __construct(array $data){
        $this->setProperties($data, array(
            'type' => SporteinsMatchAssetClientModelType::class,
            'period' => SporteinsMatchPeriodType::class
        ), array(
            'contentId' => 'content_id'
        ));
    }
}