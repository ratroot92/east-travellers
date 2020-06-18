<?php

namespace App\Http\Controllers\ahmed;

use App\Http\Controllers\Controller;
use DB;
use Illuminate\Http\Request;

class blog_controller extends Controller {
	public function view() {

		$blogs = DB::table('blogs')->paginate(4);

		return view('blogs.view', ['blogs' => $blogs]);

	}

	public function detail($id) {

		$blog = DB::table('blogs')
			->where('id', $id)
			->first();
		return view('blogs.detail', [

				'blog' => $blog,
			]);

	}

	public function autocompleteFetch(Request $request) {
		if ($request->get('query')) {
			$query = $request->get('query');

			$db_cities    = DB::table('cities')->where('name', 'LIKE', '%'.$query.'%')->distinct()->get();
			$db_countries = DB::table('countries')->where('name', 'LIKE', '%'.$query.'%')->distinct()->get();
			$output       = '<ul class="dropdown-menu"  style="display:block;position:absolute">';

			foreach ($db_countries as $row) {
				$output .= '<li style="font-size:12px;"><a class="search_list_name">'.$row->name.'</a></li>';
			}
			foreach ($db_cities as $row) {
				$output .= '<li style="font-size:12px;"><a class="search_list_name">'.$row->name.'</a></li>';
			}
		}
		$output .= '</ul>';
		echo $output;
	}
}
