# YahooWeather
A simple package to Get yahoo weather by using yql created By PHPAnonymous
##Install
1 - run this command from you composer ` composer require yahooweather/weather:dev-master `

2 - put provider class on your `config/app.php` file

```php 
   YahooWeather\Weather\PHPAnonymousYahooWeather::class,
```

3 - put this line from aliases array 

```php 
        'YahooWeather'       => YahooWeather\Weather\AnonyControllerYahooWeather::class,
```

##Usag

4 -  You Can Use A `YahooWeather` Class .  any way for your country or other with tow param 
Like `egypt` and `ar`

```php
 YahooWeather::Country('egypt','ar');
```

 result is returned with json array like that 
 
 ```php 
 {"high":"30","low":"18","image":"http:\/\/l.yimg.com\/a\/i\/us\/we\/52\/32.gif","name":"egypt","description":"\n\nCurrent Conditions:\nSunny\n\n\nForecast:\n Mon - Mostly Sunny. High: 30Low: 18\n Tue - Sunny. High: 32Low: 18\n Wed - Partly Cloudy. High: 33Low: 18\n Thu - Partly Cloudy. High: 33Low: 19\n Fri - Mostly Sunny. High: 33Low: 20\n\n\n\n\n\n\n\n"}
 ```
 
 now you have array on this keys 
 
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
 
 and you can put your custom query from this method 
 
 ```php
  YahooWeather::YQL('Your Query Here');
  
 ```
 
 and get more details  with additional information with array key reslults 
 
 ```php 
 $weather = YahooWeather::YQL('Your Query Here');
 dd($weather);
 ```
 
 you can get more and tests with yahoo console https://developer.yahoo.com/yql/console

 just that :) 
 enjoy your time 
