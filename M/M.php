<?php
/**
 * @link https://github.com/MaGuowei/M
 * @copyright 2013 maguowei.com
 * @author Ma Guowei <imaguowei@gmail.com>
 */
namespace M;
//define('MPATH',str_replace('\\','/',dirname(__FILE__).'/'));

use M\Config\Config;
use M\Dispatcher\Dispatcher;
use M\Http\Request\PathRequest;
use M\Http\Request\Request;
use M\Loader\Loader;

/**
 * Class M
 * @package M
 */
class M
{
    /**
     * 配置信息实例
     * @var Config
     */
    private static $config;
    private static $request;
    /**
     * @var
     */
    private static $dispatcher;
    /**
     * @param $configs
     */
    public static function run($configs)
    {
        self::init();

        self::$config = Config::init($configs);
        self::$request = Request::getRequest();
        //self::$request = PathRequest::getRequest();

        self::$dispatcher = new Dispatcher(self::$request);
    }

    /**
     *应用初始化相关配置
     */
    private static function init()
    {
        //todo the path must can be config at app config files
        set_include_path(get_include_path().PATH_SEPARATOR.'E:/www/M'.PATH_SEPARATOR.'E:/www/M/Demos');

        require_once 'Loader/Loader.php';
        Loader::register();
    }

    /**
     * 获取框架版本号
     * @return float
     */
    public static function getVersion()
    {
        return 0.001;
    }

    /**
     * 获取配置信息的公用方法
     *
     * 所有需要获取配置信息的部分都需要通过调用此方法获取
     * @param string $name
     * @return mixed
     */
    public static function getConfig($name = '')
    {
        return self::$config->getConfig($name);
    }

    public static function getApp()
    {
        return self::$app;
    }

    /**
     * @param $class
     */
    public static function import($class)
    {

    }
}

/**
 * Class App
 * @package M
 */
class App extends M
{
    /**
     * 实现方法委托
     * @param $name
     * @param $args
     * @return mixed
     */
    public static function __callStatic($name,$args)
    {
        if(method_exists('\M\Http\Server\Server',$name))
        {
            return Http\Server\Server::$name();
        }
        else
        {
            return null;
        }
    }
}





