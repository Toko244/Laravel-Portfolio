<?php

namespace App\Services;

use App\Models\MultiImage;
use Illuminate\Support\Carbon;
use App\Models\PartnerMultiImages;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class FilesUploadService{

    public function storeMultiImages($image)
    {
        foreach($image as $multi_images) {
            $name_gen = hexdec(uniqid()).'.'.$multi_images->getClientOriginalExtension();
            Image::make($multi_images)->resize(220, 220)->save('uploads/partners/'.$name_gen);
            $save_url = 'uploads/partners/'.$name_gen;
            PartnerMultiImages::insert([
                'images' => $save_url,
                'created_at' => Carbon::now()
            ]);
        }
    }

    public function updateMultiImages($id, $image)
    {
        if (File::exists($image)) {
            File::delete($image);
        };

        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(220, 220)->save('uploads/partners/'.$name_gen);
        $save_url = 'uploads/partners/'.$name_gen;
        PartnerMultiImages::findOrFail($id)->update(['images' => $save_url]);

    }

    public function destroyMultiImage($image)
    {
        if (File::exists($image)) {
            File::delete($image);
        }
    }
}

?>
