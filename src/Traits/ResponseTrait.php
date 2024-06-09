<?php
namespace Maratkazakbiev\HtOtus1\Traits;

use JetBrains\PhpStorm\NoReturn;

trait ResponseTrait
{
/**
* Отправляет ответ с ошибкой.
*
* @param string $message Сообщение об ошибке.
* @param string $errorCode Код ошибки.
* @return void
*/
#[NoReturn] protected function sendErrorResponse(string $message, string $errorCode = 'bad_request') :void
{
    http_response_code(400);

    $response = [
    'error' => $errorCode,
    'message' => $message
    ];

    echo json_encode($response, JSON_UNESCAPED_UNICODE);
    exit;
}

/**
 * Отправляет ответ с успехом
 * @param string $message
 * @return void
 */
#[NoReturn] protected function sendSuccessResponse(string $message) :void
{
    http_response_code(200);

    $response = [
        'message' => $message,
    ];

    echo json_encode($response, JSON_UNESCAPED_UNICODE);
    exit;
}

}