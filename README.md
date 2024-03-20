
I am making use of laravel and RabbitMQ for message broker
--Things i installed
php unit
composer require --dev phpunit/phpunit
laravel queue rabbitmq
composer require vladimir-yuldashev/laravel-queue-rabbitmq

DEMO VIDEO
https://streamable.com/o185zu



STEP 1
- Boot the Docker Container on the Users project
  docker-compose up --build
- Boot the docker Container on the Notifcations-service project also'
  docker-compose up --build
  
 Once all 3 services are running[the db, the queue, the server]

 STEP 2
- On a new terminal on the users project and notifications project, run this to get into their respective containers
docker compose exec users sh
docker compose exec notifcations sh
-Start up the queue
php artisan queue:work

STEP 3
-Go back to the users project, open that second terminal we created in step 2 and run our unit test
phpunit tests/feature/UserControllerTest.php
Then go back to notifcations-service project and check the queue, you'd see the data displayed (email,firstName, lastName)
and also a logfile is created in logs/user_data.log
that stores the data

Please find all tests in users/tests
1. UserControllerTest.php [this tests the entire process end to end[from user data creation, request to the POST API and Message sending]
2. UserTest.php[this just tests that user is created successfully]

