# Command Line Application для генерации писем на основе шаблона.
# BRANCH: генерирует реальные email с помощью SwiftMailer
Приложение написано на фреймоврке Symfony 5.2. Хотя может быть использованно и без него. 
Symfony был выбран, для быстрого развертывания проекта.

Письмо генерируется b как текст и выводится на экран.

## Установка
 
`# git clone https://github.com/Zazza/mail-cli.git`

`# composer install`

## Работа

`# ./bin/console app:mail <context> <template path>`

context = **line** или **table**

Шаблоны для примера: **templates/lineExample.volt** и **templates/tableExample.volt**

**Примеры работы:**

`./bin/console app:mail line templates/lineExample.volt`

`./bin/console app:mail table templates/tableExample.volt`

## Тесты
`# php bin/phpunit`
