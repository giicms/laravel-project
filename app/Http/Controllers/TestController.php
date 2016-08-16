<?php

namespace App\Http\Controllers;

use App\Post;
use Validator;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\ExampleModel;
use Illuminate\Http\Request;

class TestController extends Controller {

    public function demo() {
        $test = new Post();
        $test->title = 'Toi di day';
        $test->description = 'Toi cung di day';
        $test->array = ['1' => 'asa', '2' => 'ssdaaaaaa'];
        var_dump($test->save());
        exit;
        $test->save();
    }

    public function create(Request $request) {
        $model = new Post();
        if ($request->isMethod('post')) {
            $validator = Validator::make($request, [
                        'title' => 'required',
                        'description' => 'required',
            ]);
            if ($validator->fails()) {
//                $messages = $validator->errors();
//                dd($messages->first('title'));
                return response()->json($validator->errors()->getMessages(), 400);
            } else {
                $model->title = $request->title;
                $model->description = $request->description;
                $model->save();
                return response()->json([
                            'msg' => 'Success',
                            'id' => $model->id
                                ], 200);
            }
        }
    }

}
