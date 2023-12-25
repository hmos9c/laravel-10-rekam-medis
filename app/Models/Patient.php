<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;
    protected $guarded = [''];
    public function scopeFilter($query, $filters)
    {
        $query->when($filters['search'] ?? false, function($query, $search) {
            return $query->where('id', 'like', '%' . $search . '%')
                ->orWhere('name', 'like', '%' . $search . '%')
                ->orWhere('city', 'like', '%' . $search . '%')
                ->orWhere('dateofbirth', 'like', '%' . $search . '%')
                ->orWhere('address', 'like', '%' . $search . '%')
                ->orWhere('job', 'like', '%' . $search . '%')
                ->orWhere('dateofentry', 'like', '%' . $search . '%')
                ->orWhere('phonenumber', 'like', '%' . $search . '%')
                ->orWhere('email', 'like', '%' . $search . '%')
                ->orWhereHas('gender', function($query) use($search){
                    $query->where('gender', 'like', '%' . $search . '%');
                })
                ->orWhereHas('religion', function($query) use($search){
                    $query->where('name', 'like', '%' . $search . '%');
                })
                ->orWhereHas('status', function($query) use($search){
                    $query->where('status', 'like', '%' . $search . '%');
                })
                ->orWhereHas('nationality', function($query) use($search){
                    $query->where('nationality', 'like', '%' . $search . '%');
                });
        });
    }
    public function gender()
    {
        return $this->belongsTo(Gender::class);
    }
    public function religion()
    {
        return $this->belongsTo(Religion::class);
    }
    public function status()
    {
        return $this->belongsTo(Status::class);
    }
    public function nationality()
    {
        return $this->belongsTo(Nationality::class);
    }
    public function record()
    {
        return $this->hasMany(Record::class);
    }
}
