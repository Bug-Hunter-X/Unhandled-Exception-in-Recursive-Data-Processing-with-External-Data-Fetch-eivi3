```php
function processData(array $data): array {
  foreach ($data as $key => $value) {
    if (is_array($value)) {
      $data[$key] = processData($value); // Recursive call
    } elseif (is_string($value) && str_starts_with($value, '@')) {
      $data[$key] = fetchData(substr($value, 1)); // Call to external function
    }
  }
  return $data;
}

function fetchData(string $key): string {
  // Simulate fetching data from an external source (database, API, etc.)
  // This could be prone to errors if the key is invalid or data is unavailable.
  $externalData = ['a' => 'value a', 'b' => 'value b', 'c' => 'value c'];
  return $externalData[$key] ?? 'data not found';
}

$inputData = ['a' => 1, 'b' => ['c' => '@a', 'd' => 2], 'e' => '@b'];
$processedData = processData($inputData);
print_r($processedData);
```