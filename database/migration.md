> php artisan make:migration create_TABLE-NAME_table
```
public function up(): void
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id('customer_id'); //cutomer_id
            $table->string('name',60);
            $table->string('email',100);
            $table->enum('gender','M','F','O')->nullable();
            $table->text('address');
            $table->date('dob');
            $table->string('password');
            $table->boolean('status')->default(1);
            $table->boolean('points')->default(0);
            $table->timestamps(); // created at && updated at
        });
    }
```
```php artisan migrate```    - to create table\
```php artison migrate:rollback```  - to roll back table\
```php artisan migrate:refresh``` - refresh all tables

> php artisan make:migration add_columns_to_TABLE-NAME_table 
