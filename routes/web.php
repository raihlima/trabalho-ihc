<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect('home');
    //return view('/home');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('professor',[App\Http\Controllers\ProfessorController::class,'index' ])->name('professor')->middleware('auth');;
Route::get('professor/{id}', [App\Http\Controllers\ProfessorController::class, 'showDisciplinas'])->name('professor.disciplinas')->middleware('auth');;

Route::get('chefe_departamento/professor',[App\Http\Controllers\ChefeDepartamentoController::class,'professor' ])->name('chefe_departamento.professor')->middleware('auth');;
Route::get('chefe_departamento/lista_professores',[App\Http\Controllers\ChefeDepartamentoController::class,'listaProfessores' ])->name('chefe_departamento.lista_professores')->middleware('auth');;
Route::get('chefe_departamento/lista_disciplinas',[App\Http\Controllers\ChefeDepartamentoController::class,'listaDisciplinas' ])->name('chefe_departamento.lista_disciplinas')->middleware('auth');;

Route::get('coordenador/professor',[App\Http\Controllers\CoordenadorCursoController::class,'professor' ])->name('coordenador.professor')->middleware('auth');;
Route::get('coordenador/lista_professores',[App\Http\Controllers\CoordenadorCursoController::class,'listaProfessores' ])->name('coordenador.lista_professores')->middleware('auth');;

Route::get('estudante',[App\Http\Controllers\EstudanteController::class,'index' ])->name('estudante')->middleware('auth');;
Route::get('estudante/avaliacao/{id}', [App\Http\Controllers\EstudanteController::class, 'create'])->name('estudante.avaliacao')->middleware('auth');;
Route::post('estudante/realizar_avaliacao', [App\Http\Controllers\EstudanteController::class, 'store'])->name('estudante.realizar_avaliacao')->middleware('auth');;

Route::get('resultado_avaliacao/{id}',[App\Http\Controllers\ResultadoAvaliacaoController::class,'relatorioAvaliacao' ])->name('resultado_avaliacao')->middleware('auth');
Route::get('resultado_avaliacao_disciplina/{id}',[App\Http\Controllers\ResultadoAvaliacaoController::class,'relatorioAvaliacaoDisciplina' ])->name('resultado_avaliacao_disciplina')->middleware('auth');