<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employe extends Model
{
    use HasFactory;

    protected $table = 'employes';

    protected $fillable = [
        'first_name',
        'last_name',
        'user_id',
        'company_id',
        'email',
        'phone',
    ];

    protected $appends = ['full_name'];

    const PAGINATE_DATA = 5;

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function getFullNameAttribute()
    {
        if ($this->first_name && $this->last_name) {
            return $this->first_name . ' '. $this->last_name;
        }

        return $this->first_name;
    }
}
