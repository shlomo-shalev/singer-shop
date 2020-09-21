<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB, Session, Hash;

class User extends Model
{

    static public function getUsers($cms = false){

        if($cms){

            return self::paginate(10);

        }else{

            return self::where('is_enter', '=', 1)
            ->first();

        }

    }

    static public function findUser($uid){

        return DB::table('users as u')
                 ->join('user_roles as ur', 'ur.uid', 'u.id')
                 ->select('u.*', 'ur.rid')
                 ->where('u.id', '=', $uid)
                 ->first();

    }

    public static function updateUser($request){

        $user = self::find($request['item_id']);
        $user->name = $request['name'];
        $user->email = $request['email'];
        $user->password = $request['password'] ? bcrypt($request['password']) : $user->password;
        $user->is_enter = $request['is_enter'] ? true : false;
        $user->save();

        DB::table('user_roles')
          ->where('uid', '=', $user->id)
          ->Update(['rid' => $request['rid']]);

        Session::flash('warning', 'User successfully updated!');

    }

    static public function deleteUser($uid){

        DB::table('user_roles')
          ->where('uid', '=', $uid)
          ->delete();

        self::destroy($uid);

    }
    
    public static function saveNew($request, $connect = true, $cms = false){

        $user = new self();
        $user->name = $request['name'];
        $user->email = $request['email'];
        $user->password = bcrypt($request['password']);
        $user->is_enter = $cms ? (bool) $request['is_enter'] : true;   
        $user->save();

        $rid = $cms ? $request['rid'] : 5;
        DB::table('user_roles')->insert([
            'uid' => $user->id,
            'rid' => $rid,
        ]);

        Session::flash('warning', 'New user created successfully!');

        if($connect){

        Session::put([
            'user_id' => $user->id,
            'user_name' => $user->name,
            'is_admin' => false,
            'is_viewing' => false,
        ]);
        Session::flash('warning', 'You have successfully registered!');
        
        }

    }

    public static function verify($request){

        $user = DB::table('users as u')
                  ->join('user_roles as ur', 'u.id', '=', 'ur.uid')
                  ->where('u.email', '=', $request['email'])
                  ->where('u.is_enter', '=', 1)
                  ->select('u.id', 'u.name', 'u.password', 'ur.rid')
                  ->first();
                  
        if( $user ){

            if(Hash::check($request['password'], $user->password)){

                Session::put([
                    'user_id' => $user->id,
                    'user_name' => $user->name,
                    'is_admin' => $user->rid == 7,
                    'is_viewing' => $user->rid == 6,
                ]);
                Session::flash('warning', 'you have successfully connected');
                
                return true;

            }else{

                return false;
            
            }

        }else{

            return false;

        }
        
    }

}