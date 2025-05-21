<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Trix;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\DateTime;
use Laravel\Nova\Http\Requests\NovaRequest;

class AdminMailings extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var class-string<\App\Models\Mailing>
     */
    public static $model = \App\Models\AdminMailings::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'id';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id',
        'subject',
        'body',
        'url',
        'status',
        'recipients'
    ];

    /**
     * Get the fields displayed by the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function fields(NovaRequest $request)
    {
        return [
            ID::make()->sortable(),

            // BelongsTo::make('User')
            // ->sortable(), 
            // Number::make('user_id'),

            Text::make('Subject')
            ->sortable()
            ->rules('required', 'max:255'),

            Trix::make('Body')
            // ->showOnIndex()
            ->fullWidth()
            ->alwaysShow(),  

            Text::make('Url')
            ->rules('required', 'url'),

            Text::make('Status')
            ->sortable()
            ->rules('required', 'max:20'),

            Number::make('Recipients'),


            Number::make('Views'),

            Number::make('Clicks'),

            DateTime::make('created_at')
            ->sortable(),




        ];
    }

    /**
     * Get the cards available for the request.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function cards(NovaRequest $request)
    {
        return [];
    }

    /**
     * Get the filters available for the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function filters(NovaRequest $request)
    {
        return [];
    }

    /**
     * Get the lenses available for the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function lenses(NovaRequest $request)
    {
        return [];
    }

    /**
     * Get the actions available for the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function actions(NovaRequest $request)
    {
        return [];
    }
}
