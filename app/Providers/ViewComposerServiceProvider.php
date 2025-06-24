<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

use App\Models\NoticeCategory;
use App\Models\RecordCategory;
use App\Models\Department;
use App\Models\OfficeDetail;

class ViewComposerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        // Share these variables with all views
        View::composer('*', function ($view) {
            $navcategories = NoticeCategory::whereNull('deleted_at')->get();
            $navlegalDocumentsCategories = RecordCategory::whereNull('deleted_at')->where('record_type_id', 1)->with('type')->get();
            $navpubliactionCategories = RecordCategory::whereNull('deleted_at')->where('record_type_id', 2)->with('type')->get();
            $navdepartments = Department::whereNull('deleted_at')->get();
            $navofficeDetails = OfficeDetail::get();

            $view->with(compact(
                'navcategories',
                'navlegalDocumentsCategories',
                'navpubliactionCategories',
                'navdepartments',
                'navofficeDetails'
            ));
        });
    }
}
