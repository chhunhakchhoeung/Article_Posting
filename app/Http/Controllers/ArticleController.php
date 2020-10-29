<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\ArticlePhoto;
use App\Models\Category;
use Carbon\Traits\Date;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['articles'] = Article::with('categories')->orderBy('id', 'desc')->get();

        return view('admins.articles.index')->with($data);
    }

    // Get published
    public function published()
    {
        $data['articles'] = Article::with('categories')->where('status', '1')->orderBy('id', 'desc')->get();

        return view('admins.articles_published.index')->with($data);
    }

    // Publish
    public function makePubish($id = 0)
    {
        $make_publish = Article::where('id', $id)
        ->update([
            'status' => '1',
            'published_at' => date('Y-m-d'),
        ]);

        return redirect('admin/articles')->with('success', 'The article has been published successfully!');
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['categories'] = Category::get();
        return view('admins.articles.createOrUpdate')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id = 0)
    {
        // Form validation
        $this->validate($request, [
            'title' => 'required|min:10',
            'content' => 'required|min:200',
            'video_link' => 'required',
            'category_id' => 'required',
        ]);

        $slug = preg_replace('~[^\pL\d]+~u', '-', $request->title);
        $data = [
            'title' => $request->title,
            'content' => $request->content,
            'published_at' => date('Y-m-d'),
            'slug' => 'article-'.$slug,
            'category_id' => $request->category_id,
            'amount_viewer' => 0,
            'video_link' => $request->video_link == '' ? '0' : $request->video_link,
            'user_id' => Auth::user()->id,
        ];

        $createOrUpdate = Article::updateOrCreate(['id' => $id], $data);
        Article::where('id', $createOrUpdate->id)->update(['url' => 'http://article-posting.herokuapp.com/view/article/detail/'.$createOrUpdate->id]);
        $images = $request->file('files');
        if ($request->hasFile('files')) :
                foreach ($images as $item):
                    $var = date_create();
                    $time = date_format($var, 'YmdHis');
                    $imageName = $time . '-' . $item->getClientOriginalName();
                    //$item->move(base_path() . 'resources/uploads/file/', $imageName);
                    $destinationPath = public_path('/images/uploads/file/');
                    $item->move($destinationPath, $imageName);
                    $arr[] = $imageName;
                    $image = implode(",", $arr);
                    ArticlePhoto::insert(
                        array(
                            'article_id' => $createOrUpdate->id,
                            'name' => '/images/uploads/file/'.$image,
                            'path' => '/images/uploads/file/'.$image
                        )
                    );
                endforeach;
        else:
                $image = '';
        endif;


        return redirect('admin/articles')->with('success','Article '.($id != '0'? 'Updated' : 'Created') .' successfully!');;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['object'] = Article::find($id);
        $data['categories'] = Category::get();
        return view('admins.articles.createOrUpdate')->with($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $detete = Article::where('id', $request->id)->delete();
        if($detete) {
            $request->session()->flash('success', 'Data has been deleted!');
            return redirect('admin/articles');
        }else {
            $request->session()->flash('error','Fail to save data, please check again!');
            return redirect('admin/articles');
        }
    }

    public function allArticles()
    {
        $data['articlelists'] = Article::where('status', '1')->orderBy('id', 'desc')->with('articlePhotoFisrt','articleWriter')->paginate(10);
        return view('contents.articlelist', ["title" => "New Articles"])->with($data);
    }
    // search article
    public function searchArticle(Request $request)
    {
        $article_list['articlelists'] = Article::where( 'title', 'LIKE', '%' . $request->title . '%' )->paginate(10);

        if(count($article_list) > 0) {
            return view('contents.articlelist', ["title" => "Search Articles"])->with($article_list);
        }else{
            return view ('welcome')->withMessage('No Details found. Try to search again !');
        }
    }

    public function entertainment()
    {
        $data['articlelists'] = Article::where('category_id', 1)->where('status', '1')->orderBy('id', 'desc')->with('articlePhotoFisrt','articleWriter')->paginate(10);
        return view('contents.articlelist', ['title' => 'Entertainments'])->with($data);
    }

    public function sports()
    {
        $data['articlelists'] = Article::where('category_id', 2)->where('status', '1')->orderBy('id', 'desc')->with('articlePhotoFisrt','articleWriter')->paginate(10);
        return view('contents.articlelist', ['title' => 'Sports'])->with($data);
    }

    public function technology()
    {
        $data['articlelists'] = Article::where('category_id', 3)->where('status', '1')->orderBy('id', 'desc')->with('articlePhotoFisrt','articleWriter')->paginate(10);
        return view('contents.articlelist', ['title' => 'Technology'])->with($data);
    }

    public function social()
    {
        $data['articlelists'] = Article::where('category_id', 4)->where('status', '1')->orderBy('id', 'desc')->with('articlePhotoFisrt','articleWriter')->paginate(10);
        return view('contents.articlelist', ['title' => 'Socials'])->with($data);
    }

    // get article detail

    public function getArticle_detail($id = 0)
    {
        $data['get_article_detail'] = Article::where('id', $id)->with('articlePhoto')->first();
        $get_amount_viewer = Article::where('id', $id)->select('amount_viewer')->first();
        $save_amount_viewer = Article::where('id', $id)->update(['amount_viewer' => ($get_amount_viewer->amount_viewer + 1)]);
        return view('contents.article_detail')->with($data);
    }
}
