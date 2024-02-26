<?php

namespace App\Http\Controllers\Admin;

use App\Constants\Status;
use App\Http\Controllers\Controller;
use App\Models\Frontend;
use App\Models\GeneralSetting;
use App\Rules\FileTypeValidate;
use Illuminate\Http\Request;
use Image;

class GeneralSettingController extends Controller
{
    public function index()
    {
        $pageTitle = 'General Setting';
        $timezones = json_decode(file_get_contents(resource_path('views/admin/partials/timezone.json')));
        $currentTimezone = array_search(config('app.timezone'), $timezones);
        return view('admin.setting.general', compact('pageTitle', 'timezones', 'currentTimezone'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'site_name' => 'required|string|max:40',
            'cur_text' => 'required|string|max:40',
            'cur_sym' => 'required|string|max:40',
            'base_color' => 'nullable|regex:/^[a-f0-9]{6}$/i',
            'secondary_color' => 'nullable|regex:/^[a-f0-9]{6}$/i',
            'timezone' => 'required|numeric',

            'min_send_money_limit' => 'required|numeric',
            'max_send_money_limit' => 'required|numeric|gte:min_send_money_limit',
            'daily_send_money_limit' => 'required|numeric|gte:max_send_money_limit',
            'monthly_send_money_limit' => 'required|numeric|gte:daily_send_money_limit',
            'send_money_fixed_charge' => 'required|numeric|gte:0',
            'send_money_percent_charge' => 'required|numeric|gte:0',

            'min_cash_in_limit' => 'required|numeric',
            'max_cash_in_limit' => 'required|numeric|gte:min_cash_in_limit',
            'daily_cash_in_limit' => 'required|numeric|gte:max_cash_in_limit',
            'monthly_cash_in_limit' => 'required|numeric|gte:daily_cash_in_limit',
            'cash_in_fixed_commission' => 'required|numeric|gte:0',
            'cash_in_percent_commission' => 'required|numeric|gte:0',

            'min_cash_out_limit' => 'required|numeric',
            'max_cash_out_limit' => 'required|numeric|gte:min_cash_in_limit',
            'daily_cash_out_limit' => 'required|numeric|gte:max_cash_in_limit',
            'monthly_cash_out_limit' => 'required|numeric|gte:daily_cash_in_limit',
            'cash_out_fixed_commission' => 'required|numeric|gte:0',
            'cash_out_percent_commission' => 'required|numeric|gte:0',
        ]);

        $timezones = json_decode(file_get_contents(resource_path('views/admin/partials/timezone.json')));
        $timezone = @$timezones[$request->timezone] ?? 'UTC';

        $general = gs();
        $general->site_name = $request->site_name;
        $general->cur_text = $request->cur_text;
        $general->cur_sym = $request->cur_sym;
        $general->base_color = str_replace('#', '', $request->base_color);
        $general->secondary_color = str_replace('#', '', $request->secondary_color);

        $general->min_send_money_limit = $request->min_send_money_limit;
        $general->max_send_money_limit = $request->max_send_money_limit;
        $general->daily_send_money_limit = $request->daily_send_money_limit;
        $general->monthly_send_money_limit = $request->monthly_send_money_limit;
        $general->send_money_fixed_charge = $request->send_money_fixed_charge;
        $general->send_money_percent_charge = $request->send_money_percent_charge;

        $general->min_cash_in_limit = $request->min_cash_in_limit;
        $general->max_cash_in_limit = $request->max_cash_in_limit;
        $general->daily_cash_in_limit = $request->daily_cash_in_limit;
        $general->monthly_cash_in_limit = $request->monthly_cash_in_limit;
        $general->cash_in_fixed_commission = $request->cash_in_fixed_commission;
        $general->cash_in_percent_commission = $request->cash_in_percent_commission;

        $general->min_cash_out_limit = $request->min_cash_out_limit;
        $general->max_cash_out_limit = $request->max_cash_out_limit;
        $general->daily_cash_out_limit = $request->daily_cash_out_limit;
        $general->monthly_cash_out_limit = $request->monthly_cash_out_limit;
        $general->cash_out_fixed_commission = $request->cash_out_fixed_commission;
        $general->cash_out_percent_commission = $request->cash_out_percent_commission;

        $general->save();

        $timezoneFile = config_path('timezone.php');
        $content = '<?php $timezone = "' . $timezone . '" ?>';
        file_put_contents($timezoneFile, $content);
        $notify[] = ['success', 'General setting updated successfully'];
        return back()->withNotify($notify);
    }

    public function systemConfiguration()
    {
        $pageTitle = 'System Configuration';
        return view('admin.setting.configuration', compact('pageTitle'));
    }


    public function systemConfigurationSubmit(Request $request)
    {
        $general = gs();
        $general->kv = $request->kv ? Status::ENABLE : Status::DISABLE;
        $general->ev = $request->ev ? Status::ENABLE : Status::DISABLE;
        $general->en = $request->en ? Status::ENABLE : Status::DISABLE;
        $general->sv = $request->sv ? Status::ENABLE : Status::DISABLE;
        $general->sn = $request->sn ? Status::ENABLE : Status::DISABLE;
        $general->force_ssl = $request->force_ssl ? Status::ENABLE : Status::DISABLE;
        $general->secure_password = $request->secure_password ? Status::ENABLE : Status::DISABLE;
        $general->registration = $request->registration ? Status::ENABLE : Status::DISABLE;
        $general->agree = $request->agree ? Status::ENABLE : Status::DISABLE;
        $general->multi_language = $request->multi_language ? Status::ENABLE : Status::DISABLE;
        $general->save();
        $notify[] = ['success', 'System configuration updated successfully'];
        return back()->withNotify($notify);
    }


    public function logoIcon()
    {
        $pageTitle = 'Logo & Favicon';
        return view('admin.setting.logo_icon', compact('pageTitle'));
    }

    public function logoIconUpdate(Request $request)
    {
        $request->validate([
            'logo' => ['image', new FileTypeValidate(['jpg', 'jpeg', 'png'])],
            'favicon' => ['image', new FileTypeValidate(['png'])],
        ]);
        $path = getFilePath('logoIcon');
        if ($request->hasFile('logo')) {
            try {
                fileUploader($request->logo, $path, filename: 'logo.png');
            } catch (\Exception $exp) {
                $notify[] = ['error', 'Couldn\'t upload the logo'];
                return back()->withNotify($notify);
            }
        }

        if ($request->hasFile('favicon')) {
            try {
                fileUploader($request->favicon, $path, filename: 'favicon.png');
            } catch (\Exception $exp) {
                $notify[] = ['error', 'Couldn\'t upload the favicon'];
                return back()->withNotify($notify);
            }
        }
        $notify[] = ['success', 'Logo & favicon updated successfully'];
        return back()->withNotify($notify);
    }

    public function customCss()
    {
        $pageTitle = 'Custom CSS';
        $file = activeTemplate(true) . 'css/custom.css';
        $fileContent = @file_get_contents($file);
        return view('admin.setting.custom_css', compact('pageTitle', 'fileContent'));
    }


    public function customCssSubmit(Request $request)
    {
        $file = activeTemplate(true) . 'css/custom.css';
        if (!file_exists($file)) {
            fopen($file, "w");
        }
        file_put_contents($file, $request->css);
        $notify[] = ['success', 'CSS updated successfully'];
        return back()->withNotify($notify);
    }

    public function maintenanceMode()
    {
        $pageTitle = 'Maintenance Mode';
        $maintenance = Frontend::where('data_keys', 'maintenance.data')->firstOrFail();
        return view('admin.setting.maintenance', compact('pageTitle', 'maintenance'));
    }

    public function maintenanceModeSubmit(Request $request)
    {
        $request->validate([
            'description' => 'required'
        ]);
        $general = GeneralSetting::first();
        $general->maintenance_mode = $request->status ? Status::ENABLE : Status::DISABLE;
        $general->save();

        $maintenance = Frontend::where('data_keys', 'maintenance.data')->firstOrFail();
        $maintenance->data_values = [
            'description' => $request->description,
        ];
        $maintenance->save();

        $notify[] = ['success', 'Maintenance mode updated successfully'];
        return back()->withNotify($notify);
    }

    public function cookie()
    {
        $pageTitle = 'GDPR Cookie';
        $cookie = Frontend::where('data_keys', 'cookie.data')->firstOrFail();
        return view('admin.setting.cookie', compact('pageTitle', 'cookie'));
    }

    public function cookieSubmit(Request $request)
    {
        $request->validate([
            'short_desc' => 'required|string|max:255',
            'description' => 'required',
        ]);
        $cookie = Frontend::where('data_keys', 'cookie.data')->firstOrFail();
        $cookie->data_values = [
            'short_desc' => $request->short_desc,
            'description' => $request->description,
            'status' => $request->status ? Status::ENABLE : Status::DISABLE,
        ];
        $cookie->save();
        $notify[] = ['success', 'Cookie policy updated successfully'];
        return back()->withNotify($notify);
    }
}
