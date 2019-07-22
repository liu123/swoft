<?php declare(strict_types=1);

namespace App\bean;

use Swoft\Bean\Annotation\Mapping\Bean;

/**
 * Class PrototypeClass
 * @since 2.0
 * @Bean(name="prototype", scope=Bean::SINGLETON, alias="pro")
 */
class PrototypeClass
{
    //Bean::SINGLETON 单例Bean
    //Bean::PROTOTYPE 原型Bean
    //Bean::REQUEST 请求Bean
    public function test(): int
    {
        return 12000;
    }
}
