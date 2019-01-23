<?php

namespace App;

use Illuminate\Http\Request;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Auth\Passwords\CanResetPassword;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function experiences() {
        return $this->hasMany(Experience::class);
    }

    public function referrals() {
        return $this->hasMany(Referral::class, 'referrer_id', 'id');
    }

    public function referred() {
        return $this->hasOne(Referral::class, 'referred_id', 'id');
    }

    public function shopping_carts() {
        return $this->hasMany(ShoppingCart::class);
    }

    public function projects() {
        return $this->hasMany(Project::class);
    }

    public function messages() {
        return $this->hasMany(Message::class);
    }

    public function notifications() {
        return $this->hasMany(Notification::class);
    }

    public function pending_notifications() {
        return $this->hasMany(PendingNotification::class);
    }

    public function roles_gained() {
        return $this->hasMany(RoleGained::class);
    }

    public function attempted_projects() {
        return $this->hasMany(AttemptedProject::class);
    }

    public function answered_tasks() {
        return $this->hasMany(AnsweredTask::class);
    }

    public function answered_task_files() {
        return $this->hasMany(AnsweredTaskFile::class);
    }

    public function reviewed_answered_task_files() {
        return $this->hasMany(ReviewedAnsweredTaskFile::class);
    }

    public function templates() {
        return $this->hasMany(Template::class);
    }

    public function verifyUser()
    {
        return $this->hasOne('App\VerifyUser');
    }

    public function resume()
    {
        return $this->hasOne(Resume::class);
    }

    public function creator_application() {
        return $this->hasOne(CreatorApplication::class);
    }

    public function portfolios() {
        return $this->hasMany(Portfolio::class);
    }

    public function created_attempted_projects() {
        return $this->hasMany(AttemptedProject::class, 'creator_id');
    }

    public function company_application() {
        return $this->hasOne(CompanyApplication::class);
    }

    public function received_reviews() {
        return $this->hasMany(Review::class, 'receiver_id');
    }

    public function invoices() {
        return $this->hasMany(Invoice::class);
    }

    public function sent_reviews() {
        return $this->hasMany(Review::class, 'sender_id');
    }
}
