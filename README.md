# test-task-import-users

#### firstly create a database "postgres" and then edit credentials in config.php
#### then create a table "users"

```
create table users (
  id serial PRIMARY KEY,
  phone_number varchar(50),
  name varchar(255),
  sent smallint
);
```

# taskOne
```
php -S localhost:80
```

# taskTwo
```
php notify.php
```
