<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class PermissionsSeeder extends Seeder
{
    private array $data = [];

    public function run(): void
    {
        $this->loadData();
        $this->seedRoles();
    }

    public function loadData(): void
    {
        $this->data = $this->getRoles();
    }

    private function getRoles(): array
    {
        return json_decode($this->getFile(), true);
    }

    private function getFile(): bool|string
    {
        return file_get_contents($this->getPath());
    }

    private function getPath(): string
    {
        return database_path("seeders/json_resources/permission_roles.json");
    }

    private function seedRoles(): void
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        $superAdmin = Role::create(['name' => 'super_admin', 'guard_name' => 'web']);
        // User::find(1)->assignRole($superAdmin);

        foreach ($this->data as $roleName => $perms) {
            $role = Role::create(['name' => $roleName, 'guard_name' => 'web']);
            $this->seedRolePermissions($role, $perms);
        }
    }

    private function seedRolePermissions(Role $role, array $modelPermissions): void
    {
        foreach ($modelPermissions as $model => $perms) {
            $builtPerms = collect($perms)->crossJoin($model)
                ->map(
                    function ($item) {
                        $perm = implode('-', $item); // view-post
                        Permission::findOrCreate($perm, 'web');

                        return $perm;
                    }
                )->toArray();

            $role->givePermissionTo($builtPerms);
        }
    }
}
