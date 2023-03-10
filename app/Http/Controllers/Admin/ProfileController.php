<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    //profile index
    public function profile()
    {
        return view('profile.profile', [
            'data' => User::where('id', auth()->user()->id)->first(),
        ]);
    }

    //profile update
    public function update(Request $request)
    {
        $this->validationCheck($request);

        if ($request->has('img')) {
            //deleting local img
            $dbImg = auth()->user()->img;
            if ($dbImg != null) {

                File::delete(public_path() . '/img/adminImage/' . $dbImg);
            }

            $data = $this->requestedDataWithImage($request);
            User::where('id', auth()->user()->id)->update($data);
            return back()->with('updateMessage', 'Profile Updated Successfully.');
        };
        $data = $this->requestedDataWithoutImage($request);
        User::where('id', auth()->user()->id)->update($data);
        return back()->with('updateMessage', 'Profile Updated Successfully.');
    }
    //profile password change page
    public function passwordChagePage()
    {
        return view('profile.password-change');
    }


    //profile password change
    public function passwordUpdate(Request $request)
    {
        $request->validate([
            'currentPassword' => 'required|min:6',
            'newPassword' => 'required|min:6',
            //  'confirmPassword' => 'required|min:6|same:newPassword',

        ]);
        $dbPsw = User::select('password')->where('id', Auth()->user()->id)->first();
        $hashdbPsw = $dbPsw->password;
        if (Hash::check($request->currentPassword, $hashdbPsw)) {
            $newPsw = [
                'password' => Hash::make($request->newPassword),
            ];
            User::where('id', Auth()->user()->id)->update($newPsw);
            return redirect()->route('profile#index')->with(['updateMessage' => 'Password Updated Successfully..']);
        } else {
            return back()->with(['PswnotMatch' => 'Wrong Current Password! Please Try Again!!']);
        }
    }

    //AdminList
    public function adminList()
    {
        $admins = User::where('id', '!=', Auth()->user()->id)->paginate('5');
        return view('profile.admin-list', compact('admins'));
    }

    //admin delete
    public function destory(User $admin)
    {
        $admin->delete();
        return back()->with('deleteMessage', 'Admin Deleted Successfully!!');
    }

    //PRIVATE FUNCTON
    private function validationCheck($request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required'
        ]);
    }
    private function requestedDataWithoutImage($request)
    {
        return [
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone
        ];
    }
    private function requestedDataWithImage($request)
    {

        $file = $request->img;
        $fileName = uniqid() . $file->getClientOriginalName();
        $file->move(public_path() . '/img/adminImage/', $fileName);
        return [
            'name' => $request->name,
            'email' => $request->email,
            'img' => $fileName,
            'phone' => $request->phone
        ];
    }
}
