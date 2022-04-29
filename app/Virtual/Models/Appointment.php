<?php
namespace App\Virtual\Models;
/**
 * @OA\Schema(
 *     title="Appointment",
 *     description="Appointment model",
 *     @OA\Xml(
 *         name="Appointment"
 *     )
 * )
 */
class Appointment
{

    /**
     * @OA\Property(
     *      title="message",
     *      description="Message of the success",
     *      example="Success!"
     * )
     *
     * @var string
     */
    public $message;
}
