
## Installion 

	before run this project you should make sure that your computer has intalled Composer , 
	and any web services. if don't any,you should install such as:   

- [Composer](https://getcomposer.org/doc/00-intro.md).
- Install web services:
	-window should use :[XAMPP](https://www.apachefriends.org/download.html).
	-Mac should use : [MAMP & MAMP Pro](https://www.mamp.info/en/) or [Docker](https://docs.docker.com/docker-for-mac/).



## Clone This Project

	This Url: (https://github.com/hai-Ratana/report-management-system.git) .

## Config file .env
	APP_ENV=local
	APP_DEBUG=true
	APP_KEY=base64:H/EiluFrN/BjUZEkwv1NKZJ2cax/af1Oqx4PFrTM5N8=
	APP_URL=http://yourUrl 		<!--  ! default http://localhost in Xampp and MAMP -->

	DB_CONNECTION=mysql
	DB_HOST=127.0.0.1  		<!-- name host -->
	DB_PORT=3306			<!-- port host -->
	DB_DATABASE=yourDatabse  	<!-- name database -->
	DB_USERNAME="root"  		<!-- name user  -->
	DB_PASSWORD=""			<!-- password  -->
	CACHE_DRIVER=file
	SESSION_DRIVER=file
	QUEUE_DRIVER=sync

	REDIS_HOST=127.0.0.1"
	REDIS_PASSWORD=null
	REDIS_PORT=6379

	MAIL_DRIVER=smtp
	MAIL_HOST=mailtrap.io
	MAIL_PORT=2525
	MAIL_USERNAME=null
	MAIL_PASSWORD=null
	MAIL_ENCRYPTION=null

## Using Command line for this project
	"php artisan key:generate " to generate new key.


	"php artisan migrate --seed" to generate table user on database.
