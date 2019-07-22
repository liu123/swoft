<?php declare(strict_types=1);

namespace App\Aspect;

use Swoft\Aop\Annotation\Mapping\Aspect;
use Swoft\Aop\Annotation\Mapping\Before;
use Swoft\Aop\Annotation\Mapping\PointBean;
use Swoft\Aop\Point\JoinPoint;
use Swoft\Aop\Annotation\Mapping\After;
use Swoft\Aop\Annotation\Mapping\AfterReturning;
use Swoft\Aop\Annotation\Mapping\AfterThrowing;

/**
 * Class orderAspect
 * @package App\Aspect
 * @Aspect(order=1)
 * @PointBean(include={"App\Http\Controller\test\orderAopController"})
 */
class orderAspect
{
    protected $start;

    /**
     *  定义通知链接点
     * @Before()
     * @param string $number the params of method
     */
    public function before()
    {
        // TODO::前置通知，在目标方法执行前先执行此方法
        //TODO::在这里我们记录接口调用时传过来的参数
        $this->start = microtime(true);
    }

    /**
     * 定义通知点
     * @After()
     */
    public function after(JoinPoint $joinPoint)
    {
        // TODO::后置通知，在目标方法执行后执行此方法
        $method = $joinPoint->getMethod();
        $after = microtime(true);
        $runtime = ($after - $this->start) * 1000;

        return "{$method} 方法，本次执行时间为: {$runtime}ms:{$this->start}dd\n";
    }

//    /**
//     *  定义通知链接点
//     * @AfterReturning()
//     */
//    public function afterReturning(JoinPoint $joinPoint)
//    {
//        // TODO::最终返回通知
//        // TODO::这里可以处理方法返回的结果
//        $method = $joinPoint->getMethod();
//        return $method;
//
//    }

    /**
     *  定义通知链接点
     * @AfterThrowing()
     */
    public function afterThrowing()
    {
        // TODO::异常通知，在目标方法执行抛出异常时执行此方法
        // TODO::如果有出错异常，在这里我们处理出错的日志记录等操作
    }
}