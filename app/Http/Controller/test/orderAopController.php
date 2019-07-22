<?php declare(strict_types=1);

namespace App\Http\Controller\test;

use Swoft\Http\Server\Annotation\Mapping\Controller;
use Swoft\Http\Server\Annotation\Mapping\RequestMapping;

/**
 * Class orderAopController
 * @package App\Http\Controller\test
 * @Controller();
 */
class orderAopController
{
    /**
     * @RequestMapping("index/{number}")
     * @return int
     */
    public function index(int $number): array
    {
        $factorial = function ($arg) use (&$factorial) {
            if ($arg == 1) {
                return $arg;
            }

            return $arg * $factorial($arg - 1);
        };

        return [$factorial($number)];
    }

    /**
     * @RequestMapping()
     * @return array
     */
    public function sumAndAleep(): array
    {
        $sum = 0;
        for ($i = 1; $i <= 1000; $i++) {
            $sum = $sum + $i;
        }

        usleep(1000);
        return [$sum];
    }
}