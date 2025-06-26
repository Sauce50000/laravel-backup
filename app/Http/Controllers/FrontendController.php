<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Employee;
use App\Models\Notice;
use Illuminate\Http\Request;
use App\Models\Photo;
use App\Models\NoticeCategory;
use App\Models\officeDetail;
use App\Models\PhotoGallery;
use App\Models\Record;
use App\Models\RecordCategory;
use App\Models\RecordType;

class FrontendController extends Controller
{

    // public function index()
    // {
    //     $photos = Photo::latest()->take(7)->get();
    //     $categories = NoticeCategory::whereNull('deleted_at')->get(); // Fetch active categories
    //     $legalDocumentsCategories = RecordCategory::whereNull('deleted_at')
    //         ->where('record_type_id', '1')
    //         ->with('type')
    //         ->get(); // Fetch legal document categories

    //     $publiactionCategories = RecordCategory::whereNull('deleted_at')
    //         ->where('record_type_id', '2')
    //         ->with('type')
    //         ->get(); // Fetch publication categories

    //     $departments = Department::whereNull('deleted_at')->get(); // Fetch active departments

    //     $officeDetails = officeDetail::get();
    //     return view('frontend.index', compact('photos', 'categories', 'legalDocumentsCategories', 'publiactionCategories', 'departments', 'officeDetails'));
    // }

    public function index()
    {
        $photos = Photo::latest()->take(7)->get();
        return view('frontend.index', compact('photos'));
    }

    public function showOfficeDetails(officeDetail $officeDetail)
    {
        $officeDetails = officeDetail::get(); // dd($officeDetail->title);
        return view('frontend.office_details', compact('officeDetail', 'officeDetails'));
    }

    public function showdepartment($slug)
    {
        $department = Department::where('slug', $slug)->firstOrFail(); // Fetch the department by slug
        $departments = Department::whereNull('deleted_at')->get();
        // If the department is not found, you can handle it as needed

        $employees = $department->employees()->whereNull('deleted_at')->get(); // Fetch employees of the department

        return view('frontend.department', compact('department', 'departments', 'employees'));
    }


    public function showpdfList2($id, $slug)
    {
        // dd($slug);
        $category = RecordCategory::where('slug', $slug)->firstOrFail();
        $type = RecordType::where('id', $id)->firstOrFail();
        // dd($type);

        // Get records under that category
        $records = Record::where('record_category_id', $category->id)
            ->whereNull('deleted_at')
            ->paginate(10);

        $sidebarCategories = RecordCategory::whereNull('deleted_at')->where('record_type_id', $type->id)->get();
        // dd($sidebarCategories);
        return view('frontend.pdftables', [
            'items' => $records,
            'category' => $category,
            'sidebarCategories' => $sidebarCategories,
            'type' => 'legal'
        ]);
    }

    public function showpdfList($slug)
    {

        $routeName = request()->route()->getName();

        if ($routeName === 'notice.showpdfList') {
            // Get the category by slug
            $category = NoticeCategory::where('slug', $slug)->firstOrFail();

            // Get notices under that category
            $notices = Notice::where('notice_category_id', $category->id)
                ->whereNull('deleted_at')
                ->paginate(10);

            $sidebarCategories = NoticeCategory::whereNull('deleted_at')->get();

            return view('frontend.pdftables', [
                'items' => $notices,
                'category' => $category,
                'sidebarCategories' => $sidebarCategories,
                'type' => 'notice'
            ]);
        }
        // elseif ($routeName === 'legal-document.showpdfList') {
        //     // Get the category by slug
        //     $category = RecordCategory::where('slug', $slug)->firstOrFail();
        //     $type = RecordType::where('slug2',$slug2)->firstOrFail();
        //     // Get records under that category
        //     $records = Record::where('record_category_id', $category->id)
        //         ->whereNull('deleted_at')
        //         ->paginate(10);

        //     $sidebarCategories = RecordCategory::whereNull('deleted_at')->where('record_type_id', $)->get();

        //     return view('frontend.pdftables', [
        //         'items' => $records,
        //         'category' => $category,
        //         'sidebarCategories' => $sidebarCategories,
        //         'type' => 'legal'
        //     ]);
        // }

        abort(404); // If route doesn't match expected names

    }

    public function showPdf($category, $slug)
    {
        // Try to resolve as a NoticeCategory
        $categoryModel = NoticeCategory::where('slug', $category)->first();

        if ($categoryModel) {
            $related_docs = Notice::where('notice_category_id', $categoryModel->id)
                ->latest()
                ->take(5)
                ->get();

            $record = Notice::where('slug', $slug)
                ->where('notice_category_id', $categoryModel->id)
                ->whereNull('deleted_at')
                ->firstOrFail();

            return view('frontend.pdfview', compact('record', 'categoryModel', 'related_docs'));
        }

        // Else try as a RecordCategory
        $categoryModel = RecordCategory::where('slug', $category)->firstOrFail();

        $related_docs = Record::where('record_category_id', $categoryModel->id)
            ->latest()
            ->take(5)
            ->get();

        $record = Record::where('slug', $slug)
            ->where('record_category_id', $categoryModel->id)
            ->whereNull('deleted_at')
            ->firstOrFail();

        return view('frontend.pdfview', compact('record', 'categoryModel', 'related_docs'));
    }

    public function gallery()
    {
        $photoGalleries = PhotoGallery::with('latestPhoto')->withCount('photos')->paginate(12);
        return view('frontend.gallery', compact('photoGalleries'));
    }

    public function show($id)
    {
        $photoGallery = PhotoGallery::where('id', $id)
            ->with(['photos' => function ($query) {
                $query->whereNull('deleted_at');
            }])
            ->firstOrFail();

        $photos = $photoGallery->photos()->paginate(12); // Paginate photos, 12 per page

        return view('frontend.show', [
            'photoGallery' => $photoGallery,
            'photos' => $photos,
        ]);
    }
    public function contact()
    {
        return view('frontend.contact');
    }

    public function employee()
    {
         $employees = Employee::with(['post', 'branch'])->paginate(10);
            // return view('backend.employee.index', compact('employees', 'showDeleted'));
        return view('frontend.employee',compact('employees'));
    }
}
