<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function setAuthorIdAttribute($author)
    {
        $this->attributes['author_id'] = (Author::firstOrCreate([
            'name' => $author
        ]))->id;
    }

    public function checkout($user)
    {
        $this->reservation()->create([
            'user_id' => $user->id,
            'checked_out_at' => now(),
        ]);
    }

    public function checkin($user)
    {
        $reservation = $this->reservation()
            ->where('user_id', $user->id)
            ->whereNotNull('checked_out_at')
            ->whereNull('checked_in_at')
            ->first();
//
        if(is_null($reservation)){
            throw  new \Exception();
        }
//
//        dd(2121212,$reservation);
        if(!is_null($reservation)) {
            $reservation->update([
                'checked_in_at' => now()
            ]);
        }
    }

    public function reservation()
    {
        return $this->hasMany(Reservation::class);
    }
}
