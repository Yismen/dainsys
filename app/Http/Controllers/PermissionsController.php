<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Yajra\DataTables\Facades\DataTables;

class PermissionsController extends Controller
{
    private $permission;

    public function __construct()
    {
        $this->middleware('authorize:view-permissions', ['only' => ['index', 'show']]);
        $this->middleware('authorize:edit-permissions', ['only' => ['edit', 'update']]);
        $this->middleware('authorize:create-permissions', ['only' => ['create', 'store']]);
        $this->middleware('authorize:destroy-permissions', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        if (! request()->ajax()) {
            return view('permissions.index');
        }

        return DataTables::of(
            Permission::query()
                ->with([
                    'roles',
                ])
        )
            ->addColumn('delete', function ($query) {
                return "
                <delete-request-button
                url='{route('admin.permissions.destroy', {$query->name})}'
                redirect-url='{route('admin.permissions.index')}'
            ></delete-request-button>
            ";
            })
            ->toJson(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create(Permission $permission)
    {
        return view('permissions.create', compact('permission'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Permission $permission, Request $request)
    {
        $this->validate($request, [
            'resource' => 'required|min:3|unique:permissions,resource',
            'actions' => 'required_without:not_resource|array',
            'roles' => 'sometimes|array|exists:roles,id',
        ]);

        $permission->createPermission($request);

        Cache::flush();

        return redirect()->route('admin.permissions.index')
            ->withSuccess('Permissions created.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return Response
     */
    public function show(Permission $permission)
    {
        return view('permissions.show', compact('permission'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return Response
     */
    public function edit(Permission $permission)
    {
        return view('permissions.edit', compact('permission'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     *
     * @return Response
     */
    public function update(Permission $permission, Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:3|unique:permissions,resource,' . $permission->id,
            'roles' => 'array|exists:roles,id',
        ]);

        $permission = $permission->updatePermission($request);

        Cache::flush();

        return redirect()->route('admin.permissions.show', $permission->name)
            ->withSuccess("Menu {$permission->name} has been updated.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return Response
     */
    public function destroy(Permission $permission)
    {
        $permission->delete();

        Cache::flush();

        return redirect()->route('admin.permissions.index')
            ->withWarning("Permission [{$permission->name}] has been removed!");
    }
}
