<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Qualifications;
use App\Model\Category;

class QualificationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $qualifications = Qualifications::all();
        $category = Category::all();

        return response()->json([
            'message' => 'successfully.',
            'status' =>true,
            'error'  => 'no',
            'qualifications' => $qualifications,
            'category' => $category
        ], 200);

    }
}
