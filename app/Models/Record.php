<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Record extends Model
{
    use HasFactory;
    protected $guarded = [''];
    public function scopeFilter($query, $filters)
    {
        $query->when($filters['search'] ?? false, function($query, $search) {
            return $query->where('id', 'like', '%' . $search . '%')
                ->orWhere('diagnosis', 'like', '%' . $search . '%')
                ->orWhere('description', 'like', '%' . $search . '%')
                ->orWhere('allergy', 'like', '%' . $search . '%')
                ->orWhere('height', 'like', '%' . $search . '%')
                ->orWhere('weight', 'like', '%' . $search . '%')
                ->orWhere('operation', 'like', '%' . $search . '%')
                ->orWhere('outdate', 'like', '%' . $search . '%')
                ->orWhere('blood', 'like', '%' . $search . '%')
                ->orWhere('tension', 'like', '%' . $search . '%')
                ->orWhere('hospital', 'like', '%' . $search . '%')
                ->orWhereHas('patient', function($query) use($search){
                    $query->where('id', 'like', '%' . $search . '%')
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
                })
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
                ->orWhereHas('drug', function($query) use($search){
                    $query->where('id', 'like', '%' . $search . '%')
                    ->orWhere('name', 'like', '%' . $search . '%')
                    ->orWhere('description', 'like', '%' . $search . '%')
                    ->orWhere('type', 'like', '%' . $search . '%')
                    ->orWhere('form', 'like', '%' . $search . '%')
                    ->orWhere('stock', 'like', '%' . $search . '%');
                })
                ->orWhereHas('bed', function($query) use($search){
                    $query->where('id', 'like', '%' . $search . '%')
                    ->orWhere('building', 'like', '%' . $search . '%')
                    ->orWhere('room', 'like', '%' . $search . '%');
                })
                ->orWhereHas('care', function($query) use($search){
                    $query->where('id', 'like', '%' . $search . '%')
                    ->orWhere('care', 'like', '%' . $search . '%');
                });
        });
    }
    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }
    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }
    public function drug()
    {
        return $this->belongsTo(Drug::class);
    }
    public function bed()
    {
        return $this->belongsTo(Bed::class);
    }
    public function care()
    {
        return $this->belongsTo(Care::class);
    }
}
