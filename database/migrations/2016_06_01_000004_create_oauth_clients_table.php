<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOauthClientsTable extends Migration
{
  /**
   * The database schema.
   *
   * @var \Illuminate\Database\Schema\Builder
   */
  protected $schema;

  public function __construct()
  {
    $this->schema = Schema::connection($this->getConnection());
  }

  public function getConnection()
  {
    return config('passport.storage.database.connection');
  }

  public function up(): void
  {
    $this->schema->create('oauth_clients', function (Blueprint $table) {
      $table->bigIncrements('id');
      $table->uuid('user_id')->nullable()->index();
      $table->string('name');
      $table->string('secret', 100)->nullable();
      $table->string('provider')->nullable();
      $table->text('redirect');
      $table->boolean('personal_access_client');
      $table->boolean('password_client');
      $table->boolean('revoked');
      $table->timestamps();
    });
  }

  public function down(): void
  {
    $this->schema->dropIfExists('oauth_clients');
  }
}
