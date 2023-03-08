<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class MenusController extends Controller
{
    protected $permission;

    public function __construct()
    {
        $this->middleware('authorize:view-menus|edit-menus|create-menus', ['only' => ['index', 'show']]);
        $this->middleware('authorize:edit-menus', ['only' => ['edit', 'update']]);
        $this->middleware('authorize:create-menus', ['only' => ['create', 'store']]);
        $this->middleware('authorize:destroy-menus', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Menu $menus)
    {
        $menus = $menus->orderBy('name', 'ASC')->get();

        return view('menus.index', compact('menus'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create(Menu $menu)
    {
        return view('menus.create', compact('menu'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Menu $menu, Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:menus',
            'display_name' => 'required|unique:menus,display_name',
            'roles' => 'sometimes|required|array',
        ]);

        $menu = $menu->addMenu($request);

        Cache::flush();

        return redirect()->route('admin.menus.index')
            ->withSuccess("Menu {$menu->display_name} has bee created.");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return Response
     */
    public function show(Menu $menu)
    {
        return view('menus.show', compact('menu'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return Response
     */
    public function edit(Menu $menu)
    {
        return view('menus.edit', compact('menu'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     *
     * @return Response
     */
    public function update(Menu $menu, Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:menus,name,' . $menu->id,
            'display_name' => 'required|unique:menus,display_name,' . $menu->id . ',id',
            'roles' => 'sometimes|required|array',
        ]);

        $menu->updateMenu($request);

        Cache::flush();

        return redirect()->route('admin.menus.show', $menu->id)
            ->withSuccess("Menu {$menu->display_name} has been updated.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return Response
     */
    public function destroy(Menu $menu)
    {
        $menu->removeMenu();

        Cache::flush();

        return redirect()->route('admin.menus.index')
            ->withWarning("Menu collection [{$menu->display_name}] has been removed!");
    }
}
