<?php

namespace App\Http\Controllers\Instructor;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreMemberRequest;
use App\Http\Requests\UpdateMemberRequest;
use App\Models\Customer;
use App\Models\CustomerCertificate;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::where("membership_type", "customer");
        if (request()->get("musteri")) {
            $users = $users->where("fullname", "LIKE", "%" . request()->get("musteri") . "%");
        }
        $users = $users->orderBy("created_at", "DESC")->paginate(16);
        $certificates = DB::table("certificates")->get();
        return view("instructor.customer-management.index", compact("users", "certificates"));
    }

    public function profileInfo(User $user)
    {
        $customer = $user->customer;
        return view("instructor.customer-management.profile.index", compact("user", "customer"));
    }

    public function profileInfoUpdate(Request $request, User $user)
    {
        if ($request->hasFile("image")) {
            @unlink(public_path($user->image));
            $request->merge([
                "image" => uploadImage("/upload/profile/", $request->image),
            ]);
        }
        $user->update($request->post());
        $user->customer->update($request->post());
        return redirect()->route("instructor.customers.profile.info", $user)->withSuccess("Üyelik bilgileri başarıyla güncellendi!");
    }

    public function invoiceInfo(User $user)
    {
        $customer = $user->customer;
        $provinces = DB::table("provinces")->get();
        $districts = DB::table("districts")->where("province_id", $customer->province_id)->get();
        return view("instructor.customer-management.profile.invoice-infos", compact("user", "provinces", "districts", "customer"));
    }

    public function invoiceInfoUpdate(Request $request, User $user)
    {
        $customer = $user->customer;

        $customer->update($request->post());
        $customer->individual->update($request->post());
        $customer->corporate->update($request->post());
        $request->merge([
            "province" => $customer->province->name ?? null,
            "district" => $customer->district->name ?? null,
        ]);
        return redirect()->route("instructor.customers.invoice.info", $user)->withSuccess("Fatura bilgileri başarıyla güncellendi!");
    }

    public function invoices(User $user)
    {
        $customer = $user->customer;

        $invoices = $customer->invoices()->orderBy("created_at", "DESC")->paginate(16);
        return view("instructor.customer-management.profile.invoices", compact("user", "invoices", "customer"));
    }

    public function educationInfo(User $user)
    {
        $customer = $user->customer;

        $courses = $customer->courses()->orderBy("created_at", "DESC")->paginate(16);
        $documents = DB::table("documents")->get();
        return view("instructor.customer-management.profile.education-infos", compact("user", "courses", "customer", "documents"));
    }

    public function certificates(User $user)
    {
        $customer = $user->customer;
        $certificates = $customer->certificates()->orderBy("created_at", "DESC")->paginate(16);
        return view("instructor.customer-management.profile.certificates", compact("user", "certificates", "customer"));
    }

    public function uploadCertificate(Request $request)
    {
        CustomerCertificate::create([
            "customer_id" => $request->customer_id,
            "certificate_id" => $request->certificate_id,
        ]);
        return back()->withSuccess("Sertifika başarıyla yüklendi!");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreMemberRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMemberRequest $request)
    {
        Customer::create($request->post());
        return back()->withSuccess();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Member  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Member  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMemberRequest  $request
     * @param  \App\Models\Member  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMemberRequest $request, Customer $customer)
    {
        $customer->update($request->post());
        return back()->withSuccess();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Member  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::find($id)->delete();
        return back();
    }
}
