<?php

namespace App\Validator;

class DateValidator
{
    /**
     * @var array
     */
    private $error = [];


    /**
     * @param \DateTime $date
     * @return bool
     */
    public function isDateValid(\DateTime $date): bool
    {
        return $this->validateCurrentDate($date);
    }

    /**
     * @param \DateTime $date
     * @return bool
     */
    private function validateCurrentDate(\DateTime $date): bool
    {
        $today = new \DateTime();
        if ($today > $date) {
            $this->setErrorMessage('Įvesta praeities data:' . $date->format('Y-m-d'));
            return false;
        }

        return true;
    }


    /**
     * @return array
     */
    public function getErrors(): array
    {
        return $this->error;
    }

    /**
     * @param $errorMessage
     */
    public function setErrorMessage($errorMessage): void
    {
        $this->error[] = $errorMessage;
    }
}
