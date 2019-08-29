<?php

declare(strict_types=1);

/*
 * This file is part of the tenancy/tenancy package.
 *
 * Copyright Tenancy for Laravel & Daniël Klabbers <daniel@klabbers.email>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @see https://tenancy.dev
 * @see https://github.com/tenancy
 */

namespace Tenancy\Providers\Provides;

use Tenancy\Lifecycle\Contracts\ResolvesHooks;

trait ProvidesHooks
{
    protected function bootProvidesHooks()
    {
        if (count($this->hooks)) {
            $this->app->resolving(ResolvesHooks::class, function (ResolvesHooks $resolver) {
                foreach ($this->hooks as $hook) {
                    $resolver->addHook($hook);
                }
            });
        }
    }
}
