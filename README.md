# ACL Users with CakePHP 3.10

## Clone repository
```
git clone https://github.com/afranval/acl-users.git
```
## Run migrations
(*) Run migration after create your database and config in config/app_local.php
```
bin/cake migrations migrate
```
## Run seeders (Users and roles)
```
bin/cake migrations seed --seed DatabaseSeed
```
## Run cake server
```
bin/cake server
```
