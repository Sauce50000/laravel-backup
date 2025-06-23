<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;
use App\Models\Photo;
use App\Models\NoticeCategory;
use App\Models\RecordCategory;

class FrontendController extends Controller
{

    public function index()
    {
        $photos = Photo::latest()->take(7)->get();
        $categories = NoticeCategory::whereNull('deleted_at')->get(); // Fetch active categories
        $legalDocumentsCategories = RecordCategory::whereNull('deleted_at')
            ->where('record_type_id', '1')
            ->with('type')
            ->get(); // Fetch legal document categories

        $publiactionCategories = RecordCategory::whereNull('deleted_at')
            ->where('record_type_id', '2')
            ->with('type')
            ->get(); // Fetch publication categories

        $departments = Department::whereNull('deleted_at')->get(); // Fetch active departments
        return view('frontend.index', compact('photos', 'categories', 'legalDocumentsCategories', 'publiactionCategories', 'departments'));
    }

    public function introduction()
    {
        return view('frontend.introduction');
    }

    public function workArea()
    {
        return view('frontend.work_area');
    }
}
