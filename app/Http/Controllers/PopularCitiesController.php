<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;

class PopularCitiesController extends Controller
{
	private $base_url;

	public function __construct()
	{

		$this->base_url = url('/');
	}
	//crud module
	private $module = "popularcities";
	//for index page
	public function index()
	{
		$data['title']       = "All " . ucfirst($this->module);
		$data[$this->module] = DB::table($this->module)->paginate(5);
		return view($this->module . '.index', $data); // $this->>table applicable if the folder name and database table name is same
	}
	//for calling the single view for add/edit
	public function create_edit($action, $id)
	{
		$data['action'] = "store";
		$data['id']     = $id;
		if ($action == "edit") {
			$data[$this->module . '_data'] = DB::table($this->module)->where('id', $id)->get();
			$data['action']              = "update";
			$data['id']                  = $id;
		}
		return view($this->module . '.create_edit', $data);
	}
	//for crud operations
	public function store_update($id, Request $request)
	{
		$data = [
			'name'        => $request->get('name'),
			'country'     => $request->get('country'),
			'description' => $request->get('description'),
		]; //fill it with values to be processed
		$banner = $request->file('banner');
		if (isset($banner)) {
			$image   = $request->file('banner');
			$imgname = time() . "." . $image->getClientOriginalExtension();
			// $destinationPath = public_path(StoragePath::path().'/storage/popularcities');
			// $image->move($destinationPath, $imgname);
			$destinationPath = $image->move(public_path('/cities/images/'), $imgname);
			$img_path        = $this->base_url . '/public/cities/images/' . $imgname;
			$data['banner']  = $img_path;
		}
		if ($id == "-1") {
			DB::table($this->module)->insert($data);
			$message_action = "Added";
		} else {
			DB::table($this->module)->where('id', $id)->update($data);
			$message_action = "Updated";
		}
		return redirect($this->module . "/get")->with('success', 'Popular Cities is ' . $message_action);
	}
	public function delete($id)
	{
		DB::table($this->module)->where('id', $id)->delete();
		return redirect($this->module . "/get")->with('danger', 'Popular Cities is deleted');
	}
	public function all()
	{
		$cities = DB::table('popularcities')->get();
		return view('popularcities/all_popularcities', [
			'all_popularcities' => $cities,
		]);
	}
}
