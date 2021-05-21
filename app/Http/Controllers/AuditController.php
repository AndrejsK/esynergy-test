<?php

namespace App\Http\Controllers;

use App\Http\Resources\AuditResource;
use Illuminate\Http\Request;
use OwenIt\Auditing\Models\Audit;

class AuditController extends Controller
{

    /**
     * Creates and returns JSON of audit data for API
     *
     * @param null $from - date from
     * @param null $till - date until
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function dump($from = null, $till = null)
    {
        // first converts str to timestamp, to check if entered strings $from and $till are correct
        $fromTime = strtotime($from);
        $tillTime = strtotime($till);
        // if entered dates are correct, filter is applied
        // timestamps are converted to ISO time strings for comparison
        if ($fromTime && $tillTime) {
            $records = Audit::whereDate('created_at', '>=', date('c', $fromTime))->whereDate('created_at', '<=', date('c', $tillTime))->get();
        // else dumps last 10 records
        } else {
            $records = Audit::orderBy('created_at', 'desc')->take(10)->get();
        }
        return AuditResource::collection($records);
    }
}
