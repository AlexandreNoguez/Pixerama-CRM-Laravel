<?php

use App\Enums\LeadStage;

if(!function_exists('getLeadStage')){
    function getLeadStage(string $stage): string{
        return LeadStage::getValues($stage);
    }
}
