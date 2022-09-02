<?php
//validaton
        $request->validate([
            'name_en'=>['required','max:255'],
            'name_ar'=>['required','max:255'],
            'price'=>['required','numeric','between:1,999999.99'],
            'quantity'=>['nullable','integer','between:1,999'],
            'status'=>['nullable','in:0,1'],
            'code'=>$code_validation,
            'details_en'=>['required'],
            'details_ar'=>['required'],
            'brand_id'=>['nullable','integer','exists:brands,id'],
            'sub_catogrie_id'=>['required','integer','exists:sub_catogries,id'],
            'image'=>$image_validation
            ]);

?>