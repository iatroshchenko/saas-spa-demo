<?php


namespace App\DTO\Payment;


class Card
{
    public string $cardNumber;
    public string $cardMonth;
    public string $cardYear;
    public string $cardCCV;

    public function __construct(
        string $cardNumber,
        string $cardMonth,
        string $cardYear,
        string $cardCCV
    )
    {
        $this->cardNumber = $cardNumber;
        $this->cardMonth = $cardMonth;
        $this->cardYear = $cardYear;
        $this->cardCCV = $cardCCV;
    }
}
