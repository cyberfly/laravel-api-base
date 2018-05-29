<?php

/**
 * @SWG\Get(
 *     path="/pet/{petId}",
 *     summary="Find pet by ID",
 *     description="Returns a single pet",
 *     operationId="getPetById",
 *     tags={"pet"},
 *     produces={"application/xml", "application/json"},
 *     @SWG\Parameter(
 *         description="ID of pet to return",
 *         in="path",
 *         name="petId",
 *         required=true,
 *         type="integer",
 *         format="int64"
 *     ),
 *     @SWG\Response(
 *         response=200,
 *         description="successful operation"
 *     ),
 *     @SWG\Response(
 *         response="400",
 *         description="Invalid ID supplied"
 *     ),
 *     @SWG\Response(
 *         response="404",
 *         description="Pet not found"
 *     ),
 *     security={
 *     {"passport": {}},
 *     }
 * )
 */