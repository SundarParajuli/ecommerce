<?php

namespace App\Modules\User\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Modules\User\Http\Requests\RoleFormRequest;
use App\Modules\User\Repositories\PermissionInterface;
use App\Modules\User\Repositories\RoleInterface;
use Illuminate\Http\Request;
use Laracasts\Flash\Flash;

class RoleController extends Controller
{

    private $role;

    private $permission;


    public function __construct(RoleInterface $role, PermissionInterface $permission)
    {
        $this->role = $role;
        $this->permission = $permission;
    }

    public function index(Request $request)
    {
        $filter = $request->all();
        $data['roles'] = $this->role->findAll();
        $filter['q'] = $request->get('q');
        $sort['by'] = $request->get('key', 'id');
        $sort['sort'] = $request->get('sort', 'DESC');

        $roles = $this->role->findAll($limit = 8, $filter, $sort);

        $roles->appends(['q' => $filter['q']]);
        $sort = ($sort['sort'] == 'DESC') ? 'ASC' : 'DESC';

        return view('user::role.index', compact('roles', 'sort'));
    }

    public function create()
    {
        $data['routes'] = $this->getRouteList();
        return view('user::role.create', $data);
    }

    private function getRouteList()
    {
        $app = app();
        $collection = $app->routes->getRoutes();
        $routeList = [];

        $hiddenRoutes = [
            'login',
            'role.index',
            'role.create',
            'role.destroy',
            'role.update',
            'image.serve',
            'logout',
            'role.store',
            'role.edit',
            'login-post',
            'permission.denied',
            'standalone-filemanager',
            'l5-swagger.api',
            'l5-swagger.oauth2_callback',
            'l5-swagger.asset',
            'l5-swagger.docs',
            'category.hierarchy.inverse',
            'search.autocomplete',
            'search.autocomplete'
        ];

        foreach ($collection as $routes) {
            if ($routes->getName() != null && !in_array($routes->getName(), $hiddenRoutes)) {
                $list = str_replace('.', ' ', $routes->getName());
                $routeList[$routes->getName()] = ucfirst(str_replace('destroy', 'delete', str_replace('index', 'list', $list)));
            }
        }

        return $routeList;
    }

    public function store(RoleFormRequest $request)
    {

        $role['name'] = $request->get('name');
        $role['sort_order'] = $request->get('sort_order');
        $roles = $request->get('route_name');
        try {
            $role = $this->role->save($role);
            if ($roles) {
                $this->permission->save($role->id, $roles);
            }

            Flash::success("Data Created Successfully");

        } catch (\Throwable $t) {

            Flash::error($t->getMessage());
        }

        return redirect(route('role.index'));

    }

    public function edit($id)
    {

        $data['role'] = $this->role->find($id);
        $data['routes'] = $this->getRouteList();
        $data['assignedRoutes'] = $this->permission->getList($roleId = $id)->toArray();


        return view('user::role.edit', $data);
    }

    public function update(RoleFormRequest $request, $id)
    {
        $role['name'] = $request->get('name');
        $role['sort_order'] = $request->get('sort_order');
        $roles = $request->get('route_name');
        try {
            $this->role->update($id, $role);
            $this->permission->deleteByGroup($id);
            if ($roles) {
                $this->permission->save($roleId = $id, $roles);
            }

            Flash::success("Data Updated Successfully");

        } catch (\Throwable  $t) {
            Flash::error($t->getMessage());
        }

        return redirect(route('role.edit', ['id' => $id]));
    }

    public function destroy(Request $request)
    {
        $ids = $request->all();

        try {

            if ($request->has('toDelete')) {

                $this->role->delete($ids['toDelete']);

                Flash::success("Data deleted Successfully");

            } else {

                Flash::error("Please check at least one to delete");
            }


        } catch (\Throwable $e) {

            Flash::error($e->getMessage());
        }

        return redirect(route('role.index'));
    }

    public function status(Request $request)
    {

        try {
            if ($request->ajax()) {
                $stat = null;
                $id = $request->input('id');

                $status = $this->role->changeStatus($id);
                if ($status == 0) {
                    $stat = '<i class="fa fa-toggle-off fa-2x text-danger-800"></i>';
                } elseif ($status == 1) {
                    $stat = '<i class="fa fa-toggle-on fa-2x text-success-800"></i>';
                }
                $data['tgle'] = $stat;
            }

        } catch (\Throwable $e) {

            $data['error'] = $e->getMessage();
        }

        return response()->json($data);
    }


}
