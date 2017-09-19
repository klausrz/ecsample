# ecommerce-sample

### setup
Suppose that php and composer are already installed  
Change directory to project's folder ecommerce-sample  
Run command "composer install", the composer.json contains phpunit and php codesniffer to run test cases and check code styles  

### how to run tests
Change directory to project's folder ecommerce-sample  
Run command "./vendor/bin/phpunit tests/" to run all test cases

### how to check if code conforms to PSR-1, PSR-2
Change directory to project's folder ecommerce-sample  
Run command "./vendor/bin/phpcs models/"  
It should display no errors, showing that the code conforms to PSR-1 and PSR-2



