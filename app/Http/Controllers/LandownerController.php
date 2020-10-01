<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Landowner;
use Yajra\DataTables\Facades\DataTables;

class LandownerController extends Controller
{
    public function showAddLandowner()
    {
        return view('landowner.add_land_owner');
    }

    public function allLandowner()
    {
        $landowners = Landowner::all();
        return view('landowner.all_landowner', compact('landowners'));
    }

    public function landownerData(){
        $landowners = Landowner::all();
        $data_table_render= DataTables::of($landowners)
            ->addColumn('DT_RowIndex',function ($row){
                return '<input type="checkbox" id="qst_id_'.$row["id"].'">';
            })
            //add edit and delete option
                ->addColumn('action',function ($row){
                    $edit_url=url('landowner/edit-landowner/'.$row['id']);
                return '<a href="'.$edit_url.'" class="btn btn-info btn-xs"><i class="far fa-edit"></i></a>'."&nbsp&nbsp;".
                     '<button onClick="deleteLandowner('.$row['id'].')" class="btn btn-danger btn-xs"><i class="far fa-trash-alt"></i></button>';
            })
            ->rawColumns(['DT_RowIndex','action'])
            ->addIndexColumn()
            ->make(true);
        return $data_table_render;
    }

    public function storeLandowner(Request $request)
    {
        // dd($request->all());
        $this->validate($request,[
            'file_no' => 'required',
            'name' => 'required',
            'father_name' => 'required',
            'mother_name' => 'required',
            'nid_no' => 'required',
            'mobile' => 'required',
            'permanent_address' => 'required',
            'present_address' => 'required',
            'email' => 'required',
            'media_man' => 'required',
            'investigation_person' => 'required',
            'mouza' => 'required',
            'ps' => 'required',
            'district' => 'required',
            'cs_khatian' => 'required',
            'rs_khatian' => 'required',
            'sa_khatian' => 'required',
            'cs_sa_dag' => 'required',
            'rs_dag' => 'required',
            'total_land_of_rs' => 'required',
            'purchase_of_land' => 'required',
            'remaining_balance' => 'required',
            'tp_land_price' => 'required',
            'per_bigha_price' => 'required',
            'registration_date' => 'required',
            'deed_number' => 'required'
        ]);
        
        $landowners = new Landowner;
        $landowners->file_no = $request->file_no;
        $landowners->name = $request->name;
        $landowners->father_name = $request->father_name;
        $landowners->mother_name = $request->mother_name;
        $landowners->nid_no = $request->nid_no;
        $landowners->mobile = $request->mobile;
        $landowners->permanent_address = $request->permanent_address;
        $landowners->present_address = $request->present_address;
        $landowners->email = $request->email;
        $landowners->media_man = $request->media_man;
        $landowners->investigation_person = $request->investigation_person;
        $landowners->mouza = $request->mouza;
        $landowners->ps = $request->ps;
        $landowners->district = $request->district;
        $landowners->cs_khatian = $request->cs_khatian;
        $landowners->rs_khatian = $request->rs_khatian;
        $landowners->sa_khatian = $request->sa_khatian;
        $landowners->cs_sa_dag = $request->cs_sa_dag;
        $landowners->rs_dag = $request->rs_dag;
        $landowners->total_land_of_rs = $request->total_land_of_rs;
        $landowners->purchase_of_land = $request->purchase_of_land;
        $landowners->remaining_balance = $request->remaining_balance;
        $landowners->tp_land_price = $request->tp_land_price;
        $landowners->per_bigha_price = $request->per_bigha_price;
        $landowners->registration_date = $request->registration_date;
        $landowners->deed_number = $request->deed_number;
        $landowners->save(); 

        return redirect()->back()->with('success','Landowner added successfully!');
    }

    public function editLandowner($id)
    {
        $landowner = Landowner::find($id);
         return view('landowner.edit_landowner', compact('landowner'));
    }

    public function updateLandowner(Request $request, $id)
    {
        $this->validate($request,[
            'file_no' => 'required',
            'name' => 'required',
            'father_name' => 'required',
            'mother_name' => 'required',
            'nid_no' => 'required',
            'mobile' => 'required',
            'permanent_address' => 'required',
            'present_address' => 'required',
            'email' => 'required',
            'media_man' => 'required',
            'investigation_person' => 'required',
            'mouza' => 'required',
            'ps' => 'required',
            'district' => 'required',
            'cs_khatian' => 'required',
            'rs_khatian' => 'required',
            'sa_khatian' => 'required',
            'cs_sa_dag' => 'required',
            'rs_dag' => 'required',
            'total_land_of_rs' => 'required',
            'purchase_of_land' => 'required',
            'remaining_balance' => 'required',
            'tp_land_price' => 'required',
            'per_bigha_price' => 'required',
            'registration_date' => 'required',
            'deed_number' => 'required'
        ]);

        $landowners = Landowner::find($id);
        $landowners->file_no = $request->file_no;
        $landowners->name = $request->name;
        $landowners->father_name = $request->father_name;
        $landowners->mother_name = $request->mother_name;
        $landowners->nid_no = $request->nid_no;
        $landowners->mobile = $request->mobile;
        $landowners->permanent_address = $request->permanent_address;
        $landowners->present_address = $request->present_address;
        $landowners->email = $request->email;
        $landowners->media_man = $request->media_man;
        $landowners->investigation_person = $request->investigation_person;
        $landowners->mouza = $request->mouza;
        $landowners->ps = $request->ps;
        $landowners->district = $request->district;
        $landowners->cs_khatian = $request->cs_khatian;
        $landowners->rs_khatian = $request->rs_khatian;
        $landowners->sa_khatian = $request->sa_khatian;
        $landowners->cs_sa_dag = $request->cs_sa_dag;
        $landowners->rs_dag = $request->rs_dag;
        $landowners->total_land_of_rs = $request->total_land_of_rs;
        $landowners->purchase_of_land = $request->purchase_of_land;
        $landowners->remaining_balance = $request->remaining_balance;
        $landowners->tp_land_price = $request->tp_land_price;
        $landowners->per_bigha_price = $request->per_bigha_price;
        $landowners->registration_date = $request->registration_date;
        $landowners->deed_number = $request->deed_number;
        $projects->save(); 

        return redirect()->route('allLandowner')->with('success','Landowner updated successfully!');
    }
    public function deleteLandowner($id)
    {
        $landowner = Landowner::find($id);
        if($landowner){
            $landowner->delete();
            return response()->json('success',201);
        }else{
            return response()->json('error',422);
        }
    }
}
