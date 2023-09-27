<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;
    public function Service(){
        return $this->belongsTo(Service::class,'services_id');
    }
    public function ServiceCategory(){
        return $this->belongsTo(ServiceCategory::class,'service_categories_id');
    }
}
