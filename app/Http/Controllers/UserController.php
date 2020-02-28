<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\
Support\Facades\Validator;
use Yajra\Datatables\Datatables;
use App\User;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $arr = array('title' => 'User');
        return view('admin.user.index', $arr);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = array(
            'name' => "required|max:100",
            'email' => "required|unique",
        );

        $input = $request->all();

        $messages = [
                // 'birthdate.before' => 'You must be 16 years of age or older.',
                //'gender.in' => 'Please provide valid gender type.',
        ];

        $msg = "Account created successfully.";
        if (isset($input["id_for_update"]) && !empty($input["id_for_update"])) {
            $action = "edit";
            $msg = "Profile updated successfully.";
            $id = $input["id_for_update"];
            $user = User::find($id);
            if (!empty($user)) {
                $rules["email"] = 'required|email|unique:users,email,' . $id;
            }
            $rules["password"] = 'nullable|min:8';
        } else {
            $action = "add";
            $rules["password"] = 'required|min:8';
            $rules["email"] = 'required|email|unique:users';           
            $user = new User();
        }
        $validator = Validator::make($input, $rules, $messages);
        if ($validator->fails()) {
            $arr = array("status" => 400, "msg" => $validator->errors()->first(), "result" => array());
        } else {
            if (isset($input["password"])) {
                $password = \Hash::make($input["password"]);
                $input["password"] = $password;
            } else if (!isset($input["password"]) && empty($input["password"]) && !empty($user)) {
                $input["password"] = $user->password;
            }
            //$input["status"] = 'Active';/
            try {
                if (!empty($user)) {
                    $image = $request->file('image');
                    if ($image != "") {
                        $old_image = $user->image;
                        $filename = base_path('storage/' . $old_image);
                        $profile_img = $request->file('image');
                        if (!empty($profile_img)) {
                            if (file_exists($filename) && !empty($old_image)) {
                                unlink(base_path('storage/' . $old_image));
                            }
                            $imagename = userProfileImageUpload($profile_img, "users");
                            $input["image"] = "users/" . $imagename;
                        }
                    }
                    $user->fill($input)->save();
                    $arr = array("status" => 200, "msg" => $msg, "data" =>$user);
                } else {
                    $arr = array("status" => 400, "msg" => "User not found.", "data" => []);
                }
            } catch (\Exception $ex) {
                if (isset($ex->errorInfo[2])) {
                    $msg = $ex->errorInfo[2];
                } else {
                    $msg = $ex->getMessage();
                }
                if (isset($ex->errorInfo[1]) && $ex->errorInfo[1] == 1062) {
                    $msg = "ABN number is already used by another company. Please provide different ABN number.";
                }
                $arr = array("status" => 400, "msg" => $msg, "data" => []);
            }
        }
        return \Response::json($arr);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = User::find($id);
        if (!empty($data)) {

            $this->title = "Edit Profile";
            $arr = array('title' => $this->title, 'data' => $data);
            if ($data->role == 'admin') {
                return view("profile", $arr);
            } else {
                return $arr;
            }
        } else {
            pagenotfound();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->request->add(['id_for_update' => $id]); //send id into store function       
        return $this->store($request);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
	public function getall() {
       
        $data = User::where('role', 'admin')->orderby('id', 'desc');

        return Datatables::of($data->get())
			->addColumn('name', function ($q) {
				return $q->name;
			})
			->addColumn('email', function ($q) {
				return $q->email;
			})
			->addColumn('status', function ($q) {
				return $q->status;
			})
			->addColumn('image', function ($q) {
				$path = displayImage($q->image);
				return '<img src="'.$path.'" class="img-square" height="30px" width="40px" alt="User Image" />';
			})
			->addColumn('action', function ($q) {
				if ($q->status == 'Active') {
					$btn = '<a  class="status btn btn-warning" title="Status change" data-type="Inactive" id="' . $q->id . '"  style="color:#fff;">Inactive</a>';
				} else {
					$btn = '<a  class="status btn btn-success" title="Status change" data-type="Active" id="' . $q->id . '" style="color:#fff;">Active</a>';
				}
//                            <a  href="user/' . $q->id . '"  title="View" class="btn btn-primary btn-sm"><i class="fa fa-eye" aria-hidden="true"  "></i></a> 
				return   $btn;
			})
			->addIndexColumn()
			->rawColumns(['action','image'])
			->make(true);
    }
	public function statusChange(Request $request) {

        $id = $request->id;
        $type = $request->type;
        $data = User::find($id);
        if ($data) {
            $data->status = $type;
            $data->save();           
            $arr = array("status" => 200, "message" => "Status updated successfully.", "data" => []);
        } else {
            $arr = array("status" => 400, "message" => "Category not found.", "data" => []);
        }

        return \Response::json($arr);
    }
}
