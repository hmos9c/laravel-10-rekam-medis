<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;
    protected $guarded = [''];
    public function scopeFilter($query, $filters)
    {
        $query->when($filters['search'] ?? false, function($query, $search) {
            return $query->where('id', 'like', '%' . $search . '%')
                ->orWhere('name', 'like', '%' . $search . '%')
                ->orWhere('specialist', 'like', '%' . $search . '%')
                ->orWhere('phonenumber', 'like', '%' . $search . '%')
                ->orWhere('accepted', 'like', '%' . $search . '%')
                ->orWhere('address', 'like', '%' . $search . '%')
                ->orWhereHas('gender', function($query) use($search){
                    $query->where('gender', 'like', '%' . $search . '%');
                });
        });
    }
    public function gender()
    {
        return $this->belongsTo(Gender::class);
    }
    public function schedule()
    {
        return $this->hasMany(Schedule::class);
    }
    public function record()
    {
        return $this->hasMany(Record::class);
    }
}
