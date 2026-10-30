<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserRepository
{
    public function getUserById($id)
    {
        if ( $id ) {
            $user = User::findOrFail( $id );
        }
        else {
            $user = User::findOrFail( Auth::user()->id );
        }

        return $user;
    }

    // check user is super admin or admin
    public function checkSuperAdminOrAdmin($authUser, $requestedUser)
    {
        if ( $authUser->hasRole('Super Admin') || ( $authUser->hasRole('Admin') && !$requestedUser->hasRole('Super Admin') ) ) {

            return true;
        }
        else {

            return false;
        }
    }

    public function processMetaData($user, $request)
    {
        $data = [];

        // $data['phone_number'] = $request->phone_number ?? null;

        foreach ($data as $key => $value) {
            $this->updateOrCreateMeta($user, $key, $value);
        }

        return true;
    }

    // update or create post meta
    public function updateOrCreateMeta($user, $key, $value)
    {
        $user->userMeta()->updateOrInsert(
            ['user_id' => $user->id, 'meta_key' => $key],
            ['meta_value' => $value]
        );
    }
}
