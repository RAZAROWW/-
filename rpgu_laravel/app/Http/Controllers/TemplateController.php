<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Template;

class TemplateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $templates = Template::all();

        return view('templates.index', ['templates' => $templates]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('templates.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $template = new Template();

        $template->table_name = $request->table_name;
        $template->cell_name = $request->cell_name;
        $template->day = $request->day;
        $template->year = $request->year;
        $template->text_mail = $request->text_mail;

        $template->save();

        return redirect()->route('templates.show', $template->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $template = Template::find($id);

        return view('templates.show', ['template' => $template]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $template = Template::find($id);

        return view('templates.edit', ['template' => $template]);
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
        $template = Template::find($id);

        // Save the data to the DB
        $template->table_name = $request->input('table_name');
        $template->cell_name = $request->input('cell_name');
        $template->day = $request->input('day');
        $template->year = $request->input('year');
        $template->text_mail = $request->input('text_mail');


        $template->save();

        //Redirect to show route
        return redirect()->route('templates.show', $template->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $template = Template::find($id);

        $template->delete();

        return redirect()->route('templates.index');
    }
}
