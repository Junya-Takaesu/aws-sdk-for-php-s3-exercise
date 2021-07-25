<?php

require "./vendor/autoload.php";

use Aws\S3\S3Client;  
use Aws\Exception\AwsException;

// 環境変数から credentials を読み込む(aws access keys)
$s3client = new S3Client([
    "version" => "latest",
    "region"  => "ap-northeast-1" 
]);

$buckets = $s3client->listBuckets();
foreach($buckets["Buckets"] as $bucket) {
    echo $bucket['Name'] . "\n";
}