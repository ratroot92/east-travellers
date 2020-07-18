<?php

namespace App\Http\Controllers\ahmed;

use App\Gallery_photo;
use App\Group_Photo;
use App\Http\Controllers\Controller;
use App\Traveller_Review;
use App\Video;
use DB;
use Illuminate\Http\Request;

class GalleryController extends Controller {
	private $base_url;

	public function __construct() {

		$this->base_url = url('/');

	}

	public function index() {
		$videos = DB::table('videos')->paginate('6');
		return view('gallery/index', compact('videos'));
	}
	public function add() {
		return view('gallery/add');
	}
	public function add_url(Request $request) {
		$url       = $request->get('url');
		$$name     = $request->get('$name');
		$url_array = explode("/", $url);

		//dd($url_array[0], $url_array[1], $url_array[2], $url_array[3]);
		if (strpos($url_array[3], "watch?v") !== false) {
			$http          = $url_array[0];
			$custom_url    = "www.youtube.com/embed";
			$video_id      = $url_array[3];
			$new_url_array = str_replace("watch?v=", "/", $video_id);
			$new_url_array = $http."//".$custom_url.$new_url_array;
			// dd($new_url_array);

			$name            = $request->get('name');
			$new_video       = new Video;
			$new_video->name = $name;
			$new_video->url  = $new_url_array;
			$new_video->save();
			if ($new_video) {
				return redirect()->route('gallery.add')->with('success', 'Gallery Video  added successfully ');
			} else {
				return redirect()->route('gallery.add')->with('error', 'Current operation failed ');
			}
		} else {
			$name            = $request->get('name');
			$new_video       = new Video;
			$new_video->name = $name;
			$new_video->url  = $new_url_array;
			$new_video->save();
			if ($new_video) {
				return redirect()->route('gallery.add')->with('success', 'Gallery Video  added successfully ');
			} else {
				return redirect()->route('gallery.add')->with('error', 'Current operation failed ');
			}
		}

	}

	public function all_videos() {
		$videos = DB::table('videos')->get();
		return view('gallery/all_videos', compact('videos'));
	}
	public function delete_video($id) {
		$status = DB::table('videos')
			->where('id', $id)
			->delete();
		if ($status) {
			return redirect()->route('gallery..videos.all')->with('success', 'Gallery Video  deleted successfully ');
		} else {
			return redirect()->route('gallery..videos.all')->with('error', '   Current operation failed ');
		}

	}

	public function edit_video($id) {
		$video = DB::table('videos')->where('id', $id)->first();
		if ($video) {
			return view('gallery/update_video')->with(['video' => $video]);
		} else {
			return redirect()->route('gallery..videos.all')->with('error', '   Current operation failed ');
		}
	}

	public function edit_video_update(Request $request) {
		$id   = $request->get('id');
		$name = $request->get('name');
		$url  = $request->get('url');
		$find = DB::table('videos')->where('id', $id)->update(['name' => $name, 'url' => $url]);
		if ($find) {
			return redirect()->route('gallery.videos.all')->with('success', 'Galler Video  updated successfully ');
		} else {
			return redirect()->route('gallery.videos.all')->with('error', '   Current operation failed ');
		}
	}

	public function addphotos() {

		return view('gallery/addphotos');
	}

	public function insert_photos(Request $request) {
		//  $this->validate($request, [
		//     'img' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
		// ]);

		$title       = $request->get('title');
		$description = $request->get('desc');

		if ($request->hasFile('img')) {
			$photo = $request->file('img');

			$extension  = $photo->getClientOriginalExtension();
			$image_name = time().rand(1000, 9999)."_.".$extension;
			$path       = public_path('/storage/Gallery_Photos/');
			$photo->move($path, $image_name);
			$photo_path           = $this->base_url.'/public/storage/Gallery_Photos/'.$image_name;
			$Gallery_photo        = new Gallery_photo;
			$Gallery_photo->title = $title;
			$Gallery_photo->url   = $photo_path;
			$Gallery_photo->desc  = $description;
			$Gallery_photo->save();

			if ($Gallery_photo) {
				return redirect()->route('gallery.addphotos')->with('success', 'Gallery Photo added successfully ');
			} else {
				return redirect()->route('gallery.addphotos')->with('error', '   Current operation failed ');
			}

		} else {
			return redirect()->route('gallery.addphotos')->with('error', '   Current operation failed ');
		}

	}

	public function all_photos() {
		$photos = DB::table('gallery_photos')->get();
		return view('gallery/all_photos', compact('photos'));
	}

	public function delete_photo($id) {

		$photo = DB::table('gallery_photos')->where('id', $id)->first();
		if ($photo) {

			$dB_path  = $photo->url;
			$len      = strlen($this->base_url."/");
			$new_path = substr($dB_path, $len, strlen($dB_path)-$len);
			unlink($new_path);

			$status = DB::table('gallery_photos')
				->where('id', $id)
				->delete();

			if ($status) {
				return redirect()->route('gallery.all_photos')->with('success', 'Gallery Photo Deleted successfully ');
			} else {
				return redirect()->route('gallery.all_photos')->with('error', '   Current operation failed ');
			}

		} else {
			return redirect()->route('gallery.all_photos')->with('error', '   Current operation failed ');
		}
	}

	public function editview_photo($id) {
		$photo = DB::table('gallery_photos')->where('id', $id)->first();
		if ($photo) {
			return view('gallery/edit_photo')->with(['photo' => $photo]);
		} else {
			return redirect()->route('gallery.all_photos')->with('error', '   Current operation failed ');
		}

	}

	public function edit_photo(Request $request) {

		$id    = $request->get('id');
		$title = $request->get('title');
		$desc  = $request->get('desc');

		//if pic is uplaoded with form

		if ($request->hasFile('img')) {

			//delete last picture first

			$photo = DB::table('gallery_photos')->where('id', $id)->first();
			if ($photo) {

				$dB_path  = $photo->url;
				$len      = strlen($this->base_url."/");
				$new_path = substr($dB_path, $len, strlen($dB_path)-$len);
				unlink($new_path);

				//deleted last pictures

				//upload new picture

				$photo = $request->file('img');

				$extension  = $photo->getClientOriginalExtension();
				$image_name = time().rand(1000, 9999)."_.".$extension;
				$path       = public_path('/storage/Gallery_Photos/');
				$photo->move($path, $image_name);
				$photo_path = $this->base_url.'/public/storage/Gallery_Photos/'.$image_name;

				$find_update = DB::table('gallery_photos')->where('id', $id)->update([
						'title' => $title,
						'desc'  => $desc,
						'url'   => $photo_path,
					]);

				if ($find_update) {
					return redirect()->route('gallery.all_photos')->with('success', 'Gallery Photo updated successfully ');
				} else {
					return redirect()->route('gallery.all_photos')->with('error', '   Current operation failed ');
				}

			}
		} else {
			return redirect()->route('gallery.all_photos')->with('error', '   Current operation failed ');
		}

	}

	public function photo_index() {
		$photos = DB::table('gallery_photos')->paginate('9');
		return view('gallery/gallery_photos_index', compact('photos'));
	}

	public function addTravellerReviewGET() {

		return view('gallery/addTravellerReview');
	}
	public function addTravellerReviewPOST(Request $request) {
		$url       = $request->get('url');
		$name      = $request->get('name');
		$url_array = explode("/", $url);

		//dd($url_array[0], $url_array[1], $url_array[2], $url_array[3]);
		if (strpos($url_array[3], "watch?v") !== false) {
			$http          = $url_array[0];
			$custom_url    = "www.youtube.com/embed";
			$video_id      = $url_array[3];
			$new_url_array = str_replace("watch?v=", "/", $video_id);
			$new_url_array = $http."//".$custom_url.$new_url_array;
			// dd($new_url_array);

			$new_traveller_review       = new Traveller_Review;
			$new_traveller_review->name = $name;
			$new_traveller_review->url  = $new_url_array;
			$new_traveller_review->save();
			if ($new_traveller_review) {
				return redirect()->route('gallery.all.traveller.review')->with('success', 'Traveller review video added successfully ');
			} else {
				return redirect()->route('gallery.add.traveller.review')->with('error', 'Current operation failed ');
			}
		} else {
			$name                       = $request->get('name');
			$new_traveller_review       = new Traveller_Review;
			$new_traveller_review->name = $name;
			$new_traveller_review->url  = $url;
			$new_traveller_review->save();
			if ($new_traveller_review) {
				return redirect()->route('gallery.all.traveller.review')->with('success', 'Traveller review video added successfully ');
			} else {
				return redirect()->route('gallery.add.traveller.review')->with('error', 'Current operation failed ');
			}
		}
	}

	public function allTravellerReviewGET() {
		$videos = Traveller_Review::all();

		return view('gallery/allTravellerReview', compact('videos'));
	}
	public function updateTravellerReviewGET($id) {
		$traveller_review = DB::table('traveller_reviews')->where('id', $id)->first();
		if ($traveller_review) {
			return view('gallery/updateTravellerReview')->with(['video' => $traveller_review]);
		} else {
			return redirect()->route('gallery.update.traveller.review')->with('error', '   Current operation failed ');
		}

	}

	public function updateTravellerReviewPOST(Request $request) {
		$id   = $request->get('id');
		$name = $request->get('name');
		$url  = $request->get('url');
		$find = DB::table('traveller_reviews')->where('id', $id)->update(['name' => $name, 'url' => $url]);

		if ($find) {
			return redirect()->route('gallery.all.traveller.review')->with('success', 'Traveller review video updated  successfully ');
		} else {
			return redirect()->route('gallery.update.traveller.review')->with('error', 'Current operation failed ');
		}

	}

	public function deleteTravellerReviewGET($id) {
		$status = DB::table('traveller_reviews')
			->where('id', $id)
			->delete();
		if ($status) {
			return redirect()->route('gallery.all.traveller.review')->with('success', 'Traveller review video  deleted successfully ');
		} else {
			return redirect()->route('gallery.all.traveller.review')->with('error', '   Current operation failed ');
		}

	}

	public function galleryTravellerReviewGET() {
		$videos = DB::table('traveller_reviews')->paginate('6');

		return view('gallery/galleryTravellerReview', compact('videos'));
	}

	public function addGroupPhotoGET() {
		return view('gallery/addGroupPhoto');
	}
	public function addGroupPhotoPOST(Request $request) {
		$title       = $request->get('title');
		$description = $request->get('desc');

		if ($request->hasFile('img')) {
			$photo = $request->file('img');

			$extension  = $photo->getClientOriginalExtension();
			$image_name = time().rand(1000, 9999)."_.".$extension;
			$path       = public_path('/storage/Group_Photos/');
			$photo->move($path, $image_name);
			$photo_path             = $this->base_url.'/public/storage/Group_Photos/'.$image_name;
			$New_Group_Photo        = new Group_Photo;
			$New_Group_Photo->title = $title;
			$New_Group_Photo->url   = $photo_path;
			$New_Group_Photo->desc  = $description;
			$New_Group_Photo->save();

			if ($New_Group_Photo) {
				return redirect()->route('gallery.all.group.photo.get')->with('success', 'Group Photo added successfully ');
			} else {
				return redirect()->route('gallery.add.group.photo.get')->with('error', '   Current operation failed ');
			}

		} else {
			return redirect()->route('gallery.addphotos')->with('error', '   Current operation failed ');
		}
	}

	public function allGroupPhotoGET() {
		$photos = DB::table('group_photos')->paginate('9');
		return view('gallery/allGroupPhotos', compact('photos'));
	}

	public function deleteGroupPhotoGET($id) {
		$group_photo = DB::table('group_photos')->where('id', $id)->first();
		if ($group_photo) {

			$dB_path  = $group_photo->url;
			$len      = strlen($this->base_url."/");
			$new_path = substr($dB_path, $len, strlen($dB_path)-$len);
			unlink($new_path);

			$status = DB::table('group_photos')
				->where('id', $id)
				->delete();

			if ($status) {
				return redirect()->route('gallery.all.group.photo.get')->with('success', 'Group Photo Deleted successfully ');
			} else {
				return redirect()->route('gallery.all.group.photo.get')->with('error', '   Current operation failed ');
			}
		} else {
			return redirect()->route('gallery.all.group.photo.get')->with('error', '   Current operation failed ');
		}
	}

	public function updateGroupPhotoGET($id) {
		$group_photo = DB::table('group_photos')->where('id', $id)->first();
		if ($group_photo) {
			return view('gallery/updateGroupPhoto')->with(['photo' => $group_photo]);
		} else {
			return redirect()->route('gallery.all.group.photo.get')->with('error', '   Current operation failed ');
		}

	}
	public function updateGroupPhotoPOST(Request $request) {
		$id    = $request->get('id');
		$title = $request->get('title');
		$desc  = $request->get('desc');

		//if pic is uplaoded with form

		if ($request->hasFile('img')) {

			//delete last picture first

			$group_photo = DB::table('group_photos')->where('id', $id)->first();
			if ($group_photo) {

				$dB_path  = $group_photo->url;
				$len      = strlen($this->base_url."/");
				$new_path = substr($dB_path, $len, strlen($dB_path)-$len);
				unlink($new_path);

				//deleted last pictures

				//upload new picture

				$new_group_photo = $request->file('img');

				$extension  = $new_group_photo->getClientOriginalExtension();
				$image_name = time().rand(1000, 9999)."_.".$extension;
				$path       = public_path('/storage/Group_Photos/');
				$new_group_photo->move($path, $image_name);
				$photo_path = $this->base_url.'/public/storage/GGroup_Photos/'.$image_name;

				$find_update = DB::table('group_photos')->where('id', $id)->update([
						'title' => $title,
						'desc'  => $desc,
						'url'   => $photo_path,
					]);

				if ($find_update) {
					return redirect()->route('gallery.all.group.photo.get')->with('success', 'Group Photo updated successfully ');
				} else {
					return redirect()->route('gallery.all.group.photo.get')->with('error', '   Current operation failed ');
				}

			}
		} else {
			return redirect()->route('gallery.all.group.photo.get')->with('error', '   Current operation failed ');
		}
	}

	public function indexGroupPhotoPOST() {
		$photos = DB::table('group_photos')->paginate('9');
		return view('gallery/indexGroupPhotos', compact('photos'));
	}
}