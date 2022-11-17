<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class CrmCustomer extends Model implements HasMedia
{
    use SoftDeletes;
    use InteractsWithMedia;
    use HasFactory;

    public $table = 'crm_customers';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'first_name',
        'last_name',
        'company',
        'vat',
        'email',
        'phone',
        'phone_2',
        'address',
        'zip',
        'location',
        'country',
        'website',
        'description',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')->fit('crop', 50, 50);
        $this->addMediaConversion('preview')->fit('crop', 120, 120);
    }

    public function assignedUserAssetsHistories()
    {
        return $this->hasMany(AssetsHistory::class, 'assigned_user_id', 'id');
    }

    public function customerCrmNotes()
    {
        return $this->hasMany(CrmNote::class, 'customer_id', 'id');
    }

    public function customerCrmDocuments()
    {
        return $this->hasMany(CrmDocument::class, 'customer_id', 'id');
    }

    public function crmCustomerRepairs()
    {
        return $this->hasMany(Repair::class, 'crm_customer_id', 'id');
    }

    public function customerAssets()
    {
        return $this->hasMany(Asset::class, 'customer_id', 'id');
    }

    public function customerAssetLocations()
    {
        return $this->hasMany(AssetLocation::class, 'customer_id', 'id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
