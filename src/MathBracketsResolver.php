<?php

namespace Maratkazakbiev\HtOtus1;

use Maratkazakbiev\HtOtus1\Traits\ResponseTrait;
class MathBracketsResolver
{
    use ResponseTrait;
    private $string;
    public function __construct($string)
    {
        $this->string = $string;
    }

    /**
     * @return string
     */
    public function getString() :string
    {
        return $this->string;
    }

    public function Resolve() :string
    {
        $cleanString = $this->getString();
        $iterator = 0;
        $openBrackets = 0;
        $closedBrackets  = 0;
        $allowed = [" ", "\n", "\t", "\r"];

        try {
            if (str_starts_with($cleanString, ')')){
                $this->sendErrorResponse('Неверный символ в начале примера');
            }

            if (str_ends_with($cleanString, '(')){
               $this->sendErrorResponse('Неверный символ в конце примера');
            }


            while ($iterator < strlen($cleanString) ){
                switch ($cleanString[$iterator]){
                    case '(':
                        ++$openBrackets;
                        break;
                    case ')':
                        ++$closedBrackets;
                        break;
                    default:
                        if (!in_array($cleanString[$iterator] , $allowed)){
                            $this->sendErrorResponse('Неверный символ в строке');
                        }
                }
                ++$iterator;
            }
        }catch (\Throwable $exception){
            $this->sendErrorResponse("Ошибка " . $exception->getMessage());
        }

        if ($openBrackets == $closedBrackets) {
            $this->sendSuccessResponse('Пример правильный');
        }  else{
            $this->sendErrorResponse('Пример неправильный');
        }
    }
}