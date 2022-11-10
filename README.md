# Тестовое задание от Александра З.

##Установка

Выполните комманду `composer update`

Переименуйте файл `.env.example` (в корневом каталоге) в `.env`. Укажите в нём *свои* данные для входа в БД:

```
DB_CONNECTION=mysql
DB_HOST=localhost
DB_PORT=5432
DB_DATABASE=test-task-base
DB_USERNAME=user
DB_PASSWORD=password
```

`php artisan migrate` -- создание таблиц

`php artisan db:seed --class=DatabaseSeeder` -- генерация данных в БД

`php artisan key:generate` -- генерация ключа приложения (или же запросит при открытии страницы)

`/order-items-info` -- информация об элементах заказа

`/delete-user?id=1` -- удаление пользователя с заданным ID, вместе с зависимыми от него данными в производных таблицах.

`/santa-member-info?id=1` -- информация об участнике ("тайном Санте") с заданным ID и его подопечном
