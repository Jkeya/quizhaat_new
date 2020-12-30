<?php

namespace App\Http\Controllers;


use Image;
use Validator;
use App\SmStaff;
use App\SmStudent;
use App\tableList;
use App\SmRoomList;
use App\ApiBaseMethod;
use App\SmDormitoryList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Schema;

class SmApiController extends Controller
{

    public function checkColumnAvailable(Request $request)
    {
        if (!Schema::hasColumn('sm_general_settings', 'api_url')) {
            Schema::table('sm_general_settings', function ($table) {
                $table->integer('api_url')->default(0);
            });
        }
        $data = SmGeneralSettings::find(1);
        if ($data->api_url == 0) {

            if (ApiBaseMethod::checkUrl($request->fullUrl())) {

                $response = [
                    'success' => false,
                    'data'    => '',
                    'message' => null,
                ];

                return $response;
            }
        } else {
            if (ApiBaseMethod::checkUrl($request->fullUrl())) {
                $data = [];

                $response = [
                    'success' => true,
                    'data'    => '',
                    'message' => null,
                ];
                return $response;
            }
        }
    }
    public function UpdateStaffApi(Request $request)
    {

        $input = $request->all();
        if (ApiBaseMethod::checkUrl($request->fullUrl())) {
            $validator = Validator::make($input, [
                'field_name' => "required"

            ]);
        }
        if ($validator->fails()) {
            if (ApiBaseMethod::checkUrl($request->fullUrl())) {
                return ApiBaseMethod::sendError('Validation Error.', $validator->errors());
            }
        }
        if (!empty($request->field_name)) {
            $request_string = $request->field_name;
            $request_id = $request->id;
            $data = SmStaff::find($request_id);
            $data->$request_string = $request->$request_string;
            if ($request_string == "email") {
                $user = User::find($data->user_id);
                $user->email = $request->$request_string;
                $user->save();
            } else if ($request_string == "first_name") {
                $full_name = $request->$request_string . ' ' . $data->last_name;
                $data->full_name = $full_name;
                $user = User::find($data->user_id);
                $user->full_name = $data->full_name;
                $user->save();
            } else if ($request_string == "last_name") {
                $full_name = $data->first_name . ' ' .  $request->$request_string;
                $data->full_name = $full_name;
                $user = User::find($data->user_id);
                $user->full_name = $data->full_name;
                $user->save();
            } else if ($request_string == "staff_photo") {
                $file = $request->file('staff_photo');
                $images = Image::make($file)->resize(100, 100)->insert($file, 'center');
                $staff_photos = md5($file->getClientOriginalName() . time()) . "." . $file->getClientOriginalExtension();
                $images->save('public/uploads/staff/' . $staff_photos);
                $staff_photo = 'public/uploads/staff/' . $staff_photos;
                $data->staff_photo = $staff_photo;
            }
            $data->save();
            if (ApiBaseMethod::checkUrl($request->fullUrl())) {
                $data = [];
                $data['message'] = 'Updated';
                $data['flag'] = TRUE;
                return ApiBaseMethod::sendResponse($data, null);
            }
        } else {
            if (ApiBaseMethod::checkUrl($request->fullUrl())) {
                $data = [];
                $data['message'] = 'Invalid Input';
                $data['flag'] = FALSE;
                return ApiBaseMethod::sendError($data, null);
            }
        }
    }
    public function UpdateStudentApi(Request $request)
    {

        $input = $request->all();
        if (ApiBaseMethod::checkUrl($request->fullUrl())) {
            $validator = Validator::make($input, [
                'field_name' => "required"

            ]);
        }
        if ($validator->fails()) {
            if (ApiBaseMethod::checkUrl($request->fullUrl())) {
                return ApiBaseMethod::sendError('Validation Error.', $validator->errors());
            }
        }
        if (!empty($request->field_name)) {
            $request_string = $request->field_name;
            $request_id = $request->id;
            $data = SmStudent::find($request_id);
            $data->$request_string = $request->$request_string;
            if ($request_string == "first_name") {
                $full_name = $request->$request_string . ' ' . $data->last_name;
                $data->full_name = $full_name;
            } else if ($request_string == "last_name") {
                $full_name = $data->first_name . ' ' .  $request->$request_string;
                $data->full_name = $full_name;
            } else if ($request_string == "student_photo") {
                $file = $request->file('student_photo');
                $images = Image::make($file)->resize(100, 100)->insert($file, 'center');
                $student_photos = md5($file->getClientOriginalName() . time()) . "." . $file->getClientOriginalExtension();
                $images->save('public/uploads/student/' . $student_photos);
                $student_photo = 'public/uploads/student/' . $student_photos;
                $data->student_photo = $student_photo;
            }
            $data->save();
            if (ApiBaseMethod::checkUrl($request->fullUrl())) {
                $data = [];
                $data['message'] = 'Updated';
                $data['flag'] = TRUE;
                return ApiBaseMethod::sendResponse($data, null);
            }
        } else {
            if (ApiBaseMethod::checkUrl($request->fullUrl())) {
                $data = [];
                $data['message'] = 'Invalid Input';
                $data['flag'] = FALSE;
                return ApiBaseMethod::sendError($data, null);
            }
        }
    }
    public function roomList(Request $request)
    {
        $studentDormitory = DB::table('sm_room_lists')
            ->join('sm_dormitory_lists', 'sm_room_lists.dormitory_id', '=', 'sm_dormitory_lists.id')
            ->join('sm_room_types', 'sm_room_lists.room_type_id', '=', 'sm_room_types.id')
            ->select('sm_room_lists.id', 'sm_dormitory_lists.dormitory_name', 'sm_room_lists.name as room_number', 'sm_room_lists.number_of_bed', 'sm_room_lists.cost_per_bed', 'sm_room_lists.active_status')
            ->get();

        if (ApiBaseMethod::checkUrl($request->fullUrl())) {
            return ApiBaseMethod::sendResponse($studentDormitory, null);
        }
    }
    public function dormitoryList(Request $request)
    {
        $dormitory_lists = DB::table('sm_dormitory_lists')
            //->select('id', 'dormitory_name')
            ->where('active_status', 1)
            ->get();

        if (ApiBaseMethod::checkUrl($request->fullUrl())) {
            $data = [];
            $data['dormitory_lists'] = $dormitory_lists->toArray();
            return ApiBaseMethod::sendResponse($data, null);
        }
    }
    public function roomTypeList(Request $request)
    {
        $room_type_lists = DB::table('sm_room_types')
            ->select('id', 'type')
            ->where('active_status', 1)
            ->get();

        if (ApiBaseMethod::checkUrl($request->fullUrl())) {
            $data = [];
            $data['room_type_lists'] = $room_type_lists->toArray();
            return ApiBaseMethod::sendResponse($data, null);
        }
    }
    public function storeRoom(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'room_number' => "required",
            'dormitory' => "required",
            'room_type' => "required",
            'number_of_bed' => "required|max:2",
            'cost_per_bed' => "required|max:11"
        ]);

        if ($validator->fails()) {
            if (ApiBaseMethod::checkUrl($request->fullUrl())) {
                return ApiBaseMethod::sendError('Validation Error.', $validator->errors());
            }
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $room_list = new SmRoomList();
        $room_list->name = $request->room_number;
        $room_list->dormitory_id = $request->dormitory;
        $room_list->room_type_id = $request->room_type;
        $room_list->number_of_bed = $request->number_of_bed;
        $room_list->cost_per_bed = $request->cost_per_bed;
        $room_list->description = $request->description;
        $result = $room_list->save();

        if (ApiBaseMethod::checkUrl($request->fullUrl())) {
            if ($result) {
                return ApiBaseMethod::sendResponse(null, 'Room has been created successfully');
            } else {
                return ApiBaseMethod::sendError('Something went wrong, please try again');
            }
        }
    }

    public function updateRoom(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'room_number' => "required",
            'dormitory' => "required",
            'room_type' => "required",
            'number_of_bed' => "required|max:2",
            'cost_per_bed' => "required|max:11"
        ]);

        if ($validator->fails()) {
            if (ApiBaseMethod::checkUrl($request->fullUrl())) {
                return ApiBaseMethod::sendError('Validation Error.', $validator->errors());
            }
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        $room = SmRoomList::find($request->id);
        $room->name = $request->room_number;
        $room->dormitory_id = $request->dormitory;
        $room->room_type_id = $request->room_type;
        $room->number_of_bed = $request->number_of_bed;
        $room->cost_per_bed = $request->cost_per_bed;
        $room->description = $request->description;
        $result = $room->save();

        if (ApiBaseMethod::checkUrl($request->fullUrl())) {
            if ($result) {
                return ApiBaseMethod::sendResponse(null, 'Room has been updated successfully');
            } else {
                return ApiBaseMethod::sendError('Something went wrong, please try again');
            }
        }
    }
    public function deleteRoom(Request $request, $id)
    {
        $key_id = 'room_id';
        $tables = tableList::getTableList($key_id);
        try {
            $delete_query = SmRoomList::destroy($id);
            if (ApiBaseMethod::checkUrl($request->fullUrl())) {
                if ($delete_query) {
                    return ApiBaseMethod::sendResponse(null, 'Room has been deleted successfully');
                }
            }
        } catch (\Illuminate\Database\QueryException $e) {
            $msg = 'This data already used in  : Student information table, Please remove those data first';
            if (ApiBaseMethod::checkUrl($request->fullUrl())) {

                return ApiBaseMethod::sendResponse(null,  $msg);
            }
        }
    }


    public function addDormitory(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'dormitory_name' => "required|unique:sm_dormitory_lists,dormitory_name",
            'type' => "required",
            'intake' => "required"
        ]);

        if ($validator->fails()) {
            if (ApiBaseMethod::checkUrl($request->fullUrl())) {
                return ApiBaseMethod::sendError('Validation Error.', $validator->errors());
            }
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }




        $dormitory_list = new SmDormitoryList();
        $dormitory_list->dormitory_name = $request->dormitory_name;
        $dormitory_list->type = $request->type;
        $dormitory_list->address = $request->address;
        $dormitory_list->intake = $request->intake;
        $dormitory_list->description = $request->description;
        $result = $dormitory_list->save();

        if (ApiBaseMethod::checkUrl($request->fullUrl())) {
            if ($result) {
                return ApiBaseMethod::sendResponse(null, 'Dormitory has been created successfully');
            }
        }
    }

    public function editDormitory(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'dormitory_name' => "required|unique:sm_dormitory_lists,dormitory_name",
            'type' => "required",
            'intake' => "required"
        ]);

        if ($validator->fails()) {
            if (ApiBaseMethod::checkUrl($request->fullUrl())) {
                return ApiBaseMethod::sendError('Validation Error.', $validator->errors());
            }
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }


        $dormitory_list = SmDormitoryList::find($request->id);
        $dormitory_list->dormitory_name = $request->dormitory_name;
        $dormitory_list->type = $request->type;
        $dormitory_list->address = $request->address;
        $dormitory_list->intake = $request->intake;
        $dormitory_list->description = $request->description;
        $result = $dormitory_list->save();

        if (ApiBaseMethod::checkUrl($request->fullUrl())) {
            if ($result) {
                return ApiBaseMethod::sendResponse(null, 'Dormitory has been updated successfully');
            }
        }
    }
    public function deleteDormitory(Request $request, $id)
    {
        $tables = \App\tableList::getTableList('dormitory_id');
        try {
            $dormitory_list = SmDormitoryList::destroy($id);
            if ($dormitory_list) {
                if (ApiBaseMethod::checkUrl($request->fullUrl())) {
                    if ($dormitory_list) {
                        return ApiBaseMethod::sendResponse(null, 'Dormitory has been deleted successfully');
                    } else {
                        return ApiBaseMethod::sendError('Something went wrong, please try again');
                    }
                }
            }
        } catch (\Illuminate\Database\QueryException $e) {

            $msg = 'This data already used in  : ' . $tables . ' Please remove those data first';

            return ApiBaseMethod::sendError($msg);
        }
    }
    public function getDriverList(Request $request)
    {
        $driver_list = DB::table('sm_staffs')
            ->where('active_status', 1)
            ->where('role_id', '=', 9)
            ->get();
        if (ApiBaseMethod::checkUrl($request->fullUrl())) {
            return ApiBaseMethod::sendResponse($driver_list, null);
        }
    }

    public function setToken(Request $request)
    {
        if (!Schema::hasColumn('users', 'notificationToken')) {
            Schema::table('users', function ($table) {
                $table->text('notificationToken')->nullable();
            });
        }

        $user = User::find($request->id);
        $user->notificationToken = $request->token;
        $user->save();
        if (ApiBaseMethod::checkUrl($request->fullUrl())) {
            $data = '';
            return ApiBaseMethod::sendResponse($data, null);
        }
    }
}
