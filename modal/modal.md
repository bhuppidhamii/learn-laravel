> php artisan:make model:Modelname
>
```
class Customer extends Model
{
    use HasFactory;
    private $table='customers';
    private $primaryKey='customer_id';
}
```
