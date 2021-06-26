<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Report;

use App\User;

class ReportController extends Controller
{
    public function create($user_id) {
        $report = new Report;
        $user = User::where('id', $user_id)->first();
        return view ('reports.create', ['user'=>$user, 'user_id'=>$user_id, 'report'=>$report]);
    }
    
    public function store(Request $request, $user_id) {
        $request->validate([
            'date' =>'required',
            'first_condition' => ['required', 'string', 'max:255'],
            'first_content' => ['required', 'string', 'max:1000'],
            'second_condition' => ['nullable', 'string', 'max:255'],
            'second_content' => ['nullable', 'string', 'max:1000'],
            'full_body' => ['required', 'string', 'max:1000'],
            'selfcare' =>['required', 'string', 'max:1000']
             ]);
             
        $user = User::findOrFail($user_id);
        $user->reports()->create([
            
            'date' => $request->date,
            'first_condition' => $request->first_condition,
            'first_content' => $request->first_content,
            'second_condition' => $request->second_condition,
            'second_content' => $request->second_content,
            'full_body' => $request->full_body,
            'selfcare' => $request->selfcare,
        ]);
        
        return redirect()->route('users.show', ['user' => $user_id]); 
    }
    
    public function show($user_id, $report_id) {
        $report_record = Report::findOrFail($report_id);
        $user = User::where('id', $user_id)->first();
         if(\Auth::user()->is_admin == '1' || (\Auth::user()->id == $user_id && $report_record->user_id == $user_id) )
         {
            return view('reports.show', ['user'=>$user,'user_id'=>$user_id, 'report'=>$report_record]);
         }
         return redirect('/');
    }
    
    public function edit($user_id, $report) {
        $report_record = Report::findOrFail($report);
        $user = User::where('id', $user_id)->first();
        return view('reports.edit', ['user'=>$user, 'user_id'=>$user_id, 'report'=>$report_record]);
    }
    
    public function update(Request $request, $user_id, $report) {
        $request->validate([
            'date' =>'required',
            'first_condition' => ['required', 'string', 'max:255'],
            'first_content' => ['required', 'string', 'max:1000'],
            'second_condition' => ['nullable', 'string', 'max:255'],
            'second_content' => ['nullable', 'string', 'max:1000'],
            'full_body' => ['required', 'string', 'max:1000'],
            'selfcare' =>['required', 'string', 'max:1000']
             ]);
             
        $report = Report::findOrFail($report);
        
        $report->date = $request->date;
        $report->first_condition = $request->first_condition;
        $report->first_content = $request->first_content;
        $report->second_condition = $request->second_condition;
        $report->second_content = $request->second_content;
        $report->full_body = $request->full_body;
        $report->selfcare = $request->selfcare;
        $report->save();
            
        return redirect()->route('reports.show', ['user_id'=>$user_id, 'report'=>$report]); 
    }
    
    public function destroy($user_id, $report) {
        $report = Report::findOrFail($report);
        $report->delete();
        
        return redirect()->route('users.show', ['user' => $user_id]);
    }
}
