<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\Status;
use App\Http\Resources\Status as StatusResource;

class StatusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return all statuses as a resource ordered by status
        $statuses = Status::orderBy('status', 'asc')->get();

        // Return the statuses as a resource
        return StatusResource::collection($statuses);
    }

}
