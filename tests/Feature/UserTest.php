<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Artisan;
use Tests\TestCase;

class UserTest extends TestCase
{

    public function test_set_database_config(){
        Artisan::call('migrate:reset');
        //limpio la bd

        artisan::call('migrate');
        //migraciones de tablas

        artisan::call('db:seed');
        //carga de datos (Registros)

        $resource=$this->get('/api/');

        //accedo al indice

        $resource->assertStatus(200);
        //verifico si el resultado del metodo que se encuentra en la ruta '/'
        // es valido o no.

    }

    public function test_get_users_list(){
        //Objetivo:
        // 1) verifica el acceso a la ruta correspondiente
        //  2) verifica, si la collection (Todos los usuarios), respetan la estructura del sistema
        // 3) verifica, la consulta de obtener total de usuarios registrados y retornarlo a una API
        // 4) Verificar, si el metodo existe un elemento es correcto

        $response=$this->get('/api/users');
        //$response contiene la ruta en el cual se ejecuta el metodo, index (obtener todos los registros)
        $response->assertStatus(200);
        //verifica si la consulta realizada anteriormente, fue exitosa o no.


        //estructura de los usaurios
        $response->assertJsonStructure([

            'id','name','email','email_verified_at','created_at','updated_at'
        ]);

        $response->assertJsonFragment(['name'=>'Juan']);
        //si la bd contiene un usuario con el nombre de juan

        $response->assertJsonCount(4);
        // verifica si la cantidad de registros en la bd es igual a 4

    }
    public function test_get_user_detail(){
        //objetivo:
        //1) obtener el primer usuario con id=1

        //2) verifico si un objeto en particullar, corresponde a la estructura del sistema


        $response=$this->get('/api/users/1');


        $response->assertStatus(200);
        //verifico si la consulta es exitosa


        $response->assertJsonStructure([
            //esctrura de un objeto
            'name','id','email','email_verified_at','created_at','update_at'
        ]);

        $response->assertJsonFragment([
            'name'=>'juan',

        ]);

    }


    public function test_get_not_existing_user_detail(){
        //1) busca un usuarios que exista
        //2) verifica que la respuesta sea falta, por lo tanto es lo correcto


        $response=$this->get('/api/users/559');
        //usuario con id=559 no existe => resultado es[eramdp, Ok
        $response->assertStatus(404);

    }


}

