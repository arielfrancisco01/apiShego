<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\FreteController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\AvaliationController;
use App\Http\Controllers\BrancheController;
use App\Http\Controllers\Cat_produtoController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\CorController;
use App\Http\Controllers\DetalheController;
use App\Http\Controllers\ProvinciaController;
use App\Http\Controllers\MunicipioController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\cor_tmh_pedidoController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\PublicidadeController;
use App\Http\Controllers\ResidenciaController;
use App\Http\Controllers\TamanhoController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

/* USUÁRIO */

Route::post("/userLogin", [AuthController::class, "login"]);
Route::post("/userRegister", [AuthController::class, "register"]);
Route::get("/userShow/{id}", [AuthController::class, "show"]);
Route::put("/userUpdate/{id}", [AuthController::class, "update"]);
Route::post("/userUpdateImg/{id}", [AuthController::class, "updateImg"]);
/* Route::get("/publicidadeAll", [AuthController::class, "index"]);
Route::delete("/publicidadeDelete/{id}", [AuthController::class, "destroy"]); */

// BLOQUEIO DE ROTAS COM TOKEN

// Route::group(['middleware' => ['auth:sanctum']], function(){

    /* CATEGORIA */

    Route::get("/categoriaAll", [CategoriaController::class, "index"]);
    Route::post("/categoriaAdd", [CategoriaController::class, "store"]);
    Route::get("/categoriaEach/{id}", [CategoriaController::class, "show"]);
    Route::put("/categoriaUpdate/{id}", [CategoriaController::class, "update"]);
    Route::delete("/categoriaDelete/{id}", [CategoriaController::class, "destroy"]);

    /* FRETE */

    Route::get("/freteAll", [FreteController::class, "index"]);
    Route::post("/freteAdd", [FreteController::class, "store"]);
    Route::get("/freteEach/{id}", [FreteController::class, "show"]);
    Route::put("/freteUpdate/{id}", [FreteController::class, "update"]);
    Route::delete("/freteDelete/{id}", [FreteController::class, "destroy"]);

    /* LIKE */

    Route::post("/likeAdd", [LikeController::class, "store"]);
    Route::get("/likeUser/{code_emitter}", [LikeController::class, "show"]);
    Route::delete("/likeDelete/{code_emitter}, {code_produto}", [LikeController::class, "destroy"]);

    /* AVALIATION */

    Route::post("/avaliationAdd", [AvaliationController::class, "store"]);
    Route::get("/avaliationShow/{show}", [AvaliationController::class, "show"]);
    Route::put("/avaliationUpdate/{id}", [AvaliationController::class, "update"]);
    Route::delete("/avaliationDelete/{id}", [AvaliationController::class, "destroy"]);

    /* BRANCH */

    Route::get("/branchAll", [BrancheController::class, "index"]);
    Route::post("/branchAdd", [BrancheController::class, "store"]);
    Route::get("/branchShow/{code_emitter}", [BrancheController::class, "show"]);
    Route::put("/branchUpdate/{id}", [BrancheController::class, "update"]);
    Route::delete("/branchDelete/{id}", [BrancheController::class, "destroy"]);

    /* CAT_PRODUTO */

    Route::post("/catprodAdd", [Cat_produtoController::class, "store"]);
    Route::get("/catprodShow/{code_categoria}", [Cat_produtoController::class, "show"]);
    Route::put("/catprodUpdate/{id}", [Cat_produtoController::class, "update"]);

    /* CHAT */

    Route::post("/chatAdd", [ChatController::class, "store"]);
    Route::put("/chatUpdate/{id}", [ChatController::class, "update"]);
    Route::delete("/chatDelete/{id}", [ChatController::class, "destroy"]);
    Route::get("/chatShow/{code_emitter}, {code_receiver}", [ChatController::class, "show"]);

    /* COR PRODUTO */

    Route::post("/corAdd", [CorController::class, "store"]);
    Route::get("/corShow/{code_produto}", [CorController::class, "show"]);
    Route::delete("/corDelete/{id}", [CorController::class, "destroy"]);

    /* PROVINCIA */

    Route::get("/provinciaAll", [ProvinciaController::class, "index"]);
    Route::post("/provinciaAdd", [ProvinciaController::class, "store"]);
    Route::get("/provinciaShow/{id}", [ProvinciaController::class, "show"]);
    Route::put("/provinciaUpdate/{id}", [ProvinciaController::class, "update"]);
    Route::delete("/provinciaDelete/{id}", [ProvinciaController::class, "destroy"]);

    /* MUNICIPIO */

    Route::get("/municipio/{prov}", [MunicipioController::class, "index"]);
    Route::post("/municipioAdd", [MunicipioController::class, "store"]);
    Route::get("/municipioShow/{id}", [MunicipioController::class, "show"]);
    Route::put("/municipioUpdate/{id}", [MunicipioController::class, "update"]);
    Route::delete("/municipioDelete/{id}", [MunicipioController::class, "destroy"]);

    /* RESIDENCIA */

    Route::post("/residenciaAdd", [ResidenciaController::class, "store"]);
    Route::get("/residenciaShow/{code_user}", [ResidenciaController::class, "show"]);
    Route::put("/residenciaUpdate/{id}", [ResidenciaController::class, "update"]);
    Route::delete("/residenciaDelete/{id}", [ResidenciaController::class, "destroy"]);

    /* PRODUTO */

    Route::get("/produtoAll", [ProdutoController::class, "index"]);
    Route::post("/produtoAdd", [ProdutoController::class, "store"]);
    Route::get("/produtoShow/{id}", [ProdutoController::class, "show"]);
    Route::put("/produtoUpdate/{id}", [ProdutoController::class, "update"]);
    Route::delete("/produtoDelete/{id}", [ProdutoController::class, "destroy"]);

    /* DETALHE */

    Route::post("/detalheAdd", [DetalheController::class, "store"]);
    Route::get("/detalheShow/{code_produto}", [DetalheController::class, "show"]);
    Route::put("/detalheUpdate/{id}", [DetalheController::class, "update"]);
    Route::delete("/detalheDelete/{id}", [DetalheController::class, "destroy"]);

    /* TAMANHO */

    Route::post("/tamanhoAdd", [TamanhoController::class, "store"]);
    Route::get("/tamanhoShow/{code_produto}", [TamanhoController::class, "show"]);
    Route::put("/tamanhoUpdate/{id}", [TamanhoController::class, "update"]);
    Route::delete("/tamanhoDelete/{id}", [TamanhoController::class, "destroy"]);

    /* NOTIFICATION */

    Route::post("/notificationAdd", [NotificationController::class, "store"]);
    Route::get("/notificationShow/{code_receiver}", [NotificationController::class, "show"]);
    Route::delete("/notificationDelete/{id}", [NotificationController::class, "destroy"]);

    /* PEDIDO */

    Route::post("/pedidoAdd", [PedidoController::class, "store"]);
    Route::get("/pedidoShow/{show}", [PedidoController::class, "show"]);
    Route::put("/pedidoUpdate/{id}", [PedidoController::class, "update"]);
    Route::delete("/pedidoDelete/{id}", [PedidoController::class, "destroy"]);

    /* DETALHE PEDIDO */

    Route::post("/detalhePedidoAdd", [cor_tmh_pedidoController::class, "store"]);
    Route::get("/detalhePedidoShow/{code_pedido}", [cor_tmh_pedidoController::class, "show"]);
    Route::put("/detalhePedidoUpdate/{id}", [cor_tmh_pedidoController::class, "update"]);
    Route::delete("/detalhePedidoDelete/{id}", [cor_tmh_pedidoController::class, "destroy"]);

    /* PUBLICIDADE */

    Route::get("/publicidadeAll", [PublicidadeController::class, "index"]);
    Route::post("/publicidadeAdd", [PublicidadeController::class, "store"]);
    Route::get("/publicidadeShow/{show}", [PublicidadeController::class, "show"]);
    Route::put("/publicidadeUpdate/{id}", [PublicidadeController::class, "update"]);
    Route::delete("/publicidadeDelete/{id}", [PublicidadeController::class, "destroy"]);
// });
