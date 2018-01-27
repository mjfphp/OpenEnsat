<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class VerifyController extends Controller
{
    /**
     * verify the user with a given token
     *
     * @param string $token
     * @return Response
     */
    public function verify($token)
    {
        $u=User::Where('token','=',$token)->first();//verify the user

        if($u)
        {
            $u->update(['token' => null]);

            return redirect()

                ->route('home')

                ->with('success','Account Verified!');
        }

        else
            return redirect('/');

    }
}
//\Illuminate\Http\RedirectResponse