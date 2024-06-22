<?php


namespace model\Abstract;

abstract class AbstractMapping
{

    public function __construct(array $array)
    {
        $this->hydrate($array);    
    }
    
    protected function hydrate (array $array) : void
    {
        foreach ($array as $key => $val) {

            $tab        = explode("_", $key);
            $toUpper    = array_map("ucfirst", $tab);
            $camelName  = implode($toUpper);
            $finalName  = "set".$camelName;

            if (method_exists($this, $finalName)) {
                $this->$finalName($val);
            }
        }
    }

}