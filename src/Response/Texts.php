<?php

namespace Marlemiesz\GptSdk\Response;

use DateTime;

class Texts extends Response
{

    private DateTime $createdDate;
    private string $model;
    private string $id;

    /**
     * @param array $items
     * @param int $created
     * @param string $model
     * @param string $id
     */
    public function __construct(array $items, int $created, string $model, string $id)
    {
        parent::__construct($items);

        $this->createdDate = (new DateTime())->setTimestamp($created);
        $this->model = $model;
        $this->id = $id;
    }

    /**
     * @return DateTime
     */
    public function getCreatedDate(): DateTime
    {
        return $this->createdDate;
    }

    /**
     * @return string
     */
    public function getModel(): string
    {
        return $this->model;
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    public function validate(): bool
    {
        foreach($this->items as $item) {
            if(!$item instanceof \Marlemiesz\GptSdk\Entity\Text && !$item instanceof \Marlemiesz\GptSdk\Entity\Chat) {
                throw new \Exception('All posts must be instance of Marlemiesz\GptSdk\Entity\Text');
            }
        }
        return true;
    }



}
