<?php

namespace App\Providers;

use App\Validator\Validator;
use Illuminate\Support\ServiceProvider;

class ValidatorServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $me = $this;

        $this->app['validator']->resolver(function ($translator, $data, $rules, $messages, $attributes) use ($me) {
            $messages += $me->getMessages();

            return new Validator($translator, $data, $rules, $messages, $attributes);
        });
    }

    protected function getMessages()
    {
        return [
            'cnh' => 'Carteira Nacional de Habilitação Inválida.',
            'titulo_eleitor' => 'Título de Eleitor Inválido.',
            'cnpj' => 'CNPJ Inválido.',
            'cpf' => 'CPF Inválido.',
            'cpf_cnpj' => 'CPF ou CNPJ Inválido.',
            'nis' => 'PIS/PASEP/NIT/NIS Inválido.',
            'formato_cnpj' => 'Formato inválido para CNPJ.',
            'formato_cpf' => 'Formato inválido para CPF.',
            'formato_cpf_cnpj' => 'Formato inválido para CPF ou CNPJ.',
            'formato_nis' => 'Formato inválido para PIS/PASEP/NIT/NIS.',
            'cep' => 'CEP Inválido.',
        ];
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return array();
    }
}