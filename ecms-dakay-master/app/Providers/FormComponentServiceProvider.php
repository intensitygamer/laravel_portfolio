<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Form;
use Html;

class FormComponentServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        /**
         * Form bootstrap builds
         */
        Form::component('bsInput', 'components.form.form_input', ['type', 'name', 'value'=>null, 'label'=>null, 'attributes'=>[], 'alignment' => 'vertical', 'required' => null]);
        Form::component('bsSelect', 'components.form.form_select', ['name', 'value'=>null, 'label'=>null, 'list'=>[], 'attributes'=>[], 'alignment' => 'vertical', 'required' => null]);
        Form::component('bsTextarea', 'components.form.form_textarea', ['name', 'value'=>null, 'label'=>null, 'attributes'=>[], 'alignment' => 'vertical', 'required' => null]);
        Form::component('bsRadio', 'components.form.form_radio', ['name', 'value'=>null, 'label'=>null, 'options'=>[], 'attributes'=>[], 'alignment' => 'vertical', 'required' => null]);
        Form::component('bsCheckbox', 'components.form.form_checkbox', ['name', 'value'=>null, 'label'=>null, 'options'=>[], 'attributes'=>[], 'info_block'=>[], 'alignment' => 'vertical', 'required' => null]);
        Form::component('bsInlineInput', 'components.form.form_inline_input', ['type', 'name', 'value'=>null, 'attributes'=>[], 'alignment' => 'vertical']);
        Form::component('bsInlineCaptcha', 'components.form.form_inline_captcha', ['id' => 'captcha_img', 'url'=>null]);
        Form::component('bsDateRangePicker', 'components.form.form_daterange', ['from'=> ['name' => null, 'value' => null, 'label'=>null, 'attributes'=>[]], 'to'=>['name' => null, 'value' => null, 'label'=>null, 'attributes'=>[]], 'alignment' => 'vertical', 'required' => null]);
        Form::component('bsDatePicker', 'components.form.form_datepicker', ['name', 'value'=>null, 'label'=>null, 'attributes'=>[], 'alignment' => 'vertical', 'required' => null]);
        Form::component('bsTimePicker', 'components.form.form_timepicker', ['name', 'value'=>null, 'label'=>null, 'attributes'=>[], 'alignment' => 'vertical', 'required' => null]);

        /**
         * Html customs builds
         */
        HTML::component('setActive', 'components.html.navactive', ['route'=>null]);
        HTML::component('tableHeader', 'components.html.table_header', ['headers'=>[]]);
        HTML::component('languages', 'components.html.language_dropdown', ['languages' => [], 'current_language' => 'en']);

    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
