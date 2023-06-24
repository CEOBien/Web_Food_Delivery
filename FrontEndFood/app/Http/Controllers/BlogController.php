<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use App\Models\Comment;
use Dotenv\Validator;
use Illuminate\Http\Request;
use Mockery\CountValidator\AtLeast;

class BlogController extends Controller
{
    private $blog;
    private $comment;
    public function __construct(Blog $blog, Comment $comment)
    {
        $this->blog = $blog;
        $this->comment = $comment;
    }
    
    public function index()
    {
        $blogs = $this->blog->latest()->paginate(5);
        $categorys = Category::where('parent_id', 0)->get();
        $categorysLimit = Category::where('parent_id', 0)->take(3)->get();
        return view('blog.blog' , compact('categorysLimit', 'categorys', 'blogs') );
    }
    public function show($id)
    {
        //dòng này để tìm id trang blog
        $blogshow = Blog::find($id);
        //dòng này in tổng cmt của trang blog
        $commentshowone = Comment::where(['idBlog' => $id])->count();
        
        $categorys = Category::where('parent_id', 0)->get();
        $categorysLimit = Category::where('parent_id', 0)->take(3)->get();
        //dòng này ta sử dụng where để tìm cmt cha ra và lấy 15 cmt
        $commentshow = Comment::where(['idBlog' => $id, 'reply_id' => 0])->take(15)->get();
        return view('blog.blogdetail.blogDetail', compact('categorysLimit', 'categorys', 'commentshowone','blogshow','commentshow'));
    }
    // cái này để lưu cmt
    public function comment($id,Request $request)
    {
        
            $savecomment = [
                'idUser' => auth()->id(),
                'idBLog' => $id,
                'noidung' => $request->comment,
                'reply_id' => $request->reply_id ? $request->reply_id : 0
    
            ];
            if($comment =  $this->comment->create($savecomment))
            {
                $blogshow = Blog::find($id);
                $commentshowone = Comment::where(['idBlog' => $id])->count();
                $commentshow = Comment::where(['idBlog' => $id, 'reply_id' => 0])->take(15)->get();
                return view('blog.blogdetail.list-comment', compact('commentshow','blogshow','commentshowone'));
            }
    }
}
