# CakePHP Tutorial

## Version
- CakePHP v4.x

## Reference
- [CakePHP v4.x](https://cakephp.org)
- [CakePHP v4.x Cook Book : チュートリアルと例](https://book.cakephp.org/4/ja/tutorials-and-examples.html)
- [GitHub : cakephp/cakephp](https://github.com/cakephp/cakephp)

## For Development

## Built-In Web Server
```
$ ./bin/cake server

or

$ ./bin/cake server -p 8765
```
Then visit `http://localhost:8765` to see the welcome page.

## Migration
### Reference
- [CakePHP Migraitons v3.x Cook Book](https://book.cakephp.org/migrations/3/ja/index.html)

### Make
```
$ ./bin/cake bake migration CreateProducts
```

### Run
```
$ ./bin/cake migrations migrate
```

### Rollback
```
$ ./bin/cake migrations rollback
```

## Database Seeding

### Reference
- [CakePHP Migraitons v3.x Cook Book : `seed` データベースの初期データ投入](https://book.cakephp.org/migrations/3/ja/index.html#seed)
- [Phinx v0.12 Cook Book : Database Seeding](https://book.cakephp.org/phinx/0/en/seeding.html)

### Make
```
$ ./bin/cake bake seed Products
```

### Run
```
$ ./bin/cake migrations seed --seed ProductsSeed
```

## Model

### Make
```
$ ./bin/cake bake model Products
```

- `src/Model/Entity/Product.php`
- `src/Model/Table/ProductsTable.php`
- `tests/Fixture/ProductsFixture.php`
- `tests/TestCase/Model/Table/ProductsTableTest.php`

## Configuration
Read and edit the environment specific `config/app_local.php` and setup the 
`'Datasources'` and any other configuration relevant for your application.
Other environment agnostic settings can be changed in `config/app.php`.

## Layout
The app skeleton uses [Milligram](https://milligram.io/) (v1.3) minimalist CSS
framework by default. You can, however, replace it with any other library or
custom styles.
