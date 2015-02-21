<?php

class ImageController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index($serviceId)
	{
		$images = Image::where('service_id', $serviceId)->get();
		return Response::json($images);
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store($serviceId)
	{
		$details = Input::all();
		$details['service_id'] = $serviceId;

		if(Input::hasFile('image'))
		{
			$file = Input::file('image');
			$extension = $file->getClientOriginalExtension();
			$fileName = $serviceId . '_' . str_random(16) . '.' . $extension;
			$destinationPath = 'uploads/images';
			$details['image'] = $fileName;
			if(($file->move($destinationPath, $fileName)))
			{
				if(Image::create($details))
				{
					return Response::json(['success' => true,
											'alert' => 'Sucessfully uploaded image']);
				}
				else
				{
					File::delete($destinationPath.$fileName);
					return Response::json(['success' => false,
											'alert' => 'Failed to upload image']);
				}
			}
			else
			{
				return Response::json(['success' => false,
										'alert' => 'Failed to upload image']);
			}
		}
		else
		{
			return Response::json(['success' => false,
									'alert' => 'No image found']);
		}
	}


	public function update($serviceId, $id)
	{
		$details = Input::all();
		$image = Image::find($id);
		if($image->service_id == $serviceId)
		{
			if($image->update($details))
			{
				return Response::json(['success' => true,
										'alert' => 'Sucessfully updated image']);
			}
		}

	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($serviceId, $id)
	{
		$image = Image::find($id);
		if($image->service_id == $serviceId)
		{
			if(Image::destroy($id))
			{
				return Response::json(['success' => true,
										'alert' => 'Sucessfully deleted image']);
			}
		}
	}


}