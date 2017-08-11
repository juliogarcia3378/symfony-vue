# Swagger\Client\GameApi

All URIs are relative to *https://1b282yiqu3.execute-api.us-west-2.amazonaws.com/prod*

Method | HTTP request | Description
------------- | ------------- | -------------
[**aPIKEYGameGAMEIDStatsGet**](GameApi.md#aPIKEYGameGAMEIDStatsGet) | **GET** /{API_KEY}/game/{GAME_ID}/stats | Retrieve All Stats by Game ID
[**gameAllStatsGet**](GameApi.md#gameAllStatsGet) | **GET** /game/all/stats | Retrieve All Stats


# **aPIKEYGameGAMEIDStatsGet**
> \Swagger\Client\Model\InlineResponse200[] aPIKEYGameGAMEIDStatsGet($api_key, $game_id)

Retrieve All Stats by Game ID

Returns information about all stats.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new Swagger\Client\Api\GameApi();
$api_key = new \DateTime("2013-10-20"); // \DateTime | API-KEY defined in the header.
$game_id = 3.4; // float | Game ID.

try {
    $result = $api_instance->aPIKEYGameGAMEIDStatsGet($api_key, $game_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling GameApi->aPIKEYGameGAMEIDStatsGet: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **api_key** | **\DateTime**| API-KEY defined in the header. |
 **game_id** | **float**| Game ID. |

### Return type

[**\Swagger\Client\Model\InlineResponse200[]**](../Model/InlineResponse200.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **gameAllStatsGet**
> \Swagger\Client\Model\InlineResponse200[] gameAllStatsGet($x_api_token)

Retrieve All Stats

Returns information about all stats.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new Swagger\Client\Api\GameApi();
$x_api_token = "x_api_token_example"; // string | an authorization header

try {
    $result = $api_instance->gameAllStatsGet($x_api_token);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling GameApi->gameAllStatsGet: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **x_api_token** | **string**| an authorization header |

### Return type

[**\Swagger\Client\Model\InlineResponse200[]**](../Model/InlineResponse200.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

