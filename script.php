<?php
declare(strict_types=1);

$rangeFrom = $_GET['first'];
$rangeTo = $_GET['end'];

echo countLuckyTickets($rangeFrom, $rangeTo);

function countLuckyTickets(string $rangeFrom, string $rangeTo): int
{
    $countLuckyTickets = 0;
    for($ticketNumber = (int)$rangeFrom; $ticketNumber <= (int)$rangeTo; $ticketNumber++){

        $zeroFilledTicketNumber = str_pad((string)$ticketNumber, strlen($rangeFrom), '0', STR_PAD_LEFT);
        if(isLuckyTicket($zeroFilledTicketNumber)) {
            $countLuckyTickets++;
        }
    }

    return $countLuckyTickets;
    
}

function isLuckyTicket(string $ticketNumber): bool
{
    $centerChar = (int)floor(strlen($ticketNumber) / 2);
    $leftNumber = sumDigits(substr($ticketNumber, 0, $centerChar));
    $rightNumber = sumDigits(substr($ticketNumber, $centerChar));

    return $leftNumber === $rightNumber;
}

function sumDigits(string $digits): int
{
    $arrayDigits = str_split($digits);
    $sum = array_sum($arrayDigits);

    if($sum>9){
        $sum = sumDigits((string)$sum); 
    }

    return $sum;
}
