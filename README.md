# Lea Muller website

Install dependencies

`composer install`

Start php dev server

`php bin/console server:run`
  
Start node dev server

`npm run watch`


 Then go to `npm run watch`


Translations
--- 
Extract translation messages
``` bash
php bin/console translation:extract
```

Delete obsolete translation messages
``` bash
translation:delete-obsolete
```

Optimize images
```
mogrify -resize 1600 -quality 60 *.jpg
```