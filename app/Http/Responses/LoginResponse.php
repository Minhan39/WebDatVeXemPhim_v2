<?php
namespace App\Http\Responses;

use Laravel\Fortify\Contracts\LoginResponse as LoginResponseContract;
use Illuminate\Support\Facades\Auth;
use App\Models\Team;

class LoginResponse implements LoginResponseContract
{
    /**
     * @param  $request
     * @return mixed
     */
    public function toResponse($request)
    {
        // Get the current logged in user
        $user = Auth::user();

        // return response()->json([
        //     'user' => $user,
        //     'team' => $user->currentTeam,
        // ]);

        // Check if the user belongs to the "Admin" team
        if ($user->currentTeam && $user->currentTeam->name === 'Admin team') {
            $redirectUrl = '/dashboard';
        } 
        // Check if the user belongs to the "Customer" team
        else if ($user->currentTeam && $user->currentTeam->name === 'Customer team') {
            $redirectUrl = '/';
        } 
        // Default redirection
        else {
            $redirectUrl = '/';
        }

        return $request->wantsJson()
                    ? new JsonResponse('', 204)
                    : redirect()->intended($redirectUrl);
    }
}