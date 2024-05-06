<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Drug extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_drug';
    protected $guarded = [''];
    public function scopeFilter($query, $filters)
    {
        $query->when($filters['search'] ?? false, function($query, $search) {
            return $query->where('id_drug', 'like', '%' . $search . '%')
                ->orWhere('name', 'like', '%' . $search . '%')
                ->orWhere('form', 'like', '%' . $search . '%')
                ->orWhere('type', 'like', '%' . $search . '%')
                ->orWhere('description', 'like', '%' . $search . '%')
                ->orWhere('stock', 'like', '%' . $search . '%')
                ->orWhere('expired', 'like', '%' . $search . '%');
        });
    }
    // public function type()
    // {
    //     return $this->belongsTo(Type::class);
    // }
    // public function form()
    // {
    //     return $this->belongsTo(Form::class);
    // }
    public function record()
    {
        return $this->hasMany(Record::class, 'drug_id', 'id_drug');
    }
}
