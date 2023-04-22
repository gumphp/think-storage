# think-filesystem for ThinkPHP6.1

## 安装

把以下内容加入项目`composer.json`
```json
{
    "repositories": [
        {
            "type": "path",
            "url": "./package/*"
        }
    ]
}
```

> composer require gumphp/think-filesystem

## 配置

```php
# config/filesystem.php

return [
    'disks' => [
        's3' => [
            'type' => 'aws',
            'root' => '/',
            'credentials' => [
                'key' => env('S3_KEY', ''),
                'secret' => env('S3_SECRET', ''),
            ],
            'version' => env('S3_VERSION', 'latest'),
            'region' => env('S3_REGION', 'us-west-2'),
            'bucket' => env('S3_BUCKET', ''),
        ],
    ],
];
```


## 使用

```php

use GumPHP\Storage\Facade\Storage;

Storage::disk('s3')->put('/s3/remote/file.ext', file_get_contents('/path/yourfile.ext'));

```