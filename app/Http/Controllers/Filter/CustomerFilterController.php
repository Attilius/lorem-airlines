<?php

namespace App\Http\Controllers\Filter;

use App\Filters\CRUD\CustomerFilter;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class CustomerFilterController extends Controller
{
    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        $filter = $request->title . ':' . $request->filterValue;
        CustomerFilter::add($request->model, $filter);

        return redirect('admin/profile');
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function destroy(Request $request): RedirectResponse
    {
        CustomerFilter::remove($request->key);

        return redirect('admin/profile');
    }
}
