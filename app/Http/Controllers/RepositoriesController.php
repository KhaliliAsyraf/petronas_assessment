<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Repositories;
use App\Helpers\CurlFunc;
use Illuminate\Pagination\LengthAwarePaginator;

class RepositoriesController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $repos = Repositories::paginate(20);
        return view('dashboard.repositories.reposList', ['repos' => $repos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.repositories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title'             => 'required|min:5|max:64'
        ]);

        $user = auth()->user();

        $exist_repos = Repositories::where('name', $request->input('title'))->first();
        // dd($exist_repos);

        $git_response = CurlFunc::curlFunc($request->input('title'));
        $res = json_decode($git_response, true);
        // dd($res['total_count']);
        $details = $res['items'];
            // dd($detailss);
        if($exist_repos == null){
            $repos = Repositories::create([
                'name' => $request->input('title'),
                'total_repo' => $res['total_count'],
                'repo_details' => json_encode($details)
            ]);
        } else {
            $repos = Repositories::where('name', $request->input('title'))
            ->update([
                'total_repo' => $res['total_count'],
                'repo_details' => json_encode($details)
            ]);
        }

        $request->session()->flash('message', 'Successfully search repositories');
        return redirect()->route('repository.search-result', ['q' => $request->input('title')]);
    }

    public function searchList(Request $request)
    {
        $detailss = Repositories::where('name', $request->input('q'))->first();
        
        $newd = collect(json_decode($detailss->repo_details, true));
        $current_page = LengthAwarePaginator::resolveCurrentPage();

        $page = 5;

        // Set default per page
        $perPage = 10;

        // Offset required to take the results
        $offset = ($current_page - 1) * $perPage;

        $details =  new LengthAwarePaginator(
            $newd->slice($offset, $perPage),
            $newd->count(),
            $perPage,
            $page,
            ['path' => request()->url(), 'query' => request()->query()]
       );
        return view('dashboard.repositories.search-result', ['details' => $details]);
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
    public function destroy($id)
    {
        //
    }
}
