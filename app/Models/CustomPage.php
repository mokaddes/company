<?php
namespace App\Models;
use Illuminate\Support\Str;
use App\Traits\RepoResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;

class CustomPage extends Model
{
    use RepoResponse;
    protected $table        = 'custom_pages';
    public $timestamps      = false;


    public function getPaginatedList($request, int $per_page = 20)
    {
        $data = $this->orderBy('order_id','DESC')->paginate($per_page);
        return $this->formatResponse(true, '', 'admin.cpage.index', $data);
    }
    public function getShow(int $id)
    {
        $data =  CustomPage::find($id);
        if (!empty($data)) {
            return $this->formatResponse(true, 'Data found', 'admin.custom-page.edit', $data);
        }
        return $this->formatResponse(false, 'Did not found data !', 'admin.cpage.index', null);
    }

    public function postStore($request)
    {
        DB::beginTransaction();
        try {
            $page                   = new CustomPage();
            $page->title            = $request->title;
            if(!empty($request->url_slug)){
                $str                = strtolower($request->url_slug);
                $page->url_slug     = Str::slug($str);
            }
            else{
                $str                = strtolower($request->title);
                $page->url_slug     = Str::slug($str);
            }
            $page->display_in       = $request->display_in;
            $page->body             = $request->body;
            $page->position         = $request->position;
            $page->is_active        = $request->status;
            $page->order_id         = CustomPage::max('order_id')+1;
            $page->meta_title       = $request->meta_title;
            $page->meta_keywords    = $request->meta_keywords;
            $page->meta_description = $request->meta_description;
            $page->created_by       = Auth::user()->id;
            $page->created_at       = date('Y-m-d H:i:s');
            $page->save();
        } catch (\Exception $e) {
              DB::rollback();
              dd($e);
            return $this->formatResponse(false, 'Unable to create page !', 'admin.cpage.create');
        }
        DB::commit();
        return $this->formatResponse(true, 'page has been created successfully !', 'admin.cpage.index',$page->PK_NO);
    }

     public function putUpdate($request)
    {
        DB::beginTransaction();
        try {
            $page                   = CustomPage::findOrFail($request->id);
            $page->title            = $request->title;

            // if(!empty($request->url_slug)){
            //     $str                = strtolower($request->url_slug);
            //     $page->url_slug     = Str::slug($str);
            // }
            // else{
            //     $str                = strtolower($request->title);
            //     $page->url_slug     = Str::slug($str);
            // }

            $page->display_in       = $request->display_in ?? null;
            $page->body             = $request->body;
            $page->body_de          = $request->body_de;
            $page->position         = $request->position ??  null;
            $page->is_active        = $request->status;
            $page->order_id         = $request->order_id ?? 1;
            $page->meta_title       = $request->meta_title;
            $page->meta_keywords    = $request->meta_keywords;
            $page->meta_description = $request->meta_description;

            if(isset($request->content_1) && !empty($request->content_1))
            {
                $page->content_1 = $request->content_1;
            }
            if(isset($request->content_1_de) && !empty($request->content_1_de))
            {
                $page->content_1_de = $request->content_1_de;
            }
            if ($request->hasFile('image_1')) {

                // Delete the existing image file if it exists
                if (File::exists(public_path($page->image_1))) {
                    File::delete(public_path($page->image_1));
                }

                // Upload and save the new image
                $image_1 = $request->file('image_1');
                $base_name  = preg_replace('/\..+$/', '', $image_1->getClientOriginalName());
                $base_name  = explode(' ', $base_name);
                $base_name  = implode('-', $base_name);
                $base_name  = Str::lower($base_name);
                $image_name = $base_name . "-" . uniqid() . "." . $image_1->getClientOriginalExtension();
                $extension  = $image_1->getClientOriginalExtension();
                $file_path  = 'uploads/admin';
                $image_1->move(public_path($file_path), $image_name);
                $page->image_1  = $file_path . '/' . $image_name;
            }


            if(isset($request->content_2) && !empty($request->content_2))
            {
                $page->content_2 = $request->content_2;
            }
            if(isset($request->content_2_de) && !empty($request->content_2_de))
            {
                $page->content_2_de = $request->content_2_de;
            }
            if ($request->hasFile('image_2')) {

                // Delete the existing image file if it exists
                if (File::exists(public_path($page->image_2))) {
                    File::delete(public_path($page->image_2));
                }

                // Upload and save the new image
                $image_2 = $request->file('image_2');
                $base_name  = preg_replace('/\..+$/', '', $image_2->getClientOriginalName());
                $base_name  = explode(' ', $base_name);
                $base_name  = implode('-', $base_name);
                $base_name  = Str::lower($base_name);
                $image_name = $base_name . "-" . uniqid() . "." . $image_2->getClientOriginalExtension();
                $extension  = $image_2->getClientOriginalExtension();
                $file_path  = 'uploads/admin';
                $image_2->move(public_path($file_path), $image_name);
                $page->image_2  = $file_path . '/' . $image_name;
            }

            $page->updated_by       = Auth::user()->id;
            $page->updated_at       = date('Y-m-d H:i:s');
            $page->save();
        } catch (\Exception $e) {
            dd($e->getMessage());
            DB::rollback();
            return $this->formatResponse(false, __('messages.toastr.unable_create_page'), 'admin.custom-page.edit',$request->id);
        }
        DB::commit();
        return $this->formatResponse(true, __('messages.toastr.success_create_page'), 'admin.cpage.index',$page->PK_NO);
    }

    public function getDelete(int $id)
    {
        DB::begintransaction();
        try {
            // $page = CustomPage::find($id)->delete();
            $page = CustomPage::where('id',$id)->update([
                'is_active' => 0
            ]);
        } catch (\Exception $e) {
            dd($e->getMessage());

            DB::rollback();
            return $this->formatResponse(false, 'Unable to delete page !', 'admin.cpage.index');
        }
        DB::commit();
        return $this->formatResponse(true, 'Successfully delete page !', 'admin.cpage.index');
    }


}
