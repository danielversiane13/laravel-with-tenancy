<?php

namespace App\Services;

use App\Models\Company;
use App\Models\Tenant;
use Illuminate\Support\Facades\Config;
use Ramsey\Uuid\Uuid;

class MakeCompanyTenantService
{
  public function run(string $name): Company
  {
    $uuid = Uuid::uuid4()->toString();

    $tenant = Tenant::create(['id' => $uuid, 'company_name' => $name]);
    $tenant->domains()->create(['domain' => $tenant->id]);

    Config::set('database.connections.tenant.database', 't-' . $tenant->id);
    $company = Company::create(['id' => $tenant->id, 'name' => $name]);

    return $company;
  }
}
