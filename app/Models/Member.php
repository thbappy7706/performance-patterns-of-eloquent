<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Member extends Model
{
    use HasFactory;

    public function company():BelongsTo
    {
        return $this->belongsTo(Company::class);
    }

    public function scopeSearch($query, string $terms = null)
    {
        if (config('database.default') === 'mysql' || config('database.default') === 'sqlite') {

//            collect(str_getcsv($terms, ' ', '"'))->filter()->each(function ($term) use ($query) {
//                $term = $term.'%';
//                $query->where(function ($query) use ($term) {
//                    $query->where('first_name', 'like', $term)
//                        ->orWhere('last_name', 'like', $term)
//                        ->orWhereIn('company_id', Company::query()
//                            ->where('name', 'like', $term)
//                            ->pluck('id')
//                        );
//                });
//            });

            collect(explode(' ', $terms))->filter()->each(function ($term) use ($query) {
                $term = '%'.$term.'%';
                $query->where(function ($query) use ($term) {
                    $query->where('first_name', 'like', $term)
                        ->orWhere('last_name', 'like', $term)
//                        ->orWhereHas('company', function ($query) use ($term) {
//                            $query->where('name', 'like', $term);
//                        });

                            //for more faster then whereHas
                        ->orWhereIn('company_id', Company::query()
                            ->where('name', 'like', $term)
                            ->pluck('id')
                        );
                });
            });
        }

        if (config('database.default') === 'pgsql') {
            collect(explode(' ', $terms))->filter()->each(function ($term) use ($query) {
                $term = '%'.$term.'%';
                $query->where(function ($query) use ($term) {
                    $query->where('first_name', 'ilike', $term)
                        ->orWhere('last_name', 'ilike', $term)
                        ->orWhereHas('company', function ($query) use ($term) {
                            $query->where('name', 'ilike', $term);
                        });
                });
            });
        }
    }


    public function scopeFuzzySearch($query, string $terms = null)
    {
        collect(str_getcsv($terms, ' ', '"'))->filter()->each(function ($term) use ($query) {
            $term = preg_replace('/[^A-Za-z0-9]/', '', $term).'%';
            $query->whereIn('id', function ($query) use ($term) {
                $query->select('id')
                    ->from(function ($query) use ($term) {
                        $query->select('members.id')
                            ->from('members')
                            ->where('members.first_name_normalized', 'like', $term)
                            ->orWhere('members.last_name_normalized', 'like', $term)
                            ->union(
                                $query->newQuery()
                                    ->select('members.id')
                                    ->from('members')
                                    ->join('companies', 'members.company_id', '=', 'companies.id')
                                    ->where('companies.name_normalized', 'like', $term)
                            );
                    }, 'matches');
            });
        });
    }

}
