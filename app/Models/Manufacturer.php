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

    public static $manufacturers=['ALFA ROMEO', 'ACURA', 'AUDI', 'BENTLEY', 'BMW', 'BUILD YOUR DREAM (BYD)', 'CHERRY CARS', 
            'CHEVROLET', 'CHRYSLER', 'DAEWOO', 'DAIHATSU', 'DODGE', 'FERRARI', 'FIAT UNO', 'FORD', 'FOTON',
            'GAC (Legado Motors)', 'GEELY', 'HAIMA', 'HONDA', 'HYUNDAI', 'ISUZU', 'JAGUAR', 'KIA', 'LAMBORGHINI',
            'LAND ROVER', 'LEXUS', 'MAHINDRA', 'MASERATI', 'MAXUS', 'MAZDA', 'MERCEDES BENZ', 'MG (Morris Garage)',
            'MINI', 'MITSUBISHI', 'NISSAN', 'OPEL', 'PEUGEOT', 'PORSCHE', 'PROTON WIRA', 'SSANGYONG', 'SUBARU',
            'SUZUKI', 'TATA', 'TOYOTA', 'VOLKSWAGEN', 'VOLVO', 'JEEP', 'GMC'];
}
