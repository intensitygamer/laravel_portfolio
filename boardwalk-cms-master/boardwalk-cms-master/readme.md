## Admin

### Prerequisite
1. php > 7
2. apachectl 2.4.6
3. composer > 1.4.1
4. node > 5

### Setup
1. ```git clone git@bitbucket.org:tudlo-team/boardwalk-admin.git```
2. ```composer install```
3. ```yarn install```

### Development
1. Go to development folders.
2. ```docker run -d -p 9005:80 -v $(pwd):/var/www/html --name api gideonairex/apache2.4.6-php7:latest```
