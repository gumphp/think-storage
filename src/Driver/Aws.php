<?php
namespace GumPHP\Storage\Driver;

use Aws\S3\S3Client;
use League\Flysystem\AdapterInterface;
use League\Flysystem\AwsS3v3\AwsS3Adapter;
use think\filesystem\Driver;

class Aws extends Driver
{
    /**
     *
     * @return AdapterInterface
     * @author chenwenbin <18814515@qq.com>
     * @Time: 2023/4/21 18:39
     */
    protected function createAdapter(): AdapterInterface
    {
        return new AwsS3Adapter($this->createS3Client(), $this->config['bucket'], $this->config['root']);
    }

    /**
     *
     * @return S3Client
     * @author chenwenbin <18814515@qq.com>
     * @Time: 2023/4/21 18:39
     */
    protected function createS3Client()
    {
        return new S3Client([
            'credentials' => $this->config['credentials'],
            'region' => $this->config['region'],
            'version' => $this->config['version'],
        ]);
    }

    /**
     * 获取文件访问地址
     * @param string $path 文件路径
     * @return string
     */
    public function url(string $path): string
    {
        return $this->createS3Client()->getObjectUrl($this->config['bucket'], $path);
    }
}
