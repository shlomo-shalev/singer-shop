<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Image, Str, DB, App\Models\Order;

class RapleyServiceProvider extends ServiceProvider
{

    const IMAGE_NAME_DEFAULT = 'no-image.jpg';
    const FILE_FINAL_TRUE = ['png', 'jpg', 'gif', 'webp', 'jpeg'];

    static public function saveImage($request, $url, $image_default = false){
        
        $image_name = $image_default ? $image_default : self::IMAGE_NAME_DEFAULT;

        if( $request->hasFile('image') ){


            $file = $request->file('image');

            if( $file->isValid() ){

                if(in_array(strtolower($file->getClientOriginalExtension()) ,self::FILE_FINAL_TRUE)){

                    $image_name = self::fileNameRandom($file->getClientOriginalName());
                    $file->move(public_path() . $url, $image_name);

                    $img = Image::make(public_path() . $url . $image_name);
                    $height = $img->height();
                    $width = $img->width();
                    $width = $height - $width < 0 ? $height : $width;
                    $width = $width > 500 ? 500 : $width;
                    $img->orientate();
                    $img->fit($width, floor($width * 0.7), function ($constraint) {
                        $constraint->aspectRatio();
                        $constraint->upsize();
                    });
                    $img->save();

                }

            }
            
        }

        return $image_name;

    }

    static public function fileNameRandom($original_image_name)
    {
        return date('Y.m.d.H.i.s') . '-' . Str::random(7) . '-' . $original_image_name;
    }

    static public function totalCPUO(){
        $count_cpuo = DB::select("
        SELECT COUNT(DISTINCT c.id) categories, COUNT(DISTINCT p.id) products, NULL users, NULL orders FROM categories c 
        LEFT JOIN products p ON p.categorie_id = c.id
        
        UNION
        
        SELECT NULL,NULL, COUNT(DISTINCT u.id), NULL FROM users u
        
        UNION
        
        SELECT NULL,NULL, NULL, COUNT(DISTINCT o.id) products FROM orders o
        ");

        return [
            'categories' => $count_cpuo[0]->categories, 
            'products' => $count_cpuo[0]->products, 
            'users' => $count_cpuo[1]->users, 
            'orders' => $count_cpuo[2]->orders,
        ];
    }

}
