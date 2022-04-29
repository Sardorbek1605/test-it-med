<?php
namespace App\Virtual;
/**
 * @OA\Schema(
 *      title="Store Project request",
 *      description="Store Project request body data",
 *      type="object",
 *      required={"name"}
 * )
 */

class StoreAppointmentRequest
{
    /**
     * @OA\Property(
     *      title="title",
     *      description="Title of the new appointment",
     *      example="A appointment"
     * )
     *
     * @var string
     */
    public $title;

    /**
     * @OA\Property(
     *      title="description",
     *      description="Description of the new appointment",
     *      example="This is new appointment's description"
     * )
     *
     * @var string
     */
    public $description;

    /**
     * @OA\Property(
     *      title="patient_id",
     *      description="Patients id of the new appointment",
     *      format="int64",
     *      example=4
     * )
     *
     * @var integer
     */
    public $patient_id;

    /**
     * @OA\Property(
     *      title="practitioner_id",
     *      description="Practitioner id of the new appointment",
     *      format="int64",
     *      example=5
     * )
     *
     * @var integer
     */
    public $practitioner_id;

    /**
     * @OA\Property(
     *      title="organization_id",
     *      description="Organization's id of the new appointment",
     *      format="int64",
     *      example=3
     * )
     *
     * @var integer
     */
    public $organization_id;
}
