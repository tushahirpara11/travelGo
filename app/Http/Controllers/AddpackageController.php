<?php

namespace App\Http\Controllers;

use App\addpackage;
use App\updatepackage;
use Illuminate\Http\Request;
use Redirect;
use Illuminate\Session\Store;
use DB;
use Carbon;
use PDF;
use App\Exports\PackageExport;
use App\Imports\PackageImport;
use Maatwebsite\Excel\Facades\Excel;

// return Illuminate\Http\Response;
class AddpackageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { }
    public function view()
    {
        $viewdata = DB::select('select a.package_id,a.city_id,a.displayamount,a.tourcode,a.validfrom,a.validto,a.packagetitle,a.activitytype from  addpackages a,addhotels h where a.package_id=h.package_id');
        // dd($viewdata);
        // dd('datas', compact('datas'));
        return view('admin/viewpackage')->with('viewdata', $viewdata);
    }

    public function user_view()
    {
        // dd(Carbon\Carbon::today()->toDateString());                
        $viewdata = DB::select("select * from  addpackages a,addhotels h where a.package_id=h.package_id and validto >= '" .  Carbon\Carbon::now()->toDateString() . "'");
        // dd($viewdata);
        return view('app')->with('viewdata', $viewdata);
    }
    public function updatepackage($id)
    {
        $viewdata = DB::select('select * from addpackages where package_id=' . $id);
        $state = DB::select('select * from states where state_id=' . $viewdata[0]->city_id);
        $states = DB::table('states')->get();
        return view('admin/updatechange')->with(['viewdata' => $viewdata, 'statename' => $state, 'states' => $states]);
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
    public function filter(Request $request)
    {
        $request->get('search_text');
        $request->get('sort');
        $request->get('type');
        $viewdata = DB::select('select * from  addpackages a,addhotels h where a.package_id=h.package_id and');
        return view('offered')->with('viewdata', $viewdata);
    }
    public function offer_view()
    {
        $viewdata = DB::select('select * from  addpackages a,addhotels h where a.package_id=h.package_id');
        return view('offered')->with('viewdata', $viewdata);
    }
    public function report(Request $request)
    {
        $startdate = $request->input('startingdate');
        $enddate = $request->input('endingdate');
        $viewdata = DB::select("select a.package_id,a.city_id,a.displayamount,a.tourcode,a.validfrom,a.validto,a.packagetitle,a.activitytype from  addpackages a,addhotels h where a.package_id=h.package_id and validto BETWEEN '" . $startdate . "' AND '" . $enddate . "'");
        return view('admin/packagereport')->with(['viewdata' => $viewdata, 'startingdate' => $request->input('startingdate'), 'endingdate' => $request->input('endingdate')]);
    }
    public function pdfview(Request $request)
    {
        $startdate = $request->input('startingdate');
        $enddate = $request->input('endingdate');
        $items = DB::select("select a.package_id,a.city_id,a.displayamount,a.tourcode,a.validfrom,a.validto,a.packagetitle,a.activitytype from  addpackages a,addhotels h where a.package_id=h.package_id and validto BETWEEN '" . $startdate . "' AND '" . $enddate . "'");
        if ($items != null) {
            session(['pkg' => $items]);
        }
        // $items = DB::table("addpackages")->get();
        view()->share('items', session('pkg'));
        if ($request->has('download')) {
            $pdf = PDF::loadView('admin/pdfview');
            return $pdf->download('PackageReport.pdf');
        }
        return view('admin/pdfview');
    }
    public function search(Request $request)
    {
        $search_text = $request->search_value;
        $sort = $request->sort;
        $type = $request->type;
        if ($search_text == '') {
            $viewdata = DB::select('select * from addpackages a,addhotels h where a.package_id=h.package_id');
        } else {
            $viewdata = DB::select("select * from addpackages a,addhotels h where a.package_id=h.package_id and a.packagetitle LIKE '%" . $search_text . "%'");
        }
        $data = [
            'success' => true,
            'message' => 'Your searching result',
            'data' => $viewdata
        ];
        return json_encode($viewdata);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $insertdata = new addpackage([
            'packagetitle' => $request->get('packagetitle'),
            'activitytype' => $request->get('activitytype'),
            'city_id' => $request->get('city_id'),
            'curency' => $request->get('curency'),
            'displayamount' => $request->get('displayamount'),
            'tourcode' => $request->get('tourcode'),
            'validfrom' => $request->get('validfrom'),
            'validto' => $request->get('validto'),
            'highlight' => $request->get('highlight'),
            'itinerary' => $request->get('itinerary'),
            'inclusion' => $request->get('inclusion'),
            'exclusion' => $request->get('exclusion'),
            'cancellationplicy' => $request->get('cancellationplicy')
        ]);
        for ($i = 1; $i <= 5; $i++) {
            $image[$i] = $request->file('pkgimg' . $i);
            if ($image[$i] != "") {
                $old_image = $insertdata->pkgimg . $i;
                $filename = base_path('storage/' . $old_image);
                $image[$i] = $request->file('pkgimg' . $i);
                if (!empty($image[$i])) {
                    if (file_exists($filename) && !empty($old_image)) {
                        unlink(base_path('storage/' . $old_image));
                    }
                    $imagename = imgupload($image[$i], "packageimages");
                    $input["pkgimg" . $i] = "packageimages/" . $imagename;
                }
                $insertdata->fill(array("pkgimg" . $i => $input["pkgimg" . $i]));
            }
        }
        // dd($insertdata->getAttributes());
        $count = addpackage::where('tourcode', $insertdata->tourcode)->get();
        // dd(count($count));
        if (count($count) == 1) {
            $msgfalse = "Somthing Went Worng..!";
            \Session::flash('count_one', $msgfalse);
            return \Redirect::back();
        } else {
            if ($insertdata->validfrom >= Carbon\Carbon::now()->toDateString() && $insertdata->validto >= Carbon\Carbon::now()->toDateString()) {
                // dd(Carbon\Carbon::now()->toDateString());            
                if ($insertdata->validto > $insertdata->validfrom) {
                    $insertdata->save();
                    if ($insertdata->save() == True) {
                        $msg = "Record inserted Successfully";
                        \Session::flash('msg', $msg);
                        return \Redirect::back();
                    } else {
                        $msgfalse = "Valid to Date Grater than current Date..";
                        \Session::flash('msgfalse', $msgfalse);
                        return \Redirect::back();
                    }
                } else {
                    // dd($insertdata->validfrom);
                    $msgfalse = "Please Enter valid Date..";
                    \Session::flash('validto', $msgfalse);
                    return \Redirect::back();
                }
            } else {
                $msgfalse = "Please Enter valid Date..";
                \Session::flash('check_date', $msgfalse);
                return \Redirect::back();
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\addpackage  $addpackage
     * @return \Illuminate\Http\Response
     */
    public function show(addpackage $addpackage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\addpackage  $addpackage
     * @return \Illuminate\Http\Response
     */
    public function edit(addpackage $addpackage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\addpackage  $addpackage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $updatedata = DB::select('select * from addpackages where package_id=' . $id);
        $updatedata = new updatepackage();
        $updatedata->packagetitle = $request->get('packagetitle');
        $updatedata->activitytype = $request->get('activitytype');
        $updatedata->city_id = $request->get('city_id');
        $updatedata->curency = $request->get('curency');
        $updatedata->displayamount = $request->get('displayamount');
        $updatedata->tourcode = $request->get('tourcode');
        $updatedata->validfrom = $request->get('validfrom');
        $updatedata->validto = $request->get('validto');
        $updatedata->highlight = $request->get('highlight');
        $updatedata->itinerary = $request->get('itinerary');
        $updatedata->inclusion = $request->get('inclusion');
        $updatedata->exclusion = $request->get('exclusion');
        $updatedata->cancellationpolicy = $request->get('cancellationpolicy');
        for ($i = 1; $i <= 5; $i++) {
            $image[$i] = $request->file('pkgimg' . $i);
            if ($image[$i] != "") {
                $old_image = $updatedata->pkgimg . $i;
                $filename = base_path('storage/' . $old_image);
                $image[$i] = $request->file('pkgimg' . $i);
                if (!empty($image[$i])) {
                    if (file_exists($filename) && !empty($old_image)) {
                        unlink(base_path('storage/' . $old_image));
                    }
                    $imagename = imgupload($image[$i], "packageimages");
                    $input["pkgimg" . $i] = "packageimages/" . $imagename;
                }
                $updatedata->fill(array("pkgimg" . $i => $input["pkgimg" . $i]));
            } else {
                $image[$i] = $request->get('hiddenimg' . $i);
                // dd($image[$i]);
                $updatedata->fill(array("pkgimg" . $i => $image[$i]));
            }
        }
        // dd($updatedata->validfrom);
        addpackage::where('package_id', $id)->update(array(
            'packagetitle' => $updatedata->packagetitle,
            'activitytype' => $updatedata->activitytype,
            'city_id' => $updatedata->city_id,
            'curency' => $updatedata->curency,
            'displayamount' => $updatedata->displayamount,
            'tourcode' => $updatedata->tourcode,
            'validfrom' => $updatedata->validfrom,
            'validto' => $updatedata->validto,
            'highlight' => $updatedata->highlight,
            'itinerary' => $updatedata->itinerary,
            'inclusion' => $updatedata->inclusion,
            'exclusion' => $updatedata->exclusion,
            'pkgimg1' => $updatedata->pkgimg1,
            'pkgimg2' => $updatedata->pkgimg2,
            'pkgimg3' => $updatedata->pkgimg3,
            'pkgimg4' => $updatedata->pkgimg4,
            'pkgimg5' => $updatedata->pkgimg5,
            'cancellationplicy' => $updatedata->cancellationpolicy
        ));
        if (isset($updatedata)) {
            echo "<alert type='text/javascript'>Record Updated successfully</alert>";
            return \Redirect('admin/viewpackage');
        } else {
            echo "<alert type='text/javascript'>Something went Worng</alert>";
            return \Redirect::back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\addpackage  $addpackage
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $refresh = DB::delete("delete from addpackages where package_id=" . $id);
        // dd($refresh);
        return \Redirect::back();
    }

    public function importExportView()
    {
        return view('import');
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function export()
    {
        return Excel::download(new PackageExport, 'PackageData.csv');
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function import()
    {
        Excel::import(new PackageImport, request()->file('file'));
        return back();
    }
}
