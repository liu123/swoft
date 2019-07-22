<?php declare(strict_types=1);

namespace App\Http\Controller;


use Qiniu\Http\Request;
use ReflectionException;
use Swoft;
use Swoft\Bean\Exception\ContainerException;
use Swoft\Console\Helper\Show;
use Swoft\Context\Context;
use Swoft\Db\DB;
use Swoft\Http\Message\ContentType;
use Swoft\Http\Message\Response;
use Swoft\Http\Server\Annotation\Mapping\Controller;
use Swoft\Http\Server\Annotation\Mapping\RequestMapping;
use Swoft\View\Renderer;
use Throwable;
use App\Common;
use Swoft\Bean\Annotation\Mapping\Bean;
use App\bean\PrototypeClass;
use Swoft\Bean\Annotation\Mapping\Inject;

/**
 * Class HomeController
 *
 * @Controller("HomeController")
 *
 */
class HomeController
{
    /**
     * @Inject("prototype")
     *
     * @var prototype
     */
    private $prototype;

    /**
     * @RequestMapping("/")
     * @throws Throwable
     */
    public function index(): Response
    {
        /** @var Renderer $renderer */
        $renderer = Swoft::getBean('view');
        $content = $renderer->render('home/index');

        return Context::mustGet()->getResponse()->withContentType(ContentType::HTML)->withContent($content);
    }

    /**
     * @RequestMapping("/hello[/{name}]")
     * @param string $name
     *
     * @return Response
     * @throws ReflectionException
     * @throws ContainerException
     */
    public function hello(string $name): Response
    {
        return Context::mustGet()->getResponse()->withContent('Hello' . ($name === '' ? '' : ", {$name}"));
    }

    /**
     * @RequestMapping("/demo")
     */
    public function demo(): string
    {
        $users = DB::table('user')->get();
        $dd = $this->prototype->test();
        //$dd->test();
        return json_encode($dd);
    }
}
