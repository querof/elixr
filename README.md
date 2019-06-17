EliXr
=============

Hi 3rDi Lab!

Here you can find:

- Install instructions.
- Config.
- For your code evaluation.


## Install.

- Run composer to install dependencies: composer install.
- Create database instance in Mysql.
- Configure database .env file.
- Run migrations:
- Alter table file_storages to change data_chunk column to mediumblob(it's not supported by migrations)

## Config

In the file app\config\upload.php you can change MAX_FILE_SIZE and MAX_CHUNK_SIZE of the app. But accept really big files.


## Tests

- This is a small example of testing, I an do something more complex if it's needed of course: vendor/phpunit/phpunit/phpunit tests/Unit/qrcode.php


## For your code evaluation

###Tasks :
1) build a page to generate QR code , below is the link you can refer to :
https://www.kerneldev.com/2018/09/07/qr-codes-in-laravel-complete-guide/ _* Done! *_
2) Build a page to upload images and store details in database _* Done! *_
3) Build a page to link the generated QR and the Image _* Done! *_
4) Build a page to display all the QR generated _* Done! *_
5) Build a page to list the images attached to a single QR _* Done! *_

###Bonus
- Clean blade template manage: layout, bootstrap/bootstrap theme. Modular approach easy to maintain.
- Multi-part file upload(performance friendly) big files support.
- Migrations test & more.

Thanks again for the opportunity.

Best.
