<?php

namespace App\Http\Controllers\Cms;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use Illuminate\Database\QueryException;
use App\Models\User, Session;

class UsersController extends CmsMainController
{
    # read
    public function index()
    {
        $dtv =& self::$dtv;
        $dtv['users'] = User::getUsers(true);
        $dtv['paginate_data'] = $this->createPaginateData($dtv['users'], 'cms/users');
        if(is_object($dtv['paginate_data'])) return $dtv['paginate_data'];
        $dtv['paginate_data']['is_details'] = false;
        $dtv['paginate_data']['redirect'] = 'cms/users';
        $dtv['nav_active']['active'] = 'users';
        return view('cms.users.users_index', $dtv);
    }

    # create
    public function create()
    {
        self::$dtv['rids'] = [
            'Regular' => 5,
            'View' => 6,
            'Admin' => 7
        ];
        self::$dtv['nav_active']['active'] = 'users';
        return view('cms.users.users_create', self::$dtv);
    }
    
    public function store(UserRequest $request)
    {
        User::SaveNew($request, false, true);
        return redirect('cms/users');
    }
    
    # update
    public function edit(Request $request, $uid)
    {
        $dtv =& self::$dtv;
        
        $dtv['back_to_page'] = $request['back_to_page'];
        $dtv['rids'] = [
            'Regular' => 5,
            'View' => 6,
            'Admin' => 7
        ];
        $dtv['user'] = User::findUser($uid);
        $dtv['nav_active']['active'] = 'users';

        return view('cms.users.users_edit', $dtv);
    }

    public function update(UserRequest $request, $uid)
    {
        User::updateUser($request, $uid);
        return redirect('cms/users' . '?page=' . $request['back_to_page']);
    }

    # delete
    public function show(Request $request, $uid)
    {
        self::$dtv['back_to_page'] = $request['back_to_page'];
        self::$dtv['user_id'] = $uid;
        self::$dtv['nav_active']['active'] = 'users';
        return view('cms.users.users_delete', self::$dtv);
    }

    public function destroy(Request $request, $uid)
    {
        try{

            User::deleteUser($uid);
            Session::flash('warning', 'Item deleted successfully');

        }catch(QueryException $error){

            Session::flash('error', 'An item linked to another item in the system cannot be deleted');
            
        }
        
        return redirect('cms/users' . '?page=' . $request['back_to_page']);
    }
}
