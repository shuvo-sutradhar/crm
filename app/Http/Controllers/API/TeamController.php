<?php

namespace App\Http\Controllers\API;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\TeamResource;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;
use App\Notifications\WelcomeTeamNotification;

class TeamController extends Controller
{

    /**
     * constant declear for remove duplication of image path
     */
    const PROFILE_PATH = '/assets/images/profile-pic/';


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(request()->get('page')) {
            // get user with pagination
            return TeamResource::collection(User::where('account_role', '!=' , 2)->paginate(10));
        } else {
            // get all user
            return User::select('name','slug')->where('account_role', '!=' , 2)->get();
        }
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // data validation
        $this->validate($request, [
            'name'  => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users',
            'phone' => 'required|regex:/(01)[0-9]{9}/|max:20|unique:users',
            'password' => 'nullable|min:6|required_with:password_confirmation|same:password_confirmation',
            'role'  => 'required',
        ]);

        // insert image to directory
        if($request->profile_photo){
            $name = time().'.' . explode('/', explode(':', substr($request->profile_photo, 0, strpos($request->profile_photo, ';')))[1])[1];
            \Image::make($request->profile_photo)->save(public_path(self::PROFILE_PATH).$name);
            $request->profile_photo     = $name;
        }
        
        $password = $request->password ? $request->password : 12345678;
        // Create user
        $team = User::create([
            'name'              => $request->name,
            'email'             => $request->email,
            'password'          => Hash::make($password),
            'account_role'      => 1,
            'phone'             => $request->phone,
            'profile_photo'     => $request->profile_photo,
        ]);

        // update cast field for email verification
        $team->email_verified_at = now();
        $team->save();

        //assign role to team
        $roleId = Role::where('slug', $request->role)->pluck('id')->toArray();
        $team->roles()->attach($roleId);

        // send welcome email to team
        if($request->mail){
            $team->notify(new WelcomeTeamNotification($password));
        }

        // Create activity log 
        activity()
            ->performedOn($team)
            ->causedBy(auth()->user())
            ->withProperties(['customProperty' => 'customValue'])
            ->log("Created team account for <strong>{$team->name}</strong>");

        return $this->responseWithSuccess('Team member added successfully.',$team);

    }



    /**
     * Display a listing of the resource.
     *
     */
    public function search($queries)
    {
        return TeamResource::collection(User::where(function($query) use ($queries) {
                                            $query->where('name', 'like', '%' . $queries . '%')
                                            ->orWhere('email', 'like', '%' . $queries . '%')
                                            ->orWhere('phone', 'like', '%' . $queries . '%');
                                        })
                                        ->where('account_role', '!=' , 2)
                                        ->latest()
                                        ->paginate(10));
    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        return new TeamResource(User::where('slug',$slug)->with('roles')->firstOrfail());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {

        // get associate role with slug
        $team = User::where('slug',$slug)->with('roles')->first();

  
        // Validate data
        $this->validate($request, [
            'name'  => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,'.$team->id,
            'phone' => 'required|regex:/(01)[0-9]{9}/|max:20|nullable|max:20|unique:users,phone,'.$team->id,
            'password' => 'nullable|min:6|required_with:password_confirmation|same:password_confirmation',
            'role'  => 'required',
        ]);

        // check and update user profile picture
        if($request->profile_photo != $team->profile_photo){
            $name = time().'.' . explode('/', explode(':', substr($request->profile_photo, 0, strpos($request->profile_photo, ';')))[1])[1];
            \Image::make($request->profile_photo)->save(public_path(self::PROFILE_PATH).$name);
            $request->profile_photo   = $name;
            //delete previous image
            $userPhoto = public_path(self::PROFILE_PATH).$team->profile_photo;
            if(file_exists($userPhoto)){
                @unlink($userPhoto);
            }
        }

        // update user info
        $team->name        =   $request->name;
        $team->email       =   $request->email;
        $team->phone       =   $request->phone;
        $team->profile_photo =   $request->profile_photo;
        if($request->password) {
            $team->password = Hash::make($request->password);
        }

        // update team member info
        $team->save();

        // update role
        if($request->role && count($team->roles) <= 0) {
            $roleId = Role::where('slug', $request->role)->pluck('id')->toArray();
            $team->roles()->attach($roleId);
        } else {
            if($request->role != $team->roles[0]->slug){
                $team->roles()->detach();
            
                $roleId = Role::where('slug', $request->role)->pluck('id')->toArray();
                $team->roles()->attach($roleId);
            } 
        }

        

        // Create activity log 
        activity()
        ->performedOn($team)
        ->causedBy(auth()->user())
        ->log("Updated team account for <strong>{$team->name}</strong>");

        return $this->responseWithSuccess('Team member updated successfully.',$team);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {

        $user = User::where('slug', $slug)->first();
        if($user) {
            //remove profile image
            if(!is_null($user->profile_photo)){
                $userPhoto = public_path(self::PROFILE_PATH) . $user->profile_photo;
                if(file_exists($userPhoto)){
                    @unlink($userPhoto);
                }
            }

            $user->delete();

            // Create activity log 
            activity()
            ->performedOn($user)
            ->causedBy(auth()->user())
            ->log("<strong>{$user->name}</strong>'s account has been deleted.");

            return $this->responseWithSuccess('Team deleted successfully',$user);
        }
        return $this->responseWithError('Opps! You are trying with bad request..');

    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  array  $user_slug
     * @return \Illuminate\Http\Response
     */
    public function delete_teams(Request $request)
    {

        foreach($request->data as $slug) {
            $user = User::where('slug', $slug)->firstOrFail();
            //remove profile image
            if(!is_null($user->profile_photo)){
                $userPhoto = public_path(self::PROFILE_PATH) . $user->profile_photo;
                if(file_exists($userPhoto)){
                    @unlink($userPhoto);
                }
            }
            $user->delete();
        }
        return $this->responseWithSuccess('Team deleted successfully');
 
    }


}
