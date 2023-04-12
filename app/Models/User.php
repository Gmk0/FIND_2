<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'last_activity' => 'datetime',
    ];

    public function canAccessFilament(): bool
    {
        return str_ends_with($this->email, '@find.com');
    }



    /**
     * The accessors to append to the model's array form.
     *
     * @var array<int, string>
     */
    protected $appends = [
        'profile_photo_url',
    ];

    public function freelance()
    {
        return $this->hasOne(Freelance::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }

    public function projects()
    {
        return $this->hasMany(Project::class);
    }

    public function conversationProjects()
    {
        return $this->hasMany(ConversationProject::class);
    }

    public function messageProjects()
    {
        return $this->hasMany(MessageProject::class);
    }

    public function getIdFreelance()
    {
        return $this->freelance->id;
    }

    public function isOnline()
    {

        if ($this->user->is_online == 1) {
            return true;
        } else {
            return false;
        }
    }



    public function favorites()
    {
        return $this->belongsToMany(Freelance::class, 'favorites')->withTimestamps();
    }
    public function receivers()
    {
        return $this->hasMany(Message::class, 'receiver_id');
    }
    public function senders()
    {
        return $this->hasMany(Message::class, 'sender_id');
    }
    public function CommentsService()
    {
        return $this->hasOne(CommentsService::class);
    }

    public function conversations()
    {
        return $this->hasMany(conversation::class);
    }
    public function notifcations()
    {
        return $this->hasMany(Notification::class);
    }
    public function favoris()
    {
        return $this->belongsToMany(Freelance::class)->withTimestamps()->orderByDesc('favoris.created_at');
    }
}
