<?php

namespace App\Http\Controllers;

use Str;
use Hash;
use Mail;
use App\Models\User;
use App\Models\Station;
use App\Models\Division;
use App\Models\Position;
use App\Mail\RegisterMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */

    public function create(Request $request)
    {
        if (!empty(Auth::check())) {
            if (Auth::user()->user_type == 'super_admin') {
                return redirect('/super_admin/overview');
            } elseif (Auth::user()->user_type == 'admin') {
                return redirect('/admin/overview');
            } elseif (Auth::user()->user_type == 'encoder') {
                return redirect('/encoder/overview');
            } elseif (Auth::user()->user_type == 'viewer') {
                return redirect('/viewer/overview');
            }
        }

        // $stations = Station::get(["station", "id"]);
        $data['stations'] = Station::get(['station', 'id']);

        // dd($stations);

        // return view('register', compact('stations'));
        return view('register', $data);
    }

    public function fetchDivisions(Request $request)
    {
        // $divisions = Division::where("station_id", $request->station_id)->get(["division", "station_id"]);
        $data['divisions'] = Division::where('station_id', $request->station_id)
            ->orderBy('division', 'asc')
            ->get(['division', 'id']);

        // dd($divisions);
        // dd($data);

        return response()->json($data);
    }

    public function fetchPositions(Request $request)
    {
        // $positions = Position::where("division_id", $request->division_id)->get(["position", "division_id"]);
        $data['positions'] = Position::where('division_id', $request->division_id)
            ->orderBy('position', 'asc')
            ->get(['position', 'id']);

        return response()->json($data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());

        // if (password($request->password, $request->confirm_password)) {
        //     return redirect()->back()->with('error', 'Your password and confirm password did not match');
        // }

        // need muna icheck sa database kung valid yung PhilRice ID //
        $token = Http::post('https://isd.philrice.gov.ph/api_center/api/login',[
            "username" => 'hrisapi-ojt',
            "password" => 'P@ssw0rd'
        ]);
        $bearer_token = json_decode($token);
        $response = Http::withToken('Bearer ' .$bearer_token->token)->get('https://isd.philrice.gov.ph/api_center/api/hris/employees');
        // collection of philrice id
        $philriceIDs = collect($response['employees'])->pluck('emp_idno');

        $request->validate([
            'first_name' => 'required|regex:/^[\pL\s\-]+$/u|max:50',
            'mi' => 'required|max:50',
            'last_name' => 'required|regex:/^[\pL\s\-]+$/u|max:50',
            'email' => 'required|regex:/(.+)@(.+)\.(.+)/i|email|max:50|unique:users',
            'philrice_id' => 'required|max:50|unique:users',
            // 'philrice_id' => 'required|max:50',
            'station' => 'required',
            'division' => 'required',
            'position' => 'required',
            'password' => 'required|confirmed|min:8|regex:/(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&()\-^\/])/',
            'sq1' => 'required',
            'sq2' => 'required',
            'sq3' => 'required',
        ]);

        if ($philriceIDs->contains($request->philrice_id)) {
            return redirect()->back()->with(['error' => 'Oops...', 'message' => 'Your PhilRice ID is already taken!']);
        }

        // User::where('email', '=', $email)->first();
        // $station = Station::where('id', '=', $request->station)->first();
        // $division = Division::where('id', '=', $request->division)->first();
        // $position = Position::where('id', '=', $request->position)->first();
        // dd($division->all());

        $full_name = trim($request->first_name) . ' ' . trim($request->mi) . ' ' . trim($request->last_name);

        User::create([
            'philrice_id' => $request->philrice_id,
            'name' => $full_name,
            'first_name' => trim($request->first_name),
            'mi' => trim($request->mi),
            'last_name' => trim($request->last_name),
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'user_type' => 'encoder',
            'station' => $request->station,
            'division' => $request->division,
            'position' => $request->position,
            'sq1' => strtolower($request->sq1),
            'sq2' => strtolower($request->sq2),
            'sq3' => strtolower($request->sq3),
            'isBlocked' => 0,
        ]);

        $new_user = User::getEmailSingle($request->email);
        $new_user->remember_token = Str::random(30);
        $new_user->save();

        // function to send verification button in email
        Mail::to($new_user->email)->send(new RegisterMail($new_user));

        return redirect()
            ->route('login')
            ->with(['warning' => 'Account Verification!', 'message' => 'Please check your email to verify your account.']);
    }

    public function verify($remember_token)
    {
        $new_user = User::getTokenSingle($remember_token);

        if (!empty($new_user)) {
            $new_user->email_verified_at = date('Y-m-d H:i:s');
            $new_user->remember_token = Str::random(30);
            $new_user->save();

            return redirect()->route('login')->with('success', 'Your account is successfully verified.');
        } else {
            abort(404);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $user = Auth::user();
        return view('profile', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function showProfile($id)
    {
        if (Auth::id() != $id) {
            abort(403, 'Unauthorized action.');
        }

        // Here you can also fetch user information if needed
        $user = Auth::user();

        // Fetch stations
        $stations = Station::all();

        // Fetch positions
        $positions = Position::all();

        // Fetch divisions
        $divisions = Division::all();

        return view('profile', ['user' => $user, 'stations' => $stations, 'positions' => $positions, 'divisions' => $divisions]);
    }

    public function updateProfile(Request $request)
    {
        $user = Auth::user();

        // Update profile information
        $user->update($request->except(['profile_picture', 'old_password', 'password', 'password_confirmation', 'sq1', 'sq2', 'sq3', 'station', 'division', 'position', 'station_id', 'division_id', 'position_id']));

        // Update select fields. Saves IDs as values
        $user->station = $request->input('station');
        $user->division = $request->input('division');
        $user->position = $request->input('position');
        
        // Update select fields. Saves names as values
        // if ($request->filled('station')) {
        //     $station = Station::findOrFail($request->station);
        //     $user->station = $station->station;
        // }

        // if ($request->filled('division')) {
        //     $division = Division::findOrFail($request->division);
        //     $user->division = $division->division;
        // }

        // if ($request->filled('position')) {
        //     $position = Position::findOrFail($request->position);
        //     $user->position = $position->position;
        // }

        // Update profile picture if a new one is provided
        if ($request->hasFile('profile_picture')) {
            $request->validate([
                // 'profile_picture' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
                'profile_picture' => 'required|image|mimes:jpeg,png,jpg,gif',
            ]);

            $image = $request->file('profile_picture');
            $imageName = time() . '.' . $image->extension();
            $image->move(public_path('profile_picture'), $imageName);

            // Delete old profile picture if exists
            if ($user->profile_picture) {
                $oldImagePath = public_path() . $user->profile_picture;
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }

            $user->profile_picture = '/profile_picture/' . $imageName;
        }

        // Update security questions
        $user->update($request->only(['sq1', 'sq2', 'sq3']));

        // Update password if provided
        if ($request->filled('old_password') && $request->filled('password')) {
            $request->validate([
                'old_password' => 'required',
                'password' => 'required|regex:/(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&()\-^\/])/|min:8|confirmed',
            ]);

            $hashedPassword = $user->password;

            if (password_verify($request->old_password, $hashedPassword)) {
                $user->update(['password' => bcrypt($request->password)]);
            } else {
                return redirect()
                    ->back()
                    ->withErrors(['old_password' => 'The provided old password does not match']);
            }
        }

        $user->save();

        return redirect()->back();
    }

    // public function updateProfile(Request $request)
    // {
    //     $user = Auth::user();

    //     // Update profile information
    //     $user->update($request->except('profile_picture'));

    //     // Update profile picture if a new one is provided
    //     if ($request->hasFile('profile_picture')) {
    //         $request->validate([
    //             'profile_picture' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
    //         ]);

    //         $image = $request->file('profile_picture');
    //         $imageName = time() . '.' . $image->extension();
    //         $image->move(public_path('profile_picture'), $imageName);

    //         $user->profile_picture = '/profile_picture/' . $imageName;
    //         $user->save();
    //     }

    //     return redirect()->back();
    // }

    // public function updateSecurityQuestions(Request $request)
    // {
    //     $user = Auth::user();

    //     $user->update($request->only(['sq1', 'sq2', 'sq3']));

    //     return redirect()->back();
    // }

    // public function updatePassword(Request $request)
    // {
    //     $request->validate([
    //         'old_password' => 'required',
    //         'password' => 'required|regex:/(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&()\-^\/])/|min:8|confirmed',
    //     ]);

    //     $user = Auth::user();
    //     $hashedPassword = $user->password;

    //     if (password_verify($request->old_password, $hashedPassword)) {
    //         $user->update(['password' => bcrypt($request->password)]);

    //         return redirect()->back();
    //     } else {
    //         return redirect()->back();
    //     }
    // }

    public function adminGetEncoders()
    {
        // $encoders = User::whereIn('user_type', ['encoder', 'admin'])->get();

        $encoders = User::where('user_type', 'encoder')->get();

        return view('admin.manage_encoders', compact('encoders'));
    }
    public function superadminGetEncoders()
    {
        $encoders = User::where('user_type', 'encoder')->get();

        return view('super_admin.manage_encoders', compact('encoders'));
    }

    public function promoteEncoder($id)
    {
        // dd($id);
        $encoder = User::findOrFail($id);
        $encoder->user_type = 'admin';
        $encoder->save();

        return redirect()->back()->with('success', 'User type updated successfully');
    }

    public function superadminGetAdmins()
    {
        $admins = User::where('user_type', 'admin')->get();

        return view('super_admin.manage_admins', compact('admins'));
    }
    public function demoteAdmin($id)
    {
        // dd($id);
        $admin = User::findOrFail($id);
        $admin->user_type = 'encoder';
        $admin->save();

        return redirect()->back()->with('success', 'User type updated successfully');
    }

    public function block($id)
    {
        $user = User::findOrFail($id);
        $user->isBlocked = 1;
        $user->save();

        return redirect()->back()->with('success', 'You have blocked access to this user');
    }
    public function unblock($id)
    {
        $user = User::findOrFail($id);
        $user->isBlocked = 0;
        $user->save();

        return redirect()->back()->with('success', 'You have unblocked access to this user');
    }

    public function checkIfExists(Request $request)
    {
        // dd($request->all());
        if ($request->boolean('checkPhilriceId')) {
            $user = User::getPhilriceIdSingle($request->philriceID);

            if (!empty($user)) {
                return response()->json(['exists' => true]);
            } else {
                return response()->json(['exists' => false]);
            }
        }

        if ($request->boolean('checkEmail')) {
            $user = User::getEmailSingle($request->email);

            if (!empty($user)) {
                return response()->json(['exists' => true]);
            } else {
                return response()->json(['exists' => false]);
            }
        }
    }
}
