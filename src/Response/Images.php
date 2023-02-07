<?php

namespace Marlemiesz\GptSdk\Response;

use DateTime;

class Images extends Response
{
    
    private DateTime $createdDate;
    
    public function __construct(array $items, int $create)
    {
        parent::__construct($items);
        
        $this->createdDate = (new DateTime())->setTimestamp($create);
    }
    
    public function validate(): bool
    {
        foreach($this->items as $item) {
            if(!$item instanceof \Marlemiesz\GptSdk\Entity\Image) {
                throw new \Exception('All posts must be instance of Marlemiesz\GptSdk\Entity\Image');
            }
        }
        return true;
    }
    
    /**
     * @return DateTime
     */
    public function getCreatedDate(): DateTime
    {
        return $this->createdDate;
    }
    
    
}
