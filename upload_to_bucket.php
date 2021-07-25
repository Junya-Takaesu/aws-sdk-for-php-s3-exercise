<?php
require "./vendor/autoload.php";

use Aws\S3\S3Client;  
use Aws\Exception\AwsException;

use function PHPSTORM_META\map;

$USAGE = "\n" .
    "To run this example, supply the name of an S3 bucket and a file to\n" .
    "upload to it.\n" .
    "\n" .
    "Ex: php PutObject.php <bucketname> <filename>\n";
    
if (count($argv) <= 2) {
    echo $USAGE;
    exit();
}

$bucket = $argv[1];
$file_path = $argv[2];
$key = basename($argv[2]);

try {
    $s3client = new S3Client([
       "version" => "latest",
       "region" => "ap-northeast-1" 
    ]);
    $result = $s3client->putObject([
       "Bucket" => $bucket,
       "Key" => $key,
       "SourceFile" => $file_path 
    ]);
    print_r($result);
} catch (AwsException $e) {
    echo $e->getMessage() . "\n";
}
