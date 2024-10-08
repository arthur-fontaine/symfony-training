### Setup

```sh
symfony new tmp --version="7.1.*"
mv tmp/* tmp/.* .
rm -rf tmp
```

### Start the server

```sh
symfony local:server:start
```

### Migrate the database

```sh
php bin/console doctrine:migrations:diff
symfony console doctrine:migrations:migrate
```

### Load the fixtures

```sh
symfony console doctrine:fixtures:load
```
