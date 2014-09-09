RapiduSDK [![wercker status](https://app.wercker.com/status/83180b14be54bfb8d1f1e74ec0cb2eae/s/master "wercker status")](https://app.wercker.com/project/bykey/83180b14be54bfb8d1f1e74ec0cb2eae)
=========
Unofficial rapidu.net SDK

## Composer installation
`"lbarulski/rapidu-sdk": "dev-master"`

## Example
### Get Account Details
```php
$rapidu = new LB\Rapidu\RapiduClient('LOGIN', 'PASSWORD');

$accountDetails = $rapidu->getAccountDetails();
```

### Get File Details
```php
$rapidu = new LB\Rapidu\RapiduClient('LOGIN', 'PASSWORD');

$fileDetails = $rapidu->getFileDetails('FILE_ID');
```

### Get File Download
```php
$rapidu = new LB\Rapidu\RapiduClient('LOGIN', 'PASSWORD');

$fileDownload = $rapidu->getFileDownload('FILE_ID');
```

### File Upload
```php
$rapidu = new LB\Rapidu\RapiduClient('LOGIN', 'PASSWORD');

$uploadServer = $rapidu->getUploadServer();

$url = $rapidu->upload($uploadServer, '/path/to/file');
```
