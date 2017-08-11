# Swagger\Client\VenueApi

All URIs are relative to *https://api.openparty.co/v0*

Method | HTTP request | Description
------------- | ------------- | -------------
[**venuesGet**](VenueApi.md#venuesGet) | **GET** /venues | Retrieve Venues by Type and Date
[**venuesIdGet**](VenueApi.md#venuesIdGet) | **GET** /venues/{id} | Get Venue by a given id
[**venuesIdTablepricingGet**](VenueApi.md#venuesIdTablepricingGet) | **GET** /venues/{id}/tablepricing | Get All Bottle Service Tables by a venue in a given date


# **venuesGet**
> \Swagger\Client\Model\Venue[] venuesGet($type, $date)

Retrieve Venues by Type and Date

The Venue endpoint returns an array of venues filtered by date and type of venue (nightclub or poolparty). Each venue includes  information such as name, display name, type, features, logo among other details.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new Swagger\Client\Api\VenueApi();
$type = "type_example"; // string | Type can be only 'nightclub' or 'poolparty'.
$date = new \DateTime(); // \DateTime | Format for Date should be mm/dd/yy.

try {
    $result = $api_instance->venuesGet($type, $date);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling VenueApi->venuesGet: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **type** | **string**| Type can be only &#39;nightclub&#39; or &#39;poolparty&#39;. |
 **date** | **\DateTime**| Format for Date should be mm/dd/yy. | [optional]

### Return type

[**\Swagger\Client\Model\Venue[]**](../Model/Venue.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **venuesIdGet**
> \Swagger\Client\Model\Venue[] venuesIdGet($id)

Get Venue by a given id

The Venues endpoint returns information about a venue by given id. The response includes the display name and other details about the venue.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new Swagger\Client\Api\VenueApi();
$id = 3.4; // float | Id for the venue.

try {
    $result = $api_instance->venuesIdGet($id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling VenueApi->venuesIdGet: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **float**| Id for the venue. |

### Return type

[**\Swagger\Client\Model\Venue[]**](../Model/Venue.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **venuesIdTablepricingGet**
> \Swagger\Client\Model\Event[] venuesIdTablepricingGet($id, $date)

Get All Bottle Service Tables by a venue in a given date

The tablepricing endpoint returns an array with information about bottle service tables in a given date. The response includes the prices, capacity for tables among other details.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new Swagger\Client\Api\VenueApi();
$id = 3.4; // float | Id for selected venue.
$date = new \DateTime(); // \DateTime | Date given for retrieve tables.

try {
    $result = $api_instance->venuesIdTablepricingGet($id, $date);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling VenueApi->venuesIdTablepricingGet: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **float**| Id for selected venue. |
 **date** | **\DateTime**| Date given for retrieve tables. |

### Return type

[**\Swagger\Client\Model\Event[]**](../Model/Event.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

