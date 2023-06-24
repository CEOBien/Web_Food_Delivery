<?php

use App\Models\Setting;


//dung ham nay de lay ten config_key va config value
function getConfigValueFromSettingTable($configKey)
{
    $setting = Setting::where('config_key', $configKey)->first();
    if(!empty($setting))
    {
        return $setting->config_value;
    }
    return null;
}