<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Post;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $posts = Post::where('serial', 'LIKE', "%$keyword%")
                ->orWhere('pilot_name', 'LIKE', "%$keyword%")
                ->orWhere('licence_no', 'LIKE', "%$keyword%")
                ->orWhere('date_of_initial_issue', 'LIKE', "%$keyword%")
                ->orWhere('file_name', 'LIKE', "%$keyword%")
                ->orWhere('current_document', 'LIKE', "%$keyword%")
                ->orWhere('date_of_birth', 'LIKE', "%$keyword%")
                ->orWhere('phone', 'LIKE', "%$keyword%")
                ->orWhere('email', 'LIKE', "%$keyword%")
                ->orWhere('address', 'LIKE', "%$keyword%")
                ->orWhere('validity_of_licence_from', 'LIKE', "%$keyword%")
                ->orWhere('validity_of_licence_to', 'LIKE', "%$keyword%")
                ->orWhere('validity_of_medical_from', 'LIKE', "%$keyword%")
                ->orWhere('validity_of_medical_to', 'LIKE', "%$keyword%")
                ->orWhere('validity_of_ppc_from', 'LIKE', "%$keyword%")
                ->orWhere('validity_of_ppc_to', 'LIKE', "%$keyword%")
                ->orWhere('validity_of_ir_from', 'LIKE', "%$keyword%")
                ->orWhere('validity_of_ir_to', 'LIKE', "%$keyword%")
                ->orWhere('aelpt_level', 'LIKE', "%$keyword%")
                ->orWhere('validity_of_seep', 'LIKE', "%$keyword%")
                ->orWhere('validity_of_crm', 'LIKE', "%$keyword%")
                ->orWhere('validity_of_dgr', 'LIKE', "%$keyword%")
                ->orWhere('validity_of_avsec', 'LIKE', "%$keyword%")
                ->orWhere('validity_of_rvsm', 'LIKE', "%$keyword%")
                ->orWhere('validity_of_fi_from', 'LIKE', "%$keyword%")
                ->orWhere('validity_of_fi_to', 'LIKE', "%$keyword%")
                ->orWhere('validity_of_tri_from', 'LIKE', "%$keyword%")
                ->orWhere('validity_of_tri_to', 'LIKE', "%$keyword%")
                ->orWhere('validity_of_tre_from', 'LIKE', "%$keyword%")
                ->orWhere('validity_of_tre_to', 'LIKE', "%$keyword%")
                ->orWhere('validity_of_rrl_from', 'LIKE', "%$keyword%")
                ->orWhere('validity_of_rrl_to', 'LIKE', "%$keyword%")
                ->orWhere('validity_of_gi_from', 'LIKE', "%$keyword%")
                ->orWhere('validity_of_gi_to', 'LIKE', "%$keyword%")
                ->orWhere('type_of_aircraft', 'LIKE', "%$keyword%")
                ->orWhere('fly_experience', 'LIKE', "%$keyword%")
                ->orWhere('remarks', 'LIKE', "%$keyword%")
                ->orWhere('user_id', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $posts = Post::latest()->paginate($perPage);
        }

        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $this->validate($request, [
			'title' => 'required|max:255',
			'serial' => 'required|max:255',
			'pilot_name' => 'required|max:255',
			'licence_no' => 'required|max:255',
			'date_of_initial_issue' => 'required|max:255',
			'file_name' => 'required|max:255',
			'current_document' => 'required|max:255',
			'date_of_birth' => 'required|max:255',
			'phone' => 'required|max:255',
			'email' => 'required|max:255',
			'address' => 'required|max:255',
			'validity_of_licence_from' => 'required|max:255',
			'validity_of_licence_to' => 'required|max:255',
			'validity_of_medical_from' => 'required|max:255',
			'validity_of_medical_to' => 'required|max:255',
			'validity_of_ppc_from' => 'required|max:255',
			'validity_of_ppc_to' => 'required|max:255',
			'validity_of_ir_from' => 'required|max:255',
			'validity_of_ir_to' => 'required|max:255',
			'aelpt_level' => 'required|max:255',
			'validity_of_seep' => 'required|max:255',
			'validity_of_crm' => 'required|max:255',
			'validity_of_dgr' => 'required|max:255',
			'validity_of_avsec' => 'required|max:255',
			'validity_of_rvsm' => 'required|max:255',
			'validity_of_fi_from' => 'required|max:255',
			'validity_of_fi_to' => 'required|max:255',
			'validity_of_tri_from' => 'required|max:255',
			'validity_of_tri_to' => 'required|max:255',
			'validity_of_tre_from' => 'required|max:255',
			'validity_of_tre_to' => 'required|max:255',
			'validity_of_rrl_from' => 'required|max:255',
			'validity_of_rrl_to' => 'required|max:255',
			'validity_of_gi_from' => 'required|max:255',
			'validity_of_gi_to' => 'required|max:255',
			'type_of_aircraft' => 'required|max:255',
			'fly_experience' => 'required|max:255'
		]);
        $requestData = $request->all();
        
        Post::create($requestData);

        return redirect('admin/posts')->with('flash_message', 'Post added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $post = Post::findOrFail($id);

        return view('admin.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);

        return view('admin.posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
			'title' => 'required|max:255',
			'serial' => 'required|max:255',
			'pilot_name' => 'required|max:255',
			'licence_no' => 'required|max:255',
			'date_of_initial_issue' => 'required|max:255',
			'file_name' => 'required|max:255',
			'current_document' => 'required|max:255',
			'date_of_birth' => 'required|max:255',
			'phone' => 'required|max:255',
			'email' => 'required|max:255',
			'address' => 'required|max:255',
			'validity_of_licence_from' => 'required|max:255',
			'validity_of_licence_to' => 'required|max:255',
			'validity_of_medical_from' => 'required|max:255',
			'validity_of_medical_to' => 'required|max:255',
			'validity_of_ppc_from' => 'required|max:255',
			'validity_of_ppc_to' => 'required|max:255',
			'validity_of_ir_from' => 'required|max:255',
			'validity_of_ir_to' => 'required|max:255',
			'aelpt_level' => 'required|max:255',
			'validity_of_seep' => 'required|max:255',
			'validity_of_crm' => 'required|max:255',
			'validity_of_dgr' => 'required|max:255',
			'validity_of_avsec' => 'required|max:255',
			'validity_of_rvsm' => 'required|max:255',
			'validity_of_fi_from' => 'required|max:255',
			'validity_of_fi_to' => 'required|max:255',
			'validity_of_tri_from' => 'required|max:255',
			'validity_of_tri_to' => 'required|max:255',
			'validity_of_tre_from' => 'required|max:255',
			'validity_of_tre_to' => 'required|max:255',
			'validity_of_rrl_from' => 'required|max:255',
			'validity_of_rrl_to' => 'required|max:255',
			'validity_of_gi_from' => 'required|max:255',
			'validity_of_gi_to' => 'required|max:255',
			'type_of_aircraft' => 'required|max:255',
			'fly_experience' => 'required|max:255'
		]);
        $requestData = $request->all();
        
        $post = Post::findOrFail($id);
        $post->update($requestData);

        return redirect('admin/posts')->with('flash_message', 'Post updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        Post::destroy($id);

        return redirect('admin/posts')->with('flash_message', 'Post deleted!');
    }
}
