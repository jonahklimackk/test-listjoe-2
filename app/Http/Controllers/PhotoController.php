<?php

namespace App\Http\Controllers;

use Auth;
use Storage;
use Illuminate\Http\Request;
use Intervention\Image\ImageManager;

class PhotoController extends Controller
{

    /**
     * The image manager instance.
     *
     * @var ImageManager
     */
    protected $images;



    /**
     * Create a new interaction instance.
     *
     * @param  ImageManager  $images
     * @return void
     */
    public function __construct(ImageManager $images)
    {
        $this->images = $images;
    }






    /**
    * view editg photos
    *
    * @return void
    */
    public function showEditPhoto(Request $request)
    {

        return view("members.editphoto");

    }










	/**
	* update the profile
	*
	* @return void
	*/
	public function upload(Request $request)
	{
        $file = $request->uploadfile;

        $path = $file->hashName('profiles');

        // We will store the profile photos on the "public" disk, which is a convention
        // for where to place assets we want to be publicly accessible. Then, we can
        // grab the URL for the image to store with this user in the database row.
        $disk = Storage::disk('public');

        $disk->put(
            $path, $this->formatImage($file)
        );

        Auth::user()->forceFill([
            'photo_url' => $disk->url($path),
        ])->save();

        return $disk->url($path);
    }

    /**
     * Resize an image instance for the given file.
     *
     * @param  \SplFileInfo  $file
     * @return \Intervention\Image\Image
     */
    protected function formatImage($file)
    {
        return (string) $this->images->make($file->path())
        ->fit(300)->encode();
    }






    public function uploadAvatar(Request $request)
    {
        if($request->hasFile('image')){
            $filename = $request->image->getClientOriginalName();
            $request->image->storeAs('images',$filename,'public');
            Auth()->user()->update(['image'=>$filename]);
        }
        // return redirect()->back();
        return 'done';
    }


    /**
     * Write code on Method
     *
     * @return response()
     */
    public function store(Request $request)
    {
        $valiator = $request->validate([
            'image' => 'required',
        ]);

        // $post = Post::create($request->all());

        if($request->hasFile('image') && $request->file('image')->isValid()){
            Auth::user()->addMediaFromRequest('image')->toMediaCollection('images');
        }

return ($request);
        // return redirect()->route('posts.index');
    }    
}
