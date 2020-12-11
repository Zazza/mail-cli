# Command Line Application для генерации писем на основе шаблона.
Приложение написано на фреймоврке Symfony 5.2. Хотя может быть использованно и без него. 
Symfony был выбран, для быстрого развертывания проекта.

Письмо генерируется, как текст и выводится на экран.

**Важно:** в отдельной ветке https://github.com/Zazza/mail-cli/tree/real-mails генерируются реальные email при помощи SwiftMailer

## Установка
 
`# git clone https://github.com/Zazza/mail-cli.git`

`# composer install`

## Работа

`# ./bin/console app:mail <context> <template path>`

context = **line** или **table**

Шаблоны для примера: **templates/lineExample.twig** и **templates/tableExample.twig**

**Примеры работы:**

`./bin/console app:mail line templates/lineExample.twig`

`./bin/console app:mail table templates/tableExample.twig`

## Тесты
`# php bin/phpunit`
