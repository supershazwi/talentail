<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Default Filesystem Disk
    |--------------------------------------------------------------------------
    |
    | Here you may specify the default filesystem disk that should be used
    | by the framework. The "local" disk, as well as a variety of cloud
    | based disks are available to your application. Just store away!
    |
    */

    'default' => env('FILESYSTEM_DRIVER', 'local'),

    /*
    |--------------------------------------------------------------------------
    | Default Cloud Filesystem Disk
    |--------------------------------------------------------------------------
    |
    | Many applications store files both locally and in the cloud. For this
    | reason, you may specify a default "cloud" driver here. This driver
    | will be bound as the Cloud disk implementation in the container.
    |
    */

    'cloud' => env('FILESYSTEM_CLOUD', 's3'),

    /*
    |--------------------------------------------------------------------------
    | Filesystem Disks
    |--------------------------------------------------------------------------
    |
    | Here you may configure as many filesystem "disks" as you wish, and you
    | may even configure multiple disks of the same driver. Defaults have
    | been setup for each driver as an example of the required options.
    |
    | Supported Drivers: "local", "ftp", "sftp", "s3", "rackspace"
    |
    */

    'disks' => [

        'local' => [
            'driver' => 'local',
            'root' => storage_path('app'),
        ],

        'public' => [
            'driver' => 'local',
            'root' => storage_path('app/public'),
            'url' => env('APP_URL').'/storage',
            'visibility' => 'public',
        ],

        's3' => [
            'driver' => 's3',
            'key' => env('AWS_ACCESS_KEY_ID'),
            'secret' => env('AWS_SECRET_ACCESS_KEY'),
            'region' => env('AWS_DEFAULT_REGION'),
            'bucket' => env('AWS_BUCKET'),
            'url' => env('AWS_URL'),
        ],

        'gcs' => [
            'driver' => 'gcs',
            'project_id' => env('GOOGLE_CLOUD_PROJECT_ID', 'talentail-217309'),
            'key_file' => env('GOOGLE_CLOUD_KEY_FILE', 'https://00e9e64bac6dfb0a4a2ea3a57695cbf973195843b61b81f0c4-apidata.googleusercontent.com/download/storage/v1/b/talentail-123456789/o/talentail-217309-ac6e4e86e4f1.json?qk=AD5uMEsXP3FbushFXw0_ddAAX503mLYDH7puF2WrHOV_yfUYWdIKIZKaZjtacHHVN77Bc42ylcK_Dvq_L1PhBkwKIA9SF7gN6TD6COXyjFUKbZzOfOCCfl57VYKEZYpcHRo95BnKRGvsjYh-MQ79Pp8CsJcpTqL7Kzo8dgWMgav7DGAbDWKvarRW8nyHqL5vGNCvjp4qUVNizhCIR9BPsrCZF0ks01ufYNXxeYwm6cr8B6UmSF8HAF9jX9RaPqxv31R4dGnis5M-BhizTS_wYoPsZrSxmbpH137onEMx1Nfqc9ZNUwsrPyiV-T3Lntfe4NIKuqVWm1WIamZAAdmVcZnnvawj5PtGuVf_llMXxhbcDbkwKN_z5kaSDMhFpbOLlWAc7yiwTHRN_QZZUuokbflEJOQxkmsWUkjteduRRi9Q7YwMSh9lsTI83wALtgRzQYNde6C4a7I3gNs3Iv_H6u7UTSOs1y8IM9JW0ZEgVpWMthafLUc5mA8BXzq5NQx4vgF_YqILAxMQ-m6RNKs5z8rfI2deewzJ5f-4n5BzVgC1SSLKWaWHNjZUJ2SKqsKu5Yzg8s_jqcoeiLKwMGz4C95zaXVs_UM_pyRPVgEHTIEpwjJ4l_5cLlWsHSSq03g7qiYXc59tFDG2MranUwxQTW8vMaDZ0mNtD83x7P-dQgoXivRMrYbH28FIjJOlvwlBJ04dmE6lu9r3iRV_L-eqjCeukkAA2zw317SyPo_WhGMlbCvMJ2hF2x_rzlg1_yMfRUVEAtvNVCfPjgQVzLsYnS5OKcWX9KUQUaylHwpx9SUMHE78wMWOB8g'), // optional: /path/to/service-account.json
            'bucket' => env('GOOGLE_CLOUD_STORAGE_BUCKET', 'talentail-123456789'),
            'path_prefix' => env('GOOGLE_CLOUD_STORAGE_PATH_PREFIX', null), // optional: /default/path/to/apply/in/bucket
            'storage_api_uri' => env('GOOGLE_CLOUD_STORAGE_API_URI', null), // see: Public URLs below
        ],

    ],

];
