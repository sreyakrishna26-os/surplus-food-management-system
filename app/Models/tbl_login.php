<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\tbl_donor;
use App\Models\tbl_buyer;

class tbl_login extends Authenticatable
{
    use Notifiable;

    protected $table = 'tbl_logins';

    protected $primaryKey = 'login_id';

    protected $fillable = [
        'username',
        'password',
        'role',
        'status',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function getAuthPassword()
    {
        return $this->password;
    }

    /*
    |--------------------------------------------------------------------------
    | Donor Relationship
    |--------------------------------------------------------------------------
    */

    public function donor()
    {
        return $this->hasOne(
            tbl_donor::class,
            'login_id',
            'login_id'
        );
    }

    /*
|--------------------------------------------------------------------------
| Buyer Relationship
|--------------------------------------------------------------------------
*/

public function buyer()
{
    return $this->hasOne(
        tbl_buyer::class,
        'login_id',
        'login_id'
    );
}
}