<?php

namespace App\Http\Controllers;

use App\Models\School;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
class SchoolController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $schools = School::latest()->paginate(2);

        return view('school.index', compact('schools'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('school.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'logo' => "required|dimensions:min_width=100,min_height=100",
        ]);

        // to allow upload same file multibe times without conflict with names
        $logo_name =  $request['name'] . '-'.md5(time()) . ".jpg" ;
        $img = Image::make( $request->file('logo')->getRealPath() );
        $img->save('storage/'.$logo_name   );
        $school = new School ;
        $school->name = $request['name']  ;
        $school->email = $request['email']  ;
        $school->logo = $logo_name   ;
        $school->website = $request['website']  ;
        $school->save() ;

        return redirect()->route('schools.index')
            ->with('success', 'school was created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\School  $school
     * @return \Illuminate\Http\Response
     */
    public function show(School $school)
    {
        return view('school.show', compact('school'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\School  $school
     * @return \Illuminate\Http\Response
     */
    public function edit(School $school)
    {
        return view('school.edit', compact('school'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\School  $school
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, School $school)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'logo' => "required|dimensions:min_width=100,min_height=100",
        ]);
         // to allow upload same file multibe times without conflict with names
        $logo_name =  $request['name'] . '-'.md5(time()) . ".jpg" ;
        $img = Image::make( $request->file('logo')->getRealPath() );
        $img->save('storage/'.$logo_name   );
        $school = School::findOrFail($school->id);

        $school->name = $request['name']  ;
        $school->email = $request['email']  ;
        $school->logo = $logo_name   ;
        $school->website = $request['website']  ;
        $school->save() ;

        return redirect()->route('schools.index')
            ->with('success', 'school was updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\School  $school
     * @return \Illuminate\Http\Response
     */
    public function destroy(School $school)
    {
        $school->delete();

        return redirect()->route('school.index')
            ->with('success', 'school deleted successfully');
    }

}
