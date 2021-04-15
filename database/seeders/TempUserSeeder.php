<?php

namespace Database\Seeders;

use App\Models\Tenant;
use App\Models\User;
use App\Services\MakeCompanyTenantService;
use Illuminate\Database\Seeder;

class TempUserSeeder extends Seeder
{
  protected MakeCompanyTenantService $makeCompanyTenantService;

  public function __construct(MakeCompanyTenantService $makeCompanyTenantService)
  {
    $this->makeCompanyTenantService = $makeCompanyTenantService;
  }

  public function run()
  {
    $tenant = Tenant::first();

    if (!$tenant) {
      [$tenant] = $this->makeCompanyTenantService->run('company_1');
    }

    $user = User::factory()->create();
    $user->tenantAccess()->sync([$tenant->id]);
  }
}
