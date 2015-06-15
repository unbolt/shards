<?php
namespace Shards\Repositories;

use Shards\User;

class UserRepository {
    public function findByUserNameOrCreate($userData) {
        $user = User::where('provider_id', '=', $userData->id)->first();

        if(!$user) {
            $user = User::create([
                'provider_id' => $userData->id,
                'name' => $userData->nickname,
                'email' => $userData->email,
                'avatar' => $userData->avatar,
                'active' => 1,
            ]);
        }

        $this->checkIfUserNeedsUpdating($userData, $user);
        return $user;
    }

    public function checkIfUserNeedsUpdating($userData, $user) {

        $socialData = [
            'avatar' => $userData->avatar,
            'email' => $userData->email,
            'name' => $userData->nickname
        ];
        $dbData = [
            'avatar' => $user->avatar,
            'email' => $user->email,
            'name' => $user->nickname
        ];

        if (!empty(array_diff($socialData, $dbData))) {
            $user->avatar = $userData->avatar;
            $user->email = $userData->email;
            $user->name = $userData->nickname;
            $user->save();
        }
    }
}
