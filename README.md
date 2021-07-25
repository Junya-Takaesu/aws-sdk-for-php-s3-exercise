## 使う docker iamge
```
… (optional) 一時認証情報のコマンドを実行する
docker run -itdp 8080:80 \
-v $(pwd):/var/www/html \
-e AWS_ACCESS_KEY_ID=$AWS_ACCESS_KEY_ID \
-e AWS_SECRET_ACCESS_KEY=$AWS_SECRET_ACCESS_KEY \
-e AWS_SESSION_TOKEN=$AWS_SESSION_TOKEN \
--name php-aws-sdk \
--rm php:8.0-apache bash
```
- aws sdk for php requirements
  - SimpleXML extension が有効になっている(ヨシ)
  - openssl もサポートされている(ヨシ)
  - opcache ...(NO ヨシ)
- bash を実行しているだけなので、apache が起動しないので注意。apache を使う場合、php-aws-sdk コンテナに exec で `service apache2 start` を実行する必要がある。
