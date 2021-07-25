<?php

require "./vendor/autoload.php";

use Aws\S3\S3Client;
use Aws\Exception\AwsException;

$USAGE = "\n" .
    "To run this example, supply the name of an S3 bucket and a filename(key) to\n" .
    "get the object from the bucket.\n" .
    "\n" .
    "Ex: php get_from_bucket.php <bucketname> <filename> <saveAs>\n";
    
if (count($argv) <= 2) {
    echo $USAGE;
    exit();
}

$bucket = $argv[1];
$key = $argv[2];
$save_as = $argv[3] ?? __DIR__;

try {
    $s3client = new S3Client([
       "version" => "latest",
       "region" => "ap-northeast-1" 
    ]);
    $result = $s3client->getObject([
       "Bucket" => $bucket,
       "Key" => $key,
       "SaveAs" => $save_as . "/" . $key
    ]);
    print_r($result);
} catch (AwsException $e) {
    echo $e->getMessage() . "\n";
}