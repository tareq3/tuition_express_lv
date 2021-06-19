<?php


namespace App\support\macros;

use Illuminate\Support\Facades\Response;

class ResponseMacro
{

    public function jsonAs()
    {
        return function ($as, $payload, $status = 200, $disableNumericCheck = false) {
            return $disableNumericCheck
                ? Response::json([$as => $payload], $status)
                : Response::json([$as => $payload], $status, [], JSON_NUMERIC_CHECK);
        };
    }

    public function jsonPaginateAs()
    {
        return function ($as, $payload, $status = 200, $disableNumericCheck = false) {
            $payloadAsArray = $payload->toArray();
            $payloadAsArray[$as] = $payloadAsArray['data'];
            unset($payloadAsArray['data']);

            return $disableNumericCheck
                ? Response::json($payloadAsArray, $status)
                : Response::json($payloadAsArray, $status, [], JSON_NUMERIC_CHECK);
        };
    }
}