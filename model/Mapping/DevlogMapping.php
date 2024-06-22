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


    public function getDevDate() : ?string {
        return $this->dev_date;
    }

    public function setDevDate(?string $dev_date) : void {
        $this->dev_date = $dev_date;
    }


    public function getDevLog() : ?string {
        return $this->dev_log;
    }

    public function setDevLog(?string $dev_log) : void {
        $this->dev_log = $dev_log;
    }


    public function getDevVisible() : ?string {
        return $this->dev_visible;
    }

    public function setDevVisible(?string $dev_visible) : void {
        $this->dev_visible = $dev_visible;
    }
}