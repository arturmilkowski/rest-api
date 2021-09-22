# Swagger\Client\UsersbooksApi

All URIs are relative to *http://127.0.0.1:8000*

Method | HTTP request | Description
------------- | ------------- | -------------
[**attachUserToBook**](UsersbooksApi.md#attachusertobook) | **GET** /users/{user}/books/{book}/attach | Attach the user for the book
[**detachUserFromBook**](UsersbooksApi.md#detachuserfrombook) | **GET** /users/{user}/books/{book}/detach | Detach the user from the book

# **attachUserToBook**
> \Swagger\Client\Model\User attachUserToBook($user, $book)

Attach the user for the book

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new Swagger\Client\Api\UsersbooksApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$user = "user_example"; // string | The id of the user
$book = "book_example"; // string | The id of the book

try {
    $result = $apiInstance->attachUserToBook($user, $book);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling UsersbooksApi->attachUserToBook: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **user** | **string**| The id of the user |
 **book** | **string**| The id of the book |

### Return type

[**\Swagger\Client\Model\User**](../Model/User.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **detachUserFromBook**
> \Swagger\Client\Model\User detachUserFromBook($user, $book)

Detach the user from the book

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new Swagger\Client\Api\UsersbooksApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$user = "user_example"; // string | The id of the user
$book = "book_example"; // string | The id of the book

try {
    $result = $apiInstance->detachUserFromBook($user, $book);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling UsersbooksApi->detachUserFromBook: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **user** | **string**| The id of the user |
 **book** | **string**| The id of the book |

### Return type

[**\Swagger\Client\Model\User**](../Model/User.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

