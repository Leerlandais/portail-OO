<?php
// LES SETTERS NE SONT PAS NECESSAIRE ICI CAR IL NE SONT JAMAIS UTILSER
// CAR TOUT EST SUR LE DB ET PAS LOCALE
// JE LES INCLUS QUAND MÊME POUR LA REPETITION ET AFIN DE TESTER MES TRAITS

namespace model\Mapping;

use model\Abstract\AbstractMapping;
use model\Trait\TraitTestString;
use model\Trait\TraitTestInt;

class DevlogMapping extends AbstractMapping
{
    use TraitTestString;
    use TraitTestInt;

    protected ?int $dev_id;
    protected ?string $dev_date;   // CE DB ETAIT CREEE IL Y A DES MOIS ET JE N'AVAIS PAS PENSE D'UTILISER DATETIME (JE LE CHANGERAI BIENTOT)
    protected ?string $dev_log;
    protected ?int $dev_visible;

    public function getDevId() : ?int {
        return $this->dev_id;
    }

    public function setDevId(?int $dev_id) : void {
        // AFIN D'UTILISER LE MÊME TRAIT POUR TOUT INT TESTE, IL ATTENDS UN VALEUR MIN ET MAX (DEFAULT TO 0 ET L'INFINI)
        if (is_string($this->verifyInt($dev_id, 0))){
            echo $this->verifyInt($dev_id, 0);
        }
        $this->dev_id = $dev_id;
    }


    public function getDevDate() : ?string {
        return $this->dev_date;
    }

    public function setDevDate(?string $dev_date) : void {
        // TESTE L'ENTREE EN UTILISANT UN TRAIT
        if (is_string($this->verifyString($dev_date))) {
            echo $this->verifyString($dev_date);
        }
            $this->dev_date = $dev_date;
        }


    public function getDevLog() : ?string {
        return $this->dev_log;
    }

    public function setDevLog(?string $dev_log) : void {
        if (is_string($this->verifyString($dev_log))) {
            echo $this->verifyString($dev_log);
        }
            $this->dev_log = $dev_log;
    }


    public function getDevVisible() : ?int {
        return $this->dev_visible;
    }

    public function setDevVisible(?int $dev_visible) : void {
        if (is_string($this->verifyInt($dev_visible, 0, 1))){
            echo $this->verifyInt($dev_visible, 0, 1);
        }
        $this->dev_visible = $dev_visible;
    }
}