```php
function processData(array $data): array {
  foreach ($data as $key => $value) {
    if (is_array($value)) {
      $data[$key] = processData($value);
    } elseif (is_string($value) && str_starts_with($value, '@')) {
      $data[$key] = fetchData(substr($value, 1));
    }
  }
  return $data;
}

function fetchData(string $key): ?string {
  $externalData = ['a' => 'value a', 'b' => 'value b', 'c' => 'value c'];
  return $externalData[$key] ?? null; //Return null if key is not found
}

$inputData = ['a' => 1, 'b' => ['c' => '@a', 'd' => 2], 'e' => '@b'];
$processedData = processData($inputData);
print_r($processedData);
```