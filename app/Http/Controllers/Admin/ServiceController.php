<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ServiceController extends Controller
{
    public function index()
    {
//        $this->run();
        $data['title'] = 'Services';
        $data['services'] = Service::orderBy('order_number')->get();
        return view('admin.service.index', $data);
    }


    public function create()
    {
        $data['title'] = 'Service Create';
        return view('admin.service.create', $data);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'icon' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'name' => 'required|string|max:250|unique:services,name',
            'header' => 'required|string|max:250',
            'subheader' => 'required|string|max:250',
            'description' => 'required|string|max:500',
            'order_number' => 'required|integer',
            'color' => 'required|string|max:250',
            'status' => 'required|integer',
        ]);

        try {
            DB::beginTransaction();
            $service = new Service();
            $this->saveService($request, $service);
            DB::commit();
            Toastr::success('Service Added Successfully!', 'Success');
            return redirect()->route('admin.service.index');
        } catch (\Exception $e) {
            DB::rollBack();
            Toastr::error('Something went wrong!', 'Error');
            return redirect()->back()->withInput();
        }

    }

    /**
     * @param Request $request
     * @param $service
     * @return void
     */
    private function saveService(Request $request, $service): void
    {
        $service->name = $request->name;
        $service->header = $request->header;
        $service->subheader = $request->subheader;
        $service->description = $request->description;
        $service->order_number = $request->order_number;
        $service->color = $request->color;
        $service->status = $request->status;
        if ($request->hasFile('icon')) {
            $file = $request->file('icon');
            $upload = uploadGeneralFile($file, 'service', $service->icon);
            $service->icon = $upload['path'];
        }
        $service->save();
    }

    public function edit($id)
    {
        $data['title'] = 'Service Edit';
        $data['service'] = Service::find($id);
        return view('admin.service.edit', $data);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'icon' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'name' => 'required|string|max:250|unique:services,name,' . $id,
            'header' => 'required|string|max:250',
            'subheader' => 'required|string|max:250',
            'description' => 'required|string|max:500',
            'order_number' => 'required|integer',
            'color' => 'required|string|max:250',
            'status' => 'required|integer',
        ]);

        try {
            DB::beginTransaction();
            $service = Service::find($id);
            $this->saveService($request, $service);
            DB::commit();
            Toastr::success('Service Updated Successfully!', 'Success');
            return redirect()->route('admin.service.index');
        } catch (\Exception $e) {
            DB::rollBack();
            Toastr::error('Something went wrong!', 'Error');
            return redirect()->back()->withInput();
        }
    }

    public function delete($id)
    {
        $service = Service::find($id);
        $service->delete();
        Toastr::success('Service Deleted Successfully!', 'Success');
        return redirect()->route('admin.service.index');
    }


    public function run()
    {
        $items = [
            [
                'name' => 'Strategy',
                'color' => '#1E90FF',
                'header' => 'Our Strategy',
                'subheader' => 'Strategy Subheader',
                'description' => 'Strategy Description',
                'icon' => 'assets/images/strategy.svg',
                'order_number' => 1,
                'status' => 1
            ],
            [
                'name' => 'Connected Commerce',
                'color' => '#32CD32',
                'header' => 'Connected Commerce',
                'subheader' => 'Commerce Subheader',
                'description' => 'Commerce Description',
                'icon' => 'assets/images/connected.svg',
                'order_number' => 2,
                'status' => 1
            ],
            [
                'name' => 'Experiential',
                'color' => '#FFA500',
                'header' => 'Experiential Marketing',
                'subheader' => 'Experiential Subheader',
                'description' => 'Experiential Description',
                'icon' => 'assets/images/experiential.svg',
                'order_number' => 3,
                'status' => 1
            ],
            [
                'name' => 'Retail',
                'color' => '#FF4500',
                'header' => 'Retail Solutions',
                'subheader' => 'Retail Subheader',
                'description' => 'Retail Description',
                'icon' => 'assets/images/retail.svg',
                'order_number' => 4,
                'status' => 1
            ],
            [
                'name' => 'Customer Experience',
                'color' => '#FF1493',
                'header' => 'Customer Experience',
                'subheader' => 'Experience Subheader',
                'description' => 'Experience Description',
                'icon' => 'assets/images/production.svg',
                'order_number' => 5,
                'status' => 1
            ],
            [
                'name' => 'Media',
                'color' => '#1E90FF',
                'header' => 'Media Services',
                'subheader' => 'Media Subheader',
                'description' => 'Media Description',
                'icon' => 'assets/images/media.svg',
                'order_number' => 6,
                'status' => 1
            ],
            [
                'name' => 'Data',
                'color' => '#32CD32',
                'header' => 'Data Analytics',
                'subheader' => 'Data Subheader',
                'description' => 'Data Description',
                'icon' => 'assets/images/data.svg',
                'order_number' => 7,
                'status' => 1
            ],
            [
                'name' => 'Creative',
                'color' => '#FFA500',
                'header' => 'Creative Design',
                'subheader' => 'Creative Subheader',
                'description' => 'Creative Description',
                'icon' => 'assets/images/creative.svg',
                'order_number' => 8,
                'status' => 1
            ],
            [
                'name' => 'Global Web Operations',
                'color' => '#FF4500',
                'header' => 'Web Operations',
                'subheader' => 'Operations Subheader',
                'description' => 'Operations Description',
                'icon' => 'assets/images/ops.svg',
                'order_number' => 9,
                'status' => 1
            ],
        ];

        DB::table('services')->insert($items);
    }


}
