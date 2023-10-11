<?php

namespace App\Services;

use App\Models\About;
use App\Models\Banner;
use App\Models\Blog;
use App\Models\Service;
use App\Models\Portfolio;
use App\Models\WorkingProcess;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class FileUploadService {

    public function updateAboutImage($validatedData, $id, $image)
    {
        if (File::exists($image)) {
            File::delete($image);
        };

        $image_name = uniqid() . '.' . $validatedData['image']->getClientOriginalExtension();
        $image_path = 'uploads/about/'.$image_name;
        Image::make($validatedData['image'])->resize(636, 852)->save(public_path($image_path));
        $validatedData['image'] = $image_path;

        About::findOrFail($id)->update($validatedData);
    }

    public function updateBannerImage($validatedData, $id, $image)
    {
        if (File::exists($image)) {
            File::delete($image);
        };

        $image_name = uniqid() . '.' . $validatedData['image']->getClientOriginalExtension();
        $image_path = 'uploads/banner/'.$image_name;
        Image::make($validatedData['image'])->resize(636, 852)->save(public_path($image_path));
        $validatedData['image'] = $image_path;

        Banner::findOrFail($id)->update($validatedData);
    }

    public function storeServiceImage($validatedData)
    {
        $image_name = uniqid() . '.' . $validatedData['image']->getClientOriginalExtension();
        $image_path = 'uploads/services/'.$image_name;
        Image::make($validatedData['image'])->resize(323, 240)->save(public_path($image_path));
        $validatedData['image'] = $image_path;

        Service::insert($validatedData + ['created_at' => Carbon::now()]);

    }

    public function updateServiceImage($validatedData, $id, $image)
    {
        if (File::exists($image)) {
            File::delete($image);
        };

        $image_name = uniqid() . '.' . $validatedData['image']->getClientOriginalExtension();
        $image_path = 'uploads/services/'.$image_name;
        Image::make($validatedData['image'])->resize(323, 240)->save(public_path($image_path));
        $validatedData['image'] = $image_path;

        Service::findOrFail($id)->update($validatedData);
    }

    public function destroyServiceImage($image)
    {
        if (File::exists($image)) {
            File::delete($image);
        };
    }

    public function storePortfolioImage($validatedData)
    {
        $image_name = uniqid() . '.' . $validatedData['image']->getClientOriginalExtension();
        $image_path = 'uploads/portfolio/'.$image_name;
        Image::make($validatedData['image'])->resize(1020, 519)->save(public_path($image_path));
        $validatedData['image'] = $image_path;

        Portfolio::insert($validatedData);
    }

    public function updatePortfolioImage($validatedData, $id, $image)
    {
        if (File::exists($image)) {
            File::delete($image);
        };

        $image_name = uniqid() . '.' . $validatedData['image']->getClientOriginalExtension();
        $image_path = 'uploads/portfolio/'.$image_name;
        Image::make($validatedData['image'])->resize(1020, 519)->save(public_path($image_path));
        $validatedData['image'] = $image_path;

        Portfolio::findOrFail($id)->update($validatedData);
    }

    public function destroyPortfolioImage($image)
    {
        if (File::exists($image)) {
            File::delete($image);
        };
    }

    public function storeWorkingProcessImage($validatedData)
    {
        $image_name = uniqid() . '.' . $validatedData['image']->getClientOriginalExtension();
        $image_path = 'uploads/working_process/'.$image_name;
        Image::make($validatedData['image'])->resize(56, 56)->save(public_path($image_path));
        $validatedData['image'] = $image_path;

        WorkingProcess::insert($validatedData);
    }

    public function updateWorkingProcessImage($validatedData, $id, $image)
    {
        if (File::exists($image)) {
            File::delete($image);
        };

        $image_name = uniqid() . '.' . $validatedData['image']->getClientOriginalExtension();
        $image_path = 'uploads/working_process/'.$image_name;
        Image::make($validatedData['image'])->resize(56, 56)->save(public_path($image_path));
        $validatedData['image'] = $image_path;

        WorkingProcess::findOrFail($id)->update($validatedData);
    }

    public function destroyWorkingProcessImage($image)
    {
        if (File::exists($image)) {
            File::delete($image);
        };
    }

    public function storeBlogImage($validatedData)
    {
        $image_name = uniqid() . '.' . $validatedData['image']->getClientOriginalExtension();
        $image_path = 'uploads/blogs/'.$image_name;
        Image::make($validatedData['image'])->resize(430, 327)->save(public_path($image_path));
        $validatedData['image'] = $image_path;

        Blog::insert($validatedData + ['created_at' => Carbon::now()]);
    }

    public function updateBlogImage($validatedData, $id, $image)
    {
        if (File::exists($image)) {
            File::delete($image);
        };

        $image_name = uniqid() . '.' . $validatedData['image']->getClientOriginalExtension();
        $image_path = 'uploads/blogs/'.$image_name;
        Image::make($validatedData['image'])->resize(430, 327)->save(public_path($image_path));
        $validatedData['image'] = $image_path;

        Blog::findOrFail($id)->update($validatedData);
    }

    public function destroyBlogImage($image)
    {
        if (File::exists($image)) {
            File::delete($image);
        };
    }
}


?>
