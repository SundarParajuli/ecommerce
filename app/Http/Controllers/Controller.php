<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;


/**
 * @SWG\Swagger(
 *     basePath="/api/v1",
 *     @SWG\Info(
 *         version="1.0",
 *         title="Rara Mart",
 *         description="Rara Mart",
 *         @SWG\Contact(
 *             email="info@bidhee.com"
 *         ),
 *     )
 * )
 */


class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}
