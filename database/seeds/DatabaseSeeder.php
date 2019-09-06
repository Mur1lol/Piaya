<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        DB::insert('INSERT INTO denuncias (problema, tipo, lixeira, acontecimento, local) VALUES (?,?,?,?,?)', 
        	array ('Descarte incorreto de lixo ou residuos','Papel','Nao reciclavel','Aluno jogou papel na lixeira errada','Sala 01'));

    	DB::insert('INSERT INTO denuncias (problema, tipo, lixeira, acontecimento, local) VALUES (?,?,?,?,?)', 
        	array ('Uso inadequado da luz','Luz acesa em ambiente vazio','--',
        		'Aula acabou mais cedo e ninguem apagou as luzes','Sala 02'));

        DB::insert('INSERT INTO denuncias (problema, tipo, lixeira, acontecimento, local) VALUES (?,?,?,?,?)', 
        	array ('Problemas relacionados a agua','Torneira aberta','--','O banheiro ficou todo inundado','Banheiro'));
        
        DB::insert('INSERT INTO denuncias (problema, tipo, lixeira, acontecimento, local) VALUES (?,?,?,?,?)', 
        	array ('Descarte incorreto de lixo ou residuos','Perfurocortante','Reciclavel',
        		'Objeto afiado em lixeira de reciclaveis','Sala 10'));

        DB::insert('INSERT INTO denuncias (problema, tipo, lixeira, acontecimento, local) VALUES (?,?,?,?,?)', 
        	array ('Uso inadequado da luz','Ar condicionado ligado em sala vazia','--','Tava ligado','Sala 07'));
        
        DB::insert('INSERT INTO denuncias (problema, tipo, lixeira, acontecimento, local) VALUES (?,?,?,?,?)', 
        	array ('Problemas relacionados a agua', 'Vazamento', '--', 'Torneira estragada', 'Banheiro'));
        
        DB::insert('INSERT INTO denuncias (problema, tipo, lixeira, acontecimento, local) VALUES (?,?,?,?,?)', 
        	array ('Descarte incorreto de lixo ou residuos', 'Quimico', 'Reciclavel',
        		'Recipiente inapropriado ', 'Laboratorio de Quimica'));
    }
}
