<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Drug extends Model
{
    use HasFactory;
    protected $guarded = [''];
    public function scopeFilter($query, $filters)
    {
        $query->when($filters['search'] ?? false, function($query, $search) {
            return $query->where('id', 'like', '%' . $search . '%')
                ->orWhere('name', 'like', '%' . $search . '%')
                ->orWhere('form', 'like', '%' . $search . '%')
                ->orWhere('type', 'like', '%' . $search . '%')
                ->orWhere('description', 'like', '%' . $search . '%')
                ->orWhere('stock', 'like', '%' . $search . '%');
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
    // public function record()
    // {
    //     return $this->belongsTo(Record::class);
    // }
}
