<?php
namespace GumPHP\Storage\Facade;

use think\Facade;
use GumPHP\Storage\Filesystem\Driver;

/**
 * Class Storage
 * @package GumPHP\Storage\Facade
 * @mixin \GumPHP\Storage\Storage
 * @method static Driver disk(string $name = null) , null|string
 * @method static mixed getConfig(null|string $name = null, mixed $default = null) 获取缓存配置
 * @method static array getDiskConfig(string $disk, null $name = null, null $default = null) 获取磁盘配置
 * @method static string|null getDefaultDriver() 默认驱动
 */
class Storage extends Facade
{
    protected static function getFacadeClass()
    {
        return \GumPHP\Storage\Storage::class;
    }
}
