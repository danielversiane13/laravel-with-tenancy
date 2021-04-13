<?php

namespace App\Console\Commands;

use App\Services\MakeCompanyTenantService;
use Illuminate\Console\Command;

class MakeCompanyTenant extends Command
{
  protected $signature = 'make:company {name}';
  protected $description = 'Make a company tenant';

  protected MakeCompanyTenantService $makeCompanyTenantService;

  public function __construct(MakeCompanyTenantService $makeCompanyTenantService)
  {
    parent::__construct();

    $this->makeCompanyTenantService = $makeCompanyTenantService;
  }

  /**
   * Execute the console command.
   *
   * @return int
   */
  public function handle()
  {
    $this->makeCompanyTenantService->run($this->argument('name'));

    return 0;
  }
}
