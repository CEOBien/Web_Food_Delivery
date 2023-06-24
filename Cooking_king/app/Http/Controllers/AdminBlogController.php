<?php

namespace App\Http\Controllers;

use App\Blog;
use App\Http\Requests\BlogAddRequest;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

use App\Traits\StorageImageTrait;
use App\Traits\DeleteModelTrait;

class AdminBlogController extends Controller
{
    //khai bao de co the su dung dung Trait
    use StorageImageTrait,DeleteModelTrait;
    private $blog;
    public function __construct(Blog $blog)
    {
        $this->blog = $blog;
    }
    public function index()
    {
        //lay ra danh sach moi nhat va phan 5 san pham 1 trang
        $blogs = $this->blog->latest()->paginate(5);
        return view('admin.blog.index', compact( 'blogs'));
    }
    public function create()
    {
        return view('admin.blog.add');
    }
    public function store(Request $request)
    {
        try {
            //tao 1 mang co ten dataInsert de nhan du lieu tu request
            $dataInsert = [
                'title' => $request->name,
                'content' => $request->contents
            ];
            //luu anh 
            $dataImageSlider = $this->storageTraitUpload($request, 'feature_image_path', 'blog');
            //kiem tra xem a co ton tai hay k neu co thi moi insert
            if( !empty($dataImageSlider) ) {
                $dataInsert['feature_image_name'] = $dataImageSlider['file_name'];
                $dataInsert['feature_image_path'] = $dataImageSlider['file_path'];
            }
            //them vao bang blog trong DB
            $this->blog->create($dataInsert);
            return redirect()->route('blogs.index');
        } catch (Exception $exception) {
            Log::error('Error : ' . $exception->getMessage() . '---Line: ' . $exception->getLine());
        }

    }
    public function edit($id)
    {
        //tim id 
        $blogs = $this->blog->find($id);
        return view('admin.blog.edit', compact('blogs'));
    }
    public function update($id,Request $request)
    {
        try {
            $dataInsert = [
                'title' => $request->name,
                'content' => $request->contents
            ];
            $dataImageSlider = $this->storageTraitUpload($request, 'feature_image_path', 'blog');
            if( !empty($dataImageSlider) ) {
                $dataInsert['feature_image_name'] = $dataImageSlider['file_name'];
                $dataInsert['feature_image_path'] = $dataImageSlider['file_path'];
            }
            //sua du lieu bang blog trong db
            $this->blog->find($id)->update($dataInsert);
            //quay lai trang blogs
            return redirect()->route('blogs.index');
        } catch (Exception $exception) {
            Log::error('Error : ' . $exception->getMessage() . '---Line: ' . $exception->getLine());
        }
    }
    public function delete($id)
    {
        //call ajax de xoa
        return $this->DeleteModelTrait($id, $this->blog);
    }
}
