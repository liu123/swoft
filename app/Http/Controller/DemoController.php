<?php declare(strict_types=1);

namespace App\Http\Controller;

use Swoft\Http\Server\Annotation\Mapping\Controller;
use Swoft\Http\Server\Annotation\Mapping\RequestMapping;
use Swoft\Http\Server\Annotation\Mapping\RequestMethod;
use Swoft\Bean\Annotation\Mapping\Inject;

/**
 * Class DemoController
 *
 * @Controller()
 */
class DemoController
{
    /**
     * @Inject("prototype")
     * @var prototype
     */
    private $prototype;

    /**
     * @RequestMapping()
     * @return string
     */
    public function beanTest(): string
    {
        $res = $this->prototype->test();
        return json_encode($res);
    }
}