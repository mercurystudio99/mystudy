<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Models\Level;
use App\Models\Subject;
use App\Models\SubLevel;
use App\Models\WhatYouTeach;
use DB;
use Illuminate\Http\Request;

class WhatYouTeachController extends Controller
{
    public function index() {
        $user = auth()->user();
        if ($user->isUser()) {
            abort(404);
        }

        $query = WhatYouTeach::where(function ($query) use ($user) {
            $query->where('what_you_teaches.user_id', $user->id);
        })->get();

        $data = [
            'pageTitle' => 'What To Teach',
            'records' => $query,
        ];

        return view('web.default.panel.youTeach.index', $data);
    }
    public function create()
    {
        $subjects = Subject::all();
        $levels = Level::all();
        $sub_levels = SubLevel::all();
        // $this->authorize('admin_categories_create');


        $data = [
            'pageTitle' => 'New What To Teach',
            'subjects' => $subjects,
            'levels' => $levels,
            'sub_levels' => $sub_levels,
        ];

        return view('web.default.panel.youTeach.create', $data);
    }

    public function store(Request $request)
    {
        $file = $request->file('banner');
        if ($file) {
            $fileName   = time() . '.' . $file->getClientOriginalExtension();
            $file->move('images', $fileName);
        }
        else{
            
            $fileName = null;
        }
        // $this->authorize('admin_categories_create');

        $this->validate($request, [
            'subject_id' => 'required',
            'level_id' => 'required',
            'sublevel_id' => 'required',
            'description' => 'required|min:3|max:128'
        ]);

        $data = $request->all();
        
        $user = auth()->user()->id;
        $record = WhatYouTeach::create([
            // 'slug' => $data['slug'] ?? Category::makeSlug($data['title']),
            'subject_id' => $data['subject_id'],
            'level_id' => $data['level_id'],
            'user_id' => $user,
            'status' => $data['status'],
            'banner' => $fileName,
            'sublevel_id' => $data['sublevel_id'],
            'description' => $data['description'],
        ]);

        cache()->forget(WhatYouTeach::$cacheKey);

        removeContentLocale();

        return redirect('/panel/what-to-teach');
    }
    public function edit(Request $request, $id){
        $record = WhatYouTeach::where('id',$id)->first();
        $subjects = Subject::all();
        $levels = Level::all();
        $sub_levels = SubLevel::all();
        $data = [
            'pageTitle' => 'What To Teach',
            'subjects' => $subjects,
            'levels' => $levels,
            'sub_levels' => $sub_levels,
            'record' => $record,
        ];
        return view('web.default.panel.youTeach.create', $data);
    }
    public function update(Request $request, $id){
        $this->validate($request, [
            'subject_id' => 'required',
            'level_id' => 'required',
            'sublevel_id' => 'required',
            'description' => 'required|min:3|max:128'
        ]);
        $data = $request->all();
        $user = auth()->user()->id;
        $file = $request->file('banner');
        if ($file) {
            $fileName   = time() . '.' . $file->getClientOriginalExtension();
            $file->move('images', $fileName);
        }
        else{
            $fileName = null;
        }
        $record = WhatYouTeach::where('id',$id)->update([
            // 'slug' => $data['slug'] ?? Category::makeSlug($data['title']),
            'subject_id' => $data['subject_id'],
            'level_id' => $data['level_id'],
            'user_id' => $user,
            'status' => $data['status'],
            'sublevel_id' => $data['sublevel_id'],
            'description' => $data['description'],
        ]);
        if ($file) {
            WhatYouTeach::where('id', $id)->update(['banner' => $fileName]);
        }
        cache()->forget(WhatYouTeach::$cacheKey);

        removeContentLocale();

        return redirect('/panel/what-to-teach');
    }
    public function destroy(Request $request, $id)
    {
        // $this->authorize('admin_categories_delete');

        $record = WhatYouTeach::findOrFail($id);
        $record->delete();

        cache()->forget(WhatYouTeach::$cacheKey);

        return response()->json([
            'code' => 200,
        ]);
    }
}
