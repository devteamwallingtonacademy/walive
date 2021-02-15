<?php

namespace App\Http\Controllers;

use App\Models\Batch;
use App\Models\BatchSession;
use App\Models\BatchTopic;
use App\Models\ClassMaster;
use App\Models\ClassSettings;
use App\Models\Subject;
use App\Models\Teacher;
use App\Models\User;
use Carbon\Carbon;
use Database\Seeders\ClassSettings as SeedersClassSettings;
use Illuminate\Http\Request;

class BatchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $totals = Batch::count();
        $totalprice = Batch::count();

        $batches = Batch::latest()->get();
        return view('class.index', compact('batches', 'totals', 'totalprice'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $assignteachers = User::all();
        $classes = ClassMaster::all();
        $subjects = Subject::all();
        $classsettings = ClassSettings::all();
        return view('class.create', compact('classes', 'subjects', 'assignteachers', 'classsettings'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        if (auth()->user()->role == 'admin') {
            $request->validate([
                'class_settings_id' => 'required',
                'batch_price_per_session' => 'required',
                'batch_start_date' => 'required',
                'name' => 'required',
                'teacher_available_status' => 'required',
                'duration_per_sessions_id' => 'required',
                'class_master_id' => 'required',
                'subject_id' => 'required',
                'topic_id' => 'required',
            ]);
        }
        if (auth()->user()->role == 'teacher') {
            $request->validate([
                'class_settings_id' => 'required',
                'batch_price_per_session' => 'required',
                'batch_start_date' => 'required',
                'duration_per_sessions_id' => 'required',
                'class_master_id' => 'required',
                'subject_id' => 'required',
                'topic_id' => 'required',
            ]);
        }
        
        if ($request->class_settings != '') {
            $classSettings = ClassSettings::updateOrCreate(['name' => $request->class_settings]);
            $class = $classSettings->id;
        } else {
            $class = $request->class_settings_id;
        }
        $batch = Batch::Create([
            'name'=> auth()->user()->role == 'teacher' ? auth()->user()->id : $request->name,
            'batch_price_per_session'=>$request->batch_price_per_session,
            'batch_start_date'=>$request->batch_start_date,
            'subject_id'=>$request->subject_id,
            'class_master_id'=>$request->class_master_id,
            'class_settings_id'=>$class,
            'duration_per_session'=>$request->duration_per_sessions_id,
            'teacher_available_status'=>$request->teacher_available_status,
            'created_by' => auth()->user()->id
        ]);
        $index = 1;
        foreach ($request->session_name as $session_name) {
            $d = $request->date_time_session[$index][0];
            $comment = $request->comment[$index][0];
            $batchSession = BatchSession::create([
                'batch_id' => $batch->id,
                'name' => $session_name[0],
                'start_date_time' => $d,
                'comment' => $comment
            ]);
            $topicx = 'topic_'.$index;
            foreach ($request->{$topicx} as $t) {
                BatchTopic::create([
                    'batch_session_id' => $batchSession->id,
                    'topic_id' => $t
                ]);
            }
            $index++;
        }

        return redirect(route('manage-class'))->with('status', 'Class Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Batch  $batch
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        $batch = Batch::find($id);
        return view('class.show', compact('batch'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Batch  $batch
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $class = Batch::find($id);
        return view('class.edit', compact('class'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Batch  $batch
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Batch $batch)
    {
        $class = Batch::updateOrCreate(
            [
            'id'=>$request->id
            ],
            [
            'name'=>$request->name,
            'batch_price_per_session'=>$request->batch_price_per_session,
            'batch_start_date'=>$request->batch_start_date,
            'subject_id'=>$request->subject_id,
            'class_master_id'=>$request->class_master_id,
            // 'class_settings_id'=>$class,
            'duration_per_session'=>$request->duration_per_sessions_id,
            'teacher_available_status'=>$request->teacher_available_status,
            'created_by' => auth()->user()->id
            ]
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Batch  $batch
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $class = Batch::find($id);
        $class->delete();
        return redirect(route('manage-class'))->with('status', 'Class Deleted Successfully');
    }
}
