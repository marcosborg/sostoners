<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AssetLocation extends Model
{
    use SoftDeletes;
    use HasFactory;

    public $table = 'asset_locations';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name',
        'address',
        'zip',
        'location',
        'country',
        'customer_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function locationAssets()
    {
        return $this->hasMany(Asset::class, 'location_id', 'id');
    }

    public function locationAssetsHistories()
    {
        return $this->hasMany(AssetsHistory::class, 'location_id', 'id');
    }

    public function customer()
    {
        return $this->belongsTo(CrmCustomer::class, 'customer_id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
