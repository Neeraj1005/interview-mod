<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $table = 'companies';

    protected $fillable = [
        'name',
        'email',
        'user_id',
        'logo',
        'website',
    ];

    protected $appends = ['company_logo'];

    const PAGINATE_DATA = 5;

    public function getCompanyLogoAttribute()
    {
        return $this->logo ? asset( 'storage/' . $this->logo) : $this->defaultProfilePhotoUrl();
    }

    public function defaultProfilePhotoUrl()
    {
        return 'https://ui-avatars.com/api/?background=random&name=' . urlencode($this->name);
    }

    public function employees()
    {
        return $this->hasMany(Employe::class);
    }
}
