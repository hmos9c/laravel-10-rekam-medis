<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    public function scopeFilter($query, $filters)
    {
        $query->when($filters['search'] ?? false, function($query, $search) {
            return $query->where('time', 'like', '%' . $search . '%')
                ->orWhereHas('doctor', function($query) use($search){
                $query->where('id', 'like', '%' . $search . '%')
                    ->orWhere('name', 'like', '%' . $search . '%')
                    ->orWhere('specialist', 'like', '%' . $search . '%')
                    ->orWhere('phonenumber', 'like', '%' . $search . '%')
                    ->orWhere('accepted', 'like', '%' . $search . '%')
                    ->orWhere('address', 'like', '%' . $search . '%')
                    ->orWhereHas('gender', function($query) use($search){
                    $query->where('gender', 'like', '%' . $search . '%');
                    });
                })
                ->orWhereHas('day', function($query) use($search){
                    $query->where('name', 'like', '%' . $search . '%');
                });
        });
    }
    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }
    public function day()
    {
        return $this->belongsTo(Day::class);
    }
}
