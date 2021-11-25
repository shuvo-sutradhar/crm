<?php

namespace App\Http\Controllers\API;

use App\Models\Tag;
use Illuminate\Http\Request;
use App\Http\Resources\TagResource;
use App\Http\Controllers\Controller;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        if(request()->get('page')) {
            // get user with pagination
            return TagResource::collection(Tag::latest()->paginate(10));
        } else {
            // get all user
            return TagResource::collection(Tag::get());
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }




    /**
     * Display a listing of the resource.
     *
     */
    public function search($queries)
    {
        return TagResource::collection(Tag::where(function($query) use ($queries) {
                                            $query->where('name', 'like', '%' . $queries . '%');
                                        })
                                        ->latest()
                                        ->paginate(10));
    }




    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
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
     * @param  int  $slug
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        $tag = Tag::where('slug', $slug)->first();
        $tagName = $tag->name;
        $tag->delete();
        // Create activity log 
        activity()
        ->performedOn($tag)
        ->causedBy(auth()->user())
        ->log("Tag `{$tagName}` Deleted.");
        return $this->responseWithSuccess('Team deleted successfully');
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  array  $tag_slug
     * @return \Illuminate\Http\Response
     */
    public function delete_tags(Request $request)
    {
        Tag::whereIn('slug', $request->data)->delete();
        // Create activity log 
        activity()
        ->performedOn(new Tag())
        ->causedBy(auth()->user())
        ->log("All tags Deleted");

        return $this->responseWithSuccess('Tag deleted successfully');
    }
}
