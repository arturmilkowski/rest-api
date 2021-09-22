# Swagger\Client\BooksApi

All URIs are relative to *http://127.0.0.1:8000*

Method | HTTP request | Description
------------- | ------------- | -------------
[**createBook**](BooksApi.md#createbook) | **POST** /books | Store a book
[**deleteBook**](BooksApi.md#deletebook) | **DELETE** /books/{book} | Delete the specific book
[**listBooks**](BooksApi.md#listbooks) | **GET** /books | List all books
[**searchBooks**](BooksApi.md#searchbooks) | **GET** /books/search | List of a searched books
[**showBookById**](BooksApi.md#showbookbyid) | **GET** /books/{book} | Info for the specific book
[**updateBook**](BooksApi.md#updatebook) | **PUT** /books/{book} | Update the specific book

# **createBook**
> createBook()

Store a book

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new Swagger\Client\Api\BooksApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);

try {
    $apiInstance->createBook();
} catch (Exception $e) {
    echo 'Exception when calling BooksApi->createBook: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters
This endpoint does not need any parameter.

### Return type

void (empty response body)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **deleteBook**
> \Swagger\Client\Model\Book deleteBook($book)

Delete the specific book

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new Swagger\Client\Api\BooksApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$book = "book_example"; // string | The id of the book to retrieve

try {
    $result = $apiInstance->deleteBook($book);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling BooksApi->deleteBook: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **book** | **string**| The id of the book to retrieve |

### Return type

[**\Swagger\Client\Model\Book**](../Model/Book.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **listBooks**
> \Swagger\Client\Model\Books listBooks()

List all books

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new Swagger\Client\Api\BooksApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);

try {
    $result = $apiInstance->listBooks();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling BooksApi->listBooks: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters
This endpoint does not need any parameter.

### Return type

[**\Swagger\Client\Model\Books**](../Model/Books.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **searchBooks**
> \Swagger\Client\Model\Books searchBooks()

List of a searched books

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new Swagger\Client\Api\BooksApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);

try {
    $result = $apiInstance->searchBooks();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling BooksApi->searchBooks: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters
This endpoint does not need any parameter.

### Return type

[**\Swagger\Client\Model\Books**](../Model/Books.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **showBookById**
> \Swagger\Client\Model\Book showBookById($book)

Info for the specific book

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new Swagger\Client\Api\BooksApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$book = "book_example"; // string | The id of the book to retrieve

try {
    $result = $apiInstance->showBookById($book);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling BooksApi->showBookById: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **book** | **string**| The id of the book to retrieve |

### Return type

[**\Swagger\Client\Model\Book**](../Model/Book.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **updateBook**
> \Swagger\Client\Model\Book updateBook($book)

Update the specific book

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new Swagger\Client\Api\BooksApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$book = "book_example"; // string | The id of the book to retrieve

try {
    $result = $apiInstance->updateBook($book);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling BooksApi->updateBook: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **book** | **string**| The id of the book to retrieve |

### Return type

[**\Swagger\Client\Model\Book**](../Model/Book.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

