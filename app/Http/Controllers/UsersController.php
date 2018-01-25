<?php
namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Hashing\BcryptHasher;


class UsersController extends Controller {

    public function add(Request $request) {
		$request['api_token'] = str_random(32);
		$request['password'] = app('hash')->make($request['password']);
		$user = User::create($request->all());

        return response()->json($user);
    }

    public function edit(Request $request, $id) {
		$user = User::find($id);
		$post->update($request->all());

        return response()->json($post);
    }

    public function view($id){
        $post = User::find($id);

        return response()->json($post);
    }

    public function delete($id){
        $post = User::find($id);
        $post->delete();

        return response()->json('Removed.');
    }

    public function index() {
        $post = User::all();

        return response()->json($post);
    }
}

?>