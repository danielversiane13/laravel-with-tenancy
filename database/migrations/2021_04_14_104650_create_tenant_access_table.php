<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTenantAccessTable extends Migration
{
  public function up(): void
  {
    Schema::create('tenant_access', function (Blueprint $table) {
      // $table->uuid('user_id');

      $table->foreignUuid('user_id')
        ->constrained('users', 'id')
        ->cascadeOnDelete()
        ->cascadeOnUpdate();

      $table->foreignUuid('tenant_id')
        ->cascadeOnDelete()
        ->cascadeOnUpdate();;
    });
  }

  public function down(): void
  {
    Schema::dropIfExists('tenant_access');
  }
}
