<?php

namespace model\Mapping;

use model\Abstract\AbstractMapping;
use model\Trait\TraitTestString;

class DevlogMapping extends AbstractMapping
{
    use TraitTestString;

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

    public function setDevLog(?string $dev_log) : bool {
        if (is_string($this->verifyString($dev_log))) {
            echo $this->verifyString($dev_log);
            return false;
        }else {
            $this->dev_log = $dev_log;
            return true;
        }
    }


    public function getDevVisible() : ?string {
        return $this->dev_visible;
    }

    public function setDevVisible(?string $dev_visible) : void {
        $this->dev_visible = $dev_visible;
    }
}