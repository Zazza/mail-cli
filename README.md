# Command Line Application для генерации писем на основе шаблона.
Приложение написано на фреймоврке Symfony 5.2. Хотя может быть использованно и без него. 
Symfony был выбран, для быстрого развертывания проекта.

Письмо генерируется, как текст и выводится на экран. Можно усложнить приложение, два варианта:
1) Генерировать письма, как email файлы для отправки в десктоп приложении
2) Использовать mailer, например SwiftMail. Но имхо, приложение генерирующее письмо, в идеале не должно отсылать его.

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
