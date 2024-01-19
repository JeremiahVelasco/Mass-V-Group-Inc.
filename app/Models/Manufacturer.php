<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Manufacturer extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public static array $manufacturers = ['ALFA ROMEO', 'ACURA', 'AUDI', 'BENTLEY', 'BMW', 'BUILD YOUR DREAM (BYD)', 'CHERRY CARS', 
    'MANUFACTURER', 'CHEVROLET', 'CHEVROLET', 'CHRYSLER', 'DAEWOO', 'DAIHATSU', 'DODGE', 'MANUFACTURER', 'FERRARI',
    'FIAT UNO', 'FORD', 'FOTON', 'GAC (Legado Motors)', 'GEELY', 'HAIMA', 'MANUFACTURER', 'HONDA', 'HYUNDAI', 'MANUFACTURER',
    'ISUZU', 'JAGUAR', 'KIA', 'KIA', 'LAMBORGHINI', 'LAND ROVER', 'MANUFACTURER', 'LEXUS', 'MAHINDRA', 'MASERATI', 'MAXUS',
    'MAZDA', 'MAZDA', 'MANUFACTURER', 'MERCEDES BENZ', 'MG (Morris Garage)', 'MINI', 'MITSUBISHI', 'MANUFACTURER',
    'MITSUBISHI', 'NISSAN', 'NISSAN', 'OPEL', 'PEUGEOT', 'MANUFACTURER', 'PORSCHE', 'PROTON WIRA', 'SSANGYONG', 'SUBARU',
    'SUZUKI', 'SUZUKI', 'TATA', 'TOYOTA', 'MANUFACTURER', 'TOYOTA', 'VOLKSWAGEN', 'MANUFACTURER', 'VOLVO', 'JEEP', 'GMC'];
}
