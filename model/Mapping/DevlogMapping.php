<?php

namespace model\Mapping;

use model\Abstract\AbstractMapping;

class DevlogMapping extends AbstractMapping
{

    protected ?int $dev_id;
    protected ?string $dev_date;
    protected ?string $dev_log;
    protected ?int $dev_visible;

    public function getDevId() : ?int {
        return $this->dev_id;
    }

    public function setDevId(?int $dev_id) : void {
        $this->dev_id = $dev_id;
    }

}