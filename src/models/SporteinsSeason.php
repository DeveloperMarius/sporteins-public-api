<?php

namespace developermarius\sporteins\publicapi\models;

use utils\DataClass;

/**
 * @method string getId()
 * @method string getName()
 * @method string|null getYear()
 * @method string|null getStartDate()
 * @method string|null getEndDate()
 */
class SporteinsSeason extends DataClass{

    protected string $id;
    /** Format: YYYY/YY */
    protected string $name;
    /** Format: YY/YY */
    protected ?string $year = null;
    /** Format: YYYY-MM-DD */
    protected ?string $start_date = null;
    /** Format: YYYY-MM-DD */
    protected ?string $end_date = null;

    public function __construct(array $data){
        $this->setProperties($data, array(), array(
            'startDate' => 'start_date',
            'endDate' => 'end_date'
        ));
    }
}