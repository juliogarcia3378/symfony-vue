# Swagger\Client\EventApi

All URIs are relative to *https://api.openparty.co/v0*

Method | HTTP request | Description
------------- | ------------- | -------------
[**eventsGet**](EventApi.md#eventsGet) | **GET** /events | Retrieve Events By Venue and Date


# **eventsGet**
> \Swagger\Client\Model\Event[] eventsGet($date, $venue)

Retrieve Events By Venue and Date

The Venues endpoint returns information about a venue by given id. The response includes the display name and other details about the venue.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new Swagger\Client\Api\EventApi();
$date = new \DateTime(); // \DateTime | Date for event.
$venue = "venue_example"; // string | Id for the venue.

try {
    $result = $api_instance->eventsGet($date, $venue);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling EventApi->eventsGet: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **date** | **\DateTime**| Date for event. |
 **venue** | **string**| Id for the venue. | [optional]

### Return type

[**\Swagger\Client\Model\Event[]**](../Model/Event.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

