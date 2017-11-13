# YahooWeather
A simple package to Get Yahoo weather by using YQL created By PHPAnonymous
## Installation
1. Run this command from you composer ` composer require yahooweather/weather:dev-master `

2. Put provider class on your `config/app.php` file

```php 
   YahooWeather\Weather\PHPAnonymousYahooWeather::class,
```

3. Add this line to the the aliases array 

```php 
        'YahooWeather'       => YahooWeather\Weather\AnonyControllerYahooWeather::class,
```

## Usage

3. In your controller, make sure to add the following line:
```php
use YahooWeather;
```

4. Use the `YahooWeather` Class. It takes two parameters, a country and a language. 

```php
 YahooWeather::Country('egypt','ar');
```

The result is returned as a JSON array: 
 
 ```php 
 {"high":"30","low":"18","image":"http:\/\/l.yimg.com\/a\/i\/us\/we\/52\/32.gif","name":"egypt","description":"\n\nCurrent Conditions:\nSunny\n\n\nForecast:\n Mon - Mostly Sunny. High: 30Low: 18\n Tue - Sunny. High: 32Low: 18\n Wed - Partly Cloudy. High: 33Low: 18\n Thu - Partly Cloudy. High: 33Low: 19\n Fri - Mostly Sunny. High: 33Low: 20\n\n\n\n\n\n\n\n"}
 ```

 
 ```php 
  // high | العظمي
  // low | الصغري
  // name | country name / اسم الدولة
  // image | image status frequency | حالة الطقس بالصورة 
  // description | other details | تفاصيل اخري
  
  $weather =  YahooWeather::Country('egypt','ar');
  echo $weather['high'];
  echo $weather['low'];
  echo $weather['image'];
  echo $weather['name'];
  echo $weather['description'];  
 ```

### Example Controller:
```php
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use YahooWeather;
class WeatherController extends Controller
{
    public function get_weather(){
    	$weather = YahooWeather::Country('lebanon','ar');
    	var_dump($weather);
    }
}
```

```php
For more advanced queries, you can use the custom query function:
 
 ```php 
 $weather = YahooWeather::YQL('Your Query Here');
 dd($weather);
 ```
 
Check the Yahoo YQL Console for more information on YQL queries: https://developer.yahoo.com/yql/console

That's it :) 
Enjoy
