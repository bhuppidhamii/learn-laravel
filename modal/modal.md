> php artisan:make model:Costomer
>
```
class Customer extends Model
{
    use HasFactory;
    private $table='customers';
    private $primaryKey='customer_id';
}
```
>  php artisan make:model Product --migration\
> creates Model as well as Migration
