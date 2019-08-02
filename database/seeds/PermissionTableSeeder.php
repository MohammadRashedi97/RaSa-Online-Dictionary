<?php

use Illuminate\Database\Seeder;
use App\Permission;
use App\Role;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        DB::table('permissions')->truncate();

        // CRUD Word
        $crudWord = new Permission();
        $crudWord->name = "crud-word";
        $crudWord->save();

        // update all Words
        $updateAllWords = new Permission();
        $updateAllWords->name = "update-all-words";
        $updateAllWords->save();

        // Delete Words
        $deletewords = new Permission();
        $deletewords->name = "delete-words";
        $deletewords->save();

        // CRUD category
        $crudCategory = new Permission();
        $crudCategory->name = "crud-category";
        $crudCategory->save();

        // CRUD category
        $crudUser = new Permission();
        $crudUser->name = "crud-user";
        $crudUser->save();

        // Attach permissions to roles
        $admin = Role::whereName('admin')->first();
        $editor = Role::whereName('editor')->first();
        $author = Role::whereName('author')->first();

        $admin->detachPermissions([$crudWord, $updateAllWords, $deletewords, $crudCategory, $crudUser]);
        $admin->attachPermissions([$crudWord, $updateAllWords, $deletewords, $crudCategory, $crudUser]);

        $editor->detachPermissions([$crudWord, $updateAllWords, $deletewords, $crudCategory]);
        $editor->attachPermissions([$crudWord, $updateAllWords, $deletewords, $crudCategory]);

        $author->detachPermissions([$crudWord, $updateAllWords]);
        $author->attachPermissions([$crudWord, $updateAllWords]);
    }
}
