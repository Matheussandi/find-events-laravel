<?php

namespace App\Docs;

/**
 * @OA\Info(
 *     title="FIND EVENTS API",
 *     version="1.0.0",
 *     description="Documentação da API do projeto FIND EVENTS"
 * )
 *
 * @OA\Tag(
 *     name="Events",
 *     description="Gerenciamento de eventos"
 * )
 */
class EventControllerDoc
{
    /**
     * @OA\Get(
     *     path="/events",
     *     tags={"Events"},
     *     summary="Listar eventos",
     *     description="Retorna uma lista paginada de eventos.",
     *     @OA\Parameter(
     *         name="search",
     *         in="query",
     *         description="Busca por título do evento",
     *         required=false,
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\Parameter(
     *         name="location",
     *         in="query",
     *         description="Filtrar por local",
     *         required=false,
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\Parameter(
     *         name="max_participants",
     *         in="query",
     *         description="Filtrar por número máximo de participantes",
     *         required=false,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Parameter(
     *         name="is_public",
     *         in="query",
     *         description="Filtrar por eventos públicos",
     *         required=false,
     *         @OA\Schema(type="boolean")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Sucesso"
     *     )
     * )
     */
    public function index() {}

    /**
     * @OA\Get(
     *     path="/events/{id}",
     *     tags={"Events"},
     *     summary="Exibir evento",
     *     description="Retorna os detalhes de um evento específico.",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="ID do evento",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Sucesso"
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Evento não encontrado"
     *     )
     * )
     */
    public function show() {}

    /**
     * @OA\Post(
     *     path="/events",
     *     tags={"Events"},
     *     summary="Criar evento",
     *     description="Cria um novo evento.",
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\MediaType(
     *             mediaType="multipart/form-data",
     *             @OA\Schema(
     *                 required={"title", "date", "location", "is_public"},
     *                 @OA\Property(property="title", type="string"),
     *                 @OA\Property(property="date", type="string", format="date"),
     *                 @OA\Property(property="description", type="string"),
     *                 @OA\Property(property="location", type="string"),
     *                 @OA\Property(property="is_public", type="boolean"),
     *                 @OA\Property(property="organizer", type="string"),
     *                 @OA\Property(property="image", type="string", format="binary"),
     *                 @OA\Property(property="items", type="array", @OA\Items(type="string"))
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Evento criado com sucesso"
     *     ),
     *     @OA\Response(
     *         response=422,
     *         description="Dados inválidos"
     *     )
     * )
     */
    public function store() {}

    /**
     * @OA\Put(
     *     path="/events/{id}",
     *     tags={"Events"},
     *     summary="Atualizar evento",
     *     description="Atualiza um evento existente.",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="ID do evento",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\MediaType(
     *             mediaType="multipart/form-data",
     *             @OA\Schema(
     *                 required={"title", "date", "location", "is_public"},
     *                 @OA\Property(property="title", type="string"),
     *                 @OA\Property(property="date", type="string", format="date"),
     *                 @OA\Property(property="description", type="string"),
     *                 @OA\Property(property="location", type="string"),
     *                 @OA\Property(property="is_public", type="boolean"),
     *                 @OA\Property(property="organizer", type="string"),
     *                 @OA\Property(property="image", type="string", format="binary"),
     *                 @OA\Property(property="items", type="array", @OA\Items(type="string"))
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Evento atualizado com sucesso"
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Evento não encontrado"
     *     )
     * )
     */
    public function update() {}

    /**
     * @OA\Delete(
     *     path="/events/{id}",
     *     tags={"Events"},
     *     summary="Excluir evento",
     *     description="Exclui um evento existente.",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="ID do evento",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Evento excluído com sucesso"
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Evento não encontrado"
     *     )
     * )
     */
    public function destroy() {}
}
