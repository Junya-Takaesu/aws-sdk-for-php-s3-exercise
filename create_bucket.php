<?php

require "./vendor/autoload.php";

use Aws\S3\S3Client;
use Aws\Exception\AwsException;

function createBucket($s3client, $bucketName)
{
    try {
        $result = $s3client->createBucket([
            "Bucket" => $bucketName
        ]);
        return "バケットのロケーションは " . $result["Location"] . " です。" . PHP_EOL .
               "バケットの有効 URI は " .  $result["@metadata"]["effectiveUri"] . " です。";
    } catch (AwsException $e) {
        return "Error: " . $e->getAwsErrorMessage();
    }
}

function createTheBucket() {
    $s3client = new S3Client([
        "version" => "latest",
        "region"  => "ap-northeast-1"
    ]);
    
    echo createBucket($s3client, "my-phpsdk-bucket");
}

createTheBucket();