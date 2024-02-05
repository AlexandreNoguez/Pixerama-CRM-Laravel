<?php

namespace App\Enums;

enum LeadStage: string
{
    case New = 'Novo';
    case WaitingApproval = 'Aguardando Aprovação';
    case OnGoing = 'Em Andamento';
    case Finished = 'Finalizado';
    case Cancelled = 'Cancelado';

    public static function getValues(string $name): string
    {
        foreach (self::cases() as $stage) {

            if($name === $stage->name){
                return $stage->value;
            }
        }

        throw new \ValueError('Stage not found');

    }
}
