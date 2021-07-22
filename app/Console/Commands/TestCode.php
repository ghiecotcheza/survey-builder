<?php

namespace App\Console\Commands;

use App\Models\User;
use App\Models\Permission;
use Illuminate\Console\Command;

class TestCode extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'test:code';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Test my code';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    { 

       


    //     $permissionsByRole = [
    //         'user' => [
    //             'create survey',
    //             'edit survey',
    //             'delete survey'
    //         ],

    //         'guest' => [
    //             'view survey',
    //             'answer survey'
    //         ],
    //     ];

    //     $insertPermissions = fn ($role) => collect($permissionsByRole[$role])
    //         ->map(fn ($name) => Permission::insertGetId(['name' => $name, 'guard_name' => 'web']))
    //         ->toArray();

    //     $permissionIdsByRole = [
    //         'user' => $insertPermissions('user'),
    //         'guest' => $insertPermissions('guest')
    //     ];
    //     dd($permissionIdsByRole);
     }
}
