<?php

namespace App\Models\Quote;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuoteVehicle extends Model
{
    use HasFactory;

    protected $fillable = [
        'quote_id',
        'year',
        'make',
        'model',
        'vin',
        'is_running',
        'size'
    ];

    const VEHICLE_SIZE_SCOOTER = 1;
    const VEHICLE_SIZE_MOTORCYCLE_SMALL = 2;
    const VEHICLE_SIZE_MOTORCYCLE_MEDIUM = 3;
    const VEHICLE_SIZE_MOTORCYCLE_LARGE = 4;
    const VEHICLE_SIZE_TRIKE = 5;
    const VEHICLE_SIZE_GOLF_CART_STANDARD = 6;
    const VEHICLE_SIZE_GOLF_CART_STRETCHED = 7;
    const VEHICLE_SIZE_GOLF_CART_LIFTED = 8;
    const VEHICLE_SIZE_GOLF_CART_STRETCHED_LIFTED = 9;
    const VEHICLE_SIZE_CAR_MINI = 10;
    const VEHICLE_SIZE_CAR_SPORTS = 11;
    const VEHICLE_SIZE_CAR_COMPACT = 12;
    const VEHICLE_SIZE_CAR_MIDSIZE = 13;
    const VEHICLE_SIZE_CAR_LARGE = 14;
    const VEHICLE_SIZE_STATION_WAGON = 15;
    const VEHICLE_SIZE_STATION_WAGON_LARGE = 16;
    const VEHICLE_SIZE_SUV_SMALL = 17;
    const VEHICLE_SIZE_SUV_MEDIUM = 18;
    const VEHICLE_SIZE_SUV_LARGE = 19;
    const VEHICLE_SIZE_SUV_EXTRA_LARGE = 20;
    const VEHICLE_SIZE_MINIVAN = 21;
    const VEHICLE_SIZE_VAN_FULL_SIZE = 22;
    const VEHICLE_SIZE_VAN_LARGE_FULL_SIZE = 23;
    const VEHICLE_SIZE_VAN_EXTENDED_XL = 24;
    const VEHICLE_SIZE_TRUCK_SMALL_2WD = 25;
    const VEHICLE_SIZE_TRUCK_SMALL_4WD = 26;
    const VEHICLE_SIZE_TRUCK_MEDIUM = 27;
    const VEHICLE_SIZE_TRUCK_LARGE = 28;
    const VEHICLE_SIZE_TRUCK_EXTRA_LARGE = 29;
    const VEHICLE_SIZE_TRUCK_DUALLY = 30;
    const VEHICLE_SIZE_TRUCK_COMMERCIAL = 31;
    const VEHICLE_SIZE_OTHER = 32;

    const VEHICLE_SIZE_MAP = [
        self::VEHICLE_SIZE_SCOOTER => 'Moped / Scooter',
        self::VEHICLE_SIZE_MOTORCYCLE_SMALL => 'Motorcycle - Small',
        self::VEHICLE_SIZE_MOTORCYCLE_MEDIUM => 'Motorcycle - Medium',
        self::VEHICLE_SIZE_MOTORCYCLE_LARGE => 'Motorcycle - Large',
        self::VEHICLE_SIZE_TRIKE => 'Trike / ATV',
        self::VEHICLE_SIZE_GOLF_CART_STANDARD => 'Golf Cart Standard',
        self::VEHICLE_SIZE_GOLF_CART_LIFTED => 'Golf Cart Lifted',
        self::VEHICLE_SIZE_GOLF_CART_STRETCHED => 'Golf Cart Stretched',
        self::VEHICLE_SIZE_GOLF_CART_STRETCHED_LIFTED => 'Golf Cart Stretched Lifted',
        self::VEHICLE_SIZE_CAR_MINI => 'Car - Mini',
        self::VEHICLE_SIZE_CAR_SPORTS => 'Car - Sports',
        self::VEHICLE_SIZE_CAR_COMPACT => 'Car - Compact',
        self::VEHICLE_SIZE_CAR_MIDSIZE => 'Car - Midsize',
        self::VEHICLE_SIZE_CAR_LARGE => 'Car - Large',
        self::VEHICLE_SIZE_STATION_WAGON => 'Station Wagon',
        self::VEHICLE_SIZE_STATION_WAGON_LARGE => 'Station Wagon - Large',
        self::VEHICLE_SIZE_SUV_SMALL => 'SUV - Small',
        self::VEHICLE_SIZE_SUV_MEDIUM => 'SUV - Medium',
        self::VEHICLE_SIZE_SUV_LARGE => 'SUV - Large',
        self::VEHICLE_SIZE_SUV_EXTRA_LARGE => 'SUV - Extra Large',
        self::VEHICLE_SIZE_MINIVAN => 'Minivan',
        self::VEHICLE_SIZE_VAN_FULL_SIZE => 'Van - Full Size',
        self::VEHICLE_SIZE_VAN_LARGE_FULL_SIZE => 'Van - Large Full Size',
        self::VEHICLE_SIZE_VAN_EXTENDED_XL => 'Van - Extended XL',
        self::VEHICLE_SIZE_TRUCK_SMALL_2WD => 'Truck - Small 2WD',
        self::VEHICLE_SIZE_TRUCK_SMALL_4WD => 'Truck - Small 4WD',
        self::VEHICLE_SIZE_TRUCK_MEDIUM => 'Truck - Medium',
        self::VEHICLE_SIZE_TRUCK_LARGE => 'Truck - Large',
        self::VEHICLE_SIZE_TRUCK_EXTRA_LARGE => 'Truck - Extra Large',
        self::VEHICLE_SIZE_TRUCK_DUALLY => 'Truck - Dually',
        self::VEHICLE_SIZE_TRUCK_COMMERCIAL => 'Truck - Commercial',
        self::VEHICLE_SIZE_OTHER => 'Other'
    ];

    public function getSizeNameAttribute()
    {
        return self::VEHICLE_SIZE_MAP[$this->size] ?? '';
    }

    public function getVehicleStringAttribute()
    {
        return $this->year . ' ' . $this->make . ' ' . $this->model;
    }
}
