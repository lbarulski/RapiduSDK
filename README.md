RapiduSDK
=========
Unofficial rapidu.net SDK

## TODO:
- upload
- tests

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