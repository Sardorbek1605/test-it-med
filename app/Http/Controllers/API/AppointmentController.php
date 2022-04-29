<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\AppointmentCreateRequest;
use App\Models\Appointment;
use Illuminate\Support\Facades\DB;

class AppointmentController extends Controller
{

    //This method returns one appointment, if not found in database it returns message "Not found"
    /**
     * @OA\Get(
     *      path="/api/appointment/{id}",
     *      operationId="getAppointmentById",
     *      tags={"Appointment"},
     *      summary="Get appointment information",
     *      description="Returns appointment data",
     *      @OA\Parameter(
     *          name="id",
     *          description="Appointment id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation"
     *       ),
     *      @OA\Response(
     *          response=400,
     *          description="Bad Request"
     *      ),
     *      @OA\Response(
     *          response=404,
     *          description="Not found",
     *      ),
     * )
     */
    public function get_appointment($id){
        $appointment = Appointment::where('id', $id)->with(['practitioner', 'patient', 'organization'])->first();
        if(empty($appointment)){
            $data = [
              'message'=>"Appointment not found!",
            ];
            return $this->response($data, 404);
        }
        $data = [
          'appointment'=>$appointment
        ];
        return $this->response($data, 200);
    }



    //This method save post with api and if have validation errors it return validation errors else return success
    /**
     * @OA\Post(
     *      path="/api/appointment/store",
     *      operationId="storeAppointment",
     *      tags={"Appointment"},
     *      summary="Store new appointment",
     *      description="Returns success",
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/StoreAppointmentRequest")
     *      ),
     *      @OA\Response(
     *          response=202,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/Appointment")
     *       ),
     *      @OA\Response(
     *          response=400,
     *          description="Bad Request"
     *      ),
     *      @OA\Response(
     *          response=422,
     *          description="Validation errors"
     *      )
     * )
     */
    public function post_appointment(AppointmentCreateRequest $request){
        DB::beginTransaction();
        try {
            Appointment::create($request->all());
            DB::commit();
            $data = [
                'message'=>"Success!"
            ];
            return $this->response($data, 202);
        }catch (\Exception $e){
            DB::rollBack();
            $data = [
                'errors'=>$e->getMessage()
            ];
            return $this->response($data, 400);
        }
    }

    //This method using for all public method responses
    private function response($data, $status){
        return response()->json([
           'data'=>$data,
        ], $status);
    }
}
