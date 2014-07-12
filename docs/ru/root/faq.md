## faq # ЧаВО

<i class="fa fa-question-circle"></i> Как сделать событие, которое вызывается через заданный временной интервал?

```php
$i = 0;
setTimeout(function($timer) use (&$i) {
 D("Пять секунд прошло!");

 if (++$i < 3) {
    // запуск таймера ещё на 5 секунд
    $timer->timeout();
 } else {
    echo "Конец\n";
    $timer->free();
 }
}, 5e6);
```