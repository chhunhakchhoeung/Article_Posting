<?php

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::post('register', 'Api\PassportAuthController@register');
Route::post('login', 'Api\PassportAuthController@login');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
// , 'middleware' => 'auth:api'
Route::group(['prefix' => 'v0'], function () {
    // Article list
    Route::get('article/list/{category_id?}', function ($category_id = '')
    {
        if ($category_id == '' || $category_id == null) {
            $data = Article::where('status', '1')->paginate(10);
        }
        if ($category_id != '' || $category_id != null) {
            $data = Article::where('status', '1')->where('category_id', $category_id)->paginate(10);
        }

        return response()->json($data);
    });

    Route::post('article/counter/{article_id?}', function ($article_id) {
        $get_amount_viewer = Article::where('id', $article_id)->select('amount_viewer')->first();
        $save_amount_viewer = Article::where('id', $article_id)->update(['amount_viewer' => ($get_amount_viewer->amount_viewer + 1)]);

        if ($save_amount_viewer) {
            return true;
        }
    });

    // Article detail

    Route::get('article/detail/{article_id?}', function ($article_id = '')
    {
        $article_detail = Article::where('id', $article_id)->select('id')->first();

        if ($article_id == null || $article_id == '' && $article_detail === null || $article_detail === '') {
            $response = ['response' => false, 'message' => 'Not Found'];
        }

        if ($article_id != '' || $article_id != null && $article_detail->id != null) {
            $data = Article::where('status', '1')->where('id', $article_id)->with('articlePhotoHasOne')->first();

            $response = ['response' => true, 'message' => 'Successfully', 'data' => $data];
        }

        return $response;
    });


    // Search

    Route::get( 'article/search', function (Request $request) {
        $search = $request->get('title');

        $article_list = Article::where ( 'title', 'LIKE', '%' . $search . '%' )->paginate(10);
        if (count( $article_list ) > 0)
            return ['response' => true, 'message' => 'Successfully', 'data' => $article_list];
        else
            return ['response' => false, 'message' => 'Not Found'];
    } );


    // Filter
    Route::get( 'article/filter', function (Request $request) {
        $article_list = Article::whereBetween( 'published_at', [$request->start_date, $request->end_date])->paginate(10);
        if (count( $article_list ) > 0)
            return ['response' => true, 'message' => 'Successfully', 'data' => $article_list];
        else
            return ['response' => false, 'message' => 'Not Found'];
    });

});

