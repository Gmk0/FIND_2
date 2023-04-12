<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Casts\AsArrayObject;

class Freelance extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nom',
        'prenom',
        'identifiant',
        'experience',
        'description',
        'langue',
        'diplome',
        'certificat',
        'site',
        'competences',
        'taux_journalier',
        'comptes',
        'Sub_categorie',
        'localisation',
        'user_id',
        'category_id',
        'level',
    ];

    public static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $model->user_id = auth()->user()->id;
        });
    }

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'langue' =>
        AsArrayObject::class,
        'diplome' =>
        AsArrayObject::class,
        'certificat' =>
        AsArrayObject::class,
        'competences' =>
        AsArrayObject::class,
        'taux_journalier' => 'decimal:2',
        'comptes' => 'array',
        'Sub_categorie' => 'array',
        'localisation' =>
        AsArrayObject::class,
        'user_id' => 'integer',
        'category_id' => 'integer',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function isOnline()
    {

        if ($this->user->is_online == 1) {
            return true;
        } else {
            return false;
        }
    }


    public function ProjectResponse()
    {
        return $this->HasOne(ProjectResponse::class);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function services(): HasMany
    {
        return $this->hasMany(Service::class);
    }

    public function conversations(): HasMany
    {
        return $this->hasMany(Conversation::class);
    }

    public function messages(): HasMany
    {
        return $this->hasMany(Message::class);
    }
}
