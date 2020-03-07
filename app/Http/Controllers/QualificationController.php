<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Qualifications;

class QualificationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Qualifications::all();
    }
}
