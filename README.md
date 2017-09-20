# ecommerce-sample

### setup
Suppose that php and composer are already installed  
Change directory to project's folder ecommerce-sample  
Run command "composer install" to install dependencies. The composer.json contains phpunit and php codesniffer to run test cases and check code styles  

### how to run typical unit tests
Change directory to project's folder ecommerce-sample  
Run command "./vendor/bin/phpunit tests/" to run all test cases

### how to run unit tests with code coverage (work only with php-xdebug installed)
Change directory to project's folder ecommerce-sample  
Run command "./vendor/bin/phpunit --coverage-html coverage  --configuration="tests/phpunit.xml" tests/" to run all test cases
See coverage results in "coverage" folder

### how to check if code conforms to PSR-1, PSR-2
Change directory to project's folder ecommerce-sample  
Run command "./vendor/bin/phpcs models/"  
It should display no errors, showing that the code conforms to PSR-1 and PSR-2  

###### The "coverage" folder already includes my coverage results
