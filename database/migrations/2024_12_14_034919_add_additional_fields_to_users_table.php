<?php

    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    return new class extends Migration {
        public function up(): void
        {
            Schema::table('users', function (Blueprint $table) {
                $table->enum('role', ['client', 'business', 'admin', 'superadmin'])->default('client');
                $table->json('profile_details')->nullable();
                // Podría almacenar teléfono, foto de perfil, idioma preferido, etc.
                $table->string('phone')->nullable();
                $table->string('preferred_language', 5)->default('es');
                $table->string( 'avatar')->nullable();
                // Opcional: Campos para 2FA (si se desea implementar autenticación en dos pasos)
                $table->text('two_factor_secret')->nullable()->after('avatar_path');
                $table->text('two_factor_recovery_codes')->nullable()->after('two_factor_secret');
            });
        }

        public function down(): void
        {
            Schema::table('users', function (Blueprint $table) {
                $table->dropColumn(['role', 'profile_details', 'phone_number', 'preferred_language', 'avatar_path', 'two_factor_secret', 'two_factor_recovery_codes']);
            });
        }
    };
