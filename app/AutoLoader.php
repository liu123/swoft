<?php declare(strict_types=1);


namespace App;


use Swoft\SwoftComponent;

/**
 * Class AutoLoader
 *
 * @since 2.0
 */
class AutoLoader extends SwoftComponent
{
    /**
     * @return array
     */
    public function getPrefixDirs(): array
    {
        return [
            __NAMESPACE__ => __DIR__,
        ];
    }

    /**
     * @return array
     */
    public function metadata(): array
    {
        return [];
    }

//    /**
//     * @return array
//     */
//    public function beans(): array
//    {
//        return [
//            'prototype' => [
//                'class'    => bean\PrototypeClass::class,
//                '__option' => [
//                    'scope' => Bean::PROTOTYPE,
//                    'alias' => 'testBean-alias'
//                ]
//            ],
//        ];
//    }
}