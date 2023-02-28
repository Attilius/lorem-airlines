<?php

namespace App\Http\Controllers\API\V1;

use App\Filters\V1\CustomersFilter;
use App\Http\Controllers\Controller;
use App\Http\Requests\V1\Customer\DeleteCustomerRequest;
use App\Http\Requests\V1\Customer\StoreCustomerRequest;
use App\Http\Requests\V1\Customer\UpdateCustomerRequest;
use App\Http\Resources\V1\Customer\CustomerCollection;
use App\Http\Resources\V1\Customer\CustomerResource;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return CustomerCollection
     */
    public function index(Request $request): CustomerCollection
    {
        $filter = new CustomersFilter();
        $filterItems = $filter->transform($request); //[['column', 'operator', 'value']]

        $includeInvoices = $request->query('includeInvoices');
        $customers = Customer::where($filterItems);

        if ($includeInvoices) {
            $customers = $customers->with('invoices');
        }

        return new CustomerCollection($customers->paginate()->appends($request->query()));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreCustomerRequest  $request
     * @return CustomerResource
     */
    public function store(StoreCustomerRequest $request): CustomerResource
    {
        return new CustomerResource(Customer::create($request->all()));
    }

    /**
     * Display the specified resource.
     *
     * @param  Customer  $customer
     * @return CustomerResource
     */
    public function show(Customer $customer): CustomerResource
    {
        $includeInvoices = request()->query('includeInvoices');

        if ($includeInvoices) {
            return new CustomerResource($customer->loadMissing('invoices'));
        }

        return new CustomerResource($customer);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateCustomerRequest  $request
     * @param  Customer  $customer
     * @return CustomerResource
     */
    public function update(UpdateCustomerRequest $request, Customer $customer): CustomerResource
    {
        $customer->update($request->all());
        return new CustomerResource($customer);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  DeleteCustomerRequest $request
     * @param  Customer  $customer
     * @return Response
     */
    public function destroy(DeleteCustomerRequest $request, Customer $customer): Response
    {
        if ($request->authorize()) {
            $customer->delete();
            return response(null, 204);
        }

        return response('The request is unauthorized!', 401);
    }
}
