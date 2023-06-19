<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Vacation extends Model
{
    public function scopeFilter($query, array $filters)
    {
        return DB::table('vacations as va')
            ->join('cities as ci', 'va.id', '=', 'ci.id')
            ->join('countries as co', 'ci.country_id', '=', 'co.id')
            ->join('users as up', 'va.provided_id', '=', 'up.id')
            ->leftJoin('users as ub', 'va.booked_id', '=', 'ub.id')
            ->select('city_name', 'country_name', 'description', 'price', 'start_date', 'end_date', 'up.name as provided_by', 'ub.name as booked_by','provided_id')
            ->where('va.booked_id', '=', ($filters['bookedByMe'] ?? null))
            ->when(
                $filters['providedByMe'] ?? false,
                fn ($query, $providedByMe) =>
                $query->where('va.provided_id', '=', $providedByMe)
            )
            ->when(
                $filters['search'] ?? false,
                fn ($query, $search) =>
                $query->where(
                    fn ($query) =>
                    $query->where('country_name', 'like', '%' . $search . '%')
                        ->orWhere('city_name', 'like', '%' . $search . '%')
                )
            );
    }



    use HasFactory;
    public function city()
    {
        return $this->belongsTo(City::class);
    }
    public function providedBy()
    {
        return $this->belongsTo(User::class);
    }

    public function bookedBy()
    {
        return $this->belongsTo(User::class);
    }
}
